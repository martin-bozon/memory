<?php

require 'db.php';
require 'user.php';

class userManager
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db->connectDb();
    }

    public function add(user $user)
    {
        $q = $this->db->prepare(
            'INSERT INTO utilisateurs(username, password, is_admin) VALUES(:username, :password, :is_admin)'
        );

        $q->bindValue(':username', $user->getUsername(), PDO::PARAM_STR);
        $q->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $q->bindValue(':is_admin', $user->getIsAdmin(), PDO::PARAM_INT);

        $q->execute();
    }

    public function delete(user $user)
    {
        $this->db->exec('DELETE FROM utilisateurs WHERE id = ' . $user->getId());
    }

    public function get($id)
    {
        $id = (int)$id;

        $q = $this->db->query("SELECT id, username, password, is_admin FROM utilisateurs WHERE id = '$id'");
        $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new user($donnees);
    }

    public function getList()
    {
        $users = [];

        $q = $this->db->query('SELECT id, username, password, is_admin FROM utilisateurs ORDER BY username');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $users[] = new user($donnees);
        }

        return $users;
    }

    public function update(user $user)
    {
        $q = $this->db->prepare('UPDATE utilisateurs SET username = :username, password = :password, is_admin = :is_admin WHERE id = :id');

        $q->bindValue(':username', $user->getUsername(), PDO::PARAM_STR);
        $q->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $q->bindValue(':is_admin', $user->getIsAdmin(), PDO::PARAM_INT);
        $q->bindValue(':id', $user->getId(), PDO::PARAM_INT);

        $q->execute();
    }
}
$db = new db();
$Manager = new userManager($db);
var_dump($Manager->getList());