<?php

// Connect to database

function connect_db(){
    $conn = new mysqli("localhost", "root", "", "baz_building");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
	

// Close connection             

function close(){
    $conn = connect_db();
    $conn->close();
}


// Drop down menu function

function dropdown() {
    $conn = connect_db();
    $result = $conn->query("SELECT * FROM type");
    while ($row = mysqli_fetch_array($result)) {
            echo "<option value='" . $row['typeID'] . "'>" . $row['typeName'] . "</option>";
        }
}

// Success message

function check_success($conn, $success_msg) {
    if($conn->affected_rows != 1):
        echo '<p>Arg! No rows were affected by:<br/>' . $sql . '</p>';
    else:
        echo '<p>Success!' . $success_msg . '</p';
    endif;
}

// Whitelisting function

function isSane($input) {
    $input = trim($input);
    $input = stripslashes($input);
    if ($input === '') {
        return false;
    }
    return (preg_match('/^[A-Za-z0-9 ]+$/', $input));
}

?>