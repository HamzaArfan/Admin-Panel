<!DOCTYPE html>
<html lang="en">
<body>
<?php include 'header.html';?>
<?php include 'php_backend/update_backend.php';?>
<script src="ajaxcalls_backend/update_submit_ajax.js"></script>
<?php include 'nav.html';?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update User</h4> <form class="forms-sample" id="updateformsubmit">
                    <div class="form-group">
                      <label for="userId">User ID</label>
                      <input type="text" class="form-control" name="userId" id="userId" value="<?php echo $user['user_id']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="userName">Name</label>
                      <input type="text" class="form-control" name="userName" id="userName" value="<?php echo $user['name']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="userEmail">Email</label>
                      <input type="email" class="form-control" name="userEmail" id="userEmail" value="<?php echo $user['email']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="userPassword">Password</label>
                      <input type="password" class="form-control" name="userPassword" id="userPassword" value="<?php echo $user['password']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="userPhone">Phone</label>
                      <input type="text" class="form-control" name="userPhone" id="userPhone" value="<?php echo $user['phone']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="userAddress">Address</label>
                      <input type="text" class="form-control" name="userAddress" id="userAddress" value="<?php echo $user['address']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="userCity">City</label>
                      <input type="text" class="form-control" name="userCity" id="userCity" value="<?php echo $user['city']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="userState">State</label>
                      <input type="text" class="form-control" name="userState" id="userState" value="<?php echo $user['state']; ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="userZip">Zip</label>
                      <input type="text" class="form-control" name="userZip" id="userZip" value="<?php echo $user['zip']; ?>" required>
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