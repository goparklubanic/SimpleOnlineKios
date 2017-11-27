<?php
require("../lib/class.crud.inc.php");
$data = new dbcrud();
if($_GET['obj'] == 'barang'){
  $data->delete('barang','kd_barang',$_GET['id']);
  echo "
  <center>
  Data barang telah dihapus;
  </center>
  ";
  $rege = "./?page=barang";
}

if($_GET['obj'] == 'member'){
  $data->delete('member','id_member',$_GET['id']);
  echo "
  <center>
  Data member telah dihapus;
  </center>
  ";
  $rege = "./?page=member";
}

if($_GET['obj'] == 'pegawai'){
  $data->delete('pegawai','id_pegawai',$_GET['id']);
  echo "
  <center>
  Data pegawai telah dihapus;
  </center>
  ";
  $rege = "./?page=member";
}

?>
<hr />
<center>
<a href="<?php echo $rege; ?>" >Kembali</a>
</center>
