<!DOCTYPE html>
<html lang="en">
<?php include 'header.html'; ?>
<head>
    <style>
        table.table {
            font-size: 20px; 
        }
        table.table th, table.table td {
            padding: 15px;
        }
        table.table th {
            white-space: nowrap; 
        }
    </style>
</head>
<body>
    <?php include 'nav.html'; ?>
    <?php include 'php_backend\delete_backend.php'; ?>
    <div class="row" style="margin-left: 20px;">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Delete and Update Users</p>
                    <div class="table-responsive" style="overflow-x: scroll;">
                        <table class="display expandable-table table table-striped table-bordered" style="width:100%" id="userTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($review = mysqli_fetch_assoc($result)) {
                                     //Fetching results for each row in a while loop
                                     //In the if statement we are checking if the user
                                     //is deleted then dont show its results.
                                    if ($review["is_deleted"] == 0) { ?>
                                    <tr>
                                        <td><?php echo $review["user_id"]; ?></td>
                                        <td><?php echo $review["name"]; ?></td>
                                        <td><?php echo $review["email"]; ?></td>
                                        <td><?php echo $review["password"]; ?></td>
                                        <td><?php echo $review["phone"]; ?></td>
                                        <td><?php echo $review["address"]; ?></td>
                                        <td><?php echo $review["city"]; ?></td>
                                        <td>
                                            <a href="update_user.php?id=<?php echo $review["user_id"]; ?>" type="button" class="btn btn-success" style="color: white !important;">Update</a>
                                        </td>
                                        <td>
                                            <button onclick="confirmDelete(<?php echo $review['user_id']?>)" type="button" class="btn btn-danger" style="color: white !important;">Delete</button>
                                        </td>
                                    </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
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
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
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
