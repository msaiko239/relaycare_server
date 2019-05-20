<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
body {background: linear-gradient(90deg, rgba(230,230,233,1) 10%, rgba(134,135,140,1) 100%);}
h1   {color: blue;}
p    {color: red;}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background: linear-gradient(180deg, rgba(230,230,233,1) 0%, rgba(134,135,140,1) 100%);
}
.label-large {
  vertical-align: super;
  font-size: large; color: black;
}
           table {
                border-collapse: collapse;
                border-spacing: 2px;
            }
            th {
                background-color:green;
                Color:white;
            }
            td {
                width:1px;
                text-align:center;
                padding:1px
            }
            .geeks {
                border-right:hidden;
            }
            .gfg {
                border-collapse:separate;
                border-spacing:0 1px;
            }
            h1 {
                color:green;
            }
</style>
</head>
<?php error_reporting(-1); ?>
<?php ini_set('display_errors', true); ?>
<body>
<div class="container">
<?php
$output = filter_input(INPUT_GET, 'link');
//echo $output;
?>
<?php
$now = new DateTime();
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

echo "<table style='width:15%' align='center'";
echo "<h1><tr class='resident'><td>" ."Type" ."</td><td>". "Serial #" . "</td></tr></h1>";
$sql = "select * from dev_type where name like '$output'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
//      echo "<table align='center'>";
         echo "<h1><tr class='resident'><td>" .$row["type"]. "</td><td>".$row["serial"]."</td></tr></h1>";
//      echo "</table>";
    }
} else {
     echo "<table style='width:100%'>";
        echo "<h1><tr><td><span class='label label-success label-large'>"."No Residents"."</span></td></tr></h1>";
     echo "</table>";
}
echo "</table>";
$conn->close();
?>

<div class="w3-container center" align='center'>
<p>
  <button class="w3-button w3-white w3-border">Add Device</button>
</p>
</div>
</div>
</body>
</html>
