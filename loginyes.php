<?php
include("connect.php");
?>
<div class="well">
	<form method="POST" action="login.php">
		<label class="form-control-static">이름</label>
			<?php echo $_SESSION['loginname']; ?> <br>
		<label class="form-control-static">email</label> 
			<?php echo $_SESSION['loginid'] ?> <br> <br>

		<a href="write.php" class="btn btn-success form-control">
			<span class="glyphicon glyphicon-pencil"></span> 글쓰기
		</a><br><br>
		<a href="logout.php" class="btn btn-primary form-control">로그아웃</a>
	</form>
</div>