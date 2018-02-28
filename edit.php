<?php
session_start();
include("connect.php");
include("header.php");

$sql = "SELECT news.title, news.category_idx, news.content, news.file FROM news WHERE news.user_idx = users.idx";
$sql .= "JOIN users ON users.idx = news.user_idx ";
$sql .= "JOIN category ON category.idx = news.category_idx ";
$sql .= "GROUP BY news.idx ";
$sql .= "ORDER BY news.idx DESC";
$result = mysqli_query($conn, $sql);
echo $sql;

while($row = mysqli_fetch_array($result))
{
	echo $row['title'] . "<br><br>";
	echo $row['category_idx'] . "<br><br>";
	echo $row['content'] . "<br><br>";
}
?>

<article>
	<form action="writeok.php" method="POST" enctype="multipart/form-data">
		<div class="form-group"> 
			<label for="title">제목</label>
			<input type="text" name="title" id="title" class="form-control" required>
		</div> 

		<div class="form-group"> 
			<label for="writer">작성자</label> 
			<?php 
				echo "<input type='text' class='form-control' value='" . $_SESSION['loginname'] ."' disabled>";
			?>
		</div>

		<div class="form-group"> 
			<label for="email">email</label> 
			<?php 
				echo "<input type='text' class='form-control' value='" . $_SESSION['loginid'] ."' disabled>";
			?>
		</div>

		<div class="form-group"> 
			<label for="category">카테고리</label> 
			<select name="category" id="category" class="form-control">
				<option value="1">category1</option>
				<option value="2">category2</option>
				<option value="3">category3</option>
				<option value="4">category4</option>
				<option value="5">category5</option>
			</select>
		</div>

		<div class="form-group"> 
			<label for="content">본문</label> 
			<textarea name="content" id="content" rows="5" class="form-control" required></textarea> 
		</div> 

		<div class="form-group"> 
			<label for="img">이미지</label> 
			<input type="file" name="img" id="img" class="form-control"> 
		</div> 

		<button type="submit" class="btn btn-warning">수정</button>
	</form> 
</article>