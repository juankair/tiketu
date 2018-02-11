<?php
$this->load->view('layouts/header');
$this->load->view('layouts/navigation1');
$this->load->view('layouts/navigation2');
 ?>
<form action="<?php echo site_url('tiket/checkout') ?>" method="post" onsubmit="return validateForm()">

             <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    Pembelian Tiket
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!-- END: Subheader -->
                    <div class="m-content">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="m-portlet m-portlet--mobile ">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <h3 class="m-portlet__head-text">
                                                    Perjalanan Pergi<input type="hidden" name="idrute" value="<?php echo $this->input->post('idrute') ?>">
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="m-portlet__head-tools">
                                            <ul class="m-portlet__nav">
                                                <li class="m-portlet__nav-item">
                                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
                                                        <h3 class="m-portlet__head-text">
                                                            <span><?php echo $nama ?></span><input type="hidden" name="tnama" value="<?php echo $nama ?>"> [<?php echo $waktu ?><input type="hidden" name="twaktu" value="<?php echo $waktu ?>">]
                                                        </h3>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                <div class="m-portlet__body">
                                   <h5><?php echo $dari ?><input type="hidden" name="tdari" value="<?php echo $dari ?>"> <i class="fa fa-angle-right"></i> <?php echo $ke ?><input type="hidden" name="tke" value="<?php echo $ke ?>"></h5>
          <br>
          <i class="fa fa-user"></i> <?php echo $dewasa ?><input type="hidden" name="tdewasa" value="<?php echo $dewasa ?>"> Dewasa x Rp. <?php echo $harga ?><input type="hidden" name="tharga" value="<?php echo $harga ?>">
          <hr>
          <h6>Total : Rp. <?php echo $harga * $dewasa ?></h6>
        
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>

                
   
                     
                                    <div class="row">
                                          <?php
                                            for ($i=1; $i <= $this->input->post('dewasa') ; $i++) {
                                                for ($a=1; $a <= 1 ; $a++) {    
                                                      ?>
                                                        <div class="col-md-6">
                                                            <div class="m-portlet m-portlet--mobile ">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <h3 class="m-portlet__head-text">
                                                  Penumpang Dewasa <?php echo $i ?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                <div class="m-portlet__body">
                                                      <?php
                                                      $this->load->view('form/fpenumpang');
                                                      ?>
                                                      </div>
                                                         </div>
                            </div>
                                                    <?php
                                                }
                                            }
                                           ?>
                                    </div>


                             
          

                <div class="row">
                    <div class="col-md-12">
                        <div class="m-portlet m-portlet--mobile ">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <h3 class="m-portlet__head-text">
                                                  Simulasi Tempat Duduk
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                <div class="m-portlet__body">
                                    <center>
                                      <div id="btn-pilih-duduk" style="margin-top: -20px">

                                      </div>
                                        <div id="seat_area" style="margin-top: 10px">

                                        </div>
                                        </center>
                                        <div id="jumlahpenumpangnya">

                                        </div>
                                        <hr>
                                          Keterangan : Tersedia <img style="cursor:pointer;" src="<?php echo base_url('assets/images/bangkukosong.png') ?>" width="35" height="35">,
                                          Yang Dipilih <img style="cursor:pointer;" src="<?php echo base_url('assets/images/diduduki.png') ?>" width="35" height="35">,
                                          Sudah Terisi <img style="cursor:pointer;" src="<?php echo base_url('assets/images/terduduki.png') ?>" width="35" height="35">
    
                                </div>
                            </div>
                    </div>
                </div>


            </div>

<center><button type="submit" class="btn btn-success btn-anim"><i class="fa fa-credit-card"></i><span class="btn-text"> Pesan Sekarang</span></button> <a href="<?php echo site_url('tiket') ?>"><button type="submit" class="btn btn-danger btn-anim"><i class="fa fa-arrow-circle-left"></i><span class="btn-text"> Kembali</span></button></a></center>

</form>
            </div>

<?php
  $this->load->view('layouts/footer');
 ?>


