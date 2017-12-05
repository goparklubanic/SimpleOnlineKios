<?php
session_start();
require_once("../lib/class.pegawai.inc.php");
$clerk = new pegawai();
$key = md5($_POST['lguser']."_".$_POST['lgpass']);
$aid = $clerk->login($key);

$_SESSION['admin']=$aid['nama_pegawai'];
header("Location:./");
?>
