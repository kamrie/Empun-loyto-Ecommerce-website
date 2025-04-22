<?php
   session_start();

   include('../server/connection.php');



   //Password reset
   if(isset($_POST['change_password'])){

    // var_dump($_POST); 
    // exit();

    $password = $_POST['password']; 
    $confirmPassword = $_POST['confirmPassword'];
    $admin_email = $_SESSION['admin_email'];
    $hashed_password =  password_hash($password, PASSWORD_DEFAULT);

    


    if($password !== $confirmPassword ){
        header('location: account.php?error= admin passwords dont match');
        exit();
    
      }else if(strlen($password) < 6){ //if passwords is less than 6 characters
        header('location: account.php?error=admin password must be at least 6 characters');
        exit();

      }else{
         $stmt = $conn->prepare('UPDATE admins SET admin_password=? WHERE admin_email=?');
         $stmt->bind_param('ss',$hashed_password,$admin_email);

         
    
         //we are just updating so not need for any result ie bind_result, so we checking if password has been updated or not
            if($stmt->execute()){
                header('location: account.php?message= admin password has been updated successfully');
                exit();
            }else{
                header('location: account.php?error= could not update admin password');
                exit();
            }
        }
}


?>