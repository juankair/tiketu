<form id="ftransportasi" action="<?php echo site_url('transportasi/simpan') ?>">
  <input type="hidden" class="form-control" name="id">

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label mb-10 text-left">Kode</label>
        <input type="text" class="form-control" readonly name="code">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label mb-10 text-left">Deskripsi</label>
        <input type="text" class="form-control" placeholder="Deskripsi" name="description" id="des">
      </div>
    </div>
  </div>

  <div class="row">
      <div class="col-md-7">
        <div class="form-group">
          <label class="control-label mb-10 text-left">Muatan Kursi</label>
          <input type="text" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Muatan Kursi" name="seat_qty">
        </div>
      </div>
      <div class="col-md-5">
        <label class="control-label mb-10 text-left">Tipe</label>
        <select class="form-control" name="transportation_typeid">
          <option value="1">Pesawat</option>
          <option value="2">Kereta Api</option>
        </select>
      </div>
  </div>
</form>
