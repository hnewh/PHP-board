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
$sql = "SELECT * FROM user WHERE email LIKE '$usermail'";
$result = mysqli_query($conn, $sql);

if($result)
	echo "중복되는 이메일입니다";

//add data
if( $username && $usermail && $userpw ) 
{
	$sql = "INSERT INTO test.users (name, email, password) VALUES ";
	$sql .= "('" . $username . "', '";
	$sql .= $usermail . "', '";
	$sql .= $userpw . "')";
}

if($conn -> query($sql) == true)
	echo "<script>console.log('New record created');</script>";
else
	echo "Error " . " : " . $conn -> error;

//back to index
header('Location: /');