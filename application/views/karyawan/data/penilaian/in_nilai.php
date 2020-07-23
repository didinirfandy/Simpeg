<?php
if (empty($_SESSION['status_login'])) {
	redirect();
} else {
	?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php
		$data['tittle'] = "Penilaian Kinerja";
		$this->load->view('template/head', $data);
		?>
</head>

<body class="app sidebar-mini rtl">
	<!-- Navbar-->
	<header class="app-header"><a class="app-header__logo" href="index.php/Karyawan/in_kar">SIMPEG</a>

		<?php $this->load->view('template/header') ?>

	</header>
	<!-- Sidebar menu-->
	<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

	<?php $this->load->view('template/menu_kar') ?>

	<main class="app-content">
		<div class="app-title">
			<div>
				<h1><i class="fa fa-address-book"></i> Penilaian Kinerja</h1>
				<p></p>
			</div>
			<ul class="app-breadcrumb breadcrumb side">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/karyawan/penilaian_kasubdiv/data_kar"> Penilaian Kinerja</a></li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
					<div class="tile-title-w-btn">
						<h4 class="title">Data Karyawan</h4>
						<!-- Swetalert Berhasil -->
						<div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
						<!-- Swetalert Gagal -->
						<div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
					</div>
					<hr align="right" color="black">
					<div class="tile-body">
						<table class="table table-hover table-bordered" id="sampleTable">
							<thead>
								<tr>
									<th>No</th>
									<th>Npp</th>
									<th>Nama Karyawan</th>
									<th>Tahun Penilaian</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 1;
									foreach ($staf as $c) { ?>
								<tr>
									<td><?= $i++ ?></td>
									<td><?= $c['npp'] ?></td>
									<td><?= $c['nm_sdm01'] ?></td>
									<td><?= $c['nama'] ?></td>
									<td><a href="penilaian/<?= $c['npp'] ?>" class="btn btn-info "><i class="fa fa-pencil"></i>Penilaian </a></td>
								</tr>
								<?php }
									?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<!-- footer area start-->
			<?php $this->load->view('template/footer'); ?>
			<!-- footer area end-->
		</footer>
	</main>

	<!-- Main Menu area start-->
	<?php $this->load->view('template/script'); ?>
	<!-- Main Menu area End-->
	<script type="text/javascript">
		const statusinsert = $('.status-insert').data('statusinsert');
		// console.log(statusinsert);
		if (statusinsert) {
			swal({
				title: "Berhasil " + statusinsert,
				type: "success",
				timer: 7000,
				showConfirmButton: false
			});
		}

		const statusgagal = $('.status-gagal').data('statusgagal');
		// console.log(statusgagal);
		if (statusgagal) {
			swal({
				title: "Gagal " + statusgagal,
				text: "Periksa kembali data anda degan benar",
				type: "error",
				timer: 7000,
				showConfirmButton: false
			});
		}
	</script>

</body>

</html>
<?php } ?>