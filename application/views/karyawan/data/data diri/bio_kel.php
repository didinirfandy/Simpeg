<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "Biodata Keluarga";
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
                    <h1><i class="fa fa-users"></i> Biodata Keluarga </h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Data Diri</li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/karyawan/data/data diri/bio_kel"> Biodata Keluarga</a></li>
                </ul>
            </div>
            <?= $this->session->flashdata('msg') ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h3 class="title">Biodata Keluarga Karyawan</h3>
                            <!-- Swetalert Berhasil -->
                            <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
                            <!-- Swetalert Gagal -->
                            <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                            <div class="status-danger" data-statusdanger="<?= $this->session->flashdata('statusdanger'); ?>"></div>
                            <div class="btn-group">
                                <a class="btn btn-primary" href="<?= base_url() ?>index.php/karyawan/data_diri/temp"><i class="fa fa-eye"></i>View Status </a>
                                <a class="btn btn-primary" href="<?= base_url() ?>index.php/karyawan/data_diri/in_kel"><i class="fa fa-plus"></i>Add Item </a>
                            </div>
                        </div>
                        <hr align="right" color="black">
                        <div class="tile-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th width="10">No</th>
                                        <th>Nama</th>
                                        <th>Hubungan Keluarga</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th width="10">Umur</th>
                                        <th>Golongan Darah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($t_kel as $v) { 
                                        if ($v['nama'] == "") {?>
                                        <tr>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
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
                                            <td><?= $v['no_urut'] ?></td>
                                            <td><?= $v['nama'] ?></td>
                                            <?php $hbg = $this->Model_karyawan->hubungan($v['hbg_klg']);
                                            foreach ($hbg as $h) { ?>
                                                <td><?= $h['nama'] ?></td>
                                            <?php } ?>
                                            <td><?= $v['kota_lhr'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($v['tgl_lhr'])) ?></td>
                                            <?php
                                            $lahir    = new DateTime(date('Y-m-d', strtotime($v['tgl_lhr'])));
                                            $sekarang = new DateTime(date('Y-m-d'));
                                            $tgl      = $lahir->diff($sekarang);
                                            echo "<td>" . $tgl->y . "</td>"
                                            ?>
                                            <td><?= $v['gol_darah'] ?></td>
                                            <td><a href="ed_kel/<?= $v['no_urut'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i>Edit </a></i>&nbsp;&nbsp;&nbsp;
                                                <!-- <a href="<?= base_url(); ?>/index.php/Karyawan/delet_sdm02/<?= $v['id_sdm02']; ?>" class="btn btn-danger hapus-data"><i class="fa fa-times"></i>Delet </a> -->
                                            </td>
                                        </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                        <hr align="right" color="black">
                    </div>
                </div>
            </div>
            <footer>
                <! -- footer area start-->
                    <?php $this->load->view('template/footer') ?>
                    <! -- footer area end-->
            </footer>
        </main>

        <!-- Script area start-->
        <?php $this->load->view('template/script'); ?>

        <script type="text/javascript">
            const statusinsert = $('.status-insert').data('statusinsert');
            // console.log(statusinsert);
            if (statusinsert) {
                swal({
                    title: "Berhasil " + statusinsert,
                    text: "DATA AKAN DI VERIFIKASI OLEH ADMIN",
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
                    text: "EDIT KEMBALI DATA ANDA DENGAN BENAR",
                    type: "error",
                    timer: 7000,
                    showConfirmButton: false
                });
            }

            const statusdanger = $('.status-danger').data('statusdanger');
            // console.log(statusdanger);
            if (statusdanger) {
                swal({
                    title: "Gagal " + statusdanger,
                    text: "ANDA TIDAK MENGINPUT GAMBAR INPUT KEMBALI DATA ANDA DENGAN BENAR",
                    type: "warning",
                    timer: 8000,
                    showConfirmButton: false
                });
            }

            $('.hapus-data').on('click', function(e) {

                e.preventDefault();
                const href = $(this).attr('href');

                swal({
                    title: "Anda Yakin Delet Data Ini?",
                    text: "Data pada tabel ini akan di Delet Otomatis!!!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, Delet!",
                    cancelButtonText: "No, Cancel!"
                }, function(result) {
                    if (result) {
                        document.location.href = href;
                    }
                });
            });
        </script>
        <!-- Script area End-->

    </body>

    </html>
<?php } ?>