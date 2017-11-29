<?php
  require("../lib/class.pegawai.inc.php");
  $brg = new pegawai();
 ?>
<div class="table-responsive">
  <div>
    <label>Filter Kategori :&nbsp;</label>
    <select id="kategori" class="form-filter" onchange="pukat(this.value)">
      <option>Pilih Kategori</option>
      <option>Kategori-1</option>
      <option>Kategori-2</option>
      <option>Kategori-3</option>
      <option>Kategori-4</option>
      <option>Kategori-5</option>
      <?php
        $kat = $brg->select('distinct(kategori) kat','barang','kategori',1);
        $i = 0 ;
        while($i < count($kat)){
          echo "<option>".$kat[$i]['kat']."</option>";
          $i++;
        }
       ?>
    </select>
    <script>
      function pukat(kat){
        window.location = './?page=barang&kat='+kat+'&p=1';
      }
    </script>
    <span style="float:right;">
      <a href="./?page=form&obj=barang&id=0"><img class="control-icon" src="../images/iconAdd.png"  /></a>
    </span>
  </div>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>Barang</th>
        <th>Kode &amp; Nama Barang</th>
        <th>Warna Barang</th>
        <th>Harga Barang</th>
        <th>Stok</th>
        <th width='300px'>Kontrol</th>
      </tr>
    </thead>
    <tbody>
      <?php
        # Barang	Kode & Nama Barang	Warna Barang	Harga Barang
        if(!$_GET['kat']){
          $barang = $brg->select("gambar,kd_barang,nama_barang,warna_barang,harga_barang,stok_barang",'barang','nama_barang',1);
        }else{
          $barang = $brg->pickup2("gambar,kd_barang,nama_barang,warna_barang,harga_barang,stok_barang","barang","kategori = '".$_GET['kat']."'");
        }
        for( $i = 0 ; $i < count($barang) ; $i++ ){
          echo "
          <tr>
            <td class='td-image'>
              <a href='./?page=debarg&id=".$barang[$i]['kd_barang']."'>
                <img src='../product_images/".$barang[$i]['gambar']."' height='50px'  />
              </a>
            </td>
            <td>
            ".$barang[$i]['nama_barang']."<br/>
            ".$barang[$i]['kd_barang']."
            </td>
            <td>".$barang[$i]['warna_barang']."</td>
            <td style='width:150px; text-align:right; padding-right:20px;'>".number_format($barang[$i]['harga_barang'],2,',','.')."</td>
            <td align='right'>".$barang[$i]['stok_barang']." unit</td>
            <td>
              <a href=# onClick=condel(".$barang[$i]['kd_barang'].")>
                <img class='control-icon' src='../images/iconDel.png'  />
              </a>
              <a href='./?page=form&obj=barang&id=".$barang[$i]['kd_barang']."'>
                <img class='control-icon' src='../images/iconEdt.png'  />
              </a>
              <a href='./?page=form&obj=image&id=".$barang[$i]['kd_barang']."'>
                <img class='control-icon' src='../images/iconImg.png'  />
              </a>
              <a href='./?page=form&obj=barmas&id=".$barang[$i]['kd_barang']."'>
                <img class='control-icon' src='../images/iconStk.png'  />
              </a>
            </td>
          </tr>
          ";
        }
       ?>
    </tbody>
  </table>
  <script>
    function condel(kd_barang){
      var x = confirm ('Data Akan Dihapus');
      if(x == true){
        window.location='./?page=hapus&obj=barang&id='+kd_barang;
      }
    }
  </script>
</div>
