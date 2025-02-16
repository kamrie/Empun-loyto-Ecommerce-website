<?php
session_start();

// Function to remove an item
function removeFromCart($product_id) {
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Process the request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    removeFromCart($product_id);
}

// Redirect to cart
header("Location: ../cart.php");
exit;