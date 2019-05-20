<?php
$ini_array = parse_ini_file("network.ini", true);
foreach($ini_array as $key=>$value);
$ipadd = ($value['IPAddress']);
$subnet = ($value['Subnet Mask']);
$defgw = ($value['Default Gateway']);
$dnssrv = ($value['DNS Servers']);

$_POST[ans];

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
	address $ipadd
	netmask $subnet
	gateway $defgw
	dns-nameservers $dnssrv
EOL;
}
$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/network/myText.txt","wb");

fwrite($fp,$content);
//fclose($fp);copy('network/myText.txt', '/etc/network/interfaces');
//exec('sudo /etc/init.d/networking restart');
?>
