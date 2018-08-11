<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Movie Rental - Admin Site</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        
        <div class="container">
           <h1 class="text-center"> Movie Admin Site</h1>
        
        
        <form method="POST" action="loginProcess.php">
            Username: <input type="text" name="username" class="form-control" /> <br />
            Password: <input type="password" name="password" class="form-control" /> <br />
            
            <input type="submit" name="submitForm" value="Login" class="btn btn-success btn-block" />
            <?php
            
                if($_SESSION['incorrect']) {
                    echo "<p class = 'lead' id='error' style='color:red'>";
                    echo "<strong>Incorrect Username or Password!</strong></p>";
                }
            
            
            ?>
        </form> 
        </div>
    
    </body>
</html>