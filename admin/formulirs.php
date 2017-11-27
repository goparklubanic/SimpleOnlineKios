<?php
  switch($_GET['obj']){
    case 'barang'  : include("forms/barang-frm.php");  break;
    case 'member'  : include("forms/member-frm.php");  break;
    case 'pegawai' : include("forms/pegawai-frm.php"); break;
    case 'image'   : include("forms/upload-frm.php");  break;
    case 'barmas'  : include("forms/stokmsk-frm.php"); break;
  }
?>
