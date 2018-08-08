<?php
    session_start();
    include "dbConnection.php";
    
    $conn = getDatabaseConnection("final_project");
    
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    $sql = "SELECT *
            FROM admin
            WHERE username = :username
            AND password = :password";
            
            
    $namedParameters = array();
    $namedParameters[":username"] = $username;
    $namedParameters[":password"] = $password;
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(empty($record)) {
        $_SESSION['incorrect'] = true;
        header("Location:login.php");
    } else {
        $_SESSION['incorrect'] = false;
        $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
        header("Location:admin.php");
    }
    
    
?>