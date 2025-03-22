<?php
 include('connection.php'); 

 // Get all unique categories from the products table
 $stmt =  $conn->prepare("SELECT product_category, MIN(product_image) AS product_image FROM products GROUP BY product_category");  

 $stmt->execute();

 $categories =  $stmt->get_result();  //$featured_products variable is an array


?>