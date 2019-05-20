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
  border: 3px solid #73AD21;
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
<a class="logo" style="padding: 1px;" href="/index.php"><img src="/images/rnify.png" width='100' height='50'/></a>
<a href="/index.php">Dashboard</a>
<a href='/accounts.php'>Residents</a>
<a href='/display.php'>Active Alerts</a>
<a href='/reports.php'>Reports</a>
<a href='/groups.php'>Groups</a>
<a href='/users.php'>Users</a>
<a href='/checkin.php'>Device Status</a>
<a class="active" href='/syssettings.php'>System Settings</a>
<a href='/status.php'>System Status</a>
<a href='/logout.php'>Logout</a>
</div>

<br></br>
<div style="width:40%" class="container" align="center">
<form action="setnetwork2.php" method="post" align="center">
 <table align="center">
<?php
$output2 = shell_exec('cat /etc/network/interfaces');
$needle2 = "dhcp";
if (strpos($output2, $needle2) !==false) {
  echo '  <tr><td>DHCP <input type="radio" name="ans" value="dhcp" checked/></td>';
  echo '<td>Static <input type="radio" name="ans" value="stic"  /><br /></td></tr>';
} else {
  echo '  <tr><td>DHCP <input type="radio" name="ans" value="dhcp" checked/></td>';
  echo '<td>Static <input type="radio" name="ans" value="stic"  checked/><br /></td></tr>';
}
$ini_array = parse_ini_file("network.ini", true);
foreach($ini_array as $key=>$value);
$var1 = ($value['IPAddress']);
$var2 = ($value['Subnet Mask']);
$var3 = ($value['Default Gateway']);
$var4 = ($value['DNS Servers']);
?>
  <tr><td><br></br></td></tr>
  <tr><td>Current IP Address: </td><td><?php echo $_SERVER['SERVER_ADDR']; ?></td></tr>
  <tr><td><br></br></td></tr>
  <tr><td>IP Address  </td><td><input type="text" name="ipaddr" id="ipaddr" value="<?php echo $var1; ?>"/><br /></td></tr>
  <tr><td>Subnet Mask </td><td><input type="text" name="sbnmsk" id="sbnmsk" value="<?php echo $var2; ?>"/><br /></td></tr>
  <tr><td>Default Gateway  </td><td><input type="text" name="defgw" id="defgw" value="<?php echo $var3; ?>"/><br /></td></tr>
  <tr><td>DNS Servers </td><td><input type="text" name="dnssrv" id="dnssrv" value="<?php echo $var4; ?>"/><br /></td></tr>
  <tr><td></td></tr>
  <tr><td colspan="2"><input type="submit" value="submit" /></td></tr>
 </table>
</form>
</div>
<?php
$_POST[ipaddr];
$_POST[sbnmsk];
$_POST[defgw];
$_POST[dnssrv];
$_POST[ans];
?>
</body>
</html>
