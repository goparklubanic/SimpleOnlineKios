<?php

// $barang = $member->pickup1('*','barang','kd_barang',array($_GET['id']));
$barang = $member->infoBarang($_GET['id']);
?>
<div class="col-md-4" id='db_image'>
  <img src='<?php echo './product_images/'.$barang['gambar']; ?>' />
</div>
<div class="col-md-8" id="db_datas">
  <table class='table'>
    <tr>
      <th width="150px">Kode Barang</th>
      <td id="kd_barang"><?php echo $barang['kd_barang']; ?></td>
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
    <tr>
      <td>&nbsp;</td>
      <td>
        <?php if(isset($_SESSION['member_id'])){ ?>
        <input type="number" class="chart-qty" value="1" min="1" max="<?php echo $barang['stok_barang']; ?>" id="qty"  />
        &nbsp;
        <a href="#" class="btn btn-default">
          <img src="images/iconBuy.png" height="60px" id="addToChart" />
        </a>
        <?php } ?>
      </td>
    </tr>
  </table>

</div>
<div style="clear:both">
  <div style="text-align: center; font-weight:bold; font-size: 14pt; padding: 10px;
  background: #000; color: #EEE; margin: 20px 0;">
    Produk Serupa
  </div>
  <div id='br_serupa'>
    <?php
    $similar = $member->pickup2("kd_barang,gambar","barang",
              "kategori='".$barang['kategori']."' && kd_barang !='".$barang['kd_barang']."'");
    for($i = 0 ; $i < 5 ; $i++){
      echo "
      <div class='br_serupa'>
        <a href='?page=detil&id=".$similar[$i]['kd_barang']."'>
          <img src='./product_images/".$similar[$i]['gambar']."'  />
        </a>

      </div>
      ";
    }
     ?>
  </div>
</div>
