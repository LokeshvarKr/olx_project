<?php

session_start();
if(!isset($_SESSION['emailId'])){
	header('location: index.php');
}
else{
	

	$email=$_SESSION['emailId'];
	$pass=$_SESSION['password'];


	$conn=mysqli_connect("localhost","root","lokesh","olx");

	if(!$conn){
		echo "dabase connectionn fails";
	}

	//select user id

	$query="SELECT userId FROM users WHERE emailId='$email' AND password='$pass' ";
	$result=mysqli_query($conn,$query);
	if(!$result){
		exit('not gettion userId');
	}
	$row = mysqli_fetch_assoc($result);
	$userId=$row['userId'];

	
	$itemType='laptop';
	$batteryStatus=$_POST['batteryStatus'];
	$modelNum=$_POST['modelNum'];
	$price=$_POST['price'];
	$manufacturer=$_POST['manu'];
	$yop=$_POST['yop'];
		

		//insert in advert
		$query="INSERT INTO advertisement(userId,itemType,itemName,doi,price,itemStatus) 
		values($userId,'$itemType','$modelNum',CURDATE(),$price,'live')";
		$result=mysqli_query($conn,$query);
		if(!$result){
			exit('not inserted in advertisement');
		}

		//now update paticular product table
		$itemId=mysqli_insert_id($conn);
		

		//add if necessary in manufacturer 
		$query="SELECT manufacturer FROM manufacturers WHERE modelNum='$modelNum' ";

		$result=mysqli_query($conn,$query);
		//$man= mysql_fetch_assoc($result);
		if(mysqli_num_rows($result) <= 0){
		$query="INSERT INTO manufacturers(modelNum,manufacturer) values('$modelNum','$manufacturer')";
		$result=mysqli_query($conn,$query);
			if(!$result){
				exit('not updated');
			}
		}


		//insert images		
		if(getimagesize($_FILES['imgp']['tmp_name'])!==FALSE){

 		$image=file_get_contents($_FILES['imgp']['tmp_name']);
 		$image=base64_encode($image);

 		$query = "INSERT INTO  images(itemId,image) values($itemId,'$image')";
 				$result=mysqli_query($conn,$query);
 				if(!$result){
 					exit('image not uploaded');
 				}
 
		}
	
		if(getimagesize($_FILES['imgq']['tmp_name'])!==FALSE){
		$image=file_get_contents($_FILES['imgq']['tmp_name']);
 		$image=base64_encode($image);

 		$query = "INSERT INTO  images(itemId,image) values($itemId,'$image')";
 				$result=mysqli_query($conn,$query);
 				if(!$result){
 					exit('image not uploaded');
 				}

		}
	
		if(getimagesize($_FILES['imgr']['tmp_name'])!==FALSE){
		$image=file_get_contents($_FILES['imgr']['tmp_name']);
 		$image=base64_encode($image);

 		$query = "INSERT INTO  images(itemId,image) values($itemId,'$image')";
 				$result=mysqli_query($conn,$query);
 				if(!$result){
 					exit('image not uploaded');
 				}

		}

		//insert laptops
		$query="INSERT INTO laptops(itemId,modelNum,yop,batteryStatus) values($itemId,'$modelNum','$yop','$batteryStatus')";
		$result=mysqli_query($conn,$query);

		if($result){
		//exit('hiiiiiiiiiiii done');
		echo "<script>alert('Product successfully advertised !') </script>";
		echo "<script> location.href='index.php'</script>";
		}

}


?>