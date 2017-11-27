<?php
// check active transaction
$at = $member->pickup2('count(status) status ','transaksi',"status='Aktif' && kd_transaksi='".$_SESSION['kd_transaksi']."'");
if($at[0][status] >= 1){
  // hapus transaksi , dianggap Batal
  $deltrx = $member->delete('transaksi','kd_transaksi',$_SESSION['kd_trnsxi']);
  $delbrg = $member->delete('barangTransaksi','kd_transaksi',$_SESSION['kd_trnsxi']);
}

session_destroy();
session_unset();

?>
<div id='login-box'>
  Terima kasih kunjunganya.
  <a class='btn btn-default' href='./'>OK</a>
</div>
