<?php include("connect.php") ?>
<?php
//count data
$sql = "SELECT COUNT(idx) AS cnt FROM news ";
if(isset($_GET['search']) && $_GET['search'] != "")
{
	$search = $_GET['search'];
	$sql .= "WHERE (title LIKE '%$search%' OR content LIKE '%$search%')";
}
$result = $conn->query($sql);
$total = mysqli_fetch_array($result)['cnt'];
$total_page = ceil($total / 5);

//curent page
if(isset($_GET['page']))
	$page = $_GET['page'];
else
	$page = 1;
$offset = ($page - 1) * 5;

//page button
$block = ceil($page / 5);
$start = ($block - 1) * 5 + 1;
$end = $start + 4;
if($end > $total_page)
	$end = $total_page;

//news data
$sql = "SELECT n.title, n.category_idx, n.name, n.date, n.content, n.hit FROM news AS n ";
$sql .= "JOIN users AS u ON u.idx = n.user_idx ";
$sql .= "JOIN category AS c ON c.idx = n.category_idx ";
$sql .= "LEFT JOIN comment AS cm ON cm.news_idx = n.idx ";
if(isset($_GET['search']) && $_GET['search'] != "" )
{
	$search = $_GET['search'];
	$sql .= "WHERE (n.title LIKE '%$search%' OR n.content LIKE '%$search%')";
}
$sql .= "ORDER BY n.idx DESC ";
$sql .= "LIMIT 5 OFFSET $offset";
$result = $conn -> query($sql);
?>

<div class="main">
	<table class="table">
		<tr>
			<th></th>
			<th>제목</th>
			<th>카테고리</th>
			<th>작성자</th>
			<th>작성일</th>
			<th>본문</th>
			<th>댓글수</th>
			<th></th>
			<th></th>
		</tr>
		<?php		
		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td></td>";
			echo "<td>" . $row[0] ."</td>";
			echo "<td>" . $row[1] . "</td>";
			echo "<td>" . $row[2] . "</td>";
			echo "<td>" . $row[3] . "</td>";
			echo "<td>" . $row[4] . "</td>";
			echo "<td>" . $row[5] . "</td>";
			echo "<td><button class='btn btn-info'>더보기</button></td>";

			if($login && ($_SESSION['loginname'] == $row[2]))
			{
				echo "<td><a href='edit.php' class='btn btn-warning'>수정</a> ";
				echo "<button class='btn btn-danger'>삭제</button></td>";
			}
			echo "</tr>";
		}
		?>
	</table>
	<div class="page text-center">
		<?php
		if($start != $page)
			echo "<a href='?page=" . ($page - 1) . "' class='btn btn-default'><</a>";

		while($start <= $end)
		{
			echo "<a href='?page=" . $start . "' class='btn btn-default'>" . $start . "</a>";
			$start++;
		}

		if($page != $end)
			echo "<a href='?page='" . ($page + 1) . " class='btn btn-default'>></a>";
	?>
	</div>
</div>