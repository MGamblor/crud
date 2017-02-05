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

  <div class="container bg-primary" style="padding-top:20px; padding-bottom:20px; max-width:500px">
    <h2>Baz Building</h2>
    <hr>

    <div class="col-md-12">
      <?php

    // Add dbconnect
    require('dbconnect.php');
    $conn = connect_db();

    // Form data has been sent to us
    $id = $_GET['id'];
    $newName = $_GET['newName'];
        
    // Fetch data to return if name exists    
    $query = "SELECT * FROM name WHERE nameID='$id'";
    $result = mysqli_query($conn ,$query);
    $row = mysqli_fetch_assoc($result);

    // Whitelisting technique    
    if (isSane($newName)){
        
    // Send the update request to the database
    $sql = "SELECT namName FROM name WHERE namName = '" . $_GET['newName'] . "';";
    $result = $conn->query($sql);

    if ($conn->affected_rows != 0) {
            echo "House name already exists <br><br>";
            echo "<a href='editform.php?id=$id' class='btn btn-warning btn-block'>Try Again</a>";
        } else {

        // Send the update request to the database
        $create_stmt = $conn->prepare('UPDATE name SET namName=? WHERE nameID=?');

        // Bind the user supplied parameter - expect 1 (s)trings and 1 (i)nteger
        $create_stmt->bind_param('si',$newName,$id);

        // Execute the statement and check for success
        $create_stmt->execute();
        check_success($conn, " House package updated <br><br> 
                                <a href='index.php' class='btn btn-success btn-block'>Home page</a>"); 

        // Close the connection
        $create_stmt->close();

        }
    } else {
             echo "ERROR: Invalid input, letters and numbers only! <br><br>
        <a href='editform.php?id=$id' class='btn btn-warning btn-block'>Try Again</a>";
    }
        
    // Close database connection
    close();

    ?>
    </div>

  </div>

</body>

</html>

