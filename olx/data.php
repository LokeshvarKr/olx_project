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
    <title>olx</title>
    <style type="text/css">
      body{
        color: brown;
        font-size: 15px;
      }

     
    </style>
  </head>
  <body>

<?php


session_start();

$itemType="";
if($_GET['id']==1){
      $itemType='mobile';
  }
  if($_GET['id']==3){
      $itemType='book';
  }
  if($_GET['id']==2){
      $itemType='laptop';
  }

if(!isset($_SESSION['emailId'])){
?>
<div class="container">
            <!-- header row -->
            <div class="row" style="padding-top: 20px;">
        
              <div class="col-md-3">
                <a href=""  ><img class="img-responsive rounded mx-auto d-block" src="logo/olxlogo.jpg"></a>
              </div>

              <div class="col-md-6">  
                <p class="font-weight-bold" style="color: orange;font-size: 60px;text-align: center;">nitc olx</p>
              </div>
        
              <div class="col-md-3">  
              <div class="list-group">
                <a href="index.php" class="btn btn-success">Home</a>
                <a href="login.php" class="btn btn-danger">login</a>
                <a href="login.php" class="btn btn-warning">Addvertise here</a>
              </div>  
              </div>
      
            </div>
</div>


<?php
}
?>

<?php
if(isset($_SESSION['emailId'])){

  $email=$_SESSION['emailId'];
  $pass=$_SESSION['password'];
?>  
  <div class="container">
            <!-- header row -->
            <div class="row" style="padding-top: 20px;">
        
              <div class="col-md-3">
                <a href=""  ><img class="img-responsive rounded mx-auto d-block" src="logo/olxlogo.jpg"></a>
              </div>

              <div class="col-md-6">  
              </div>
        
              <div class="col-md-3">  
              <div class="list-group">
                <a href="index.php" class="btn btn-primary">Home</a>
                <a href="logout.php" class="btn btn-warning">logout</a>
                <a href="advertisement.php" class="btn btn-success">Addvertise here</a>
              </div>  
              </div>
      
            </div>

          <!-- end header row --> 
</div>

<?php
}
?>

<?php
  
  $conn=mysqli_connect('localhost','root','lokesh','olx');
  if(!$conn){
    exit('database connection fails');
  }

  
