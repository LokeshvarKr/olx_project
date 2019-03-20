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
  <div class="wrapper container container-fluid">      
       <!-- blank row  -->
        <div class="row" style="height: 50px;">
        
        </div>
               <!-- blank row  end -->

        <div class="row">
          <div class="col-md-2">
          </div>
          <div class="col-md-9">

            <form class="form-horizontal" action="addMobile.php" method="post" enctype='multipart/form-data' >
                <div class="form-group">
                  <label  class="control-label col-md-4" > Manufactured By</label>
                  <div class="col-md-8">
                      <input class="form-control" placeholder="Manufacturer" type="text" name="manu" required />
                  </div>
                </div>
  
                <div class="form-group">
                  <label  class="control-label col-md-4" > Model Number</label>
                  <div class="col-md-8">
                      <input class="form-control" placeholder="Model Number" type="text" name="modelNum" required />
                  </div>
                </div>

                <div class="form-group">
                  <label  class="control-label col-md-4" > Year of Purchase</label>
                  <div class="col-md-8">
                      <input class="form-control" placeholder="Year of Purchase" type="year" name="yop" required />
                  </div>
                </div>

                <div class="form-group">
                  <label  class="control-label col-md-4" >Price</label>
                  <div class="col-md-8">
                     <input class="form-control" placeholder="Selling price" type="text" name="price" required />
                  </div>
                </div>

                <div class="form-group">
                  <label  class="control-label col-md-4" >Upload Mobile Images</label>
                  <div class="col-md-8">
                      <input class="form-control-file"  type="file" name="imga"  required />
                      <input class="form-control-file"  type="file" name="imgb" />
                      <input class="form-control-file"  type="file" name="imgc" />

                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-8 col-sm-offset-4">
                      <button type="submit" class="btn btn-default" value="1" name="add">Advertise Now</button>
                  </div>
                </div>

              </form>

      </div>
    </div>
  </div>
  
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
