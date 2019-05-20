<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <meta http-equiv="refresh" content="1" >
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
            }
            th {
                background-color:green;
                Color:white;
            }
            th, td {
                width:150px;
                text-align:center;
                padding:2px

            }
            .geeks {
                border-right:hidden;
            }
            .gfg {
                border-collapse:separate;
                border-spacing:0 15px;
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

$sql = "SELECT dev_type.*, devices.* FROM dev_type, devices WHERE dev_type.serial=devices.serial AND state = 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $date = strtotime($row["lastUpdated"]);
      $diff=abs($now->getTimestamp() - $date);
      $total_seconds = $diff;
      $seconds = intval($total_seconds%60);
      $total_minutes = intval($total_seconds/60);
      $minutes = $total_minutes%60;
      $hours = intval($total_minutes/60);
      echo "<table style='width:100%'>";
         echo "<h1><tr><td><span class='label label-warning label-large'>" ."Resident - " .$row["name"]. " - Duration  " .$hours.":".$minutes.":".$seconds."</span></td></tr></h1>";
      echo "</table>";
    }
} else {
     echo "<table style='width:100%'>";
        echo "<h1><tr><td><span class='label label-success label-large'>"."No Active Alerts"."</span></td></tr></h1>";
     echo "</table>";
}
echo "</table>";
$conn->close();
?>
</div>
</body>
</html>
