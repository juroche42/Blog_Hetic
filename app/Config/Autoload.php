<?php

class Autoload
{
    /**
     * @var null
     */
    private static $_instance = NULL;

    /**
     *
     */
    public static function start()
    {
        if (self::$_instance != NULL) { //Permet d'impếcher de créer une nouvelle instance de Autoload
            throw new RuntimeException(sprintf('%s is already started', __CLASS__));
        }

        self::$_instance = new self();


        if (!spl_autoload_register(array(self::$_instance, '_autoload'))) { //Permet d'enregistrer une fonction en tant qu'implémentation de autoload
            throw RuntimeException(sprintf('%s : Could not start the autoload', __CLASS__));
        }
    }

    /**
     *
     */
    public static function shutDown()
    {
        if (self::$_instance != NULL) {

            if (!spl_autoload_unregister(array(self::$_instance, '_autoload'))) {
                throw new RuntimeException('Could not stop the autoload');
            }

            self::$_instance = null;
        }
    }

    /**
     * @param $class
     */
    private static function _autoload($class) //Permet de ne pas faire des require
    {
        global $rep;
        $filename = $class . '.php';
        $dir = array('Metier/', './', 'Config/', 'Controller/','Gateway/','Model/'); //Chercher le classe que l'on va utiliser dans ses répétoires
        foreach ($dir as $d) {
            $file = $rep . $d . $filename;
            //echo $file;
            if (file_exists($file)) {
                include $file;
            }
        }

    }

}