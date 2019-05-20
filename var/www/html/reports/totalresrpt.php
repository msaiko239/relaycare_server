<!DOCTYPE html>
<html lang="en">
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
.chip {
  display: inline-block;
  padding: 0 25px;
  height: 50px;
  width: 300px;
  font-size: 16px;
  line-height: 50px;
  border-radius: 25px;
  background-color: #f1f1f1;
}

.chip img {
  float: left;
  margin: 0 10px 0 -25px;
  height: 50px;
  width: 50px;
  border-radius: 50%;
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
<body>
<div class="topnav" id="myTopnav">
<a href="/index.php">Dashboard</a>
<a href='/accounts.php'>Residents</a>
<a href='/display.php'>Active Alerts</a>
<a class="active" href='/reports.php'>Reports</a>
<a href='/groups.php'>Groups</a>
<a href='/log.php'>Log File</a>
<a href='/checkin.php'>Device Status</a>
<a href='/syssettings.php'>System Settings</a>
<a href='/status.php'>System Status</a>
</div>
<div>
<?php
session_start();
$_POST["startdate"];
$_POST["enddate"];
$_POST["resi"];
?>
</div>
<div class="container">
<table style='width:60%' align='center'>
<form method="post" action="callsperres.php" align="center">
<tr><td colspan="2" style='font-weight:bold; font-size:25px;'>Reports</td></tr>
<tr><td><br>
  Start Date (date and time):
  <input type="datetime-local" name="startdate" id="startdate" step="1">
</br></td>
<td><br>
  End Date (date and time):
  <input type="datetime-local" name="enddate" step="1">
</br></td></tr>
<tr><td colspan='2'><div class="w3-container center" align='center'>
<div class"row">
<?php

$link = mysqli_connect("localhost","inov","1novSQL!","inovonics");

$sql = "SELECT resident FROM reports group by resident;";

$result = mysqli_query($link,$sql);
if ($result != 0) {
    echo '<div class="col-25"><label>Resident</div>';
    echo '<div class="col-75"><select class="col-75" name="resi">';
    echo '<option value="">default</option>';

    $num_results = mysqli_num_rows($result);
    for ($i=0;$i<$num_results;$i++) {
        $row = mysqli_fetch_array($result);
        $name = $row['resident'];
        echo '<option value="' .$name. '">' .$name. '</option>';
    }

    echo '</select></div>';
    echo '</label>';
}

mysqli_close($link);

?>
</div>
<br></br>
  <div class="row">
    <input type="submit" value="Submit">
  </div>
</table>
</div>
</body>
</html>
