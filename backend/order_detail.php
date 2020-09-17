<?php 
//session_start();
include 'include/header.php';
include 'dbconnect.php';

$voucherno=$_GET['voucherno'];

$sql= "SELECT orders.*,orders.created_at as orderdate ,orderdetails.*,items.*,users.name as cname,users.phone as cphone FROM orderdetails 
  INNER JOIN orders ON orders.voucherno=orderdetails.voucherno
  INNER JOIN items ON orderdetails.item_id=items.id
  INNER JOIN users ON orders.user_id=users.id WHERE orderdetails.voucherno=:voucherno";
$stmt=$pdo->prepare($sql);
$stmt->bindParam('voucherno',$voucherno);
$stmt->execute();
$data=$stmt->fetch(PDO::FETCH_ASSOC);

//var_dump($orderdetails); die();

$sql1 = "SELECT orderdetails.*, items.* FROM orderdetails INNER JOIN items ON orderdetails.item_id = items.id WHERE orderdetails.voucherno=:voucherno";
$stmt = $pdo->prepare($sql1);
$stmt->bindParam(':voucherno', $voucherno);
$stmt->execute();
$order_details = $stmt->fetchAll();

//var_dump($order_details);
$t=time();
//echo($t . "<br>");
//echo(date("Y-m-d",$t));

?>
<div class="container-fluid">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
		<a href="order_list.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-backward"></i></i>Go Back</a>
	</div>
	<div class="card text-center">
		<div class="card-header">
			<h3 class="text-lg-center text-uppercase text-dark">Fairy Princess Online Store</h3>
			<h4 class="text-dark">Tel: 0912345678</h4>
			<hr>
			<div class="row">
				<div class="col-md-6">
					<h5>Customer Name 	:<?=$data['cname']?></h5>
					<h5>Voucher 		:<?=$data['voucherno']?></h5>
					<h5>Customer Phone 	:<?=$data['cphone']?></h5>
				</div>
				<div class="col-md-6">
					<h5>Date 			:<?echo(date("Y-m-d",$t))?></h5>
					<h5>Order Time 		:<?=$data['orderdate']?></h5>
					<h5>Print Time 		:<?echo (date("H:i:s",$t))?></h5>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" cellpadding="10" cellspacing="10" width="100%">
				<thead>
					<th>Item Name</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Amount</th>
				</thead>
				<tbody>
					<?php
					foreach ($order_details as $order_detail) {
					?>

					<tr>
						<td><?=$order_detail['name']?></td>
						<td><?=$order_detail['price']?></td>
						<td><?=$order_detail['qty']?></td>
						<td><?=$order_detail['qty']* $order_detail['price']?></td>
					</tr>
				<?php }?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3">Total Amount:</td>
						<td><?=$data['total']?></td>
					</tr>
				</tfoot>
			</table>
			</div>
		</div>
	</div>
</div>


<?php 
include 'include/footer.php';
?>