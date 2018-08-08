<?php
    session_start();
    include 'connect.php';

    function get_heroes() {
        $connect = getDBConnection('final');

        $sql = "SELECT * 
                FROM superhero
                ORDER BY firstName";

        $stmt = $connect->prepare($sql);
        $stmt->execute($data);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_lists () {
        $heroes = get_heroes ();
        foreach ($heroes as $hero) {
            $hero_fn = $hero['firstName'];
            $hero_ln = $hero['lastName'];
            
            echo "<option>$hero_fn $hero_ln</option>";
        }
    }
    
    function displayImage() {
        $images = array("img/superheros/batman.png", "img/superheros/captain_america.png", "img/superhero/hulk.png", "img/superhero/iron_man.png", "img/superhero/spiderman.png", "img/superhero/superman.png", "img/superhero/wonder_woman.png");
        $randomNum = rand(0, (count($images) - 1));
        
        echo '<img src="' . $images[$randomNum] . '"width="100" height="100">';
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Final Exam: Part 1</title>
        <script src="js/jquery.min.js"></script>
        <link  href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="js/bootstrap.min.js"></script>
        <script>
            
        </script>
        <style>
            .jumbotron, #feedback, #stats {
                text-align:center;
                margin:0px;
            }
        </style>        
    </head>
    <body>
       <div class="jumbotron">
            <h3>What is the real name of the following superhero?</h3>
    
    <img id="heroImage">
        <script>
            displayImage ();
            // $("heroImage").attr("src", displayImage());
        </script>
    </img>

    <form>
        <select>
          <option value=""> Select One </option>
            <option>Bruce Banner</option><option>Bruce Wayne</option><option>Clark Kent</option><option>Diana Prince</option><option>Peter Parker</option><option>Steve Rogers</option><option>Tony Stark</option>        </select>
        <br /><br />
        <input type="button" value="Check Answer" />
    </form>
    <br />
    </div>
    
    <div id="feedback">    
    </div>

    <div id="stats">
    </div>
    
    </body>
    
   
  <table border="1" width="600" cellpadding="10px">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
     <tr style="background-color:#FFFFFF">
      <td>1</td>
      <td>A random image of a superhero is displayed when refreshing the page <br></td>
      <td width="20" align="center">15</td>
     </tr>     
     <tr style="background-color:#FFFFFF">
      <td>2</td>
      <td><p>The "real names" of the superheroes in the dropdown menu come from the database (without duplicates and in alphabetical order) <br>
        </p></td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#FFFFFF">
      <td>3</td>
      <td>An error message is displayed if the user clicks on the "Check Answer" button without selecting anything. <br></td>
      <td width="20" align="center">10</td>
    </tr>     
     <tr style="background-color:#FFFFFF">
      <td>4</td>
      <td>The right color-coded feedback (correct or incorrect) is displayed upon clicking on the "Check Answer" button <br></td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#FFFFFF">
      <td>5</td>
      <td>The number of times the real name for the specific superhero has been answered correctly and incorrectly is stored in the database, via AJAX (you'll need to create a new table, you decide the structure)<br></td>
      <td width="20" align="center">15</td>
    </tr>     

     <tr style="background-color:#FFFFFF">
      <td>6</td>
      <td>The updated number of times for total of correct and incorrect answers (for the specific superhero) is displayed, via AJAX <br></td>
      <td width="20" align="center">15</td>
    </tr>
     
     <tr style="background-color:#FFFFFF">
      <td>7</td>
      <td>The spinning images (indicating that data is being loaded) are displayed and replaced when the data is retrieved, via AJAX</td>
      <td width="20" align="center">5</td>
    </tr> 

     <tr style="background-color:#99E999">
      <td>8</td>
      <td>This rubric is properly included AND UPDATED</td>
      <td width="20" align="center">2</td>
    </tr>
        
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center">&nbsp;</td>
    </tr> 
  </tbody></table>

</html>