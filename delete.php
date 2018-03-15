<?php 
session_start();
include("connect.php");

//delete data
$idx = $_POST['idx'];
$sql = "DELETE FROM news WHERE news.idx = '$idx'";
$result = $conn->query($sql);

if($result)
	echo "<script>window.location.href='index.php'</script>";
?>