<div style="display: flex; justify-content: center; align-items: center; min-height: 100vh; background-color: #a9ce94;">
  <div class="container login-box">
    <div class="row justify-content-center login-box-body">
      <div class="col-md-16">
        <div class="card">
          <div class="card-body login-box-body">
            <h2 class="text-center"><strong>INVENTORY POS</strong></h2>
            <h4 class="text-center"><strong>Enter your Credentials to Login</strong></h4>
            <form method="post" style="background-color: #ffffff; padding: 20px; border-radius: 5px;">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="loginUser" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="loginPass" required>
              </div>
              <div class="form-check form-group">
                  <input type="checkbox" class="form-check-input">
                  <label class="form-check-label">Remember me</label>
            </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
              </div>
              <?php
                $login = new ControllerUsers();
                $login->ctrUserLogin();
              ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
