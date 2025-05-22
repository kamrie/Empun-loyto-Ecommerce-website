<?php

   session_start();
   
   include('connection.php');

   //if user is not logged in
   if(!isset($_SESSION['logged_in'])){
            $_SESSION['redirect_to'] = '../checkout.php'; // Store the intended page

            header('location: ../checkout.php?message=Please login/register to place an order');
        
   
            // if user is  logged in
   }else{        
             // isset($_POST['place_order']) or $_SERVER["REQUEST_METHOD"] == "POST"  can be used for handling
            if($_SERVER["REQUEST_METHOD"] == "POST" ) {

         //1.  GET USER INFO AND STORE IT IN DATABASE
                     $name = $_POST['name'];
                     $email = $_POST['email'];
                     $phone = $_POST['phone'];
                     $city = $_POST['city'];
                     $address = $_POST['address'];
                     $order_cost = $_SESSION['total']; //  $_SESSION['total'] is where the total was stored
                     $order_status = "not paid";
                     $user_id = $_SESSION['user_id'] ;
                     $order_date = date('Y-m-d H:i:s');

               $stmt =   $conn->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_phone, user_city, user_address, order_date) 
                                       VALUES (?,?,?,?,?,?,?); "); // seven question markers because we have seven inputs.
                  $stmt->bind_param('isiisss', $order_cost,$order_status,$user_id, $phone,$city,$address,$order_date  );

               $stmt_status = $stmt->execute();

               if(!$stmt_status){
                  header('location: index.php');
                  exit;
               }

            //2.ISSUE NEW ORDER AND STORE ORDER INFO IN DATABASE
                  $order_id = $stmt->insert_id; //I called insert_id because I needed to use the order_id immediately (for inserting order_items), normally, ID's generate automatically.
               
               

               
         //3.GET PRODUCTS FROM CART (from SESSION) to insert it in order_items

               $_SESSION['cart'] ; // [ 4=>[], 5 =>[] ]
               
               // foreach ($_SESSION['cart'] as $product_id => $item) {
               //     $product_name = $item['product_name'];
               //     $product_price = $item['product_price'];
               //     $product_quantity = $item['product_quantity'];
               //  }               OR  can be done like the one below

               foreach($_SESSION['cart'] as $key => $value){

                     $product = $_SESSION['cart'][$key]; //this will get each single product array
                  
                     $product_id = $product['product_id'];
                     $product_name = $product[ 'product_name'];
                     $product_price = $product['product_price'];
                     $product_image = $product['product_image'];
                     $product_quantity = $product['product_quantity'];   

            //4.STORE EACH SINGLE ITEM IN order_items DATABASE
                  $stmt1   =  $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, product_image,product_price,product_quantity, user_id, order_date)
                                 VALUES (?,?,?,?,?,?,?,?) ");
                  
                  $stmt1->bind_param('iissiiis',$order_id,$product_id,$product_name,$product_image,$product_price,$product_quantity,$user_id,$order_date );
                  $stmt1->execute();

               }










            //5. REMOVE EVERYTHING FROM CART --> delay until payment is done
                     //  unset($_SESSION['cart']);


            //6. inform user whether everything is fine or there is a problem and take user to payment page
               header('location: ../payment.php?order_status=order placed successfully');     //order_status after ? is a GET parameter that will be fetch in payment.php page like $_GET['order_status'] to display "order placed successfully"

            }

   }

?>