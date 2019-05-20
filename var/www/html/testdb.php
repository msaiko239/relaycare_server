<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
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
<script>
$('tr').click( function() {
    window.location = $(this).find('a').attr('href');
}).hover( function() {
    $(this).toggleClass('hover');
});
</script>
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

$sql = "INSERT INTO devices (serial, state, lastUpdated) VALUES ('11298293', 1, now()) ON DUPLICATE KEY UPDATE state=1;";
$sql .= "insert into dev_type (type, serial, name) values ('pendant', '12312399', 'John Snow');";

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
        echo "<h1><tr><td>" .$row[0]. " ".$row[1]." ".$row[2]."</td></tr></h1></table>";
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
<div class="w3-container center" align='center'>
<p>
  <button onclick="window.location.href='/adddevice.php?link=<?php echo htmlspecialchars($output); ?>'" class="w3-button w3-whi$
</p>
</div>
//<a href="#" class="button">Add Device</a>
</div>
</body>
</html>
