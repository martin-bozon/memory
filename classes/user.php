<?php

require 'messages.php';
require 'userManager.php';
require 'db.php';

class user
{
    private $id;
    private $username;
    private $password;
    private $is_admin;

    public function __construct($id, $username, $password, $is_admin)
    {
        try {
            $this->id = $this->setId($id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        try {
            $this->username = $this->setUsername($username);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        try {
            $this->password = $this->setPassword($password);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        try {
            $this->is_admin = $this->setIsAdmin($is_admin);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);

            // Si le setter correspondant existe.
            if (method_exists($this, $method))
            {
                try {
                    $this->$method($value);
                } catch (Exception $e) {
                    echo $e->getMessage();
                }
                // On appelle le setter.
            }
        }
    }

    /**
     * @param mixed|string $id
     */
    public function setId($id)
    {
        if (!is_int($id)) {
            throw new Exception('L\'id doit être un entier');
        }
        $this->id = $id;
    }

    /**
     * @param mixed|string $username
     * @return mixed
     * @throws Exception
     */
    public function setUsername($username)
    {
        /*$connexion = $this->db->connectDb();
        $q = $connexion->prepare(" SELECT username FROM utilisateurs WHERE username = :username");
        $q->bindParam(':username', $username, PDO::PARAM_STR);
        $q->execute();
        $login_check = $q->fetch();*/
        $db = new db();
        $manager = new userManager($db);
        $list = $manager->getList();
        $login_check = $list->fetch(PDO::FETCH_ASSOC);
        //username pattern
        $username_required = preg_match("/^(?=.*[A-Za-z0-9]$)[A-Za-z][A-Za-z\d\-\_]{3,19}$/", $username);
        if (!$username_required) {
            $errors[] = "Le login doit :<br>- Contenir entre 4 et 20 caractères.<br>- Commencer avec une lettre.<br>- Terminer avec une lettre ou un nombre.<br>- Ne contenir aucun caractère spécial (sauf - and _).";
        }
        //username availability

        if (!empty($login_check)) {
            $errors[] = "Cet utilisateur existe déjà.";
        }
        if (empty($errors)) {
            $this->username = $username;
        } else {
            $message = new messages($errors);
            throw new Exception($message->renderMessage());
        }
    }

    /**
     * @param mixed|string $password
     */
    public function setPassword($password)
    {
        $password_required = preg_match(
            "/^(?=.*?[A-Z]{1,})(?=.*?[a-z]{1,})(?=.*?[0-9]{1,})(?=.*?[\W]{1,}).{8,20}$/",
            $password
        );
        if (!$password_required) {
            $errors[] = "Le mot de passe doit contenir:<br>- Entre 8 et 20 caractères<br>- Au moins 1 caractère spécial<br>- Au moins 1 majuscule et 1 minuscule<br>- Au moins un chiffre.";
        }
        if (empty($errors)) {
            $password_modified = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
            $this->password = $password_modified;
        } else {
            $message = new messages($errors);
            throw new Exception($message->renderMessage());
        }
    }

    /**
     * @param mixed $is_admin
     */
    public function setIsAdmin($is_admin)
    {
        $this->is_admin = $is_admin;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->is_admin;
    }
}
$user = new user()
