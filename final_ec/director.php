<?php

    include "dbConnection.php";
    $conn = getDatabaseConnection('final_project');
    
    if(isset($_POST['getDirectorData'])) {
          $sql = "SELECT * FROM director WHERE directorId = " . $_POST['directorId'];
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

          echo json_encode($records);

    }
    
    if(isset($_POST['editDirector'])) {
        
        $sql = "UPDATE director
                SET directorName = :directorName
                WHERE directorId = :directorId";
                
        $np = array();
        $np[':directorName'] = $_POST['directorName'];
        $np[':directorId'] = $_POST['directorId'];
        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
        
    }
    
    if(isset($_POST['createDirector'])) {
        
        $directorName = $_POST['directorName'];

        $sql = "INSERT INTO director
                ( directorName )
                Values (:directorName)";
    
        $namedParameters = array();
        $namedParameters[':directorName'] = $directorName;
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
    }
    
    if(isset($_POST['deleteDirector'])) {
        $directorId = $_POST['directorId'];
        $sql = "DELETE FROM director WHERE directorId = " . $directorId;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

?>