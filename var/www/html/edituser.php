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
<html>
<head>
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
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 60%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=password], select, textarea {
  width: 60%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 15%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
<script>
</script>
</head>
<body>
<?php
session_start();
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
$sql = "select * from users where username like '$output'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $room = $row["fname"];
    $bed = $row["lname"];
    $phone = $row["extnum"];
    $grp = $row["grp"];
    $id = $row["id"];
    $pass = $row["password"];
    $_SESSION[id] = $id;
    $_SESSION[grp] = $grp;
  }
}
?>
<h2>Edit User</h2>
<div class="container">
  <form method="post" action="edit_user.php">
  <div class="row">
    <div class="col-25">
      <label for="name">Username</label>
    </div>
    <div class="col-75">
      <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($output); ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="name">Password</label>
    </div>
    <div class="col-75">
      <input type="password" id="pass" name="pass" value="<?php echo htmlspecialchars($pass); ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="room">First Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="room" name="room" value="<?php echo htmlspecialchars($room); ?>">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="bed">Last Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="bed" name="bed" value="<?php echo htmlspecialchars($bed); ?>">
    </div>
  </div>
    <div class="row">
    <div class="col-25">
      <label for="pnumber">Extension Number</label>
    </div>
    <div class="col-75">
      <input type="text" id="pnumber" name="pnumber" value="<?php echo htmlspecialchars($phone); ?>">
    </div>
  </div>
<div class"row">
<div class="col-25"><label>Group</label></div>
<div class="col-75"><select class="col-75" name="grp1">
<?php

$link = mysqli_connect("localhost","inov","1novSQL!","inovonics");

$sql = "SELECT title FROM groups;";

$result = mysqli_query($link,$sql);
if ($result != 0) {
    echo '<option value="'.$_SESSION[grp].'">'.$_SESSION[grp].'</option>';

    $num_results = mysqli_num_rows($result);
    for ($i=0;$i<$num_results;$i++) {
        $row = mysqli_fetch_array($result);
        $name = $row['title'];
        echo '<option value="' .$name. '">' .$name. '</option>';
    }
}

mysqli_close($link);
$_POST[name];
$_POST[room];
$_POST[bed];
$_POST[pnumber];
$_POST[grp1];
$_POST[pass];
?>
 </select></div>
</div>
  <div class="row">
    <input type="submit" value="Submit">

  </div>
  </form>
</div>
</body>
</html>
