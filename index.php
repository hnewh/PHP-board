<?php 
session_start();
include("connect.php");
include("header.php");
include("news.php");

if($login)
	include("loginyes.php");
else
	include("loginno.php");
?>
</div>