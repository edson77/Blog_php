<?php

namespace App;

use \PDO;

class Database
{
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_password;
    private $conn;

    public function __construct($db_name,$db_user='root',$db_password='',$db_host='localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
        $this->db_host = $db_host;       
    }

    private function getPDO()
    {
        try {
            if ($this->conn == null) {
                $conn = new PDO("mysql:host=localhost;dbname=blog_tuto", 'root', '');
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Connected successfully";
            }
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        return $conn;
    }

    /**
     * requete de selection
     * @param string $statement qui est la requete SQL qui va etre executer
     * @param string $class_name qui fait reference à la classe qui est utiliser
     * @param bool $one specifie si on doit recuperer une seule colone ou pas
     * @return mixed retourne le resultat de la recherche
     */
    public function query($statement,$class_name,$one=false){
        $req = $this->getPDO()->query($statement);
        $req->setFetchMode(PDO::FETCH_CLASS,$class_name);
        if ($one === true) {
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }
        
        return $data;
    }

    //pour eviter les attaques par injection SQL, le prepare statement est plus securiser
    /**
     * @param string $statement qui est la requete SQL qui va etre executer
     * @param array $attributes qui est un tableau de parametres de la requete
     * @param string $class_name qui fait reference à la classe qui est utiliser
     * @param bool $one specifie si on doit recuperer une seule colone ou pas
     * @return mixed retourne le resultat de la recherche
     */
    public function prepare($statement,$attributes,$class_name,$one = false){
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS,$class_name);
        if ($one === true) {
            $data = $req->fetch();
        } else {
            $data = $req->fetchAll();
        }
        
        
        return $data;
    }
    
}
