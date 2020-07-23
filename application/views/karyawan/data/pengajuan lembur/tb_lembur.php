<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = " Status Pengajuan Lembur ";
        $this->load->view('template/head', $data);
        ?>

    </head>

    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/Karyawan/in_kar">SIMPEG</a>

            <?php $this->load->view('template/header') ?>

        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_kar') ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-user-times"></i> Status Pengajuan Lembur </h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item"> Pengajuan Lembur</li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/karyawan/data/cuti"> Status Pengajuan Lembur </a></li>
                </ul>
            </div>
            <!-- Swetalert Berhasil -->
            <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
            <!-- Swetalert Gagal -->
            <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h4 class="title">Status Pengajuan Lembur</h4>
                        </div>
                        <hr align="right" color="black">
                        <div class="tile">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>Kode Lembur</th>
                                        <th>NPP</th>
                                        <th>Nama Kasubdiv</th>
                                        <th>Tanggal Lembur</th>
                                        <th>Jam Awal</th>
                                        <th>Jam Akhir</th>
                                        <th>Jumlah</th>
                                        <th>Jenis Pekerjaan</th>
                                        <th>Alasan Penolakan</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($p_lmbr as $m) { ?>
                                        <tr>
                                            <td><?= $m['kode_lmbr'] ?></td>
                                            <td><?= $m['npp'] ?></td>
                                            <td><?= $m['nama_p_lmbr'] ?></td>
                                            <td><?= $m['tgl_p'] ?></td>
                                            <td><?= date('H:i:s', strtotime($m['awal'])) ?></td>
                                            <td><?= date('H:i:s', strtotime($m['akhir'])) ?></td>
                                            <td><?= $m['jmlh'] ?></td>
                                            <td><?= $m['ket'] ?></td>
                                            <td><?= $m['alasan'] ?></td>
                                            <td><?= date('H:i:s d-m-Y', strtotime($m['tgl'])) ?></td>
                                            <td><?php
                                                if ($m['valid'] == 1) {
                                                    echo "<i class='fa fa-hourglass-half'></i> <font class='btn-warning'> Pendding......</font>";
                                                } elseif ($m['valid'] == 2) {
                                                    echo "<i class='fa fa-check-circle'></i> <font class='btn-success'> Agree......</font>";
                                                } elseif ($m['valid'] == 3) {
                                                    echo "<i class='fa fa-times-circle'></i> <font class='btn-danger'> Reject.....</font>";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($m['valid'] == 1) { ?>
                                                    <a href="<?= base_url() ?>index.php/Karyawan/kofirmasi_p_lmbr_setuju/<?= $m['id_p_lmbr'] ?>" class="btn btn-info data-succes"><i class="fa fa-check-circle" aria-hidden="true"></i>Agree </a><br><br>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#alasan_p_lmbr<?= $m['id_p_lmbr'] ?>"><i class="fa fa-times-circle" aria-hidden="true"></i>Reject </button>
                                                <?php } elseif ($m['valid'] == 2) { ?>
                                                    <button type="button" class="btn btn-info" disabled=""><i class="fa fa-check-circle"></i> Agree</button><br><br>
                                                    <button type="button" class="btn btn-danger" disabled=""><i class="fa fa-times-circle"></i>Reject </button>
                                                <?php } elseif ($m['valid'] == 3) { ?>
                                                    <button type="button" class="btn btn-info" disabled=""><i class="fa fa-check-circle"></i> Agree</button><br><br>
                                                    <button type="button" class="btn btn-danger" disabled=""><i class="fa fa-times-circle"></i>Reject </button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Input Alasan Lembur -->
            <?php foreach ($p_lmbr as $m) { ?>
                <div id="alasan_p_lmbr<?= $m['id_p_lmbr'] ?>" role="dialog" class="modal fade">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">From Input Alasan</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <?= form_open_multipart('Karyawan/kofirmasi_p_lmbr_tolak');  ?>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Alasan Tidak Menyetujui Lembur</label>
                                        <textarea class="form-control" rows="2" name="alasan" placeholder="Alasan......" required></textarea>
                                        <input type="hidden" name="id_p_lmbr" value="<?= $m['id_p_lmbr'] ?>">
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button class="btn btn-primary" name="edit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

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
            const statusinsert = $('.status-insert').data('statusinsert');
            // console.log(statusinsert);
            if (statusinsert) {
                swal({
                    title: "Berhasil " + statusinsert,
                    text: "Data Aakan Di Verifikasi Oleh Admin",
                    type: "success",
                    timer: 7000,
                    showConfirmButton: false
                });
            }

            const statusgagal = $('.status-gagal').data('statusgagal');
            // console.log(statusgagal);
            if (statusgagal) {
                swal({
                    title: "Gagal " + statusgagal,
                    text: "Mohon Konfirmasi Langsung Ke Admin",
                    type: "error",
                    timer: 10000,
                    showConfirmButton: false
                });
            }

            // const statusdanger = $('.status-danger').data('statusdanger');
            // console.log(statusdanger);
            // if (statusdanger) {
            //     swal({
            //         title: "Gagal " + statusdanger,
            //         text: "Anda Telah Mengajukan Cuty Hari ini , Silahkan Coba Lagi Besok",
            //         type: "warning",
            //         timer: 7000,
            //         showConfirmButton: false
            //     });
            // }

            $('.data-succes').on('click', function(e) {

                e.preventDefault();
                const href = $(this).attr('href');

                swal({
                    title: "Apakah Anda Yakin Menyetujui Pengajuan Lembur ini?",
                    text: "Data Akan Di Verifikasi Oleh Admin !!!",
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

            $('.data-danger').on('click', function(e) {

                e.preventDefault();
                const href = $(this).attr('href');

                swal({
                    title: "Apakah Anda Yakin Tidak Menyetujui Pengajuan Lembur ini?",
                    text: "Mohon Berikan Alasan Anda!!!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Reject!",
                    cancelButtonText: "No, cancel!"
                }, function(result) {
                    if (result) {
                        document.location.href = haref;
                    }
                });
            });
        </script>

    </body>

    </html>
<?php } ?>