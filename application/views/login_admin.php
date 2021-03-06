<!DOCTYPE html>
<html>

<head>
	<?php
	$data['tittle'] = "Login Admin";
	$this->load->view('template/head', $data);
	?>
</head>

<body>
	<section class="material-half-bg">
		<div class="cover">
			<div class="app-nav__item col-md-3">
				<span style="color:white" id="dates"><span id="the-day"></span> <span id="the-time"></span> </span>
			</div>
		</div>
	</section>

	<section class="login-content">
		<div class="logo">
			<!-- <span class="login100-form-title p-b-20 p-t-20">
				<img src="<?php echo base_url(); ?>assets_login/images/PTPN6.jpg" alt="PTPN" width="300px" />
			</span> -->
			<center>
				<h1>SIMPEG</h1>
				<h3>Sistem Informasi Management Kepegawaian</h3>
			</center>
		</div>
		<div class="login-box">
			<form class="login-form" method="POST" action="<?= base_url('index.php/Core/lg_admin'); ?>">
				<h3 class="login-head"><i class="fa fa-lg fa-fw fa-user-secret"></i>SIGN IN ADMIN</h3>
				<div class="form-group">
					<label class="control-label">USERNAME ADMIN</label>
					<input class="form-control" type="text" name="username" placeholder="Username" autocomplete="off" title="Masukan Username, Tidak Boleh Kosong!!!" required autofocus>
				</div>
				<div class="form-group">
					<label class="control-label">PASSWORD ADMIN</label>
					<input class="form-control" type="password" name="password" pattern=".{6}" title="Harus 6 Karakter, Tidak Boleh Lebih" placeholder="Password" required>
				</div>
				<div class="form-group">
					<div class="utility">
						<div class="animated-checkbox">
							<label>
								<input type="checkbox"><span class="label-text">Stay Signed in</span>
							</label>
						</div>
						<!-- <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></!-->
					</div>
				</div>
				<div class="form-group btn-container">
					<button class="btn btn-primary btn-block" name="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
				</div><br><br>
				<?= $this->session->flashdata('pesan'); ?>
				<?=
					$this->session->userdata('notif');
				$this->session->sess_destroy();
				?>
			</form>
			<form class="forget-form" method="POST" action="<?= base_url('index.php/Core/lg_admin'); ?>">
				<h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
				<div class="form-group">
					<label class="control-label">EMAIL</label>
					<input class="form-control" type="text" placeholder="Email">
				</div>
				<div class="form-group btn-container">
					<button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
				</div>
				<div class="form-group mt-3">
					<p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
				</div>
			</form>
		</div>
	</section>

	<?php $this->load->view('template/script') ?>

	<script type="text/javascript">
		$(document).ready(function() {
			// Login Page Flipbox control
			$('.login-content [data-toggle="flip"]').click(function() {
				$('.login-box').toggleClass('flipped');
				return false;
			});
		});
	</script>
</body>

</html>