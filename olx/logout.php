<?php
	session_start();
	if(isset($_SESSION['emailId'])){
	session_destroy();
	echo "<script> alert('logout successful!') </script>";
	}

	echo "<script> location.href='index.php' </script> ";
	
?>
