<?php

class UserController
{
    public function __construct(User $admin = null) {
        global $rep, $vues;
        $errorArr = array ();

        if (!isset($admin)) {
            $errorArr[] = "You must be logged in to access this page";
            require($rep . $vues['Error']);
        }
        $action = $_GET['action'] ?? NULL;
        try {
            switch($action) {
                case "pageAjouterArticle":
                    $this->navPageAjouterArticle();
                    break;
                case"ajouterArticle":
                    $this->addArticle();
                    //header('Refresh: 3;url=page.php');
                    break;
                case"supprimerArticle":
                    $id = $_GET['feed'];
                    $this->deleteArticle($id);
                    //header('Refresh: 3;url=page.php');
                    break;
                case 'seDeconnecter':
                    $this->logOut();
                    break;
                default:
                    $errorArr[] = "Bad php call";
                    require ($rep.$vues['Error']);
                    break;
            }

        } catch (Throwable $e) {
            $errorArr[] =	$e->getMessage();
            require ($rep.$vues['Error']);
        }
        exit(0);
    }


    protected function navPageAjouterArticle()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        require($rep.$vues['addArticle']);
    }



    function addArticle()
    {

        //si exception, ca remonte !!!
        $titre = $_POST['titre']; // txtNom = nom du champ texte dans le formulaire
        $description = $_POST['description'];
        //Validation::valarticle($titre, $description, $dVueEreur);

        $model = new Model();
        $model->addArticle($titre,$description);
        header('Location: index.php?');

    }


    function deleteArticle($id)
    {
        $model = new Model();
        $model->deleteArticle($id);
        header('Location: index.php?');
    }

    public function logOut(): void
    {
        session_unset();
        session_destroy();
        $_SESSION = array();

        header('Location: index.php?');
    }
}