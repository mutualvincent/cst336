<?php
    include 'functions.php';
    
    // Start sessions
    session_start();
    
    // Create array to hold session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    // Check if has query
    if(isset($_GET['query'])) {
        // ACCESS TO API
        include 'wmapi.php';
        $items = getProducts($_GET['query']);
    }
    
    // If the 'itemName' is set put in session cart
    if (isset($_POST['itemName'])) {
        // Create assiative array
        $newItem = array();
        $newItem['name'] = $_POST['itemName'];
        $newItem['price'] = $_POST['itemPrice'];
        $newItem['img'] = $_POST['itemImg'];
        $newItem['id'] = $_POST['itemId'];

        // Check to see if other items with this id are in the array
        foreach ($_SESSION['cart'] as &$item) {
            if ($newItem['id'] == $item['id']) {
                $item['quantity'] += 1;
                $found = true;
            }
        }
        
        // else add to array
        
        if ($found != true) {
            $newItem['quantity'] = 1;
            array_push($_SESSION['cart'], $newItem);
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
        <title>Movie Rental 101</title>
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
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a href="./search.php" class="nav-link" href="#">Search</a>
                  </li>
                  <li class="nav-item">
                    <a href="./cart.php" class="nav-link" href="#">Cart: <?php displaycartCount(); ?></a>
                  </li>
                  <li class="nav-item">
                    <a href="./login.php" class="nav-link" href="#">Login</a>
                  </li>
                 
                </ul>
            
              </div>
            </nav>
        
            <br /> <br /> <br />
            
            <div class="container">
                <div class="jumbotron">
  <h1 class="display-4">Movie Rental</h1>
  <p class="lead">We provide lots of movie.</p>
 
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="./search.php" role="button">Find a movie</a>
  </p>
</div>
                
            </div>
        
        </div>
    </div>
    </body>
</html>