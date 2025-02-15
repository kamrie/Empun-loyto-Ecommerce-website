<?php
include("server/connection.php");
session_start();

   if(isset($_GET['product_id'])){ //get the product id through the Get parameter which is product_id
    $product_id = $_GET['product_id'];
    
    $stmt =  $conn->prepare("SELECT * FROM products WHERE product_id = ? ");  //WHERE product_id = ? means where product_id is unique
      $stmt->bind_param("i",  $product_id); //i means interger

      $stmt->execute();
    
      $product=  $stmt->get_result();  //$featured_products variable is an array


   }else{
      header('location: index.php'); // if we dont have it, take us to the home page

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
    <link rel="stylesheet" href="assets/css/single-product.css">

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


   <!-- Single product -->
  <section class="container single-product my-5 pt-5">
      <div class="row mt-5">
        <?php while($row = $product->fetch_assoc()){ ?>

            <div class="col-lg-5 col-md-6 col-sm-12">
                  <img class="img-fluid w-100 pb-1" src="assets/imgs/<?php echo $row['product_image']; ?>" id="mainImg" alt="">
                <!-- smaller varities to the main products -->
                  <div class="small-img-group">
                      <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image']; ?>" width="100%" class="small-img" alt="">
                      </div>
                      <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-img" alt="">
                      </div>
                      <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-img" alt="">
                      </div>
                      <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image4']; ?>" width="100%" class="small-img" alt="">
                      </div>

                  </div>
            </div>
            
            <div class="col-lg-6 col-md-12 col-12">
                <h6>Women/Jewelry</h6>
                <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                <h2>$<?php echo $row['product_price']; ?></h2>


                <form method="POST" action="actions/add-to-cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" />
                    <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>" />
                    <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>" />
                    <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>" />
                    
                    <input type="number" name="product_quantity" value="1">
                    <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
                 </form>   
                 
                <h4 class="mt-5 mb-5">Product details</h4>
                <span>
                  <?php echo $row['product_description']; ?> 
                </span>
                
            </div>

          </form> 

          <?php } ?>


      </div>

  </section>


     <!-- Related Productss -->
     <section id="related-products" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
           <h3>Related Products</h3>
           <hr class="mx-auto"> <!-- mx-auto centers the line   -->
      </div>
      <div class="row mx-auto container-fluid">
         <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/featured 1.webp" alt="">
            <div class="star">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"> Golden necklace</h5>
            <h4 class="p-price"> $199.8</h4>
            <button class="buy-btn"> Buy Now</button>
         </div>
         <div class="product text-center col-lg-3 col-md-4 col-sm-12">
           <img class="img-fluid mb-3" src="assets/imgs/featured 2.webp" alt="">
           <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
           </div>
           <h5 class="p-name"> Golden necklace</h5>
           <h4 class="p-price"> $199.8</h4>
           <button class="buy-btn"> Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="assets/imgs/featured 3.webp" alt="">
           <div class="star">
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
           </div>
         <h5 class="p-name"> Golden necklace</h5>
         <h4 class="p-price"> $199.8</h4>
         <button class="buy-btn"> Buy Now</button>
       </div>
         <div class="product text-center col-lg-3 col-md-4 col-sm-12">
           <img class="img-fluid mb-3" src="assets/imgs/featured 4.webp" alt="">
           <div class="star">
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
           </div>
           <h5 class="p-name"> Golden necklace</h5>
           <h4 class="p-price"> $199.8</h4>
           <button class="buy-btn"> Buy Now</button>
         </div>
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
    <script src="assets/js/singleProduct.js" ></script>
</body>
</html>
