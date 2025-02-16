<!-- <?php
  
  session_start();
  if(isset($_POST['add_to_cart'])){ //checked if the user came to this page through clicking of the button
               //if user has already added a product to the cart before, then more should be added
          if(isset($_SESSION['cart'])){  
        
                $product_array_ids = array_column($_SESSION['cart'], "product_id"); //returns array with all product IDs that have been added to the cart, if you pass the $_SESSION to it, you pass the session you are interested in which in this case is product_id //[2,3,4,5,6]
          
                if( !in_array($_POST['product_id'], $product_array_ids )) { //if product has already been added to cart or not
                    

                        // $product_id =  $_POST['product_id'];
                        // $product_name =  $_POST['product_name'];
                        // $product_price =  $_POST['product_price'];
                        // $product_image =  $_POST['product_image'];
                        // $product_quantity =  $_POST['product_quantity'];
                      //I took the data from the single_product.php page and fetched them here from the POST request and added them to a seperate variable, then collected using the array below
                  
                      $product_id = $_POST['product_id'];
                      
                      $product_array = array(
                                        'product_id' => $_POST['product_id'],
                                        'product_name' => $_POST['product_name'],
                                        'product_price' =>$_POST['product_price'],
                                        'product_image' => $_POST['product_image'],
                                        'product_quantity' =>  $_POST['product_quantity']
                        );
              
                      $_SESSION['cart'][$product_id] = $product_array ;
                            //[ 2=>[], 3=>[]]

                              //Here check if the new product is one of the products the user has already added to the cart, if not it cant be added again so this triggers the else below
                }else{
                  
                  echo '<script>alert("Prooduct was already added to Cart")</script>';  //if user has already added product to cart
                    // echo '<script> window.location="index.php";</script>';
                } 
    
          

          }else{           //If this is the first product that the are attempting to add, Its gonna initiate the session, so we need to create the session from scratch 

                  $product_id =  $_POST['product_id'];
                  $product_name =  $_POST['product_name'];
                  $product_price =  $_POST['product_price'];
                  $product_image =  $_POST['product_image'];
                  $product_quantity =  $_POST['product_quantity'];
              //I took the data from the single_product.php page and fetched them here from the POST request and added them to a seperate variable, then collected using the array below
                  $product_array = array(
                                    'product_id' => $product_id,
                                    'product_name' => $product_name,
                                    'product_price' => $product_price,
                                    'product_image' => $product_image,
                                    'product_quantity' => $product_quantity
                  );  //this array that was used to collect the parameters above was added to the session below

                  $_SESSION['cart'][$product_id] = $product_array ; //the session is a big arra and inside it we have KEY value pairs with KEY being the productID and VALUE being the array itself  like this                         // [ 2=>[], 3=>[], ]


          }
  }else{
      header('location: index.php');
  }
 


?> -->









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

        <table class="mt-5 pt-5">
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr> 


            <?php foreach($_SESSION['cart'] as $key => $value){ ?>
              <tr>
                  <td>
                      <div class="product-info">
                          <img src="/assets/imgs/<?php echo $value['product_image']; ?>"/>
                          <div>
                              <p> <?php echo $value['product_name']; ?> </p>
                              <small><span>$</span> <?php echo $value['product_price']; ?></small>
                              <br>
                              <a class="remove-btn" href="">Remove</a>
                          </div>
                      </div>
                  </td>

                  <td>
                      <input type="number" value="<?php echo $value["product_quantity"] ?>"/>
                      <a href="" class="edit-btn">Edit</a>
                  </td>

                  <td>
                      <span>$</span>
                      <span class="product-price">155</span>
                  </td>
              </tr>

            <?php } ?>

        </table>
       

        <div class="cart-total">
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
        </div>

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