<?php
require("./lib/class.member.inc.php");
$data = new member();

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

  $member = $data->update('member',$sets,$post,$keys);
  redirPage('Update member');
}

if($_GET['mod']=='pay'){
  $sets = ('kd_transaksi,jumlah,methode,bank,nomor_rekening');
  $post = array($_POST['kd_transaksi'],$_POST['jumlah'],$_POST['methode'],
                $_POST['bank'],$_POST['rekening']);
  # $_POST['password'],
  // cari member id menggunakan kode transaksi;
  $mid = $data->pickup1('id_member','transaksi','kd_transaksi',array($_POST['kd_transaksi']));

  // validasi mid dengan password
  $key = md5($mid['id_member']."_".$_POST['password']);
  $vld = $data->pickup1('count(*) data','member','password_member',array($key));

  if($vld['data'] == 0){
    echo "
    <script>
      alert('Maaf, Tidak ditemukan data transaksi ".$_POST['kd_transaksi']."');
      window.location='./';
    </script> ";
  }else{
    $member = $data->insert('pembayaran',$sets,$post);
    echo "
    <script>
    alert('Terima kasih telah melakukan pembayaran');
    window.location='./';
    </script>
    ";
  }
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
