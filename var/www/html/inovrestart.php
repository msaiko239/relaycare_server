<?php
shell_exec('sudo systemctl restart inovonics.service');
header("Location: /status.php");
?>
