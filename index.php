<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mira Bella</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
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


      <!-- Home -->
       <section id="home">
         <div class=" container">
             <h5 >NEW ARRIVALS</h5>
             <h1><span> Best Prices</span> this Season</h1>
             <p>EMPUN LOYTO offers the best products for the most affordable prices</p>
             <button> Shop Now</button>
         </div>
       </section>

       <!-- Brand -->
        <section id="brand" class="container">
           <div class="row">
             <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/Empun logo.jpg" alt="">
             <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/Empun logo.jpg" alt="">
             <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/Empun logo.jpg" alt="">
             <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/Empun logo.jpg" alt="">

           </div>
        </section>

        <!-- New section for displaying card, each card will display a new Product in our website -->
     <section id="new" class="w-100">
        <div class="row p-0 m-0">
            <!-- one -->
            <div class="one col-lg-4 col-md-6 col-sm-12 p-0 ">
               <img class="img-fluid" src="assets/imgs/earring 1.webp" alt="">
               <div class="details">
                  <h2>Extremely Awesome earrings</h2>
                  <button class="text-uppercase"> Shop Now</button>
               </div>
            </div>
            <!-- two -->
            <div class="one col-lg-4 col-md-6 col-sm-12 p-0 ">
                <img class="img-fluid" src="assets/imgs/earring 2.webp" alt="">
                <div class="details">
                   <h2> Awesome crystal jewelry</h2>
                   <button class="text-uppercase"> Shop Now</button>
                </div>
             </div>
              <!-- Three -->
            <div class="one col-lg-4 col-md-6 col-sm-12 p-0 ">
                <img class="img-fluid" src="assets/imgs/earring 3.webp" alt="">
                <div class="details">
                   <h2>Extremely Awesome earrings</h2>
                   <button class="text-uppercase"> Shop Now</button>
                </div>
             </div>
        </div>
     </section>

     <!-- Featured -->
    <section id="featured" class="my-5 pb-5">
       <div class="container text-center mt-5 py-5">
            <h3>Our Featured</h3>
            <hr class="mx-auto"> <!-- mx-auto centers the line   -->
            <p>Here you can check out our featured products</p>
       </div>
       <div class="row mx-auto container-fluid">

          <?php include('server/get_featured_products.php');  ?>

         <?php while($row=  $featured_products->fetch_assoc()){ ?>

          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
             <img class="img-fluid mb-3" src="/assets/imgs/<?php echo $row['product_image']; ?>" />
             <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
             </div>
             <h5 class="p-name"> <?php echo $row['product_name']; ?></h5>
             <h4 class="p-price"> $<?php echo $row['product_price']; ?></h4>
              <a href="<?php echo "single_product.php?product_id=" . $row['product_id'];?>"><button class="buy-btn"> Buy Now</button></a> 
          </div>

          <?php } ?>
          <!-- =============== -->        
       </div>
    </section>

    <!-- Banner -->
    <section id="banner" class="my-5 py-5">
        <div class="container">
          <h4>MID SEASON'S SALE </h4> 
          <h1>Autumn Collection <br> Up to 30% OFF  </h1>
          <button class="text-uppercase"> shop now</button>
        </div>
    </section> 

    <!-- Earring Collection -->
    <section id="featured" class="my-5 ">
      <div class="container text-center mt-5 py-5">
           <h3>Elegant Earrings Collection</h3>
           <hr class="mx-auto"> <!-- mx-auto centers the line   -->
           <p>Explore our stunning collection of handcrafted earring.</p>
      </div>
      <div class="row mx-auto container-fluid">
       <?php include('server/get_earring.php'); ?>

       <?php while($row = $earring_products->fetch_assoc()){ ?>

         <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="/assets/imgs/<?php echo $row['product_image']?>" alt="">
            <div class="star">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_price']?></h5>
            <h4 class="p-price"> $<?php echo $row['product_price'] ?></h4>
            <button class="buy-btn"> Buy Now</button>
         </div>
       
       <?php } ?>  
      </div>
   </section>

      <!-- Watches -->
      <section id="watches" class="my-5 ">
        <div class="container text-center mt-5 py-5">
             <h3>Best watches</h3>
             <hr class="mx-auto"> <!-- mx-auto centers the line   -->
             <p>Check out our unique watches</p>
        </div>
        <div class="row mx-auto container-fluid">
           <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="/assets/imgs/watch 1.webp" alt="">
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
             <img class="img-fluid mb-3" src="/assets/imgs/clothes 1.webp" alt="">
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
            <img class="img-fluid mb-3" src="/assets/imgs/watch 3.webp" alt="">
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
             <img class="img-fluid mb-3" src="/assets/imgs/watch 4.avif" alt="">
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
</body>
</html>