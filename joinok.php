<?php
include("connect.php");

$username = "";
$usermail = "";
$userpw = "";

if( isset($_POST['username']) )
 $username = $_POST['username'];
if( isset($_POST['usermail']) )
 $usermail = $_POST['usermail'];
if( isset($_POST['userpw']) )
 $userpw = $_POST['userpw'];

if( $username && $usermail && $userpw ) 
{
	$sql = "INSERT INTO users VALUES";
	$sql .= "('$_POST[username]', ";
	$sql .= "'$_POST[usermail]', ";
	$sql .= "'$_POST[userpw]')";
}

header("Location: /");