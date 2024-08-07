
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Users Data</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            $sql = "SELECT * FROM `USERS`";
            $result = mysqli_query($conn, $sql);
            

        ?>

        <div class="row" style="margin-left: 20px;">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Delete and Update Users</p>
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
                                        <th>Update</th>
                                        <th>Delete User</th>
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
                                        <td><a href="update_user.php?id=<?php echo $row['user_id']?>" class="btn btn-success" style="color: white !important;">Update</a></td>
                                        <td><button onclick="confirmDelete(<?php echo $row['user_id']?>)"  type="button" class="btn btn-danger" style="color: white !important;">Delete</button></td>
                                    </tr>
                                    <?php  } } ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div> 
        </div>

        <script>
            $(document).ready(function(){
                $('#userTable').DataTable({
                  responsive: true
                });
            });
            function confirmDelete(userId) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor:'#d33' ,
        cancelButtonColor:'#3085d6' ,
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `delete_user.php?id=${userId}`;
        }
    })
}
            
        </script>
    </div>
</body>
</html>
