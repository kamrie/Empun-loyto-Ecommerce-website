<?php
  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mira Bella</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/cart.css">
    <link rel="stylesheet" href="assets/css/single-product.css">

</head>
<body>
 


   


<nav class="navbar navbar-expand-lg bg-white py-2 fixed-top">
  <div class="container container-nav">
    <!-- Logo -->
    <div class="d-flex align-items-center gap-2">
        <a class="nav-link" href="index.php">   
              <img src="assets/imgs/Empun logo.jpg" class="logo" alt="">
        </a>

        <h2 class="brand ">Mira Bella Koruja</h2>
    </div>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible Nav -->
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="nav-menu me-auto mb-2 mb-lg-0">
      
        
              <div class=" categories-div    ">

                      <!-- Categories -->
                    <li>
                      <a href="#">Categories <span class="arrow-down"></span></a>
                      <ul class="dropdown">
                        <?php include('server/get_categories.php'); ?>
                        <?php while($row=  $categories->fetch_assoc()){ ?> 
                          <li>
                            <a href="<?php echo "categories.php?product_category=" . $row['product_category'];?>">
                              <?php echo $row['product_category']; ?>
                            </a>
                          </li>
                        <?php } ?>
                      </ul>
                    </li>
                    <!-- New Arrivals -->
                    <li>
                      <a href="#">New Arrivals <span class="arrow-down"></span> <span class="hot-badge">HOT</span></a>
                      <ul class="dropdown">
                      <?php include('server/get_new_arrivals.php'); ?>

                          <?php if (isset($new_arrivals) && $new_arrivals->num_rows > 0) { ?>

                             <?php while($row = $new_arrivals->fetch_assoc()){ ?> 
                                <li>
                                  <a href="<?php echo "new_arrivals.php?product_name=" . urlencode($row['product_name']); ?>">
                                    <?php echo htmlspecialchars($row['product_name']); ?>
                                  </a>
                                </li>
                              <?php } ?>
                          <?php } else { ?>
                            <li>No new arrivals</li>
                          <?php } ?>
    
                      </ul>
                    </li>
                    <li><a href="bestsellers.php" >Best Sellers</a></li>
                    <!-- Accessories -->
                    <li>
                      <a href="#">Accessories & Materials <span class="arrow-down"></span></a>
                      <ul class="dropdown">
                        <!-- <li><a href="#">Accessories</a></li>
                        <li><a href="#">Materials</a></li> -->
                      </ul>
                    </li>
              </div>
              


              <div class=" categories-div    " >
                    <!-- Static Links -->
                  <li>
                    <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li>
                    <a class=" nav-link" href="contact.php">Contact Us</a>
                  </li>
                <!-- Icons -->
                    <li class="nav-item d-flex align-items-center gap-2">
                    <a href="cart.php">
                      <i class="bi bi-cart">

                        <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0 && !empty($_SESSION['cart']) ) { ?>
                          <span class="cart-quantity"><?php echo $_SESSION['quantity']  ?></span>
                        <?php } ?>
                      </i>
                    </a>
                    <a href="account.php"><i class="fa-solid fa-user"></i></a>
                  </li>
              </div>
       
      </ul>
    </div>
  </div>
</nav>










    
