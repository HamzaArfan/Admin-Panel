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
    <?php include 'php_backend/orderitems_backend.php'; ?>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <p class="card-title mb-0">Order Items</p>
                    <div class="table-responsive" style="overflow-x: scroll;">
                        <table class="table table-striped table-bordered" id="userTable">
                            <thead>
                                <tr>
                                    <th>Order Item id</th>
                                    <th>Order id</th>
                                    <th>Product id</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($review = mysqli_fetch_assoc($result)) { 
                                //Fetching results for each row in a while loop
                                ?>
                                    <tr>
                                        <td><?php echo $review["order_item_id"]; ?></td>
                                        <td><?php echo $review["order_id"]; ?></td>
                                        <td><?php echo $review["product_id"]; ?></td>
                                        <td><?php echo $review["quantity"]; ?></td>
                                        <td><?php echo $review["price"]; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                    <p class="card-title mb-0" style="margin-top: 100px;">Total Quantity Of Each Product Sold</p>
                    <div class="table-responsive" style="overflow-x: scroll;">
                        <table class="table table-striped table-bordered" id="userTable1">
                            <thead>
                                <tr>
                                    <th>Product id</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($review1 = mysqli_fetch_assoc($result1)) { ?>
                                    <tr>
                                        <td><?php echo $review1["product_id"]; ?></td>
                                        <td><?php echo $review1["quantitys"]; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#userTable').DataTable({
                responsive: true
            });
            
            $('#userTable1').DataTable({
                responsive: true
            });
        });
    </script>
</body>
</html>
