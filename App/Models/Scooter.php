<?php


    class Scooter extends Orm{

        public function __construct() {
            parent::__construct('scooters');   
        }


        public function createTable(){

            $db = new Database();

            $sql = "CREATE TABLE ins.scooters (id INT NOT NULL AUTO_INCREMENT , brain VARCHAR(250) NOT NULL , model VARCHAR(250) NOT NULL , img VARCHAR(250) NOT NULL , price FLOAT NOT NULL , user_rent VARCHAR(250) NULL , PRIMARY KEY (id)) ENGINE = InnoDB";

            $db->queryDataBase($sql);


        }

       

    }

?>