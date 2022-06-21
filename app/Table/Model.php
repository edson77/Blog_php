<?php
namespace App\Table;

use App\App;

class Model{

    /**
     * NB: self fait reference a la classe parente, static fait reference a la classe qui est utiliser
     * get_called_class() fait appel à la classe est cours d'execution pas la classe courante 
     * __CLASS__ fait appel a la classe courrante
     */
    /**
     * @var mixed $table qui est le nom de la table
     */
    protected static $table;

    /**
     * faire une recherche en fonction de l'ID
     * @param mixed $id qui est recuperer par $_GET['id']
     * @return mixed
     */
    public static function find($id){
        return App::getDb()->prepare("SELECT * FROM " . static::$table . " WHERE id = :id",["id" => $id],get_called_class(), true);
    }

    /**
     * afficher tous les element d'une table
     * @return mixed
     */
    public static function all(){
        return App::getDb()->query("SELECT * FROM " . static::$table . "",get_called_class());
    }

    public static function query($statement, $attribute=null,$one = false){
        if($attribute){
            return App::getDb()->prepare($statement,$attribute,get_called_class(), $one);
        }else{
            return App::getDb()->query($statement,get_called_class(),$one);
        }
        
    }

    /**
     * fonction magique qui detecte les proprietes qui n'existent pas
     * @param mixed $name
     * @return void
     */
    public function __get($key)
    {
        $method = 'get'.ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}