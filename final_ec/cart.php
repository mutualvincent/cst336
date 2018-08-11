<?php

    include 'functions.php';
    session_start();
    
    // If removeId has sent search for cart for that item and unset it
    if (isset($_POST['removeId'])) {
        foreach ($_SESSION['cart'] as $itemKey => $item) {
            if ($item['id'] == $_POST['removeId']) {
                unset($_SESSION['cart'][$itemKey]);
            }
        }
    }
    
    // If 'itemId' quantity has been sent search for the item that ID and Update quantity
    if (isset($_POST['itemId'])) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $_POST['itemId']) {
                $item['quantity'] = $_POST['update'];
                
            }
        }
    }



?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        
        <title>Shopping Cart</title>
    </head>
    <body>
        <div class='container'>
            <div class='text-center'>
                
                <!-- Bootstrap Navagation Bar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <a class="navbar-brand" href="./">Movie Rental</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link" href="./">Home </a>
                  </li>
                  <li class="nav-item">
                    <a href="./search.php" class="nav-link" href="#">Search</a>
                  </li>
                  <li class="nav-item active">
                    <a href="./cart.php" class="nav-link" href="#">Cart: <?php displaycartCount(); ?></a>
                  </li>
                  <li class="nav-item">
                    <a href="./login.php" class="nav-link" href="#">Login</a>
                  </li>
                  

                 
                </ul>
            
              </div>
            </nav>
                <br /> <br /> <br />
                <h2>Movie Rental Cart</h2>
                <!-- Cart Items -->
                
                <?php displayCart(); ?>

            </div>
        </div>
    </body>
</html>