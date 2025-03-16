 <?php

     include('server/connection.php');

     //if user uses the search section
     if(isset($_POST['search'])){
      
        $category = $_POST['category'];
        $price = $_POST['price'];


        $stmt = $conn->prepare("SELECT * FROM products where product_category=? AND product_price<=? ");
        $stmt->bind_param("si",$category, $price);

        $stmt->execute();

        $products = $stmt->get_result();

        //return all products
     }else{
            
        $stmt = $conn->prepare("SELECT * FROM products ");

        $stmt->execute();

        $products = $stmt->get_result();
     }





 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
   
    <style>
        .product img{      /*to make all the images the same size*/
            width: 100%;
            height: auto;
            box-sizing: border-box;
            object-fit: cover;
        }

        .pagination a{
            color: #fb774b;
        }
        .pagination li:hover a{
            color:#fff ;
            background-color: #fb774b ;
        }
        .sticky-sidebar {
            position: sticky;
            top: 100px; /* Adjust based on your header height */
            height: calc(100vh - 120px); /* Adjust height dynamically */
            overflow-y: auto; /* Add scrolling inside if needed */
        }

    </style>
</head>
<body>


     <!-- Navbar -->
     <nav class="navbar navbar-expand-lg bg-white py-3 fixed-top ">
        <div class="container">
         <img src="assets/imgs/Empun logo.jpg" class="logo" alt="">
         <h2 class="brand"> Mira Bella</h2>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="shop.php">Shop</a>
              </li>  
              <li class="nav-item">   
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
              </li>

              <li class="nav-item">
                <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
                <a href="account.php"><i class="fa-solid fa-user"></i></a>
              </li>
            
            </ul>
           
          </div>
        </div>
     </nav>

     <section style="display:flex; padding-top: 5rem;" >
         <div class="container mt-5 py-5">
             <div class="row">
                    <!-- Left Section: Filter search -->
                    <div class="col-lg-3">
                        <div class="sticky-sidebar p-3 border rounded">
                            <p>Search Products</p>
                            <hr>

                            <form action="shop.php" method="POST">
                                <p>Category</p>
                                <div class="form-check">
                                    <input class="form-check-input" value="Bracelets" type="radio" name="category" id="category_one" checked>
                                    <label class="form-check-label" for="category_one"> Bracelets </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Earrings" type="radio" name="category" id="category_two">
                                    <label class="form-check-label" for="category_two"> Earrings </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Necklaces" type="radio" name="category" id="category_three">
                                    <label class="form-check-label" for="category_three"> Necklaces </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Bangle" type="radio" name="category" id="category_four">
                                    <label class="form-check-label" for="category_four"> Bangle </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Rings" type="radio" name="category" id="category_five">
                                    <label class="form-check-label" for="category_five"> Rings </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Pendants" type="radio" name="category" id="category_six">
                                    <label class="form-check-label" for="category_six"> Pendants </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" value="Chains" type="radio" name="category" id="category_seven">
                                    <label class="form-check-label" for="category_seven"> Chains </label>
                                </div>

                                <!-- Price Filter -->
                                <p class="mt-3">Price</p>
                                <input type="range" class="form-range w-100" name="price" value="5" min="1" max="500" id="customRange2">
                                <div class="w-100 d-flex justify-content-between position-relative">
                                    <span>$1</span>
                                    <span class="position-absolute start-50 translate-middle">250</span>
                                    <span>$500</span>
                                </div>

                                <!-- Search Button -->
                                <div class="form-group mt-3">
                                    <input type="submit" name="search" value="Search" class="btn btn-primary w-100">
                                </div>
                            </form>
                        </div>
                 
                    </div>
                <!-- Right Section: Products -->
                    <div class="col-lg-9">
                            <h3>Our Products</h3>
                            <hr>
                            <p>Here you can check out our featured products</p>

                            <div id="featured" class="row mx-auto">
                                <?php while($row = $products->fetch_assoc()) { ?>
                                    <div class="product text-center  five-grid  col-md-4 col-sm-6">
                                        <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']?>" alt="">
                                        <div class="star">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <h5 class="p-name"><?php echo $row['product_name']?></h5>
                                        <h4 class="p-price">$<?php echo $row['product_price']?></h4>
                                        <a href="<?php echo "single_product.php?product_id=" . $row['product_id'];?>"> 
                                            <button class="buy-btn"> 
                                                Buy Now
                                            </button>
                                        </a> 
                                    </div>
                                <?php } ?>
                            </div>

                            <!-- Pagination -->
                            <nav aria-label="Page navigation example">
                                <ul class="pagination mt-5 justify-content-center">
                                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>


             </div>

         </div>
                    
     </section>





<?php include('layouts/footer.php')?>
