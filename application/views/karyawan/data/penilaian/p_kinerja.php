<?php
if (empty($_SESSION['status_login'])) {
	redirect();
} else {
	?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php
		$data['tittle'] = "Form Penilaian Kinerja";
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
				<h1><i class="fa fa-address-book"></i> Form Penilaian Kinerja</h1>
				<p></p>
			</div>
			<ul class="app-breadcrumb breadcrumb side">
				<li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item">Penilaian Kinerja</li>
				<li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/karyawan/penilaian_kasubdiv/penilaian">Form Penilaian Kinerja</a></li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="tile">
					<?= form_open('Karyawan/karyawan/action_nilai'); ?>
					<div class="tile-title-w-btn">
						<h4 class="title">Form Penilaian Kinerja</h4>
					</div>
					<hr align="right" color="black">
					<div class="tile-body">
						<div class="row">
							<div class="col-md-5">
								<?php foreach ($diri as $k) { ?>
								<div class="tile-title-w-btn">
									<h6 class="title">KARYAWAN YANG DINILAI</h6>
								</div>
								<div class="form-group row">
									<label class="control-label col-md-4">Nama</label>
									<div class="col-md-8">
										<input class="form-control col-md-12" type="text" name="nm_kar" readonly value="<?= $k['nama'] ?>">
									</div>
								</div>
								<div class="form-group row">
									<label class="control-label col-md-4">Tempat & tgl. Lahir</label>
									<div class="col-md-8">
										<input class="form-control col-md-12" type="text" readonly value="<?= $k['kota_lhr'] ?> / <?= date('d-m-Y', strtotime($k['tgl_lhr'])) ?>">
									</div>
								</div>
								<?php
										$golbaru = $this->Model_karyawan->get_gol_ak($k['npp']);
										foreach ($golbaru as $d) { ?>
								<div class="form-group row">
									<label class="control-label col-md-4">Pangkat/Gol</label>
									<div class="col-md-8">
										<?php
													$gol = $this->Model_karyawan->get_gol($d['golongan']);
													foreach ($gol as $y) : ?>
										<input class="form-control col-md-12" type="text" readonly value="<?= $y['gol'] ?>/<?= $d['mk'] ?>">
										<?php endforeach ?>
									</div>
								</div>
								<?php } ?>
								<?php
										$jab = $this->Model_karyawan->get_jab_akhir($k['npp']);
										foreach ($jab as $o) { ?>
								<input type="hidden" name="jabatan" value="<?= $o['jabatan'] ?>">
								<div class="form-group row">
									<label class="control-label col-md-4">Jabatan</label>
									<div class="col-md-8">
										<?php
													$golongan = $this->Model_karyawan->get_jab($o['jabatan']);
													foreach ($golongan as $l) { ?>
										<input class="form-control col-md-12" type="text" readonly value="<?= $l['nama'] ?>">
										<input type="hidden" name="kd_menu" value="<?= $l['kd_menu'] ?>">
										<?php } ?>
									</div>
								</div>
								<?php } ?>
								<div class="form-group row">
									<label class="control-label col-md-4">Tgl. mulai kerja</label>
									<div class="col-md-8">
										<input class="form-control col-md-12" type="text" readonly value="<?= date('d-m-Y', strtotime($k['tgl_masuk'])) ?>">
									</div>
								</div>
								<?php
										$golbaru = $this->Model_karyawan->get_gol_ak($k['npp']);
										foreach ($golbaru as $d) { ?>
								<div class="form-group row">
									<label class="control-label col-md-4">Kenaikan Gol. terakhir</label>
									<div class="col-md-8">
										<?php
													$gol = $this->Model_karyawan->get_gol($d['golongan']);
													foreach ($gol as $y) { ?>
										<input class="form-control col-md-12" type="text" readonly value="<?= $y['gol'] ?>/<?= $d['mk'] ?>">
										<?php } ?>
									</div>
								</div>
								<?php } ?>
								<div class="form-group row">
									<label class="control-label col-md-4">NIK</label>
									<div class="col-md-8">
										<input class="form-control col-md-12" type="text" name="npp" readonly value="<?= $k['npp'] ?>">
									</div>
								</div>
								<?php } ?>
							</div>
							<div class="col-md-1"></div>
							<div class="col-md-6">
								<div class="tile-title-w-btn">
									<h6 class="title">PEJABAT PENILAI</h6>
								</div>
								<div class="form-group row">
									<label class="control-label col-md-3">Nama</label>
									<div class="col-md-8">
										<input class="form-control col-md-12" type="text" name="nm_pmpn" readonly value="<?= $this->session->userdata('status_login'); ?>">
										<input type="hidden" name="npp_pmpn" value="<?= $this->session->userdata('status_login_username'); ?>">
									</div>
								</div>
								<?php
									$golbaru = $this->Model_karyawan->get_gol_akhir($k['npp']);
									foreach ($golbaru as $d) { ?>
								<div class="form-group row">
									<label class="control-label col-md-3">Pangkat/Gol</label>
									<div class="col-md-8">
										<?php
												$gol = $this->Model_karyawan->get_gol($d['golongan']);
												foreach ($gol as $y) : ?>
										<input class="form-control col-md-12" type="text" readonly value="<?= $y['gol'] ?>/<?= $d['mk'] ?>">
										<?php endforeach ?>
									</div>
								</div>
								<?php } ?>
								<?php
									$jab = $this->Model_karyawan->get_jab_npp($k['npp']);
									foreach ($jab as $o) { ?>
								<div class="form-group row">
									<label class="control-label col-md-3">Jabatan</label>
									<div class="col-md-8">
										<?php
												$golongan = $this->Model_karyawan->get_jab($o['jabatan']);
												foreach ($golongan as $l) { ?>
										<input class="form-control col-md-12" type="text" readonly value="<?= $l['nama'] ?>">
										<?php } ?>
									</div>
								</div>
								<?php } ?>
								<div class="form-group row">
									<label class="control-label col-md-3">Kedudukan</label>
									<div class="col-md-8">
										<input class="form-control col-md-12" type="text" readonly value="Kepala Sub Divisi">
									</div>
								</div>
								<div class="tile-title-w-btn">
									<h6 class="title">ATASAN PEJABAT PENILAI</h6>
								</div>
								<form class="form-horizontal">
									<?php
										$npp      = $this->session->userdata('status_login_username');
										$kasubdiv = $this->Model_karyawan->kasubdiv($npp);
										$kasubdiv = $kasubdiv['kd_menu'];
										$kadiv    = $this->Model_karyawan->get_kadiv($kasubdiv);
										foreach ($kadiv as $v) { ?>
									<input type="hidden" name="npp_ats_pmpn" value="<?= $v['npp'] ?>">
									<div class="form-group row">
										<label class="control-label col-md-3">Nama</label>
										<div class="col-md-8">
											<?php
													$nm = $this->Model_karyawan->get_biodata($v['npp']);
													foreach ($nm as $m) { ?>
											<input class="form-control col-md-12" type="text" name="nm_ats_pmpn" readonly value="<?= $m['nama'] ?>">
											<?php } ?>
										</div>
									</div>
									<?php
											$golbaru = $this->Model_karyawan->get_gol_ak($v['npp']);
											foreach ($golbaru as $d) { ?>
									<div class="form-group row">
										<label class="control-label col-md-3">Pangkat/Gol</label>
										<div class="col-md-8">
											<?php
														$gol = $this->Model_karyawan->get_gol($d['golongan']);
														foreach ($gol as $y) : ?>
											<input class="form-control col-md-12" type="text" readonly value="<?= $y['gol'] ?>/<?= $d['mk'] ?>">
											<?php endforeach ?>
										</div>
									</div>
									<?php } ?>
									<?php
											$jab = $this->Model_karyawan->get_jab_akhir($v['npp']);
											foreach ($jab as $o) { ?>
									<div class="form-group row">
										<label class="control-label col-md-3">Jabatan</label>
										<div class="col-md-8">
											<?php
														$golongan = $this->Model_karyawan->get_jab($o['jabatan']);
														foreach ($golongan as $l) { ?>
											<input class="form-control col-md-12" type="text" readonly value="<?= $l['nama'] ?>">
											<?php } ?>
										</div>
									</div>
									<?php } ?>
									<div class="form-group row">
										<label class="control-label col-md-3">Kedudukan</label>
										<div class="col-md-8">
											<input class="form-control col-md-12" type="text" readonly value="Kepala Divisi">
										</div>
									</div>
								</form>
								<?php } ?>
							</div>
						</div>
						<div class="tile-title-w-btn">
							<h4 class="title">From Penilaian</h4>
						</div>
						<hr align="right" color="black">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Unsur Yang Dinilai</th>
									<th>Nilai</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th rowspan="7" class="text-center" width="50" height="90">1</th>
									<th bgcolor="#F5F5F5">Kemampuan Teknis</th>
									<th bgcolor="#F5F5F5"></th>
									<!-- <?php foreach ($diri as $k) {
													$golbaru = $this->Model_karyawan->get_gol_ak($k['npp']);
													foreach ($golbaru as $d) {
														$gol = $this->Model_karyawan->get_gol($d['golongan']);
														foreach ($gol as $y) {
															if (
																$y['gol'] == 'IIIA' or $y['gol'] == 'IIIB' or $y['gol'] == 'IIIC' or $y['gol'] == 'IIID'
																or $y['gol'] == 'IVA' or $y['gol'] == 'IVB' or $y['gol'] == 'IVC' or $y['gol'] == 'IVD'
															) { ?>
																																			<th rowspan="7"><?= $tk1 = '15' ?></th>
																														<?php } elseif (
																																			$y['gol'] == 'IB' or $y['gol'] == 'IC' or $y['gol'] == 'ID'
																																			or $y['gol'] == 'IIA' or $y['gol'] == 'IIB' or $y['gol'] == 'IIC' or $y['gol'] == 'IID'
																																		) { ?>
																																			<th rowspan="7"><?= $tk2 = '40' ?></th>
																														<?php } elseif ($y['gol'] == 'IA') { ?>
																																			<th rowspan="7"><?= $tk3 = '60' ?></th>
																														<?php } else { ?>
																																			<th rowspan="7">00</th>
																														<?php }
																																	}
																																}
																															} ?> -->
									<th class="text-center" rowspan="27"><textarea  name="ket" rows="10"></textarea></th>
								</tr>
								<?php
									$a = "kt1";
									foreach ($teknis as $tk) { ?>
								<tr>
									<td><?= $tk['nm_kompetensi'] ?></td>
									<td class="text-center" width="50"><input class="text-center" type="number" min="0" max="100" id="<?= $a++; ?>"></td>
								</tr>
								<?php } ?>
								<tr>
									<th rowspan="10" class="text-center">2</th>
									<th bgcolor="#F5F5F5">Kepribadian dan Penampilan</th>
									<th bgcolor="#F5F5F5"></th>
									<!-- <?php foreach ($diri as $k) {
													$golbaru = $this->Model_karyawan->get_gol_ak($k['npp']);
													foreach ($golbaru as $d) {
														$gol = $this->Model_karyawan->get_gol($d['golongan']);
														foreach ($gol as $y) {
															if (
																$y['gol'] == 'IIIA' or $y['gol'] == 'IIIB' or $y['gol'] == 'IIIC' or $y['gol'] == 'IIID'
																or $y['gol'] == 'IVA' or $y['gol'] == 'IVB' or $y['gol'] == 'IVC' or $y['gol'] == 'IVD'
															) { ?>
																																			<th rowspan="10"><?= $kp1 = '30' ?></th>
																														<?php } elseif (
																																			$y['gol'] == 'IB' or $y['gol'] == 'IC' or $y['gol'] == 'ID'
																																			or $y['gol'] == 'IIA' or $y['gol'] == 'IIB' or $y['gol'] == 'IIC' or $y['gol'] == 'IID'
																																		) { ?>
																																			<th rowspan="10"><?= $kp2 = '30' ?></th>
																														<?php } elseif ($y['gol'] == 'IA') { ?>
																																			<th rowspan="10"><?= $kp3 = '30' ?></th>
																														<?php } else { ?>
																																			<th rowspan="10">00</th>
																														<?php }
																																	}
																																}
																															} ?> -->
									<!-- <th rowspan="10"><textarea rows="2"></textarea></th> -->
								</tr>
								<?php
									$a = "kdp1";
									foreach ($kdp as $k) {
										?>
								<tr>
									<td><?= $k['nm_kdp'] ?></td>
									<td class="text-center"><input class="text-center" type="number" min="0" max="100" id="<?= $a++; ?>"></td>
								</tr>
								<?php } ?>
								<tr>
									<th rowspan="6" class="text-center">3</th>
									<th bgcolor="#F5F5F5">Kemampuan Manajerial</th>
									<th bgcolor="#F5F5F5"></th>
									<!-- <?php foreach ($diri as $k) {
													$golbaru = $this->Model_karyawan->get_gol_ak($k['npp']);
													foreach ($golbaru as $d) {
														$gol = $this->Model_karyawan->get_gol($d['golongan']);
														foreach ($gol as $y) {
															if (
																$y['gol'] == 'IIIA' or $y['gol'] == 'IIIB' or $y['gol'] == 'IIIC' or $y['gol'] == 'IIID'
																or $y['gol'] == 'IVA' or $y['gol'] == 'IVB' or $y['gol'] == 'IVC' or $y['gol'] == 'IVD'
															) { ?>
																																			<th rowspan="6"><?= $km1 = '35' ?></th>
																														<?php } elseif (
																																			$y['gol'] == 'IB' or $y['gol'] == 'IC' or $y['gol'] == 'ID'
																																			or $y['gol'] == 'IIA' or $y['gol'] == 'IIB' or $y['gol'] == 'IIC' or $y['gol'] == 'IID'
																																		) { ?>
																																			<th rowspan="6"><?= $km2 = '10' ?></th>
																														<?php } elseif ($y['gol'] == 'IA') { ?>
																																			<th rowspan="6"><?= $km3 = '0' ?></th>
																														<?php } else { ?>
																																			<th rowspan="6">00</th>
																														<?php }
																																	}
																																}
																															} ?> -->
									<!-- <th rowspan="6"><textarea rows="2"></textarea></th> -->
								</tr>
								<?php
									$a = "km1";
									foreach ($km as $key) { ?>
								<tr>
									<td><?= $key['nm_km'] ?></td>
									<td class="text-center"><input class="text-center" type="number" min="0" max="100" id="<?= $a++; ?>"></td>
								</tr>
								<?php } ?>
								<tr>
									<th rowspan="4" class="text-center">4</th>
									<th bgcolor="#F5F5F5">Hubungan Antara Karyawan</th>
									<th bgcolor="#F5F5F5"></th>
									<!-- <?php foreach ($diri as $k) {
													$golbaru = $this->Model_karyawan->get_gol_ak($k['npp']);
													foreach ($golbaru as $d) {
														$gol = $this->Model_karyawan->get_gol($d['golongan']);
														foreach ($gol as $y) {
															if (
																$y['gol'] == 'IIIA' or $y['gol'] == 'IIIB' or $y['gol'] == 'IIIC' or $y['gol'] == 'IIID'
																or $y['gol'] == 'IVA' or $y['gol'] == 'IVB' or $y['gol'] == 'IVC' or $y['gol'] == 'IVD'
															) { ?>
																																			<th rowspan="4"><?= $ham1 = '20' ?></th>
																														<?php } elseif (
																																			$y['gol'] == 'IB' or $y['gol'] == 'IC' or $y['gol'] == 'ID'
																																			or $y['gol'] == 'IIA' or $y['gol'] == 'IIB' or $y['gol'] == 'IIC' or $y['gol'] == 'IID'
																																		) { ?>
																																			<th rowspan="4"><?= $ham2 = '20' ?></th>
																														<?php } elseif ($y['gol'] == 'IA') { ?>
																																			<th rowspan="4"><?= $ham3 = '10' ?></th>
																														<?php } else { ?>
																																			<th rowspan="4">00</th>
																														<?php }
																																	}
																																}
																															} ?> -->
									<!-- <th rowspan="4"><textarea rows="2"></textarea></th> -->
								</tr>
								<?php
									$a = "ham1";
									foreach ($ham as $y) { ?>
								<tr>
									<td><?= $y['nm_ham'] ?></td>
									<td class="text-center"><input class="text-center" type="number" min="0" max="100" id="<?= $a++; ?>"></td>
								</tr>
								<?php } ?>
								<tr>
									<th bgcolor="#F5F5F5"></th>
									<th bgcolor="#F5F5F5">Jumlah</th>
									<th bgcolor="#F5F5F5" id="jml_tot"></th>
									<!-- <?php foreach ($diri as $k) {
													$golbaru = $this->Model_karyawan->get_gol_ak($k['npp']);
													foreach ($golbaru as $d) {
														$gol = $this->Model_karyawan->get_gol($d['golongan']);
														foreach ($gol as $y) {
															if (
																$y['gol'] == 'IIIA' or $y['gol'] == 'IIIB' or $y['gol'] == 'IIIC' or $y['gol'] == 'IIID'
																or $y['gol'] == 'IVA' or $y['gol'] == 'IVB' or $y['gol'] == 'IVC' or $y['gol'] == 'IVD'
															) {
																$tk1  = 15;
																$kp1  = 30;
																$km1  = 35;
																$ham1 = 20;
																$hsl1  = $tk1 + $kp1 + $km1 + $ham1;
																?>
																																			<th bgcolor="#F5F5F5"><?= $hsl1 ?></th>
																														<?php } elseif (
																																			$y['gol'] == 'IB' or $y['gol'] == 'IC' or $y['gol'] == 'ID'
																																			or $y['gol'] == 'IIA' or $y['gol'] == 'IIB' or $y['gol'] == 'IIC' or $y['gol'] == 'IID'
																																		) {
																																			$tk2  = 40;
																																			$kp2  = 30;
																																			$km2  = 10;
																																			$ham2 = 20;
																																			$hsl2  = $tk2 + $kp2 + $km2 + $ham2;
																																			?>
																																			<th bgcolor="#F5F5F5"><?= $hsl2 ?></th>
																														<?php } elseif ($y['gol'] == 'IA') {
																																			$tk3  = 60;
																																			$kp3  = 30;
																																			$km3  = 0;
																																			$ham3 = 10;
																																			$hsl3  = $tk3 + $kp3 + $km3 + $ham3;
																																			?>
																																			<th bgcolor="#F5F5F5"><?= $hsl3 ?></th>
																														<?php } else { ?>
																																			<th bgcolor="#F5F5F5">00</th>
																														<?php }
																																	}
																																}
																															} ?> -->
									<th bgcolor="#F5F5F5"></th>
								</tr>
								<tr>
									<th bgcolor="#F5F5F5"></th>
									<th bgcolor="#F5F5F5">Nilai Rata-Rata (Hasil DP2K)</th>
									<th bgcolor="#F5F5F5" class="text-center"><input type="number" min="0" max="100" readonly name="nilai"></th>
									<th bgcolor="#F5F5F5"></th>
									<!-- <th bgcolor="#F5F5F5"></th> -->
								</tr>
							</tbody>
						</table>
						<hr align="right" color="black">
						<div class="modal-footer">
							<button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-fw fa-floppy-o"></i>Simpan</button>
						</div>
					</div>
					<?= form_close() ?>
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
		$(document).ready(function() {
			$("#kt1").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3)
			});
			$("#kt2").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#kt3").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#kt4").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#kt5").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#kt6").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});

			$("#kdp1").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#kdp2").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#kdp3").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#kdp4").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#kdp5").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#kdp6").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#kdp7").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#kdp8").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#kdp9").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});

			$("#km1").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3)
			});
			$("#km2").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#km3").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#km4").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#km5").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});

			$("#ham1").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#ham2").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});
			$("#ham3").keyup(function() {
				var kt1 = $("#kt1").val();
				var kt2 = $("#kt2").val();
				var kt3 = $("#kt3").val();
				var kt4 = $("#kt4").val();
				var kt5 = $("#kt5").val();
				var kt6 = $("#kt6").val();
				var kdp1 = $("#kdp1").val();
				var kdp2 = $("#kdp2").val();
				var kdp3 = $("#kdp3").val();
				var kdp4 = $("#kdp4").val();
				var kdp5 = $("#kdp5").val();
				var kdp6 = $("#kdp6").val();
				var kdp7 = $("#kdp7").val();
				var kdp8 = $("#kdp8").val();
				var kdp9 = $("#kdp9").val();
				var km1 = $("#km1").val();
				var km2 = $("#km2").val();
				var km3 = $("#km3").val();
				var km4 = $("#km4").val();
				var km5 = $("#km5").val();
				var ham1 = $("#ham1").val();
				var ham2 = $("#ham2").val();
				var ham3 = $("#ham3").val();
				hitung(kt1, kt2, kt3, kt4, kt5, kt6,
					kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
					km1, km2, km3, km4, km5,
					ham1, ham2, ham3);
			});

			function hitung(kt1, kt2, kt3, kt4, kt5, kt6,
				kdp1, kdp2, kdp3, kdp4, kdp5, kdp6, kdp7, kdp8, kdp9,
				km1, km2, km3, km4, km5,
				ham1, ham2, ham3) {
				var jml = 0;
				jml_nilai = parseInt(kt1) + parseInt(kt2) + parseInt(kt3) + parseInt(kt4) + parseInt(kt5) + parseInt(kt6) +
					parseInt(kdp1) + parseInt(kdp2) + parseInt(kdp3) + parseInt(kdp4) + parseInt(kdp5) + parseInt(kdp6) + parseInt(kdp7) + parseInt(kdp8) + parseInt(kdp9) +
					parseInt(km1) + parseInt(km2) + parseInt(km3) + parseInt(km4) + parseInt(km5) +
					parseInt(ham1) + parseInt(ham2) + parseInt(ham3);
				jml = jml_nilai / 23;
				jml = jml.toFixed(1);
				$("#jml_tot").html(jml_nilai);
				$('[name="nilai"]').val(jml);
			}
		});
	</script>
</body>

</html>
<?php } ?>