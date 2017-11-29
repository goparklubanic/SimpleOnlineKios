<form class="form-horizontal" action="./act-member.php?mod=pay" method="post">
  <div class="form-group">
    <label class="col-md-2">Kode Transaksi</label>
    <div class="col-md-10">
      <input type="text" class="form-control" maxlength="5" name="kd_transaksi" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-2">Jumlah nominal</label>
    <div class="col-md-10">
      <input type="number" class="form-control" name="jumlah" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-2">Cara Pembayaran</label>
    <div class="col-md-10">
      <select class="form-control" name="methode">
        <option>Kartu Kredit</option>
        <option>ATM</option>
        <option>Transfer</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-2">Bank Asal</label>
    <div class="col-md-10">
      <select class="form-control" name="bank">
        <option>Bank Central Asia</option>
        <option>Bank Mandiri</option>
        <option>Bank Nasional Indonesia 46</option>
        <option>Bank Rakyat Indonesia</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-2">Nomor Rekening Pengirim</label>
    <div class="col-md-10">
      <input type="text" class="form-control" name="rekening" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-2">Password</label>
    <div class="col-md-10">
      <input type="password" class="form-control" name="password" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-md-2">&nbsp;</label>
    <div class="col-md-10">
      <input type="submit" class="btn btn-primary btn-submit" value="Konfirmasi" />
    </div>
  </div>
</form>
