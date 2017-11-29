<?php
require("../lib/class.pegawai.inc.php");
$report = new pegawai();
if(!$_GET['bln']){ $bulan = date('Y-m'); }else{ $bulan = $_GET['bln']; }
$pesanan = $report->laporanPesanan($bulan);
function periodeLaporan($tgl){
  list($th,$bl) = explode('-',$tgl);
  echo "Bulan ".$bl." Tahun ".$th;
}
?>
<html>
  <head>
    <title>Order Report</title>
    <style>
      body, table, tr, th, td{
        font-family: monospace;
        font-size: 12px;
      }
      th{ text-align: center; font-weight: bold; font-size: 14px;}
      td,th{padding: 2px 10px;}
    </style>
  </head>
  <body>
    <h2>Laporan Pesanan <?php periodeLaporan($bulan); ?></h2>
    <table>
      <thead>
        <tr>
          <th width="105">Kode Pesanan</th>
          <th width="150">Tanggal Pesanan</th>
          <th width="200">Nama Member</th>
          <th width="300">Alamat Member</th>
          <th width="150">Jumlah Pesanan</th>
          <th width="75">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 0;
        while( $i < count($pesanan) ){
          echo "
          <tr>
            <td align='center'>".$pesanan[$i]['kode']."</td>
            <td align='right'>".$pesanan[$i]['tanggal']."</td>
            <td>".$pesanan[$i]['nama']."</td>
            <td>".$pesanan[$i]['alamat']."</td>
            <td align='right'>".number_format($pesanan[$i]['jumlah'],0,',','.')."</td>
            <td align='center'><b>".$pesanan[$i]['status']."</b></td>
          </tr>
          ";
          $i++;
        }
         ?>
      </tbody>
    </table>
  </body>
</html>
