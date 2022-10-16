<?php

class FrontControler {

    public function __construct()
    {


        global $rep, $vues;

        try {
            $actionList = array(
                'Visitor' => array(null, 'seConnecterPage', 'seConnecter', 'sinscrirePage', 'inscrire'),
                'Admin' => array('seDeconnecter','ajouterArticle','supprimerArticle','pageAjouterArticle')
            );

            $action = $_GET['action'] ?? null;
            foreach ($actionList as $role => $actions) {
                if (in_array($action, $actions, true)) {
                    $controller = $role;
                    break;
                }
            }
            //var_dump($controller);
            //die();
            $admin = (new Model())->isAdmin();
            //var_dump($admin);
            if (!isset($controller) || $controller === 'Visitor') {
                new Controller($admin);
            } else if(isset($admin)) {
                //echo "on est la";
                new UserController($admin);
            } else {
                $_GET['action'] = 'seConnecterPage';
                new Controller();
            }
        } catch (Throwable $e) {
            $errorArr[] = $e->getMessage();
            require($rep . $vues['Error']);
        }
    }

//$tabErreur=[];
    //$action=NULL;
    //session_start();
    //new Controller();
    /*$listeAction_Admin=['seConnecterPage','seConnecter','seDeconnecter','ajouterArticle','supprimmerArticle','pageAjouterArticle'];
    try {
        $modelAdmin = new ModelAdmin();
        $admin=$modelAdmin::isAdmin();
        $action= $_REQUEST['action'] ?? NULL;//A voir si get ou post donc request + test si $_REQUEST['action'] existe sinon vaut null
        if(in_array($action,$listeAction_Admin)) //Vérifie présence action dans la liste d'action
        {
            if($admin!=NULL)
                require($rep.'vuePrincipal.php');
            else new AdminControler($tabErreur);

        }
        else new UtilisateurControler();
    }catch (Exception $e){
        require($rep.$vues['vueErreur']);
        //A voir si gère erreur catch
    }*/


}