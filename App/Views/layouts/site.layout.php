<?php  ?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="<?php echo '/Public/Assets/css/bootstrap.min.css' ?>" rel="stylesheet">

</head>

<body>
  <header>
    <nav class="p-2 h3 d-flex justify-content-between bg-secondary align-items-center">
      <div class="left">
        <i class="text-white">Scooters Rent Cirviànum</i>
      </div>
      <div class="mt-2 right text-white h5 align-self-center">

      
<?php
    if(isset($_SESSION["username_logged"])){

      ?>
        <a class="text-white text-decoration-none" href="/user/logout">LogOut | </a>
<a class="text-white text-decoration-none" href="">Scooter | </a>


      <?php
      if($_SESSION["username_logged"] == "admin"){


        
        ?>

        <a class="text-white text-decoration-none" href="">Rents | </a>
        <a class="text-white text-decoration-none" href="/items/index">Items</a>


<?php
      }

?>

      


        <?php
      
}

?>





        <a class="text-white text-decoration-none" href="/reset/run">Reset </a>


        

      </div>
    </nav>
  </header>
  <main>
    <?php echo $content; ?>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="<?php echo '/Public/Assets/js/popper.min.js' ?>"></script>
  <script src="<?php echo '/Public/Assets/js/bootstrap.min.js' ?>"></script>

</body>

</html>