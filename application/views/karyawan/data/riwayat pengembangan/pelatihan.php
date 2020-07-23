<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        $data['tittle'] = "Pelatihan";
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
                <h1><i class="fa fa-desktop"></i> Pelatihan </h1>
                <p></p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Riwayat Pengembangan</li>
                <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/karyawan/data/riwayat pengembangan/pelatihan"> Pelatihan</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title">Riwayat Pelatihan</h3>
                        <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
                        <div class="btn-group">
                            <a class="btn btn-primary" href="<?= base_url() ?>index.php/karyawan/riwayat_pengembangan/temp_plthn"><i class="fa fa-eye"></i>View Status </a>
                            <a class="btn btn-primary" href="<?= base_url() ?>index.php/karyawan/riwayat_pengembangan/in_pelatihan"><i class="fa fa-plus"></i>Add Item </a>
                        </div>
                    </div>
                    <hr align="right" color="black">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th width="10">No</th>
                                    <th>Nama Latihan/Pengembangan Kompetensi</th>
                                    <th>Penyelenggara/Kota</th>
                                    <th width="10">Lama</th>
                                    <th>Nomor Sertifikasi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pela as $p) {
                                        if ($p['ket'] == "") { ?>
                                <tr>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                </tr>
                                <?php } else {
                                            ?>
                                <tr>
                                    <td><?= $p['no_urut'] ?></td>
                                    <td><?= $p['ket'] ?></td>
                                    <td><?= $p['nama'] ?></td>
                                    <td></td>
                                    <td><?= $p['no_sert'] ?></td>
                                    <td><a href="ed_pelatihan/<?= $p['no_urut'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i>Edit </a>
                                    </td>
                                </tr>
                                <?php }
                                    } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr align="right" color="black">
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
    <script type="text/javascript">
        const statusinsert = $('.status-insert').data('statusinsert');
        // console.log(statusinsert);
        if (statusinsert) {
            swal({
                title: "Berhasil " + statusinsert,
                text: "DATA AKAN DI VERIFIKASI OLEH ADMIN",
                type: "success",
                timer: 10000,
                showConfirmButton: false
            });
        }
    </script>

</body>

</html>
<?php } ?>