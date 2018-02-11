<?php
$this->load->view('layouts/header');
$this->load->view('layouts/navigation1');
$this->load->view('layouts/navigation2');
 ?>
 <form id="fcheckout" action="<?php echo site_url('tiket/simpan') ?>" method="post">


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
                    <div class="row printini">
                            <?php 
                                  for ($i=0; $i < $this->input->post('tdewasa'); $i++) {
                             ?>
                        <div class="col-md-12">
                                <div class="m-portlet m-portlet--mobile ">
                                    <div class="m-portlet__head">
                                        <div class="m-portlet__head-caption">
                                            <div class="m-portlet__head-title">
                                                <h3 class="m-portlet__head-text">
                                                    #Order<?php echo $i+1 ?> | Tiketu   
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="m-portlet__head-tools">
                                            <ul class="m-portlet__nav">
                                                <li class="m-portlet__nav-item">
                                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
                                                        <h3 class="m-portlet__head-text">
                                                            <input type="hidden" name="kodetiket[]" value="<?php echo $koderes.$this->input->post('seat_code['.$i.']') ?>">[<?php echo $koderes.$this->input->post('seat_code['.$i.']') ?>]
                                                        </h3>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                <div class="m-portlet__body">
                                          <div class="row">
                                            
              <div class="col-md-4">
                <h4><?php echo $this->input->post('tnama') ?></h4> <input type="hidden" name="ruteid" value="<?php echo $this->input->post('idrute') ?>">
              </div>
              <div class="col-md-5"></div>
              <div class="col-md-3"><h5 class="idrtiket"> ?></h5></div>
            </div>
            <div class="row">
              <div class="col-md-4">Nomor Kursi :<input type="hidden" name="seat_code[]" value="<?php echo $this->input->post('seat_code['.$i.']') ?>"> <?php echo $this->input->post('seat_code['.$i.']') ?></div>
            </div><br>
            <div class="row">
              <div class="col-md-2"><b>Atas Nama</b></div><div class="col-md-3">: <?php echo $this->input->post('name['.$i.']') ?></div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-2">Tanggal</div><div class="col-md-3">: <input type="hidden" name="reservation_date" value="<?php echo date('Y-m-d') ?>"><?php echo date('Y-m-d') ?></div>
            </div>
            <div class="row">
              <div class="col-md-2">Keberangkatan</div><div class="col-md-3">: <input type="hidden" name="depart_at" value="<?php echo $this->input->post('twaktu') ?>"><?php echo $this->input->post('twaktu') ?></div>
            </div>    
            <hr>
              Biaya Layanan Pemesanan <div class="pull-right idrbiaya">Rp. 2.500,00</div><br>
              PPh 5% <div class="pull-right idrpajak"></div><br>
          Total Pembayaran <input type="hidden" name="price" class="idrtotalj"><div class="pull-right idrtotal">IDR </div>
          
                                </div>
                            </div>
                        </div>

    <input type="hidden" name="name[]" value="<?php echo $this->input->post('name['.$i.']') ?>">
    <input type="hidden" name="address[]" value="<?php echo $this->input->post('address['.$i.']') ?>">
    <input type="hidden" name="phone[]" value="<?php echo $this->input->post('phone['.$i.']') ?>">
    <input type="hidden" name="gander[]" value="<?php echo $this->input->post('gander['.$i.']') ?>">

                            <?php } ?>
                            <!-- END EXAMPLE TABLE PORTLET-->
                    </div>

                
                </div>
                 <center><button type="submit" id="btnsimpan" class="btn btn-success btn-anim"><i class="fa fa-credit-card"></i><span class="btn-text"> Bayar Sekarang</span></button> </center>


    </form>

            </div>


   
<?php
  $this->load->view('layouts/footer');
 ?>


<script type="text/javascript">
  var a = <?php echo $this->input->post('tharga') ?>;
  var b = <?php echo $this->input->post('tharga') ?>;

  var c = b*5/100;
$('.idrtiket').text(accounting.formatMoney(a));
$('.idrpajak').text(accounting.formatMoney(c));
$('.idrtotal').text(accounting.formatMoney(a + c + 2500));
$('.idrtotalj').val(a + c + 2500);



$('#btnsimpan').click(function(e){
  e.preventDefault();
  var url = $('#fcheckout').attr('action');
  var data = $('#fcheckout').serializeArray();
  $.post(url,data,function(){
    swal({
        title: "Berhasil!",
        text: "Print faktur pembayaran ?",
        type: "success",
        showCancelButton: true,
        confirmButtonColor: "#f8b32d",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function(isConfirm){
        if (isConfirm) {
          $.print(".printini");
        } else {
            url : "<?php echo site_url('tiket/kereta')?>/",
            window.location.href = url
        }
    });
  });
});

</script>
