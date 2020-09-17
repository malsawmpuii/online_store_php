<?php 
include 'frontend/header.php';
include 'backend/dbconnect.php';

$sql="SELECT items.*,brands.name as brand_name,subcategories.name as 
       sub_name FROM items INNER JOIN brands ON items.brand_id=brands.id INNER JOIN subcategories ON items.subcategory_id=subcategories.id LIMIT 8";

 $stmt=$pdo->prepare($sql);
 $stmt->execute();
 $items=$stmt->fetchAll();     

?>
<div class="container-fluid">
	<img src="images/artheader.jpg" height="500" class="img-fluid my-5">
</div>

<!-- new arrival -->
<div id="arrival">
	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-7 text-center">
				<h1 class="text-uppercase">new arrival</h1>	
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
		<a href="products.php" class="btn btn-info btn-lg mb-5">View More</a>
	</div>	
</div>
<?php
include 'frontend/footer.php';
?>