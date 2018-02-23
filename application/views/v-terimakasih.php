<?php
$this->load->view('layouts/header');
$this->load->view('layouts/navigation1');
$this->load->view('layouts/navigation2');
 ?>

             <div class="m-grid__item m-grid__item--fluid m-wrapper">
                    <!-- END: Subheader -->
                    <div class="m-content">
                    	<div class="row">
                    		<div class="col-md-5">
								<img src="<?php echo base_url('assets/images/thanksjadi.png') ?>">
							</div>
							<div class="col-md-6"><br><br>
								<h4>Anda Telah Berhasil Memesan Tiket Pemberangkatan</h4>
								<br><br>
								<h5>Selamat Menikmati Perjalanan Anda ~~</h5><br><br><br>
								<button onclick="location.href='<?php echo base_url() ?>'" class="btn btn-success">Kembali Ke Homepage</button>
							</div>
                    	</div>
	                </div>
            </div>

<?php
  $this->load->view('layouts/footer');
 ?>

