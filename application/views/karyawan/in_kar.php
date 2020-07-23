<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    $data['tittle'] = "Dashboard";
    $this->load->view('template/head', $data);
    ?>

</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="#">SIMPEG</a>
        <?php $this->load->view('template/header') ?>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

    <?php $this->load->view('template/menu_kar') ?>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-home"></i> Dashboard</h1>
                <p>Aplikasi Cetak CV Bagi Karyawan PTPN VII</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ul>
        </div>
        <?= $this->session->flashdata('pesan'); ?>
        <?php
        $npp = $this->session->userdata('status_login_username');
        $data = $this->Model_karyawan->get_kd_menu($npp);
        foreach ($data as $key) {
            $kd_menu = $key['kd_menu'];
        }
        if ($kd_menu >= 81111 and $kd_menu <= 83652) { ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="widget-small primary"><i class="icon fa fa-user-times fa-3x"></i>
                    <div class="info">
                        <h4>Jumlah Cuti</h4>
                        <p><b><?= $jmlh_c_sakit + $jmlh_c_thn + $jmlh_c_pjg; ?> Hari</b></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget-small info"><i class="icon fa fa-clock-o fa-3x"></i>
                    <div class="info">
                        <h4>Jumlah Lembur</h4>
                        <p><b><?= $jmlh_hsl_p_lmbr; ?> Jam</b></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget-small warning"><i class="icon fa fa-files-o fa-3x"></i>
                    <div class="info">
                        <h4>Penilaian Kinerja</h4>
                        <?php foreach ($hsl as $h) { ?>
                        <p><b><?= $h['nilai'] ?></b></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget-small danger"><i class="icon fa fa-bell-o fa-3x"></i>
                    <div class="info">
                        <h4>Notifikasi</h4>
                        <?php
                            $this->load->model('Model_admin');
                            $npp    = $this->session->userdata('status_login_username');
                            $notif2 = $this->Model_admin->tempt02_kar($npp);
                            $notif3 = $this->Model_admin->tempt03_kar($npp);
                            $notif4 = $this->Model_admin->tempt04_kar($npp);
                            $i = 0;
                            foreach ($notif2 as $b) {
                                $i++;
                            }
                            foreach ($notif3 as $a) {
                                $i++;
                            }
                            foreach ($notif4 as $a) {
                                $i++;
                            }
                            ?>
                        <p><b><?= $i ?></b></p>
                    </div>
                </div>
            </div>
        </div>
        <?php } elseif (
            $kd_menu == 8111 or $kd_menu == 8112 or $kd_menu == 8113
            or $kd_menu == 8121 or $kd_menu == 8122 or $kd_menu == 8123
            or $kd_menu == 8131 or $kd_menu == 8132 or $kd_menu == 8133 or $kd_menu == 8134
            or $kd_menu == 8141 or $kd_menu == 8142
            or $kd_menu == 8211 or $kd_menu == 8212 or $kd_menu == 8213 or $kd_menu == 8214 or $kd_menu == 8215
            or $kd_menu == 8221 or $kd_menu == 8222 or $kd_menu == 8223 or $kd_menu == 8224
            or $kd_menu == 8311 or $kd_menu == 8312
            or $kd_menu == 8321 or $kd_menu == 8322 or $kd_menu == 8323
            or $kd_menu == 8331 or $kd_menu == 8332
            or $kd_menu == 8341 or $kd_menu == 8342 or $kd_menu == 8343
            or $kd_menu == 8351 or $kd_menu == 8352 or $kd_menu == 8353 or $kd_menu == 8354
            or $kd_menu == 8361 or $kd_menu == 8362 or $kd_menu == 8363 or $kd_menu == 8364 or $kd_menu == 8365
        ) { ?>
        <div class="row">
            <div class="col-lg-4">
                <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
                    <div class="info">
                        <h4>Jumlah Cuti</h4>
                        <p><b><?= $jmlh_c_sakit + $jmlh_c_thn + $jmlh_c_pjg; ?> Hari</b></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-small warning coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
                    <div class="info">
                        <h4>Jumlah Lembur</h4>
                        <p><b><?= $jmlh_hsl_p_lmbr; ?> Jam</b></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-small danger"><i class="icon fa fa-bell-o fa-3x"></i>
                    <div class="info">
                        <h4>Notifikasi</h4>
                        <?php
                            $this->load->model('Model_admin');
                            $npp    = $this->session->userdata('status_login_username');
                            $notif2 = $this->Model_admin->tempt02_kar($npp);
                            $notif3 = $this->Model_admin->tempt03_kar($npp);
                            $notif4 = $this->Model_admin->tempt04_kar($npp);
                            $i = 0;
                            foreach ($notif2 as $b) {
                                $i++;
                            }
                            foreach ($notif3 as $a) {
                                $i++;
                            }
                            foreach ($notif4 as $a) {
                                $i++;
                            }
                            ?>
                        <p><b><?= $i ?></b></p>
                    </div>
                </div>
            </div>
        </div>
        <?php } elseif (
            $kd_menu == 8110 or $kd_menu == 8120 or $kd_menu == 8130 or $kd_menu == 8140
            or $kd_menu == 8210 or $kd_menu == 8220 or $kd_menu == 8310 or $kd_menu == 8320 or $kd_menu == 8330
            or $kd_menu == 8340 or $kd_menu == 8350 or $kd_menu == 8350 or $kd_menu == 8360
        ) { ?>
        <div class="row">
            <div class="col-lg-4">
                <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
                    <div class="info">
                        <h4>Jatah Cuti Bulan Juli</h4>
                        <p><b>12</b></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-small warning coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
                    <div class="info">
                        <h4>Jam Lembur Bulan Juli</h4>
                        <p><b>18 Jam</b></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="widget-small danger"><i class="icon fa fa-bell-o fa-3x"></i>
                    <div class="info">
                        <h4>Notifikasi</h4>
                        <?php
                            $this->load->model('Model_admin');
                            $npp    = $this->session->userdata('status_login_username');
                            $notif2 = $this->Model_admin->tempt02_kar($npp);
                            $notif3 = $this->Model_admin->tempt03_kar($npp);
                            $notif4 = $this->Model_admin->tempt04_kar($npp);
                            $i = 0;
                            foreach ($notif2 as $b) {
                                $i++;
                            }
                            foreach ($notif3 as $a) {
                                $i++;
                            }
                            foreach ($notif4 as $a) {
                                $i++;
                            }
                            ?>
                        <p><b><?= $i ?></b></p>
                    </div>
                </div>
            </div>
        </div>
        <?php } elseif ($kd_menu == 4) {
            echo "";
        } ?>
        <!-- <div class="data-table-area"> -->
        <div class="tile">
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <h3 class="tile-title">SELAMAT DATANG</h3>
                    </center>
                    <center>
                        <h3 class="tile-title"><?php echo $this->session->userdata('status_login'); ?></h3>
                    </center>
                    <!-- <div class="embed-responsive embed-responsive-16by9">
                            <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                        </div> -->
                </div>
            </div>
        </div>
        <!-- </div> -->

        <footer>
            <!-- footer area start-->
            <?php $this->load->view('template/footer') ?>
            <!-- footer area end-->
        </footer>

    </main>

    <?php $this->load->view('template/script') ?>


</body>

</html>