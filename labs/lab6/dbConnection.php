<?php
    function getDatabaseConnection($dbname = 'ottermart') {
        
        // C9 db info
        // $host = 'localhost';
        // $dbname = 'tcp';
        // $username = 'yojiang';
        // $password = '';
        
        // Heroku C9 db
        $host = "us-cdbr-iron-east-04.cleardb.net";
        $dbName = "heroku_c40a51d41afcea7";
        $username = "b15a99be77ec75";
        $password = "249b90c2";

        
        /* when connecting from Heroku
        if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
            $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
            $host = $url["host"];
            $dbname = substr($url["path"], 1);
            $username = $url["user"];
            $password = $url["pass"];
        } 
        */
        
        //creates db connection
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        
        //display errors when accessing tables
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $dbConn;
    }    
?>