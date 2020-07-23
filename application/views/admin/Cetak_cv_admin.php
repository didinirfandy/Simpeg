<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        $data['tittle'] = "Cetak CV Karyawan";
        $this->load->view('template/head', $data);
        ?>

</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?= base_url() ?>index.php/Admin/in_admin">SIMPEG</a>

        <?php $this->load->view('template/header_ad') ?>

    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

    <?php $this->load->view('template/menu_admin') ?>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-print"></i> Cetak CV Karyawan</h1>
                <p>Mencetak Cv Karyawan</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/Welcome/Rekap_peringatan"> Cetak CV Karyawan</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h4 class="tile-title">Tabel Data Karyawan</h4>
                    <hr align="right" color="black">
                    <div class="row">
                        <div class="form-group mx-sm-3 mb-2">
                            <?= form_open(''); ?>
                            <input required class="form-control" type="text" aria-describedby="basic-addon2" name="npp_cari" placeholder=" Masukan NPP....." required><small class="form-text text-muted" id="emailHelp">Masukkan NPP yang akan anda cari</small>
                        </div>
                        <button class="btn btn-info mb-5" type="submit" name="cari"><i class="fa fa-search"></i>Cari</button>&nbsp;&nbsp;&nbsp;
                        <?= form_close(); ?>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>NPP</th>
                                    <th>Nama Lengkap</th>
                                    <th>Pangkat / Golongan</th>
                                    <th>Tempat / Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>Alamat Kantor</th>
                                    <th>Alamat Rumah</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Golongan Darah</th>
                                    <th>Status Pernikahan</th>
                                    <th>Cetak CV</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($_POST['cari'])) {
                                        foreach ($bio as $v) { ?>
                                <tr>
                                    <td><?= $v['npp'] ?></td>
                                    <td><?= $v['nama'] ?></td>
                                    <?php
                                                $golbaru = $this->Model_admin->get_gol_akhir($v['npp']);
                                                foreach ($golbaru as $d) { ?>
                                    <?php $gol = $this->Model_admin->get_gol($d['golongan']);
                                                    foreach ($gol as $y) : ?>
                                    <td><?= $y['gol'] ?> / <?= $d['mk'] ?></td>
                                    <?php endforeach ?>
                                    <?php } ?>
                                    <td><?= $v['kota_lhr'] ?> / <?= date('d-m-Y', strtotime($v['tgl_lhr'])) ?></td>
                                    <?php
                                                $agama = $this->Model_admin->get_agama($v['agama']);
                                                foreach ($agama as $q) : ?>
                                    <?php if ($q['kd_agama'] < 0) { ?>
                                    <td></td>
                                    <?php } else { ?>
                                    <td><?= $q['nm_agama'] ?></td>
                                    <?php } ?>
                                    <?php endforeach ?>
                                    <?php
                                                $alamat = $this->Model_admin->almt($v['npp']);
                                                foreach ($alamat as $c) { ?>
                                    <?php
                                                    $ini = $this->Model_admin->unit($c['kd_unit']);
                                                    foreach ($ini as $p) { ?>
                                    <td><?= $p['nm_unit'] ?></td>
                                    <?php } ?>
                                    <?php } ?>
                                    <td><?= $v['alamat_tgl'] ?></td>
                                    <?php
                                                $jk = $this->Model_admin->get_jenis_kelamin($v['j_kelamin']);
                                                foreach ($jk as $z) : ?>
                                    <td><?= $z['nm_kelamin'] ?></td>
                                    <?php endforeach ?>
                                    <td><?= $v['gol_darah'] ?></td>
                                    <?php
                                                $sipil = $this->Model_admin->get_sipil($v['st_sipil']);
                                                foreach ($sipil as $s) : ?>
                                    <?php if ($s['kd_sipil'] < 0) { ?>
                                    <td></td>
                                    <?php } else { ?>
                                    <td><?= $s['nm_sipil'] ?></td>
                                    <?php } ?>
                                    <?php endforeach ?>
                                    <td><a class="btn btn-primary icon-btn mb-5" href="<?= base_url() ?>index.php/Tabel_CV/view_cv_admin/<?= $bio[0]['npp'] ?>"><i class="fa fa-print"></i>Cetak CV </a></td>
                                </tr>
                                <?php }
                                    } else {
                                        echo "<tr>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        </tr>";
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <hr align="right" color="black">
                </div>
            </div>
            <footer>
                <! -- footer area start-->
                    <?php $this->load->view('template/footer') ?>
                    <! -- footer area end-->
            </footer>
    </main>

    <!-- Main Menu area start-->
    <?php $this->load->view('template/script') ?>
    <!-- Main Menu area End-->

</body>

</html>
<?php } ?>