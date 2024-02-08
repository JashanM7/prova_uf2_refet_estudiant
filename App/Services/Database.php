<?php

class Database
{
    private $connection;
    private $db_host;
    private $db_name;
    private $db_user;
    private $password;

    public function __construct()
    {

        $this->db_host = $_ENV["DB_HOST"];
        $this->db_host = $_ENV["DB_NAME"];
        $this->db_host = $_ENV["DB_USER"];
        $this->db_host = $_ENV["DB_PASSWORD"];

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        
        $this->connection = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->password, $options);

        $this->connection->exec("SET CHARACTER SET UTF8");
    }

    public function getConnection()
    {
        return $this->connection;
    }



    public function closeConnection()
    {
        $this->connection = null;
    }

    public function queryDataBase($sql, $params = null)
    {
        
        try {
            $statement = $this->connection->prepare($sql);
            if($params != null) {
                $statement->execute($params);
            } else {
                $statement->execute();
            }
            $this->connection = null;
            return $statement;
        } catch (Exception $ex) {
            $error = $ex->getMessage();
            echo $ex->getMessage();
            $this->connection = null;
            return null;
        }

    }


}