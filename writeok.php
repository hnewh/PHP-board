<?php 
include('connect.php');

$name = "";
$email = "";
$title = "";
$content = "";
$file = "";

if(isset($_POST['name']))
	$title = $_POST['name'];
if(isset($_POST['email']))
	$email = $_POST['email'];
if(isset($_POST['title']))
	$title = $_POST['title'];
if(isset($_POST['content']))
	$title = $_POST['content'];

$dir = "./uploads/";
if(is_uploaded_file($_FILES['upfile']['tmp_name']))
{
	$upfile = basename($_FILES['upfile']['name']);
	$target = $dir . $upfile;

	if(move_uploaded_file($_FILES['upfile']['tmp_name'], $target))
		$file = $upfile;
}

$sql = "";
if($title && $content)
{
	$sql .= "INSERT INTO test.news (name, email, title, content, file, date, hit) VALUES";
	$sql .= "('" . $name . "', '";
	$sql .= $email . "', '";
	$sql .= $title . "', '";
	$sql .= $content . "', '";
	$sql .= $file . "', '";
	$sql .= "date = now(), ";
	$sql .= "hit = 0";
}
echo $sql;
// if($conn -> query($sql) == true)
// 	echo "<script>console.log('New Record created')</script>";

?>