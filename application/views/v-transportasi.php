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
                                    Data Master Transportasi
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
                                                    Data
                                                    <?php 
                                                        if ($tipe == "1") {
                                                            echo "Pesawat";
                                                        }else{
                                                            echo "Kereta Api";
                                                        }
                                                     ?>
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
                                                                                <a href="<?php echo site_url('transportasi/registrasi_transportasi') ?>" class="m-nav__link">
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
                                        <table class="table" id="tablelisttransportasi">
                                            <thead>
                                              <tr>
                                                <th>Kode</th>
                                                <th>Deskripsi</th>
                                                <th>Kursi</th>
                                                <th>Tipe</th>
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



        <!-- Bootstrap modal -->
        <div class="modal fade" id="modal_form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Update Data transportasi</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <?php $this->load->view('form/ftransportasi') ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <!-- End Bootstrap modal -->

<?php
  $this->load->view('layouts/footer');
 ?>



<script type="text/javascript">
var table;
var tipeshow = "<?php echo $tipe ?>";

table = $('#tablelisttransportasi').DataTable({

    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": "<?php echo site_url('transportasi/list_transportasi/')?>"+tipeshow,
        "type": "POST"
    }

});


    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax
    }

    function edit_transportasi(kode)
    {
        $('#ftransportasi')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('transportasi/ajax_edit/')?>" + kode,
            type: "GET",
            dataType: "JSON",

            success: function(data)
            {
                $('[name="id"]').val(data.id);
                $('[name="code"]').val(data.code);
                $('[name="description"]').val(data.description);
                $('[name="seat_qty"]').val(data.seat_qty);
                $('[name="transportation_typeid"]').val(data.transportation_typeid);
                $('#modal_form').modal('show');
                $('.modal-title').text('Update Data transportasi');

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

$(".dataTables_length select").addClass('form-control');
$('.dataTables_filter input').addClass('form-control');

    function save()
    {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable
        var url;
            url = "<?php echo site_url('transportasi/ajax_update')?>";

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#ftransportasi').serialize(),
            dataType: "JSON",
            success: function(data)
            {

                if(data.status) //if success close modal and reload ajax table
                {
                  swal({
                title: "Berhasil!",
                       type: "success",
                text: "Update data transportasi berhasil!",
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


function delete_transportasi(kode){
  swal({
      title: "Apakah Anda Yakin?",
      text: "Data transportasi akan terhapus secara permanen!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#f8b32d",
      confirmButtonText: "Ya, Hapus ini!",
      cancelButtonText: "Tidak, Batalkan!",
      closeOnConfirm: false,
      closeOnCancel: false
  }, function(isConfirm){
      if (isConfirm) {
          swal("Berhasil Dihapus!", "Data transportasi yang anda pilih sudah terhapus", "success");

          $.ajax({
              url : "<?php echo site_url('transportasi/hapus_transportasi')?>/"+kode,
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