<?php 
session_start();
include("connect.php");
include("header.php");
include("board.php");

if($login)
	include("loginyes.php");
else
	include("loginno.php");

include("category.php");
?>
</div>