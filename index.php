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

    //add dbconnection
    require('dbconnect.php');
    $conn = connect_db();

    //create query
    $result = $conn->query("SELECT * FROM type t, name n WHERE t.typeID = n.namTypeID ORDER BY nameID ASC");
            
    ?>

    <div class="container bg-primary" style="padding-top:20px; padding-bottom:20px; max-width:500px">
      <h2>Baz Building</h2>
      <hr>

      <div class="col-md-12">
        <h3>Land and home packages</h3>

        <table class="table">
          <thead>
            <tr>
              <th>House Type</th>
              <th>House Name</th>
            </tr>
          </thead>
          <tbody>

            <?php
            while ($row = $result->fetch_assoc()) { 
            ?>

              <tr>
                <td>
                  <?php echo $row['typeName']; ?>
                </td>
                <td>
                    <a style="color: white" href="details.php?id=<?php echo urlencode($row['nameID']); ?>"><?php echo strip_tags($row['namName']); ?></a>
                </td>
              </tr>
              <?php
            }

            close();
            
            ?>

          </tbody>

        </table>

        <a href="insertform.php" class="btn btn-success center-block" role="button">Add new home package</a>

      </div>

    </div>


</body>

</html>