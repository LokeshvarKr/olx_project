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
    <title>Registration</title>
    <style type="text/css">
      body{
        color: brown;
      }
     
    </style>
  </head>
  <body>

    <?php

    if(isset($_SESSION['emailId'])){
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
                <a href="myAccount.php" class="btn btn-primary">My Account</a>
                <a href="logout.php" class="btn btn-success">logout</a>
                <a href="advertisement.php" class="btn btn-warning">Addvertise here</a>
              </div>  
              </div>
      
            </div>

        </div>
        <!-- end header row --> 

        <?php
    }
    else{
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
                <a href="login.php" class="btn btn-primary">My Account</a>
                <a href="login.php" class="btn btn-danger">login</a>
                <a href="login.php" class="btn btn-warning">Addvertise here</a>
              </div>  
              </div>
      
            </div>

        </div>
    <!-- end header row --> 


      <?php
      }
      ?>

    <div class="container">
      <!-- blank row  -->
      <div class="row" style="height: 25px;">

        
      </div>
      <!-- end blank row -->

      <!-- row 1 --->

      <div class="row">
        
        <div class="col-md-3">
           
        </div>

        <div class="col-md-3">
           
        </div>

        <div class="col-md-3">
            
        </div>

        <div class="col-md-3">
           
        </div>
      
      </div>
      <!--- row 1 end -->

      <!-- blank row  -->
      <div class="row" style="height: 60px;">

        
      </div>

      <!-- footer row  -->

     

    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
