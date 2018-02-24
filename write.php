<?php 
include("connect.php");
include("header.php");
?>

<article>
	<form action="writeok.php" method="POST">
		<div class="form-group"> 
			<label for="title">제목</label>
			<input type="text" name="title" id="title" class="form-control" required>
		</div> 

		<div class="form-group"> 
			<label for="writer">작성자</label> 
			<input type="text" name="writer" id="writer" class="form-control" required>
		</div>

		<div class="form-group"> 
			<label for="email">email</label> 
			<input type="email" name="email" id="email" class="form-control" required>
		</div>

		<div class="form-group"> 
			<label for="category">카테고리</label> 
			<input type="text" name="category" id="category" class="form-control" required>
		</div>

		<div class="form-group"> 
			<label for="content">본문</label> 
			<textarea name="content" id="content" rows="5" class="form-control" required></textarea> 
		</div> 

		<div class="form-group"> 
			<label for="upfile">첨부파일</label> 
			<input type="file" name="upfile" id="upfile" class="form-control"> 
		</div> 

		<button type="submit" class="btn btn-primary">등록</button>
	</form> 
</article>

<script>
	var btn = document.getElementById('btn');
	btn.innerHTML="<span class='glyphicon glyphicon-home'></span> 홈";
	btn.setAttribute("href", "index.php");
</script>