<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    function __construct()
    {
        $this->load->model('Model_admin');
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php $this->load->view('template/head') ?>

    </head>

    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="<?= base_url() ?>index.php/Admin/in_admin">SIMPEG</a>

            <?php $this->load->view('template/header') ?>

        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_admin') ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-th-list"></i> REKAP PERINGATAN </h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/Welcome/Rekap_peringatan"> REKAP PERINGATAN</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h3 class="title"></h3>
                            <li><a href="<?= base_url() ?>index.php/ExcelA1/export"> Cetak EXCEL</a></li>
                        </div>
                        <div class="tile">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>NPP</th>
                                        <th>NAMA</th>
                                        <th>NAMA PANGGIL</th>
                                        <th>GELAR DEPAN</th>
                                        <th>GELAR BELAKANG</th>
                                        <th>TEMPAT LAHIR</th>
                                        <th>TANGGAL LAHIR</th>
                                        <th>KELAMIN</th>
                                        <th>GOLONGAN DARAH</th>
                                        <th>AGAMA</th>
                                        <th>ALAMAT</th>
                                        <th>KOTA</th>
                                        <th>TINGGAL</th>
                                        <th>STATUS SIPIL</th>
                                        <th>STAT IS</th>
                                        <th>TANGGAL NIKAH</th>
                                        <th>TANGGAL CAERAI</th>
                                        <th>ANAK KANDUNG</th>
                                        <th>ANAK ANGKAT</th>
                                        <th>TANGGUNGAN</th>
                                        <th>TGG PPH</th>
                                        <th>KODE PENDIDIKAN</th>
                                        <th>TANGGAL SK</th>
                                        <th>NO SK</th>
                                        <th>KODE KELAS</th>
                                        <th>KELAS TMT</th>
                                        <th>KELAS SK</th>
                                        <th>GOLONGAN</th>
                                        <th>MK</th>
                                        <th>GOLONGAN TMT</th>
                                        <th>GOLONGAN SK</th>
                                        <th>GPO</th>
                                        <th>KODE KEBUN</th>
                                        <th>KODE AFD</th>
                                        <th>KODE JABATAN</th>
                                        <th>NAMA JABATAN</th>
                                        <th>KODE BUDIDAYA</th>
                                        <th>JABATAN TMT</th>
                                        <th>JABATAN SK</th>
                                        <th>JABATAN TANGGAL</th>
                                        <th>ASTEK</th>
                                        <th>TASPEN</th>
                                        <th>NO KK</th>
                                        <th>NO NIK</th>
                                        <th>NO BPJS</th>
                                        <th>TANGGAL MASA PERSIAPAN PENSIUN</th>
                                        <th>TANGGAL PENSIUN</th>
                                        <th>MK TAHUN</th>
                                        <th>MK BULAN</th>
                                        <th>MK HARI</th>
                                        <th>MASA PERSIAPAN PENSIUN</th>
                                        <th>STAT REC</th>
                                <tbody>
                                    <?php foreach ($ta1->result_array() as $i) { ?>
                                        <tr>
                                            <td><?= $i['npp'] ?></td>
                                            <td><?= $i['nama'] ?></td>
                                            <td><?= $i['nm_pgl'] ?></td>
                                            <td><?= $i['glr_dpn'] ?></td>
                                            <td><?= $i['glr_blk'] ?></td>
                                            <td><?= $i['kota_lhr'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($i['tgl_lhr'])) ?></td>
                                            <td><?= $i['j_kelamin'] ?></td>
                                            <td><?= $i['gol_darah'] ?></td>
                                            <td><?= $i['agama'] ?></td>
                                            <td><?= $i['alamat_tgl'] ?></td>
                                            <td></td>
                                            <td>1</td>
                                            <td><?= $i['st_sipil'] ?></td>
                                            <!-- sdm02 -->
                                            <?php
                                            $sdm02 = $this->Model_admin->get_sdm02_a1($i['npp']);
                                            foreach ($sdm02 as $a) { ?>
                                                <td></td>
                                                <td><?= date('d-m-Y', strtotime($a['tgl_nkh'])) ?></td>
                                                <td><?= date('d-m-Y', strtotime($a['tgl_cerai'])) ?></td>
                                            <?php } ?>
                                            <!-- end sdm02 -->

                                            <!-- sdm02 anak kandung + angkat = tanggung -->
                                            <?php
                                            $sdm02 = $this->Model_admin->get_sdm02_a1_anak($i['npp']);
                                            foreach ($sdm02 as $b) { ?>
                                                <td></td>
                                                <td></td>
                                                <td><?= $b['tanggungan'] ?></td>
                                                <td></td>
                                            <?php } ?>
                                            <!-- end sdm02 anak kandung + angkat = tanggung -->

                                            <!-- sdm03 -->
                                            <?php
                                            $sdm03 = $this->Model_admin->get_sdm03_a1($i['npp']);
                                            foreach ($sdm03 as $c) { ?>
                                                <td><?= $c['kd_pend'] ?></td>
                                            <?php } ?>
                                            <!-- end sdm03 -->

                                            <td><?= date('d-m-Y', strtotime($i['tgl_masuk'])) ?></td>

                                            <!-- sdm08 -->
                                            <?php
                                            $sdm08 = $this->Model_admin->get_sdm08_a1($i['npp']);
                                            foreach ($sdm08 as $d) { ?>
                                                <td><?= $d['no_sk'] ?></td>
                                            <?php } ?>
                                            <!-- end sdm08 -->

                                            <!-- sdm16 -->
                                            <?php
                                            $sdm16 = $this->Model_admin->get_sdm16_a1($i['npp']);
                                            foreach ($sdm16 as $e) { ?>
                                                <td><?= $e['kd_kelas'] ?></td>
                                                <td><?= date('d-m-Y', strtotime($e['kls_tmt'])) ?></td>
                                                <td><?= $e['kls_sk'] ?></td>

                                            <?php } ?>
                                            <!-- end sdm16 -->

                                            <!--  sdm16_akhir -->
                                            <?php
                                            $sdm16 = $this->Model_admin->get_sdm16_a1_akhir($i['npp']);
                                            foreach ($sdm16 as $a) { ?>
                                                <td><?= $a['golongan'] ?></td>
                                                <td><?= $a['mk'] ?></td>
                                                <td><?= date('d-m-Y', strtotime($a['gol_tmt'])) ?></td>
                                                <td><?= $a['gol_sk'] ?></td>
                                                <td></td>
                                            <?php } ?>
                                            <!-- END  sdm16_akhir -->

                                            <!-- sdm 08 akhir  -->
                                            <?php
                                            $sdm08 = $this->Model_admin->get_sdm08_a1_akhir($i['npp']);
                                            foreach ($sdm08 as $a) { ?>
                                                <td><?= $a['kd_kbn'] ?></td>
                                                <td><?= $a['kd_adf'] ?></td>
                                                <td><?= $a['kd_jab'] ?></td>

                                                <?php $jab = $this->Model_admin->get_jabatan($a['kd_jab']);
                                                foreach ($jab as $jab) { ?>
                                                    <td><?= $jab['nama'] ?></td>
                                                <?php } ?>

                                                <td><?= $a['kd_bud'] ?></td>
                                                <td><?= date('d-m-Y', strtotime($a['jab_tmt'])) ?></td>
                                                <td><?= $a['jab_sk'] ?></td>
                                                <td><?= date('d-m-Y', strtotime($a['jab_tgl'])) ?></td>
                                            <?php } ?>
                                            <!-- end sdm 08 akhir -->

                                            <td><?= $i['no_astek'] ?></td>
                                            <td><?= $i['no_pens'] ?></td>
                                            <td><?= $i['no_kk'] ?></td>
                                            <td><?= $i['no_nik'] ?></td>
                                            <td><?= $i['no_bpjs'] ?></td>
                                            <!-- end sdm08_akhir -->

                                            <!-- MPP PEN -->
                                            <?php
                                            $sdm16 = $this->Model_admin->get_sdm16_a1_akhir($i['npp']);
                                            $golongan = $sdm16[0]['golongan'];
                                            $golongan = (int) $golongan;
                                            if ($golongan >= 0 and $golongan <= 8) {
                                                $tgl_pen = date('Y-m-d', strtotime('+55 year +1 month', strtotime($i['tgl_lhr'])));
                                                $tgl_mpp = date('Y-m-d', strtotime('-6 month', strtotime($tgl_pen)));
                                                echo "<td>" . date('01-m-Y', strtotime($tgl_mpp)) . "</td>";
                                                echo "<td>" . date('01-m-Y', strtotime($tgl_pen)) . "</td>";
                                            }
                                            if ($golongan >= 9 and $golongan <= 16) {
                                                $tgl_pen = date('Y-m-d', strtotime('+56 year +1 month', strtotime($i['tgl_lhr'])));
                                                $tgl_mpp = date('Y-m-d', strtotime('-6 month', strtotime($tgl_pen)));
                                                echo "<td>" . date('01-m-Y', strtotime($tgl_mpp)) . "</td>";
                                                echo "<td>" . date('01-m-Y', strtotime($tgl_pen)) . "</td>";
                                            }

                                            $sdm01 = $this->Model_admin->tampil_a1($i['npp'])->result_array();
                                            $skrng = date_create($sdm01[0]['tgl_masuk']);
                                            $tgl_pen = date_create($tgl_pen);

                                            $diff = $skrng->diff($tgl_pen);

                                            if ($diff->y >= 57) { ?>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            <?php } else { ?>
                                                <td><?= $diff->y ?></td>
                                                <td><?= $diff->m ?></td>
                                                <td><?= $diff->d ?></td>
                                                <td></td>
                                                <td></td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <!-- footer area start-->
                <?php $this->load->view('template/footer') ?>
                <!-- footer area end-->
            </footer>
        </main>

        <!-- Main Menu area start-->
        <?php $this->load->view('template/script') ?>
        <!-- Main Menu area End-->

    </body>

    </html>
<?php } ?>