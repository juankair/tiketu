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
                                <h3 class="m-subheader__title m-subheader__title">
                                    Laporan Penjualan Tiket
                                </h3>
                            </div>
                        </div>
                    </div>
                    <!-- END: Subheader -->
                    <div class="m-content">
                    <div class="row">
                        <div class="col-md-12">
                                <div class="m-portlet m-portlet--mobile ">
                                <div class="m-portlet__body">
                                   <table id="tablelistpenjualantiket">
                                       <thead>
                                           <tr>
                                             <th>No</th>
                                             <th>Nama</th>
                                             <th>Alamat</th>
                                             <th>Telp</th>
                                             <th>Jenis Kelamin</th>
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

                </div>
            </div>

<?php
  $this->load->view('layouts/footer');
 ?>

<script>

var table;

table = $('#tablelistpenjualantiket').DataTable({
  dom: 'Bfrtip',
  buttons: [
        { extend: 'copy', className: 'btn btn-success' },
        { extend: 'csv', className: 'btn btn-success' },
        { extend: 'excel', className: 'btn btn-success' },
        { extend: 'pdf', className: 'btn btn-success' },
        { extend: 'print', className: 'btn btn-success' },
  ],

    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": "<?php echo site_url('laporan/list_penjualantiket')?>",
        "type": "POST"
    }

});

$(".dataTables_length select").addClass('form-control');
$('.dataTables_filter input').addClass('form-control');
$('.dataTables_filter span').addClass('btn');


$('.dt-button').css('margin-right','5px');
</script>