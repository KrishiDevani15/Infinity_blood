<?php
//echo 'Database created successfully';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniproject";
// Create connection
$conn =  mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo 'Database connected successfully';
    $bloodtype = mysqli_real_escape_string($conn, $_REQUEST['bloodgroup']);
    $pincode = mysqli_real_escape_string($conn, $_REQUEST['pincode']);
    $time = mysqli_real_escape_string($conn, $_REQUEST['time']);

    $sql = "select * from  registration Where bloodgroup ='$bloodgroup' and pincode ='$pincode'";


    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<br>" . "name:  " . $row["name"] . "-  Pincode:  " . $row["pincode"] . "-  Mobile:  " . $row["mobile"] . "<br>";
        } else {

            echo "Please enter correct username or password";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
}
