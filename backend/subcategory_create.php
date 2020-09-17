<?php 
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) { 

include 'include/header.php';
include 'dbconnect.php';
?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800 text-center">
	Subcatergory Create</h1>
	<div class="row">
		<div class="offset-md-2 col-md-8">
			<form method="POST" action="add_subcategory.php" enctype="multipart/form-data">
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="subcategory_name" 
					class="form-control">	
				</div>
					<div class="form-group">
						<label>Category ID</label>
						<select name="category_id" class="form-control">
						
						<option>Choose Category...</option>

						<?php 
						$sql="SELECT * FROM subcategories";
						$stmt=$pdo->prepare($sql);
						$stmt->execute();
						$subcategories=$stmt->fetchAll();
						foreach ($subcategories as $subcategory) {
							?>	
							<option value="<?= $subcategory['category_name'] ?>"><?= $subcategory['name'] ?></option>	
							<?php 
								}
							?>
							</select>
						</div>
					<input type="submit" class="btn btn-outline-primary float-right mb-3" value="Save">
				</form>         		
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
<?php 
include 'include/footer.php';
}else{
  header("location:../index.php");
}
?>
