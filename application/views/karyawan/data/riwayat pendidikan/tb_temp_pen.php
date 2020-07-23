<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "Temporary Data Pendidikan ";
        $this->load->view('template/head', $data);
        ?>

    </head>

    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="<?= base_url() ?>index.php/Karyawan/in_kar">SIMPEG</a>

            <?php $this->load->view('template/header'); ?>

        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_kar'); ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-th-list"></i> Temporary Data Pendidikan</h1>
                    <p>Menampilkan Data Input dan Edit Karyawan</p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Pendidikan </li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/admin/tabel_sdm/sdm03">Status Data Pendidikan</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h4 class="title">Tabel Status Data Pendidikan</h4>
                            <div class="status-berhasil" data-berhasil="<?= $this->session->flashdata('berhasil'); ?>"></div>
                            <div class="status-gagal" data-gagal="<?= $this->session->flashdata('gagal'); ?>"></div>
                        </div>
                        <hr align="right" color="black">
                        <div class="tile">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>NPP</th>
                                        <th>NO URUT</th>
                                        <th>TINGKAT PENDIDIKAN</th>
                                        <th>KODE PENDIDIKAN</th>
                                        <th>NAMA</th>
                                        <th>KOTA</th>
                                        <th>STATUS AKREDITASI</th>
                                        <th>DNLN</th>
                                        <th>TAHUN AWAL</th>
                                        <th>TAHUN AKHIR</th>
                                        <th>STATUS LULUS</th>
                                        <th>NO IJASAH</th>
                                        <th>TANGGAL IJASAH</th>
                                        <th>NILAI</th>
                                        <th>GRADE</th>
                                        <th>KETERANGAN</th>
                                        <th>IMAGE</th>
                                        <th>TANGGAL</th>
                                        <th>GELAR DEPAN</th>
                                        <th>GELAR BELAKANG</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tempt3 as $c) { ?>
                                        <tr>
                                            <td><?= $c['npp'] ?></td>
                                            <td><?= $c['no_urut'] ?></td>
                                            <td><?= $c['tk_pend'] ?></td>
                                            <td><?= $c['kd_pend'] ?></td>
                                            <td><?= $c['nama'] ?></td>
                                            <td><?= $c['kota'] ?></td>
                                            <td><?= $c['st_akred'] ?></td>
                                            <td><?= $c['dnln'] ?></td>
                                            <td><?= $c['thn_awal'] ?></td>
                                            <td><?= $c['thn_akhir'] ?></td>
                                            <td><?= $c['st_lulus'] ?></td>
                                            <td><?= $c['no_ijasah'] ?></td>
                                            <td><?= $c['tgl_ijasah'] ?></td>
                                            <td><?= $c['nilai'] ?></td>
                                            <td><?= $c['grade'] ?></td>
                                            <td><?= $c['ket'] ?></td>
                                            <td><img src="<?= base_url('assets_application/assets/PrintOUT/karyawan/pendidikan/') . $c['image'] ?>" width="100" height="90"></td>
                                            <td><?= date('d-m-Y H:i:s', strtotime($c['tgl'])) ?></td>
                                            <td><?= $c['glr_dpn'] ?></td>
                                            <td><?= $c['glr_blk'] ?></td>
                                            <td><?php
                                                if ($c['status'] == 1) {
                                                    echo "<i class='fa fa-hourglass-half'></i> <font class='btn-warning'> Pendding......</font>";
                                                } elseif ($c['status'] == 2) {
                                                    echo "<i class='fa fa-check-circle'></i> <font class='btn-success'> Agree</font>";
                                                } elseif ($c['status'] == 3) {
                                                    echo "<i class='fa fa-times-circle'></i> <font class='btn-danger'> Reject</font>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($c['valid'] == 1) {
                                                    echo "<i class='fa fa-plus-square'></i> <font color='green'>INPUT DATA</font>";
                                                } elseif ($c['valid'] == 2) {
                                                    echo "<i class='fa fa-pencil-square'></i> <font color='blue'>EDIT DATA</>";
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
                <?php $this->load->view('template/footer') ?>
                <!-- footer area end-->
            </footer>
        </main>

        <!-- Main Menu area start-->
        <?php $this->load->view('template/script') ?>

        <script type="text/javascript">
            const berhasil = $('.status-berhasil').data('berhasil');
            // console.log(berhasil);
            if (berhasil) {
                swal({
                    title: "Berhasil " + berhasil,
                    text: "DATA DI HAPUS DARI TABEL INI",
                    type: "success",
                    timer: 8000,
                    showConfirmButton: false
                });
            }

            const gagal = $('.status-gagal').data('gagal');
            // console.log(gagal);
            if (gagal) {
                swal({
                    title: "Gagal " + gagal,
                    text: "PERIKSA KEMBALI DATA INI",
                    type: "error",
                    timer: 8000,
                    showConfirmButton: false
                });
            }

            $('.hapus-data').on('click', function(e) {

                e.preventDefault();
                const href = $(this).attr('href');

                swal({
                    title: "Apakah Anda Yakin Approve Data Ini?",
                    text: "Jika Data Di Approve, Data pada tabel ini akan di Hapus Otomatis!!!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Approve!",
                    cancelButtonText: "No, cancel!"
                }, function(result) {
                    if (result) {
                        document.location.href = href;
                    }
                });
            });
        </script>
        <!-- Main Menu area End-->
    </body>

    </html>
<?php
}
$this->session->unset_userdata("status_insert"); ?>