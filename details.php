<!DOCTYPE html>
<html lang="en">

<head>
  <title>Baz Build</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <script src="js/jquery.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>    
</head>
    



<body>

  <?php
    
    $id = $_GET['id'];
    
    //add database connection
    
    require('dbconnect.php');
    $conn = connect_db();
    
    //Create query

    $query = "SELECT * FROM type t, name n WHERE t.typeID = n.namTypeID AND nameID='$id'";
    
    $features = "SELECT f.featureDescription
                FROM type AS t 
                INNER JOIN joint_type_breed j 
                ON t.typeID = j.typeID
                INNER JOIN feature f
                ON f.featureID = j.featureID
                INNER JOIN name AS n
                ON t.typeID = n.namTypeID
                WHERE n.nameID = '$id'";

    $result = mysqli_query($conn ,$query);
    
    $featResult = mysqli_query($conn ,$features);
    
    ?>


    <div class="container bg-primary" style="padding-top:20px; padding-bottom:20px; max-width:500px;">
      <h2>Baz Build</h2>
      <hr>


      <div class="row">

        <div class="col-md-12">
          <h3>Details</h3>

          <form role="form">


            <?php
            
            while ($row = mysqli_fetch_assoc($result)) {
                
            ?>

              <input type="hidden" name="id" value="<?php echo $row['nameID']; ?>">


              <div class="form-group>">

                <label>House Type</label>

                <input type="text" name="htype" class="form-control" value="<?php echo $row['typeName']; ?>" readonly>
              </div>

              <br>

              <div class="form-group>">

                <label>House Name</label>

                <input type="text" name="hname" class="form-control" value="<?php echo $row['namName']; ?>" readonly>
              </div>

              <br>

              <table class="table">
                <thead>
                  <tr>
                    <th>Features</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                
            while ($row = mysqli_fetch_array($featResult)) {
                
            ?>

                    <tr>
                      <td>
                        <?php echo $row['featureDescription']; ?>
                      </td>
                    </tr>

                    <?php
            }
              
            
            ?>

                </tbody>

              </table>

              <a href="editform.php?id=<?php echo urlencode($id); ?>" class="btn btn-success center-block" role="button">Edit Name</a>
              
              <br>
             
              <input type="button" class="btn btn-danger center-block" style="width: 100%" onclick="myFunction()" role="button" value="Delete Package">

              <br>

              <a href="index.php" class="btn btn-warning center-block" role="button">Return to main page</a>

              <?php
                
            }
              
              close();
              
            ?>


          </form>

        </div>
          
      </div>


    </div>
    
<script>
    
function myFunction() {
      if (confirm("Are you sure you want to delete?")) {
          window.location.href="delete.php?id=<?php echo $id; ?>";
          return true;
      }
    else {
        return false;
    }
    
}

</script>


</body>

</html>