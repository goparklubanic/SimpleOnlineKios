<?php
  error_reporting(E_ALL & ~E_NOTICE);
  include("../lib/config.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo "Admin ".$config['storeName']; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <!-- custom alert / confirm  -->
  <link rel="icon" href="<?php echo $config['icon']; ?>" sizes="16x16">
  <link rel="stylesheet" href="../css/faholi.css">
  <link rel="stylesheet" href="../css/admin.css">
</head>
<body class='grad'>
  <div class="container" style='border: 0px solid red;'>
    <div class='navbar'>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="./"><?php echo $config['storeName']; ?></a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="./?page=barang">Barang</a></li>
            <li><a href="./?page=member">Member</a></li>
            <li><a href="./?page=pegawai">Pegawai</a></li>
            <li><a href="./?page=bayar">Pembayaran</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="row mainrow">
      <?php
        include("admin_content.php");
      ?>
    </div>
    <div class="pg-footer">
      &copy;2017 Tri Faholi<br/>
      <b>STIMIK TUNAS BANGSA BANJARNEGARA</b>
    </div>
  </div>
</body>
</html>
