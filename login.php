<?php
    
?>




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
          <li style="color: red;" class="nav-item">
            <a class="nav-link" href="shop.html">Shop</a>
          </li>  
          <li class="nav-item">   
            <a class="nav-link" href="#">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact Us</a>
          </li>

          <li class="nav-item">
            <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
            <a href="account.html"><i class="fa-solid fa-user"></i></a>
          </li>
        
        </ul>
       
      </div>
    </div>
  </nav>


     <!-- login -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Login</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form action="login.php" method="POST" id="login-form">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn"name="login_btn" id="login-btn" value="Login">
                </div>
                <div class="form-group">
                   <a id="register-url" class="btn" href="">Dont have account ? Register</a>
                </div>
            </form>
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