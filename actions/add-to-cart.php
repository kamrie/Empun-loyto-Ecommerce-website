<?php
session_start();

  if (!isset($_SESSION['cart'])){  //If the cart session does not already exist, it is initialized as an empty array ([])
     $_SESSION['cart'] = [];
  }

  //function to add item to cart

  function addToCart($product_id, $product_image, $product_name, $product_price, $product_quantity = 1){
      if (isset($_SESSION['cart'][$product_id])){           //checks if the product is already in the cart using its product_id. If yes, it should update the quantity.

        $_SESSION['cart'][$product_id]['product_quantity'] += $product_quantity;

      }else{   //update the session with a new product through its product_id
        $_SESSION['cart'][$product_id] = [
            'product_id'   => $product_id,  //added the product id key here so It can be inserted into the database in place_order.php
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'product_quantity' => $product_quantity,
        ];

      // For eg of how it could appear $_SESSION['cart'] = [
      //     101 => [
      //         'product_name' => 'earing',
      //         'product_price' => 500,
      //         'product_image' => 'laptop.jpg',
      //         'product_quantity' => 2  // Quantity increased from 1 to 2
      //     ],
      //     102 => [
      //         'product_name' => 'Bangle',
      //         'product_price' => 300,
      //         'product_image' => 'phone.jpg',
      //         'product_quantity' => 1
      //     ]
      // ];

      }
  }

  
  //process form submission which was gotten from the form in singleform.php
 
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











