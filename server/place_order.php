<?php

   session_start();
   
   include('connection.php');

    // isset($_POST['place_order']) or $_SERVER["REQUEST_METHOD"] == "POST"  can be used for handling
   
    if($_SERVER["REQUEST_METHOD"] == "POST" ) {

          //1.  get user info and store it in database
              $name = $_POST['name'];
              $email = $_POST['EMAIL'];
              $phone = $_POST['phone'];
              $city = $_POST['city'];
              $address = $_POST['address'];
              $order_cost = $_SESSION['total'];
              $order_status = "on_hold";
              $user_id = 1 ;
              $order_date = date('Y-m-d H:i:s');

        $stmt =   $conn->prepare("INSERT INTO orders (order_cost, order_status, user_id, user_phone, user_city, user_address, order_date) 
                               VALUES (?,?,?,?,?,?,?); "); // seven question markers because we have seven inputs.
         $stmt->bind_param('isiisss', $order_cost,$order_status,$user_id, $phone,$city,$address,$order_date  );

         $stmt->execute();

          $order_id = $stmt->insert_id; //this insert_id returns the order_id which is needed
       
          echo   $order_id;
          //2. get products from cart (from session)





          //3. issue new order and  store order info in database


          //4. store each single item in order_items database





          //5. remove everything from cart


          //6. inform user whether everything is fine or there is a problem


   }



?>