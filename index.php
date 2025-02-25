
<?php include('layouts/header.php')?>



      <!-- Home -->
       <section id="home">
         <div class=" container">
             <h5 >NEW ARRIVALS</h5>
             <h1><span> Best Prices</span> this Season</h1>
             <p>EMPUN LOYTO offers the best products for the most affordable prices</p>
             <button> Shop Now</button>
         </div>
       </section>

       <!-- Brand -->
        <section id="brand" class="container">
           <div class="row">
             <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/Empun logo.jpg" alt="">
             <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/Empun logo.jpg" alt="">
             <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/Empun logo.jpg" alt="">
             <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/Empun logo.jpg" alt="">

           </div>
        </section>

        <!-- New section for displaying card, each card will display a new Product in our website -->
     <section id="new" class="w-100">
        <div class="row p-0 m-0">
            <!-- one -->
            <div class="one col-lg-4 col-md-6 col-sm-12 p-0 ">
               <img class="img-fluid" src="assets/imgs/earring 1.webp" alt="">
               <div class="details">
                  <h2>Extremely Awesome earrings</h2>
                  <button class="text-uppercase"> Shop Now</button>
               </div>
            </div>
            <!-- two -->
            <div class="one col-lg-4 col-md-6 col-sm-12 p-0 ">
                <img class="img-fluid" src="assets/imgs/earring 2.webp" alt="">
                <div class="details">
                   <h2> Awesome crystal jewelry</h2>
                   <button class="text-uppercase"> Shop Now</button>
                </div>
             </div>
              <!-- Three -->
            <div class="one col-lg-4 col-md-6 col-sm-12 p-0 ">
                <img class="img-fluid" src="assets/imgs/earring 3.webp" alt="">
                <div class="details">
                   <h2>Extremely Awesome earrings</h2>
                   <button class="text-uppercase"> Shop Now</button>
                </div>
             </div>
        </div>
     </section>

     <!-- Featured -->
    <section id="featured" class="my-5 pb-5">
       <div class="container text-center mt-5 py-5">
            <h3>Our Featured</h3>
            <hr class="mx-auto"> <!-- mx-auto centers the line   -->
            <p>Here you can check out our featured products</p>
       </div>
       <div class="row mx-auto container-fluid">

          <?php include('server/get_featured_products.php');  ?>

         <?php while($row=  $featured_products->fetch_assoc()){ ?>

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
    </section>

    <!-- Banner -->
    <section id="banner" class="my-5 py-5">
        <div class="container">
          <h4>MID SEASON'S SALE </h4> 
          <h1>Autumn Collection <br> Up to 30% OFF  </h1>
          <button class="text-uppercase"> shop now</button>
        </div>
    </section> 

    <!-- Earring Collection -->
    <section id="featured" class="my-5 ">
      <div class="container text-center mt-5 py-5">
           <h3>Elegant Earrings Collection</h3>
           <hr class="mx-auto"> <!-- mx-auto centers the line   -->
           <p>Explore our stunning collection of handcrafted earring.</p>
      </div>
      <div class="row mx-auto container-fluid">
       <?php include('server/get_earring.php'); ?>

       <?php while($row = $earring_products->fetch_assoc()){ ?>

         <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']?>" alt="">
            <div class="star">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_price']?></h5>
            <h4 class="p-price"> $<?php echo $row['product_price'] ?></h4>
            <button class="buy-btn"> Buy Now</button>
         </div>
       
       <?php } ?>  
      </div>
   </section>

      <!-- Watches -->
      <section id="watches" class="my-5 ">
        <div class="container text-center mt-5 py-5">
             <h3>Best watches</h3>
             <hr class="mx-auto"> <!-- mx-auto centers the line   -->
             <p>Check out our unique watches</p>
        </div>
        <div class="row mx-auto container-fluid">
           <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="assets/imgs/watch 1.webp" alt="">
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
             <img class="img-fluid mb-3" src="assets/imgs/clothes 1.webp" alt="">
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
            <img class="img-fluid mb-3" src="assets/imgs/watch 3.webp" alt="">
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
             <img class="img-fluid mb-3" src="assets/imgs/watch 4.avif" alt="">
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
