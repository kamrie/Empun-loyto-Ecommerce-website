


<?php include('header.php')?>

   <!-- <?php
      if(!isset($_SESSION['admin_logged_in'])){
          header('location: login.php');
          exit();
      }
   ?> -->


    <?php 
          //get orders
            // $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=? ");
            // $stmt->execute();
            // $orders = $stmt->get_result();

            // --------------------------------- 

            // 1. determine page number
            if (isset($_GET['page_no']) && $_GET['page_no'] != "") {  //if page no is set and its not equal to zero
                // If user has already entered a page, then page number is the one they selected
                $page_no = $_GET['page_no'];
            } else {
                // If user just entered the page, then default page is 1
                $page_no = 1;
            }

            // 2. return number of orders
            $stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM orders");
            $stmt1->execute();
            $stmt1->bind_result($total_records);
            $stmt1->store_result();
            $stmt1->fetch();

            // 3. products per page
            $total_records_per_page = 5;

            $offset = ($page_no - 1) * $total_records_per_page;

            $previous_page = $page_no - 1;
            $next_page = $page_no + 1;
            $adjacents = "2";

            $total_no_of_pages = ceil($total_records / $total_records_per_page);

            // 4. get all products
            $stmt2 = $conn->prepare("SELECT * FROM orders LIMIT ?, ?");
            $stmt2->bind_param("ii", $offset, $total_records_per_page);
            $stmt2->execute();
            $orders = $stmt2->get_result();


    ?>









 <div class="container-fluid">
     <div class="row" style="min-height: 1000px">

          <?php include('sidemenu.php')?>


          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                    <h1 class="h2">Dashboard</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="<?php echo isset($_SESSION['last_page']) ? $_SESSION['last_page'] : 'index.php'; ?>" class="btn btn-primary">
                                Back
                            </a>        
                        </div>
                    </div>
                </div>

              
                
              <h2>Orders</h2>
                <p> <strong>Name:</strong>  <span><?php if(isset($_SESSION['admin_name'])) {echo $_SESSION['admin_name'];}?></span></p>
                <p><strong>Email:</strong>  <span><?php if(isset($_SESSION['admin_email'])) {echo $_SESSION['admin_email'];}?></span></p>
                

                <?php if(isset($_GET['order_updated'])){ ?>
                    <p class="text-center" style="color: green;"> <?php echo $_GET['order_updated']?> </p>
                 <?php } ?>

                 <?php if(isset($_GET['order_failed'])){ ?>
                    <p class="text-center" style="color: red;"> <?php echo $_GET['order_failed']?> </p>
                 <?php } ?>
                 <?php if(isset($_GET['login_success'])){ ?>
                    <p class="text-center" style="color: green;"> <?php echo $_GET['login_success']?> </p>
                 <?php } ?>
                 <?php if(isset($_GET['register_success'])){ ?>
                    <p class="text-center" style="color: green;"> <?php echo $_GET['register_success']?> </p>
                 <?php } ?>


                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th scope="col">Order Id</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">User Id</th>
                                <th scope="col">Order Date</th>
                                <th scope="col">User Phone</th>
                                <th scope="col">User Address </th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php foreach($orders as $order) { ?>
                           <tr>

                                <td><?php echo $order['order_id']?></td>
                                <td><?php echo $order['order_status']?></td>
                                <td><?php echo $order['user_id']?></td>
                                <td><?php echo $order['order_date']?></td>
                                <td><?php echo $order['user_phone']?></td>
                                <td><?php echo $order['user_address']?></td>
                                <td><a class="btn btn-primary" href="edit_order.php?order_id=<?php echo $order['order_id']?>">Edit</a></td>
                                <td><a class="btn btn-danger" href="">Delete</a></td>
                               
                            </tr>
                            <?php } ?>

                     

                        </tbody>





                    </table>



                      <!-- Pagination -->
                      <nav aria-label="Page navigation example">
                                <ul class="pagination mt-5 justify-content-center">
                                    <li class="page-item  <?php if($page_no<=1) {echo 'disabled';}?>">
                                        <a class="page-link" href="<?php if($page_no<=1) {echo '#';}else{echo "?page_no=".($page_no-1);}?>">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
                                    <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

                                    <?php if( $page_no >= 3) {?>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="<?php echo "?page_no=". $page_no;?>"><?php echo $page_no;?></a></li>
                                    <?php }?>

                                    <li class="page-item <?php if($page_no>= $total_no_of_pages){echo 'disabled';}?>">
                                        <a class="page-link" href="<?php if($page_no>= $total_no_of_pages){echo '#';} else{echo "?page_no=". ($page_no+1);}?>">Next</a>
                                    </li>
                                </ul>
                     </nav>
                </div>
          </main>

     </div>
 </div>

   
