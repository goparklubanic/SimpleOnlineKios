<?php
  require("../lib/class.crud.inc.php");
  $data = new dbcrud();
 ?>
<div class="table-responsive">
  <div>
    <input type='text' class='data-search' id="member-data"  placeholder="Pencarian Member"
    onkeyup="memberQuery(this.value)" />
    <script>
      function memberQuery(nama){
        $.ajax({url:"../ajax/ajx-member-query.php?nama="+nama,
               success:function(member){
                 $("#member-list").html(member);
               }});
      }
    </script>
    <span style="float:right;">
      <a href="./?page=form&obj=member&id=0">
        <img class='control-icon' src='../images/iconAdd.png'  />
      </a>
    </span>
  </div>

  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>ID Member</th>
        <th>Nama Member</th>
        <th>Alamat</th>
        <th>Nomor Telp</th>
        <th>Kontrol</th>
      </tr>
    </thead>
    <tbody id="member-list">
      <?php
        $member = $data->select('*','member','id_member',1);
        $i = 0;
        while($i < count($member)){
          echo "
          <tr>
            <td>".$member[$i]['id_member']."</td>
            <td>".$member[$i]['nama_member']."</td>
            <td>".$member[$i]['alamat']."</td>
            <td>".$member[$i]['no_telp']."</td>
            <td>
              <a href=# onClick=condel('".$member[$i]['id_member']."')>
                <img class='control-icon' src='../images/iconDel.png'  />
              </a>

              <a href='./?page=form&obj=member&id=".$member[$i]['id_member']."'>
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
      if( del == true){
        window.location='deletion.php?obj=member&id='+id;
      }
    }
  </script>
</div>
