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
                                    Registrasi Transportasi
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
                                    <?php $this->load->view('form/ftransportasi') ?>
                                    <center> <input type="submit" id="btnsimpan" class="btn btn-success" value="Simpan"> <buttom class="btn btn-danger btnbatal" onclick="location.href='<?php echo site_url('transportasi') ?>'">Batal</buttom></center>
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

 $('#btnsimpan').click(function(e){
   e.preventDefault();
   var url = $('#ftransportasi').attr('action');
   var data = $('#ftransportasi').serializeArray();
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
           $('#ftransportasi')[0].reset();
           swal.close();
         } else {
             url : "<?php echo site_url('transportasi')?>/",
             window.location.href = url
         }
     });
   });
 });

 var idtrans = $('[name="transportation_typeid"]').val();
 if (idtrans == "1") {
   idtrans = "P";
 }else{
   idtrans = "K";
 }
 var des = "";
 $('[name="description"]').keyup(function(){
   if (idtrans == "1") {
     idtrans = "P";
   }else if (idtrans == "2") {

     idtrans = "K";
   }
   des = $('#des').val();


   var d = new Date();
   var y = d.getFullYear();
   var m = d.getMonth();
   var jd = idtrans + des.substring(0,3).toUpperCase() + y;
   $('[name="code"]').val(jd);
 });

 var jd = idtrans + des;
 $('[name="code"]').val(jd);

 console.log(jd);


 $('[name="description"]').blur(function(){
   des = $('#des').val();


   var d = new Date();
   var y = d.getFullYear();
   var m = d.getMonth();
   var jd = idtrans + des.substring(0,3).toUpperCase() + y;

   $.ajax({
       url : "<?php echo site_url('transportasi/geturut')?>/" + jd,
       type: "GET",
       dataType: "JSON",

       success: function(data)
       {
         $('[name="code"]').val(jd + data);
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
           alert('Error get data from ajax');
       }
   });
 });
 $('[name="transportation_typeid"]').change(function(){
   if ($('[name="transportation_typeid"]').val() == "1") {
    var a = $('[name=code]').val();
    var b = a.replace('K','P'); 
     $('[name="code"]').val(b);
     idtrans = "P";
   }else{
    var a = $('[name=code]').val();
    var b = a.replace('P','K'); 
     $('[name="code"]').val(b);
    idtrans = "K";
   }
   des = $('#des').val();


   var d = new Date();
   var y = d.getFullYear();
   var m = d.getMonth();
   var jd = idtrans + des.substring(0,3).toUpperCase() + y;

   $.ajax({
       url : "<?php echo site_url('transportasi/geturut')?>/" + jd,
       type: "GET",
       dataType: "JSON",

       success: function(data)
       {
         $('[name="code"]').val(jd + data);
       },
       error: function (jqXHR, textStatus, errorThrown)
       {
           alert('Error get data from ajax');
       }
   });
 });
 </script>
