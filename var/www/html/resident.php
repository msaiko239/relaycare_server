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
<?php
$servername = "localhost";
$username = "inov";
$password = "1novSQL!";
$dbname = "inovonics";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
  padding: 10px;
  background: white;
  text-align: center;
}
table tr:last-child td:first-child {
    border-bottom-left-radius: 20px;
}
table tr:last-child td:last-child {
    border-bottom-right-radius: 20px;
}
table tr:first-child td:first-child {
    border-top-left-radius: 20px;
}
table tr:first-child td:last-child {
    border-top-right-radius: 20px;
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
                text-align:left;
                padding: 2px;
                padding-left: 15px;
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
.chip2 {
  display: inline-block;
  padding: 0 25px;
  height: 50px;
  width: 700px;
  font-size: 16px;
  line-height: 50px;
  border: 2px solid black;
  border-radius: 25px;
  border-radius: 30px;
  background-color: #f1f1f1;
</style>
<?php
$output = filter_input(INPUT_GET, 'link');
?>
</head>
<?php //error_reporting(-1); ?>
<?php //ini_set('display_errors', true); ?>
<body>
<div class="topnav" id="myTopnav">
<a class="logo" style="padding: 1px;" href="/index.php"><img src="/images/rnify.png" width='100' height='50'/></a>
<a href="/index.php">Dashboard</a>
<a class="active" href='/accounts.php'>Residents</a>
<a href='/display.php'>Active Alerts</a>
<a href='/reports.php'>Reports</a>
<a href='/groups.php'>Groups</a>
<a href='/users.php'>Users</a>
<a href='/checkin.php'>Device Status</a>
<a href='/syssettings.php'>System Settings</a>
<a href='/status.php'>System Status</a>
</div>
<script>
$('tr').click( function() {
    window.location = $(this).find('a').attr('href');
}).hover( function() {
    $(this).toggleClass('hover');
});
function AlertIt(obj) {
var answer = confirm ("Are you sure you want to delete this device?")
if (answer)
window.location="/deletedev.php?link=" + obj;
}
</script>
<script>
$('tr').click( function() {
    window.location = $(this).find('a').attr('href');
}).hover( function() {
    $(this).toggleClass('hover');
});
function DelRes(obj) {
var answer = confirm ("Are you sure you want to delete this resident?")
if (answer)
window.location="/deleteres.php?link=" + obj;
}
</script>
</head>
<body>
<div class="container">
<?php
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

echo "<table style='width:55%' align='center'>";
$sql = "select * from accounts where name like '$output';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         $_SESSION[room] = $row["room"];
         $_SESSION[bed] = $row["bed"];
         $_SESSION[phone] = $row["phone"];
         $_SESSION[grp] = $row["grp"];
         echo "<h1><tr class='resident'><td><font size='6'>" .$row["name"]. "</font></td></tr></h1>";
         echo "<tr class='resident'><td>"."Room: "."". $row["room"]. ""." | Bed: "."" .$row["bed"]. ""." | Phone: "."" .$row["phone"]. ""." | Group: "."" .$row["grp"]. "<a href='javascript:DelRes(\"".$row["name"]."\");'>Delete Resident</a></td></tr>";
         echo "</table>";
    }
} else {
     echo "<table style='width:100%'>";
        echo "<h1><tr><td><span class='label label-success label-large'>"."No Residents"."</span></td></tr></h1>";
     echo "</table>";
}
echo "</table>";
$conn->close();
?>
</div>
<div class="w3-container center" align='center'>
<table align='center'>
<tr><td><p><button onclick="window.location.href='/editaccount.php?link=<?php echo htmlspecialchars($output); ?>'" class="w3-button w3-white w3-border">Edit Resident</button></p></td>
</table>
</div>
</div>
<div class="container">
<?php
session_start();
$output = filter_input(INPUT_GET, 'link');
$_SESSION[resident] = $output;
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

echo "<table style='width:35%' align='center'>";
echo "<h1><tr class='resident'><td>" ."Device Type" ."</td><td>". "Serial #" . "</td><td></td></tr></h1>";
$sql = "select * from dev_type where name like '$output';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         echo "<h1><tr class='resident'><td>" .$row["type"]. "</td><td>".$row["serial"]. "</td><td><a href='javascript:AlertIt(\"".$row["serial"]."\");'>Delete Device</a></td></tr></h1>";
    }
} else {
        echo "<h1><tr class='resident'><td colspan='3'>"."No Devices"."</td></tr></h1>";
}
echo "</table>";
$conn->close();
?>
</div>
<div class="w3-container center" align='center'>
<p>
  <button onclick="window.location.href='/adddevice.php?link=<?php echo htmlspecialchars($output); ?>'" class="w3-button w3-white w3-border">Add Device</button>
</p>
</div>
</div>
</body>
</html>
