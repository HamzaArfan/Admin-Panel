<!DOCTYPE html>
<html lang="en">
<?php include 'header.html'; ?>
<head>
    <style>
        table.table {
            font-size: 20px; 
        }
        table.table th, table.table td {
            padding: 10px;
            text-align: center;
        }
        table.table th {
            white-space: nowrap; 
        }
    </style>
</head>
<script src="ajaxcalls_backend/update_delete_ajax.js"></script>
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
                                            <button onclick="confirmUpdate(<?php echo $review['user_id'] ?>)" type="button" class="btn btn-success" style="color: white !important;">Update</button>
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
    </div>
</body>
<script>
 $(document).ready(function() {
$('#userTable').DataTable({
  responsive: true
  });
 });
</script>
</html>
