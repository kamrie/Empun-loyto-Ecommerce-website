
<?php
session_start();

function calculateTotal(){
  $total = 0;

  foreach ($_SESSION['cart'] as $item){
    $total += $item['product_price'] * $item['product_quantity'];
  }

  return $total;
}

// Function to display the cart
function displayCart() {
    if (empty($_SESSION['cart'])) {
        echo "<p>Your cart is empty.</p>";
        return;
    }

    echo "<table border='1'>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>";
    
    foreach ($_SESSION['cart'] as $product_id => $item) {
        echo "<tr>
                <td>{$item['product_name']}</td>
                <td>\${$item['product_price']}</td>
                <td>{$item['product_quantity']}</td>
                <td>
                    <form action='actions/update-cart.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='product_id' value='{$product_id}'>
                        <input type='number' name='product_quantity' value='{$item['product_quantity']}' min='1'>
                        <button type='submit'>Update</button>
                    </form>
                    <form action='actions/remove-from-cart.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='product_id' value='{$product_id}'>
                        <button type='submit'>Remove</button>
                    </form>
                </td>
              </tr>";
    }

    echo "</table>";
    echo "<p><strong>Total: $" . calculateTotal() . "</strong></p>";
    echo "<a href='actions/clear-cart.php'>Clear Cart</a>";
}

?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mira Bella</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/cart.css">
</head>
<body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white py-3 fixed-top ">
        <div class="container">
         <img src="assets/imgs/Empun logo.jpg" class="logo" alt="">
         <h2 class="brand"> Mira Bella</h2>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
              <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.html">Shop</a>
              </li>  
              <li class="nav-item">   
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>

              <li class="nav-item">
                <a href="cart.html"><i class="fa-solid fa-bag-shopping"></i></a>
                <a href="account.html"><i class="fa-solid fa-user"></i></a>
              </li>
            
            </ul>
           
          </div>
        </div>
    </nav>




    <!-- cart -->
     <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font weight bolde">Your Cart</h2>
            <hr>
        </div>

        <?php displayCart(); ?>
       

        <!-- <div class="cart-total">
           <table>
              <tr>
                 <td>Subtotal</td>
                 <td>$155</td>
              </tr>
              <tr>
                <td>Total</td>
                <td>$155</td>
              </tr>
           </table>
        </div> -->

        <div class="checkout-container">
            <button class="btn checkout-btn">Checkout</button>
        </div>
     </section>






         <!-- footer -->
         <footer class="mt-5 py-5">
            <div class="row container mx-auto pt-5">
                 <div class=" footer-one col-lg-3 col-md-6 col-sm-12">
                      <img class="logo" src="assets/imgs/Empun logo.jpg" class="img-fluid" alt="">
                      <p class="pt-3"> We provide the best products for the most affordable prices</p>
                 </div>
                 <div class=" footer-one col-lg-3 col-md-6 col-sm-12">
                   <h5 class="pb-2">  Featured </h5>
                   <ul class="text-uppercase">
                      <li> <a href="">women</a></li>
                      <li> <a href="">new arrivals</a></li>
                      <li> <a href="">girls</a></li>
                      <li> <a href="">Best sellers</a></li>
                      <li> <a href="">women</a></li>
                   </ul>
                 </div>
  
                 <div class=" footer-one col-lg-3 col-md-6 col-sm-12">
                  <h5 class="pb-2"> Contact Us</h5>
                    <div>
                      <h6 class="text-uppercase">  Address </h6>
                      <p>1234 Street Name City</p>
                    </div>
                    <div>
                      <h6 class="text-uppercase">  Phone </h6>
                      <p>+358 45 1179150</p>
                    </div>
                    <div>
                      <h6 class="text-uppercase">  Email </h6>
                      <p>info@gmail.com</p>
                    </div>              
                </div>
  
                <div class=" footer-one col-lg-3 col-md-6 col-sm-12">
                   <h5 class="pb-2">Instagram</h5>
                   <div class="row">
                     <img  src="assets/imgs/clothes 1.webp" class="img-fluid w-25 h-100 m-2" alt="">
                     <img  src="assets/imgs/featured 1.webp " class="img-fluid w-25 h-100 m-2" alt="">
                     <img  src="assets/imgs/featured 2.webp" class="img-fluid w-25 h-100 m-2" alt="">
                     <img  src="assets/imgs/featured 3.webp" class="img-fluid w-25 h-100 m-2" alt="">
                     <img  src="assets/imgs/featured 4.webp" class="img-fluid w-25 h-100 m-2" alt="">
  
                   </div>
                </div>
            </div>
  
  
  
            <div class="copyright mt-5">
               <div class="row  container mx-auto">
                  <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                      <img src="assets/imgs/visacard.svg" alt="">
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12 mb-4 text-nowrap  mb-2 ">   <!--text-nowrap makes the texts to be displayed in one line-->
                    <p>eCommerce @ 2025 All Rights Reserved</p>
                  </div>
                  <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                   <a href="#"><i class="fab fa-facebook"></i></a>
                   <a href="#"><i class="fab fa-instagram"></i></a>
                   <a href="#"><i class="fab fa-twitter"></i></a>
  
                  </div>
               </div>
            </div>
        </footer>

    
    <script src="https://kit.fontawesome.com/5936339753.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>