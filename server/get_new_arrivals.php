
<?php
 include('connection.php'); 

 // Get all unique categories from the products table

 $stmt = $conn->prepare("SELECT product_name FROM products GROUP BY product_name ORDER BY MAX(product_id) DESC LIMIT 10;");
 // $stmt = $conn->prepare("SELECT DISTINCT product_price FROM products;"); //"SELECT product_price FROM products GROUP BY product_price"; can work but It's not necessary unless you're aggregating another column.


    $stmt->execute();
    
    $new_arrivals = $stmt->get_result();  //$featured_products variable is an array


?>