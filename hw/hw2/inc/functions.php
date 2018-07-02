<?php
    function play() {
        for ($i=1; $i<5; $i++) {
            ${"randomValue" . $i} = rand(0,7);
            displaySymbols(${"randomValue" . $i}, $i);
        }
        displayPoints($randomValue1, $randomValue2, $randomValue3, $randomValue4);
    }
        
    
    function displaySymbols ($randomValue, $pos) {
            if ($randomValue == 0) {
                echo "<img id='reel$pos' src='img/Brazil.png' alt='brazil' title='Brazil' width='70' />";
            } else if ($randomValue == 1) {
                echo "<img id='reel$pos' src='img/France.png' alt='france' title='France' width='70' />";
            } else if ($randomValue == 2) {
                echo "<img id='reel$pos' src='img/England.png' alt='england' title='England' width='70' />";
            } else if ($randomValue == 3) {
                echo "<img id='reel$pos' src='img/Russia.png' alt='russia' title='Russia' width='70' />";
            } else if ($randomValue == 4) {
                echo "<img id='reel$pos' src='img/Croatia.png' alt='croatia' title='Cratia' width='70' />";
            } else if ($randomValue == 5) {
                echo "<img id='reel$pos' src='img/Belgium.png' alt='belgium' title='Belgium' width='70' />";  
            } else if ($randomValue == 6) {
                echo "<img id='reel$pos' src='img/Japan.png' alt='japan' title='Japan' width='70' />";
            } else {
                echo "<img id='reel$pos' src='img/Sweden.png' alt='sweden' title='Sweden' width='70' />";
            }
        }
        
    function displayPoints($randomValue1, $randomValue2, $randomValue3) {
            
            echo "<div id='output'>";
            if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
                switch ($randomValue1) {
                    case 0: $totalPoints = 1000;
                            echo "<h1> FIFA WORLDCUP CHAMPION! </h1>";
                            break;
                    case 1: $totalPoints = 500;
                        break;
                    case 2: $totalPoints = 250;
                        break;
                    case 3:
                        break;
                    case 4:
                        break;
                }
            
                echo "<h2> We have a winner! </h2>";
            } else {
                echo "<h3> Try Again! Almost there! </h3>";
                echo "<h4> You just need all 4 flags the same! </h4>";
            }
            echo "</div>";        
        }
        
?>