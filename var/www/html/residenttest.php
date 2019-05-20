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
.resident {
  margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;
  background: white;
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
                text-align:left;
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
<body>
<div class="container">
<?php
$output = filter_input(INPUT_GET, 'link');
//echo $output;
$con=mysqli_connect("localhost","inov","1novSQL!","inovonics");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql = "select * from accounts where name like '$output';";
$sql .= "select type, serial from dev_type where name like '$output';";

// Execute multi query
if (mysqli_multi_query($con,$sql))
{
  do
    {
    // Store first result set
    if ($result=mysqli_store_result($con)) {
      // Fetch one and one row
      while ($row=mysqli_fetch_row($result))
        {
        echo "<table style='width:30%' align='center'";
        echo "<h1><tr><td>" .$row[0]. " ".$row[1]." ".$row[2]."</td></tr></h1>";
        }
      // Free result set
      mysqli_free_result($result);
      }
    }
  while (mysqli_next_result($con));
}

mysqli_close($con);
?>
</div>
</body>
</html>
