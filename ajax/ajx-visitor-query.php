<?php
  require("../lib/class.crud.inc.php");
  $data = new dbcrud();
  // total visitor
  $visit = $data->select('count(id_pengunjung) visitor','pengunjung','id_pengunjung',1);
  $total_visitor = $visit[0]['visitor'] + 1;

  // today visitor
  $tdvis = $data->pickup2('count(id_pengunjung) visitor','pengunjung',"id_pengunjung LIKE '".date('ymd')."%'");
  $today_visitor = $tdvis[0]['visitor'] + 1;
  $idx_visitor = sprintf("%04d",$today_visitor);
  $id_visitor=date('ymd').$idx_visitor;

  // insert visitation
  $visitor = $data->insert('pengunjung','id_pengunjung',array($id_visitor));

  $data_visitor=array('total'=>$total_visitor,'today'=>$today_visitor,'index'=>$id_visitor);
  echo json_encode($data_visitor);
?>
