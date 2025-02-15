<?php
session_start();

// Clear the cart
$_SESSION['cart'] = [];

// Redirect back to cart
header("Location: ../cart.php");
exit;