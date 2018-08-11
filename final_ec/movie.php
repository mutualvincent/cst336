<?php

    include "dbConnection.php";
    $conn = getDatabaseConnection('final_project');
    
    if(isset($_POST['getMovieData'])) {
          $sql = "SELECT * FROM movie WHERE movieId = " . $_POST['movieId'];
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

          echo json_encode($records);

    }
    
    if(isset($_POST['editMovie'])) {
        
        $sql = "UPDATE movie
                SET movieName = :movieName, movieYear = :movieYear, price = :moviePrice, movieDescription = :movieDescription,
                movieImage = :movieImage, catId = :movieCategoryId, directorId = :movieDirectorId, movieBudget = :movieBudget, movieReview = :movieReview
                WHERE movieId = :movieId";
                
        $np = array();
        $np[':movieName'] = $_POST['movieName'];
        $np[':movieYear'] = $_POST['movieYear'];
        $np[':moviePrice'] = $_POST['moviePrice'];
        $np[':movieDescription'] = $_POST['movieDescription'];
        $np[':movieImage'] = $_POST['movieImage'];
        $np[':movieCategoryId'] = $_POST['movieCategory'];
        $np[':movieDirectorId'] = $_POST['movieDirector'];
        $np[':movieBudget'] = $_POST['movieBudget'];
        $np[':movieReview'] = $_POST['movieReview'];
        $np[':movieId'] = $_POST['movieId'];
        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        
    }
    
    if(isset($_POST['createMovie'])) {
        
        $movieName = $_POST['movieName'];
        $movieYear = $_POST['movieYear'];
        $moviePrice = $_POST['moviePrice'];
        $movieDescription = $_POST['movieDescription'];
        $movieImage = $_POST['movieImage'];
        $movieBudget = $_POST['movieBudget'];
        $movieReview = $_POST['movieReview'];
        $movieCategory = $_POST['movieCategory'];
        $movieDirector = $_POST['movieDirector'];

        $sql = "INSERT INTO movie
                ( movieName, movieYear, price, movieDescription, movieImage, movieBudget, movieReview, catId, directorId )
                Values (:movieName, :movieYear, :moviePrice, :movieDescription, :movieImage, :movieBudget, :movieReview, :movieCategory, :movieDirector)";
    
        $namedParameters = array();
        $namedParameters[':movieName'] = $movieName;
        $namedParameters[':movieYear'] = $movieYear;
        $namedParameters[':moviePrice'] = $moviePrice;
        $namedParameters[':movieDescription'] = $movieDescription;
        $namedParameters[':movieImage'] = $movieImage;
        $namedParameters[':movieBudget'] = $movieBudget;
        $namedParameters[':movieReview'] = $movieReview;
        $namedParameters[':movieCategory'] = $movieCategory;
        $namedParameters[':movieDirector'] = $movieDirector;
    
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
    }
    
    if(isset($_POST['deleteMovie'])) {
        $movieId = $_POST['movieId'];
        $sql = "DELETE FROM movie WHERE movieId = " . $movieId;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

?>