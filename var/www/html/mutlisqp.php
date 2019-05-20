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
        echo "<pre>$row[0]\n $row[1]\n $row[2]</pre>";
//        printf("<pre>"%s\n %s\n %s\n",$row[0], $row[1], $row[2]</pre>");
        }
      // Free result set
      mysqli_free_result($result);
      }
    }
  while (mysqli_next_result($con));
}

mysqli_close($con);
?>
