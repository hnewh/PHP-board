<?php include("header.php"); ?>
<article>
  <h2>회원가입</h2>
  <form action="joinok.php" method="POST" onsubmit="return check();"s>
    <div class="form-group">
      <input type="text" name="username" id="username" required class="form-control" placeholder="이름">
    </div>

    <div class="form-group">
      <input type="email" name="usermail" id="usermail" required class="form-control" placeholder="이메일">
    </div>

    <div class="form-group">
      <input type="password" name="userpw" id="userpw" required class="form-control" placeholder="비밀번호">
    </div>

    <div class="form-group">
      <input type="password" name="userpw2" id="userpw2" required class="form-control" placeholder="비밀번호 확인">
    </div>
  
    <button type="submit" class="btn btn-primary">가입</button>
 </form>
</article>

<script>
function check() 
{
  var username = $("#username").val();
  var usermail = $("#usermail").val();
  var userpw = $("#userpw").val();
  var userpw2 = $("#userpw2").val();

  //value check
  if( ! username || ! userid || ! userpw || ! userpw2 ) 
  {
   alert("필수항목이 빠졌습니다.");
   return false;
  }
  //password check
  if( userpw != userpw2 ) 
  {
   alert("비밀번호가 다릅니다.");
   return false;
  }
}
</script>
