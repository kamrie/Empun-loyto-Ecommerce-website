<?php
    session_start(); 

    include('../server/connection.php');

// Check if the user is an admin
if (!isset($_SESSION['admin_logged_in'])) {
        // Redirect to the login page if not an admin
    header('Location: login.php');
    exit();
    }


    
    if(isset($_POST['register_btn'])){

            $admin_name=   $_POST['name'] ;
            $admin_email=   $_POST['email'] ;
            $password = $_POST['password'];
            $hashed_password =  password_hash($password, PASSWORD_DEFAULT);

            if(strlen($password) < 6){ //if passwords is less than 6 characters
                header('location: register.php?error=Admin password must be at least 6 characters');
            }else{
                //check whether there is a user with this email or not
                $stmt1= $conn->prepare("SELECT count(*) FROM admins where admin_email=?"); //count(*) counts how many users exist with that email, (returns 0 or 1.
                $stmt1->bind_param('s', $admin_email);
                $stmt1->execute();
                $stmt1->bind_result($num_rows);  //$num_rows stores that count (not actual user data).
                $stmt1->store_result();
                $stmt1->fetch();

                //if there is a user already registered with this email
                if($num_rows != 0){
                    header('location: register.php?error=admin with this email already exists');
                
                }else{   //if no user registered with this email before
                        
                    //create a new user
                    $stmt = $conn->prepare("INSERT INTO admins (admin_name, admin_email, admin_password)
                                    VALUES (?, ?, ?)");

                    $stmt->bind_param('sss', $admin_name,$admin_email,$hashed_password); //Add the hashed password
                
                    //if account was created successfully
                    if($stmt->execute()){

                        $admin_id = $stmt->insert_id; //I called insert_id because I needed to insert the user_id in the session
                        $_SESSION['admin_id'] = $admin_id; //will be assigned to the user_id variable in place_order.php under orders table
                        $_SESSION['admin_email'] = $admin_email;
                        $_SESSION['admin_name'] = $admin_name;
                        $_SESSION['admin_logged_in'] = true;
                        header('location: index.php?register_success= registration successfully');
                    
                    }else{ //account could not be created
                        header('location: register.php?error=could not create an admin account at the moment');
                    }

                }
    
            }

    }


?>


<?php include('header.php')?>



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
                    
                                      <h2 class="form-weight-bold">Admin Register</h2>
                                      <div>

                                      </div>
                                    
                                    <div class="mx-auto container">
                                        <p style="color:red" class="text-center"> <?php if(isset($_GET['error'])){ echo $_GET['error'];} ?> </p>

                                        <form action="register.php"  method="POST" id="register-form">
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" class="form-control" id="register-password" name="password" placeholder="Password" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-primary mt-3"name="register_btn" id="register-btn" value="Register">
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
