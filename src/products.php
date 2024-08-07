<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Products</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <a class="navbar-brand brand-logo me-5" href="index.html"><img src="assets/images/logo.svg" class="me-2" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-settings d-none d-lg-flex">
                    <button type="button" class="btn btn-primary">Logout</button>
                </li>
            </ul>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="users.php">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orders.php">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Products</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="reviews.php">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Reviews</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="order_items.php">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">OrderItems</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add.php">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Add User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="delete.php">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Delete / Update User</span>
                    </a>
                </li>


            </ul>
        </nav>

        <?php 
            $servername ="localhost"; 
            $username ="root";
            $password ="";
            $database ="adminpanel";

            $conn = mysqli_connect($servername, $username, $password, $database, 8111);
            $sql = "SELECT * FROM `products`";
            $result = mysqli_query($conn, $sql);

            $sql2 = "SELECT * FROM products WHERE product_id IN (SELECT r1.product_id FROM reviews AS r1 JOIN reviews AS r2 ON r1.product_id = r2.product_id GROUP BY r1.product_id HAVING AVG(r2.rating) > 4)";
            $result2 = $conn->query($sql2);

            $sql3="SELECT p1.category, sum(o2.total) as totalsum from  products p1 join orderitems o1 on p1.product_id = o1.product_id join  orders o2 on o1.order_id = o2.order_id group by  p1.category";
            $result3= $conn->query($sql3);
        ?>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Products</p>
                        <div class="table-responsive ">
                            <table class="table table-striped table-bordered" id="userTable">
                                <thead>
                                    <tr>
                                        <th>Product id</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Stock</th>
                                        <th>Created At</th>
                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                        <td><?php echo $row['product_id']?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['description']?></td>
                                        <td><?php echo $row['price']?></td>
                                        <td><?php echo $row['category']?></td>
                                        <td><?php echo $row['stock']?></td>
                                        <td><?php echo $row['created_at']?></td>
                                
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <p class="card-title mb-0" style="margin-top: 100px;">Prodcuts Having Avg Rating Greater Than 4</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="userTable2">
                                <thead>
                                    <tr>
                                        <th>Product id</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Category</th>
                                        <th>Stock</th>
                                        <th>Created At</th>
                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row2 = mysqli_fetch_assoc($result2)){ ?>
                                    <tr>
                                        <td><?php echo $row2['product_id']?></td>
                                        <td><?php echo $row2['name']?></td>
                                        <td><?php echo $row2['description']?></td>
                                        <td><?php echo $row2['price']?></td>
                                        <td><?php echo $row2['category']?></td>
                                        <td><?php echo $row2['stock']?></td>
                                        <td><?php echo $row2['created_at']?></td>
                                
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <p class="card-title mb-0" style="margin-top: 100px;">Total Revenue Per Project Category</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="userTable3">
                                <thead >
                                    <tr>
                                        <th>Category</th>
                                        <th>Total Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row3 = mysqli_fetch_assoc($result3)){ ?>
                                    <tr>
                                        <td><?php echo $row3['category']?></td>
                                        <td><?php echo $row3['totalsum']?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        <script>
            $(document).ready(function(){
                $('#userTable').DataTable({
                    responsive: true
                });
                $('#userTable2').DataTable({
                    responsive: true
                });
                $('#userTable3').DataTable({
                    responsive: true
                });
            });
        </script>
    </div>
</body>
</html>
