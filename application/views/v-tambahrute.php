<?php
$this->load->view('layouts/header');
$this->load->view('layouts/navigation1');
$this->load->view('layouts/navigation2');
 ?>

             <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- BEGIN: Subheader -->
                    <div class="m-subheader ">
                        <div class="d-flex align-items-center">
                            <div class="mr-auto">
                                <h3 class="m-subheader__title m-subheader__title--separator">
                                    Registrasi Rute Kereta
                                </h3>
                                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                                    <li class="m-nav__item m-nav__item--home">
                                        <a href="#" class="m-nav__link m-nav__link--icon">
                                            <i class="m-nav__link-icon la la-home"></i>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Dashboard
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Manage Orders
                                            </span>
                                        </a>
                                    </li>
                                    <li class="m-nav__separator">
                                        -
                                    </li>
                                    <li class="m-nav__item">
                                        <a href="" class="m-nav__link">
                                            <span class="m-nav__link-text">
                                                Latest Orders
                                            </span>
                                        </a>
                                    </li>
                                </ul>
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
                                                    Input Data
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                <div class="m-portlet__body">
                                  <?php
                                              $this->load->view('form/frute');
                                             ?>
                                             <center> <input type="submit" id="btnsimpan" class="btn btn-success" value="Simpan"> <buttom class="btn btn-danger btnbatal">Batal</buttom></center>
                                           </form>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>

                </div>
            </div>
<?php
  $this->load->view('layouts/footer');
 ?>



<script type="text/javascript">

$('[name="depart_at"]').blur(function(){
    if ($('[name="estp"]').val() == '') {

    }else{
        if (this.value >= $('[name="estp"]').val()) {
            swal('Peringatan','Waktu Pemberangkatan Tidak Boleh Lebih Atau Sama Dari Waktu Sampai!','warning');
            $('[name="depart_at"]').val('');
        }
    }
});

$('[name="estp"]').blur(function(){
    if ($('[name="depart_at"]').val() == '') {

    }else{
        if (this.value <= $('[name="depart_at"]').val()) {
            swal('Peringatan','Waktu Sampai Tidak Boleh Kurang Atau Sama Dari Waktu Pemberangkatan!','warning');
            $('[name="estp"]').val('');
        }
    }
});

$('#btnsimpan').click(function(e){
  e.preventDefault();

  if ($('[name="rute_from"]').val() == $('[name="rute_to"]').val()) {
    swal('Peringatan!','Kedua Rute Tidak Boleh Sama Satu Sama Lain!','warning');
    return false;
  }else if ($('[name="rute_from"]').val() == '' || $('[name="rute_to"]').val() == '' || $('[name="price"]').val() == '' ){
    swal('Peringatan!','Data Belum Lengkap!','warning');
    return false;
  }else{
      var url = $('#frute').attr('action');
      var data = $('#frute').serializeArray();
      $.post(url,data,function(){
        swal({
            title: "Berhasil!",
            text: "Masukan Data Lagi ?",
            type: "success",
            showCancelButton: true,
            confirmButtonColor: "#f8b32d",
            confirmButtonText: "Ya, masukan data lagi!",
            cancelButtonText: "Tidak",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm){
            if (isConfirm) {
              $('#frute')[0].reset();
              swal.close();
            } else {
                url : "<?php echo site_url('rute')?>/",
                window.location.href = url
            }
        });
      });
    
  }
  



});

    $('.select-beast').select2();


</script>
