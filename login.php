<?php
session_start();
include("connect.php");

$userid = "";
$userpw = "";
if(isset($_POST['id']))
	$userid = $_POST['id'];
if(isset($_POST['password']))
	$userpw = $_POST['password'];

//login check
if($userid && $userpw)
{
	$sql = "SELECT * FROM users WHERE email = '$userid' AND password = '$userpw'";
	$result = mysqli_query($conn, $sql);

	if($row = $result->fetch_array(MYSQLI_ASSOC))
	{
		$_SESSION['loginid'] = $row['email'];
		$_SESSION['loginname'] = $row['name'];
		$_SESSION['loginidx'] = $row['idx'];
		header('Location: /');
	}
	else
	{
		echo "<script>alert('일치하는 이메일이 없습니다');";
		echo "location.href = '/'</script>";
	}
}