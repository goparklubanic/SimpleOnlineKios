<?php
require("../lib/class.crud.inc.php");
$data = new dbcrud();

if($_GET['id'] == '0'){
  $action_mod="new";
  $id_pegawai ="";
  $password_pegawai="";
  $nama_pegawai ="";
  $submit_value = "Simpan";
  $ro="";
}else{
  $pgw = $data->pickup1('*','pegawai','id_pegawai',array($_GET['id']));
  $action_mod="chg";
  $id_pegawai =$pgw['id_pegawai'];
  $password_pegawai="";
  $nama_pegawai =$pgw['nama_pegawai'];
  $submit_value="Mutakhirkan";
  $ro="readonly";
}
 ?>
 <center>
   <h2>FORMULIR MANAJEMEN MEMBER</h2><br/>
 </center>

 <div class="as-form">
   <form class="form-horizontal" action="act-pegawai.php?mod=<?php echo $action_mod; ?>" method="post" enctype="multipart/form-data">
     <!-- id pegawai  -->
     <div class="form-group">
       <label class="col-md-2">ID Pegawai</label>
       <div class="col-md-10">
         <input type="text" class="form-control" name="id_pegawai" id="id_member"
         value="<?php echo $id_pegawai; ?>" <?php echo $ro; ?> />
       </div>
     </div>

     <!--  Password -->
     <div class="form-group">
       <label class="col-md-2">Password</label>
       <div class="col-md-10">
         <input type="password" class="form-control" name="password_pegawai" id="password_pegawai" />
       </div>
     </div>

     <!--  Konfirmasi Password -->
     <div class="form-group">
       <label class="col-md-2">Konfirmasi Password</label>
       <div class="col-md-10">
         <input type="password" class="form-control" id="konfirmasi_password" onblur="confirm_password()"/>
         <span id="password_match"></span>
       </div>
     </div>
     <script>
      function confirm_password(){
        var p1 = $("#password_pegawai").val();
        var p2 = $("#konfirmasi_password").val();
        if(p1 == p2){
          $("#password_match").html('password identik');
        }else{
          $("#password_pegawai").val('');
          $("#password_pegawai").focus();
          $("#konfirmasi_password").val('');
          $("#password_match").html('password tidak sama');
        }
      }
     </script>

     <!-- Nama pegawai  -->
     <div class="form-group">
       <label class="col-md-2">Nama Lengkap</label>
       <div class="col-md-10">
         <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai"
         value="<?php echo $nama_pegawai; ?>" />
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
