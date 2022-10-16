<?php
//require()
//chargement config

require_once(__DIR__.'/Config/Config.php');
//chargement autoloader pour autochargement des classes
require_once(__DIR__.'/Config/Autoload.php');
Autoload::start();
session_start();
$cont=new FrontControler();
?>


