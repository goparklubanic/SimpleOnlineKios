$(document).ready(function(){

  cekVisit();
  setVisitorId();
  $("#kat-search").change(function(){
    var kat = $(this).val();
    window.location="./?kat="+kat;
  });

  $("#product-search").keyup(function(){
    var product=$("#product-search").val();
    //alert(product);

    $.ajax({
      url:"ajax/ajx-product-query.php?nama="+product,
      success: function(products){
        $("#product-list").html(products);
      }
    });
  });

  $("#addToChart").click(function(){
    var kdb = $("#kd_barang").html();
    var qty = $("#qty").val();
    var teks = "Beli "+kdb+" sebanyal "+qty+" biji";
    $.post("addToChart.php",
      {
        kd_barang: kdb,
        jumlah: qty
      },function(response){
        alert(response);
      }
    );
    location.reload();
  });

});

function cekVisit(){
  var visit = localStorage.getItem('visit');
  if(visit == null || visit == ''){
    $.getJSON('ajax/ajx-visitor-query.php',function(visitor){
      localStorage.setItem('visit',visitor.total);
      localStorage.setItem('idvst',visitor.index);
      alert('Selamat datang pengunjung ke -'+visitor.total);
    });
  }
}

function setVisitorId(){
  var visid = localStorage.getItem('idvst');
  $("#visitor_id").html('Pengunjung '+visid);
}
