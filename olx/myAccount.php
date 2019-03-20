<?php
session_start();
if(!isset($_SESSION['emailId'])){
  header('location: index.php');
}
else{

  $email=$_SESSION['emailId'];
  $pass=$_SESSION['password'];

  $conn=mysqli_connect('localhost','root','lokesh','olx');
  if(!$conn){
    exit('database connection fails');
  }

  $query="SELECT * FROM users WHERE emailId='$email' AND password='$pass' ";
  $result=mysqli_query($conn,$query);
  $row=mysqli_fetch_assoc($result);

  $firstName=$row['firstName'];
  $lastName=$row['lastName'];
  $email=$row['emailId'];
  $userType=$row['userType'];
  $phoneNumber=$row['phoneNumber'];
  $userId=$row['userId'];
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
    <title>Registration</title>
    <style type="text/css">
      body{
        color: brown;
      }
     
    </style>
  </head>
  <body>

        <div class="container">
            <!-- header row -->
            <div class="row" style="padding-top: 20px;">
        
              <div class="col-md-3">
                <a href=""  ><img class="img-responsive rounded mx-auto d-block" src="logo/olxlogo.jpg"></a>
              </div>

              <div class="col-md-6">  
                <p class="font-weight-bold" style="color: green;font-size: 40px;text-align: center;"><?php echo "Hi ".$firstName; ?></p>
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

    <div class="container">
      <!-- blank row  -->
      <div class="row" style="height: 25px;">

        
      </div>
      <!-- end blank row -->

      <!-- user area -->
      <div class="row">
        
        <div class="col-md-6">
          <table class="table table-sm">
            <tr>
              <td scope="col" >Name</td>
              <td><?php echo $firstName." ".$lastName ; ?></td>
            </tr>
             <tr>
              <td scope="col" >User Type</td>
              <td><?php echo $userType; ?></td>
            </tr>
             <tr>
              <td scope="col" >Email-Id</td>
              <td><?php echo $email; ?></td>
            </tr>
             <tr>
              <td scope="col" >Phone Number</td>
              <td><?php echo $phoneNumber; ?></td>
            </tr>
          </table> 

        </div>
      </div>
          <!-- end user area---->
        

      <!-- blank row  -->
      <div class="row" style="height: 60px;">

        
      </div>

      <!-- product area-->

      <?php 
    
      $query="SELECT * FROM advertisement WHERE userId=$userId ";
      $result=mysqli_query($conn,$query);

      while($row = mysqli_fetch_assoc($result)){
          $itemId=$row['advtId'];
          $itemName=$row['itemName'];
          $price=$row['price'];
          $itemStatus=$row['itemStatus'];
          $itemType=$row['itemType'];

        
      
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

        <div class="col-md-2" >
          <table class=" table-sm">
            <tr>
              <th style="color: red;" ><?php echo $itemName; ?></th>
            </tr>
            <tr>
              <td style="color: red;"><?php echo $itemStatus; ?></td>
            </tr>
            <tr>
              <th style="color: purple;"><?php echo $price; ?></th>
            </tr>
            <?php 
            if($itemType=='mobile'){
              ?>
              <tr>
                <td>Manufacturer</td>
                <td style="color: black;"><?php echo $GLOBALS['manufacturer']; ?></td>
              </tr>
              <tr>
                <td>Year of Purchase</td>
                <td style="color: black;"><?php echo $GLOBALS['yop']; ?></td>
            </tr>
            <?php
            }
            ?>

            <?php 
            if($itemType=='laptop'){
              ?>
              <tr>
                <td>Manufacturer</td>
                <td style="color: black;"><?php echo $GLOBALS['manufacturer']; ?></td>
              </tr>
              <tr>
                <td>Year of Purchase</td>
                <td style="color: black;"><?php echo $GLOBALS['yop']; ?></td>
            </tr>
             <tr>
                <td>Battery Status</td>
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
                <td>Book Condition</td>
                <td style="color: black;"><?php echo $GLOBALS['bookCondition']; ?></td>
              </tr>
        
              <tr>
                <td>Authors </td>
                  <?php
                  while($a=mysqli_fetch_assoc($auth)){
                  ?>
                    <td style="color: black;" > <?php echo $a['authorName']; ?></td>
                  <?php
                  }
                  ?>
              </tr>
            <?php
            }
            ?>

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

<?php
//end session here
}
?>