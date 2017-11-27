<div id="login-box">
<form action="./?page=alogin" method="post">
  <div class="form-group">
    <input type="text" name="mid" class="form-control" id="member_id" />
  </div>
  <div class="form-group">
    <input type="password" name="pwd" class="form-control" value="123456" />
  </div>
  <div class="form-group">
    <input type="submit" class="form-control btn-primary" value="Login" />
  </div>
</form>
</div>
<?php
echo "
<script>
  var mid = localStorage.getItem('idvst');
  document.getElementById('member_id').value = mid;
</script>
";
?>
