<?php
 include('connection.php');

 $stmt = $conn->prepare("SELECT * FROM products WHERE product_category= 'Earrings' LIMIT 4 ");

 $stmt->execute();

 $earring_products = $stmt->get_result();


?>