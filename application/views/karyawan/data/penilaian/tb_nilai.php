<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        $data['tittle'] = "Hasil Penilaian Kinerja";
        $this->load->view('template/head', $data);
        ?>

</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/Admin/in_admin">SIMPEG</a>

        <?php $this->load->view('template/header') ?>

    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

    <?php $this->load->view('template/menu_kar') ?>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-bar-chart"></i> Hasil Penilaian Kinerja</h1>
                <p></p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"></li> Penilaian Kinerja
                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/hak_akses/hak"> Hasil Penilaian Kinerja </a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Tabel Hasil Penilaian Kinerja</h3>
                    <hr align="right" color="black">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>NPP KARYAWAN</th>
                                    <th>NAMA KARYAWAN</th>
                                    <th>NPP PEJABAT PENILAI</th>
                                    <th>NAMA PEJABAT PENILAI</th>
                                    <th>NPP ATASAN PEJABAT PENILAI</th>
                                    <th>NAMA ATASAN PEJABAT PENILAI</th>
                                    <th>JABATAN</th>
                                    <th>NILAI</th>
                                    <th>KETERANGAN</th>
                                    <th>TANGGAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tb_nli as $tb) { ?>
                                <tr>
                                    <td><?= $tb['npp'] ?></td>
                                    <td><?= $tb['nm_kar'] ?></td>
                                    <td><?= $tb['npp_pmpn'] ?></td>
                                    <td><?= $tb['nm_pmpn'] ?></td>
                                    <td><?= $tb['npp_ats_pmpn'] ?></td>
                                    <td><?= $tb['nm_ats_pmpn'] ?></td>
                                    <td><?php $get = $this->Model_karyawan->get_jab($tb['jabatan']);
                                    foreach ($get as $k ) {
                                        echo $k['nama'];
                                    }  ?></td>
                                    <td><?= $tb['nilai'] ?></td>
                                    <td><?= $tb['ket'] ?></td>
                                    <td><?= $tb['tgl'] ?></td>
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