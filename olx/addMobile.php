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
		exit('not getting userId');
	}
	$row = mysqli_fetch_assoc($result);
	$userId=$row['userId'];

	
	$itemType='mobile';
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

		
		//insert laptops
		$query="INSERT INTO mobiles(itemId,modelNum,yop) values($itemId,'$modelNum','$yop')";
		$result=mysqli_query($conn,$query);


		///insert images		
		if(getimagesize($_FILES['imga']['tmp_name'])!==FALSE){
 		$image=file_get_contents($_FILES['imga']['tmp_name']);
 		$image=base64_encode($image);

 		$query = "INSERT INTO  images(itemId,image) values($itemId,'$image')";
 				$result=mysqli_query($conn,$query);
 				if(!$result){
 					exit('image not uploaded');
 				}
 
		}
	
		if(getimagesize($_FILES['imgb']['tmp_name'])!==FALSE){
		$image=file_get_contents($_FILES['imgb']['tmp_name']);
 		$image=base64_encode($image);

 		$query = "INSERT INTO  images(itemId,image) values($itemId,'$image')";
 				$result=mysqli_query($conn,$query);
 				if(!$result){
 					exit('image not uploaded');
 				}

		}
	
		if(getimagesize($_FILES['imgc']['tmp_name'])!==FALSE){
		$image=file_get_contents($_FILES['imgc']['tmp_name']);
 		$image=base64_encode($image);

 		$query = "INSERT INTO images(itemId,image) values($itemId,'$image')";
 				$result=mysqli_query($conn,$query);
 				if(!$result){
 					exit('image not uploaded');
 				}

		}

		echo "<script>alert('Product successfully advertised !') </script>";
		echo "<script> location.href='index.php'</script>";
	

}


?>