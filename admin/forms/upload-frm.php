<form class="form-horizontal" action="act-barang.php?mod=upl" method="post" enctype="multipart/form-data">
<input type="hidden" name="kd_barang" value="<?php echo $_GET['id']; ?>" />
<!-- url_barang  -->
<div class="form-group">
  <label class="col-md-2">URL Gambar Barang</label>
  <div class="col-md-10">
    <input type="file" name="link_barang" id="link_barang" accept="image/png" />
    <span>Format file harus <b>png atau jpg</b></span>
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
