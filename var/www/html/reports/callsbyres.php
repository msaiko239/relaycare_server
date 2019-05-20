<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </script>
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.active {
  background-color: dodgerblue;
  color: white;
}
.logo {
  background-color: white;
  color: white;
}
.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
*[data-href] {
  cursor: pointer;
}
.center {
  margin: auto;
  width: 20%;
  padding: 10px;
  align: center;
}
.resident {
  margin: auto;
  width: 60%;
  border: 3px solid dodgerblue;
  padding: 10px;
  background: white;
}
body {background-color: #D4DADB;}
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
                align: center;
            }
            th {
                background-color:green;
                Color:white;
            }
            th, td {
                width:150px;
                text-align:center;
                padding: 2px;
            }
            td a {
                 display:inline-block;
                 min-height:100%;
                 width:100%;
                 padding: 2px; /* add your padding here */
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
div.a {
  position: absolute;
  left: 0;
  width: 50%;
  height: 100%;
}
div.b {
  position: absolute;
  right: 0;
  width: 50%;
  height: 350px;
  background-color: white;
}
div.c {
  position: absolute;
  top: 425px;
  right: 0;
  width: 50%;
  height: 350;
  background-color: #D4DADB;
}
div.d {
  position: absolute;
  top: 500px;
  right: 0;
  width: 50%;
  height: 400px;
  background-color: #D4DADB;
}
</style>
<script>
$('tr').click( function() {
    window.location = $(this).find('a').attr('href');
}).hover( function() {
    $(this).toggleClass('hover');
});
</script>
</head>
<?php //error_reporting(-1); ?>
<?php //ini_set('display_errors', true); ?>
<body>
<div class="topnav" id="myTopnav">
<a class="logo" style="padding: 1px;" href="/index.php"><img src="/images/rnify.png" width='100' height='50'/></a>
<a href="/index.php">Dashboard</a>
<a href='/accounts.php'>Residents</a>
<a href='/display.php'>Active Alerts</a>
<a class="active" href='/reports.php'>Reports</a>
<a href='/groups.php'>Groups</a>
<a href='/users.php'>Users</a>
<a href='/checkin.php'>Device Status</a>
<a href='/syssettings.php'>System Settings</a>
<a href='/status.php'>System Status</a>
</div>
<div>
<?php
$var1 = $_POST[startdate];
$var2 = $_POST[enddate];
$var3 = $_POST[resi];
if(!empty($_POST[resi])) {
   $resi = " AND resident like '".$var3."'";
}

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

$sttime = str_replace("T", " ", $var1);
$etime = str_replace("T", " ", $var2);
$sql = "select count(*) total from reports where starttime between '$sttime' and '$etime'$resi;";
echo "<table style='width:65%' align='center'";
echo "<h1><tr class='resident'><td>"."Total Number of calls between $sttime and $etime"."</td></tr></h1>";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         echo "<h1><tr class='resident'><td>" .$row['total']."</td></tr></h1>";
    }
} else {
     echo "<table style='width:100%'>";
        echo "<h1><tr><td><span class='label label-success label-large'>"."No Entries"."</span></td></tr></h1>";
     echo "</table>";
}
echo "</table>";
$conn->close();
?>
</div>
<div>
<?php
$var1 = $_POST[startdate];
$var2 = $_POST[enddate];
$var3 = $_POST[resi];
if(!empty($_POST[resi])) {
   $resi = " AND resident like '".$var3."'";
}
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
$sql2 = "select avg(timestampdiff(SECOND, starttime, endtime)) as avgdiff from reports where starttime between '$var1' and '$var2'$resi";
echo "<table style='width:65%' align='center'";
echo "<h1><tr class='resident'><td>"."Average Response Time"."</td></tr></h1>";
$result = $conn->query($sql2);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $total_seconds = $row[avgdiff];
    $seconds = intval($total_seconds%60);
    $total_minutes = intval($total_seconds/60);
    $minutes = $total_minutes%60;
    $hours = intval($total_minutes/60);
    $timeFormat = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
//    echo "<h1><tr class='resident'><td>" .$hours.":".$minutes.":".$seconds."</td</tr></table>";
    echo "<h1><tr class='resident'><td>" .$timeFormat."</td</tr></table>";
   }
} else {
     echo "<p align='center'><font size='4'>No Calls this hour </font></p>";
}
$conn->close();
?>
</div>
<div>
<?php
$var1 = $_POST[startdate];
$var2 = $_POST[enddate];
$var3 = $_POST[resi];
if(!empty($_POST[resi])) {
   $resi = " AND resident like '".$var3."'";
}

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

$sttime = str_replace("T", " ", $var1);
$etime = str_replace("T", " ", $var2);
$sql = "select * from reports where starttime between '$sttime' and '$etime'$resi$room$bed;";
echo "<table style='width:65%' align='center'";
echo "<h1><tr class='resident'><td>"."Start Time"."</td><td>"."End Time"."</td><td>" ."Time Active" ."</td><td>". "Call Type"."</td><td>". "Resident" . "</td></tr></h1>";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $date1 = strtotime($row[starttime]);
         $date2 = strtotime($row[endtime]);
         $diff = abs($date2 - $date1);
         $total_seconds = $diff;
         $seconds = intval($total_seconds%60);
         $total_minutes = intval($total_seconds/60);
         $minutes = $total_minutes%60;
         $hours = intval($total_minutes/60);
         $timeFormat = sprintf('%02d:%02d:%02d', $hours, $minutes, $seconds);
         echo "<h1><tr class='resident'><td>".$row[starttime]."</td><td>".$row[endtime]."</td><td>".$timeFormat."</td><td>" .$row[type]."</td><td>" .$row[resident]. "</td></tr></h1>";
    }
} else {
     echo "<table style='width:100%'>";
        echo "<h1><tr><td><span class='label label-success label-large'>"."No Entries"."</span></td></tr></h1>";
     echo "</table>";
}
echo "</table>";
$conn->close();
?>
</div>
</body>
</html>