?>


    <div class="container">
      <!-- blank row  -->
      <div class="row" style="height: 25px;">

        
      </div>
      <!-- end blank row -->

      
      <?php 
      

      $query="SELECT * FROM advertisement WHERE itemType='$itemType' ";
      $result=mysqli_query($conn,$query);
      if(!$result){
        echo "string";
      }
      while($row = mysqli_fetch_assoc($result)){
          $itemId=$row['advtId'];
          $itemName=$row['itemName'];
          $price=$row['price'];
          $itemStatus=$row['itemStatus'];
          $userId=$row['userId'];

          //user details
          
          $q="SELECT emailId , phoneNumber FROM users WHERE userId=$userId ";
          $r=mysqli_query($conn,$q);
          $data=mysqli_fetch_assoc($r);
          $phoneNumber=$data['phoneNumber'];
          $emailId=$data['emailId'];
      
        if($itemType=='mobile'){

            $sql="SELECT * FROM mobiles WHERE itemId=$itemId ";
            $res=mysqli_query($conn,$sql);
            $temp = mysqli_fetch_assoc($res);

            $GLOBALS['yop'] = $temp['yop'];

            $sqli="SELECT manufacturer FROM manufacturers WHERE modelNum='$itemName' ";
            $resi=mysqli_query($conn,$sqli);
            $tempi = mysqli_fetch_assoc($resi);
            $GLOBALS['manufacturer']=$tempi['manufacturer'];

          }
        

           if($itemType=='laptop'){

            $sql="SELECT * FROM laptops WHERE itemId=$itemId ";
            $res=mysqli_query($conn,$sql);
            $temp = mysqli_fetch_assoc($res);
            
            $GLOBALS['modelNum']=$temp['modelNum'];
            $GLOBALS['yop']=$temp['yop'];
            $GLOBALS['batteryStatus']=$temp['batteryStatus'];

            $sql1="SELECT * FROM manufacturers WHERE modelNum='$itemName' ";
            $res1=mysqli_query($conn,$sql1);
            $temp1 = mysqli_fetch_assoc($res1);

            $GLOBALS['manufacturer']=$temp1['manufacturer'];

          }

          if($itemType=='book'){

            $sql="SELECT bookCondition FROM books WHERE itemId=$itemId ";
            $res=mysqli_query($conn,$sql);
            $temp = mysqli_fetch_assoc($res);
            
            
            $GLOBALS['bookCondition']=$temp['bookCondition'];

            
          }

          
      ?>
      <!-- blank row -->
     <div class="row" style="height: 25px;">

        
      </div>
      <!-- end blank row -->
      <div class="row">
         <?php
            $q = "SELECT image FROM images where itemId='$itemId' ";
            $r=mysqli_query($conn,$q);

            while($data =mysqli_fetch_assoc($r)){
              ?>
                  <div class="col-md-2">
                    <div class="card" style="">

                    <?php
                      echo '<img src="data:image;base64,'.$data['image'].' " >';
                      ?>
                    </div>  
                  </div>

        <?php
        }
        ?>
        <div class="col-md-3" style=" font-size:12px;" >
          <table class=" table-sm" >
            <tr>
              <td style=" font-size:15px; color: purple;" ><?php echo $itemName; ?></td>
            </tr>
            <tr>
              <td style="color: purple;">Status:</td>
              <td style="color: black;"><?php echo $itemStatus; ?></td>
            </tr>
            <tr>
              <td style="color: black;">Price:</td>
              <td style="color: black;"><?php echo $price; ?></td>
            </tr>
            <?php 
            if($itemType=='mobile'){
              ?>
              <tr>
                <td>Manufacturer:</td>
                <td style="color: black;"><?php echo $GLOBALS['manufacturer']; ?></td>
              </tr>
              <tr>
                <td>Year of Purchase:</td>
                <td style="color: black;"><?php echo $GLOBALS['yop']; ?></td>
            </tr>
            <?php
            }
            ?>

            <?php 
            if($itemType=='laptop'){
              ?>
              <tr>
                <td>Manufacturer:</td>
                <td style="color: black;"><?php echo $GLOBALS['manufacturer']; ?></td>
              </tr>
              <tr>
                <td>Year of Purchase:</td>
                <td style="color: black;"><?php echo $GLOBALS['yop']; ?></td>
            </tr>
             <tr>
                <td>Battery Status:</td>
                <td style="color: black;"><?php echo $GLOBALS['batteryStatus']; ?></td>
            </tr>
            <?php
            }
            ?>


            <?php
            if($itemType=='book'){

              $sql1="SELECT authorName FROM authors WHERE itemId=$itemId ";
              $auth=mysqli_query($conn,$sql1);
              
              ?>
              <tr>
                <td>Condition:</td>
                <td style="color: black;"><?php echo $GLOBALS['bookCondition']; ?></td>
              </tr>
        
              <tr>
                <td>Authors:</td>
                <td style="color: black;">
                  <?php
                  while($a=mysqli_fetch_assoc($auth)){
                  ?>
                    <?php echo $a['authorName']; echo "<br/>"; ?>
                  
                  <?php
                  }
                  ?>
                </td>
              </tr>
            <?php
            }
            ?>
          </table> 
          </div>
            <!-- honour details --->
            <div class="col-md-3" style="font-size: 12px;" >
              <table>
                <tr>
                  <td style="" >Owner:</td>
                </tr>
                <tr>
                  <td>phone</td>
                  <td style="color: black;" ><?php echo $phoneNumber ?></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td style="color: black;" ><?php echo $emailId ?></td>
              </tr>

              </table>
            </div>
       
      </div>
      <?php
      //end while
      }


      ?>

     
      <!-- end product area -->

    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
