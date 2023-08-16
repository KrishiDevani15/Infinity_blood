<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miniproject";

session_start();
// Create connection
$conn =  mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} else {
  echo 'Database connected successfully';


  // Escape user inputs for security
  $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
  $gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);
  $age = mysqli_real_escape_string($conn, $_REQUEST['age']);
  $address = mysqli_real_escape_string($conn, $_REQUEST['address']);
  $weight = mysqli_real_escape_string($conn, $_REQUEST['weight']);
  $height = mysqli_real_escape_string($conn, $_REQUEST['height']);
  $pincode = mysqli_real_escape_string($conn, $_REQUEST['pincode']);
  $mobile = mysqli_real_escape_string($conn, $_REQUEST['mobile']);
  $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
  $username = mysqli_real_escape_string($conn, $_REQUEST['username']);
  $password = mysqli_real_escape_string($conn, $_REQUEST['password']);
  $bloodtype = mysqli_real_escape_string($conn, $_REQUEST['bloodtype']);

  $pass = password_hash($password, PASSWORD_BCRYPT);

  $token = bin2hex(random_bytes(15));
  $sql = "insert into registration (name,gender,age,bloodtype,address,pincode,email,mobile,username,password,token,status) values('$name','$gender',$age,'$bloodtype','$address',$pincode,'$email',$mobile,'$username','$password','$token','inactive')";

  if (mysqli_query($conn, $sql)) {
    $subject = "Email Activation";
    $body = "Hi, $username. Click here to activate your account http://localhost/Final/login_signup/activate.php?token=$token ";
    $sender_email = "From: mainminiproject143691@gmail.com ";

    if (mail($email, $subject, $body, $sender_email)) {
      $_SESSION['msg'] = "check your mail to activate your account $email";
      echo "Records inserted successfully.";
      header('location:login.html');
    } else {
      echo "Email sending failed....";
    }
  } else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
  }
}
