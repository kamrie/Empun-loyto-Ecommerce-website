<?php
 include('connection.php');

 $stmt = $conn->prepare("SELECT * FROM products WHERE product_category= 'earrings' LIMIT 4 ");

 $stmt->execute();

 $earring_products = $stmt->get_result();


?>