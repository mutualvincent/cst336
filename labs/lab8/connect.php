<?php

function getDBConnection() {
    
    /*C9 db info
    $host = "localhost";
    $dbName = "csumb_quiz";
    // $username = getenv("C9_USER");
    $username = 'yojiang';
    $password = "";
    */
    
    // Heroku C9 db
    $host = "us-cdbr-iron-east-04.cleardb.net";
    $dbName = "heroku_c40a51d41afcea7";
    $username = "b15a99be77ec75";
    $password = "249b90c2";
    
    //when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbName = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 
    
    try {
        //Creates a database connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
    
        // Setting Errorhandling to Exception
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }
    catch (PDOException $e) {
       echo "Problems connecting to database!";
       exit();
    }
    
    
    return $dbConn;
}

?>