<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <!--custom css -->
    <link rel="stylesheet" href="custom.css">
    <title>Login</title>
    <style type="text/css">
      body{
        background-image: url();
        color: purple;
      }
      form{
        background-color: ;
      }

    </style>
  </head>
  <body>


<?php

if(!isset($_POST['login'])){
	header("location : login.php");
}
else{
	$email=$_POST['email'];
	$pass=$_POST['pass'];

	$conn=mysqli_connect("localhost","root","lokesh","olx");
	if(!$conn){
		exit("database connection fails");
	}

	$query="SELECT * FROM users WHERE emailId='$email' AND password='$pass' ";
	$result=mysqli_query($conn,$query);
	$row=mysqli_fetch_assoc($result);

	if($row){
		session_start();
		$_SESSION["emailId"]=$email;
		$_SESSION["password"]=$pass;
		header("location: index.php");
	}

	else{

	?>

	<div class="container">
     <!-- blank row  -->
      <div class="row" style="height: 50px;">

        
      </div>
      <!-- end blank row -->
      <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-5">  
         	<p>Email or password is invalid</p>
         	<a href="login.php">login again</a>
        </div>
        <div class="col-md-3">  
        </div>
      </div>
	


	<?php

	}

}

?>



</body>
</html>
