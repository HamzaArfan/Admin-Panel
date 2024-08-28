<!DOCTYPE html>
<html lang="en">
<?php include 'header.html'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
        table.table {
            font-size: 20px;
        }
        table.table th, table.table td {
            padding: 15px; 
            text-align: center;
        }
        table.table th {
            white-space: nowrap;
        }
    </style>
<body>
    <?php include 'nav.html'; ?>
    <?php include 'php_backend/reviews_backend.php'; ?>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Reviews</p>
                    <div class="table-responsive" style="overflow-x: scroll;">
                        <table class="table table-striped table-bordered" id="userTable">
                            <thead>
                                <tr>
                                    <th>Review id</th>
                                    <th>User</th>
                                    <th>Product</th>
                                    <th>Rating</th>
                                    <th>Comments</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) {
                                    //Fetching results for each row in a while loop ?>
                                    <tr>
                                        <td><?php echo $row["review_id"]; ?></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $row["pname"]; ?></td>
                                        <td><?php $rating = $row["rating"];
                                         for ($i = 1; $i <= 5; $i++) 
                                         {
                                         if ($i <= $rating) {
                                            echo '<i class="fas fa-star" style="color:#4B49AC;"></i>';
                                         }
                                         }  ?> </td>
                                        <td><?php echo $row["comment"]; ?></td>
                                        <td><?php echo $row["created_at"]; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <p class="card-title mb-0" style="margin-top:100px">Users Who Gave Product Reviews</p>
                    <div class="table-responsive" style="overflow-x: scroll;">
                        <table class="table table-striped table-bordered" id="userTable1">
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
                                <?php while ($row3 = mysqli_fetch_assoc($result2)) {
                                    //Fetching results for each row in a while loop ?>
                                    <tr>
                                        <td><?php echo $row3["user_id"]; ?></td>
                                        <td><?php echo $row3["name"]; ?></td>
                                        <td><?php echo $row3["email"]; ?></td>
                                        <td><?php echo $row3["password"]; ?></td>
                                        <td><?php echo $row3["phone"]; ?></td>
                                        <td><?php echo $row3["address"]; ?></td>
                                        <td><?php echo $row3["city"]; ?></td>
                                        <td><?php echo $row3["state"]; ?></td>
                                        <td><?php echo $row3["zip"]; ?></td>
                                        <td><?php echo $row3["created_at"]; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <p class="card-title mb-0" style="margin-top:100px">Products With Reviews And Ratings</p>
                    <div class="table-responsive" style="overflow-x: scroll;">
                        <table class="table table-striped table-bordered" id="userTable2">
                            <thead>
                                <tr>
                                    <th>Product id</th>
                                    <th>Name</th>
                                    <th>Count</th>
                                    <th>Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row4 = mysqli_fetch_assoc($result3)) {
                                    //Fetching results for each row in a while loop ?>
                                    <tr>
                                        <td><?php echo $row4["product_id"]; ?></td>
                                        <td><?php echo $row4["name"]; ?></td>
                                        <td><?php echo $row4["counts"]; ?></td>
                                        <td><?php echo $row4["ratin_avg"]; ?></td>
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
            //function for the jquery datatable 
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
</body>
</html>
