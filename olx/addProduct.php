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

	$row = mysql_fetch_assoc($result);
	$userId=$row['userId'];

	
	//itemType
	if($_REQUEST['id']='b'){
	$itemType='book';
	$bookCondition=$_POST['bookCondition'];

	}
	else{

		$manufacturer=$_POST['manuf'];
		$modelNum=$_POST['modelNum'];
		$price=$_POST['price'];
		
		if(isset($_POST['img1'])){
		$img1=$_POST['img1'];
		}
		if(isset($_POST['img2'])){
		$img2=$_POST['img2'];
		}
		if(isset($_POST['img3'])){
		$img3=$_POST['img3'];
		}
		
		if($_REQUEST['id']='m'){
		$itemType='mobile';
		}
		
		if($_REQUEST['id']='l'){
		$itemType='laptop';
		$batteryStatus=$_POST['batteryStatus'];
		}
		
		if($_REQUEST['id']='by'){
		$itemType='bycycle';
		}

	
		//check manufacturer

		$query="SELECT manufacturer FROM manufacturers WHERE  modelNum='$modelNum' ";

		$result=mysqli_query($conn,$query);

		$man= mysql_fetch_assoc($result);
		if(!$man){
		$query="INSERT INTO manufacturer(modelNum,manufacturer) values('$modelNum','$manufacturer')";
		$result=mysqli_query($conn,$query);
		}


		//insert images

		if($img1){
		$query="INSERT INTO images(modelNum,img) values('$modelNum','$img1')";
		$result=mysqli_query($conn,$query);
		}
	
		if($img2){
		$query="INSERT INTO images(modelNum,img) values('$modelNum','$img2')";
		$result=mysqli_query($conn,$query);
		}
	
		if($img3){
		$query="INSERT INTO images(modelNum,img) values('$modelNum','$img3')";
		$result=mysqli_query($conn,$query);
		}

	

		//insert in advert
		$query="INSERT INTO advertisement(userId,itemType,itemName,doi,price,itemStatus) values('$id','$itemType','$modelNum',CURDATE(),'$price','live')";

		$result=mysqli_query($conn,$query);

		//now update paticular product table
		$query="SELECT itemId FROM advertisement WHERE itemName='$modelNum' ";
		$result=mysqli_query($conn,$query);
		$itemId= mysql_fetch_assoc($result);


		if($itemType=='mobile'){
		$query="INSERT INTO mobiles(itemId,modelNum,yop) values('$itemId','$modelNum','$yop')";
		$result=mysqli_query($conn,$query);

		}

		if($itemType=='laptop'){
		$query="INSERT INTO laptops(itemId,modelNum,yop,batteryStatus) values('$itemId','$modelNum','$yop','$batteryStatus')";
		$result=mysqli_query($conn,$query);

		}

		if($itemType=='bycycle'){		
		$query="INSERT INTO bycycle(itemId,modelNum,yop) values('$itemId','$modelNum','$yop')";
		$result=mysqli_query($conn,$query);
		}


}







	if($result){
		echo "<script>alert('Product successfully advertised !') </script>";
		echo "<script> location.href='index.php'</script>";
	}
	else{

		echo "<script>alert('Error proceed again!') </script>";
		echo "<script> location.href='index.php'</script>";
	}



}

?>