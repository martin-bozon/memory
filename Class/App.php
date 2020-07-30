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
        return new Auth(Session::getInstance(),['restriction_msg' => 'lol tu es bloqué']);
    }

    static function redirect($page){
        header("location:$page");
    }
}