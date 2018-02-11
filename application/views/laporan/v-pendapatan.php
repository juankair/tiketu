<?php
$this->load->view('layouts/header');
$this->load->view('layouts/navigation1');
$this->load->view('layouts/navigation2');
 ?>

           <div class="m-grid__item m-grid__item--fluid m-wrapper">
          <div class="m-subheader-search">
            <h2 class="m-subheader-search__title">
              Laporan Pendapatan
              <span class="m-subheader-search__desc">
                Bagian Keuangan
              </span>
            </h2>
          </div>
          <div class="m-content">
            <div class="buttonset" style="margin-bottom: 10px">
              <button class="btn btn-primary" onclick="keseluruhan()">Keseluruhan</button>
              <button class="btn btn-primary" onclick="showpesawat()">Pesawat</button>
              <button class="btn btn-primary" onclick="showkereta()">Kereta Api</button>
              <div class="pull-right">
                <select class="form-control" id="setthn">
                  <?php 
                  $p = date('Y') - 3;
                  $s = date('Y') + 6;
                  for ($i=$p; $i < $s ; $i++) { 
                    ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php
                  }
                   ?>
                </select>
              </div>
              <div class="pull-right">
                <select class="form-control" id="setbln">
                  <option value="-01-">Januari</option>
                  <option value="-02-">Februari</option>
                  <option value="-03-">Maret</option>
                  <option value="-04-">April</option>
                  <option value="-05-">Mei</option>
                  <option value="-06-">Juni</option>
                  <option value="-07-">Juli</option>
                  <option value="-08-">Agustus</option>
                  <option value="-09-">September</option>
                  <option value="-10-">Oktober</option>
                  <option value="-11-">November</option>
                  <option value="-12-">Desember</option>
                </select>
              </div>
            </div>
                                <div class="m-portlet m-portlet--mobile ">
                                <div class="m-portlet__body">
                                   <div class="row m-row--no-padding m-row--col-separator-xl">
                  <div class="col-md-4">
                    <!--begin:: Widgets/Stats2-1 -->
                    <div class="m-widget1">
                      <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                          <div class="col">
                            <h3 class="m-widget1__title">
                              Pendapatan 
                            </h3>
                            <span class="m-widget1__desc">
                              Sepanjang Waktu
                            </span>
                          </div>
                          <div class="col m--align-right">
                            <span class="m-widget1__number m--font-brand">
                              <p id="kisitotal"></p>
                            </span>
                          </div>
                        </div>
                      </div>
                      <div class="m-widget1__item">
                        <div class="row m-row--no-padding align-items-center">
                          <div class="col">
                            <h3 class="m-widget1__title">
                              Penjualan <span></span>
                            </h3>
                            <span class="m-widget1__desc">
                              Sepanjang Waktu
                            </span>
                          </div>
                          <div class="col m--align-right">
                            <span class="m-widget1__number m--font-danger">
                              <p id="jmlpenjualan"></p>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--end:: Widgets/Stats2-1 -->
                  </div>
                  <div class="col-md-8">
      
                <table class="table table-bordered table-stripped" id="tpendapatan">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Dari</th>
                      <th>Ke</th>
                      <th>Nama</th>
                      <th>Transportasi</th>
                      <th>Biaya</th>
                      <th style="display: none;">Type</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php 
                  for ($i=0; $i < count($datana); $i++) { 
                    foreach ($datajadi as $dj) {
                      ?>
                      <tr>
                        <td><?php echo $i+1 ?></td>
                        <td><?php echo $dj[$i][0] ?></td>
                        <td><?php echo $dj[$i][1] ?></td>
                        <td><?php echo $dj[$i][2] ?></td>
                        <td><?php echo $dj[$i][3] ?></td>
                        <td><?php echo $dj[$i][4] ?></td>
                        <td><?php echo $dj[$i][5] ?></td>
                        <td style="display: none;"><?php echo $dj[$i][6] ?></td>
                      </tr>
                      <?php
                    }
                  }
                 ?>
                  </tbody>
                </table><hr>
                <h3>
                  Total
                  <div class="pull-right">
                    <p id="isitotal"></p>
                </h3> 
                  </div>
                </div>
  
  </div>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->

                    
                </div>
            </div>

<?php
  $this->load->view('layouts/footer');
 ?>

<script>
  var currentYear = (new Date).getFullYear();
  // console.log(currentYear);
$("#setthn option[value='"+currentYear+"']").attr("selected","selected");

  var table = $('#tpendapatan').DataTable({
    "pageLength": 5,
     dom: 'Bfrtip',
  buttons: [
        { extend: 'copy', className: 'btn btn-success' },
        { extend: 'csv', className: 'btn btn-success' },
        { extend: 'excel', className: 'btn btn-success' },
        { extend: 'pdf', className: 'btn btn-success' },
        { extend: 'print', className: 'btn btn-success' },
  ]
  });

$('.dt-button').css('margin-right','5px');
$('.dt-button').css('margin-bottom','10px');

$(".dataTables_length select").remove();
$('.dataTables_filter input').remove();
$('.dataTables_filter label').remove();
$('#tpendapatan thead th').css('border-bottom','none');
$('#tpendapatan.no-footer').css('border-bottom','none');

$('#isitotal').text(accounting.formatMoney(table.columns( 6 ).data().sum()));
$('#kisitotal').text(accounting.formatMoney(table.columns( 6 ).data().sum()));
$('#jmlpenjualan').text(table.rows().count());

function keseluruhan(){  
  $('#tpendapatan').dataTable().fnFilter('',7);

  $('#isitotal').text(accounting.formatMoney(table.columns(6,{filter:'applied'}).data().sum()));
}
function showpesawat(){
  $('#tpendapatan').dataTable().fnFilter('1',7);

  $('#isitotal').text(accounting.formatMoney(table.columns(6,{filter:'applied'}).data().sum()));
}
function showkereta(){
    $('#tpendapatan').dataTable().fnFilter('2',7);

  $('#isitotal').text(accounting.formatMoney(table.columns(6,{filter:'applied'}).data().sum()));
}

$('#setthn').on('change',function(){
  $('#tpendapatan').dataTable().fnFilter(this.value,1);

  $('#isitotal').text(accounting.formatMoney(table.columns(6,{filter:'applied'}).data().sum()));
});

$('#setbln').on('change',function(){
  $('#tpendapatan').dataTable().fnFilter(this.value,1);

  $('#isitotal').text(accounting.formatMoney(table.columns(6,{filter:'applied'}).data().sum()));
});

</script>