<?php 
$db=new mysqli('localhost', 'root', '1234', 'test');

if($db->connect_error)
	die("Couldn't connect: " . mysql_error());
?>