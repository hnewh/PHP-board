<?php include("connect.php") ?>
<?php
if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 1;
$offset = ($page - 1) * 5;

$sql = "SELECT n.title, n.category_idx, n.name, n.date, n.content, n.hit FROM news AS n ";
$sql .= "JOIN users AS u ON u.idx = n.user_idx ";
$sql .= "JOIN category AS c ON c.idx = n.category_idx ";
$sql .= "LEFT JOIN comment AS cm ON cm.news_idx = n.idx ";
$sql .= "ORDER BY n.idx DESC ";
$sql .= "LIMIT 5 OFFSET $offset";
$result = $conn -> query($sql);
?>
<div class="main">
	<table class="table ">
		<tr>
			<th></th>
			<th>제목</th>
			<th>카테고리</th>
			<th>작성자</th>
			<th>작성일</th>
			<th>본문</th>
			<th>댓글수</th>
		</tr>
		<?php		
		while($row = mysqli_fetch_array($result))
		{
			echo "<td>" . $row[0] ."</td>";
		}
		?>
	</table>
</div>