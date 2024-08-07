<!DOCTYPE html>
<html lang="en">
<?php include 'header.html'; ?>
<body>
    <?php include 'nav.html'; ?>

    <?php include 'php_backend\orders_backend.php'; ?>
<div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Orders</p>
            <div class="table-responsive">
              <table class="table table-striped table-bordered" id="userTable">
                <thead>
                  <tr>
                    <th>Order id</th>
                    <th>U-Id</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Created At</th>
                  </tr>
                </thead>
                <tbody> <?php while (
                    $row = mysqli_fetch_assoc($result)
                ) { ?> <tr>
                    <td> <?php echo $row["order_id"]; ?> </td>
                    <td> <?php echo $row["user_id"]; ?> </td>
                    <td> <?php echo $row["total"]; ?> </td>
                    <td> <?php echo $row["status"]; ?> </td>
                    <td> <?php echo $row["created_at"]; ?> </td>
                  </tr> <?php } ?> </tbody>
              </table>
              <h1 class="card-title mb-0 " style="margin-top: 100px;">User Details With Orders Count and Amount Spent</h1>
              <table class="table table-striped table-bordered" id="userTable1">
                <thead>
                  <tr>
                    <th>U-Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Order Count</th>
                    <th>Order Sum</th>
                  </tr>
                </thead>
                <tbody> <?php while (
                    $row1 = mysqli_fetch_assoc($result1)
                ) { ?> <tr>
                    <td> <?php echo $row1["user_id"]; ?> </td>
                    <td> <?php echo $row1["name"]; ?> </td>
                    <td> <?php echo $row1["email"]; ?> </td>
                    <td> <?php echo $row1["ordercount"]; ?> </td>
                    <td> <?php echo $row1["ordersum"]; ?> </td>
                  </tr> <?php } ?> </tbody>
              </table>
              <h1 class="card-title mb-0 " style="margin-top: 100px;">Average Order Value For Each User</h1>
              <table class="table table-striped table-bordered" id="userTable2">
                <thead>
                  <tr>
                    <th>U-Id</th>
                    <th>Name</th>
                    <th>totals</th>
                  </tr>
                </thead>
                <tbody> <?php while (
                    $row2 = mysqli_fetch_assoc($result2)
                ) { ?> <tr>
                    <td> <?php echo $row2["user_id"]; ?> </td>
                    <td> <?php echo $row2["name"]; ?> </td>
                    <td> <?php echo $row2["totals"]; ?> </td>
                  </tr> <?php } ?> </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
        //function for the jquery datatable 
      $(document).ready(function() {
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