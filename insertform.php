<!DOCTYPE html>
<html lang="en">

<head>
  <title>Baz Build</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="TAFE assessment">
  <meta name="keywords" content="HTML,PHP, SQL, Bootstrap, JavaScript">
  <meta name="author" content="Matthew Johnson">    

  <!-- Bootstrap and jQuery links-->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <script src="js/jquery.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>

</head>

<body>

  <?php
    // Add database connection    
    require('dbconnect.php');
   ?>

    <div class="container bg-primary" style="padding-top:20px; padding-bottom:20px; max-width:500px">
      <h2>Baz Build</h2>
      <hr>

      <div class="row">

        <div class="col-md-12">
          <h3>Insert new package</h3>

          <form role="form" action="insert.php" method="post">

            <div class="form-group">
              <label>House Type (select one):</label>
              <select class="form-control" name="htype" required>
                <option disabled selected value> -- select an option -- </option>
                <?php dropdown() ?>                  
            </select>
              <?php close() ?>
            </div>

            <div class="form-group">
              <label>House Name</label>
              <input type="text" name="hname" class="form-control" maxlength="30" placeholder="type here..." required>
            </div>
              
            <button type="submit" class="btn btn-success btn-block">Add new house package</button>

            <br>

            <a href="index.php" class="btn btn-warning center-block" role="button">Return to main page</a>

          </form>
            
        </div>

      </div>

    </div>

</body>

</html>