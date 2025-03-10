<?php include('header.php'); ?>


<?php
   if(isset($_GET['product_id'])){
        $product_id = $_GET['product_id'];
       
        $stmt1 = $conn->prepare("SELECT * FROM products WHERE product_id= ?"); // from admin/products.php page
        $stmt1->bind_param("i",  $product_id);
        $stmt1->execute();
        $products = $stmt1->get_result();               
   }else if(isset($_POST['edit_btn'])){
         
      $product_id = $_POST['product_id'];
      $title = $_POST['title'];
      $description = $_POST['description'];
      $price = $_POST['price'];
      $offer = $_POST['offer'];
      $color = $_POST['color'];
      $category = $_POST['category'];
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // exit();

        $stmt = $conn->prepare('UPDATE products SET product_name=?, product_description=?, product_price=?,
                                  product_special_offer=?, product_color=?, product_category=? WHERE product_id=?');
        $stmt->bind_param('ssssssi',$title, $description,$price,$offer,$color,$category,$product_id);

        if($stmt->execute()){
                 header('location: products.php?edit_success_message=Product has been updated successfully');
                 exit(); // Stop script execution
        }else{
                header('location:  products.php?edit_failure_message=Error occured while updating products, try again');
                exit(); // Stop script execution
        }

   }else{
     header('location: products.php');
     exit();
   }
?>


<div class="container-fluid">
    <div class="row" style="min-height: 1000px">
        <?php include('sidemenu.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                    </div>
                </div>
            </div>
           <h2>Edit Product</h2>


            <div class="table-responsive">

                <div class="mx-auto container">
                    <form id="edit-form" method="POST" action='edit_product.php'>
                        <p style="color: red;">
                            <?php if (isset($_GET['error'])) { echo $_GET['error']; } ?>
                        </p>
                        
                        <div class="form-group mt-2">
                         <?php foreach( $products as $product) { ?>

                            <input type="hidden"  value="<?php echo $product['product_id']?>" name="product_id" />

                            <label>Title</label>
                            <input type="text" class="form-control" id="product-name" value="<?php echo $product['product_name']?>" name="title" placeholder="Title">
                        </div>

                        <div class="form-group mt-2">
                            <label>Description</label>
                            <input type="text" class="form-control" id="product-desc" value="<?php echo  $product['product_description']?>" name="description" placeholder="Description">
                        </div>

                        <div class="form-group mt-2">
                            <label>Price</label>
                            <input type="number" class="form-control" id="product-price"value="<?php echo $product['product_price']?>" name="price" placeholder="Price">
                        </div>

                        <div class="form-group mt-2">
                            <label>Category</label>
                            <select class="form-select" required name="category">
                                <option value="bracelets" <?php if($product['product_category'] == "bracelets") echo "selected"; ?> >Bracelets</option>
                                <option value="Earrings">  <?php if($product['product_category'] == "Earrings") echo "selected"; ?>    Earrings</option>
                                <option value="Necklaces">  <?php if($product['product_category'] == "necklaces") echo "selected"; ?>    Necklaces</option>
                                <option value="bangles">  <?php if($product['product_category'] == "bangles") echo "selected"; ?>    Bangle</option>
                                <option value="rings">  <?php if($product['product_category'] == "rings") echo "selected"; ?>    Rings</option>
                                <option value="pendants">  <?php if($product['product_category'] == "pendants") echo "selected"; ?>    Pendants</option>
                                <option value="chains">  <?php if($product['product_category'] == "chains") echo "selected"; ?>    Chains</option>
                            </select>
                        </div>



                        <div class="form-group mt-2">
                                <label>Color</label>
                                <input type="text" class="form-control" value="<?php echo $product['product_color']; ?>" name="color" id="product-color">
                            </div>

                            <div class="form-group mt-2">
                                <label>Special Offer/Sale</label>
                                <input type="number" class="form-control" value="<?php echo $product['product_special_offer']; ?>" name="offer" id="product-special-offer">
                            </div>

                     <?php } ?>

                            <div class="form-group mt-3">
                                <input type="submit" class="btn btn-primary" name="edit_btn" value="Edit"/>
                            </div>




                    </form>
                </div>
            </div>

        </main>
    </div>
</div>
