<?php

class ArticleGateway
{
    private $con;

    /**
     * @param $con
     */
    public function __construct(Connection $con)
    {
        $this->con=$con;
    }

    public function selectAll():array{
        $query='SELECT * FROM tArticle ORDER BY date DESC';
        $this->con->executeQuery($query, []);
        $res = $this->con->getResults();
        $tabN = array();
        foreach ($res as $row) {
            $tabN[] = new Article($row['id'], $row['titre'], $row['date'],$row['Description']);
        }
        return $tabN;

    }

    /** * Selectionner un article
     * @param string $id
     * @return array Returns `true` on success, `false` otherwise
     */
    public function select(int $id):array{
        $query = 'SELECT * FROM tArticle WHERE id = :id ORDER BY date';
        $params = array(
            ':id' => array($id, PDO::PARAM_STR)
        );
        $this->con->executeQuery($query, $params);
        // conversion en objets
        $res = $this->con->getResults();
        $tabN = array();
        foreach ($res as $row) {
            $tabN[] = new Article($row['id'], $row['titre'], $row['date'],$row['description']);
        }
        return $tabN;
    }

    /** * Inserer un article
     * @param int $id
     * @param string $nom
     * @param string $description
     * @return void Returns `true` on success, `false` otherwise
     */
    public function insert(string $titre, string $description)
    {
        $query = 'INSERT INTO tArticle(titre,description,date) VALUES(:titre, :description,current_date)';
        $params = array(
            ':titre'=>array($titre,PDO::PARAM_STR),
            ':description'=>array($description,PDO::PARAM_STR)
        );
        $this->con->executeQuery($query,$params);
    }

    /** * Supprimer un article
     * @param string $titre
     * @return void Returns `true` on success, `false` otherwise
     */
    public function delete(string $id)
    {
        $query = 'DELETE FROM tArticle WHERE id=:id';
        $params = array(
            ':id'=>array($id,PDO::PARAM_STR)
        );
        $this->con->executeQuery($query,$params);
    }


}