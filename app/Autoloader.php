<?php

namespace App;

class Autoloader
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoloader']); //meilleur fonction autoloading
    }

    private static function autoload($class)
    {
        $class = str_replace(__NAMESPACE__, '', $class);
        require  __DIR__ . '/' . $class . '.php';
    }

    static function autoloader($class)
    {
        if (strpos($class, __NAMESPACE__ . '\\') === 0) {

            $class = str_replace(__NAMESPACE__ . '\\', '', $class);

            $class = str_replace('\\', '/', $class);
            require __DIR__ . '/' . $class . '.php';
        }
    }
}
