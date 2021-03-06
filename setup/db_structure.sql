drop table if exists member;
create table member(
  id_member varchar(10) unique,
  password_member varchar(32),
  nama_member varchar(30) not null,
  alamat varchar(30),
  no_telp varchar(15)
);

drop table if exists pegawai;
create table pegawai(
  id_pegawai varchar(10) unique,
  nama_pegawai varchar(30) not null,
  password_pegawai varchar(32)
);

drop table if exists pengunjung;
create table pengunjung(
  id_pengunjung varchar(10),
  waktu timestamp
);

drop table if exists transaksi;
create table transaksi(
  kd_transaksi varchar(5) unique,
  id_member varchar(10),
  tgl_transaksi date,
  status enum('Aktif','Menunggu','Lunas','Batal') default 'Aktif'
);

drop table if exists barangTransaksi;
create table barangTransaksi(
  id int(3) not null auto_increment primary key,
  kd_transaksi varchar(5),
  kd_barang varchar(10),
  qty int(3) default 0
);

drop table if exists barang;
create table barang(
  kd_barang varchar(10) unique,
  nama_barang varchar(30),
  kategori tinytext,
  stok_barang int(3) default 0,
  harga_barang int(11),
  warna_barang varchar(20),
  gambar varchar(30)
);

drop table if exists stok_masuk;
create table stok_masuk(
  id_input varchar(20) not null unique,
  tanggal date,
  kd_barang varchar(10),
  jumlah int(3) default 0
);

drop table if exists pembayaran;
create table pembayaran(
  kd_transaksi varchar(5) not null unique,
  tgl_cek date,
  jumlah int(11) default 0,
  methode enum('Kartu Kredit','ATM','Transfer') default 'Transfer',
  bank tinytext,
  nomor_rekening varchar(20),
  status enum('valid','invalid','on check') default 'on check'
);

-- triggers --
-- triger stok --
delimiter //
create trigger stokTambah after insert on stok_masuk
  for each row
  begin
    update barang set stok_barang=stok_barang + new.jumlah
    where kd_barang = new.kd_barang;
  end;
//
delimiter ;

delimiter //
create trigger stokKembali before delete on barangTransaksi
  for each row
  begin
    update barang set stok_barang=stok_barang + old.qty
    where kd_barang = old.kd_barang;
  end;
//
delimiter ;

delimiter //
create trigger stokKurang before insert on barangTransaksi
  for each row
  begin
    update barang set stok_barang=stok_barang - new.qty
    where kd_barang = new.kd_barang;
  end;
//
delimiter ;



-- views --
CREATE OR REPLACE VIEW view_barangTransaksi AS
SELECT barangTransaksi.id, barangTransaksi.kd_transaksi, barangTransaksi.kd_barang,
barang.nama_barang, barangTransaksi.qty, barang.harga_barang,
(barangTransaksi.qty * barang.harga_barang) jumlah , transaksi.status
FROM barangTransaksi, barang, transaksi
WHERE barang.kd_barang = barangTransaksi.kd_barang &&
transaksi.kd_transaksi = barangTransaksi.kd_transaksi
ORDER BY kd_transaksi;
