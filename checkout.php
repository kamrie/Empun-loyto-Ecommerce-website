<?php
    session_start(); 

    if( !empty($_SESSION['cart'])) {   //if the session is not empty and iF user came to the checkout page throught the checkout button or through an external link
      // echo "<p>Your cart is empty. <a href='index.php'>Continue Shopping</a></p>";
    }else{

      header('location: index.php');
    }


    // function calculateTotal(){
    //   $total = 0;
    
    //   foreach ($_SESSION['cart'] as $item){ //when we do this, each $item automatically represents the Inner array (the product details) rather than the product ID itself,  IF You Want to Access $product_id Too,  you should loop with both key and value like this:  foreach ($_SESSION['cart'] as $product_id => $item).
    //     $total += $item['product_price'] * $item['product_quantity'];
    //   }
    
    //   return $total;
    // }


?>



<?php include('layouts/header.php')?>






    <!--Checkout -->
       <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Check Out</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form action="server/place_order.php" method="POST"  id="checkout-form">
             
              <p class="text-center" style="color:red;">
                <?php if(isset($_GET['message'])){ echo $_GET['message'];}?>
                <?php if(isset($_GET['message'])) {?>

                  <a class="btn btn-primary" href="login.php">Login</a>
                <?php } ?>

              </p>
            <div class="form-group checkout-small-element">
                    <label for="">Name</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Phone</label>
                    <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="Phone" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">City</label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required>
                </div>
                <div class="form-group checkout-large-element">
                    <label for="">Address</label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required>
                </div>
                <div class="form-group checkout-btn-container">
                    <p><strong>Total Amount: $<?php echo  $_SESSION['total']  ; ?></strong></p>
                    <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order">
                </div>
               
            </form>
        </div>
    </section>










    
<?php include('layouts/footer.php')?>
