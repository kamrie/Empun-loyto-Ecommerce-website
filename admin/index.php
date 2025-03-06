


<?php include('header.php')?>

   <?php
      if(!isset($_SESSION['admin_logged_in'])){
          header('location: login.php');
          exit();
      }
   ?>


    <?php 
          //get orders
            // $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=? ");
            // $stmt->execute();
            // $orders = $stmt->get_result();

            // --------------------------------- 

            // 1. determine page number
            if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
                // If user has already entered a page, then page number is the one they selected
                $page_no = $_GET['page_no'];
            } else {
                // If user just entered the page, then default page is 1
                $page_no = 1;
            }

            // 2. return number of products
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
                        </div>
                    </div>
                </div>

              <h2>Orders</h2>
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
                                <td><a class="btn btn-primary" href="">Edit</a></td>
                                <td><a class="btn btn-danger" href="">Delete</a></td>
                               
                            </tr>
                            <?php } ?>

                     

                        </tbody>





                    </table>



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
          </main>

     </div>
 </div>

   
