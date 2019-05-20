<?php 
$ini_array = parse_ini_file("network.ini", true);
foreach($ini_array as $key=>$value);
$var1 = ($value['IPAddress']);
echo $var1;
echo ($value['IPAddress']) . " ";
echo ($value['Subnet Mask']) . " ";
echo ($value['Default Gateway']) . " ";
echo ($value['DNS Servers']) . " ";
?>

