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
        <th width='125'>Kode Transaksi</th>
        <th width='150'>Tanggal Transaksi</th>
        <th>Nama Member</th>
        <th>Alamat</th>
        <th>No. Telp</th>
        <th width='100'>Jumlah</th>
        <th>Kontrol</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $i=0;
      while($i < count($billing)){
        $tanggal  = $bill->tanggalTerbaca($billing[$i]['tgl']);
        echo "
        <tr>
          <td align='center'>".$billing[$i]['id']."</td>
          <td align='right'>".$tanggal."</td>
          <td>".$billing[$i]['nama']."</td>
          <td>".$billing[$i]['alamat`']."</td>
          <td>".$billing[$i]['telp']."</td>
          <td align='right'>".number_format($billing[$i]['jumlah'],0,',','.')."</td>
          <td><a href=javascript:void(0) onClick=lunas(".$billing[$i]['id'].")>Lunas</a></td>
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
