<?php
namespace App\Table;
class Article{

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


    public function getUrl(){
        return 'index.php?p=post&id='.$this->id;
    }

    public function getExtrait(){
        $html = '<p>'. substr($this->contenu,0,200).'...</p>';
        $html .= '<p><a href="'.$this->getURL().'">Voir la suite</a></p>';
        return $html;
    }
}