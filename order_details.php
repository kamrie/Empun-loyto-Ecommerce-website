

<?php

   //not paid
   //shipped -after the user has paid
   //delivered

    include('server/connection.php');

    if(isset($_POST['order_details_btn']) &&  isset($_POST['order_id'])){

        $order_id = $_POST['order_id'];
        $order_status = $_POST['order_status'];

        $stmt = $conn->prepare("SELECT * FROM order_items where order_id = ?");
     
        $stmt->bind_param('i',$order_id);

        $stmt->execute();

        $order_details = $stmt->get_result();

        $order_total_price = calculateTotalOrderPrice($order_details);
    }else{
        header('location: account.php');
        exit;
    }
    // SELECT SUM(product_price * product_quantity) AS total_price FROM order_items WHERE order_id = ?

    
function calculateTotalOrderPrice($order_details){
    $total = 0;

   foreach( $order_details as $row){ 
         
        $product_price =   $row['product_price'];
        $product_quantity =   $row['product_quantity'];

        $total +=    $product_price * $product_quantity;

    }
  
      return $total;
    
   
  }
  
?>



    <?php
     include('layouts/header.php')?>

    <!-- Order details -->
  <section id="orders" class="orders container my-5 py-3 ">
    <div class="container mt-5">
        <h2 class="font-weight-bold text-center">Order Details</h2>
        <hr class="mx-auto">
    </div>

    <table class="  mt-5 pt-5 mx-auto  ">
        <tr>
            <th style="text-align:left;" >Product </th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
     <!--  -->
       
     <?php if ($order_details->num_rows > 0) { ?>
              
  
          <?php foreach( $order_details as $row){ ?>
                <tr>
                    <td>
                        <div class="product-info">
                                <img src="assets/imgs/<?php echo $row['product_image']; ?>" alt="">
                                <div>
                                    <p class="mt-3"><?php echo $row['product_name']; ?></p>
                                </div>
                        </div>
                    
                    </td>
                    <td>
                        <span>
                            <p class="mt-3"> $<?php echo $row['product_price']; ?></p>
                        </span>
                    </td>
                    <td>
                        <span>
                            <p class="mt-3"><?php echo $row['product_quantity']; ?></p>
                        </span>
                    </td>
                    
                </tr>      
          <?php } ?>

     <?php } else { ?>
            <tr><td colspan="5">No orders found.</td></tr>
     <?php } ?>
   

    </table>


        <?php if( $order_status == "not paid") {?>
               <form style="float: right;" method="POST" action="payment.php">
                  <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>"  />
                  <input type="hidden" name="order_status" value="<?php echo $order_status; ?>"  />

                  <input type="submit" name="order_pay_btn" class="btn btn-primary" value="Pay Now">
               </form>
        <?php } ?>
   

    
</section>







<?php include('layouts/footer.php')?>


