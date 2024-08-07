<!DOCTYPE html>
<html lang="en">
<?php include 'header.html'; ?>
<body>
<?php include 'php_backend\users_backend.php'; ?>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Users</p>
                        <div class="table-responsive">
                            <table class="display expandable-table" style="width:100%" id="userTable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
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
                                <?php while (
                                    $review = mysqli_fetch_assoc($result)
                                ) {
                                    //Fetching results for each row in a while loop
                                    //In the if statement we are checking if the user
                                    //is deleted then dont show its results.
                                    if ($review["is_deleted"] == 0) { ?>
                                    <tr>
                                        <td><?php echo $review[
                                            "user_id"
                                        ]; ?></td>
                                        <td><?php echo $review["name"]; ?></td>
                                        <td><?php echo $review["email"]; ?></td>
                                        <td><?php echo $review[
                                            "password"
                                        ]; ?></td>
                                        <td><?php echo $review["phone"]; ?></td>
                                        <td><?php echo $review[
                                            "address"
                                        ]; ?></td>
                                        <td><?php echo $review["city"]; ?></td>
                                        <td><?php echo $review["state"]; ?></td>
                                        <td><?php echo $review["zip"]; ?></td>
                                        <td><?php echo $review[
                                            "created_at"
                                        ]; ?></td>
                                    </tr>
                                    <?php }
                                } ?>
                                </tbody>
                            </table>
                        </div>
                        <p class="card-title mb-0" style="margin-top: 100px;">Users Who Havent Placed An Order</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="userTable3">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>name</th>
                                        <th>password</th>
                                        <th>address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while (
                                        $review2 = mysqli_fetch_assoc($result1)
                                    ) {
                                        //Fetching results for each row in a while loop
                                        //In the if statement we are checking if the user
                                        //is deleted then dont show its results.
                                        if ($review2["is_deleted"] == 0) { ?> ?>
                                    <tr>
                                        <td><?php echo $review2[
                                            "user_id"
                                        ]; ?></td>
                                        <td><?php echo $review2["name"]; ?></td>
                                        <td><?php echo $review2[
                                            "password"
                                        ]; ?></td>
                                        <td><?php echo $review2[
                                            "address"
                                        ]; ?></td>
                                    </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <p class="card-title mb-0" style="margin-top: 100px;">Most Recent Order For Each User</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="userTable4">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while (
                                        $review3 = mysqli_fetch_assoc($result2)
                                    ) {
                                        //Fetching results for each row in a while loop
                                        //In the if statement we are checking if the user
                                        //is deleted then dont show its results.
                                        if ($review3["is_deleted"] == 0) { ?>
                                    <tr>
                                        <td><?php echo $review3[
                                            "user_id"
                                        ]; ?></td>
                                        <td><?php echo $review3["name"]; ?></td>
                                        <td><?php echo $review3[
                                            "datecreated"
                                        ]; ?></td>
                                    </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                        <p class="card-title mb-0" style="margin-top: 100px;">Users Who Ordered More Than 1 Type Of Product</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="userTable5">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while (
                                        $review4 = mysqli_fetch_assoc($result3)
                                    ) {
                                        //Fetching results for each row in a while loop
                                        //In the if statement we are checking if the user
                                        //is deleted then dont show its results.
                                        if ($review4["is_deleted"] == 0) { ?>
                                    <tr>
                                        <td><?php echo $review4[
                                            "user_id"
                                        ]; ?></td>
                                        <td><?php echo $review4["name"]; ?></td>
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
        <script>
            $(document).ready(function(){
                //function for the jquery datatable 
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
