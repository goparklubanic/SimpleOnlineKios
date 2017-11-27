<?php
require("../lib/class.crud.inc.php");
$data = new dbcrud();
$product = $data->pickup2('*','barang',"nama_barang LIKE '%".$_GET['nama']."%'");
for($i = 0 ; $i < count($product) ; $i++){
  echo "
  <div class='product-box'>
    <div class='product-img'>
      <img src='product_images/".$product[$i]['gambar']."' />
    </div>
    <div class='product-info'>
    <a class='product-name' href='./?page=detil&id=".$product[$i]['kd_barang']."'>
    ".$product[$i]['nama_barang']."
    </a>
      <p class='product-price'>".number_format($product[$i]['harga_barang'],0,',','.')."</p>
    </div>
  </div>
  ";
}
?>
