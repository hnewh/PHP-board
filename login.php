<?php
include("connect.php");

$userid = "";
$userpw = "";
if( isset($_POST['userid']) )
	$userid = $_POST['userid'];
if( isset($_POST['userpw']) )
	$userpw = $_POST['userpw'];

if( $userid && $userpw )
{
	$sql = "SELECT * FROM users ";
	$sql .= "WHERE userid='{$userid}' ";
	$sql .= "and userpw=password('{$userpw}')";

	if( $rs = $db->query($sql) )
	{
  		if( $user = $rs->fetch() ) 
  		{
			$_SESSION['loginname'] = $user['username'];
			$_SESSION['loginid'] = $user['userid'];
		}
 	}
}

header("Location: /");