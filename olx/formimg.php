<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
id<input type="text" name="itemId">
image<input type="file" name="fname" />
<input type="submit" name="submit" value="upload">
</form>
<?php
 if(isset($_POST['submit'])){
 	if(getimagesize($_FILES['fname']['tmp_name'])==FLASE){
 		echo "please select new one";
 	}
 	
 	else{
 			

 		function saveimage($image,$itemId){

 			$conn=mysqli_connect('localhost','root','lokesh','olx');
 			if(!$conn){
 				echo "conn fails <br/>";
 			}
 			
 			$query = "INSERT INTO  images(itemId,image) values($itemId,'$image')";
 			$result=mysqli_query($conn,$query);
 			if($result){
 			echo "<br/>uploaded";
 			}
 			else {
 			 echo "<br/>not uploaded";
 			}
 		}

 		$itemId=$_POST['itemId'];
 		$image=file_get_contents($_FILES['fname']['tmp_name']);
 		$image=base64_encode($image);
 
 		saveimage($image,$itemId);

 		function displayimage(){
 			
 			$conn=mysqli_connect('localhost','root','lokesh','olx');
 			if(!$conn){
 				echo "conn fails <br/>";
 			}

 			$query = "SELECT * FROM images ";
 			$result=mysqli_query($conn,$query);
 			if($result){
 			echo "yse!!!";
 			}
 			else {
 			 echo "<br/>no?????";
 			}

 			while($row =mysqli_fetch_assoc($result)){
 				echo '<img height="300" width="300" src="data:image;base64,'.$row['image'].' " >';
 			}
 		}
 		
 		displayimage();
 	

 }

}

?>
</body>
</html>
