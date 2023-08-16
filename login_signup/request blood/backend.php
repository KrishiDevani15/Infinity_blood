<?php

$servername = 'localhost';
$username  = 'root';
$password = '';
$db_name = 'miniproject';

$conn = mysqli_connect($servername, $username, $password, $db_name);

$mobile = array();
$name = array();
$Pincode = array();

if ($conn->connect_error) {
    die("CONNECTION FAILED !!!........" . $conn->connect_error);
    // exit();
}

// echo "Database Connected Successfully.";
$pincode = mysqli_real_escape_string($conn, $_REQUEST['pincode']);

$bloodtype = mysqli_real_escape_string($conn, $_REQUEST['bloodtype']);
$time = mysqli_real_escape_string($conn, $_REQUEST['time']);
$n = 5;
if ($time == 1) {
    $sql_query = "SELECT * FROM registration WHERE (pincode = $pincode and bloodtype = '$bloodtype')";
} elseif ($time == 3) {
    $pincode2 = strval(intval($pincode) + 1);
    $pincode3 = strval(intval($pincode) - 1);
    $sql_query = "SELECT * FROM registration WHERE (pincode = $pincode and bloodtype = '$bloodtype') or (pincode = $pincode2 and bloodtype = '$bloodtype') or(pincode = $pincode3 and bloodtype = '$bloodtype')";
} elseif ($time == 5) {

    for ($x = 0; $x <= 5; $x++) {
        $pincode2 = strval(intval($pincode) + $x);
        $pincode3 = strval(intval($pincode) - $x);
        $sql_query = "SELECT * FROM registration WHERE (pincode = $pincode and bloodtype = '$bloodtype') or (pincode = $pincode2 and bloodtype = '$bloodtype') or(pincode = $pincode3 and bloodtype = '$bloodtype')";
    }
} elseif ($time == 10) {

    $sql_query = "SELECT * FROM registration WHERE (pincode = $pincode and bloodtype = '$bloodtype') or (pincode = $pincode2 and bloodtype = '$bloodtype') or(pincode = $pincode3 and bloodtype = '$bloodtype')";
}
$result = $conn->query($sql_query);

if ($result->num_rows > 0) {
    // echo "Records inserted successfully";
    // echo "<script> alert('SIGNED UP SUCCESSFULLY!!!!!!') </script>";
    while ($row = $result->fetch_assoc()) {
        // echo "<br>" . "id: " . $row["name"] . "- Pincode: " . $row["pincode"] . "- Mobile: " . $row["mobile"] . "<br>";

        array_push($mobile, $row["mobile"]);
        array_push($name, $row["name"]);
        array_push($Pincode, $row["pincode"]);
    }
    // print_r($name);
    // print_r($name);
    // print_r($lastname);
    // include 'request.html';
} else {
    echo "0 Result";
}
mysqli_close($conn);

?>


<html>

<style>
    body {
        padding: 0;
        margin: 0;
        background-image: linear-gradient(90deg, rgb(9, 92, 92), rgb(16, 121, 121), rgb(30, 100, 100));
        min-height: 100vh;
        /* max-width: 100vw; */
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .container {
        font-size: 130%;
        font-weight: bolder;
    }

    .container2 {
        margin: .5rem 0;
        padding: 1rem;
        display: flex;
        gap: 1rem;
        min-width: 80vw;
        border: .1rem solid black;
        justify-content: space-between;
    }

    .content {
        /* width: 5rem;
    height: 1rem; */
        padding: .5rem 1rem;
        /* border: 2px solid red; */
    }

    h1 {
        font-size: 350%;
        font-weight: bolder;
    }
</style>

<body>

    <h1>DONOR LIST</h1>

    <script>
        var nameArray = <?php echo json_encode($name); ?>
        // var mobileArray;
        mobileArray = <?php echo json_encode($mobile); ?>
        // var pinArray;
        pinArray = <?php echo json_encode($Pincode); ?>

        var containerDiv;
        var snDiv;
        var nameDiv;
        var mobDiv;
        var pinDiv;

        var body = document.getElementsByTagName("body")[0];
        var sn = "SN";
        var donor = "NAME";
        var mobile = "MOBILE";
        var pin = "PINCODE";
        var i;

        Heading();
        sn = 0;

        for (i = 0; i < nameArray.length; i++) {
            sn++;

            donor = nameArray[i];
            pin = pinArray[i];
            mobile = mobileArray[i];

            Heading();
        }

        function Heading() {

            containerDiv = document.createElement("div");
            containerDiv.classList.add("container2");
            containerDiv.classList.add("container");

            snDiv = document.createElement("div");
            snDiv.innerText = sn;
            snDiv.classList.add("content");

            nameDiv = document.createElement("div");
            nameDiv.innerText = donor;
            nameDiv.classList.add("content");

            pinDiv = document.createElement("div");
            pinDiv.innerText = pin;
            pinDiv.classList.add("content");

            mobDiv = document.createElement("div");
            mobDiv.innerText = mobile;
            mobDiv.classList.add("content");

            containerDiv.appendChild(snDiv);
            containerDiv.appendChild(nameDiv);
            containerDiv.appendChild(pinDiv);
            containerDiv.appendChild(mobDiv);

            body.appendChild(containerDiv);
        }
    </script>
</body>

</html>