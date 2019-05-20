<?php
session_start();
$output1 = $_SESSION[resident];
$dev = filter_input(INPUT_GET, 'link');
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
$sql = "delete from dev_type where serial like '$dev';";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
echo $output1;
header('Location: /resident.php?link='.$output1);
?>
