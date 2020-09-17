<?php
include 'frontend/header.php';
include 'backend/dbconnect.php';

$id=$_GET['id'];
//echo "$id";die();

$sql="SELECT items.*,brands.name as brand_name,subcategories.name as 
       sub_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id WHERE items.subcategory_id=:id";

 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':id',$id);
 $stmt->execute();
 $items=$stmt->fetchAll();
?>
<div id="products">
	<div class="container-fluid">
		<div class="row justify-content-center mt-5">
			<div class="col-7 text-center">
				<h1 class="text-uppercase">PRODUCTS</h1>	
			</div>
		</div>
		<div class="row">
			<?php
				foreach ($items as $item) {
					?>
				<div class="col-xl-3 col-lg-3 col-md-3 my-5">
					<div class="card">
						<img class="card-img-top" src="images/products/b1.jpeg" alt="Card image cap">
						<div class="card-body">
							<p class="text-muted py-1 my-0"><b>CODENO:</b><?=$item['codeno']?></p>
							<p class="text-muted py-1 my-0"><b>Name:</b><?=$item['name']?></p>
							<p class="text-muted py-1 my-0"><b>Price:</b>
								<?php if ($item['discount']) {
									echo $item['discount'];

								  ?>
								  <del><?=$item['price']?></del>
								  <?php }else{
								  		echo $item['price'];
								  }
								    ?>
							</p>
							<a href="" class="btn btn-info btn-lg btn-block addtocart" data-id="<?=$item['id']?>" data-name="<?=$item['name']?>" data-photo="<?=$item['photo']?>" data-price="<?=$item['price']?>" data-discount="<?=$item['discount']?>"><i class="icofont-ui-cart"></i>&nbsp;Add to cart</a>
						</div>
					</div>
				</div>
			<?php
				}
			  ?>

		</div>
	</div>
</div>
<div class="container">
	<div class="row justify-content-center mt-3">
	<ul class="pagination">
		<li class="page-item">
			<a class="page-link" href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
				<span class="sr-only">Previous</span>
			</a>
		</li>
		<li class="page-item"><a class="page-link" href="#">1</a></li>
		<li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
		<li class="page-item"><a class="page-link" href="#">4</a></li>
		<li class="page-item">
			<a class="page-link" href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
				<span class="sr-only">Next</span>
			</a>
		</li>
	</ul>
</div>
</div>
<?php
include 'frontend/footer.php';
?>