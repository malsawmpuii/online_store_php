<?php 
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) { 

 include 'include/header.php';
 include 'dbconnect.php';

 $id=$_GET['category_id'];
 $sql="SELECT * FROM categories WHERE categories.id=:id";


 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':id',$id);
 $stmt->execute();
 $category=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category Detail</h1>
            <a href="category_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="far fa-backward"></i>Go Back</a>
          </div>

          <div class="card">
          	<div class="card-header">
          		<h5 class="card-title">Category Details</h5>
          	</div>
          	<div class="card-body">
          		<div class="row">
          			<div class="col-md-4">
          				<img src="<?=$category['photo']?>" class="img-fluid" >
          			</div>
          		 <div class="col-md-8">
          		  <h5>NAME:<span class="text-dark"><?=$category['name']?></span></h5>
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