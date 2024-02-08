<?php
include_once(__DIR__ . "/Scooter.php");


    class Rent extends Orm{

        public function __construct() {
            parent::__construct('rents');
            if(!isset($_SESSION['id_rent'])){
                $_SESSION['id_rent'] = '1';
            }        
           
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

            foreach ($_SESSION["rents"] as $elRent) {
                if($elRent["id_scooter"] == $scooterId){
                    return $elRent;
                }
            }

            return null;

        }

   }

   

?>