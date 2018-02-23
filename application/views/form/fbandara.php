<form id="fbandara" action="<?php echo site_url('bandara/simpan') ?>">
  <input type="hidden" class="form-control" name="id">

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label mb-10 text-left">Nama</label>
        <input type="text" class="form-control" placeholder="Nama" name="nama" required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label mb-10 text-left">Kota</label>
        <input type="text" class="form-control" placeholder="Kota" name="city" required>
      </div>
    </div>
  </div>

  <div class="row">
      <div class="col-md-7">
        <div class="form-group">
          <label class="control-label mb-10 text-left">Singkatan</label>
          <input type="text" class="form-control" placeholder="Singkatan" name="abbr" required>
        </div>
      </div>
  </div>
</form>
