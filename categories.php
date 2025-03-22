<?php
include('server/connection.php');

if (isset($_GET['name'])) {
    $category = $_GET['name'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_category = ?");
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $product = $stmt->get_result();
} else {
    header("Location: index.php");
}
?>



<?php include('layouts/header.php')?>


  <section id="categories" class="my-5 pb-5">
       <!-- <div class="container text-center mt-5 py-5">
            <h3>Products You May Like</h3>
            <hr class="mx-auto"> 
       </div> -->
       
    <h5 class="category-title d-flex fs-4">   <a class="nav-link" href="index.php">Home</a> >
                     <i><?php echo  ucfirst($_GET['name']) ?></i> 
    </h5>  <!-- uc first make the first letter capital  -->

        <div class="container text-center mt-5 py-5">
                <div class="row mx-auto container-fluid">

                <?php include('server/get_featured_products.php');  ?>

                <?php while($row = $product->fetch_assoc()){ ?>

                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"> <?php echo $row['product_name']; ?></h5>
                    <h4 class="p-price"> $<?php echo $row['product_price']; ?></h4>
                    <a href="<?php echo "single_product.php?product_id=" . $row['product_id'];?>"><button class="buy-btn"> Buy Now</button></a> 
                </div>

                <?php } ?>
                <!-- =============== -->        
            </div>
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

