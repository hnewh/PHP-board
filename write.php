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
			<label for="writer">글쓴이</label> 
			<input type="text" name="writer" id="writer" class="form-control" required>
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