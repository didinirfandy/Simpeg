<?php echo form_open('Core/lg_su');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>SDM PTPN VIII</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--========================================================================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets_login/images/icons/favicon.ico"/>
<!--========================================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_login/vendor/bootstrap/css/bootstrap.min.css">
<!--========================================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--========================================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--========================================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_login/vendor/animate/animate.css">
<!--========================================================================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_login/vendor/css-hamburgers/hamburgers.min.css">
<!--========================================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_login/vendor/animsition/css/animsition.min.css">
<!--========================================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_login/vendor/select2/select2.min.css">
<!--========================================================================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_login/vendor/daterangepicker/daterangepicker.css">
<!--========================================================================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_login/css/main.css">
<!--========================================================================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?php echo base_url();?>assets_login/images/PTPN.png');">
			<div class="wrap-login100">
				<form class="login100-form validate-form">

					<span class="login100-form-title p-b-20 p-t-20">
						<img src="<?php echo base_url();?>assets_login/images/PTPN6.jpg" alt="PTPN" width="300px"/>
					</span>
					<span class="login100-form-title p-b-20 p-t-20">
						Log in Super Admin
					</span>
					
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username" autocomplete="off" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" pattern=".{6}" title="Harus 6 Karakter, Tidak Boleh Lebih" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-20">
						<font color="#02FE0B" size="2">
							<?php echo 	
										$this->session->userdata('notif');
										$this->session->sess_destroy(); 
							?>
						</font>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--====================================================================================================-->
	<script src="<?php echo base_url();?>assets_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--====================================================================================================-->
	<script src="<?php echo base_url();?>assets_login/vendor/animsition/js/animsition.min.js"></script>
<!--====================================================================================================-->
	<script src="<?php echo base_url();?>assets_login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url();?>assets_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--====================================================================================================-->
	<script src="<?php echo base_url();?>assets_login/vendor/select2/select2.min.js"></script>
<!--====================================================================================================-->
	<script src="<?php echo base_url();?>assets_login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url();?>assets_login/vendor/daterangepicker/daterangepicker.js"></script>
<!--====================================================================================================-->
	<script src="<?php echo base_url();?>assets_login/vendor/countdowntime/countdowntime.js"></script>
<!--====================================================================================================-->
	<script src="<?php echo base_url();?>assets_login/js/main.js"></script>

</body>
</html>