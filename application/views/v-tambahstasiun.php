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
                                    Registrasi stasiun
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
                                    <?php $this->load->view('form/fstasiun') ?>
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


$('[name="abbr"]').on('keyup',function(){
    var a = $(this).val().toUpperCase();
    $('[name="id"]').val('ST'+a);
});


$('#btnsimpan').click(function(e){
  e.preventDefault();
  if ($('[name="abbr"]').val().length == 3) {
      var url = $('#fstasiun').attr('action');
      var data = $('#fstasiun').serializeArray();
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
              $('#fstasiun')[0].reset();
              swal.close();
            } else {
                url : "<?php echo site_url('stasiun')?>/",
                window.location.href = url
            }
        });
      });
  }else{
    swal("Peringatan","Singkatan Harus Memuat 3 Karakter!");
  }
});

</script>
