<?php
    session_start();
    include "../lab6/dbConnection.php";

    $conn = getDatabaseConnection("ottermart");
    
    $sql = "DELETE
            FROM om_product
            WHERE productId = " . $_GET['productId'];
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
    header("Location:admin.php");
?>    

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

    </body>
</html>