<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "Status Data Keluarga ";
        $this->load->view('template/head', $data);
        ?>

    </head>

    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="<?= base_url() ?>index.php/Karyawan/in_kar">SIMPEG</a>

            <?php $this->load->view('template/header') ?>

        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_kar') ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-users"></i> Status Data Keluarga</h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Biodata Keluarga</li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/admin/tabel_sdm/sdm03">Status Data Keluarga</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h4 class="title">Tabel Status Data Keluarga</h4>
                        </div>
                        <hr align="right" color="black">
                        <div class="tile">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>NPP</th>
                                        <th>NO URUT</th>
                                        <th>NAMA</th>
                                        <th>HUBUNGAN KELUARGA</th>
                                        <th>TANGGAL LAHIR</th>
                                        <th>KOTA LAHIR</th>
                                        <th>NEGARA LAHIR</th>
                                        <th>JENIS KELAMIN</th>
                                        <th>GOLONGAN DARAH</th>
                                        <th>AGAMA</th>
                                        <th>TINGKAT PENDIDIKAN</th>
                                        <th>TINGKAT SIPIL</th>
                                        <th>STATUS KERJA</th>
                                        <th>TANGGAL NIKAH</th>
                                        <th>TANGGAL CERAI</th>
                                        <th>TANGGAL MENIGGAL</th>
                                        <th>ALAMAT</th>
                                        <th>NO KARTU KELUARGA</th>
                                        <th>NIK</th>
                                        <th>NO BPJS</th>
                                        <th>IMAGE</th>
                                        <th>TANGGAL DAN JAM</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tempt2 as $b) { ?>
                                        <tr>
                                            <td><?= $b['npp'] ?></td>
                                            <td><?= $b['no_urut'] ?></td>
                                            <td><?= $b['nama'] ?></td>
                                            <td><?= $b['hbg_klg'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($b['tgl_lhr'])) ?></td>
                                            <td><?= $b['kota_lhr'] ?></td>
                                            <td><?= $b['ngr_lhr'] ?></td>
                                            <td><?= $b['kelamin'] ?></td>
                                            <td><?= $b['gol_darah'] ?></td>
                                            <td><?= $b['agama'] ?></td>
                                            <td><?= $b['tk_pend'] ?></td>
                                            <td><?= $b['st_sipil'] ?></td>
                                            <td><?= $b['st_kerja'] ?></td>
                                            <td><?= $b['tgl_nkh'] ?></td>
                                            <td><?= $b['tgl_cerai'] ?></td>
                                            <td><?= $b['tgl_mgl'] ?></td>
                                            <td><?= $b['alamat'] ?></td>
                                            <td><?= $b['no_kk'] ?></td>
                                            <td><?= $b['nik'] ?></td>
                                            <td><?= $b['no_bpjs'] ?></td>
                                            <td><img src="<?= base_url('assets_application/assets/PrintOUT/karyawan/BioKeluarga/') . $b['image'] ?>" awidth="100" height="90"></td>
                                            <td><?= date('d-m-Y H:i:s', strtotime($b['tgl'])) ?></td>
                                            <td><?php
                                                if ($b['status'] == 1) {
                                                    echo "<i class='fa fa-hourglass-half'></i> <font class='btn-warning'> Pendding......</font>";
                                                } elseif ($b['status'] == 2) {
                                                    echo "<i class='fa fa-check-circle'></i> <font class='btn-success'> Agree</font>";
                                                } elseif ($b['status'] == 3) {
                                                    echo "<i class='fa fa-times-circle'></i> <font class='btn-danger'> Reject</font>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($b['valid'] == 1) {
                                                    echo "<i class='fa fa-plus-square'></i> <font color='green'>INPUT DATA</font>";
                                                } elseif ($b['valid'] == 2) {
                                                    echo "<i class='fa fa-pencil-square'></i> <font color='blue'>EDIT DATA</font>";
                                                }
                                                ?>
                                            </td>
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
                <?php $this->load->view('template/footer'); ?>
                <!-- footer area end-->
            </footer>
        </main>

        <!-- Main Menu area start-->
        <?php $this->load->view('template/script'); ?>
        <!-- Main Menu area End-->
    </body>

    </html>
<?php
} ?>