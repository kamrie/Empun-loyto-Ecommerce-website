<?php
include("server/connection.php");
session_start();

   if(isset($_GET['product_id'])){ //get the product id through the Get parameter which is product_id
    $product_id = $_GET['product_id'];
    
    $stmt =  $conn->prepare("SELECT * FROM products WHERE product_id = ? ");  //WHERE product_id = ? means where product_id is unique
      $stmt->bind_param("i",  $product_id); //i means interger

      $stmt->execute();
    
      $product=  $stmt->get_result();  //$featured_products variable is an array


   }else{
      header('location: index.php'); // if we dont have it, take us to the home page

   }


?>





<?php include('layouts/header.php')?>



   <!-- Single product -->
  <section class="container single-product my-5 pt-5">
      <div class="row mt-5">
        <?php while($row = $product->fetch_assoc()){ ?>

            <div class="col-lg-5 col-md-6 col-sm-12">
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


      </div>

  </section>


     <!-- Related Productss -->
     <section id="related-products" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
           <h3>Related Products</h3>
           <hr class="mx-auto"> <!-- mx-auto centers the line   -->
      </div>
      <div class="row mx-auto container-fluid">
         <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/featured 1.webp" alt="">
            <div class="star">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"> Golden necklace</h5>
            <h4 class="p-price"> $199.8</h4>
            <button class="buy-btn"> Buy Now</button>
         </div>
         <div class="product text-center col-lg-3 col-md-4 col-sm-12">
           <img class="img-fluid mb-3" src="assets/imgs/featured 2.webp" alt="">
           <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
           </div>
           <h5 class="p-name"> Golden necklace</h5>
           <h4 class="p-price"> $199.8</h4>
           <button class="buy-btn"> Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img class="img-fluid mb-3" src="assets/imgs/featured 3.webp" alt="">
           <div class="star">
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
           </div>
         <h5 class="p-name"> Golden necklace</h5>
         <h4 class="p-price"> $199.8</h4>
         <button class="buy-btn"> Buy Now</button>
       </div>
         <div class="product text-center col-lg-3 col-md-4 col-sm-12">
           <img class="img-fluid mb-3" src="assets/imgs/featured 4.webp" alt="">
           <div class="star">
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
             <i class="fas fa-star"></i>
           </div>
           <h5 class="p-name"> Golden necklace</h5>
           <h4 class="p-price"> $199.8</h4>
           <button class="buy-btn"> Buy Now</button>
         </div>
      </div>
   </section>





<?php include('layouts/footer.php')?>

