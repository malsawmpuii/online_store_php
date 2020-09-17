<?php

include 'dbconnect.php';
	
	$id=$_POST['id'];
	$name=$_POST['brand_name'];
 	$photo=$_FILES['brand_logo'];
 	$oldphoto=$_POST['old_photo'];

/*echo "$id and $name and $oldphoto<br>";
print_r($photo);*/

if ($photo['size']>0) {
		
		$basepath="images/brands/";
		$fullpath=$basepath.$photo['name'];
		move_uploaded_file($photo['tmp_name'], $fullpath);
	}else{
		$fullpath=$oldphoto;
	}
	$sql="UPDATE brands SET name=:name, logo=:logo WHERE id=:id";


	$stmt=$pdo->prepare($sql);
	$stmt->bindParam(":id",$id);
	$stmt->bindParam(":name",$name);
	$stmt->bindParam(":logo",$fullpath);
	$stmt->execute();

	header("location:brand_list.php");

?>