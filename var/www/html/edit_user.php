<?php
session_start();
$var1 = $_POST['name']; 
$var2 = $_POST['room'];
$var4 = $_POST['bed'];
$var3 = $_POST['pnumber'];
$var5 = $_POST['grp1'];
$var6 = $_SESSION[id];
$var7 = $_POST['pass'];
$var8 = password_hash($var7, PASSWORD_DEFAULT);

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
$sql = "INSERT INTO users (id, username, password, fname, lname, extnum) VALUES ('$var6', '$var1', '$var8', '$var2', '$var4', '$var3') ON DUPLICATE KEY UPDATE password = '$var8', fname = '$var2', lname = '$var4', extnum = '$var3'";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    echo $var7;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: /user.php?link='.$var1);
?>
