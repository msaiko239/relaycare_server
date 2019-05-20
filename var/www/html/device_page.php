<?php
session_start();
$output1 = $_SESSION[resident];
$var1 = $_POST['devtype']; 
$var2 = $_POST['serial'];
$var3 = $_POST['name'];
$output = filter_input(INPUT_GET, 'link');

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
//$sql = "INSERT INTO dev_type (type, serial, name) VALUES ('$var1', '$var2', '$var3')";
$sql = "INSERT INTO dev_type (type, serial, name, room, bed, phone) SELECT '$var1', '$var2', '$var3', room, bed, phone FROM accounts where name like '$var3'";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: /resident.php?link='.$output1);
?>
