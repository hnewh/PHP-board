<?php include("connect.php") ?>
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
		</tr>
	</table>
</div>

<?php 
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * 5;

$sql = "SELECT n.idx, n.title, COUNT(cm.idx) AS comment_count, u.name AS user FROM news AS n ";
$sql .= "JOIN users AS u ON u.idx = n.user_idx ";
$sql .= "JOIN category AS c ON c.idx = n.category_idx ";
$sql .= "LEFT JOIN comment AS cm ON cm.news_idx = n.idx ";
$sql .= "GROUP BY n.idx ";
$sql .= "ORDER BY n.idx DESC ";
$sql .= "LIMIT 5 OFFSET $offset";

$result = mysqli_query($conn, $sql);
?>