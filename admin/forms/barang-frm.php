<?php
require("../lib/class.crud.inc.php");
$data = new dbcrud();
$kat = $data->select('distinct(kategori) kat','barang','kategori',1);
if($_GET['id'] == 0){
  $action_mod="new";
  $kd_barang ="";
  $nama_barang ="";
  $kategori = "";
  $harga_barang="";
  $warna_barang="";
  $link_barang="";
  $submit_value = "Simpan";
  $ro="";
}else{
  $brg = $data->pickup1('*','barang','kd_barang',array($_GET['id']));
  $action_mod="chg";
  $kd_barang =$brg['kd_barang'];
  $nama_barang =$brg['nama_barang'];
  $kategori = $brg['kategori'];
  $harga_barang=$brg['harga_barang'];
  $warna_barang=$brg['warna_barang'];
  $link_barang=$brg['gambar'];
  $submit_value="Mutakhirkan";
  $ro="readonly";
}
 ?>
 <center>
   <h2>FORMULIR MANAJEMEN BARANG</h2><br/>
 </center>

 <div class="as-form">
   <form class="form-horizontal" action="act-barang.php?mod=<?php echo $action_mod; ?>" method="post" enctype="multipart/form-data">
     <!-- kode-barang  -->
     <div class="form-group">
       <label class="col-md-2">Kode Barang</label>
       <div class="col-md-10">
         <input type="text" class="form-control" name="kd_barang" id="kd_barang"
         value="<?php echo $kd_barang; ?>" <?php echo $ro; ?> />
       </div>
     </div>

     <!--  nama barang -->
     <div class="form-group">
       <label class="col-md-2">Nama Barang</label>
       <div class="col-md-10">
         <input type="text" class="form-control" name="nama_barang" id="nama_barang"
          value="<?php echo $nama_barang; ?>" />
       </div>
     </div>

     <!-- Kategori  -->
     <div class="form-group">
       <label class="col-md-2">Kategori</label>
       <div class="col-md-10">
         <input type="text" class="form-control hide1st" disabled name="kategori" id="kategori_baru" />
         <select name="kategori" id="kategori" class="form-control" onchange="cekkat()" >
           <option>Pilih Kategori</option>
           <option>Kategori - 1</option>
           <option>Kategori - 2</option>
           <option>Kategori - 3</option>
           <option>Kategori - 4</option>
           <option>Kategori - 5</option>
           <?php
           for($i = 0 ; $i < count($kat) ; $i++){
             echo "<option>".$kat[$i]['kat']."</option>";
           }
            ?>
           <option value="maning">Lainnya</option>
         </select>
       </div>
     </div>
     <script>
     function cekkat(){
       var kat = $("#kategori").val();
       if(kat == "maning"){
         $("#kategori").hide();
         $("#kategori").prop('disabled',true);
         $("#kategori_baru").show();
         $("#kategori_baru").prop('disabled',false);
       }
     }
     </script>
     <!-- harga_barang  -->
     <div class="form-group">
       <label class="col-md-2">Harga Barang</label>
       <div class="col-md-10">
         <input type="text" class="form-control" name="harga_barang" id="harga_barang"
         value="<?php echo $harga_barang; ?>" />
       </div>
     </div>

     <!-- warna_barang  -->
     <div class="form-group">
       <label class="col-md-2">Warna Barang</label>
       <div class="col-md-10">
         <input type="text" class="form-control" name="warna_barang" id="warna_barang"
         value="<?php echo $warna_barang; ?>" />
       </div>
     </div>

     <!-- url_barang  -->
     <div class="form-group">
       <label class="col-md-2">URL Gambar Barang</label>
       <div class="col-md-10">
         <input type="file" name="link_barang" id="link_barang" accept="image/png" />
         <span>Format file harus <b>png atau jpg</b></span>
       </div>
     </div>

     <!-- submit button -->
     <div class="form-group">
       <label class="col-md-2">&nbsp;</label>
       <div class="col-md-10">
         <input type="submit" class="btn btn-primary btn-submit" value="<?php echo $submit_value; ?>" />
       </div>
     </div>
   </form>
 </div>
