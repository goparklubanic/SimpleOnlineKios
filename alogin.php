<?php
//session_start();

$mid  = $_POST['mid'];
$pwd  = $_POST['pwd'];
$key  = md5($mid."_".$pwd);
$derc=$member->login($key,$mid);
if($derc == null){
  $callBack = "Member belum terdaftar.
  <span class='btn btn-default' onClick=history.go(-1)>OK</span>";
}else{
  $_SESSION['member_id'] = $mid;
  $_SESSION['member_fn'] = $derc['nama_member'];
  $callBack = "Login berahasil.
  <a class='btn btn-default' href='./'>OK</a>";
}

echo "
<div id='login-box'>
<center>
".$callBack."
</center>
</div>
";

?>
