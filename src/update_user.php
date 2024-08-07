<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Update User</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
            </ul>
        </nav>

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Update User</h4>
                                <?php 
                                $servername = "localhost"; 
                                $username = "root";
                                $password = "";
                                $database = "adminpanel";

                                $conn = mysqli_connect($servername, $username, $password, $database, 8111);

                                // Fetch user details
                                if (isset($_GET['id'])) {
                                    $user_id = $_GET['id'];
                                    $sql = "SELECT * FROM `USERS` WHERE `user_id` = $user_id";
                                    $result = mysqli_query($conn, $sql);
                                    $user = mysqli_fetch_assoc($result);
                                } 

                                // Update user details
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    $name = $_POST['userName'];
                                    $email = $_POST['userEmail'];
                                    $password = $_POST['userPassword'];
                                    $phone = $_POST['userPhone'];
                                    $address = $_POST['userAddress'];
                                    $city = $_POST['userCity'];
                                    $state = $_POST['userState'];
                                    $zip = $_POST['userZip'];

                                    $update_sql = "UPDATE `USERS` SET `name`='$name', `email`='$email', `password`='$password', 
                                                   `phone`='$phone', `address`='$address', `city`='$city', `state`='$state', `zip`='$zip' 
                                                   WHERE `user_id`=$user_id";

                                    if (mysqli_query($conn, $update_sql)) {
                                        header("Location: users.php"); // Redirect to users page after update
                                        exit;
                                    } else {
                                        echo "Error updating record: " . mysqli_error($conn);
                                    }
                                }
                                ?>
                                <form class="forms-sample" action="" method="POST">
                                    <div class="form-group">
                                        <label for="userId">User ID</label>
                                        <input type="text" class="form-control" name="userId" id="userId" value="<?php echo $user['user_id']; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="userName">Name</label>
                                        <input type="text" class="form-control" name="userName" id="userName" value="<?php echo $user['name']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="userEmail">Email</label>
                                        <input type="email" class="form-control" name="userEmail" id="userEmail" value="<?php echo $user['email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="userPassword">Password</label>
                                        <input type="password" class="form-control" name="userPassword" id="userPassword" value="<?php echo $user['password']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="userPhone">Phone</label>
                                        <input type="text" class="form-control" name="userPhone" id="userPhone" value="<?php echo $user['phone']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="userAddress">Address</label>
                                        <input type="text" class="form-control" name="userAddress" id="userAddress" value="<?php echo $user['address']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="userCity">City</label>
                                        <input type="text" class="form-control" name="userCity" id="userCity" value="<?php echo $user['city']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="userState">State</label>
                                        <input type="text" class="form-control" name="userState" id="userState" value="<?php echo $user['state']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="userZip">Zip</label>
                                        <input type="text" class="form-control" name="userZip" id="userZip" value="<?php echo $user['zip']; ?>" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Update User</button>
                                    <button type="reset" class="btn btn-light">Reset</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
