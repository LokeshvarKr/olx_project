
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
        background-image: url();
        color: purple;
        background-color: ;
      }
  
    </style>
  </head>
  <body>


<?php

session_start();
if(!isset($_SESSION['emailId'])){
  header("index.php");
}
else{

?>

    <div class="wrapper container container-fluid">      
       <!-- blank row  -->
      <div class="row" style="height: 50px;">
        
      </div>
      <!-- end blank row -->


      <div class="row">
        <div class="col-md-3">
          
        </div>
        <div class="col-md-4">
          <h4>Fill The Dtails of Product</h4>
        </div>
        <div class="col-md-4">
          
        </div>
        
      </div>
      
      <div class="row" style="padding-top: 20px;" >
       <div class="col-md-2">
          <a href=""  ><img class="img-responsive rounded mx-auto d-block" src="logo/olxlogo.jpg"></a>
        </div>    
        
        <div class="col-md-9">
            <form class="form-horizontal" action="advertisement.php" method="post">
              
              <div class="form-group">
                <label class="control-label col-md-4" >Choose Category</label>
                <div class="col-md-8">
                  <select class="form-control" type="text" name="itemType" >
                    <option>book</option>
                    <option>mobile</option>
                    <option>laptop</option>
                    <option>bycycle</option>
                  </select>
                </div>
              </div>
               <div class="form-group">
                <div class="col-md-8 col-sm-offset-4">
                  <button type="submit" class="btn btn-default"  name="add" value="1">Proceed Next</button>
                </div>
              </div>
            </form>             
          </div>
        </div>
    </div>

   <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
  
<?php
}

if($_POST['itemType']=='book'){
  include('book.php');
}
if($_POST['itemType']=='mobile'){
  include('mobile.php');
}
if($_POST['itemType']=='laptop'){
  include('laptop.php');
}
if($_POST['itemType']=='bycycle'){
  include('bycycle.php');
}

?>









