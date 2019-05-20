<?php
$var1 = $_POST['name']; 
$var2 = $_POST['room'];
$var4 = $_POST[bed];
$var3 = $_POST['pnumber'];
echo $var1;

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
$sql = "INSERT INTO groups (title) VALUES ('$var1')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: groups.php');
?>
