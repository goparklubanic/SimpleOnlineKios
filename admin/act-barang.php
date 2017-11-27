<?php
require("../lib/class.crud.inc.php");
$data = new dbcrud();



if($_GET['mod']== 'new'){
  $fname = $_POST['kd_barang'].".png";
  $sets = "kd_barang,nama_barang,kategori,harga_barang,warna_barang,gambar";
  $post = array($_POST['kd_barang'],$_POST['nama_barang'],$_POST['kategori'],
                $_POST['harga_barang'],$_POST['warna_barang'],$fname);
  $curImageSize = $_FILES['link_barang']['size'];
  $maxImageSize = 1024 * 1000;
  // echo "<div> max size = ".$maxImageSize .". Current Image Size =".$curImageSize."</div>";
  if( $curImageSize <= $maxImageSize ){

    upload($_FILES['link_barang'],$fname);
    $insert = $data -> insert('barang',$sets,$post);

  }else{
    echo "File Kegedhen !";
  }

  redirPage('Tambah Data Barang');
}

if($_GET['mod']== 'chg'){

    $sets = "nama_barang,kategori,harga_barang,warna_barang";
    $post = array($_POST['nama_barang'],$_POST['kategori'], $_POST['harga_barang'],
                  $_POST['warna_barang'],$_POST['kd_barang']);

  $update = $data->update('barang',$sets,$post,'kd_barang');
  redirPage('Pemutahiran data barang');
}

if($_GET['mod']== 'upl'){
  upload($_FILES['link_barang'],$_POST['kd_barang'].'.png');
  //redirPage('Upload gambar');
}

if($_GET['mod']== 'stk'){
  $siki = array(date('Y-m-d'),date('ymd'));
  $id_input = $siki[1].'-'.$_POST['kd_barang'];
  $sets ="tanggal,kd_barang,jumlah,id_input";
  $post =array($siki[0],$_POST['kd_barang'],$_POST['jumlah'],$id_input);
  $updateStok = $data->insert('stok_masuk',$sets,$post);
  redirPage('Update stok');
}

?>

<?php
// UPLOAD FILE SCRIPT
function upload($ufile,$fname){
  $uploaddir = '/home/nugroho/www/faholi/product_images/';
  $uploadfile = $uploaddir . ($fname);

  echo '<pre>';
  if (move_uploaded_file($ufile['tmp_name'], $uploadfile)) {
      echo "Image valid. Upload berhasil.\n";
  } else {
      echo "Periksa kembali gambar unggahan!\n";
  }
}

function cekfiles($ufile){
  echo "in function \n";
  echo "<pre>";
  print_r($ufile);
  echo "</pre>";
}

function redirPage($proses){
  echo "

  <script>
    alert('Proses ".$proses." berhasil');
    history.go(-2) ;
  </script>

  ";
}
?>
