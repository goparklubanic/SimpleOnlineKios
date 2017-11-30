<?php
require("../lib/class.pegawai.inc.php");
$bill = new pegawai();
$billing = $bill->billing('Menunggu');
/*
echo "<pre>";
print_r($billing);
echo "</pre>";
*/
?>
<div class='table-responsive'>
  <table class='table table-sm table-striped' border='0'>
    <thead>
      <tr>
        <th width='100'>Kode Trx</th>
        <th width='150'>Tanggal Transaksi</th>
        <th>Nama Member</th>
        <!--th>Alamat</th-->
        <th>No. Telp</th>
        <th width='100'>Jumlah</th>
        <th width='175'>Pembayaran</th>
        <th width='100'>Kontrol</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i=0;
      while($i < count($billing)){
        $tanggal  = $bill->tanggalTerbaca($billing[$i]['tgl']);
        $bayar = $bill->pickup1('status,jumlah','pembayaran','kd_transaksi',array($billing[$i]['id']));
        if($bayar['status']==''){
          $stabar  = 'Nihil';
          $kontrol = '';
        }else{
          $stabar  = $bayar['status'];
          $kontrol = "<a href=javascript:void(0) onClick=lunas(".$billing[$i]['id'].")>Lunas</a>";
        }
        echo "
        <tr>
          <td align='center'>".$billing[$i]['id']."</td>
          <td align='right'>".$tanggal."</td>
          <td>".$billing[$i]['nama']."</td>
          <!--td>".$billing[$i]['alamat`']."</td -->
          <td>".$billing[$i]['telp']."</td>
          <td align='right'>".number_format($billing[$i]['jumlah'],0,',','.')."</td>
          <td align='right'><span style='float:left;'>".$stabar."</span> ".number_format($bayar['jumlah'],0,',','.')."</td>
          <td>".$kontrol."</td>
        </tr>
        ";
        $i++;
      }
       ?>
    </tbody>
  </table>
</div>
<script>
function lunas(id){
  $.post('../ajax/ajx-trx-lunas.php',{
    trx:id
  },function(info){
    alert(info);
    location.reload();
  });
}
</script>
