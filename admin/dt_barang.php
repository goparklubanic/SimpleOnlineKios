<?php
require("../lib/class.crud.inc.php");
$brg = new dbcrud();
$barang = $brg->pickup1('*','barang','kd_barang',array($_GET['id']));
?>
<div class="col-md-4" id='db_image'>
  <img src='<?php echo '../product_images/'.$barang['gambar']; ?>' />
</div>
<div class="col-md-8" id="db_datas">
  <table class='table'>
    <tr>
      <th width="150px">Kode Barang</th>
      <td><?php echo $barang['kd_barang']; ?></td>
    </tr>

    <tr>
      <th>Kategori</th>
      <td><?php echo $barang['kategori']; ?></td>
    </tr>

    <tr>
      <th>Nama Barang</th>
      <td><?php echo $barang['nama_barang']; ?></td>
    </tr>

    <tr>
      <th>Warna</th>
      <td><?php echo $barang['warna_barang'];?></td>
    </tr>

    <tr>
      <th>Harga</th>
      <td><?php echo number_format($barang['harga_barang'],2,',','.') ;?></td>
    </tr>

    <tr>
      <th>Stok</th>
      <td><?php echo $barang['stok_barang'] ;?></td>
    </tr>
  </table>

</div>
<div style="clear:both">
  <div>
    Produk Serupa
  </div>
  <div id='br_serupa'>
    <?php
    $similar = $brg->pickup2("kd_barang,gambar","barang",
              "kategori='".$barang['kategori']."' && kd_barang !='".$barang['kd_barang']."'");
    for($i = 0 ; $i < 5 ; $i++){
      echo "
      <div class='br_serupa'>
        <a href='?page=debarg&id=".$similar[$i]['kd_barang']."'>
          <img src='../product_images/".$similar[$i]['gambar']."'  />
        </a>

      </div>
      ";
    }
     ?>
  </div>
</div>
