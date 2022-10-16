<?php

class Model
{
    public function getAllArticle(){
        global $base, $login, $mdp;
        $articleGateway = new ArticleGateway(new Connection($base,$login,$mdp));

        return $articleGateway->selectAll();
    }

    public function addArticle(string $titre, string $description){
        global $base, $login, $mdp;
        $articleGateway = new ArticleGateway(new Connection($base,$login,$mdp));
        $articleGateway->insert($titre,$description);
    }

    public function deleteArticle(string $id)
    {
        global $base, $login, $mdp;
        $articleGateway = new ArticleGateway(new Connection($base,$login,$mdp));
        $articleGateway->delete($id);
    }

    public function getUser($username, $password)
    {
        global $base, $login, $mdp;

        $hasPass = (new UserGateway(new Connection($base, $login, $mdp)))->selectAdmin($username);
        //var_dump($hasPass);
        if ($hasPass === null) {
            return null;
        }
        //password_verify($password, $hasPass)
        if ($password == $hasPass) {
            $_SESSION['role'] = "admin";
            $_SESSION['username'] = $username;
            return new User($username, $password);
        }

        return null;
    }

    public function isAdmin() : ?User
    {
        if(isset($_SESSION['role'], $_SESSION['username'])) {
            $role = $_SESSION['role'];
            $username = $_SESSION['username'];
            //var_dump($role);
            return new User($role, $username);
        }

        return null;
    }

    public function addUser($username, $password)
    {
        global $base, $login, $mdp;
        $userGateway = new UserGateway(new Connection($base,$login,$mdp));
        $userGateway->insertUser($username,$password);
    }


}