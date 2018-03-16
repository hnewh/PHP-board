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
			<!-- search -->
			<form method="GET">
				<input type="text" name="search" id="search" required>
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span> 검색</button>
			</form>
		</div>

<script>
	$('.btn-success').on("click", function(event){
		window.location.href = 'index.php';
	});
</script>