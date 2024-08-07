<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Orders</title>
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
$servername = "localhost"; 
$username = "root";
$password = "";
$database = "adminpanel";

$conn = mysqli_connect($servername, $username, $password, $database, 8111);

$sql = "SELECT * FROM `orders`";
$result = mysqli_query($conn, $sql);

$sql1 = "SELECT u1.user_id, u1.name, u1.email, COUNT(o1.order_id) as ordercount, SUM(o1.total) as ordersum FROM users AS u1 JOIN orders AS o1 ON u1.user_id = o1.user_id GROUP BY u1.user_id, u1.name, u1.email";
$result1 = mysqli_query($conn, $sql1); 
$sql3 = "SELECT u1.user_id, u1.name, avg(o1.total) as totals from users u1 join orders o1 on u1.user_id = o1.user_id group by u1.user_id, u1.name";
$result2 = mysqli_query($conn, $sql3);

?>

        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Users</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="userTable">
                                <thead>
                                    <tr>
                                        <th>Order id</th>
                                        <th>User id</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                        <td><?php echo $row['order_id']?></td>
                                        <td><?php echo $row['user_id']?></td>
                                        <td><?php echo $row['total']?></td>
                                        <td><?php echo $row['status']?></td>
                                        <td><?php echo $row['created_at']?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <h1 class="card-title mb-0 " style="margin-top: 100px;">User Details With Orders Count and Amount Spent</h1>
                            <table class="table table-striped table-bordered" id="userTable1">
                                <thead>
                                    <tr>
                                        <th>User id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Order Count</th>
                                        <th>Order Sum</th>
                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row1 = mysqli_fetch_assoc($result1)){ ?>
                                    <tr>
                                        <td><?php echo $row1['user_id']?></td>
                                        <td><?php echo $row1['name']?></td>
                                        <td><?php echo $row1['email']?></td>
                                        <td><?php echo $row1['ordercount']?></td>
                                        <td><?php echo $row1['ordersum']?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <h1 class="card-title mb-0 " style="margin-top: 100px;">Average Order Value For Each User</h1>
                            <table class="table table-striped table-bordered" id="userTable2">
                                <thead>
                                    <tr>
                                        <th>User id</th>
                                        <th>Name</th>
                                        <th>totals</th>
                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($row2 = mysqli_fetch_assoc($result2)){ ?>
                                    <tr>
                                        <td><?php echo $row2['user_id']?></td>
                                        <td><?php echo $row2['name']?></td>
                                        <td><?php echo $row2['totals']?></td>
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
                $('#userTable1').DataTable({
                    responsive: true
                });
                $('#userTable2').DataTable({
                    responsive: true
                });
            });
        </script>
    </div>
</body>
</html>
