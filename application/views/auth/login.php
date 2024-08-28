<!DOCTYPE html>
<html lang="en">


<head>

	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<meta name="description" content="CRM">
	<meta name="author" content="CRM">
	<meta name="keywords" content="CRM">

	<!-- Favicon -->
	<!-- <link rel="icon" href="https://www.spruko.com/demo/dashpro/Dashpro/assets/img/brand/favicon.ico" type="image/x-icon" /> -->
	<link rel="icon" href="<?php echo base_url() ?>assets/admin_assets/logo/icon.png" />
	<!-- Title -->
	<title>CRM</title>

	<!-- Bootstrap css-->
	<link href="<?php echo base_url() ?>assets/admin_assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

	<!-- Icons css-->
	<link href="<?php echo base_url() ?>assets/admin_assets/css/icons.css" rel="stylesheet" />

	<!-- Style css-->
	<link href="<?php echo base_url() ?>assets/admin_assets/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/admin_assets/css/dark-boxed.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/admin_assets/css/boxed.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/admin_assets/css/skins.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/admin_assets/css/dark-style.css" rel="stylesheet">

	<!-- Color css-->
	<link id="theme" rel="stylesheet" type="text/css" media="all" href="<?php echo base_url() ?>assets/admin_assets/css/colors/color.css">

	<!-- P-SCROLL css-->
	<link href="<?php echo base_url() ?>assets/admin_assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet">

	<!-- Switcher css-->
	<link href="<?php echo base_url() ?>assets/admin_assets/switcher/css/switcher.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/admin_assets/switcher/demo.css" rel="stylesheet">

	<!-- Alert css-->
	<link href="<?php echo base_url() ?>assets/admin_assets/plugins/sweet-alert/sweetalert.css" rel="stylesheet">
	<script src="<?php echo base_url() ?>assets/admin_assets/plugins/sweet-alert/sweetalert.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin_assets/plugins/sweet-alert/jquery.sweet-alert.js"></script>


	<!-- Bootstrap Validations -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		.has-error .help-block {
			color: red;
		}

		.has-success .help-block {
			color: green;
		}
	</style>

</head>

<body class="horizontalmenu">

	<?php if ($this->session->flashdata('error')) { ?>
		<script>
			swal({
				title: 'Error!',
				text: '<?php echo $this->session->flashdata('error') ?>',
				type: 'error',
				timer: 3000,
				showConfirmButton: false
			});
		</script>
	<?php } ?>
	<?php if ($this->session->flashdata('success')) { ?>
		<script>
			swal({
				title: 'Well Done!',
				text: '<?php echo $this->session->flashdata('success') ?>',
				type: 'success',
				timer: 3000,
				showConfirmButton: false
			});
		</script>
	<?php } ?>


	<!-- Page -->
	<div class="page main-signin-wrapper">

		<!-- Row -->
		<div class="row signpages  justify-content-center text-center sign-2">
			<div class="col-md-12 col-xl-6 col-lg-6 col-sm-12 col-xxl-6 ">
				<div class="sign1">
					<div class="card">
						<div class="">
							<div class="card-body mt-2 mb-2 p-5">
								<!-- <img src="<?php echo base_url() ?>assets/admin_assets/logo/logo.png" class="header-brand-img text-left mb-5 desktop-logo" alt="logo">
								<img src="<?php echo base_url() ?>assets/admin_assets/logo/logo.png" class="header-brand-img desktop-logo text-left mb-5 theme-logo" alt="logo"> -->
								<!-- <h2>UniX Computers</h2> -->
								<div class="clearfix"></div>
								<form method="Post" id="loginForm" action="<?php echo base_url('authlogin') ?>">
									<h5 class="text-left mb-2">Sign In</h5>
									<!-- <p class="mb-4 text-muted tx-13 ml-0 text-left">Signin to Continue in our website</p> -->
									<div class="form-group text-left">
										<label class="">Email Address</label>
										<input class="form-control rounded-11" placeholder="Users email" type="text" name="username" id="username">
									</div>
									<div class="form-group text-left">
										<label class="">Password</label>
										<input class="form-control rounded-11" placeholder="password" type="password" name="password" id="password">
									</div>
									<div class="row">
										<div class="col-6">
											<div class="form-group mb-0 text-left">
												<label class="custom-control custom-checkbox mb-0">
													<input type="checkbox" class="custom-control-input">
													<!-- <span class="custom-control-label">Remember me</span> -->
												</label>
											</div>
										</div>
										<!-- <div class="col-6 text-right mt-1">
											<a href="forgot.html" class="text-dark">Forgot password?</a>
										</div> -->
										<div class="col-12 mt-3">
											<button type="submit" class="btn btn-primary rounded-11 btn-block">SIGN IN</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Row -->

	</div>
	<!-- End Page -->
	<script>
		$(document).ready(function() {
			$('#loginForm').bootstrapValidator({
				// To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
				feedbackIcons: {
					// 	valid: 'glyphicon glyphicon-ok',
					// 	invalid: 'glyphicon glyphicon-remove',
					// 	validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					username: {
						validators: {
							notEmpty: {
								message: 'The username is required'
							},
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'The password  is required'
							},
						}
					},
				}
			}).on('success.form.bv', function(e) {
				$(this)[0].submit();
			});
		});
	</script>

	<!-- Jquery js-->
	<script src="<?php echo base_url() ?>assets/admin_assets/plugins/jquery/jquery.min.js"></script>

	<!-- Bootstrap js-->
	<script src="<?php echo base_url() ?>assets/admin_assets/plugins/bootstrap/js/popper.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin_assets/plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Perfect-scrollbar js -->
	<script src="<?php echo base_url() ?>assets/admin_assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

	<!-- Select2 js-->
	<script src="<?php echo base_url() ?>assets/admin_assets/plugins/select2/js/select2.min.js"></script>

	<!-- Custom js -->
	<script src="<?php echo base_url() ?>assets/admin_assets/js/custom.js"></script>

	<!-- Switcher js -->
	<script src="<?php echo base_url() ?>assets/admin_assets/switcher/js/switcher.js"></script>

	<!-- BoottstrapValidator -->
	<script src="//cdn.jsdelivr.net/jquery.bootstrapvalidator/0.5.0/js/bootstrapValidator.min.js"></script>
</body>


</html>