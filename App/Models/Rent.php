<?php
include_once(__DIR__ . "../../Services/Database.php");
include_once(__DIR__ . "/Scooter.php");


    class Rent extends Orm{

        public function __construct() {
            parent::__construct('rents');
        }


        public function checkIfIdScooterIsRentingTambeUsername($idScooter, $username){

            foreach ($_SESSION["rents"] as $elRent) {
                if($elRent["id_scooter"] == $idScooter){

                    //
                    if($elRent["user"] == $username && $elRent["end"] == null ){
                        return '<a class="btn btn-success" href="/rent/finish/?id_scooter=' .$idScooter. '">Finish</a>'; 
                    }else{
                        return '<a class="btn btn-warning disabled" href="">Not available</a>';
                    }
                
                }
            }

            return '<a class="btn btn-primary" href="/rent/store/?id_scooter='.$idScooter.'">Rent</a>';


        }


        public function getRentWithScooterId($scooterId){

            $sql = "SELECT * FROM $this->model WHERE id_scooter=:id";

            $params = array(
                ":id" => $scooterId
            );

            $db = new Database();
            $result = $db->queryDataBase($sql,$params);

            return $result;
        }

        public static function createTable(){

            $db = new Database();

            $sql = "CREATE TABLE IF NOT EXISTS ins.rents(
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            user VARCHAR(256) NOT NULL,
            start DATETIME NOT NULL,
            end DATETIME,
            id_scooter INT NOT NULL,
            FOREIGN KEY (id_scooter) REFERENCES ins.scooters(id) ON DELETE CASCADE)
            ENGINE=InnoDB;";

            $db->queryDataBase($sql);

        }

   }

   

?>