<?php
if (isset($_SESSION['loginuser'])&& $_SESSION['loginuser']['role_id']==2) { 
 
 include 'include/header.php';
 include 'dbconnect.php';
?>
	<div class="container-fluid">
	<!-- Page Heading -->
	  <div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Item List</h1>
		<a href="brand_create.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus"></i></i>Add Brand</a>
	  </div>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
		 <h6 class="m-0 font-weight-bold text-primary">Brand List</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<!-- <tfoot>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Codeno</th>
							<th>Price</th>
							<th>Discount</th>
							<th>Action</th>
						</tr>
					</tfoot> -->
					<tbody>
						<?php 

						$sql="SELECT * FROM brands";
						$stmt=$pdo->prepare($sql);
						$stmt->execute();
						$brands=$stmt->fetchAll();
						$num=1;
						foreach ($brands as $brand) {

							?>
							<tr>
								<td><?= $num ?></td>
								<td><?= $brand['name'] ?></td>
								<td><a href="brand_detail.php?brand_id=<?=$brand['id']?>" class="btn btn-primary btn-sm">Detail</a>
									<a href="brand_edit.php?id=<?=$brand['id']?>" class="btn btn-warning btn-sm">Edit</a>
									<a href="brand_delete.php?id=<?=$brand['id'] ?>" onclick="return confirm('Are you Sure?')" class="btn btn-danger btn-sm">Delete</a></td>
								</tr>
								<?php 
								$num++;
							}
							?>
						</tbody>
					</table>
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