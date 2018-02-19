<?php include("connect.php") ?>
<!DOCTYPE html>
<html>
<head>
	<title>게시판</title>
	<meta charset="utf-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="wrap">
		<div class="jumbotron text-center">
			<h1>게시판</h1>
			<a href="write.php" id="btn" class="btn btn-primary">
				<span class="glyphicon glyphicon-pencil"></span> 글쓰기
			</a>
		</div>
