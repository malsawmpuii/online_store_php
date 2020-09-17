<?php 

 include 'dbconnect.php';

 $name=$_POST['item_name'];
 $price=$_POST['item_price'];
 $discount=$_POST['item_discount'];
 $brand=$_POST['item_brand'];
 $subcategory=$_POST['item_sub'];
 $description=$_POST['item_description'];
 $photo=$_FILES['item_logo'];
 $codeno="CODE".mt_rand(100000,999999);

 $basepath="images/items/";
 $fullpath=$basepath.$photo['name'];
 move_uploaded_file($photo['tmp_name'],$fullpath);

 $sql="INSERT INTO items(codeno,name,photo,price,discount,description,brand_id,subcategory_id) VALUES (:item_codeno,:item_name,:item_photo,
 :item_price,:item_discount,:item_des,:item_brand,:item_sub)";
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':item_codeno',$codeno);
 $stmt->bindParam(':item_name',$name);
 $stmt->bindParam(':item_photo',$fullpath);
 $stmt->bindParam(':item_price',$price);
 $stmt->bindParam(':item_discount',$discount);
 $stmt->bindParam(':item_des',$description);
 $stmt->bindParam(':item_brand',$brand);
 $stmt->bindParam(':item_sub',$subcategory);

 $stmt->execute();

 if ($stmt->rowCount()) {
 	header("location:item_list.php");
 }else{
 	echo "Error";
 }
?>