<?php 
  include 'frontend/header.php';

  if (!isset($_SESSION['loginuser'])) {

 ?>  
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block">
            <img src="images/register.png" class="img-fluid" style="width: 100%;height: 100%">
          </div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Register!</h1>
              </div>
              <form method="POST" action="add_user.php" enctype="multipart/form-data" class="user">
                <div class="form-group row">
                  <label>Profile</label>
                 <input type="file" name="profile" class="form-control-file">
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="user_name" class="form-control form-control-user" placeholder="Enter Your Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="phone" class="form-control form-control-user" placeholder="Enter Phone Number">
                  </div>
                </div>
                <div class="form-group">
                  <textarea type="text" name="address" class="form-control form-control-user" placeholder="Address"></textarea>
                </div>
               <button type="submit" class="btn btn-info btn-user btn-block">Register</button>

                <hr>
                
              </form>
              <div class="row">
                  <div class="col-md-6 my-3">
                    <a class="small" href="login.php">
                    <i class="fas fa-portrait"></i> &nbsp;Already Member?</a>
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
