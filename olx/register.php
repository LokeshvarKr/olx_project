<?php


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
        background-image: url();
        color: blue;
        background-color: ;
      }
  
    </style>
  </head>
  <body>
    <div class="wrapper container container-fluid">
      
      <div class="row" style="padding-top: 20px;" >
       <div class="col-md-2">
          <a href=""  ><img class="img-responsive rounded mx-auto d-block" src="logo/olxlogo.jpg"></a>
        </div>    
        
        <div class="col-md-9">
            <form class="form-horizontal" action="addUser.php" method="post">
              
              <div class="form-group">
                <label  class="control-label col-md-4" >FirstName</label>
                <div class="col-md-8">
                  <input class="form-control" placeholder="User First Name" type="text"  name="firstName" required />
                </div>
              </div>

              <div class="form-group">
                <label  class="control-label col-md-4" >LastName</label>
                <div class="col-md-8">
                  <input class="form-control" placeholder="User Last Name" type="text" name="lastName" required />
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-4" >User Type</label>
                <div class="col-md-8">
                  <select class="form-control" type="text" name="userType" required >
                    <option>teacher</option>
                    <option>staff</option>
                    <option>student</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label  class="control-label col-md-4" >EmailId</label>
                <div class="col-md-8">
                  <input class="form-control" placeholder="Email Id" type="email" name="email" required />
                </div>
              </div>

              <div class="form-group">
                <label  class="control-label col-md-4" >Password</label>
                <div class="col-md-8">
                  <input class="form-control" placeholder="Password" type="password" name="password" required />
                </div>
              </div>

              <div class="form-group">
                <label  class="control-label col-md-4" >Mobile Number</label>
                <div class="col-md-8">
                  <input class="form-control" placeholder="Mobile Number" type="text" name="mob" required />
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-8 col-sm-offset-4">
                  <button type="submit" class="btn btn-default" value="1" name="register">Register</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>