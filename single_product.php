<?php
include("server/connection.php");

   if(isset($_GET['product_id'])){ //get the product id through the Get parameter which is product_id
    $product_id = $_GET['product_id'];
    


    $stmt =  $conn->prepare("SELECT * FROM products WHERE product_id = ? ");  
      $stmt->bind_param("i",  $product_id); 
      $stmt->execute();
      $product=  $stmt->get_result(); 


          // Fetch related products (same category, excluding current product)
          //product_category = (SELECT product_category FROM products WHERE product_id = ?) finds the category of the current product.


        $related_stmt = $conn->prepare("
        SELECT * FROM products  WHERE product_category = (SELECT product_category FROM products WHERE product_id = ?) 
        AND product_id != ?   
        ORDER BY RAND() 
        LIMIT 5
    ");
      $related_stmt->bind_param("ii", $product_id, $product_id);
      $related_stmt->execute();
      $related_products = $related_stmt->get_result();


   }else{
      header('location: index.php');
   }

?>




<?php include('layouts/header.php')?>

  
   <!-- Single product -->
  <section class="container single-product my-5 pt-5">
      <div class="row mt-5">
        <?php while($row = $product->fetch_assoc()){ ?>

            <div class=" single-product col-lg-5 col-md-6 col-sm-12">
                  <img class="img-fluid w-100 pb-1" src="assets/imgs/<?php echo $row['product_image']; ?>" id="mainImg" alt="">
                <!-- smaller varities to the main products -->
                  <div class="small-img-group">
                      <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image']; ?>" width="100%" class="small-img" alt="">
                      </div>
                      <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-img" alt="">
                      </div>
                      <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-img" alt="">
                      </div>
                      <div class="small-img-col">
                        <img src="assets/imgs/<?php echo $row['product_image4']; ?>" width="100%" class="small-img" alt="">
                      </div>

                  </div>
            </div>
            
            <div class="col-lg-6 col-md-12 col-12">
                <h6>Women/Jewelry</h6>
                <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                <h2>$<?php echo $row['product_price']; ?></h2>


                <form method="POST" action="actions/add-to-cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>" />
                    <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>" />
                    <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>" />
                    <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>" />
                    
                    <input type="number" name="product_quantity" value="1" min='0'>
                    <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
                 </form>   

                <h4 class="mt-5 mb-5">Product details</h4>
                <span>
                  <?php echo $row['product_description']; ?> 
                </span>
                
            </div>

          </form> 
          <?php } ?>


            <div class='backToHome-et-checkout mt-5 '   >
                      <div class='cart'> 
                       <a class='nav-link' href='index.php'>Continue shopping</a> 
                       </div>  

                       <!-- <div>   
                             <form method='POST' action='checkout.php'>
                                <input type='submit' name='checkout' value='Proceed to checkout' style=''>
                            </form> 
                       </div> -->
             </div>       



      </div>


      
  </section>









     <!-- Related Products Section -->
<section id="related-products" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>Related Products</h3>
        <hr class="mx-auto">
    </div>
    <div class="row mx-auto container-fluid">
        <?php while ($row = $related_products->fetch_assoc()) { ?>
            <div class="product text-center five-grid col-md-4 col-sm-6 col-6">
            <a href="<?php echo "single_product.php?product_id=" . $row['product_id'];?>">
                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" alt="">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                <h4 class="p-price">&euro;<?php echo number_format($row['product_price']); ?></h4>
              </a> 
 
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>" class="buy-btn">
                  <button class="buy-btn"> Buy Now</button>
                </a>
            </div>
        <?php } ?>
    </div>
</section>





<script src="/assets/js/main.js"></script>
<?php include('layouts/footer.php')?>

