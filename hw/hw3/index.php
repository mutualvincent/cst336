<!DOCTYPE html>
<html>
    <head>
        <title>What Kind of Car You Like?</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">        
        <style>
            @import url("css/styles.css");
            @import url('https://fonts.googleapis.com/css?family=chewy');
        </style>
        
    </head>
    <body style="background-image: url(img/bg.jpg');">
        <header>What Kind of Car You Like?</header>
        <div class="backgroundimg">
            <div class="container">
                <form method="GET">
                    <h3>What is your name?</h3>
                    <input type="text" name="Name" value="">
                        
                    <h3>If you are to build a car, you would mostly like to...</h3>
                        
                        <select name="Question1">
                            <option value="">Select One</option>
                            <option value="confident"> I like a race car </option>
                            <option value="independent"> I prefer a sedan </option>
                            <option value="relaxed"> I am fine with anything </option>
                            <option value="shy"> Follow everyone else </option>
                            <option value="adaptable"> I like whatever is needed </option>
                        </select>
            
            
                    <h3>What do you not like about a car?</h3>
                        <input type="radio" name="Question2" value="confidence">
                        <label for="A3">too girly</label> <br>
                        <input type="radio" name="Question2" value="independent">
                        <label for="A3">too expensive</label> <br>
                        <input type="radio" name="Question2" value="relaxed">
                        <label for="A3">don't care</label> <br>
                        <input type="radio" name="Question2" value="shy">
                        <label for="A3">fine with anything</label> <br>
                        <input type="radio" name="Question2" value="adaptable">
                        <label for="A3">Nothing</label> <br>
            
                    <h3>Question 4: How do you enjoy while driving?</h3>
                        <input type="radio" name="Question3" value="confidence">
                        <label for="A3">Radio Station</label> <br>
                        <input type="radio" name="Question3" value="independent">
                        <label for="A3">Sing Along</label> <br>
                        <input type="radio" name="Question3" value="relaxed">
                        <label for="A3">Imaginary Competition</label> <br>
                        <input type="radio" name="Question3" value="shy">
                        <label for="A3">Passive</label> <br>
                        <input type="radio" name="Question3" value="adaptable">
                        <label for="A3">Go with the flow</label> <br>
            
                    <h3>What kind of rim do you like?</h3>
                        <input type="checkbox" name="Question4" value="confident">
                        <label for="A3">low profile</label> <br>
                        <input type="checkbox" name="Question4" value="independent">
                        <label for="A3">shy like a diamond</label> <br>
                        <input type="checkbox" name="Question4" value="relaxed">
                        <label for="A3">whatever</label> <br>
                        <input type="checkbox" name="Question4" value="shy">
                        <label for="A3">industrial standard</label> <br>
                        <input type="checkbox" name="Question4" value="adaptable">
                        <label for="A3">Don't care</label> <br>
            
                    <input class="btn" type="submit" name="submit" value="Submit">
            
                </form>
            </div>
        
            <footer>
                <hr>
                    <div class="marquee">
                       <div>
                        <span>Here we go!</span>
                       </div>
                    </div>
                
                <figure>
                    <img id="csumb" src="img/logo.png" alt="CSUMB Logo">
                </figure>
                
                CST336. 2018 © yojiang<br>
                <strong>Disclaimer:</strong> The information in this webpage is ficticious. It is used for academic purposes only.
                
            </footer>
        </div>
    </body>
</html>

