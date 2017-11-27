<form class="form-horizontal" action="act-barang.php?mod=stk" method="post" enctype="multipart/form-data">
<input type="hidden" name="kd_barang" value="<?php echo $_GET['id']; ?>" />
<!-- jumlah stok masuk  -->
<div class="form-group">
  <label class="col-md-2">Tanggal Masuk</label>
  <div class="col-md-10">
    <input type="text" class="form-control" value="<?php echo date('d - m - y'); ?>" disabled />
  </div>
</div>
<div class="form-group">
  <label class="col-md-2">Stok Masuk</label>
  <div class="col-md-10">
    <input type="number" class="form-control" name="jumlah" min='0' value='0' />
  </div>
</div>

<!-- submit button -->
<div class="form-group">
  <label class="col-md-2">&nbsp;</label>
  <div class="col-md-10">
    <input type="submit" class="btn btn-primary btn-submit" value="Upload" />
  </div>
</div>
</form>
