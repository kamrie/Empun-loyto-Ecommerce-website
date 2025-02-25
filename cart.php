
<?php
session_start();

function calculateTotal(){
  $total = 0;

  foreach ($_SESSION['cart'] as $item){ //when we do this, each $item automatically represents the Inner array (the product details) rather than the product ID itself,  IF You Want to Access $product_id Too,  you should loop with both key and value like this:  foreach ($_SESSION['cart'] as $product_id => $item).
    $total += $item['product_price'] * $item['product_quantity'];
  }

  $_SESSION['total'] = $total;
  
  return $_SESSION['total'] ;
}

// Function to display the cart
function displayCart() {
    if (empty($_SESSION['cart'])) {
        echo "<p>Your cart is empty.</p>";
        return;
    }

    echo "<table border='1'>
            <tr>
                <th>Images</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>";
    
    foreach ($_SESSION['cart'] as $product_id => $item) {
        echo "<tr>
                 <td> <img src='assets/imgs/{$item['product_image']} ' />  </td>
                <td>{$item['product_name']}</td>
                <td>\${$item['product_price']}</td>
                <td>{$item['product_quantity']}</td>
                <td>
                    <form action='actions/update-cart.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='product_id' value='{$product_id}'>
                        <input type='number' name='product_quantity' value='{$item['product_quantity']}' min='1'>
                        <button type='submit'>Update</button>
                    </form>
                    <form action='actions/remove-from-cart.php' method='POST' style='display:inline;'>
                        <input type='hidden' name='product_id' value='{$product_id}'>
                        <button type='submit'>Remove</button>
                    </form>
                </td>
              </tr>";
    }

    echo "</table>";
    echo "<p><strong>Total: $" . calculateTotal() . "</strong></p>";
    echo "<a href='actions/clear-cart.php'>Clear Cart</a>";
    
    echo "<br><br>     <form method='POST' action='checkout.php'>
                           <input type='submit' name='checkout' value='Proceed to checkout' style='padding: 10px 20px; background: rgb(178, 154, 17); color: white; text-decoration: none; border-radius: 5px;float: right;'>

                       </form> ";



}

?>







<?php include('layouts/header.php')?>





    <!-- cart -->
     <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font weight bolde">Your Cart</h2>
            <hr>
        </div>

        <?php displayCart(); ?>
       

        <!-- <div class="cart-total">
           <table>
              <tr>
                 <td>Subtotal</td>
                 <td>$155</td>
              </tr>
              <tr>
                <td>Total</td>
                <td>$155</td>
              </tr>
           </table>
        </div> -->

        <!-- <div class="checkout-container">
            <button class="btn checkout-btn">
              <span>Checkout</span> 
            </button>
        </div> -->
     </section>






 <?php include('layouts/footer.php')?>
