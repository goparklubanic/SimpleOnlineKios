<?php
//require("../lib/class.member.inc.php");
$data = new member();
if($_GET['id'] == '0'){
  // print_r($_GET);
  $action_mod="new";
  $id_member ="";
  $password_member="";
  $nama_member ="";
  $alamat = "";
  $no_telp="";
  $submit_value = "Simpan";
  $ro="";
}else{
  $member = $data->pickup1('*','member','id_member',array($_GET['id']));
  // print_r($member);
  $action_mod="chg";
  $id_member =$member['id_member'];
  $password_member="";
  $nama_member =$member['nama_member'];
  $alamat = $member['alamat'];
  $no_telp=$member['no_telp'];
  $submit_value="Mutakhirkan";
  $ro="readonly";
}
 ?>
 <center>
   <h2>FORMULIR REGISTRASI MEMBER</h2><br/>
 </center>

 <div class="as-form">
   <form class="form-horizontal" action="act-member.php?mod=<?php echo $action_mod; ?>" method="post" enctype="multipart/form-data">
     <!-- id member  -->
     <div class="form-group">
       <label class="col-md-2">ID Member</label>
       <div class="col-md-10">
         <input type="text" class="form-control" name="id_member" id="id_member" readonly
         value="<?php echo $id_member; ?>" />
       </div>
     </div>

     <!--  Password -->
     <div class="form-group">
       <label class="col-md-2">Password</label>
       <div class="col-md-10">
         <input type="password" class="form-control" name="password_member" id="password_member" />
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
        var p1 = $("#password_member").val();
        var p2 = $("#konfirmasi_password").val();
        if(p1 == p2){
          $("#password_match").html('password identik');
        }else{
          $("#password_member").val('');
          $("#password_member").focus();
          $("#konfirmasi_password").val('');
        }
      }
     </script>

     <!-- Nama member  -->
     <div class="form-group">
       <label class="col-md-2">Nama Lengkap</label>
       <div class="col-md-10">
         <input type="text" class="form-control" name="nama_member" id="nama_member"
         value="<?php echo $nama_member; ?>" maxlength="30" />
       </div>
     </div>

     <!-- Alamat  -->
     <div class="form-group">
       <label class="col-md-2">Alamat Rumah</label>
       <div class="col-md-10">
         <input type="text" class="form-control" name="alamat" id="alamat"
         value="<?php echo $alamat; ?>" maxlength="40" />
       </div>
     </div>

     <!-- Nomor Telepon -->
     <div class="form-group">
       <label class="col-md-2">Nomor Telepon / HP</label>
       <div class="col-md-10">
         <input type="text" class="form-control" name="no_telp" id="no_telp"
         value="<?php echo $no_telp; ?>" />
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
 <?php
echo "<script>
  var mid = localStorage.getItem('idvst');
  $('#id_member').val(mid);
</script>";
  ?>