<script type="text/javascript">
  var aktifnow = "pen0duk";

<?php
foreach ($jmltempatduduk as $a) {
  ?>
  var seat_qty = <?php echo $a ?>;
  <?php
}
 ?>


var penumpang = <?php echo $dewasa ?>;
// var seat_qty = 60;
var alfa = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
var kepake = [];
  <?php
    foreach ($seat_block as $s) {
    ?>
    var j = "<?php echo $s->seatblock ?>";
      kepake.push(j);
    <?php
    }
   ?>

var seats = [];
for (var i = 0; i < seat_qty; i++) {
  for (var j = 1; j <= 32; j++) {
    seats.push(j+alfa[i]);
  }
}




  $.each(seats,function(a, val){
    $('#seat_area').append('<img title="'+val+'" id="'+val+'" class="kursi" style="cursor:pointer;" src="<?php echo base_url('assets/images/bangkukosong.png') ?>" width="35" height="35">');

      $.each(kepake,function(a, vel){
        if (val == vel) {
          $('#'+val).attr('src','<?php echo base_url('assets/images/terduduki.png') ?>');
          $('.kursi').off('click');
        }   
      });

    if (a === seat_qty) return false;
  });

  $('.kursi').click(function(){

    if ($(this).attr('src') == '<?php echo base_url('assets/images/terduduki.png') ?>') {
      return false;
    }

    var select = $(this).closest('[id]').attr('id');
    // var numitem = $('.selected').length;
if ($('#'+select).hasClass('selected')) {
  return false
}
      if ($('.kursi').hasClass(aktifnow)) {
        $('.'+aktifnow).attr('src','<?php echo base_url('assets/images/bangkukosong.png') ?>');

        $('.'+aktifnow).removeClass('selected');
        $('.'+aktifnow).removeClass(aktifnow);

        $('#'+select).addClass(aktifnow);
      $('#'+select).addClass(aktifnow);
      $('#'+select).addClass('selected');

      $('#'+select).attr('src','<?php echo base_url('assets/images/diduduki.png') ?>');
    
        $('#'+aktifnow).val(select);
        $('#'+aktifnow+"span").text(select);


      }else{
   $('#'+select).addClass(aktifnow);
      $('#'+select).addClass(aktifnow);
      $('#'+select).addClass('selected');
      
        // $('[name="seat_code[]"]').val(select);
        $('#'+select).attr('src','<?php echo base_url('assets/images/diduduki.png') ?>');
        
        $('#'+aktifnow).val(select);

        $('#'+aktifnow+"span").text(select);
      
        
      }


  });

  $('img').tooltip();

function validateForm(){
  for (var i = 0; i < <?php echo $dewasa ?>; i++) {
    if ($('[name="seat_code['+i+']"]').val() == '') {
      swal({
        title: "Data Belum Lengkap",
        text: "Pilih Tempat Duduk",
        button: "Ok",
      });

    return false;
    }
  }


  // if ($('[name="seat_code[]"]').length < <?php echo $dewasa ?>) {
  // }
}


var dudukpen = <?php echo $this->input->post('dewasa') ?>;

  for (var i = 0; i < dudukpen; i++) {
    $('#btn-pilih-duduk').append('<button id="pen'+i+'" class="btn dudukpen">Penumpang '+ (i+1) +' <br> <span id="pen'+i+'dukspan">__</span></button> <input type="hidden" id="pen'+i+'duk" name="seat_code['+i+']">');
  }
$('#pen0').addClass('btn-primary');
$('.dudukpen').click(function(e){
  e.preventDefault();

var idnya = $(this).closest('[id]').attr('id');
  aktifnow = idnya+"duk";
  if ($('.dudukpen').hasClass('btn-primary') && !$('#'+idnya).hasClass('btn-primary')) {
    for (var i = 0; i < dudukpen; i++) {
      $('#pen'+i).removeClass('btn-primary');  
    }
    $('#'+idnya).addClass('btn-primary');
    
  }else{
    $('#'+idnya).addClass('btn-primary');
  }

});
</script>
