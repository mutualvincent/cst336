<?php
    include 'functions.php';
    include "dbConnection.php";
    $conn = getDatabaseConnection('final_project');
    
    // Start sessions
    session_start();
    
    // Create array to hold session
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    // Check if has query
    if(isset($_GET['movieName'])) {
        
        global $conn;
        
        $movieName = $_GET['movieName'];
        $directorName = $_GET['directorName'];
        $orderBy = $_GET['orderBy'];
        $catName = $_GET['genres'];
        
        if (!$orderBy) {
            $orderBy = 'movieId';
        }
        
        $sql = "SELECT * FROM movie
                    JOIN category ON movie.catId = category.catId
                    JOIN director ON movie.directorId = director.directorId
                    WHERE movie.movieName LIKE '%$movieName%' AND director.directorName LIKE '%$directorName%'
                    AND category.catName LIKE '%$catName%'
                    ORDER BY $orderBy";

        
        $stmt = $conn->prepare($sql);
        $stmt -> execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // If the 'itemName' is set put in session cart
    if (isset($_POST['itemName'])) {
        // Create assiative array
        $newItem = array();
        $newItem['name'] = $_POST['itemName'];
        $newItem['price'] = $_POST['itemPrice'];
        $newItem['img'] = $_POST['ItemImage'];
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
    
    function displayAllCategories() {
    
      global $conn;
     
      $sql = "SELECT * FROM category ORDER BY catId";
      $stmt = $conn->prepare($sql);
      $stmt -> execute();
      $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
      return $records;
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
        <title>Movie Page</title>
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
                  <li class="nav-item active">
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
                <h1>Search a movie</h1>
                
                <div class="jumbotron">
                    <div class="search-container">
                        <form enctype="text/plain">
                        <div class="form-group">
                            <label for="movieName"><strong>Movie Name</strong></label>
                            <input type="text" class="form-control" name="movieName" id="movieName" placeholder="Movie Name" >
                        </div>
                        <div class="form-group">
                            <label for="directorName"><strong>Director</strong></label>
                            <input type="text" class="form-control" name="directorName" id="directorName" placeholder="Director Name">
                        </div>
                        <label for="bName"><strong>Genres</strong> </label><br>
                    
                        <select id="genres" name="genres" class="form-control">
                              <option value=""> Select One </option>

                              <?php
                                $records = displayAllCategories();
                                foreach($records as $record) {
                                  echo "<option value=" . $record['catName']. ">" . $record['catName']. "</option>";
                                }
                              ?>
                            </select>
                        <br><br>
                        
                        <label for="bName"><strong>Order By</strong></label>
                        <br/>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="orderBy" value="price ASC" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline1">Price (ASC)</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="orderBy" value="price DESC" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">Price (DESC)</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline3" name="orderBy" value="movieName" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline3">Name</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline4" name="orderBy" value="movieYear" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline4">Year</label>
                        </div>
                        
                        <div style="margin-top: 25px">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    

                        
                    </form>
                    </div>
                    
                    <div style="margin-top: 25px;">

                        <!-- Display Search Results -->
                    <?php displayResults(); ?>
                        
                    </div>
                    
        
                </div>
                
                
                
            </div>
                
            </div>
            
    
        </div>
    </div>
    </body>
</html>