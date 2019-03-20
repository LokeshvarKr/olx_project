
<?php

if(!isset($_POST['register'])){
	header("location : register.php");
}
else{

$fName=$_POST['firstName'];
$lName=$_POST['lastName'];
$type=$_POST['userType'];
$email=$_POST['email'];
$pass=$_POST['password'];
$mob=$_POST['mob'];


	$conn=mysqli_connect("localhost","root","lokesh","olx");
	if(!$conn){
		exit("database connection fails");
	}

	$query="SELECT * FROM users WHERE emailId='$email' AND password=$pass ";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_assoc($result);

	if($row){
		echo "<script> alert(Email-id  or Password already used by others !) </script>";
		echo "<script> location.href='register.php' </script> ";
		exit();
	}
	else{


		$query="INSERT INTO users(firstName,lastName,userType,emailId,password,phoneNumber) 
				values('$fName','$lName','$type','$email','$pass','$mob')";
		$result=mysqli_query($conn,$query);
		
		if(!$result){
			echo "<script> alert(Error while inserting data in database !) </script>";
			echo "<script> location.href='index.php' </script> ";			
		}
		else{

			header("location:login.php");
		}
	}

}

?>

