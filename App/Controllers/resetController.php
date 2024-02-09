<?php 

    include_once(__DIR__ . "/../Models/Scooter.php");
    include_once(__DIR__ . "/../Models/Rent.php");

    class resetController extends Controller{
            
            public function run(){
                
                $db = new Database();
                $sql = "DROP TABLE IF EXISTS scooters, rents";
                $db->queryDataBase($sql);

                Scooter::createTable();
                Rent::createTable();

                $scooterModel = new Scooter();
                $scooter = [
                    'brain'=> 'Dualtron',
                    'model' => 'Achilleus EY4',
                    'img' => 'p1.jpg',
                    'price' => 0.45,
                    'user_rent' => null,

                ];
                
                $scooterModel->insert($scooter);

                $scooter = [
                    'brain'=> 'Dualtron',
                    'model' => 'City',
                    'img' => 'p2.jpeg',
                    'price' => 0.48,
                    'user_rent' => null,

                ];

                $scooterModel->insert($scooter);

                $scooter = [
                    'brain'=> 'Dualtron',
                    'model' => 'Spider',
                    'img' => 'p3.jpeg',
                    'price' => 0.50,
                    'user_rent' => null,

                ];

                $scooterModel->insert($scooter);

                $scooter = [
                    'brain'=> 'Xiaomi',
                    'model' => 'M365',
                    'img' => 'p4.jpeg',
                    'price' => 0.35,
                    'user_rent' => null,

                ];

                $scooterModel->insert($scooter);

                $scooter = [
                    'brain'=> 'Xiaomi',
                    'model' => 'M365 Pro',
                    'img' => 'p5.jpeg',
                    'price' => 0.40,
                    'user_rent' => null,

                ];

                $scooterModel->insert($scooter);

                $scooter = [
                    'brain'=> 'Bluetran',
                    'model' => 'Lightning 72V',
                    'img' => 'p6.jpg',
                    'price' => 0.53,
                    'user_rent' => null, 

                ];

                $rentModel = new Rent();

                $startDT = new DateTime("now",new DateTimeZone("Europe/Madrid"));

                $rent = [
                    "id_scooter" => 1,
                    "user" => "Hector",
                    "start" => $startDT->format("Y-m-d H:i:s"),
                    "end" => null,
                ];

                $rentModel->insert($rent);

                header("Location: /main/index");
            }

    }

?>