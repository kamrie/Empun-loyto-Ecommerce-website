<?php
 include('connection.php'); 

 // Get all unique categories from the products table
 $stmt =  $conn->prepare("SELECT product_category, MIN(product_image) AS product_image FROM products GROUP BY product_category"); //Group by make sure each product only appear once.
//  GROUP BY works best when aggregating other columns using functions like MIN(), MAX(), COUNT(), AVG(), etc.
//  If you just need unique values from one column (e.g., prices), use DISTINCT:



 $stmt->execute();

 $categories =  $stmt->get_result();  //$featured_products variable is an array


?>