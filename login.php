
<?php
    session_start();

    include('server/connection.php');

    
   if(isset($_SESSION['logged_in'])){   //if user is logged-in, they
        header('location: account.php');
        exit;
   }

    
    if(isset($_POST['login_btn'])){
        $email=   $_POST['email'] ;
        $password = md5($_POST['password']);
        
        $stmt =  $conn->prepare("SELECT user_id,user_name,user_email,user_password FROM users WHERE user_email = ? AND user_password = ? LIMIT 1 "); //SELECT * fetches all columns from the users table, even the ones that are not needed.
        $stmt->bind_param('ss', $email, $password);

        if($stmt->execute()){
            $stmt->bind_result($user_id,$user_name,$user_email,$user_password); // Binds database columns to PHP variables.
            $stmt->store_result();

              if($stmt->num_rows == 1){ //if we have only one user
                  $stmt->fetch();

                  $_SESSION['user_id'] = $user_id;
                  $_SESSION['user_name'] = $user_name;
                  $_SESSION['user_email'] = $user_email;
                  $_SESSION['logged_in'] = true;

                  //incase of success...
                   // If there's a stored redirect page, send them there
                    if(isset($_SESSION['redirect_to'])){
                            $redirect_page = $_SESSION['redirect_to'];
                            unset($_SESSION['redirect_to']); // Remove the stored page after using it
                            header("location: $redirect_page");

                    }else{
                            header('location: account.php?login_success=logged in successfully');
                    }
                    exit;

                }else{
                    header('location: login.php?error=could not verify your account');
                   exit;
                }
        }else{
             //error
             header('location: login.php?error=something went wrong');
             exit;
        }
    }
?>



<?php include('layouts/header.php')?>;



      <!-- login -->   
      <section class="my-5 py-5">
          <div class="container text-center mt-3 pt-5">
              <h2 class="form-weight-bold">Login</h2>
              <hr class="mx-auto">
          </div>
          <div class="mx-auto container">
            <p style="color:red" class="text-center"> <?php if(isset($_GET['error'])){ echo $_GET['error'];} ?> </p>

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
                    <a id="register-url" href="register.php" class="btn" >Dont have account ? Register</a>
                  </div>
              </form>
          </div>
      </section>






      <?php include('layouts/footer.php')?>
