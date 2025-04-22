<?php
    include('server/connection.php');

    

        // Fetch best-selling products based on sales_count
        $stmt = $conn->prepare("
        


            SELECT oi.product_id, oi.product_name, oi.product_image, oi.product_price, COUNT(oi.product_id) AS sales_count
            FROM order_items oi
            GROUP BY oi.product_id, oi.product_name, oi.product_image, oi.product_price
            ORDER BY sales_count DESC
            LIMIT 20;

        ");
        $stmt->execute();
        $best_sellers = $stmt->get_result();
?>



     <?php include('layouts/header.php')?>


     <section id="categories" class="my-5 pb-5">
        <h5 class="category-title d-flex fs-4">   <a class="nav-link" href="index.php">Home</a> >
                        <i><?php echo  ucfirst($_GET['name']) ?></i>  <!-- uc first make the first letter capital  -->
        </h5> 

         <div class="container text-center mt-5 py-5">
            <!-- <h2 class="mb-4">Top 20 Best-Selling Products</h2> -->
            <div class="row mx-auto container-fluid">

                <?php while($row = $best_sellers->fetch_assoc()) { ?>

                <div class="product text-center five-grid col-md-4 col-sm-6 col-6">
                    <a href="<?php echo "single_product.php?product_id=" . $row['product_id'];?>">         
                            <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>" />
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h5 class="p-name"> <?php echo $row['product_name']; ?></h5>
                        <h4 class="p-price"> &euro;<?php echo number_format($row['product_price'], 2); ?></h4>                    
                    </a>

                   
                    <!-- <p><strong>Sold: <?php // echo $row['sales_count']; ?> times</strong></p> -->
                    
                    <a href="<?php echo "single_product.php?product_id=" . $row['product_id'];?>">
                        <button class="buy-btn"> Buy Now</button>
                    </a>
                </div>

                <?php } ?>

            </div>
        </div>


</section>


 <?php include('layouts/footer.php')?>


