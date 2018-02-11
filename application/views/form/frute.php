<form id="frute" action="<?php echo site_url('rute/simpan') ?>">
  <input type="hidden" class="form-control" name="id">

  <div class="row">
 
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label mb-10 text-left">Rute Dari</label><br>
          <select class="selectpicker" name="rute_from">
          <?php 
            foreach ($stasiun as $s) {
              ?> 
              <option value="<?php echo $s->id ?>"><?php echo $s->nama ?>(<?php echo $s->abbr ?>) <?php echo $s->city ?></option>
              <?php
            }
           ?>
        </select>
      </div>
    </div>
   <div class="col-md-6">
      <div class="form-group">
        <label class="control-label mb-10 text-left">Rute Ke</label><br>
          <select class="selectpicker" data-live-search="true" name="rute_to">
          <?php 
            foreach ($stasiun as $s) {
              ?> 
              <option value="<?php echo $s->id ?>"><?php echo $s->nama ?>(<?php echo $s->abbr ?>) <?php echo $s->city ?></option>
              <?php
            }
           ?>
        </select>
      </div>
    </div>

  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label mb-10 text-left">Waktu Pemberangkatan</label>
        <input type="time" class="form-control" placeholder="00:00" name="depart_at">
      </div>
    </div>
     <div class="col-md-6">
      <div class="form-group">
        <label class="control-label mb-10 text-left">Waktu Sampai</label>
        <!-- <input type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Per-jam" name="estp"> -->
        <input type="time" class="form-control" placeholder="00:00" name="estp">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <label class="control-label mb-10 text-left">Transportasi</label><br>
        <select class="selectpicker" data-live-search="true" name="transportationid">

        <?php
          foreach ($transportation as $t) {
            ?>
          <option value="<?php echo $t->id ?>"><?php echo $t->description ?></option>
            <?php
          }
         ?>
      </select>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label mb-10 text-left">Harga</label>
        <input type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Harga" name="price">
      </div>
    </div>



  </div>
</form>