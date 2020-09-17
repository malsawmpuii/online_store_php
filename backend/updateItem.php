<?php

include 'dbconnect.php';
	
	$id=$_POST['id'];
	$name=$_POST['item_name'];
 	$price=$_POST['item_price'];
 	$discount=$_POST['item_discount'];
 	$brand=$_POST['item_brand'];
 	$subcategory=$_POST['item_sub'];
 	$description=$_POST['item_description'];
 	$photo=$_FILES['item_logo'];
 	$oldphoto=$_POST['old_photo'];
 	$codeno=$_POST['codeno'];

/*echo "$id and $name and $price and $discount and $brand and $subcategory and $description and $oldphoto $codeno<br>";
print_r($photo);*/
	
	if ($photo['size']>0) {
		
		$basepath="images/items/";
		$fullpath=$basepath.$photo['name'];
		move_uploaded_file($photo['tmp_name'], $fullpath);
	}else{
		$fullpath=$oldphoto;
	}
	$sql="UPDATE items SET codeno=:codeno, name=:name, photo=:photo, price=:price, discount=:discount, description=:description, brand_id=:brand, subcategory_id=:sub WHERE id=:id";


	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":id",$id);
	$stmt->bindParam(":codeno",$codeno);
	$stmt->bindParam(":name",$name);
	$stmt->bindParam(":photo",$fullpath);
	$stmt->bindParam(":price",$price);
	$stmt->bindParam(":discount",$codeno);
	$stmt->bindParam(":description",$description);
	$stmt->bindParam(":brand",$brand);
	$stmt->bindParam(":sub",$subcategory);
	$stmt->execute();

	header("location:item_list.php");


?>