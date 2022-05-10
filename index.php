<?php

session_start();

$ip = $_SERVER['REMOTE_ADDR'];

$hash = md5($ip);

$_SESSION['auth'] = true;

//LOGS VISITORS
$file = fopen('logs/visitors.txt', 'a');
fwrite($file, $_SERVER['REMOTE_ADDR'] . " DATE " . date("d M Y h:i:s") . "\n");
fclose($file);

header("Location: user.php?&sessionid=$hash&securessl=true");
die();

?>
