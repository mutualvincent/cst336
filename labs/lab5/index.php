<?php
    include 'dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
    
    function displayCategories() {
        global $conn;
        
        $sql = "SELECT catId, catName from om_category ORDER BY Catname";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            
            echo "<option value='".$record["catId"]."' >" . $record["catName"] . "</option>";
        
            echo "<a href=\"purchaseHistory.php?productId=".$record["productId"]. "\"> History </a>";
            echo $record["productName"] . " " . $record["productDesciption"] . " $" . $record["price"] . "<br /><br />";
        }
    }
    
    function displaySearchResults() {
        global $conn;
        
        if (isset($_GET['searchForm'])) { // checks whether user has submitted the form
            
            echo "<h3>Products Found: </h3>";
            
            $namedParameters = array();
            $sql = "SELECT * FROM om_product WHERE 1"; 
            
            if (!empty($_GET['product'])) {
                $sql .= " AND productName LIKE :productName";
                $namedParameters[":productName"] = "%". $_GET['product']. "%";
            }
        
            if (!empty($_GET['category'])) {
                $sql .= " AND catId = :categoryId";
                $namedParameters[":categoryId"] = $_GET['category'];
            }
            
            if (!empty($_GET['priceForm'])) {
                $sql .= "AND price >= :priceForm";
                $namedParameters[":priceForm"] = $_GET['priceForm'];
            }
            
            if (!empty($_GET['prcieTo'])) {
                $sql .= " AND price <= :price";
                $namedParameters[":priceTo"] = $_GET['priceTo'];
            }
            
            if(isset($_GET['orderBy'])) {
                if ($_GET['orderBy'] == "price") {
                    $sql .= " ORDER BY price";
                } else {
                    $sql .= " ORDER BY productName";
                }
            }
        
            $stmt = $conn->prepare($sql);
            $stmt->execute($namedParameters);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
            echo $record["productName"] . " " . $record["productDesciption"] . " $" . $record["price"] . "<br /><br />";
            }

        }
    }
?>



<!DOCTYPE html>
<html>
    <head>
        <title> OtterMart Product Search </title>
        <link href="css/styles.css" rel="styleshet" type="text/css" />
    </head>
    <body>
            <div>
                <hi> OtterMart Product Search </hi>
                
                <form>
                    
                    Product: <input type="text" name="product"/>
                    <br />
                    Category:
                        <select name="category">
                            <option value="">Select One</option>
                            <?= displayCategories() ?>
                        </select>
                        
                    <br>
                    Price: From <input type="text" name="priceForm" size="7"/>
                           To   <input type="text" name="priceTo" size="7"/>
                    <br>
                    Order reslult by:
                    <br>
                    
                    <input type="radio" name="orderBy" value="price"/> Price <br>
                    <input type="radio" name="orderBy" value="name" /> Name 
                    
                    <br />
                    <input type="submit" value="Search" name="searchForm" />
                </form>
            </div>
            
            <hr>
            <?= displaySearchResults() ?>
    </body>
</html>