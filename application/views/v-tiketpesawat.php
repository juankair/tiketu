<?php
  $this->load->view('layouts/header');
  $this->load->view('layouts/navigation1');
  $this->load->view('layouts/navigation2');
?>

<div class="m-grid__item m-grid__item--fluid m-wrapper">
          <div class="m-subheader-search">
            <h2 class="m-subheader-search__title">
              Pencarian Rute
              <span class="m-subheader-search__desc">
                Pengelolaan Tiket Pesawat
              </span>
            </h2>
            <form class="m-form">
              <div class="m-grid m-grid--ver-desktop m-grid--desktop">
                <div class="m-grid__item m-grid__item--middle">
                  <div class="m-input-icon m-input-icon--fixed m-input-icon--fixed-md m-input-icon--right">
                    <input name="from" type="text" class="form-control form-control-lg m-input m-input--pill" placeholder="Dari">
                    <span class="m-input-icon__icon m-input-icon__icon--right">
                      <span>
                        <i class="la la-calendar-check-o"></i>
                      </span>
                    </span>
                  </div>
                  <div class="m-input-icon m-input-icon--fixed m-input-icon--fixed-md m-input-icon--right">
                    <input type="text" name="to" class="form-control form-control-lg m-input m-input--pill" placeholder="Ke">
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
                    
                    <table id="tablepesawat" class="table table-hover">
                      <thead>
                        <tr>
                          <th style="display:none;">id</th>
                          <th >Waktu</th>
                          <th>Dari</th>
                          <th>Ke</th>
                          <th>Estimasi</th>
                          <th>Harga</th>
                          <th>Nama</th>
                          <th>Pilih</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                  foreach ($getpesawat as $k) {
                    ?>
                    <tr style="cursor:pointer" >
                      <td style="display:none;"><?php echo $k->id ?></td>
                      <td><?php echo $k->depart_at ?></td>
                      <td><?php echo $k->rute_from ?></td>
                      <td><?php echo $k->rute_to ?></td>
                      <td><?php echo $k->estp ?> Jam</td>
                      <td><?php echo $k->price ?></td>
                      <td><?php echo $k->description ?></td>
                      <td><button class="btn btn-primary btn-pilih">Pilih</button></td>
                    </tr>
                    <?php
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
          <div class="modal fade" id="modal_conf" role="dialog" tabindex="-1">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Rangkuman Pilihan</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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

                          </div>

                          <div class="row">
                            <div class="col-md-6"><h6><span id="rnama"></span></h6><br></div>
                          </div>
                          <div class="row">
  Estimasi Perjalanan : &nbsp; <span id="restp"></span>
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
  $('#tablepesawat').dataTable({
    searching:true,
    bLengthChange : false
  });
  $('#tablekereta').dataTable({
    bLengthChange : false
  });
  $('.select2').select2();
  

$(".dataTables_length select").remove();
$('.dataTables_filter input').remove();
$('.dataTables_filter label').remove();
$('#tablepesawat thead th').css('border-bottom','none');
$('#tablepesawat.no-footer').css('border-bottom','none');


    $('[name="from"]').on( 'keyup', function () {
      $('#tablepesawat').dataTable().fnFilter(this.value,2);
      $('#tablekereta').dataTable().fnFilter(this.value,2);
    });
    $('[name="to"]').on( 'keyup', function () {
      $('#tablepesawat').dataTable().fnFilter(this.value,3);
      $('#tablekereta').dataTable().fnFilter(this.value,3);
    });

    function resetfilter(){
      $('#tablepesawat').dataTable().fnFilter('',2);
      $('#tablekereta').dataTable().fnFilter('',2);
      $('#tablepesawat').dataTable().fnFilter('',3);
      $('#tablekereta').dataTable().fnFilter('',3);
      $('[name="from"]').val('');
      $('[name="to"]').val('');
    }

    $(document).on('click','.btn-pilih',function(){
      $('#modal_conf').modal({backdrop: 'static', keyboard: false});
      $('#modal_conf').modal('show');
        var idrute = $(this).closest('tr').find('td:eq(0)').text();
        var waktu = $(this).closest('tr').find('td:eq(1)').text();
        var dari = $(this).closest('tr').find('td:eq(2)').text();
        var ke = $(this).closest('tr').find('td:eq(3)').text();
        var estp = $(this).closest('tr').find('td:eq(4)').text();
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

          $('#rharga').text(harga * a);

        });
    });

</script>