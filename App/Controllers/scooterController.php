<?php
    include_once(__DIR__ . "/../Models/Scooter.php");
    include_once(__DIR__ . "/../Core/Store.php");
    include_once(__DIR__ . "/../Models/Rent.php");
    include_once(__DIR__ . "/../Helpers/fun.php");

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

    public function updateGoToVista()
    {

        $idScooter = $_GET["id"];

        $scooterModel = new Scooter();
        $params["scooter"] = $scooterModel->getById($idScooter);
      
        $this->render("scooter/update", $params, "site");
        die();

    }

    public function update()
    {

        $idScooter = $_POST["id"];
        $brain = $_POST["brain"];
        $model = $_POST["model"];
        //$img = $_FILES["img"]["tmp_name"];
        $price = $_POST["price"];
        $user_rent = $_POST["user_rent"];

        $nomFitxer = guardaUnaImatgeRetornaNomFitxer($_FILES["img"]);

        $scooter = [
            "id" => $idScooter,
            'brain'=> $brain,
            'model' => $model,
            'img' => $nomFitxer,
            'price' => $price,
            'user_rent' => $user_rent,
        ];

        $scooterModel = new Scooter();
        $scooterModel->insert($scooter);

        $_SESSION["msgFlashScooter"] = '<div class="alert alert-info" role="alert">Scooter updated</div>';        

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

                $nomFitxer = guardaUnaImatgeRetornaNomFitxer($_FILES["img"]);

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
    


