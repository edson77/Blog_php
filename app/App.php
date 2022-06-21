<?php
namespace App;

use App\Database;

class App{

    const DB_HOST="localhost";
    const DB_NAME="blog_tuto";
    const DB_PASS="";
    const DB_USER="root";

    public static $database;


    /**
     * self::$database renvoi la connexion à la base de donnees
     * si la bse de donnees est deja connectée elle renvoi juste l'instance connecté
     * @return \App\Database
     */
    public static function getDb(){
        if(self::$database == null){ 
            self::$database = new Database(self::DB_NAME,self::DB_USER,self::DB_PASS,self::DB_HOST);
        }
        return self::$database;
    }

    public static function notFound(){
        header("HTTP/1.0 404 Not Found");
        header('Location:index.php?p=404');
    }
}