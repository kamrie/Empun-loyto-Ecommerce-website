<?php
session_start();

// Ensure only logged-in admins can access this page
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}

// Include database connection
include('../server/connection.php');

// Fetch all admins from the database
$query = "SELECT admin_id, admin_name, admin_email FROM admins";
$result = $conn->query($query);
?>

<?php include('header.php'); ?>

<div class="container-fluid">
    <div class="row" style="min-height: 1000px;">
        <?php include('sidemenu.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h1 class="h2 mt-4">Admin Users</h1>
            <hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['admin_id']; ?></td>
                            <td><?php echo $row['admin_name']; ?></td>
                            <td><?php echo $row['admin_email']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>
</div>

<?php include('footer.php'); ?>














<section class="my-5 py-5">
       <div class="row container mx-auto">
           <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
           <p style="color:green" class="text-center"> <?php if(isset($_GET['register_success'])){ echo $_GET['register_success'];} ?> </p>
           <p style="color:green" class="text-center"> <?php if(isset($_GET['login_success'])){ echo $_GET['login_success'];} ?> </p>
           <h3 class="font-weight-bold">Account Info</h3>    
            <hr class="mx-auto">
            <div class="account-info">
                <p> <strong>Name:</strong>  <span><?php if(isset($_SESSION['admin_name'])) {echo $_SESSION['admin_name'];}?></span></p>
                <p><strong>Email:</strong>  <span><?php if(isset($_SESSION['admin_email'])) {echo $_SESSION['admin_email'];}?></span></p>
                
            </div>
           </div>

           <div class="col-lg-6 col-md-12 col-sm-12">
              <form method="POST" action="update_password.php" id="account-form">
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
