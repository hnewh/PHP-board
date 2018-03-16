<?php
session_start();
include("connect.php");
include("header.php");

if($login)
	include("loginyes.php");
else
	include("loginno.php");

//news data
$idx = $_POST['idx'];
$sql = "SELECT n.title, n.content, n.category_idx, n.name, n.date, n.hit, n.idx FROM news AS n WHERE n.idx = '$idx' ";
$result = $conn -> query($sql);
?>


<div class="main">
	<?php
	while($row = mysqli_fetch_array($result))
	{
		echo "<span style='font-size : 50px;'>" . $row[0] ."</span>";
		echo "<span>&nbsp; &nbsp;</span>";
		echo "<span style='font-size : 15px;'>작성자 : " . $row[3] . "</span>";
		echo " <span style='font-size : 15px;'>카테고리 : " . $row[2] . "</span>";
		echo " <span style='font-size : 15px;'>작성일 : " . $row[4] . "</span>";
		echo " <span style='font-size : 15px;'>댓글수 : " . $row[5] . "</span>";
		echo "<hr>";

		if($login && ($_SESSION['loginname'] == $row[3]))
		{
			
			echo "<form method='POST' action='delete.php' class='pull-right'>";
			echo "<input type='text' name='idx' id='idx' style='display: none;' value='" . $row[6] . "'></input>";
			echo "<button type='submit' class='btn btn-danger'>삭제</button></td>";
			echo "</form>";
			echo "<form method='POST' action='edit.php'>";
			echo "<input type='text' name='idx' id='idx' style='display: none;' value='" . $row[6] . "'></input>";
			echo "<button type='submit' class='btn btn-warning'>수정</button>";
			echo "</form> ";
		}
		echo "<p style='font-size : 20px;'>" . $row[1] . "</p>";
	}
	?>
</div>
<script>
	$('.btn-danger').on("click", function(event){
		var check = confirm("정말로 삭제하시겠습니까?");
		if(!check)
			event.preventDefault();
	});
</script>