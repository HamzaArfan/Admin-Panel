<!DOCTYPE html>
<html lang="en">
<?php include 'header.html'; ?>
<body>
        <?php include 'nav.html'; ?>
        <?php
        include "dbcon.php";
        $sql = "SELECT * FROM `products`";
        $result = mysqli_query($conn, $sql);
        $sql2 =
            "SELECT * FROM products WHERE product_id IN (SELECT r1.product_id FROM reviews AS r1 JOIN reviews AS r2 ON r1.product_id = r2.product_id GROUP BY r1.product_id HAVING AVG(r2.rating) > 4)";
        $result2 = $conn->query($sql2);
        $sql3 =
            "SELECT p1.category, sum(o2.total) as totalsum from  products p1 join orderitems o1 on p1.product_id = o1.product_id join  orders o2 on o1.order_id = o2.order_id group by  p1.category";
        $result3 = $conn->query($sql3);
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
                                    <?php while (
                                        $row = mysqli_fetch_assoc($result)
                                    ) { ?>
                                    <tr>
                                        <td><?php echo $row[
                                            "product_id"
                                        ]; ?></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $row[
                                            "description"
                                        ]; ?></td>
                                        <td><?php echo $row["price"]; ?></td>
                                        <td><?php echo $row["category"]; ?></td>
                                        <td><?php echo $row["stock"]; ?></td>
                                        <td><?php echo $row[
                                            "created_at"
                                        ]; ?></td>
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
                                    <?php while (
                                        $row2 = mysqli_fetch_assoc($result2)
                                    ) { ?>
                                    <tr>
                                        <td><?php echo $row2[
                                            "product_id"
                                        ]; ?></td>
                                        <td><?php echo $row2["name"]; ?></td>
                                        <td><?php echo $row2[
                                            "description"
                                        ]; ?></td>
                                        <td><?php echo $row2["price"]; ?></td>
                                        <td><?php echo $row2[
                                            "category"
                                        ]; ?></td>
                                        <td><?php echo $row2["stock"]; ?></td>
                                        <td><?php echo $row2[
                                            "created_at"
                                        ]; ?></td>
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
                                    <?php while (
                                        $row3 = mysqli_fetch_assoc($result3)
                                    ) { ?>
                                    <tr>
                                        <td><?php echo $row3[
                                            "category"
                                        ]; ?></td>
                                        <td><?php echo $row3[
                                            "totalsum"
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
            //function for the jquery datatable 
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
