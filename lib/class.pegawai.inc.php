<?php
require("class.crud.inc.php");
class pegawai extends dbcrud{
  function login(){}
  function konfirmBayar($id){
    $this->update('transaksi','status',array('Lunas',$id),'kd_transaksi');
  }

  function updatePegawai($sets,$post,$keys){
    $this->update('pegawai',$sets,$post,$keys);
  }

  function updateMember($sets,$post,$keys){
    $this->update('member',$sets,$post,$keys);
  }

  function updateBarang($sets,$post){
    $this->update('barang',$sets,$post,'kd_barang');
  }

  function billing($status){
    $sql = "SELECT transaksi.kd_transaksi, transaksi.tgl_transaksi, member.nama_member,
                   member.alamat, member.no_telp, sum(view_barangTransaksi.jumlah) jumlah
            FROM transaksi, member, view_barangTransaksi
            WHERE transaksi.status= ? && member.id_member = transaksi.id_member &&
                  view_barangTransaksi.kd_transaksi = transaksi.kd_transaksi
            GROUP BY kd_transaksi;";
    $qry = $this->transact($sql,array($status));
    $billing = array();
    while($r = $qry->fetch()){
      $bill = array(
        'id'=>$r['kd_transaksi'],
        'tgl'=>$r['tgl_transaksi'],
        'nama'=>$r['nama_member'],
        'alamat`'=>$r['alamat'],
        'telp'=>$r['no_telp'],
        'jumlah'=>$r['jumlah']
      );
      array_push($billing,$bill);
    }
    return($billing);
    $qry = null;
  }
  // function updatePesanan(){}
  function laporanPesanan($bulan,$baris=0){
    $bulan.='%';
    $sql = "SELECT  transaksi.kd_transaksi, transaksi.tgl_transaksi,
                    member.nama_member, member.alamat,SUM(jumlah) jumlah,
                    transaksi.status
            FROM transaksi, member,view_barangTransaksi
            WHERE   member.id_member = transaksi.id_member &&
                    view_barangTransaksi.kd_transaksi = transaksi.kd_transaksi
            GROUP BY transaksi.kd_transaksi
            ORDER BY transaksi.kd_transaksi
            LIMIT ".$baris.",".rows;
    $qry = $this->transact($sql);
    $trx = array();
    while($r = $qry->fetch()){
      $data = array(
        'kode'=>$r['kd_transaksi'],
        'tanggal'=>$this->tanggalTerbaca($r['tgl_transaksi']),
        'nama'=>$r['nama_member'],
        'alamat'=>$r['alamat'],
        'jumlah'=>$r['jumlah'],
        'status'=>$r['status']
      );

      array_push($trx,$data);
    }
    return($trx); $qry = null;

  }
  function laporanPembayaran(){}
}
?>
