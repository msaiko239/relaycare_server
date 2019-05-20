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
</style>
<script>
$('tr').click( function() {
    window.location = $(this).find('a').attr('href');
}).hover( function() {
    $(this).toggleClass('hover');
});
</script>
</head>
<?php error_reporting(-1); ?>
<?php ini_set('display_errors', true); ?>
<body>
<div class="container">
<table style='width:80%' align='center'>
<h1><tr class='resident'><td colspan="4">Log</td></tr></h1>
<h2><tr class='resident'><td><a href='/accounts.php'>Residents</a></td><td><a href='/display.php'>Active Alerts</a></td><td><a href='/reports.php'>Reports</a></td><td><a href='/settings.php'>System Settings</a></td></tr></h2>
<h3><tr class='resident'><td><a href='/status.php'>System Status</a></td><td><a href='/log.php'>Log File</a></td><td><a href='/dontknow.php'>Dont Know</a></td><td><a href='/index.html'>Home</a></td></tr></h3>
</table>
</div>

<br></br>
<div style="width:40%" class="container" align="center">
<form action="result.php" method="post" align="center">
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
?>
  <tr><td><br></br></td></tr>
  <tr><td>IP Address  </td><td><input type="text" name="ipaddr" value="<?php echo $_SERVER['SERVER_ADDR']; ?>"/><br /></td></tr>
  <tr><td>Subnet Mask </td><td><input type="text" name="sbnmsk" /><br /></td></tr>
  <tr><td>Default Gateway  </td><td><input type="text" name="defgw" /><br /></td></tr>
  <tr><td>DNS Servers </td><td><input type="text" name="dsnsrv" /><br /></td></tr>
  <tr><td></td></tr>
  <tr><td colspan="2"><input type="submit" value="submit" /></td></tr>
 </table>
</form>
</div>
<?php
echo readfile("/etc/network/interfaces");
?>
</body>
</html>
