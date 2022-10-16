<?php

class Article
{
    private $id;
    private $titre;
    private $date;
    private $description;//Possède des articles
    //private $tabCommentaire; //Un article à une collectino de commentaires

    /**
     * @param $id
     * @param $titre
     * @param $date
     * @param $description
     */
    public function __construct(int $id, string $titre,  $date, string $description)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->date = $date;
        $this->description = $description;
        //$this->tabCommentaire = [];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "$this->date : $this->titre <br>$this->description";//Nom article ?
    }

}