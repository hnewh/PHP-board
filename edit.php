<?php
session_start();
include("connect.php");
include("header.php");

$idx = $_POST['idx'];
$sql = "SELECT news.title, news.category_idx, news.content, news.file, news.idx FROM news WHERE news.idx = '$idx' ";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result))
{
	$title = $row[0];
	$category = $row[1];
	$content = $row[2];
	$file = $row[3];
	$idx = $row[4];
}
?>

<article>
	<form action="editok.php" method="POST" enctype="multipart/form-data">
		<div class="form-group"> 
			<label for="title">제목</label>
			<?php 
			echo "<input type='text' name='title' id='title' class='form-control' required value='" . $title ."'>";
			?>
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
				<?php 
				for($i = 1; $i <= 5; $i++)
				{
					if($i == $category)
					{
						echo "<option value='" . $i . "' selected>" . $i . "</option>";
						continue;
					}
					echo "<option value='" . $i . "'>" . $i . "</option>";
				}
				?>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
			</select>
		</div>

		<div class="form-group"> 
			<label for="content">본문</label> 
			<?php
			echo "<textarea name='content' id='content' rows='5' class='form-control' required>" . $content ."</textarea>";
			?>
			
		</div> 

		<div class="form-group"> 
			<label for="img">이미지</label> 
			<input type="file" name="img" id="img" class="form-control"> 
		</div> 

		<?php
		echo "<input name='idx' id='idx' style='display: none;' value='" . $idx . "'>";
		?>
		<button type="submit" class="btn btn-warning">수정</button>
	</form> 
</article>