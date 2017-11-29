<?php
error_reporting(0);
require("./lib/class.member.inc.php");
$trx = new member();
  // id transaksi
  $trxid = $_POST['id'];

  // update status transaksi menjadi batal
  $trxrec = $trx->update('transaksi','status',array('Batal',$trxid),'kd_transaksi');

  // update stok barang
  //// periksa jumlah barang
  $stuffs = $trx->pickup2('kd_barang,qty','barangTransaksi',"kd_transaksi = '".$trxid."' ");
  $i = 0;
  //// kembalikan jumlah ke tabel barang
  while($i < count($stuffs)){
    $trx->stokBatal($stuffs[$i]['kd_barang'],$stuffs[$i]['qty']);
    $i++;
  }

  echo "Transaksi $trxid dibatalkan";
?>
