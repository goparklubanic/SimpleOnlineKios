<?php
require("../lib/class.crud.inc.php");
$data = new dbcrud();
 ?>
<div class="table-responsive">
  <div>
    <input type="text" class="data-search" placeHolder="cari pegawai" onkeyup="cariPegawai(this.value)"/>
    <script>
      function cariPegawai(nama){
        $.ajax({
          url:"../ajax/ajx-pegawai-query.php?nama="+nama,
          success:function(pegawai){
            $("#list-pegawai").html(pegawai);
          }
        });
      }
    </script>
    <span style="float:right;">
      <a href="./?page=form&obj=pegawai&id=0">
        <img class='control-icon' src="../images/iconAdd.png"  />
      </a>
    </span>
  </div>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th width="100">ID Pegawai</th>
        <th>Nama Member</th>
        <th width="300">Kontrol</th>
      </tr>
    </thead>
    <tbody id="list-pegawai">
      <?php
        $pgw = $data->select('*','pegawai','nama_pegawai',1);
        $i = 0 ;
        while($i < count($pgw)){
          echo "
          <tr>
            <td>".$pgw[$i]['id_pegawai']."</td>
            <td>".$pgw[$i]['nama_pegawai']."</td>
            <td width='300px'>
              <a href='#' onClick=condel('".$pgw[$i]['id_pegawai']."')>
                <img class='control-icon' src='../images/iconDel.png'  />
              </a>
              <a href='./?page=form&obj=pegawai&id=".$pgw[$i]['id_pegawai']."'>
                <img class='control-icon' src='../images/iconEdt.png'  />
              </a>
            </td>
          </tr>
          ";
          $i++;
        }
       ?>
    </tbody>
  </table>
  <script>
    function condel(id){
      var del = confirm('Data akan dihapus');
      if(del == true){
        window.location='deletion.php?obj=pegawai&id='+id;
      }
    }
  </script>
</div>
