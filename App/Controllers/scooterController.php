<?php
    include_once(__DIR__ . "/../Models/Scooter.php");
    include_once(__DIR__ . "/../Core/Store.php");
    include_once(__DIR__ . "/../Models/Rent.php");



class scooterController extends Controller
{

    public function index()
    {
        //preparar i renderitzar vista ppal de patinets

        if(!isset($_POST["username"])){
            $params["username"] = $_SESSION["username_logged"];
        }else{
            $params["username"] = $_POST["username"];
            $_SESSION["username_logged"] = $params["username"];
        }
    
        $scooterModel = new Scooter();
        $params["llistaScooters"] = $scooterModel->getAll();

        if(isset($_SESSION["msgFlashScooter"])){
            $params["msgFlashScooter"] = $_SESSION["msgFlashScooter"];
            unset($_SESSION["msgFlashScooter"]);
        }

        


        $this->render("scooter/index", $params, "site");
        die();
    }


    public function destroy()
    {
        //Eliminar patinet

        $idScooter = $_GET["id"];
        $scooterModel = new Scooter();
        $scooterModel->deleteById($idScooter);

        $_SESSION["msgFlashScooter"] = '<div class="alert alert-success" role="alert">Scooter deleted</div>';

        header("Location: /scooter/index");
        die();



    }

    public function store()
    {
        //Mètode per crear un patinet

        //Recuperar la extensió de la imatge guardada:

            $brain = $_POST["brain"];
            $price = $_POST["price"];
            $model = $_POST["model"];

            if(!isset($price) || !isset($model) || !isset($brain) || $_FILES["img"]["name"] == ""){

                $_SESSION["msgFlashScooter"] = '<div class="alert alert-danger" role="alert">All fields are required</div>';

                $_SESSION["brain"] = $brain;
                $_SESSION["model"] = $model;
                $_SESSION["price"] = $price;


                header("Location: /scooter/index");
                die();

            }


                $origen = $_FILES["img"]["tmp_name"];
                $desti = "scooters/"; 

                $array = explode(".", $_FILES['img']['name']);
                $extensio = $array[count($array) - 1];

                if(!isset($_SESSION["counterImatges"])){
                    $_SESSION["counterImatges"] = 7;
                }


                $nomFitxer = "p" . $_SESSION["counterImatges"] . ".". $extensio;

                $_SESSION["counterImatges"]++;

                Store::store($origen, $desti, $nomFitxer);


                $nouScooter = [
                    'brain'=> $brain,
                    'model' => $model,
                    'img' => $nomFitxer,
                    'price' => $price,
                    'user_rent' => null,

                ];

                $scooterModel = new Scooter();
                $scooterModel->insert($nouScooter);

                header("Location: /scooter/index");
                die();

            
        }
    }
    


