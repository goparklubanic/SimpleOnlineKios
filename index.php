<?php
session_start();
include("lib/config.inc.php");
require("lib/class.member.inc.php");
$member = new member();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $config['storeName']; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="icon" href="<?php echo $config['icon']; ?>" sizes="16x16">
  <link rel="stylesheet" href="css/faholi.css">
  <script src="js/customer.js"></script>
</head>
<body class='grad'>
  <div class="container" style='border: 0px solid red;'>
    <div class="pg-header">

    </div>
    <div class='navbar'>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="./"><?php echo $config['storeName']; ?></a>
          </div>
          <ul class="nav navbar-nav">
            <li>
              <select class="fe-search" id="kat-search">
                <option>Pilih Kategori</option>
                <?php
                  $kat=$member->listKategori();
                  $i = 0;
                  while($i < count($kat)){
                    echo "<option>".$kat[$i]."</option>";
                    $i++;
                  }
                 ?>
              </select>
            </li>
            <!--li><a href="#">Page 2</a></li>
            <li><a href="#">Page 3</a></li-->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
            if(!isset($_SESSION['member_id'])){
              echo '<li><a><span  id="visitor_id"></span></a></li>';
            }else{
              echo '<li><a>'.$_SESSION['member_fn'].'</a></li>';
            }
            ?>
            <?php
            if(!isset($_SESSION['kd_trnsxi'])){
              echo '<li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>Keranjang</a></li>';
            }else{
              echo '<li><a href="./?page=chart&id='.$_SESSION['kd_trnsxi'].'"><span class="glyphicon glyphicon-shopping-cart"></span>Keranjang</a></li>';
            }
            ?>
            <li><a href="./?page=daftar&id=0"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
            <?php
            if(!isset($_SESSION['member_id'])){
              echo '<li><a href="./?page=login"><span class="glyphicon glyphicon-log-in"></span> Masuk</a></li>';
            }else{
              echo '<li><a href="./?page=logout"><span class="glyphicon glyphicon-log-out"></span> Keluar</a></li>';
            }
            ?>
          </ul>
        </div>
      </nav>
    </div>

    <div class="row mainrow">

      <?php
      if(!$_GET || $_GET['kat']){
        include("etalase.php");
      }else{
        include("content.php");
      }
      ?>
    </div>
    <div class="pg-footer">
      &copy;2017 Tri Faholi<br/>
      <b>STIMIK TUNAS BANGSA BANJARNEGARA</b>
    </br/>
    </div>
  </div>
</body>
</html>
