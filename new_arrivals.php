<?php
include('server/connection.php');

if (isset($_GET['product_name'])) {
    $product_name = urldecode($_GET['product_name']);

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_name = ?");
    $stmt->bind_param("s", $product_name);
    $stmt->execute();
    $new_arrivals = $stmt->get_result();

   
} else {
    header("Location: index.php");
}
?>




 

         <h5 class="category-title d-flex fs-4"> 
          <a class="nav-link" href="index.php">Home</a> >
          <i><?php echo isset($_GET['product_name']) ? ucfirst(htmlspecialchars($_GET['product_name'])) : ''; ?></i>  
          </h5> 

        <div class="container text-center mt-5 py-5">
            <h2>New Arrivals</h2>
            <div class="row mx-auto container-fluid">

                <?php while ($row = $new_arrivals->fetch_assoc()) { ?>

                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                    <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
                    <a href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>">
                        <button class="buy-btn">Buy Now</button>
                    </a> 
                </div>

                <?php } ?>

            </div>
        </div>








<!-- ====================================================================== -->



   <?php include('layouts/header.php')?>

   <section id="categories" class="my-5 pb-5">

       

      <div class="container text-center mt-5 py-5">
            <div class="row mx-auto container-fluid">
                

                <?php while ($row = $new_arrivals->fetch_assoc()) { ?>

                            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                                <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
                                <div class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                                <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
                                <a href="<?php echo "single_product.php?product_id=" . $row['product_id']; ?>">
                                    <button class="buy-btn">Buy Now</button>
                                </a> 
                            </div>

                    <?php } ?>
            </div>
     </div>   

   </section>

<?php include('layouts/footer.php')?>
