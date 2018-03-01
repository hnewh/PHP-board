<?php
session_start();
include('connect.php');

$title = "";
$category = "";
$content = "";

if(isset($_POST['title']))
	$title = $_POST['title'];
if(isset($_POST['category']))
	$category = $_POST['category'];
if(isset($_POST['content']))
{
	$content = $_POST['content'];
	$content = strip_tags($content);
}

//file upload
$file = "";
$dir = "./uploads/";
if($_FILES['img'])
{
	if(is_uploaded_file($_FILES['img']['tmp_name']))
	{
		$upfile = basename($_FILES['img']['name']);
		$target = $dir . $upfile;

		if(move_uploaded_file($_FILES['img']['tmp_name'], $target))
			$file = $upfile;
	}
}

//add data
if($title && $category && $content)
{
	$sql = "INSERT INTO test.news (name, email, title, content, file, hit, status, user_idx, category_idx) VALUES ";
	$sql .= "('$loginname', '$loginid', '$title', '$content', '$file', '0', '1', '$loginidx', '$category')";
}

if($conn -> query($sql) == true)
{
	echo "<script>console.log('New record created');</script>";
	header('Location: /');
}
else
	echo "Failed to create new record" . $sql;
?>