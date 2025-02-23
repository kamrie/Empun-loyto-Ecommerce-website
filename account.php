<?php
  session_start();

  include('server/connection.php');


  if( !isset($_SESSION['logged_in'])){
    header('location: login.php');   
    exit;
 }

 if(isset($_GET['logout'])){
       if(isset($_SESSION['logged_in'])){
              unset($_SESSION['logged_in']);
              unset($_SESSION['user_name']);
              unset($_SESSION['user_email']);
              header('location: login.php');
       }
 }



 //Password reset
   if(isset($_POST['change_password'])){
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $user_email = $_SESSION['user_email'];

        if($password !== $confirmPassword ){
            header('location: account.php?error=passwords dont match');
        
          }else if(strlen($password) < 6){ //if passwords is less than 6 characters
            header('location: account.php?error=password must be at least 6 characters');
        
          }else{
             $stmt = $conn->prepare('UPDATE users SET user_password=? WHERE user_email=?');
             $stmt->bind_param('ss',md5($password),$user_email);
        
             //we are just updating so not need for any result ie bind_result, so we checking if password has been updated or not
                if($stmt->execute()){
                    header('location: account.php?message=password has been updated successfully');
                }else{
                    header('location: account.php?error=could not update password');
                }
            }
   }

   //get orders
   if(isset($_SESSION['logged_in'])){
       $user_id = $_SESSION['user_id'];   

        $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=? ");
        $stmt->bind_param('i',  $user_id  );

        $stmt->execute();

        $orders = $stmt->get_result();

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
    <!-- <link rel="stylesheet" href="assets/css/cart.css"> -->
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


     <!-- Account showing the account information of the user and Enable users edit their Email -->
    <section class="my-5 py-5">
       <div class="row container mx-auto">
           <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
           <p style="color:green" class="text-center"> <?php if(isset($_GET['register_success'])){ echo $_GET['register_success'];} ?> </p>
           <p style="color:green" class="text-center"> <?php if(isset($_GET['login_success'])){ echo $_GET['login_success'];} ?> </p>
           <h3 class="font-weight-bold">Account Info</h3>    
            <hr class="mx-auto">
            <div class="account-info">
                <p> <strong>Name:</strong>  <span><?php if(isset($_SESSION['user_name'])) {echo $_SESSION['user_name'];}?></span></p>
                <p><strong>Email:</strong>  <span><?php if(isset($_SESSION['user_name'])) {echo $_SESSION['user_email'];}?></span></p>
                <p><a href="#orders" id="orders-btn">Your orders</a></p>
                <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
            </div>
           </div>

           <div class="col-lg-6 col-md-12 col-sm-12">
              <form method="POST" action="account.php" id="account-form">
                <p style="color:red" class="text-center"> <?php if(isset($_GET['error'])){ echo $_GET['error'];} ?> </p>
                <p style="color:green" class="text-center"> <?php if(isset($_GET['message'])){ echo $_GET['message'];} ?> </p>

              <h3>Change Password</h3>
                <hr class="mx-auto">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="account-password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <input type="submit" name="change_password" value="Change Password" class="btn" id="change-pass-btn">
                </div>
              </form>
           </div>
       </div>
    </section>





   <!-- Orders -->
  <section id="orders" class="orders container my-5 py-3">
    <div class="container mt-2">
        <h2 class="font-weight-bold text-center">Your Orders</h2>
        <hr class="mx-auto">
    </div>

    <table class="mt-5 pt-5">
        <tr>
            <th>Order id</th>
            <th>Order Cost</th>
            <th>Order status</th>
            <th>Order Date</th>
            <th>Order Details</th>

        </tr>
     <!--  -->

        <?php while($row = $orders->fetch_assoc()){ ?>
            <tr>
                <td>
                    <!-- <div class="product-info">
                            <img src="assets/imgs/featured 1.webp" alt="">
                            <div>
                                <p class="mt-3"><?php echo $row['order_id'];?></p>
                            </div>
                    </div> -->
                    <span>
                        <p class="mt-3"><?php echo $row['order_id'];?></p>
                    </span>
                </td>
                <td>
                    <span>
                        <p class="mt-3"><?php echo $row['order_cost'];?></p>
                    </span>
                </td>
                <td>
                    <span>
                        <p class="mt-3"><?php echo $row['order_status'];?></p>
                    </span>
                </td>
                <td>
                    <span>
                        <p class="mt-3"><?php echo $row['order_date'];?></p>
                    </span>
                </td>
                <td>
                    <form method="POST" action="order_details.php">
                       <input type="hidden" value="<?php echo $row['order_status'];?>" name="order_status">
                        <input type="hidden" value="<?php echo $row['order_id'];?>" name="order_id">
                        <input class="btn order-details-btn" type="submit" name="order_details_btn" value="details">
                     </form>
                </td>


               
            </tr>      

        <?php } ?>    
    </table>
   

   

    
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