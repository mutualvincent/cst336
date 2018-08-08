<?php 

function displayCart() {
    // If there are items in seesion then display them
    if (isset($_SESSION['cart'])) {
        
        $total = 0;
        $shipping = 4.99;
        $tax = 9;
        echo "<table class='table'>";
        
        foreach ($_SESSION['cart'] as $item) {
            $itemId = $item['id'];
            $itemQuant = $item['quantity'];
            
            $total += $itemQuant * $item['price'];
            
            echo '<tr>';
            
            // Display data for item
            echo "<td><img src='" . $item['img'] . "'></td>";
            echo "<td><h4>" . $item['name'] . "</h4></td>";
            echo "<td><h4>" . $item['price'] . "</h4></td>";
            
            // Update form for this item
            echo '<form method="post">';
            echo "<input type='hidden' name='itemId' value='$itemId'>";
            echo "<td><input type='text' name='update' class='form-control' placeholder='$itemQuant'></td>";
            echo '<td><button class="btn btn-danger">Update</button></td>';
            echo '</form>';
            
            // Delete form
            echo '<form method="post">';
            echo "<input type='hidden' name='removeId' value='$itemId'>";
            echo '<td><button class="btn btn-danger">Remove</button></td>';
            echo '</form>';

            echo '</tr>';
        }
        $tax = ($total + $shipping) / 100 * $tax;
        $total = $total + $tax;
        
        echo "<tr>
              <td></td>
              <td/>
              <td><h4>$$total including $$shipping shipping and $$tax (9%) taxes</h4></td>
              <td/>
              <td/>
        </tr>";
        
        echo "</table>";
    }
}

function displayCartCount() {
    echo count($_SESSION['cart']);
}

// Display search results table
function displayResults() {
    global $items;
    
    if (isset($items)) {
        echo "<h2>Results</h2>";
        echo "<table class='table'>";
        foreach ($items as $item) {
            $itemName = $item['movieName'];
            $itemDescription = $item['movieDescription'];
            $itemPrice = $item['price'];
            $itemImage = $item['movieImage'];
            $itemId = $item['movieId'];
            $itemDirector = $item['directorName'];
            $itemYear = $item['movieYear'];
            $itemBudget = $item['movieBudget'];
            $itemReview = $item['movieReview'];
            $itemCategory = $item['catName'];

            // Display table with add button
            echo '<tr>';
            echo "<td><img src='$itemImage'></td>";
            echo "<td><h4>$itemName ($itemYear)</h4><p>$itemCategory</p><p>$itemDescription</p><h6>Director: $itemDirector</h4><h6>Budget: $itemBudget</h6><h6>Rating: $itemReview/10</h6></td>";
            echo "<td><h4>$$itemPrice</h4></td>";
            
            // Create hidden fields to send item data via POST
            echo "<form method='post'>";
            echo "<input type='hidden' name='itemName' value='$itemName'>";
            echo "<input type='hidden' name='itemPrice' value='$itemPrice'>";
            echo "<input type='hidden' name='ItemImage' value='$itemImage'>";
            echo "<input type='hidden' name='itemId' value='$itemId'>";
            
            // Check see if recent POST request has save itemId
            // If yes this item was just added to cart
            if ($_POST['itemId'] == $itemId) {
                echo '<td><button class="btn btn-success">Added</button></td>';
            }
            else {
                echo '<td><button class="btn btn-warning">Add</button></td>';
            }
            echo '</tr>';
            echo '</form>';
        }
        echo "</table>";
    }
}
?>