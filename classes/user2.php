<?php

require 'db.php';
require 'messages.php';

class user2
{
    private $id;
    private $username;
    private $password;
    public $db;

    public function __construct($db)
    {
        if (isset($_SESSION['user'])) {
            $this->id = $_SESSION['user']['id'];
            $this->username = $_SESSION['user']['username'];
            $this->password = $_SESSION['user']['password'];
        } else {
            $this->id = '';
            $this->username = '';
            $this->password = '';
        }
        $this->db = $db;
    }

    public function register($username, $password, $password_check)
    {
        if (empty($username) or empty($password) or empty($password_check)) {
            $errors[] = "Tous les champs doivent être remplis.";
        }
        $errors = array_merge($this->setUsername($username), $this->setPassword($password, $password_check));
        if (empty($errors)) {
            $connexion = $this->db->connectDb();
            $q2 = $connexion->prepare(
                "INSERT INTO utilisateurs (username, password) VALUES (:username, :password)"
            );
            $q2->bindParam(':username', $this->getUsername(), PDO::PARAM_STR);
            $q2->bindParam(':password', $this->getPassword(), PDO::PARAM_STR);
            $q2->execute();
            header('location:../connexion.php');
        } else {
            $message = new messages($errors);
            echo $message->renderMessage();
        }
    }

    public function connect($username, $password)
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare("SELECT * FROM utilisateurs WHERE username = :username");
        $q->bindParam(':username', $username, PDO::PARAM_STR);
        $q->execute();
        $user = $q->fetch(PDO::FETCH_ASSOC);
        if (!empty($user)) {
            if (password_verify($password, $user['password'])) {
                $this->setId($user['id']);
                $this->setUsername($user['username']);
                $this->setPassword($user['password'], $user['password']);
                $_SESSION['user'] = [
                    'id' =>
                        $this->getId(),
                    'username' =>
                        $this->getUsername(),
                    'password' =>
                        $this->getPassword()
                ];
                return $_SESSION['user'];
            } else {
                $errors[] = "L'username ou le mot de passe est erroné.";
                $message = new messages($errors);
                echo $message->renderMessage();
            }
        } else {
            $errors[] = "L'username ou le mot de passe est erroné.";
            $message = new messages($errors);
            echo $message->renderMessage();
        }
    }

    /**
     * @return mixed|string
     */
    private function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed|string
     */
    private function getUsername()
    {
        return $this->username;
    }


    /**
     * @return mixed|string
     */
    private function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed|string $id
     */
    private function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed|string $username
     * @return mixed
     * @throws Exception
     */
    public function setUsername($username)
    {
        $connexion = $this->db->connectDb();
        $q = $connexion->prepare(" SELECT username FROM utilisateurs WHERE username = :username");
        $q->bindParam(':username', $username, PDO::PARAM_STR);
        $q->execute();
        $login_check = $q->fetch();
        //username pattern
        $username_required = preg_match("/^(?=.*[A-Za-z0-9]$)[A-Za-z][A-Za-z\d\-\_]{3,19}$/", $username);
        if (!$username_required) {
            throw new Exception(
                "Le login doit :<br>- Contenir entre 4 et 20 caractères.<br>- Commencer avec une lettre.<br>- Terminer avec une lettre ou un nombre.<br>- Ne contenir aucun caractère spécial (sauf - and _)."
            );
        }
        //username availability
        if (!empty($login_check)) {
            throw new Exception('Cet utilisateur existe déjà.');
        }
        $this->username = $username;
    }

    /**
     * @param mixed|string $password
     * @param $password_check
     */
    private function setPassword($password, $password_check)
    {
        $password_required = preg_match(
            "/^(?=.*?[A-Z]{1,})(?=.*?[a-z]{1,})(?=.*?[0-9]{1,})(?=.*?[\W]{1,}).{8,20}$/",
            $password
        );
        if (!$password_required) {
            $errors[] = "Le mot de passe doit contenir:<br>- Entre 8 et 20 caractères<br>- Au moins 1 caractère spécial<br>- Au moins 1 majuscule et 1 minuscule<br>- Au moins un chiffre.";
        }
        //PASSWORD CHECK
        if ($password != $password_check) {
            $errors[] = "Les mots de passe ne correspondent pas.";
        }
        if (empty($errors)) {
            $password_modified = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
            $this->password = $password_modified;
        } else {
            return $errors;
        }
    }

}

session_unset();
$db = new db();
$user = new user($db);
try {
    $user->setUsername('test');
}catch (Exception $e){
    echo $e->getMessage();
}

