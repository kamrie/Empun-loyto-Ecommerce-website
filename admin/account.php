<?php
session_start();
include('../server/connection.php');

// Check if the user is an admin
if (!isset($_SESSION['admin_logged_in'])) {
        // Redirect to the login page if not an admin
    header('Location: login.php');
    exit();
}
?>

<?php 
include('header.php');
?>

<div class="container-fluid">
    <div class="row" style="min-height: 1000px;">
        <?php include('sidemenu.php'); ?>
        <main class="col-md-9 ms-sm-auto col-lg-5 px-md-4">
        
                <p style="color:red" class="text-center"> <?php if(isset($_GET['error'])){ echo $_GET['error'];} ?> </p>
                <p style="color:green" class="text-center"> <?php if(isset($_GET['message'])){ echo $_GET['message'];} ?> </p>
             <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 class="h2">Admin Account</h1>
                <hr class="mx-auto">

                <!-- <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                    
                    </div>
                </div> -->
            </div>

            <div class="container">
                <p>Id: <?php if(isset($_SESSION['admin_id'])) {echo $_SESSION['admin_id'];} ?></p>
                <p>Name: <?php if(isset($_SESSION['admin_name'])) {echo $_SESSION['admin_name'];} ?></p>
                <p>Email: <?php if(isset($_SESSION['admin_email'])) {echo $_SESSION['admin_email'];} ?></p>
            </div>
        </main>

        <main class="col-md-9 ms-sm-auto col-lg-5 px-md-4">    
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 class="h2 text-center">Change Password</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                    <a href="<?php echo isset($_SESSION['last_page']) ? $_SESSION['last_page'] : 'index.php'; ?>" class="btn btn-primary">
                            Back
                        </a>
                    </div>
                </div>
            </div>

            <div class="container">
            <form method="POST" action="update_password.php" id="account-form">
                <!-- <p style="color:red" class="text-center"> <?php // if(isset($_GET['error'])){ echo $_GET['error'];} ?> </p>
                <p style="color:green" class="text-center">  <?php // if(isset($_GET['message'])){ echo $_GET['message'];} ?> </p> -->

                <hr class="mx-auto">
                <div class="form-group ">
                    <label  for="">Password</label>
                    <input type="password" class="form-control" id="account-password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <input type="submit" name="change_password" value="Change Password" class="btn btn-primary mt-3 mx-auto" id="change-pass-btn">
                </div>
              </form>
            </div>
        </main>


<!-- ====================================== -->  
        
    </div>
</div>





