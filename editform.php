<!DOCTYPE html>
<html lang="en">

<head>
  <title>Baz Build</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="TAFE assessment">
  <meta name="keywords" content="HTML,PHP, SQL, Bootstrap, JavaScript">
  <meta name="author" content="Matthew Johnson">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <script src="js/jquery.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>
</head>

<body>

  <?php
    
    // Add database connection
    require('dbconnect.php');
    $conn = connect_db();
    
    // Form data has been sent to us
    $id = $_GET['id'];
    
    // Add query
    $query = "SELECT * FROM name WHERE nameID='$id'";
    $result = mysqli_query($conn ,$query);
    $row = mysqli_fetch_assoc($result)
    
    ?>

    <div class="container bg-primary" style="padding-top:20px; padding-bottom:20px; max-width:500px">
      <h2>Baz Build</h2>
      <hr>

      <div class="row">

        <div class="col-md-12">
          <h3>Edit name</h3>

          <form role="form" action="edit.php" method="get">
            <input type="hidden" name="id" value="<?php echo $row['nameID']; ?>">
            <div class="form-group>">
              <label>Current name</label>
              <input type="text" name="hname" class="form-control" value="<?php echo $row['namName']; ?>" readonly>
            </div>

            <br>

            <div class="form-group>">
              <label>Type new house name</label>
              <input type="text" name="newName" class="form-control" maxlength="30" placeholder="type here..." required>
            </div>

            <br>

            <button type="submit" class="btn btn-success btn-block">Update house name</button>

            <br>

            <a href="index.php" class="btn btn-warning center-block" role="button">Return to main page</a>

            <?php
            
            // Close database connection  
            close();
        
            ?>


          </form>

        </div>

      </div>

    </div>

</body>

</html>