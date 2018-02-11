<?php
  $this->load->view('layouts/header');
  $this->load->view('layouts/navigation1');
  $this->load->view('layouts/navigation2');
?>
<style>
  .modal-nya {
  width: 750px;
  margin: auto;
}
</style>
<div class="m-grid__item m-grid__item--fluid m-wrapper">
          <div class="m-subheader-search">
            <h2 class="m-subheader-search__title">
              Pencarian Rute
              <span class="m-subheader-search__desc">
                Pengelolaan Tiket Kereta Api
              </span>
            </h2>
            <form class="m-form">
              <div class="m-grid m-grid--ver-desktop m-grid--desktop">
                <div class="m-grid__item m-grid__item--middle">
                  <div class="m-input-icon m-input-icon--fixed m-input-icon--fixed-md m-input-icon--right">
                 <select class="select-beast demo-default" name="from">
                    <option value="">Semua Data</option>
                    <?php 
                    $u = 0;
                      foreach ($dari as $d) {
                        ?>
                    <option><?php echo $d ?></option>
                        <?php
                        $u++;
                      }
                     ?>
                  </select>
                     <span class="m-input-icon__icon m-input-icon__icon--right">
                      <span>
                        <i class="la la-calendar-check-o"></i>
                      </span>
                    </span>
                  </div>

                  <div class="m-input-icon m-input-icon--fixed m-input-icon--fixed-md m-input-icon--right">
                    <select class="select-beast demo-default" name="to">
                    <option value="">Semua Data</option>
                    <?php 
                    $a = 0;
                      foreach ($ke as $k) {
                        ?>
                    <option><?php echo $k ?></option>
                        <?php
                      $a++;
                      }
                        function ubahto($txt){
                          return "test";
                        }
                     ?>
                  </select>
                    <span class="m-input-icon__icon m-input-icon__icon--right">
                      <span>
                        <i class="la la-calendar-check-o"></i>
                      </span>
                    </span>
                  </div>
                </div>

                <div class="m-grid__item m-grid__item--middle">
                  <div class="m--margin-top-20 m--visible-tablet-and-mobile"></div>
                  <button type="button" onclick="resetfilter()" class="btn m-btn--pill m-subheader-search__submit-btn">
                    Reset Filter Pencarian
                  </button>
                </div>
              </div>
            </form>
          </div>
          <div class="m-content">
            <!--Begin::Section-->

            <div class="row">
              <div class="col-md-12">
                <div class="m-portlet">
                  <div class="m-portlet__body  m-portlet__body">
                    
                  <table id="tablekereta" class="table table-hover" >
              <thead>
                <tr>
                  <th style="display: none;">ID</th>
                  <th>Jam Pergi</th>
                  <th>Jam Sampai</th>
                  <th>Dari</th>
                  <th>Ke</th>
                  <th>Harga</th>
                  <th>Nama</th>
                  <th>Pilih</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  for ($i=0; $i < count($datana); $i++) { 
                    foreach ($datajadi as $dj) {
                      ?>
                      <tr>
                        <td style="display: none;"><?php echo $dj[$i][0] ?></td>
                        <td><?php echo $dj[$i][1] ?></td>
                        <td><?php echo $dj[$i][6] ?></td>
                        <td><?php echo $dj[$i][2] ?></td>
                        <td><?php echo $dj[$i][3] ?></td>
                        <td><?php echo $dj[$i][4] ?></td>
                        <td><?php echo $dj[$i][5] ?></td>
                        <td><?php echo $dj[$i][7] ?></td>
                      </tr>
                      <?php
                    }
                  }
                 ?>
              </tbody>
            </table>
                    <!-- <div class="m_datatable_pesawat" id="datatablePesawat"></div> -->
                  </div>
                </div>
              </div>

            </div>
            <!--End::Section-->
          </div>
        </div>
      </div>
      <!-- end:: Body -->


          <!-- Bootstrap modal -->
          <div class="modal fade modal-lg modal-nya" id="modal_conf" style="width:1250px;" role="dialog" tabindex="-1">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Rangkuman Pilihan</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-text="true">&times;</span></button>
                      </div>
                      <div class="modal-body">
                        <form action="<?php echo site_url('tiket/order') ?>" method="post">
                        <div class="row">
                          <div class="col-md-6">
                            <h5><span id="rdari"></span> <i class="fa fa-arrow-right"></i> <span id="rke"></span> [<span id="rwaktu"></span>] <br></h5>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label mb-2">Dewasa</label>
                                <select class="selectpicker form-control" id="cdewasa" name="dewasa">
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                </select>
                              </div>
                            </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label mb-2">Anak < 3thn</label>
                                  <select class="form-control" id="canak" name="anak">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                  </select>
                              </div>
                            </div>

                          </div>

                          <div class="row">
                            <div class="col-md-6"><h6><span id="rnama"></span></h6><br></div>
                          </div>
                          <div class="row">
  Jam Sampai : &nbsp;<span id="restp"></span>
