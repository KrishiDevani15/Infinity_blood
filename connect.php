<?php
   /* $username =$_POST['username'];
    $password =$_POST['password'];
    
    //Database Connection
    $connection = new mysqli('localhost','root','','connect');
    if($connection->connect_error){
        die('Connection Failed : '.$connection->connect_error);

    }
    else{
        $stmt = $connection->prepare("insert into registration(username,password)
        values(?,?)");
        $stmt->bind_param("ss",$username,$password);
        $stmt->excute();

        echo "Registration is Successfully..."
        $stmt->close();
        $connection->close();
    }*/
?>