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
if($_FLIE['img'])
{
	$file_target = $dir . basename($_FILES['img']['name']);
	$fileType = strtolower(pathinfo($file_target, PATHINFO_EXTENSION));

	//img check
	if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "gif")
	{
		echo "<script>alert('지원하지 않는 파일 형식입니다');";
		echo "location.href = 'write.php'</script>";
	}
	//move directory
	if(!move_uploaded_file($_FILES['img']['tmp_name'], $file_target))
	{
		echo "<script>alert('Error');";
		echo "location.href = 'write.php'</script>";
	}
	$file = $_FILES['img']['name'];
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