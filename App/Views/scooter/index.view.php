<?php
include_once(__DIR__ . "../../../Models/Rent.php");
?>
<h1 class="text-center mt-3 text-danger">Hello <?php echo $params["username"] ?>!!!</h1>


<?php
if($params["username"] == "admin"){


?>

<form action="/scooter/store" method="post" class="col-11 col-md-9 col-lg-6 col-xl-5 p-4 mt-4 mx-auto border" enctype="multipart/form-data">

<h2 class="mt-2">New Scooter</h2>
<div class="mb-3">
    <label for="brain" class="form-label">Brain</label>
    <input type="text" class="form-control" name="brain" id="brain" aria-describedby="helpId" placeholder="" value="<?php echo $_SESSION["brain"] ?? null ?>">
</div>
<div class="mb-3">
    <label for="model" class="form-label">Model</label>
    <input type="text" class="form-control" name="model" id="model" aria-describedby="helpId" placeholder="" value="<?php echo $_SESSION["model"] ?? null ?>">
</div>
<div class="mb-3">
    <label for="img" class="form-label">Image</label>
    <input type="file" class="form-control" name="img" id="img" aria-describedby="helpId" placeholder="" value="">
</div>
<div class="mb-3">
    <label for="price" class="form-label">Price per minute</label>
    <input type="number" class="form-control" name="price" id="birthdate" aria-describedby="helpId" placeholder="" value="<?php echo $_SESSION["price"] ?? null ?>">
</div>

<button type="submit" class="btn btn-primary mb-2" name="scooter_store">Save</button>
<button type="reset" class="btn btn-danger mb-2">Reset</button>


</form>


<?php
}

if(isset($params["msgFlashScooter"])){
    ?>

    <?php
    echo $params["msgFlashScooter"];
    unset($params["msgFlashScooter"]);
    
}
?>




<div class="list_scooters col-11 col-lg-10 mx-auto mt-4">
        <table class="table">
        <h2>Scooter's list</h2>
        
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Brain</th>
                    <th scope="col">Model</th>
                    <th scope="col">Price / Minute</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                
                </tr>
            </thead>
            <tbody>
                
                    <?php
                    foreach ($params["llistaScooters"] as $scooter) {
                    
                    ?>



                    <tr>
                        <th scope="row">
                            <img src="/var/www/html/../../../Public/Assets/scooters/<?php echo $scooter["img"] ?>" alt="" style="width: 100px; height: 100px;">
                        </th>
                        <td class="align-middle">  <?php echo $scooter["brain"] ?>  </td>
                        <td class="align-middle"> <?php echo $scooter["model"] ?> </td>
                        <td class="align-middle">  <?php echo $scooter["price"] ?> </td>
                        <td class="align-middle">

                        <?php
                              if($_SESSION["username_logged"] == "admin"){

                        ?>
                                                            <a class="btn btn-danger" href="/scooter/destroy/?id=<?php echo $scooter["id"]?>">Remove</a></td>
                                                            <td class="align-middle"> <a class="btn btn-info" href="/scooter/updateGoToVista/?id=<?php echo $scooter["id"]?>">Editar</a></td>

                                                            <?php
                              }else{


                                $rentModel = new Rent();
                                echo $rentModel->checkIfIdScooterIsRentingTambeUsername($scooter["id"], $params["username"]);

                                
                                                            ?>

                                <?php
                                }
                                ?>
                    </tr>

                    <?php
                    }
                    ?>
                   

            
                  
            
                    

            

                        </tbody>
    </table>

    <?php 


if(isset($_SESSION["brain"])){
    unset($_SESSION["brain"]);
}

if(isset($_SESSION["price"])){
    unset($_SESSION["price"]);
}

if(isset($_SESSION["model"])){
    unset($_SESSION["model"]);
}


?>