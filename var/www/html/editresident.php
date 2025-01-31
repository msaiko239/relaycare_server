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
</head>
<body>
<?php
$_POST[name];
$_POST[room];
$_POST[bed];
$_POST[pnumber];
?>
<h2>Add Resident</h2>
<div class="container">
  <form method="post" action="action_page.php">
  <div class="row">
    <div class="col-25">
      <label for="name">Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="name" name="name" placeholder="Resident Name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="room">Room</label>
    </div>
    <div class="col-75">
      <input type="text" id="room" name="room" placeholder="Resident Room #..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="bed">Bed</label>
    </div>
    <div class="col-75">
      <input type="text" id="bed" name="bed" placeholder="Resident Bed #..">
    </div>
  </div>
    <div class="row">
    <div class="col-25">
      <label for="pnumber">Phone Number</label>
    </div>
    <div class="col-75">
      <input type="text" id="pnumber" name="pnumber" placeholder="Resident Phone #..">
    </div>
  </div>
<div class"row">
<?php

$link = mysqli_connect("localhost","inov","1novSQL!","inovonics");

$sql = "SELECT title FROM groups;";

$result = mysqli_query($link,$sql);
if ($result != 0) {
    echo '<div class="col-25"><label>Group</div>';
    echo '<div class="col-75"><select class="col-75" name="city">';
    echo '<option value="">default</option>';

    $num_results = mysqli_num_rows($result);
    for ($i=0;$i<$num_results;$i++) {
        $row = mysqli_fetch_array($result);
        $name = $row['title'];
        echo '<option value="' .$name. '">' .$name. '</option>';
    }

    echo '</select></div>';
    echo '</label>';
}

mysqli_close($link);

?>
</div>
  <div class="row">
    <input type="submit" value="Submit">

  </div>
  </form>
</div>
</body>
</html>
