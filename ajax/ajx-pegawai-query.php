<?php
require("../lib/class.crud.inc.php");
$ajax = new dbcrud();

$pgw = $ajax->pickup2('*','pegawai',"nama_pegawai LIKE '%".$_GET['nama']."%' ");
$i = 0;
while($i < count($pgw)){
  echo "
  <tr>
    <td>".$pgw[$i]['id_pegawai']."</td>
    <td>".$pgw[$i]['nama_pegawai']."</td>
    <td width='300px'>
      <a href='#' onClick=condel('".$pgw[$i]['id_pegawai']."')>
        <img class='control-icon' src='../images/iconDel.png'  />
      </a>
      <a href='./?page=form&obj=pegawai&id=".$pgw[$i]['id_pegawai']."'>
        <img class='control-icon' src='../images/iconEdt.png'  />
      </a>
    </td>
  </tr>
  ";
  $i++;
}
?>
