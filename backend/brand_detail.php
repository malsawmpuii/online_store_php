<?php 
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) { 

 include 'include/header.php';
 include 'dbconnect.php';

 $id=$_GET['brand_id'];
 $sql="SELECT * FROM brands WHERE brands.id=:id";


 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':id',$id);
 $stmt->execute();
 $brand=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Brand Detail</h1>
            <a href="brand_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="far fa-backward"></i>Go Back</a>
          </div>

          <div class="card">
          	<div class="card-header">
          		<h5 class="card-title">Brand Details</h5>
          	</div>
          	<div class="card-body">
          		<div class="row">
          			<div class="col-md-4">
          				<img src="<?=$brand['logo']?>" class="img-fluid" >
          			</div>
          		 <div class="col-md-8">
          		  <h5>NAME:<span class="text-dark"><?=$brand['name']?></span></h5>
          		</div>
          	</div>
          		
          	</div>
          	
          </div>
         </div>

<?php 
 include 'include/footer.php';
 }else{
  header("location:../index.php");
}
?>