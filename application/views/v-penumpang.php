<?php
$this->load->view('layouts/header');
$this->load->view('layouts/navigation1');
$this->load->view('layouts/navigation2');
 ?>

            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>Data penumpang
                                <small>statistics, charts, recent events and reports</small>
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">penumpang</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->

                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase"> Data Master</span>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <div class="btn-group pull-right">
                                                    <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                        <i class="fa fa-angle-down"></i>
                                                    </button>
                                                    <ul class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-print"></i> Print </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;">
                                                                <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="tablelistpenumpang">
                                        <thead>
                                            <tr>
                                                <th> No</th>
                                                <th> Nama </th>
                                                <th> Alamat </th>
                                                <th> Telp </th>
                                                <th> Jenis Kelamin </th>
                                                <th> Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>


                    <div class="modal fade" id="modal_form" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <h3 class="modal-title">Update Data penumpang</h3>
                              </div>
                              <div class="modal-body">
                                <form id="fpenumpang" action="<?php echo site_url('penumpang/simpan') ?>">
                                <?php $this->load->view('form/fpenumpang') ?>
                                </form>
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

 table = $('#tablelistpenumpang').DataTable({

     "processing": true, //Feature control the processing indicator.
     "serverSide": true, //Feature control DataTables' server-side processing mode.
     "order": [], //Initial no order.

     // Load data for the table's content from an Ajax source
     "ajax": {
         "url": "<?php echo site_url('penumpang/list_penumpang')?>",
         "type": "POST"
     }

 });

     function reload_table()
     {
         table.ajax.reload(null,false); //reload datatable ajax
     }

     function edit_penumpang(kode)
     {
         $('#fpenumpang')[0].reset(); // reset form on modals
         $('.form-group').removeClass('has-error'); // clear error class
         $('.help-block').empty(); // clear error string

         //Ajax Load data from ajax
         $.ajax({
             url : "<?php echo site_url('penumpang/ajax_edit/')?>/" + kode,
             type: "GET",
             dataType: "JSON",
             success: function(data)
             {
                 $('[name="id"]').val(data.id);
                 $('[name="name[]"]').val(data.name);
                 $('[name="address[]"]').val(data.address);
                 $('[name="phone[]"]').val(data.phone);
                 $('[name="gander[]"]').val(data.gander);
                 $('#modal_form').modal('show');
                 $('.modal-title').text('Update Data penumpang');

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
             url = "<?php echo site_url('penumpang/ajax_update')?>";

         // ajax adding data to database
         $.ajax({
             url : url,
             type: "POST",
             data: $('#fpenumpang').serialize(),
             dataType: "JSON",
             success: function(data)
             {

                 if(data.status) //if success close modal and reload ajax table
                 {
                   swal({
           			title: "Berhasil!",
                 type: "success",
           			text: "Update data penumpang berhasil!",
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


 function delete_penumpang(kode){
   swal({
       title: "Apakah Anda Yakin?",
       text: "Data penumpang akan terhapus secara permanen!",
       type: "warning",
       showCancelButton: true,
       confirmButtonColor: "#f8b32d",
       confirmButtonText: "Ya, Hapus ini!",
       cancelButtonText: "Tidak, Batalkan!",
       closeOnConfirm: false,
       closeOnCancel: false
   }, function(isConfirm){
       if (isConfirm) {
           swal("Berhasil Dihapus!", "Data penumpang yang anda pilih sudah terhapus", "success");

           $.ajax({
               url : "<?php echo site_url('penumpang/hapus_penumpang')?>/"+kode,
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

 </script>
