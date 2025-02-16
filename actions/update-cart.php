<?php
session_start();

// Function to update item quantity
function updateCart($product_id, $product_quantity) {
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['product_quantity'] = $product_quantity;
    }
}

// Process the request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    
    if ($product_quantity > 0) {
        updateCart($product_id, $product_quantity);
    }
}

// Redirect back to cart
header("Location: ../cart.php");
exit;