<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Tiketu | Login</title>
		<meta name="description" content="Jetson is a Dashboard & Admin Site Responsive Template by hencework." />
		<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Jetson Admin, Jetsonadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
		<meta name="author" content="hencework"/>

		<!-- Favicon -->
		<link rel="shortcut icon" href="<?php echo base_url('assets/') ?>images/logo.png">
		<link rel="icon" href="<?php echo base_url('assets/') ?>images/logo.png" type="image/x-icon">

		<!-- vector map CSS -->
		<link href="<?php echo base_url('assets/') ?>vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>

  <link href="<?php echo base_url('assets/') ?>sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">

		<!-- Custom CSS -->
		<link href="<?php echo base_url('assets/') ?>dist/css/style.css" rel="stylesheet" type="text/css">
<style>
	
</style>

	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->

		<div class="wrapper pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					<a href="<?php echo base_url('assets/') ?>index.html">
						<img class="brand-img mr-10" width="45" height="40" src="<?php echo base_url('assets/') ?>images/logo.png" alt="brand"/>
						<span class="brand-text">Tiketu</span>
					</a>
				</div>
				<div class="clearfix"></div>
			</header>

			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
										<div class="mb-30">
											<h3 class="text-center txt-dark mb-10">Masuk ke Tiketu</h3>
											<h6 class="text-center nonecase-font txt-grey">Masukan Username & Password</h6>
										</div>
										<div class="form-wrap">
											<form method="POST" id="flogin" action="<?php echo site_url('login/aksi_login') ?>" role="login">
      <?php
      //menampilkan error menggunakan alert javascript
        if(isset($error)){
        echo '<script>
        alert("'.$error.'");
        </script>';
        }
      ?>
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Username</label>
													<input type="text" class="form-control" required="" id="username" name="username">
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
													<input type="password" class="form-control" required="" id="password" name="password">
												</div>

												<div class="form-group text-center">
                          <input type="submit" name="submit" class="btn btn-primary  btn-rounded" value="Masuk">
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
				</div>

			</div>
			<!-- /Main Content -->

		</div>
		<!-- /#wrapper -->

		<!-- JavaScript -->

		<!-- jQuery -->
		<script src="<?php echo base_url('assets/') ?>vendors/bower_components/jquery/dist/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url('assets/') ?>vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url('assets/') ?>vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

		<!-- Slimscroll JavaScript -->
		<script src="<?php echo base_url('assets/') ?>dist/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url('assets/') ?>sweetalert/dist/sweetalert.min.js"></script>
		<!-- Init JavaScript -->
		<script src="<?php echo base_url('assets/') ?>dist/js/init.js"></script>

		<script>
			$('#flogin').submit(function(e){
				e.preventDefault();

				var url = $(this).attr('action');
				var data = $(this).serializeArray();
				$.post(url,data,function(a){
					if (a == "salah") {
						swal({
					        title: "Akses Ditolak",
					        text: "Username atau Password salah!",
					        type:"warning",
					        button: "Ok",
					      });
					}else{
						window.location= "<?php echo base_url() ?>";
					}
				});
			});
		</script>
	</body>
</html>
