<?php include('header.php')?>


<?php
    // session_start(); theres already session start in the included header.php 

    include('../server/connection.php');

    
   if(isset($_SESSION['admin_logged_in'])){  //if user is logged-in, they
        header('location: index.php');
        exit;
   }

    
    if(isset($_POST['login_btn'])){
        $email=   $_POST['email'] ;
        $password = md5($_POST['password']);
        
        $stmt =  $conn->prepare("SELECT admin_id,admin_name,admin_email,admin_password FROM admins WHERE admin_email = ? AND admin_password = ? LIMIT 1 "); //SELECT * fetches all columns from the users table, even the ones that are not needed.
        $stmt->bind_param('ss', $email, $password);

        if($stmt->execute()){
            $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password); // Binds database columns to PHP variables.
            $stmt->store_result();

              if($stmt->num_rows == 1){ //if we have only one user
                  $stmt->fetch();

                  $_SESSION['admin_id'] = $admin_id;
                  $_SESSION['admin_name'] = $admin_name;
                  $_SESSION['admin_email'] = $admin_email;
                  $_SESSION['admin_logged_in'] = true;

                  //incase of success...
                  header('location: index.php?login_success=logged in successfully');

              }else{
                   header('location: login.php?error=could not verify your account');

              }

        }else{
             //error
             header('location: login.php?error=something went wrong');
        }
    }
?>

          


                <div class="container-fluid">
                    <div class="" style="min-height: 1000px">

                        <main class="col-md-6 mx-auto col-lg-6 px-md-4 text-center">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                                <h1 class="h2"> </h1>
                                <div class="btn-toolbar mb-2 mb-md-0">
                                    <div class="btn-group me-2">
                                    </div>
                                </div>
                            </div>



                            <!-- login -->
                    
                                      <h2 class="form-weight-bold">Login</h2>
                                      <div>

                                      </div>
                                    
                                    <div class="mx-auto container">
                                        <p style="color:red" class="text-center"> <?php if(isset($_GET['error'])){ echo $_GET['error'];} ?> </p>

                                        <form action="login.php" enctype="multipart/form-data" method="POST" id="login-form">
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
                                            <!-- <div class="form-group">
                                                <a id="register-url" href="register.php" class="btn" >Dont have account ? Register</a>
                                            </div> -->
                                        </form>
                                    </div>
                            
                        </main>
                    </div>
                </div>

                                
                        
                        
        
        
              
        </body>
</html>
