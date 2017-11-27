<div id="product-list">
<?php
if(!$_GET['kat']){
  $product = $member->select('*','barang','nama_barang',1);
}else{
  $product = $member->pickup2('*','barang',"kategori = '".$_GET['kat']."'");
}
echo '
<div class="row">
  <input type="text" class="data-search" placeholder="Cari barang" id="product-search"/>
</div>';

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
</div>
