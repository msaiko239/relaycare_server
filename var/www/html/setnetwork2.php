<?php
$_POST[ans];
$_POST[ipaddr];
$_POST[sbnmsk];
$_POST[defgw];
$_POST[dnssrv];

$answer = $_POST[ans];
if ($answer == "dhcp") {
$content = <<<EOL
# This file describes the network interfaces available on your system
# and how to activate them. For more information, see interfaces(5).

source /etc/network/interfaces.d/*

# The loopback network interface
auto lo
iface lo inet loopback

# The primary network interface
auto eno1
iface eno1 inet dhcp
EOL;
}
else {

$content = <<<EOL
# This file describes the network interfaces available on your system
# and how to activate them. For more information, see interfaces(5).

source /etc/network/interfaces.d/*

# The loopback network interface
auto lo
iface lo inet loopback

# The primary network interface
auto eno1
iface eno1 inet static
	address $_POST[ipaddr]
	netmask $_POST[sbnmsk]
	gateway $_POST[defgw]
	dns-nameservers $_POST[dnssrv] 
EOL;
}
$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/network/myText.txt","wb");
$fp2 = fopen($_SERVER['DOCUMENT_ROOT'] . "/network.ini","wb");
$content2 = <<<EOL
[Network_Settings]
IPAddress=$_POST[ipaddr]
Subnet Mask=$_POST[sbnmsk]
Default Gateway=$_POST[defgw]
DNS Servers=$_POST[dnssrv]
EOL;
fwrite($fp,$content);
fwrite($fp2,$content2);
fclose($fp);copy('network/myText.txt', '/etc/network/interfaces');
exec('sudo /etc/init.d/networking restart');
?>
