<?php
session_start();
include("connect.php");
include("header.php");

if($login)
	include("loginyes.php");
else
	include("loginno.php");
?>