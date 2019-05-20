<?php
session_start();
$output1 = $_SESSION[resident];
$dev = filter_input(INPUT_GET, 'link');
$servername = "localhost";
$username = "inov";
$password = "1novSQL!";
$dbname = "inovonics";

$con=mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql = "DELETE FROM users where username like '$dev';";
echo $dev;
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
        printf("%s\n",$row[0]);
        }
      // Free result set
      mysqli_free_result($result);
      }
    }
  while (mysqli_next_result($con));
}

mysqli_close($con);
header('Location: /users.php');
?>
