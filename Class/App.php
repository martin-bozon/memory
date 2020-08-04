<?php

class App{

    static $db = null;

    static function getDatabase(){
        if (!self::$db){
            self::$db = new Database('root','','memory');
        }
        return self::$db;
    }

    static function getAuth(){
        return new Auth(Session::getInstance(),['restriction_msg' => 'Vous n\'êtes pas connecté']);
    }

    static function redirect($page){
        header("location:$page");
    }

}