<?php
error_reporting(E_ALL & ~E_NOTICE);
require("../lib/class.pegawai.inc.php");
$report = new pegawai();
if(!$_GET['bln']){ $bulan = date('Y-m'); }else{ $bulan = $_GET['bln']; }
$bayar = $report->laporanPembayaran($bulan);
function periodeLaporan($tgl){
  list($th,$bl) = explode('-',$tgl);
  echo "Bulan ".$bl." Tahun ".$th;
}
?>
<html>
  <head>
    <title>Payment Report</title>
    <style>
      body, table, tr, th, td{
        font-family: monospace;
        font-size: 12px;
      }
      th{ text-align: center; font-weight: bold; font-size: 14px;}
      td,th{padding: 2px 10px; vertical-align: text-top;}
    </style>
  </head>
  <body>
    <h2>Laporan Pembayaran <?php periodeLaporan($bulan); ?></h2>
    <table border='0'>
      <thead>
        <tr>
          <th width="75">Kode Transaksi</th>
          <th width="125">Tanggal Pemeriksaan</th>
          <th width="200">Nama Member</th>
          <th width="300">Alamat Member</th>
          <th>Metode Pembayaran</th>
          <th>Nomor Rekening</th>
          <th width="100">Jumlah</th>
          <th width="75">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;
        while( $i < count($bayar) ){
          echo "
          <tr>
            <td align='center'>".$bayar[$i]['kode']."</td>
            <td align='right'>".$bayar[$i]['tgl']."</td>
            <td>".$bayar[$i]['nama']."</td>
            <td>".$bayar[$i]['alamat']."</td>
            <td>
              ".$bayar[$i]['cara']."<br />
              ".$bayar[$i]['bank']."
            </td>
            <td>".$bayar[$i]['rekening']."</td>
            <td align='right'>".number_format($bayar[$i]['jumlah'],0,',','.')."</td>
            <td align='center'><b>".$bayar[$i]['status']."</b></td>
          </tr>
          ";
          $i++;
        }
         ?>
      </tbody>
    </table>
  </body>
</html>
