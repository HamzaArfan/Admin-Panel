<!DOCTYPE html>
<?php include 'header.html'; ?>
  <body>
  <?php include 'nav.html'; ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update User</h4> <?php
                  include "dbcon.php";
                  if (isset($_GET["id"])) {
                      $user_id = $_GET["id"];
                      $result = mysqli_query(
                          $conn,
                          "SELECT * FROM `USERS` WHERE `user_id` = $user_id"
                      );
                      $user = mysqli_fetch_assoc($result);
                  }
                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                      $name = $_POST["userName"];
                      $email = $_POST["userEmail"];
                      $password = $_POST["userPassword"];
                      $phone = $_POST["userPhone"];
                      $address = $_POST["userAddress"];
                      $city = $_POST["userCity"];
                      $state = $_POST["userState"];
                      $zip = $_POST["userZip"];
                      if (
                          mysqli_query(
                              $conn,
                              "UPDATE `USERS` SET `name`='$name', `email`='$email', `password`='$password', 
                                                   `phone`='$phone', `address`='$address', `city`='$city', `state`='$state', `zip`='$zip' 
                                                   WHERE `user_id`=$user_id"
                          )
                      ) {
                          header("Location: users.php");
                          exit();
                      } else {
                          echo "Error updating record: " . mysqli_error($conn);
                      }
                  }
                  ?> <form class="forms-sample" action="" method="POST">
                    <div class="form-group">
                      <label for="userId">User ID</label>
                      <input type="text" class="form-control" name="userId" id="userId" value="<?php echo $user[
                          "user_id"
                      ]; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="userName">Name</label>
                      <input type="text" class="form-control" name="userName" id="userName" value="<?php echo $user[
                          "name"
                      ]; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="userEmail">Email</label>
                      <input type="email" class="form-control" name="userEmail" id="userEmail" value="<?php echo $user[
                          "email"
                      ]; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="userPassword">Password</label>
                      <input type="password" class="form-control" name="userPassword" id="userPassword" value="<?php echo $user[
                          "password"
                      ]; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="userPhone">Phone</label>
                      <input type="text" class="form-control" name="userPhone" id="userPhone" value="<?php echo $user[
                          "phone"
                      ]; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="userAddress">Address</label>
                      <input type="text" class="form-control" name="userAddress" id="userAddress" value="<?php echo $user[
                          "address"
                      ]; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="userCity">City</label>
                      <input type="text" class="form-control" name="userCity" id="userCity" value="<?php echo $user[
                          "city"
                      ]; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="userState">State</label>
                      <input type="text" class="form-control" name="userState" id="userState" value="<?php echo $user[
                          "state"
                      ]; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="userZip">Zip</label>
                      <input type="text" class="form-control" name="userZip" id="userZip" value="<?php echo $user[
                          "zip"
                      ]; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Update User</button>
                    <button type="reset" class="btn btn-light">Reset</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>