<?php
 include('connection.php'); 

 $stmt =  $conn->prepare("SELECT * FROM products LIMIT 4");  

 $stmt->execute();

 $featured_products =  $stmt->get_result();  //$featured_products variable is an array

 $featured_products = $result->fetch_all(MYSQLI_ASSOC); // Fetch as associative array

 return $featured_products;


?>