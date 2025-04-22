<?php
 include('connection.php'); 

 $stmt =  $conn->prepare("SELECT * FROM products ORDER BY product_id DESC  ");  //ORDER BY id DESC means "order by the id column in descending order".

 $stmt->execute();

 $featured_products =  $stmt->get_result();  

//  $featured_products = $featured_products->fetch_all(MYSQLI_ASSOC); // Fetch as associative array

//  return $featured_products;


?>








