<?php
require("../lib/class.pegawai.inc.php");
$bayar = new pegawai();
$bayar->konfirmBayar($_POST['trx']);
echo "Pembayaran ".$_POST['trx']." Lunas";
 ?>
