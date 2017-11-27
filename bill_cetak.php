<?php
session_start();
include("lib/config.inc.php");
require("lib/class.member.inc.php");
$member = new member();
//set to waiting status
$awaiting = $member->update('transaksi','status',array('Menunggu',$_SESSION['kd_trnsxi']),'kd_transaksi');
?>
<html>
<head>
  <style>
  table {font-size: 12px; font-family: monospace;}
  table.billing {border: 1px dashed #DDD; margin: 50px 0;}
  table.billing tr th {text-align: center; padding: 5px;}
  table.billing tr td { padding: 5px;}
  .rakecetak{ display: none;}
  </style>
</head>
<body  style="background-color: #FFF;"  onLoad=window.print()>

  <?php
  include("chart.php");
  ?>
</body>
</html>
