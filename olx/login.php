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
    <div class="container">
     <!-- blank row  -->
      <div class="row" style="height: 50px;">

        
      </div>
      <!-- end blank row -->
      <div class="row">
          <div class="col-md-3">
            
          </div>
        <div class="col-md-8">  
          <h4>Login here</h2>
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-2">
          <a href="" ><img class="img-responsive rounded mx-auto d-block" src="logo/olxlogo.jpg"></a>
        </div>   
         
        <div class="col-md-6">
          <form class="form-horizontal" action="loginUserNow.php" method="post">

              <div class="form-group">
                <label class="control-label col-md-4" >EmailId</label>
                <div class="col-md-8">
                  <input class="form-control" placeholder="Email Id" type="email" name="email"  required />
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-4" >Password</label>
                <div class="col-md-8">
                  <input class="form-control" placeholder="Password" type="password" name="pass" required />
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                  <button type="submit" class="btn btn-default" name="login" value="1" >login</button>
                </div>
              </div>

              <!-- 

              <div class="form-group form-check">
                <div class="col-md-8 col-md-offset-4">
                    <input class="form-check-input" type="checkbox" value="1" name="remember">
                    <label class="form-check-label" >Remember Me</label>
                </div>
              </div>

              -->

              
              <div class="form-group">
                  <div class="col-md-8">
                    <a href="register.php">New User ? Register Here</a>
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-md-8">
                    <a href="forgetPassward.php">Forget Passward</a>
                  </div>
              </div>

            </form>
            
          </div>
        
        <div class="col-md-2">
          
        </div>  

        </div>
      
    </div>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>