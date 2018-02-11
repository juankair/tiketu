<form id="fuser" action="<?php echo site_url('user/simpan') ?>">
  <input type="hidden" class="form-control" name="id">

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label mb-10 text-left">Username</label>
        <input type="text" class="form-control" placeholder="Username" name="username">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="control-label mb-10 text-left">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password">
      </div>
    </div>
  </div>

  <div class="row">
      <div class="col-md-7">
        <div class="form-group">
          <label class="control-label mb-10 text-left">Nama Lengkap</label>
          <input type="text" class="form-control" placeholder="Nama Lengkap" name="fullname">
        </div>
      </div>
      <div class="col-md-5">
        <label class="control-label mb-10 text-left">Level</label>
        <select class="form-control" name="level">
          <option value="1">Admin</option>
          <option value="2">Operator</option>
        </select>
      </div>
  </div>
</form>
