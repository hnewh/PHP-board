<?php include("connect.php") ?>
<div class="well">
	<form method="POST" action="login.php">
		이메일 <input type="text" name="id" required class="form-control"> <br>
		비밀번호 <input type="password" name="password" required class="form-control"> <br>
		<button class="btn btn-success form-control" type="submit">로그인</button> <br><br>

		<a href="join.php" class="btn btn-primary form-control">회원가입</a>
	</form>
</div>