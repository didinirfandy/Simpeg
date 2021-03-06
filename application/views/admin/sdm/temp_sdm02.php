<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "Temporary Data Keluarga ";
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
                    <h1><i class="fa fa-th-list"></i> Temporary Data Keluarga</h1>
                    <p>Persetujuan Perubahan Data Keluarga</p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Tabel Temporary</li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/admin/tabel_sdm/sdm03">Temporary Data Keluarga</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h4 class="title">Tabel Temporary Data Keluarga</h4>
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
                                        <th>OPTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tempt as $b) { ?>
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
                                            <td><?= date('d-m-Y', strtotime($b['tgl_nkh'])) ?></td>
                                            <td><?= date('d-m-Y', strtotime($b['tgl_cerai'])) ?></td>
                                            <td><?= date('d-m-Y', strtotime($b['tgl_mgl'])) ?></td>
                                            <td><?= $b['alamat'] ?></td>
                                            <td><?= $b['no_kk'] ?></td>
                                            <td><?= $b['nik'] ?></td>
                                            <td><?= $b['no_bpjs'] ?></td>
                                            <td><img src="<?= base_url('assets_application/assets/PrintOUT/karyawan/BioKeluarga/') . $b['image'] ?>" width="100" height="90"></td>
                                            <td><?= date('d-m-Y H:i:s', strtotime($b['tgl'])) ?></td>
                                            <td>
                                                <?php
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
                                            <?php
                                            if ($b['valid'] == 1) { ?>
                                            <td>
                                                <?php if ($b['status'] == 1) { ?>
                                                    <a href="<?= base_url() ?>index.php/admin/aprove_sdm02/<?= $b['id_sdm02'] ?>" class="btn btn-info hapus-data"><i class="fa fa-check-circle"></i> Agree</a><br><br>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eject<?= $b['id_sdm02'] ?>"><i class="fa fa-times-circle"></i> Reject </button>
                                                <?php } elseif ($b['status'] == 2) { ?>
                                                    <button type="button" class="btn btn-info" disabled=""><i class="fa fa-check-circle"></i> Agree</button><br><br>
                                                    <button type="button" class="btn btn-danger" disabled=""><i class="fa fa-times-circle"></i> Reject </button>
                                                <?php } elseif ($b['status'] == 3) { ?>
                                                    <button type="button" class="btn btn-info" disabled=""><i class="fa fa-check-circle"></i> Agree</button><br><br>
                                                    <button type="button" class="btn btn-danger" disabled=""><i class="fa fa-times-circle"></i> Reject </button>
                                                <?php } ?>
                                            </td>
                                            <?php } elseif ($b['valid'] == 2) { ?>
                                                <td>
                                                <?php if ($b['status'] == 1) { ?>
                                                    <a href="<?= base_url() ?>index.php/admin/aprove_edit_sdm02/<?= $b['id_sdm02'] ?>" class="btn btn-info hapus-data"><i class="fa fa-check-circle"></i> Agree</a><br><br>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eject<?= $b['id_sdm02'] ?>"><i class="fa fa-times-circle"></i> Reject </button>
                                                <?php } elseif ($b['status'] == 2) { ?>
                                                    <button type="button" class="btn btn-info" disabled=""><i class="fa fa-check-circle"></i> Agree</button><br><br>
                                                    <button type="button" class="btn btn-danger" disabled=""><i class="fa fa-times-circle"></i> Reject </button>
                                                <?php } elseif ($b['status'] == 3) { ?>
                                                    <button type="button" class="btn btn-info" disabled=""><i class="fa fa-check-circle"></i> Agree</button><br><br>
                                                    <button type="button" class="btn btn-danger" disabled=""><i class="fa fa-times-circle"></i> Reject </button>
                                                <?php } ?>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Input Alasan Lembur -->
            <?php foreach ($tempt as $b) { ?>
                <div id="eject<?= $b['id_sdm02'] ?>" role="dialog" class="modal fade">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Konfirmasi</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <?= form_open('admin/reject_sdm02');  ?>
                            <div class="modal-body">
                                <p>Anda yakin mau menolak data ini ?</p>
                                <input type="hidden" name="id_sdm02" value="<?= $b['id_sdm02'] ?>">
                                <input type="hidden" name="status" value="3">
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button class="btn btn-warning" name="reject" type="submit"><i class="fa fa-fw fa-lg fa-exclamation "></i>Yes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

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
                    text: "Anda Telah Mneyetujia Data Ini",
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
                    title: "Apakah Anda Yakin Menyetujui Data Ini?",
                    text: "Jika Data Di Setujui, Data pada tabel ini tidak bisa ditolak!!!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Agree!",
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
} ?>