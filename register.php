<?php

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


<?php include('layouts/header.php')?>



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






    

<?php include('layouts/footer.php')?>
