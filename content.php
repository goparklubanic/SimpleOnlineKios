<?php
switch($_GET['page']){
  case 'detil' : include("product-detil.php"); break;
  case 'login' : include("login.php");         break;
  case 'alogin': include("alogin.php");        break;
  case 'logout': include("logout.php");        break;
  case 'daftar': include("forms/reg-frm.php"); break;
  case 'chart' : include("chart.php");         break;
  case 'hapus' : include("cust_deletion.php"); break;
}
?>
