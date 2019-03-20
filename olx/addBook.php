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

	
	$itemType='book';
	$bookCondition=$_POST['bookCondition'];
	$bookName=$_POST['bookName'];
	$price=$_POST['price'];
		
	
		//insert in advert
		$query="INSERT INTO advertisement(userId,itemType,itemName,doi,price,itemStatus) 
		values($userId,'$itemType','$bookName',CURDATE(),$price,'live')";

		$result=mysqli_query($conn,$query);
		if(!$result){
			exit('not inserted in advertisement');
		}

		//now update paticular product table
		$itemId=mysqli_insert_id($conn);
		
	

		
		//insert authors;
		//$author1=$author2=$author3=$author4="";

		if($_POST['author1']!=""){
		$author1=$_POST['author1'];
		$query="INSERT INTO authors(itemId,authorName) values($itemId,'$author1')";
		$result=mysqli_query($conn,$query);
		if(!$result){
			exit('not inserted in author');
		}

		}
		if($_POST['author2']!=""){
		$author2=$_POST['author2'];
		$query="INSERT INTO authors(itemId,authorName) values($itemId,'$author2')";
		$result=mysqli_query($conn,$query);
		}
		if($_POST['author3']!=""){
		$author3=$_POST['author3'];
		$query="INSERT INTO authors(itemId,authorName) values($itemId,'$author3')";
		$result=mysqli_query($conn,$query);
		}

		if($_POST['author4']!=""){
		$author4=$_POST['author4'];
		$query="INSERT INTO authors(itemId,authorName) values('$itemId','$author4')";
		$result=mysqli_query($conn,$query);
		}
		

		$query="INSERT INTO books(itemId,title,bookCondition) 
		values($itemId,'$bookName','$bookCondition');";
		$result=mysqli_query($conn,$query);

		//insert images		
		if(getimagesize($_FILES['img1']['tmp_name'])!==FALSE){

 		$image=file_get_contents($_FILES['img1']['tmp_name']);
 		$image=base64_encode($image);

 		$query = "INSERT INTO  images(itemId,image) values($itemId,'$image')";
 				$result=mysqli_query($conn,$query);
 				if(!$result){
 					exit('image not uploaded');
 				}
 
		}
	
		if(getimagesize($_FILES['img2']['tmp_name'])!==FALSE){
		$image=file_get_contents($_FILES['img2']['tmp_name']);
 		$image=base64_encode($image);

 		$query = "INSERT INTO  images(itemId,image) values($itemId,'$image')";
 				$result=mysqli_query($conn,$query);
 				if(!$result){
 					exit('image not uploaded');
 				}

		}
	
		if(getimagesize($_FILES['img3']['tmp_name'])!==FALSE){
		$image=file_get_contents($_FILES['img3']['tmp_name']);
 		$image=base64_encode($image);

 		$query = "INSERT INTO  images(itemId,image) values($itemId,'$image')";
 				$result=mysqli_query($conn,$query);
 				if(!$result){
 					exit('image not uploaded');
 				}

		}



		echo "<script>alert('Product successfully advertised !') </script>";
		echo "<script> location.href='index.php'</script>";

}


?>