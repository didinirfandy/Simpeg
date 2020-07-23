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
        <?php $this->load->view('template/header_ad') ?>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

    <?php $this->load->view('template/menu_admin') ?>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-home"></i> Dashboard</h1>
                <p>Jujur Tulus Ikhlas SIAP!!!</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="<?= base_url() ?>index.php/Admin/in_admin">Dashboard</a></li>
            </ul>
        </div>
        <?= $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-lg-3">
                <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
                    <div class="info">
                        <h4>Karyawan</h4>
                        <p><b><?= $jmlh[0]['id'] ?></b></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget-small info"><i class="icon fa fa-user-times fa-3x"></i>
                    <div class="info">
                        <h4>Cuti </h4>
                        <p><b><?= $jmlh_c_sakit + $jmlh_c_thn + $jmlh_c_pjg; ?></b></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget-small warning"><i class="icon fa fa-clock-o fa-3x"></i>
                    <div class="info">
                        <h4>Lembur </h4>
                        <p><b><?= $jmlh_hsl_p_lmbr; ?></b></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget-small danger"><i class="icon fa fa-bell-o fa-3x"></i>
                    <div class="info">
                        <h4>Notifikasi Approve </h4>
                        <?php
                        $this->load->model('Model_admin');
                        $notif1 = $this->Model_admin->tempt01();
                        $notif2 = $this->Model_admin->tempt02();
                        $notif3 = $this->Model_admin->tempt03();
                        $notif4 = $this->Model_admin->tempt04();
                        $i = 0;
                        foreach ($notif1 as $b) {
                            $i++;
                        }
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

        <footer>
            <!-- footer area start-->
            <?php $this->load->view('template/footer') ?>
            <!-- footer area end-->
        </footer>

    </main>


    <?php $this->load->view('template/script') ?>

</body>

</html>