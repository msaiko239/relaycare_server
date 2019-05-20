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
<script type="text/javascript">
function doSomething() {
    $.get("setnettest.php");
    return false;
}
</script>
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
<?php 

//put the file path here
$filepath = 'network.ini';

//after the form submit

if($_POST){
    $data = $_POST;
    //update ini file, call function
    update_ini_file($data, $filepath);
}

//this is the function going to update your ini file
    function update_ini_file($data, $filepath) { 
        $content = ""; 
        
        //parse the ini file to get the sections
        //parse the ini file using default parse_ini_file() PHP function
        $parsed_ini = parse_ini_file($filepath, true);
        
        foreach($data as $section=>$values){
            //append the section 
            $content .= "[".$section."]\n"; 
            //append the values
            foreach($values as $key=>$value){
                $content .= $key."=".$value."\n"; 
            }
        }
        
        //write it into file
        if (!$handle = fopen($filepath, 'w')) { 
            return false; 
        }

        $success = fwrite($handle, $content);
        fclose($handle); 

        return $success; 
    }
 echo '<table align="center">';
 
$output2 = shell_exec('cat /etc/network/interfaces');
$needle2 = "dhcp";
if (strpos($output2, $needle2) !==false) {
  echo '  <tr><td>DHCP <input type="radio" name="ans" value="dhcp" checked/></td>';
  echo '<td>Static <input type="radio" name="ans" value="stic"  /><br /></td></tr>';
} else {
  echo '  <tr><td>DHCP <input type="radio" name="ans" value="dhcp" checked/></td>';
  echo '<td>Static <input type="radio" name="ans" value="stic"  checked/><br /></td></tr>';
echo '</table>';
}
//parse the ini file using default parse_ini_file() PHP function
$parsed_ini = parse_ini_file($filepath, true);

echo '<div style="width:40%" class="container" align="center">';
//echo '<form method="post" align="center" action="setnettest.php">';
echo '<form method="post" align="center">';
echo '<table align="center">';
    
    foreach($parsed_ini as $section=>$values){
//        echo "<tr><td colspan='2'><h3>'Network Settings'</h3></td></tr>";
        //keep the section as hidden text so we can update once the form submitted
        echo "<input type='hidden' value='$section' name='$section' />";
        //print all other values as input fields, so can edit. 
        //note the name='' attribute it has both section and key
        foreach($values as $key=>$value){
            echo "<tr><td>".$key.": </td><td><input type='text' name='{$section}[$key]' value='$value' />"."</td></tr>";
        }
//        echo "<br>";
    }
   echo ' <tr><td colspan="2"><input type="submit" value="Update INI" onclick="doSomething();"/></td></tr>';
echo '</table></form>';

?>
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
