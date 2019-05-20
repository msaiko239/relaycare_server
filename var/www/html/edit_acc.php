<?php

$var1 = $_POST['name']; 
$var2 = $_POST['room'];
$var4 = $_POST[bed];
$var3 = $_POST['pnumber'];
$var5 = $_POST['grp1'];

$servername = "localhost";
$username = "inov";
$password = "1novSQL!";
$dbname = "inovonics";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO accounts (name, room, bed, phone, grp) VALUES ('$var1', '$var2', '$var4', '$var3', '$var5') ON DUPLICATE KEY UPDATE room = '$var2', bed = $var4, phone = '$var3', grp = '$var5'";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: /resident.php?link='.$var1);
?>
