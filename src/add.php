<!DOCTYPE html>
<html lang="en">
<?php include 'header.html'; ?>
  <body>
      <?php include 'nav.html'; ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add User</h4>
                  <form class="forms-sample" action="add_user.php" method="POST">
                    <div class="form-group">
                      <label for="userName">Name</label>
                      <input type="text" class="form-control" name="userName" id="userName" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                      <label for="userEmail">Email</label>
                      <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                      <label for="userPassword">Password</label>
                      <input type="password" class="form-control" name="userPassword" id="userPassword" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <label for="userPhone">Phone</label>
                      <input type="text" class="form-control" name="userPhone" id="userPhone" placeholder="Phone" required>
                    </div>
                    <div class="form-group">
                      <label for="userAddress">Address</label>
                      <input type="text" class="form-control" name="userAddress" id="userAddress" placeholder="Address" required>
                    </div>
                    <div class="form-group">
                      <label for="userCity">City</label>
                      <input type="text" class="form-control" name="userCity" id="userCity" placeholder="City" required>
                    </div>
                    <div class="form-group">
                      <label for="userState">State</label>
                      <input type="text" class="form-control" name="userState" id="userState" placeholder="State" required>
                    </div>
                    <div class="form-group">
                      <label for="userZip">Zip</label>
                      <input type="text" class="form-control" name="userZip" id="userZip" placeholder="Zip" required>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button type="reset" class="btn btn-light">Reset</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>