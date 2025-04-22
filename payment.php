
<?php include('layouts/header.php')?>


<?php
    // session_start(); 
  

    if(isset($_POST['order_pay_btn']) ){ //FROM order_details.php
      $order_status= $_POST['order_status'];
      $order_total_price= $_POST['order_total_price'];


    } 
    
    // function calculateTotal(){
    //   $total = 0;
    
    //   foreach ($_SESSION['cart'] as $item){ //when we do this, each $item automatically represents the Inner array (the product details) rather than the product ID itself,  IF You Want to Access $product_id Too,  you should loop with both key and value like this:  foreach ($_SESSION['cart'] as $product_id => $item).
    //     $total += $item['product_price'] * $item['product_quantity'];
    //   }
    
    //   return $total;
    // }


?>







    <!--Payment -->
       <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Payment</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container text-center">

                <!-- if the session is empty or didnt add anything to the cart but came to this page buy checking old orders in account.php and clicking on one of the pay button in the order details  -->
        <?php if(isset($_POST['order_status']) && $_POST['order_status'] == "not paid") { ?>
              <p>Total payment:  $<?php echo $_POST['order_total_price']; ?> </p>
                <input class="btn btn-primary" type="submit" value="Pay Now">


             <!-- if total isset which means theres something in the cart. It will check first if the cart is not empty-->
        <?php } else if(isset($_SESSION['total']) && $_SESSION['total'] != 0 ) { ?>
              <p>Total payment:  $ <?php echo $_SESSION['total']; ?> </p>
               <input class="btn btn-primary" type="submit" value="Pay Now" />

       
        <?php } else  { ?>
            <p>You dont have an order</p>

       <?php } ?>

        </div>
    </section>










    
  <?php include('layouts/footer.php')?>
