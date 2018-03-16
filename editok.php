<?php
session_start();
include("connect.php");

$idx = $_POST['idx'];
$title = $_POST['title'];
$category = $_POST['category'];
$content = $_POST['content'];

$sql = "UPDATE news SET title = '$title', category_idx = '$category', content = '$content' WHERE news.idx = '$idx'";
$result = $conn -> query($sql);

if($result)
	echo "<script>window.location.href='index.php'</script>";
?>