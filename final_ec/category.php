<?php

    include "dbConnection.php";
    $conn = getDatabaseConnection('final_project');
    
    if(isset($_POST['getCategoryData'])) {
          $sql = "SELECT * FROM category WHERE catId = " . $_POST['categoryId'];
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

          echo json_encode($records);

    }
    
    if(isset($_POST['editCategory'])) {
        
        $sql = "UPDATE category
                SET catName = :catName,
                    catDescription = :catDescription
                WHERE catId = :catId";
                
        $np = array();
        $np[':catName'] = $_POST['categoryName'];
        $np[':catDescription'] = $_POST['categoryDescription'];
        $np[':catId'] =  $_POST['categoryId'];

        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        
    }
    
    if(isset($_POST['submitCategory'])) {
        
        $categoryName = $_POST['categoryName'];
        $categoryDescription = $_POST['categoryDescription'];

        $sql = "INSERT INTO category
                ( catName, catDescription )
                Values (:categoryName, :categoryDescription)";
    
        $namedParameters = array();
        $namedParameters[':categoryName'] = $categoryName;
        $namedParameters[':categoryDescription'] = $categoryDescription;
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
    }
    
    if(isset($_POST['deleteCategory'])) {
        $categoryId = $_POST['categoryId'];
        $sql = "DELETE FROM category WHERE catId = " . $categoryId;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

?>