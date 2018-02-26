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

//email overlap
$sql = "SELECT * FROM test.users WHERE email = '$usermail'";
if($conn -> query($sql) == true)
{
	echo "<script>alert('중복되는 이메일입니다');";
	echo "location.href = 'join.php'</script>";
}

//add data
if( $username && $usermail && $userpw ) 
{
	$sql = "INSERT INTO test.users (name, email, password) VALUES ";
	$sql .= "('" . $username . "', '";
	$sql .= $usermail . "', '";
	$sql .= $userpw . "')";
}

if($conn -> query($sql) == true)
{
	echo "<script>console.log('New record created');</script>";
	header('Location: /');
}
else
	echo "Failed to create new record";