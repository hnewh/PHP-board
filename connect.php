<?php
//DB connect
$conn = new mysqli('localhost', 'root', '1234', 'test');

//connection check
if($conn -> connect_error)
	die('DB connection failed' . $conn -> connect_error);

//login session
$login = false;
$loginid = "";
$loginname = "";
$loginidx = "";

if(isset($_SESSION['loginid']))
	$loginid = $_SESSION['loginid'];
if(isset($_SESSION['loginname']))
	$loginname = $_SESSION['loginname'];
if(isset($_SESSION['loginidx']))
	$loginidx = $_SESSION['loginidx'];

if($loginid && $loginname)
	$login = true;
?>