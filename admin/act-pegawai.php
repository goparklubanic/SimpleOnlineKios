<?php
require("../lib/class.pegawai.inc.php");
$data = new pegawai();

if($_GET['mod'] == 'new'){
  $password = md5($_POST['id_pegawai'].'_'.$_POST['password_pegawai']);
  $sets = 'nama_pegawai,password_pegawai,id_pegawai';
  $post = array($_POST['nama_pegawai'],$password,$_POST['id_pegawai']);
  $member = $data -> insert('pegawai',$sets,$post);
  redirPage('Penambahan pegawai');
}

if($_GET['mod'] == 'chg'){
  $password = md5($_POST['id_pegawai'].'_'.$_POST['password_pegawai']);
  $sets = 'nama_pegawai,password_pegawai';
  $post = array($_POST['nama_pegawai'],$password,$_POST['id_pegawai']);
  $keys = 'id_pegawai';

  // $member = $data->update('pegawai',$sets,$post,$keys);
  $member = $data->updatePegawai($sets,$post,$keys);
  redirPage('Update pegawai');
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
