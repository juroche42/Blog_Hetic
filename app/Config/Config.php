<?php
//gen
$rep=__DIR__.'/../';
// liste des modules à inclure
//$dConfig['includes']= array('controleur/Validation.php');


//BD
$base="mysql:host=db;dbname=dbBlog";
$login="root";
$mdp="password";


//Vues

//$vues['vueErreur']='Vues/vueErreur.php';
$vues['vuePrincipal']='vue/pagePrincipale.php';
$vues['addArticle']='vue/article.php';
//$vues['articleCom']='vues/article.php';
$vues['connect']='vue/connection.php';
$vues['inscription']='vue/inscription.php';
$nbElements = 10;
//define('APP_URL_CONNECT', 'vue/connection.php');
