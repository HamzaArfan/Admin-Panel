<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Users Data</title>
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
                        <span class="menu-title">Add</span>
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
            $sql = "SELECT * FROM `USERS`";
            $result = mysqli_query($conn, $sql);
            
            $sql2 = "SELECT user_id ,is_deleted ,name,password, address FROM users WHERE user_id NOT IN ( SELECT user_id FROM orders )";
            $result3 = mysqli_query($conn, $sql2);

           $sql6 = "SELECT u1.user_id, u1.name,is_deleted, MAX(o1.created_at) as datecreated FROM users u1 JOIN orders o1 ON u1.user_id = o1.user_id GROUP BY u1.user_id, u1.name";
           $result6 = $conn->query($sql6);
           $sql7 ="select o1.user_id, u1.name , u1.is_deleted from orders o1 join orderitems o2 on o1.order_id = o2.order_id join users u1 on o1.user_id = u1.user_id group by o1.user_id, u1.name having count(distinct o2.product_id) > 1";
           $result7 = $conn->query($sql7);

        ?>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Users</p>
                        <div class="table-responsive">
                            <table class="display expandable-table" style="width:100%" id="userTable">
                                <thead>
                                    <tr>
                                        <th>User id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>City</th>
                                        <th>State</th>
                                        <th>Zip</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while($row = mysqli_fetch_assoc($result)){
                                        if ($row['is_deleted']==0){ ?>
                                    <tr>
                                        <td><?php echo $row['user_id']?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['password']?></td>
                                        <td><?php echo $row['phone']?></td>
                                        <td><?php echo $row['address']?></td>
                                        <td><?php echo $row['city']?></td>
                                        <td><?php echo $row['state']?></td>
                                        <td><?php echo $row['zip']?></td>
                                        <td><?php echo $row['created_at']?></td>
                                    </tr>
                                    <?php  } } ?>
                                </tbody>
                            </table>
                        </div>
                        <p class="card-title mb-0" style="margin-top: 100px;">Users Who Havent Placed An Order</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="userTable3">
                                <thead>
                                    <tr>
                                        <th>User id</th>
                                        <th>name</th>
                                        <th>password</th>
                                        <th>address</th>
            
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row2 = mysqli_fetch_assoc($result3)){
                                         if ($row2['is_deleted']==0){ ?> ?>
                                    <tr>
                                        <td><?php echo $row2['user_id']?></td>
                                        <td><?php echo $row2['name']?></td>
                                        <td><?php echo $row2['password']?></td>
                                        <td><?php echo $row2['address']?></td>

                                    </tr>
                                    
                                    <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                        <p class="card-title mb-0" style="margin-top: 100px;">Most Recent Order For Each User</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="userTable4">
                                <thead>
                                    <tr>
                                        <th>User id</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row3 = mysqli_fetch_assoc($result6)){
                                         if ($row3['is_deleted']==0){  ?>
                                    <tr>
                                        <td><?php echo $row3['user_id']?></td>
                                        <td><?php echo $row3['name']?></td>
                                        <td><?php echo $row3['datecreated']?></td>
                                    </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                        <p class="card-title mb-0" style="margin-top: 100px;">Users Who Ordered More Than 1 Type Of Product</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="userTable5">
                                <thead>
                                    <tr>
                                        <th>User id</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row4 = mysqli_fetch_assoc($result7)){
                                        if ($row4['is_deleted']==0){  ?>
                                    <tr>
                                        <td><?php echo $row4['user_id']?></td>
                                        <td><?php echo $row4['name']?></td>
                                    </tr>
                                    <?php }} ?>
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
                $('#userTable3').DataTable({
                  responsive: true
                });
                $('#userTable4').DataTable({
                  responsive: true
                });
                $('#userTable5').DataTable({
                  responsive: true
                });
            });
        </script>
    </div>
</body>
</html>
