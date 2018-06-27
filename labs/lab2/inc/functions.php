<?php
    function play() {
        for ($i=1; $i<4; $i++) {
            ${"randomValue" . $i} = rand(0,2);
            displaySymbols(${"randomValue" . $i}, $i);
        }
        displayPoints($randomValue1, $randomValue2, $randomValue3);
    }
        
    
    function displaySymbols ($randomValue, $pos) {
            if ($randomValue == 0) {
                echo "<img id='reel$pos' src='img/seven.png' alt='seven' title='Seven' width='70' />";
            } else if ($randomValue == 1) {
                echo "<img id='reel$pos' src='img/cherry.png' alt='cherry' title='Cherry' width='70' />";
            } else {
                echo "<img id='reel$pos' src='img/lemon.png' alt='lemon' title='Lemon' width='70' />";
            }
        }
        
    function displayPoints($randomValue1, $randomValue2, $randomValue3) {
            
            echo "<div id='output'>";
            if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
                switch ($randomValue1) {
                    case 0: $totalPoints = 1000;
                            echo "<h1>Jacpot! </h1>";
                            break;
                    case 1: $totalPoints = 500;
                        break;
                    case 2: $totalPoints = 250;
                        break;
                }
            
                echo "<h2> You won $totalPoints points! </h2>";
            } else {
                echo "<h3> Try Again! </h3>";
            }
            echo "</div>";        
        }
        
?>