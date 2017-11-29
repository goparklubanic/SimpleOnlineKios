<?php
//$brg = $member->pickup2('*','view_barangTransaksi',"kd_transaksi = '".$_GET['id']."'");
$brg = $member->kerangjangBelanja($_GET['id']);
$mbr = $member->pickup1('*','member','id_member',array($_SESSION['member_id']));
$stt = $member->pickup1('status','transaksi','kd_transaksi',array($_GET['id']));
?>

<table border="0" style="font-family: monospace; font-size: 12px;">
  <tr>
    <td width="100">Kepada</td>
    <td width="10">:</td>
    <td>Yth. Tn/Ny/Sdr. <b><?php echo $mbr['nama_member']; ?></b></td>
  </tr>
  <tr>
    <td>di</td>
    <td>:</td>
    <td><?php echo $mbr['alamat']; ?></td>
  </tr>
  <tr>
    <td colspan='3'></td>
  </tr>
  <tr>
    <td>Perihal</td>
    <td>:</td>
    <td>Billing Transaksi No. <b id="trx-id"><?php echo $_GET['id']; ?></b></td>
  </tr>

</table>
<table class='billing'>
  <tr>
    <th width="50">No.</th>
    <th width="300">Nama Barang</th>
    <th width="75">Banyaknya</th>
    <th width="150">Harga Satuan</th>
    <th width="175">Jumlah</th>
  </tr>
  <?php
  $i = 0;
  $total_billing = 0;
  while($i < count($brg)){
    $no = $i+1;
    echo "
    <tr>
      <td align='right'>".$no.".&nbsp;</td>
      <td>
        &nbsp;".$brg[$i]['nama_barang']."<br />
        &nbsp;[ ".$brg[$i]['kd_barang']." ]
        <a href=javascript:void(0); class='rakecetak' onClick=wurungPesen(".$brg[$i]['id'].") >Ganti</a>
      </td>
      <td align='right'>".$brg[$i]['qty']."</td>
      <td align='right'>".number_format($brg[$i]['harga_barang'],2,',','.')."</td>
      <td align='right'>".number_format($brg[$i]['jumlah'],2,',','.')."</td>
      </tr>";
      $total_billing += $brg[$i]['jumlah'];
      $i++;
  }
  ?>
  <tr style="border-top: 1px solid #000;">
    <td colspan="4" style="text-align:right; padding-right: 20px;">Jumlah Keseluruhan</td>
    <td align="right"><?php echo number_format($total_billing,2,',','.'); ?></td>
  </tr>
</table>
<?php if($stt['status'] == 'Aktif') { ?>
<div class="rakecetak">
  <ul class="list-inline">
    <li><a id="trx-cancel" class='btn btn-danger'>Batal</a></li>
    <li><a class='btn btn-primary' target="_blank" href="./bill_cetak.php?id=<?php echo $_SESSION['kd_trnsxi']; ?>">Selesai</a></li>
  </ul>
</div>
<?php  }else{ ?>
  <div class="rakecetak">
    <ul class="list-inline">
      <li><a href="./" class='btn btn-primary'>Kembali</a></li>
    </ul>
  </div>
<?php } ?>