</div>
                        </div>

<input type="hidden" name="idrute" class="rrute" value="">
<input type="hidden" name="waktu" class="rwaktu" value="">
<input type="hidden" name="dari" class="rdari" value="">
<input type="hidden" name="ke" class="rke" value="">
<input type="hidden" name="harga" class="rharga" value="">
<input type="hidden" name="nama" class="rnama" value="">
<input type="hidden" name="estp" class="restp" value="">

                      <div class="modal-footer">
                        <div class="pull-left">Harga Tiket : <span id="rharga"></span></div>
                          <button type="submit" class="btn btn-success btn-anim"><i class="fa fa-shopping-cart"></i><span class="btn-text"> Pesan Sekarang</span></button>
                        </form>
                      </div>
                  </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->
          <!-- End Bootstrap modal -->

<?php $this->load->view('layouts/footer'); ?>
  
<script type="text/javascript">
  'use strict';
  var table;

  $('#tablepesawat').dataTable({
    searching:true,
    bLengthChange : false
  });




function makedtgreatagain(){
  $(".dataTables_length select").remove();
  $('.dataTables_filter input').remove();
  $('.dataTables_filter label').remove();
  $('#tablekereta thead th').css('border-bottom','none');
  $('#tablekereta.no-footer').css('border-bottom','none');

}

    $('[name="from"]').on( 'change', function () {
      $('#tablepesawat').dataTable().fnFilter(this.value,3);
      $('#tablekereta').dataTable().fnFilter(this.value,3);
      makedtgreatagain();
    });
    $('[name="to"]').on( 'change', function () {
      $('#tablepesawat').dataTable().fnFilter(this.value,4);
      $('#tablekereta').dataTable().fnFilter(this.value,4);
      makedtgreatagain();
    });

    function resetfilter(){
      $('#tablepesawat').dataTable().fnFilter('',3);
      $('#tablekereta').dataTable().fnFilter('',3);
      $('#tablepesawat').dataTable().fnFilter('',4);
      $('#tablekereta').dataTable().fnFilter('',4);
    }

    $(document).on('click','.btn-pilih',function(){
      $('#modal_conf').modal({backdrop: 'static', keyboard: false});
      $('#modal_conf').modal('show');
        var idrute = $(this).closest('tr').find('td:eq(0)').text();
        var waktu = $(this).closest('tr').find('td:eq(1)').text();
        var estp = $(this).closest('tr').find('td:eq(2)').text();
        var dari = $(this).closest('tr').find('td:eq(3)').text();
        var ke = $(this).closest('tr').find('td:eq(4)').text();
        var harga = $(this).closest('tr').find('td:eq(5)').text();
        var nama = $(this).closest('tr').find('td:eq(6)').text();

        $('#rwaktu').text(waktu);
        $('#rdari').text(dari);
        $('#rke').text(ke);
        $('#rharga').text(accounting.formatMoney(harga));
        $('#rnama').text(nama);
        $('#restp').text(estp);
        $('.rrute').val(idrute);
        $('.rwaktu').val(waktu);
        $('.rdari').val(dari);
        $('.rke').val(ke);
        $('.rharga').val(harga);
        $('.rnama').val(nama);
        $('.restp').val(estp);

        $('[name="dewasa"]').change(function(){
          var a = $('#cdewasa > option:selected').val();

            $('#rharga').text(accounting.formatMoney(harga * a));

            $('#canak').find('option').remove();

            for (var i = 0; i <= this.value; i++) {
              $('#canak').find('option').end().append('<option>'+i+'</option>');
            }

        });
    });
    $('.select-beast').selectize({
    sortField: 'text'
    })

</script>