<?php
session_start();

  if (!isset($_SESSION['cart'])){
     $_SESSION['cart'] = [];
  }

  //function to add item to cart

  function addToCart($product_id, $product_image, $product_name, $product_price, $product_quantity = 1){
      if (isset($_SESSION['cart'][$product_id])){
        $_SESSION['cart'][$product_id][$product_quantity] += $product_quantity;

      }else{
        $_SESSION['cart'][$product_id] = [
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'product_quantity' => $product_quantity,
        ];
      }
  }

  //process form submission

  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $product_id = $_POST['product_id'];
    $product_image = $_POST['product_image'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];

    addToCart($product_id, $product_image, $product_name, $product_price, $product_quantity);
  }

  header('Location: ../cart.php');
  exit;


?>