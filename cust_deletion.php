<?php
# print_r($_GET);
switch($_GET['obj']){
  case 'barang' : deleteThis($member,'barangTransaksi','id',$_GET['id']); break;
}

function deleteThis($member,$table,$key,$data){
  $member->delete($table,$key,$data);
  echo "
  <script>
    alert('Data berhasil dihapus');
    history.go(-1);
  </script>
  ";
}
?>
