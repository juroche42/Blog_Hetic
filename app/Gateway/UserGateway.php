<?php

class UserGateway
{
    private Connection $con;

    /**
     * @param $con
     */
    public function __construct($con)
    {
        $this->con = $con;
    }

    /**
     * @param string $username
     * @param string $hashPass
     * @return int
     */
    public function insertUser(string $username, string $hashPass)
    {
        $query = "INSERT INTO user VALUES (:username, :password)";
        $this->con->executeQuery($query, [
            ':username' => array($username, PDO::PARAM_STR),
            ':password' => array($hashPass, PDO::PARAM_STR)
        ]);

        //return $this->con->lastInsertId();
    }

    /**
     * @param string $username
     * @return string|null
     */
    public function selectAdmin(string $username) : ?string
    {
        $query = "SELECT password FROM user WHERE username = :username";
        $this->con->executeQuery($query, [
            ':username' => array($username, PDO::PARAM_STR)
        ]);

        $result = $this->con->getResults();
        if (empty($result)) {
            return null;
        }

        return $result[0]['password'];
    }

    protected function insert($username, $password)
    {

    }
}