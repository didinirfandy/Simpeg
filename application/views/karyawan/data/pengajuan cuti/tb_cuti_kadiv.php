<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        $data['tittle'] = "History Cuti Karyawan";
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
                <h1><i class="fa fa-map-signs"></i> History Cuti Karyawan </h1>
                <p></p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/karyawan/data/pengajuan cuti/tb_cuti_kadiv"> History Cuti Karyawan</a></li>
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
                            <div class="tile">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nama Jabatan</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Jumlah Hari</th>
                                            <th>Dari Tanggal</th>
                                            <th>Sampai Tanggal</th>
                                            <th>Jenis Cuti</th>
                                            <th>Alasan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($staf_cuti_pjg as $c) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $c['nama_kar'] ?></td>
                                            <td><?= $c['nm_jabatan'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($c['tgl'])) ?></td>
                                            <td><?= $c['jmlh_hari'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($c['tgl_mulai'])) ?></td>
                                            <td><?= date('d-m-Y', strtotime($c['tgl_akhir'])) ?></td>
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
                                            <td>
                                                <?php if ($c['valid'] == 1) { ?>
                                                <a href="<?= base_url() ?>index.php/Karyawan/kofirmasi_cuti_pjg_setuju/<?= $c['id_cuti_pjg'] ?>" class="btn btn-info data-succes"><i class="fa fa-check-circle" aria-hidden="true"></i>Agree </a><br><br>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#alasan_cuti_pjg<?= $c['id_cuti_pjg'] ?>"><i class="fa fa-times-circle" aria-hidden="true"></i>Reject </button>
                                                <?php } elseif ($c['valid'] == 2) { ?>
                                                <button type="button" class="btn btn-info" disabled=""><i class="fa fa-check-circle"></i> Agree</button><br><br>
                                                <button type="button" class="btn btn-danger" disabled=""><i class="fa fa-times-circle"></i>Reject </button>
                                                <?php } elseif ($c['valid'] == 3) { ?>
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
                        <!-- End Cuti Panjang -->

                        <!-- Cuti Tahunan -->
                        <div class="tab-pane active" id="c_thn" role="tabpanel" aria-labelledby="c_thn-tab">
                            <hr align="right" color="black">
                            <div class="tile-title-w-btn">
                                <h4 class="title">Data Pengajuan Cuti Tahunan</h4>
                            </div>
                            <div class="tile">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nama Jabatan</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Jumlah Hari</th>
                                            <th>Dari Tanggal</th>
                                            <th>Sampai Tanggal</th>
                                            <th>Jenis Cuti</th>
                                            <th>Alasan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($staf_cuti_thn as $c) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $c['nama_kar'] ?></td>
                                            <td><?= $c['nm_jabatan'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($c['tgl'])) ?></td>
                                            <td><?= $c['jmlh_hari'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($c['tgl_mulai'])) ?></td>
                                            <td><?= date('d-m-Y', strtotime($c['tgl_akhir'])) ?></td>
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
                                            <td>
                                                <?php if ($c['valid'] == 1) { ?>
                                                <a href="<?= base_url() ?>index.php/Karyawan/kofirmasi_cuti_thn_setuju/<?= $c['id_cuti_thn'] ?>" class="btn btn-info data-succes"><i class="fa fa-check-circle" aria-hidden="true"></i>Agree </a><br><br>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#alasan_cuti_thn<?= $c['id_cuti_thn'] ?>"><i class="fa fa-times-circle" aria-hidden="true"></i>Reject </button>
                                                <?php } elseif ($c['valid'] == 2) { ?>
                                                <button type="button" class="btn btn-info" disabled=""><i class="fa fa-check-circle"></i> Agree</button><br><br>
                                                <button type="button" class="btn btn-danger" disabled=""><i class="fa fa-times-circle"></i>Reject </button>
                                                <?php } elseif ($c['valid'] == 3) { ?>
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
                        <!-- End Cuti Tahunan -->

                        <!-- Cuti Sakit -->
                        <div class="tab-pane" id="c_skt" role="tabpanel" aria-labelledby="c_skt-tab">
                            <hr align="right" color="black">
                            <div class="tile-title-w-btn">
                                <h4 class="title">Data Pengajuan Cuti Sakit</h4>
                            </div>
                            <div class="tile">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nama Jabatan</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Jumlah Hari</th>
                                            <th>Dari Tanggal</th>
                                            <th>Sampai Tanggal</th>
                                            <th>Jenis Cuti</th>
                                            <th>Alasan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            foreach ($staf_cuti_sakit as $c) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $c['nama_kar'] ?></td>
                                            <td><?= $c['nm_jabatan'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($c['tgl'])) ?></td>
                                            <td><?= $c['jmlh_hari'] ?></td>
                                            <td><?= date('d-m-Y', strtotime($c['tgl_mulai'])) ?></td>
                                            <td><?= date('d-m-Y', strtotime($c['tgl_akhir'])) ?></td>
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
                                            <td>
                                                <?php if ($c['valid'] == 1) { ?>
                                                <a href="<?= base_url() ?>index.php/Karyawan/kofirmasi_cuti_sakit_setuju/<?= $c['id_cuti_sakit'] ?>" class="btn btn-info data-succes"><i class="fa fa-check-circle" aria-hidden="true"></i>Agree </a><br><br>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#alasan_cuti_sakit<?= $c['id_cuti_sakit'] ?>"><i class="fa fa-times-circle" aria-hidden="true"></i>Reject </button>
                                                <?php } elseif ($c['valid'] == 2) { ?>
                                                <button type="button" class="btn btn-info" disabled=""><i class="fa fa-check-circle"></i> Agree</button><br><br>
                                                <button type="button" class="btn btn-danger" disabled=""><i class="fa fa-times-circle"></i>Reject </button>
                                                <?php } elseif ($c['valid'] == 3) { ?>
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

        <!-- Modal Naik -->
        <div class="modal fade" id="kuota_cuti" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tabel Kuota Cuti Karyawan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="tile">
                            <!-- Swetalert Berhasil -->
                            <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
                            <!-- Swetalert Gagal -->
                            <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                            <!-- Swetalert Pass salah -->
                            <div class="status-pass" data-statuspass="<?= $this->session->flashdata('statuspass'); ?>"></div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="kt_c_pjg-tab" data-toggle="tab" href="#kt_c_pjg" role="tab" aria-controls="kt_c_pjg" aria-selected="true">Cuti Panjang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="kt_c_thn-tab" data-toggle="tab" href="#kt_c_thn" role="tab" aria-controls="kt_c_thn" aria-selected="false">Cuti Tahunan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="kt_c_skt-tab" data-toggle="tab" href="#kt_c_skt" role="tab" aria-controls="kt_c_skt" aria-selected="false">Cuti Sakit</a>
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
                                <div class="tab-pane" id="kt_c_pjg" role="tabpanel" aria-labelledby="kt_c_pjg-tab">
                                    <hr align="right" color="black">
                                    <div class="tile-title-w-btn">
                                        <h4 class="title">Data Pengajuan Cuti Panjang</h4>
                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>NPP</th>
                                                <th>NAMA</th>
                                                <th>JUMLAH CUTI</th>
                                                <th>SISA CUTI PANJANG</th>
                                                <th>JENIS CUTI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($quota_pjg as $v) { ?>
                                            <tr>
                                                <td><?= $v['npp'] ?></td>
                                                <td><?= $v['nama'] ?></td>
                                                <td>
                                                    <?php
                                                            $npp = $v['npp'];
                                                            $jumlah = $this->db->query("SELECT SUM(jmlh_hari) AS jumlah FROM `tb_cuti_pjg` WHERE npp=$npp GROUP BY npp=$npp")->result_array();
                                                            foreach ($jumlah as $key) {
                                                                echo $key['jumlah'];
                                                            }
                                                            ?>
                                                </td>
                                                <td><?= $v['sisa_tb_cuti_pjg'] ?></td>
                                                <td><?= $v['jns_cuti'] ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Cuti Panjang -->

                                <!-- Cuti Tahunan -->
                                <div class="tab-pane active" id="kt_c_thn" role="tabpanel" aria-labelledby="kt_c_thn-tab">
                                    <hr align="right" color="black">
                                    <div class="tile-title-w-btn">
                                        <h4 class="title">Data Pengajuan Cuti Tahunan</h4>
                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>NPP</th>
                                                <th>NAMA</th>
                                                <th>JUMLAH CUTI</th>
                                                <th>SISA CUTI TAHUNAN</th>
                                                <th>JENIS CUTI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($quota_thn as $v) { ?>
                                            <tr>
                                                <td><?= $v['npp'] ?></td>
                                                <td><?= $v['nama'] ?></td>
                                                <td>
                                                    <?php
                                                            $npp = $v['npp'];
                                                            $jumlah = $this->db->query("SELECT SUM(jmlh_hari) AS jumlah FROM `tb_cuti_thn` WHERE npp=$npp GROUP BY npp=$npp")->result_array();
                                                            foreach ($jumlah as $key) {
                                                                echo $key['jumlah'];
                                                            }
                                                            ?>
                                                </td>
                                                <td><?= $v['sisa_tb_cuti_thn'] ?></td>
                                                <td><?= $v['jns_cuti'] ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Cuti Tahunan -->

                                <!-- Cuti Sakit -->
                                <div class="tab-pane" id="kt_c_skt" role="tabpanel" aria-labelledby="kt_c_skt-tab">
                                    <hr align="right" color="black">
                                    <div class="tile-title-w-btn">
                                        <h4 class="title">Data Pengajuan Cuti SAKIT</h4>
                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>NPP</th>
                                                <th>NAMA</th>
                                                <th>JUMLAH CUTI</th>
                                                <th>JENIS CUTI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($quota_sakit as $v) { ?>
                                            <tr>
                                                <td><?= $v['npp'] ?></td>
                                                <td><?= $v['nama'] ?></td>
                                                <td>
                                                    <?php
                                                            $npp = $v['npp'];
                                                            $jumlah = $this->db->query("SELECT SUM(jmlh_hari) AS jumlah FROM `tb_cuti_sakit` WHERE npp=$npp GROUP BY npp=$npp")->result_array();
                                                            foreach ($jumlah as $key) {
                                                                echo $key['jumlah'];
                                                            }
                                                            ?>
                                                </td>
                                                <td><?= $v['jns_cuti'] ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Input Alasan Cuti Panjang -->
        <?php foreach ($staf_cuti_pjg as $c) { ?>
        <div id="alasan_cuti_pjg<?= $c['id_cuti_pjg'] ?>" role="dialog" class="modal fade">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">From Input Alasan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <?= form_open_multipart('Karyawan/kofirmasi_cuti_pjg_tolak');  ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Alasan Tidak Menyetujui Cuti</label>
                                <textarea class="form-control" rows="2" name="alasan" placeholder="Alasan......" required></textarea>
                                <input type="hidden" name="id_cuti_pjg" value="<?= $c['id_cuti_pjg'] ?>">
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

        <!-- Modal Input Alasan Cuti Tahunan -->
        <?php foreach ($staf_cuti_thn as $c) { ?>
        <div id="alasan_cuti_thn<?= $c['id_cuti_thn'] ?>" role="dialog" class="modal fade">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">From Input Alasan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <?= form_open_multipart('Karyawan/kofirmasi_cuti_thn_tolak');  ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Alasan Tidak Menyetujui Cuti</label>
                                <textarea class="form-control" rows="2" name="alasan" placeholder="Alasan......" required></textarea>
                                <input type="hidden" name="id_cuti_thn" value="<?= $c['id_cuti_thn'] ?>">
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


        <!-- Modal Input Alasan Cuti Sakit -->
        <?php foreach ($staf_cuti_sakit as $c) { ?>
        <div id="alasan_cuti_sakit<?= $c['id_cuti_sakit'] ?>" role="dialog" class="modal fade">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">From Input Alasan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?= form_open_multipart('Karyawan/kofirmasi_cuti_sakit_tolak');  ?>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Alasan Tidak Menyetujui Cuti</label>
                                <textarea class="form-control" rows="2" name="alasan" placeholder="Alasan......" required></textarea>
                                <input type="hidden" name="id_cuti_sakit" value="<?= $c['id_cuti_sakit'] ?>">
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
            <?php $this->load->view('template/footer') ?>
            <!-- footer area end-->
        </footer>
    </main>

    <!-- Main Menu area start-->
    <?php $this->load->view('template/script') ?>
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
                text: "DATA AKAN DI VERIFIKASI OLEH ADMIN UNTUK KEPERLUAN HISTORY",
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
                text: "Anda Telah Mengajukan Cuty Hari ini , Silahkan Coba Lagi Besok",
                type: "warning",
                timer: 7000,
                showConfirmButton: false
            });
        }

        $('.data-succes').on('click', function(e) {

            e.preventDefault();
            const href = $(this).attr('href');

            swal({
                title: "Apakah Anda Yakin Menyetujui Pengajuan Cuti ini?",
                text: "Jika Data Di Setujui, Jatah cuti akan Otomatis berkurang !!!",
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
                title: "Apakah Anda Yakin Tidak Menyetujui Pengajuan Cuti ini?",
                text: "Jika Anda Tidak Menyerujui, Mohon Berikan Alasan Anda!!!",
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

        document.onkeydown = function(e) {

            switch (e.keyCode) {
                // f2
                case 113:
                    $("#kuota_cuti").modal();
                    break;
                    // esc
                case 27:
                    $('#kuota_cuti').modal('hide')
                    break;
            }
        };
    </script>

</body>

</html>
<?php } ?>