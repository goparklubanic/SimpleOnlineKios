<?php
  switch($_GET['page']){
    case 'form'    : include('formulirs.php');  break;
    case 'barang'  : include('mp_barang.php');  break;
    case 'member'  : include('mp_member.php');  break;
    case 'pegawai' : include('mp_pegawai.php'); break;
    case 'debarg'  : include('dt_barang.php');  break;
    case 'hapus'   : include('deletion.php');   break;
    default : include('mp_barang.php'); break;
  }
?>
