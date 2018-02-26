<?php
//DB connect
$conn = new mysqli('localhost', 'root', '1234', 'test');

//connection check
if($conn -> connect_error)
	die('DB connection failed' . $conn -> connect_error);

$login = false;
$loginid = "";
$loginname = "";

if(isset($_SESSION['loginid']))
	$loginid = $_SESSION['loginid'];
if(isset($_SESSION['loginname']))
	$loginname = $_SESSION['loginname'];

if($loginid && $loginname)
	$login = true;
?>