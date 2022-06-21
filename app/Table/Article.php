<?php
namespace App\Table;

use App\App;

class Article extends Model{

    protected static $table = 'articles';

    public static function getAll(){

        return self::query("SELECT articles.id as id, articles.titre as titre, articles.contenu as contenu, categories.titre as category FROM articles LEFT JOIN categories ON category_id = categories.id");
    }


    public function getUrl(){
        return 'index.php?p=post&id='.$this->id;
    }

    public function getExtrait(){
        $html = '<p>'. substr($this->contenu,0,200).'...</p>';
        $html .= '<p><a href="'.$this->getURL().'">Voir la suite</a></p>';
        return $html;
    }

    public static function lastByCategory($category_id)
    {

        return self::query(
            "SELECT articles.id as id, articles.titre as titre, articles.contenu as contenu, categories.titre as category 
        FROM articles 
        LEFT JOIN categories 
        ON category_id = categories.id
        WHERE category_id = :category_id",
            ["category_id" => $category_id],
            false
        );
    }
}