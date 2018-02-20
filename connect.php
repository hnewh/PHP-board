<?php 
//DB connect
$conn = new mysqli('localhost', 'root', '1234');

//connection check
if($conn -> connect_error)
	die('DB connection failed' . $conn -> connect_error);
echo "<script>console.log('Connect successfully');</script>";
?>