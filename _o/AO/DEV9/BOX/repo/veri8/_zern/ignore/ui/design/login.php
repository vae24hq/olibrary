<?php include oBIT.'head.php';?>
<body class="bg-gradient-primary">
<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Sign In!</h1>
									<?php echo oHelper::notify($oRecord);?>

                </div>
                <form id="oForm" class="user" name="oForm" action="" method="POST">
                  <div class="form-group">
                    <input id="userid" class="form-control o-input-line" aria-describedby="emailHelp" type="text" name="userid" placeholder="email@address.com" value="<?php echo oInput::retain('userid');?>" tabindex="1" autofocus>
                  </div>
                  <div class="form-group">
                    <input id="exampleInputPassword" class="form-control o-input-line" type="password" name="password" placeholder="Password" tabindex="2">
                  </div>
                  <!-- <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input id="customCheck" class="custom-control-input" type="checkbox" name="remember" tabindex="3">
                      <label class="custom-control-label" for="remember">Remember Me</label>
                    </div>
                  </div> -->
									<button id="submitBTN" class="btn btn-primary btn-block o-bottom-button" type="submit" name="submitBTN" tabindex="4">Login</button>
                  <!-- <hr>
                  <a href="index.html" class="btn btn-google btn-user btn-block"> <i class="fab fa-google fa-fw"></i> Login with Google </a> <a href="index.html" class="btn btn-facebook btn-user btn-block"> <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook </a> -->
                </form>
                <!-- <hr> -->
                <!-- <div class="text-center"> <a class="small" href="forgot-password.html">Forgot Password?</a> </div> -->
                <!-- <div class="text-center"> <a class="small" href="register.html">Create an Account!</a> </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include oBIT.'js.php';?>
