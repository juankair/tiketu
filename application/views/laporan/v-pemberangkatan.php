<?php
$this->load->view('layouts/header');
$this->load->view('layouts/navigation1');
$this->load->view('layouts/navigation2');
 ?>

           <div class="m-grid__item m-grid__item--fluid m-wrapper">
          <div class="m-subheader-search">
            <h2 class="m-subheader-search__title">
              Laporan Pemberangkatan
              <span class="m-subheader-search__desc">
                Bagian Pengelolaan
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
                              Pemberangkatan 
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
                    </div>
                    <!--end:: Widgets/Stats2-1 -->
                  </div>
                  <div class="col-md-8">
      
                <table class="table table-bordered table-stripped" id="tpemberangkatan">
                  <thead>
                    <tr>
                      <th style="display: none;">No</th>
                      <th>Dari</th>
                      <th>Nama</th>
                      <th>Ke</th>
                      <th>Waktu</th>
                      <th>Harga</th>
                      <th>Kursi</th>
                      <th>Dipesan</th>
                      <th style="display: none;">Type</th>
                      <th style="display: none;">Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                   <?php 
                  for ($i=0; $i < count($datana); $i++) { 
                    foreach ($datajadi as $dj) {
                      ?>
                      <tr>
                        <td style="display: none;"><?php echo $i+1 ?></td>
                        <td><?php echo $dj[$i][0] ?></td>
                        <td><?php echo $dj[$i][1] ?></td>
                        <td><?php echo $dj[$i][2] ?></td>
                        <td><?php echo $dj[$i][3] ?> - <?php echo $dj[$i][9] ?></td>
                        <td><?php echo $dj[$i][4] ?></td>
                        <td><?php echo $dj[$i][5] ?></td>
                        <td><?php echo $dj[$i][6] ?></td>
                        <td style="display: none;"><?php echo $dj[$i][7] ?></td>
                        <td style="display: none;"><?php echo $dj[$i][8] ?></td>
                      </tr>
                      <?php
                    }
                  }
                 ?>
                  </tbody>
                </table><hr>
              
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

var table = $('#tpemberangkatan').DataTable({
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

$('#isitotal').text(accounting.formatMoney(table.columns( 7 ).data().sum()));
$('#kisitotal').text(table.columns( 7 ).data().sum());
$('#jmlpenjualan').text(table.rows().count());

function keseluruhan(){  
  $('#tpemberangkatan').dataTable().fnFilter('',8);

  $('#isitotal').text(accounting.formatMoney(table.columns(5,{filter:'applied'}).data().sum()));
}
function showpesawat(){
  $('#tpemberangkatan').dataTable().fnFilter('1',8);

  $('#isitotal').text(accounting.formatMoney(table.columns(5,{filter:'applied'}).data().sum()));
}
function showkereta(){
    $('#tpemberangkatan').dataTable().fnFilter('2',8);

  $('#isitotal').text(accounting.formatMoney(table.columns(5,{filter:'applied'}).data().sum()));
}

$('#setthn').on('change',function(){
  $('#tpemberangkatan').dataTable().fnFilter(this.value,9);

});

$('#setbln').on('change',function(){
  $('#tpemberangkatan').dataTable().fnFilter(this.value,9);

});
</script>