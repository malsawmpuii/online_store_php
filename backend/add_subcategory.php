<?php 

 include 'dbconnect.php';

 $name=$_POST['subcategory_name'];
 $category_name=$_POST['category_name'];


 $sql="INSERT INTO subcategories(name,category_id) VALUES (:subcategory_name,:category_name)";
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':subcategory_name',$name);
 $stmt->bindParam(':category_name',$category_name);
 $stmt->execute();

 if ($stmt->rowCount()) {
 	header("location:subcategory_list.php");
 }else{
 	echo "Error";
 }
?>