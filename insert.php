<!DOCTYPE html>
<html lang="en">

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

    // Form data has been posted to us
    $htype = $_POST['htype'];
    $hname = $_POST['hname'];
        
    // Whitelisting technique
    if (isSane($hname)){
        
    // Send the update request to the database    
    $sql = "SELECT namName FROM name WHERE namName = '" . $_POST['hname'] . "';";
    $result = $conn->query($sql);

        if ($conn->affected_rows != 0) {
            echo "House name already exists <br><br>
                    <a href='insertform.php' class='btn btn-warning btn-block'>Try Again</a>";
        } else if ($conn->affected_rows === 0){

        // Send the update request to the database
        $create_stmt = $conn->prepare('INSERT INTO name(namName, namTypeID) VALUES(?, ?)');

        // Bind the user supplied parameter - expect 2 (s)trings
        $create_stmt->bind_param('ss',$hname,$htype);

        // Execute the statement and check for success
        $create_stmt->execute();
        check_success($conn, " House package created <br><br> 
                                <a href='index.php' class='btn btn-success btn-block'>Home page</a>"); 

        // Close the connection
        $create_stmt->close();
        } 
    } else {
             echo "ERROR: Invalid input, letters and numbers only! <br><br>
        <a href='insertform.php' class='btn btn-warning btn-block'>Try Again</a>";
    }
            
    close();

    ?>

    </div>
      
  </div>
    
</body>

</html>




