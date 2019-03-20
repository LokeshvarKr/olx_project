<?php


?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!--custom css -->
    <link rel="stylesheet" href="custom.css">
    <title>Registration</title>
    <style type="text/css">
      body{
        background-image: url(grain.jpg);
        color: brown;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <dir class="row">
        <div class="col-sm-4">
        
        </div>
      
        <div class="col-xs-8">  
          <h4>Register here</h2>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-2"></div>      
         <div class="col-sm-10">
            <form class="form-horizontal" >
              
              <div class="form-group">
                <label for="inputUserFirstName" class="control-label col-sm-4" >FirstName</label>
                <div class="col-sm-8">
                  <input class="form-control" placeholder="User First Name" type="text"  name="" />
                </div>
              </div>

              <div class="form-group">
                <label for="inputUserLastName" class="control-label col-sm-4" >LastName</label>
                <div class="col-sm-8">
                  <input class="form-control" placeholder="User Last Name" type="text" name="" />
                </div>
              </div>

               <div class="form-group">
                <label for="address" class="control-label col-sm-4" >Address</label>
                <div class="col-sm-8">
                  <input class="form-control" placeholder="Full Address" type="text" name="" />
                </div>
              </div>

               <div class="form-group">
                <label for="dob" class="control-label col-sm-4" >Date of Birth</label>
                <div class="col-sm-8">
                  <input class="form-control" placeholder="Date of Birth" type="date" name="" />
                </div>
              </div>

              <div class="form-group">
                <label for="gender" class="control-label col-sm-4" >Gender</label>
                <div class="col-sm-8">
                  <input class="form-control" placeholder="Gender" type="text" name="" />
                </div>
              </div>

              <div class="form-group">
                <label for="UserId" class="control-label col-sm-4" >UserId</label>
                <div class="col-sm-8">
                  <input class="form-control" placeholder="User Id" type="text" name="" />
                </div>
              </div>

              <div class="form-group">
                <label for="password" class="control-label col-sm-4" >Password</label>
                <div class="col-sm-8">
                  <input class="form-control" placeholder="Password" type="password" name="" />
                </div>
              </div>

              <div class="form-group">
                <label for="mobileNumber" class="control-label col-sm-4" >Mobile Number</label>
                <div class="col-sm-8">
                  <input class="form-control" placeholder="Mobile Number" type="text" name="" />
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-sm-8 col-sm-offset-4">
                  <button type="submit" class="btn btn-default">Register</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>