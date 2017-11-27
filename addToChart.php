<?php
session_start();
require("./lib/class.member.inc.php");
$data = new member();
$ktrx = $data->cekTransaksi($_SESSION['member_id']);
if(!isset($_SESSION['kd_trnsxi'])){
  $_SESSION['kd_trnsxi'] = $ktrx;
}
$sets = 'kd_transaksi,kd_barang,qty';
$post = array($_SESSION['kd_trnsxi'],$_POST['kd_barang'],$_POST['jumlah']);
$beli = $data->insert('barangTransaksi',$sets,$post);
echo "item ditamahkan ke keranjang";
 ?>
