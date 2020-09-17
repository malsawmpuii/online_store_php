<?php 

 include 'backend/dbconnect.php';

 $name=$_POST['user_name'];
 $profile=$_FILES['profile'];
 $email=$_POST['email'];
 $password=$_POST['password'];
 $phone=$_POST['phone'];
 $address=$_POST['address'];
/* $status=$_POST['status'];
*/ $role_id=1;

 $basepath="backend/images/profile/";
 $fullpath=$basepath.$profile['name'];
 move_uploaded_file($profile['tmp_name'],$fullpath);

 $sql="INSERT INTO users(name,profile,email,password,phone,address,role_id) VALUES 
 		(:name,:profile,:email,:password,:phone,:address,:role_id)";
 $stmt=$pdo->prepare($sql);
 $stmt->bindParam(':name',$name);
 $stmt->bindParam(':profile',$fullpath);
 $stmt->bindParam(':email',$email);
 $stmt->bindParam(':password',$password);
 $stmt->bindParam(':phone',$phone);
 $stmt->bindParam(':address',$address);
/* $stmt->bindParam(':status',$status);
*/ 
$stmt->bindParam(':role_id',$role_id);
$stmt->execute();
/*echo "$id and $name and $email and $profile and $password and $phone and $address and $role_id<br>";
print_r($photo);*/

/* if ($stmt->rowCount()) {
 	header("location:register.php");
 }else{
 	echo "Error";
 }*/
?>