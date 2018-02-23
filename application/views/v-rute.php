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
                                    Data Master Rute
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
                                                    List Data
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="m-portlet__head-tools">
                                            <ul class="m-portlet__nav">
                                                <li class="m-portlet__nav-item">
                                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
                                                        <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                                            <i class="la la-ellipsis-h m--font-brand"></i>
                                                        </a>
                                                        <div class="m-dropdown__wrapper">
                                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                            <div class="m-dropdown__inner">
                                                                <div class="m-dropdown__body">
                                                                    <div class="m-dropdown__content">
                                                                        <ul class="m-nav">
                                                                            <li class="m-nav__section m-nav__section--first">
                                                                                <span class="m-nav__section-text">
                                                                                    Quick Actions
                                                                                </span>
                                                                            </li>
                                                                            <li class="m-nav__item">
                                                                                <a href="<?php echo site_url('rute/registrasi_rute'.$sts.'') ?>" class="m-nav__link">
                                                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                                                    <span class="m-nav__link-text">
                                                                                        Tambahkan Data
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="m-portlet__body">
                                    <table class="table table-hover" id="tablelistrute">
                                        <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>Jam Berangkat</th>
                                            <th>Jam Sampai</th>
                                            <th>Rute Dari</th>
                                            <th>Rute Ke</th>
                                            <th>Harga</th>
                                            <th>Nama Transportasi</th>
                                            <th>Tools</th>
                                          </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
      
                    </div>
                </div>

                    <div class="modal fade" id="modal_form" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <h3 class="modal-title">Update Data rute</h3>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <?php $this->load->view('form/frute') ?>
                              </div>
                                <div class="modal-footer">
                                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>




                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->










<?php
  $this->load->view('layouts/footer');
 ?>


 <script type="text/javascript">
 var table;
var u = "<?php echo $sts ?>";
if (u == "kereta") {
    var url = "<?php echo site_url('rute/list_rute/2') ?>";
}else{
    var url = "<?php echo site_url('rute/list_rute/1') ?>";
}
 table = $('#tablelistrute').DataTable({

     "processing": true, //Feature control the processing indicator.
     "serverSide": true, //Feature control DataTables' server-side processing mode.
     "order": [], //Initial no order.

     // Load data for the table's content from an Ajax source
     "ajax": {
         "url": url,
         "type": "POST"
     }

 });

$(".dataTables_length select").addClass('form-control');
$('.dataTables_filter input').addClass('form-control');
     function reload_table()
     {
         table.ajax.reload(null,false); //reload datatable ajax
     }

     function edit_rute(kode)
     {
         $('#frute')[0].reset(); // reset form on modals
         $('.form-group').removeClass('has-error'); // clear error class
         $('.help-block').empty(); // clear error string

         //Ajax Load data from ajax
         $.ajax({
             url : "<?php echo site_url('rute/ajax_edit/')?>/" + kode,
             type: "GET",
             dataType: "JSON",

             success: function(data)
             {
                 $('[name="id"]').val(data.id);
                 $('[name="depart_at"]').val(data.depart_at);
                 $('[name="rute_to"]').val(data.rute_to);
                 $('[name="rute_from"]').val(data.rute_from);
                 $('[name="price"]').val(data.price);
                 $('[name="transportationid"]').val(data.transportationid);
                 $('[name="estp"]').val(data.estp);
                 $('#modal_form').modal('show');
                 $('.modal-title').text('Update Data rute');

             },
             error: function (jqXHR, textStatus, errorThrown)
             {
                 alert('Error get data from ajax');
             }
         });
     }


     function save()
     {
         $('#btnSave').text('saving...'); //change button text
         $('#btnSave').attr('disabled',true); //set button disable
         var url;
             url = "<?php echo site_url('rute/ajax_update')?>";

         // ajax adding data to database
         $.ajax({
             url : url,
             type: "POST",
             data: $('#frute').serialize(),
             dataType: "JSON",
             success: function(data)
             {

                 if(data.status) //if success close modal and reload ajax table
                 {
                   swal({
           			title: "Berhasil!",
                        type: "success",
           			text: "Update data rute berhasil!",
           			confirmButtonColor: "#4aa23c",
                   });
                     $('#modal_form').modal('hide');
                     reload_table();
                 }
                 else
                 {
                     for (var i = 0; i < data.inputerror.length; i++)
                     {
                         $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                         $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                     }
                 }
                 $('#btnSave').text('save'); //change button text
                 $('#btnSave').attr('disabled',false); //set button enable


             },
             error: function (jqXHR, textStatus, errorThrown)
             {
                 alert('Error adding / update data');
                 $('#btnSave').text('save'); //change button text
                 $('#btnSave').attr('disabled',false); //set button enable

             }
         });
     }


 function delete_rute(kode){
   swal({
       title: "Apakah Anda Yakin?",
       text: "Data rute akan terhapus secara permanen!",
       type: "warning",
       showCancelButton: true,
       confirmButtonColor: "#f8b32d",
       confirmButtonText: "Ya, Hapus ini!",
       cancelButtonText: "Tidak, Batalkan!",
       closeOnConfirm: false,
       closeOnCancel: false
   }, function(isConfirm){
       if (isConfirm) {
           swal("Berhasil Dihapus!", "Data rute yang anda pilih sudah terhapus", "success");

           $.ajax({
               url : "<?php echo site_url('rute/hapus_rute')?>/"+kode,
               type: "POST",
               dataType: "JSON",
               success: function(data)
               {
                   reload_table();
               },
               error: function (jqXHR, textStatus, errorThrown)
               {
                   alert('Error Saat Menghapus');
               }
           });
       } else {
           swal("Dibatalkan", "Data aman tidak terhapus", "error");
       }
   });
 return false;
 }

    $('.select-beast').selectize({
    sortField: 'text'
    })

$('.bwabwa').select2();


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
 </script>
