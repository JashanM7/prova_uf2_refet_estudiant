<?php 
    include_once(__DIR__ . "/../Models/Rent.php");

    class rentController extends Controller{
            
            public function store(){

                $idScooter = $_GET["id_scooter"];

                $rentModel = new Rent();
                
                $dataNow = new DateTime("now",new DateTimeZone("Europe/Madrid"));

                #Exemple de lloguer
                $rent = [
                    'id' => $_SESSION['id_rent']++,//id de lloguer,
                    'id_scooter' => $idScooter,//id del patinet associat
                    'user' => $_SESSION['username_logged'],//usuari que lloga
                    'start' => $dataNow,//datetime inici lloguer
                    'end' => null//Fi de lloguer (null si no ha acabat)
                ];

                $rentModel->insert($rent);

                $_SESSION["msgFlashScooter"] = '<div class="alert alert-success" role="alert">Rent created</div>';

                header("Location: /scooter/index");
                die();

            }

            public function finish(){
                $idScooter = $_GET["id_scooter"];

                $rentModel = new Rent();
                $rentOriginal = $rentModel->getRentWithScooterId($idScooter);

                $dataEnd = new DateTime("now",new DateTimeZone("Europe/Madrid"));

                $rent = [
                    'id' => $rentOriginal["id"],//id de lloguer,
                    'id_scooter' => $rentOriginal["id_scooter"],//id del patinet associat
                    'user' => $rentOriginal["user"],//usuari que lloga
                    'start' => $rentOriginal["start"],//datetime inici lloguer
                    'end' => $dataEnd//Fi de lloguer (null si no ha acabat)
                ];

                $rentModel->update($rent);

                $_SESSION["msgFlashScooter"] = '<div class="alert alert-success" role="alert">Rent finished</div>';

                header("Location: /scooter/index");
                die();

            }


            public function index(){
                //Mètode per renderitzar la vista de lloguers

            }

    }

?>