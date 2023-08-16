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

  $loginusername = mysqli_real_escape_string($conn, $_REQUEST['username']);
  $loginpassword = mysqli_real_escape_string($conn, $_REQUEST['password']);

  $sql = "select * from  registration Where username ='$loginusername' and password='$loginpassword' ";


  if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      echo " Welcome ";
      include 'index2.html';
    } else {

      echo "Please enter correct username or password";
    }
  } else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}
