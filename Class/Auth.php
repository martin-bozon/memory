<?php


class Auth
{
    private $session;

    private $options = [
        'restriction_msg' => "Vous n'avez pas le droit d'accéder à cette page."
    ];

    public function __construct($session, $options = [])
    {
        $this->options = array_merge($this->options, $options);
        $this->session = $session;
    }

    public function hashPassword($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public function register($db, $username, $password)
    {
        $password = $this->hashPassword($password);
        $db->query(
            "INSERT INTO utilisateurs SET username = ?, password = ?",
            [$username, $password]
        );
        /*$user_id = $db->lastInsertId();*/
    }

    public function restrict()
    {
        if (!$this->session->read('auth')) {
            $this->session->setFlash('danger', $this->options['restriction_msg']);
            header('location:connexion.php');
            exit();
        }
    }

    public function user()
    {
        if (!$this->session->read('auth')) {
            return false;
        }
        return $this->session->read('auth');
    }

    public function connect($user)
    {
        $this->session->write('auth', $user);
    }

    public function connectFromCookie($db)
    {
        if (isset($_COOKIE['remember']) && !$this->user()) {
            $remember_token = $_COOKIE['remember'];
            $parts = explode('==', $remember_token);
            $user_id = $parts[0];
            $user = $db->query('SELECT * FROM utilisateurs WHERE id= ?', [$user_id])->fetch();
            if ($user) {
                $expected = $user_id . '==' . $user->remember_token . sha1($user_id . 'pandaroux');
                if ($expected == $remember_token) {
                    $this->connect($user);
                    setcookie('remember', $remember_token, time() + 60 * 60 * 24 * 7);
                } else {
                    setcookie('remember', null, -1);
                }
            } else {
                setcookie('remember', null, -1);
            }
        }
    }

    public function login($db, $username, $password, $remember = false)
    {
        $user = $db->query("SELECT * FROM utilisateurs WHERE username = :username", ['username' => $username])->fetch();
        if ($user) {
            if (password_verify($password, $user->password)) {
                $this->connect($user);
                if ($remember) {
                    $this->remember($db, $user->id);
                }
                return $user;
            } else {
                return false;
            }
        }
    }

    public function updateProfil($db,$field, $content, $user_id){
        $db->query("UPDATE utilisateurs SET $field = ? WHERE id = ?", [$content, auth::user()->id]);
        $this->session->updateSession($user_id, $db);
    }

    public function remember($db, $user_id)
    {
        $remember_token = Str::random(250);
        $db->query("UPDATE utilisateurs SET remember_token = ? WHERE id = ?", [$remember_token, $user_id]);
        setcookie(
            'remember',
            $user_id . '==' . $remember_token . sha1($user_id . 'pandaroux'),
            time() + 60 * 60 * 24 * 7
        );
    }

    public function logout(){
        setcookie('remember', NULL, -1);
        $this->session->delete('auth');
    }

}