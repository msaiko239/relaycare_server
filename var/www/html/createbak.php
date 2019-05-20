<?php
define("BACKUP_PATH", "/var/backups/inovonics/");

$server_name   = "localhost";
$username      = "root";
$password      = "Boofay12!";
$database_name = "inovonics";
$date_string   = date("Ymd_his");

$cmd = "mysqldump --routines -h {$server_name} -u {$username} -p{$password} {$database_name} > " . BACKUP_PATH . "{$date_string}_backup.sql";

exec($cmd);
header('Location: /backups.php');
?>

