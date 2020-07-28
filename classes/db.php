<?php

class db{
    private $db_host;
    private $db_login;
    private $db_password;
    private $db_name;

    public function __construct()
    {
        $this->db_host = "localhost";
        $this->db_login = "root";
        $this->db_password = "";
        $this->db_name = "memory";

    }

    public function connectDb(){
        try {
            return new PDO("mysql:dbname=$this->db_name;host=$this->db_host;charset=utf8;", $this->db_login, $this->db_password);
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }
}