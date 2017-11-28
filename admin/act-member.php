<?php
require("../lib/class.pegawai.inc.php");
$data = new pegawai();

if($_GET['mod'] == 'new'){
  $password = md5($_POST['id_member'].'_'.$_POST['password_member']);
  $sets = 'password_member,nama_member,alamat,no_telp,id_member';
  $post = array($password,$_POST['nama_member'],$_POST['alamat'],
                $_POST['no_telp'],$_POST['id_member']);
  $member = $data -> insert('member',$sets,$post);
  redirPage('Penambahan member');
}

if($_GET['mod'] == 'chg'){
  $password = md5($_POST['id_member'].'_'.$_POST['password_member']);
  $sets = 'password_member,nama_member,alamat,no_telp';
  $post = array($password,$_POST['nama_member'],$_POST['alamat'],
                $_POST['no_telp'],$_POST['id_member']);
  $keys = 'id_member';

  //$member = $data->update('member',$sets,$post,$keys);
  $member = $data->updateMember($sets,$post,$keys);
  redirPage('Update member');
}

function redirPage($message){
  echo "
  <script>
  alert('".$message." berhasil !');
  history.go(-2);
  </script>
  ";
}
?>
