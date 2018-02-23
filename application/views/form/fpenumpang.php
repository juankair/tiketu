
  <input type="hidden" class="form-control" name="id">

  <div class="row">
      <div class="col-md-3">
        <label class="control-label mb-10 text-left">Titel</label>
        <select class="form-control" name="gander[]">
          <option value="1">Tuan</option>
          <option value="2">Nyonya</option>
        </select>
      </div>
    <div class="col-md-9">
      <div class="form-group">
        <label class="control-label mb-10 text-left">Nama</label>
        <input type="text" class="form-control chonly" placeholder="Nama Lengkap" name="name[]" >
      </div>
    </div>
  </div>

  <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label class="control-label mb-10 text-left">Telp</label>
          <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" placeholder="Telp" name="phone[]" >
        </div>
      </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label mb-10 text-left">Alamat</label>
        <input type="text" class="form-control" placeholder="Alamat" name="address[]" >
      </div>
    </div>
  </div>
