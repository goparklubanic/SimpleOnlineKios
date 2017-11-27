<?php
require("class.crud.inc.php");
class member extends dbcrud{

    function login($key){
      $derc = $this->pickup1('*','member','password_member',array($key));
      if($derc == null){
        $callBack = "Member belum terdaftar.
        <span class='btn btn-default' onClick=history.go(-1)>OK</span>";
      }else{
        $_SESSION['member_id'] = $mid;
        $_SESSION['member_fn'] = $derc['nama_member'];
        $callBack = "Login berahasil.
        <a class='btn btn-default' href='./'>OK</a>";
      }
      return($callBack);
    }
  /*
    function pesan(){}
    function bayar(){}
    function infoBarang(){}
  */
    function kerangjangBelanja($ktrx){
      $sql = "SELECT kd_barang,nama_barang,sum(qty) qty, harga_barang,
              (sum(qty) * harga_barang) jumlah
              FROM view_barangTransaksi
              WHERE kd_transaksi = ?
              GROUP BY kd_barang";
      $qry = $this->transact($sql,array($ktrx));
      $barang = array();
      while($r = $qry->fetch()){
        $item = array('kd_barang'=>$r['kd_barang'], 'nama_barang'=>$r['nama_barang'],
                      'qty'=>$r['qty'],'harga_barang'=>$r['harga_barang'],
                      'jumlah'=>$r['jumlah']);
        array_push($barang,$item);
      }
      return($barang);
      $qry = null;
    }
    function listKategori(){
      $sql = "SELECT DISTINCT(kategori) kat FROM barang ORDER BY kategori";
      $qry = $this->transact($sql);
      $kat = array();
      while($r = $qry->fetch()){
        array_push($kat,$r['kat']);
      }
      return($kat);
      $qry = null;
    }

    function cekTransaksi($id_member){
      $filter ="id_member='".$id_member."' && status ='Aktif' ";
      $sql = "SELECT kd_transaksi FROM transaksi WHERE ".$filter." Limit 1";
      $qry = $this->transact($sql);
      $r = $qry->fetch();
      $row = $qry->rowCount();
      if($row >= 1){
        $rv = $r['kd_transaksi'];
      }else{
        $ktrx = $this->kdTrxBaru();
        $this->trxBaru($id_member,$ktrx);
        $rv = $ktrx;
      }
      return($rv); $qry = null;
    }

    function kdTrxBaru(){
      $skr = date('Y-m').'%';
      $filter = "tgl_transaksi LIKE '" .$skr."'";
      $sql = "SELECT COUNT(kd_transaksi)+1 ktrx FROM transaksi WHERE ".$filter." LIMIT 1";
      $qry = $this->transact($sql);
      $r = $qry->fetch();
      $ktrx = date('m').sprintf('%03X',$r['ktrx']);
      return($ktrx);
      $qry = null;
    }

    function trxBaru($mid,$trx){
      $sets = "id_member,tgl_transaksi,kd_transaksi";
      $data = array($mid,date('Y-m-d'),$trx);
      $ntrx = $this->insert('transaksi',$sets,$data);
    }
}
?>
