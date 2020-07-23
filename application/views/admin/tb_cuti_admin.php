<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "Pengajuan Cuti Karyawan ";
        $this->load->view('template/head', $data);
        ?>

    </head>

    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/Admin/in_admin">SIMPEG</a>

            <?php $this->load->view('template/header_ad') ?>

        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_admin') ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-user-times"></i> Pengajuan Cuti Kayrawan </h1>
                    <p>Persetujuan Pengajuan Cuti Kayrawan</p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item"> Tabel Pengajuan Cuti</li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/Admin/cuti_admin/tb_cuti_admin"> Pengajuan Cuti </a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="c_pjg-tab" data-toggle="tab" href="#c_pjg" role="tab" aria-controls="c_pjg" aria-selected="true">Cuti Panjang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="c_thn-tab" data-toggle="tab" href="#c_thn" role="tab" aria-controls="c_thn" aria-selected="false">Cuti Tahunan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="c_skt-tab" data-toggle="tab" href="#c_skt" role="tab" aria-controls="c_skt" aria-selected="false">Cuti Sakit</a>
                            </li>
                            <!-- <li class="nav-item">
                                                                                                                <a class="nav-link" id="c_ade-tab" data-toggle="tab" href="#c_ade" role="tab" aria-controls="c_ade" aria-selected="false">Cuti Melahirkan</a>
                                                                                                            </li>
                                                                                                            <li class="nav-item">
                                                                                                                <a class="nav-link" id="c_kk-tab" data-toggle="tab" href="#c_kk" role="tab" aria-controls="c_kk" aria-selected="false">Cuti Keguguran Kandungan</a>
                                                                                                            </li>
                                                                                                            <li class="nav-item">
                                                                                                                <a class="nav-link" id="c_pms-tab" data-toggle="tab" href="#c_pms" role="tab" aria-controls="c_pms" aria-selected="false">Cuti Haid</a>
                                                                                                            </li> -->
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- CUti Panjang -->
                            <div class="tab-pane" id="c_pjg" role="tabpanel" aria-labelledby="c_pjg-tab">
                                <hr align="right" color="black">
                                <div class="tile-title-w-btn">
                                    <h4 class="title">Data Pengajuan Cuti Panjang</h4>
                                </div>
                                <div class="tile-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Dari Tanggal</th>
                                                <th>Sampai Tanggal</th>
                                                <th>Jumlah Hari</th>
                                                <th>Jenis Cuti</th>
                                                <th>Alasan</th>
                                                <th>Status</th>
                                                <th>Alasan Penolakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($cuti_pjg as $c) { ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $c['nama_kar'] ?></td>
                                                    <td><?= $c['nm_jabatan'] ?></td>
                                                    <td><?= date('d-m-Y', strtotime($c['tgl'])) ?></td>
                                                    <td><?= date('d-m-Y', strtotime($c['tgl_mulai'])) ?></td>
                                                    <td><?= date('d-m-Y', strtotime($c['tgl_akhir'])) ?></td>
                                                    <td><?= $c['jmlh_hari'] ?></td>
                                                    <td><?= $c['jns_cuti'] ?></td>
                                                    <td><?= $c['ket'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($c['valid'] == 1) {
                                                            echo "<i class='fa fa-hourglass-half'></i> <font class='btn-warning'> Pendding......</font>";
                                                        } elseif ($c['valid'] == 2) {
                                                            echo "<i class='fa fa-check-circle'></i> <font class='btn-success'> Agree......</font>";
                                                        } elseif ($c['valid'] == 3) {
                                                            echo "<i class='fa fa-times-circle'></i> <font class='btn-danger'> Reject.....</font>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= $c['alasan'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Cuti Panjang -->

                            <!-- Cuti Tahunan -->
                            <div class="tab-pane active" id="c_thn" role="tabpanel" aria-labelledby="c_thn-tab">
                                <hr align="right" color="black">
                                <div class="tile-title-w-btn">
                                    <h4 class="title">Data Pengajuan Cuti Tahunan</h4>
                                </div>
                                <div class="tile-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Dari Tanggal</th>
                                                <th>Sampai Tanggal</th>
                                                <th>Jumlah Hari</th>
                                                <th>Jenis Cuti</th>
                                                <th>Alasan</th>
                                                <th>Status</th>
                                                <th>Alasan Penolakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($cuti_thn as $c) { ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $c['nama_kar'] ?></td>
                                                    <td><?= $c['nm_jabatan'] ?></td>
                                                    <td><?= date('d-m-Y', strtotime($c['tgl'])) ?></td>
                                                    <td><?= date('d-m-Y', strtotime($c['tgl_mulai'])) ?></td>
                                                    <td><?= date('d-m-Y', strtotime($c['tgl_akhir'])) ?></td>
                                                    <td><?= $c['jmlh_hari'] ?></td>
                                                    <td><?= $c['jns_cuti'] ?></td>
                                                    <td><?= $c['ket'] ?></td>
                                                    <td>
                                                        <?php
                                                        if ($c['valid'] == 1) {
                                                            echo "<i class='fa fa-hourglass-half'></i> <font class='btn-warning'> Pendding......</font>";
                                                        } elseif ($c['valid'] == 2) {
                                                            echo "<i class='fa fa-check-circle'></i> <font class='btn-success'> Agree......</font>";
                                                        } elseif ($c['valid'] == 3) {
                                                            echo "<i class='fa fa-times-circle'></i> <font class='btn-danger'> Reject.....</font>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= $c['alasan'] ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Cuti Tahunan -->

                            <!-- Cuti Sakit -->
                            <div class="tab-pane" id="c_skt" role="tabpanel" aria-labelledby="c_skt-tab">
                                <hr align="right" color="black">
                                <div class="tile-title-w-btn">
                                    <h4 class="title">Data Pengajuan Cuti Sakit</h4>
                                </div>
                                <div class="tile-body">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Jabatan</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Dari Tanggal</th>
                                                <th>Sampai Tanggal</th>
                                                <th>Jumlah Hari</th>
                                                <th>Jenis Cuti</th>
                                                <th>Alasan</th>
                                                <th>Status</th>
                                                <th>Alasan Penolakan</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 1;
                                        foreach ($cuti_sakit as $c) { ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $c['nama_kar'] ?></td>
                                                <td><?= $c['nm_jabatan'] ?></td>
                                                <td><?= date('d-m-Y', strtotime($c['tgl'])) ?></td>
                                                <td><?= date('d-m-Y', strtotime($c['tgl_mulai'])) ?></td>
                                                <td><?= date('d-m-Y', strtotime($c['tgl_akhir'])) ?></td>
                                                <td><?= $c['jmlh_hari'] ?></td>
                                                <td><?= $c['jns_cuti'] ?></td>
                                                <td><?= $c['ket'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($c['valid'] == 1) {
                                                        echo "<i class='fa fa-hourglass-half'></i> <font class='btn-warning'> Pendding......</font>";
                                                    } elseif ($c['valid'] == 2) {
                                                        echo "<i class='fa fa-check-circle'></i> <font class='btn-success'> Agree......</font>";
                                                    } elseif ($c['valid'] == 3) {
                                                        echo "<i class='fa fa-times-circle'></i> <font class='btn-danger'> Reject.....</font>";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?= $c['alasan'] ?></td>
                                            </tr>
                                        <?php } ?>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Cuti Sakit -->

                            <!-- Cuti Melahirkan -->
                            <div class="tab-pane" id="c_ade" role="tabpanel" aria-labelledby="c_ade-tab">

                            </div>
                            <!-- End Cuti Melahirkan -->

                            <!-- Curi Keguguran Kandungan -->
                            <div class="tab-pane" id="c_kk" role="tabpanel" aria-labelledby="c_kk-tab">

                            </div>
                            <!-- End Curi Keguguran Kandungan -->

                            <!-- Curi Haid -->
                            <div class="tab-pane" id="c_pms" role="tabpanel" aria-labelledby="c_pms-tab">

                            </div>
                            <!-- End Curi Haid -->
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
        <script type="text/javascript">
            $('#myTab a[href="#profile"]').on('click', function(e) {
                e.preventDefault()
                $(this).tab('show')
            });

            const statusinsert = $('.status-insert').data('statusinsert');
            // console.log(statusinsert);
            if (statusinsert) {
                swal({
                    title: "Berhasil " + statusinsert,
                    text: "DATA AKAN DI VERIFIKASI OLEH ATASAN",
                    type: "success",
                    timer: 8000,
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
                    timer: 8000,
                    showConfirmButton: false
                });
            }

            const statusdanger = $('.status-danger').data('statusdanger');
            // console.log(statusdanger);
            if (statusdanger) {
                swal({
                    title: "Gagal " + statusdanger,
                    text: "Anda Telah Mengajukan Cuty Hari ini , Silahkan Coba Lagi Besok",
                    type: "warning",
                    timer: 8000,
                    showConfirmButton: false
                });
            }
        </script>

    </body>

    </html>
<?php } ?>