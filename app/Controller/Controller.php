<?php

class Controller
{
    private User|null $adminAttr;

    public function __construct(User $adminAttr = null)
    {

        //session_start(); // on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
        //global $rep,$vues; // Variable global : rep (répertoire du projet) et vues (permet accèder vue et vue erreur)
        $this->adminAttr = $adminAttr;


        $tabErreur = [];
        $action=isset($_REQUEST['action']) ? $_REQUEST['action'] : NULL;//A voir si get ou post donc request + test si $_REQUEST['action'] existe sinon vaut null
        switch($action){
            case NULL:
                $this->afficherPage(); //Initilisation
                break;
            case "seConnecterPage":
                $this->loginPage();
                break;
            case "seConnecter":
                $username = $_POST['username'];
                $password = $_POST['password'];
                $this->login($username, $password);
                break;
            case 'sinscrirePage':
                $this->inscrirePage();
                break;
            case 'inscrire':
                $this->inscrire();
                break;
            default:
                $tabErreur[]="Erreur appel";
                //Appeler vue (qui affiche vue d'erreur)
                break;
        }
    }

    protected function afficherPage()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales

        $adminModel = new Model();
        $admin = $this->adminAttr;
        $tabArticle = $adminModel->getAllArticle();
        require($rep.$vues['vuePrincipal']);
    }




    public function loginPage()
    {
        global $rep, $vues;

        require($rep.$vues['connect']);
    }

    public function login($username, $password)
    {
        global $rep, $vues;



        $model = new Model();
        $admin = $model->getUser($username, $password);

        if(isset($admin)) {
            header('Location: index.php?');
        } else {
            $error = true;
            require($rep.$vues['connect']);
        }
    }

    protected function inscrirePage()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales

        require($rep.$vues['inscription']);
    }

    protected function inscrire()
    {
        global $rep, $vues;

        $username = $_POST['username'];
        $password = $_POST['password'];

        $model = new Model();
        $admin = $model->getUser($username, $password);

        if(isset($admin)) {
            $error = true;
            require($rep.$vues['inscription']);
        } else {
            //insert
            $model->addUser($username, $password);
            $this->login($username, $password);
        }
    }

}