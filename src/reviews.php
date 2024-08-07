<!DOCTYPE html>
<html lang="en">
<?php include 'header.html'; ?>
<body>
        <?php include 'nav.html'; ?>
        <?php
        include "dbcon.php";
        $sql = "SELECT * FROM `reviews`";
        $result = mysqli_query($conn, $sql);
        $sql2 =
            "SELECT * from users where user_id in(SELECT user_id  from   reviews);";
        $result2 = mysqli_query($conn, $sql2);
        $sql3 =
            "SELECT p1.product_id, p1.name, count(r1.review_id) as counts, avg(r1.rating) as ratin_avg from products p1 join reviews r1 on p1.product_id = r1.product_id group by  p1.product_id, p1.name order by ratin_avg desc;";
        $result3 = mysqli_query($conn, $sql3);
        ?>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Reviews</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="userTable">
                                <thead>
                                    <tr>
                                        <th>Review id</th>
                                        <th>U-Id</th>
                                        <th>Product id</th>
                                        <th>Rating</th>
                                        <th>Comments</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while (
                                        $row = mysqli_fetch_assoc($result)
                                    ) { ?>
                                    <tr>
                                        <td><?php echo $row[
                                            "review_id"
                                        ]; ?></td>
                                        <td><?php echo $row["user_id"]; ?></td>
                                        <td><?php echo $row[
                                            "product_id"
                                        ]; ?></td>
                                        <td><?php echo $row["rating"]; ?></td>
                                        <td><?php echo $row["comment"]; ?></td>
                                        <td><?php echo $row[
                                            "created_at"
                                        ]; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <p class="card-title mb-0" style="margin-top:100px">Users Who Gave Product Reviews</p>
                        <div class="table-responsive">
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
                                    <?php while (
                                        $row3 = mysqli_fetch_assoc($result2)
                                    ) { ?>
                                        <tr>
                                        <td><?php echo $row3["user_id"]; ?></td>
                                        <td><?php echo $row3["name"]; ?></td>
                                        <td><?php echo $row3["email"]; ?></td>
                                        <td><?php echo $row3[
                                            "password"
                                        ]; ?></td>
                                        <td><?php echo $row3["phone"]; ?></td>
                                        <td><?php echo $row3["address"]; ?></td>
                                        <td><?php echo $row3["city"]; ?></td>
                                        <td><?php echo $row3["state"]; ?></td>
                                        <td><?php echo $row3["zip"]; ?></td>
                                        <td><?php echo $row3[
                                            "created_at"
                                        ]; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <p class="card-title mb-0" style="margin-top:100px">Products With Reviews And Ratings</p>
                        <div class="table-responsive">
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
                                    <?php while (
                                        $row4 = mysqli_fetch_assoc($result3)
                                    ) { ?>
                                        <tr>
                                        <td><?php echo $row4[
                                            "product_id"
                                        ]; ?></td>
                                        <td><?php echo $row4["name"]; ?></td>
                                        <td><?php echo $row4["counts"]; ?></td>
                                        <td><?php echo $row4[
                                            "ratin_avg"
                                        ]; ?></td>
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
    </div>
</body>
</html>
