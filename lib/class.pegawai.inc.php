<?php
require("class.crud.inc.php");
class pegawai extends dbcrud{
  function login(){}
  function konfirmBayar(){}

  function updatePegawai($sets,$post,$keys){
    $this->update('pegawai',$sets,$post,$keys);
  }

  function updateMember($sets,$post,$keys){
    $this->update('member',$sets,$post,$keys);
  }

  function updateBarang($sets,$post){
    $this->update('barang',$sets,$post,'kd_barang');
  }

  // function updatePesanan(){}
  function laporanPesanan(){}
  function laporanPembayaran(){}
}
?>
