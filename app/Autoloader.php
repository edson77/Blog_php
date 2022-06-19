<?php
namespace App;
class Autoloader{
    public static function register(){
        spl_autoload_register([__CLASS__,'autoload']); //meilleur fonction autoloading
    }

    private static function autoload($class){
        $class = str_replace(__NAMESPACE__,'',$class);
        require  __DIR__.'/'.$class .'.php';
    }
}