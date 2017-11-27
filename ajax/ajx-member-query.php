<?php
require("../lib/class.crud.inc.php");
$ajax = new dbcrud();

$member = $ajax->pickup2('*','member',"nama_member LIKE '%".$_GET['nama']."%' ");
$i = 0;
while($i < count($member)){
  echo "
  <tr>
    <td>".$member[$i]['id_member']."</td>
    <td>".$member[$i]['nama_member']."</td>
    <td>".$member[$i]['alamat']."</td>
    <td>".$member[$i]['no_telp']."</td>
    <td>
      <a href=#>
        <img class='control-icon' src='../images/iconDel.png'  />
      </a>

      <a href='./?page=form&obj=member&id=".$member[$i]['id_member']."'>
        <img class='control-icon' src='../images/iconEdt.png'  />
      </a>
    </td>
  </tr>
  ";
  $i++;
}
?>
