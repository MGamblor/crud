<?php

// Add database connection
require('dbconnect.php');
$conn = connect_db();

// Data has been sent to us 
$nameID = $_GET['id'];

//Create query
$query = "DELETE FROM name WHERE nameID='$nameID'";
if(mysqli_query($conn, $query)){
    
    //redirect page to index.php
    header("Location:index.php");
}
else {   
    echo "Error in your query" . mysqli_error($conn);
}

// Close database connection
close();

?>