<!DOCTYPE html>
<html lang="en">
<?php include 'header.html'; ?>
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
<?php include 'php_backend/products_backend.php'; ?>
<div class="row ">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title mb-0">Products</p>
                <div class="table-responsive" style="overflow-x: scroll;">
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
                        <?php while ($row = mysqli_fetch_assoc($result)) { 
                            //Fetching results for each row in a while loop?>
                            <tr>
                                <td><?php echo $row["product_id"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["description"]; ?></td>
                                <td><?php echo $row["price"]; ?></td>
                                <td><?php echo $row["category"]; ?></td>
                                <td><?php echo $row["stock"]; ?></td>
                                <td><?php echo $row["created_at"]; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <p class="card-title mb-0" style="margin-top: 100px;">Products Having Avg Rating Greater Than 4</p>
                <div class="table-responsive" style="overflow-x: scroll;">
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
                        <?php while ($row2 = mysqli_fetch_assoc($result2)) { 
                            //Fetching results for each row in a while loop?>
                            <tr>
                                <td><?php echo $row2["product_id"]; ?></td>
                                <td><?php echo $row2["name"]; ?></td>
                                <td><?php echo $row2["description"]; ?></td>
                                <td><?php echo $row2["price"]; ?></td>
                                <td><?php echo $row2["category"]; ?></td>
                                <td><?php echo $row2["stock"]; ?></td>
                                <td><?php echo $row2["created_at"]; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <p class="card-title mb-0" style="margin-top: 100px;">Total Revenue Per Product Category</p>
                <div class="table-responsive" style="overflow-x: scroll;">
                    <table class="table table-striped table-bordered" id="userTable3">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Total Revenue</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row3 = mysqli_fetch_assoc($result3)) {
                            //Fetching results for each row in a while loop ?>
                            <tr>
                                <td><?php echo $row3["category"]; ?></td>
                                <td><?php echo $row3["totalsum"]; ?></td>
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
</body>
</html>
