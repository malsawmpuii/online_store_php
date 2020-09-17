 <?php 

    include 'frontend/header.php';
    include 'backend/dbconnect.php';

    if (!isset($_SESSION['loginuser'])) {

?>
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block">
            <img src="images/login1.jpg" class="img-fluid" style="width: 100%;height: 100%">
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Login</h1>
              </div>
              <form class="user" action="signIn.php" method="POST">
                <!-- <input type="hidden" name="photo"> -->
                <input type="hidden" name="role">
                <!-- <input type="text" name="id"> -->
                <div class="form-group row">
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="icofont-user-alt-7"></i></span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Email" aria-label="User Name" aria-describedby="basic-addon1">
                </div>
                </div>
                 <div class="form-group row">
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="icofont-ui-lock"></i></span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                </div>
                </div>
                  <div class="form-group row">
                    <div class="col-md-6 ">
                      <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      Always remember me!
                    </label>
                  </div>
                    </div>
                    <div class="col-md-6">
                      <a href="" class="text-dark">Forgot password?</a>
                    </div>
                  </div>
               <input type="submit" name="" value="Login" class="btn btn-info btn-lg btn-block py-3">
                <hr>
                
              </form>
              <div class="row">
                <div class="col-md-6 my-3">
                  <a class="small" href="login.php">
                    <i class="fas fa-portrait"></i> &nbsp;Create Account</a>
                  </div>
                  <div class="col-md-6 my-3">
                    <a class="small" href="index.php">
                      <i class="fas fa-home"></i> &nbsp; Go To Home</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
<?php 
 include 'frontend/footer.php';
}else{
  header("location:index.php");
}
?>