<!DOCTYPE html>
<html lang="en">
<?php include 'header.html'; ?>
<body>
        <?php include 'nav.html'; ?>
        <?php
        include "dbcon.php";
        $result = mysqli_query($conn, "SELECT * FROM `orderitems`");
        $result1 = mysqli_query(
            $conn,
            "SELECT o1.product_id , sum(o1.quantity) as quantitys  from orderitems as o1 join orderitems as o2 ON o1.product_id =o2.product_id group by product_id ;"
        );
        ?>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Order Items</p>
                        <div class="table-responsive">
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
            <?php while ($review = mysqli_fetch_assoc($result)) { ?>
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
<div class="table-responsive">
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
    </div>
</body>
</html>
