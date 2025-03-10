<?php
 session_start();

include('server/connection.php');


   //if user has already registered, take user to the account page
 if(isset($_SESSION['logged_in'])){
    header('location: account.php ');   
    exit;
 }



if(isset($_POST['register'])){

      $name =  $_POST['name'];
      $email=   $_POST['email'] ;
      $password =  $_POST['password']; 
      $confirmPassword= $_POST['confirmPassword']; 

      //if passwords dont match
        if($password !== $confirmPassword ){
          header('location: register.php?error=passwords dont match');
      
        }else if(strlen($password) < 6){ //if passwords is less than 6 characters
          header('location: register.php?error=password must be at least 6 characters');
      
        }else{ 
          //check whether there is a user with this email or not
                $stmt1= $conn->prepare("SELECT count(*) FROM users where user_email=?"); //count(*) counts how many users exist with that email, (returns 0 or 1.
              $stmt1->bind_param('s', $email);
              $stmt1->execute();
              $stmt1->bind_result($num_rows);  //$num_rows stores that count (not actual user data).
              $stmt1->store_result();
              $stmt1->fetch();

               //if there is a user already registered with this email
                if($num_rows != 0){
                  header('location: register.php?error=user with this email already exists');
              
                }else{ //if no user registered with this email before
                      
                      //create a new user
                        $stmt = $conn->prepare("INSERT INTO users (user_name, user_email,user_password)
                                        VALUES (?,?,?)");

                      $stmt->bind_param('sss', $name,$email,md5($password)); //md5() hashes the password


                      //if account was created successfully
                      if($stmt->execute()){

                             $user_id = $stmt->insert_id; //I called insert_id because I needed to insert the user_id in the session
                             $_SESSION['user_id'] =$user_id; //will be assigned to the user_id variable in place_order.php under orders table
                             $_SESSION['user_email'] =$email;
                              $_SESSION['user_name'] =$name;
                              $_SESSION['logged_in'] = true;
                            header('location: account.php?register_success=You registered successfully');
                    
                      }else{ //account could not be created
                              header('location: register.php?error=could not create an accout at the moment');
                      }
                }

        }
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
            <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
            <a href="account.html"><i class="fa-solid fa-user"></i></a>
          </li>
        
        </ul>
       
      </div>
    </div>
</nav>


     <!-- Register -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Register</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form action="register.php" method="POST" id="register-form">
              <p style="color:red;"><?php if(isset($_GET['error'])){echo $_GET['error']; } ?></p>        <!-- calling the get parameter and if the GET request is not set, it will display an error thats why isset() was used
              
              -->
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="Register-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="Confirm Password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="register-btn" name="register" value="Register">
                </div>
                <div class="form-group">
                   <a id="login-url" class="btn" href="login.php">Don you have account ? Login</a>
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