<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('template/head') ?>

</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/welcome/in_admin">PTPN VIII</a>

        <?php $this->load->view('template/header') ?>

    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

    <?php $this->load->view('template/menu_admin') ?>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> SDM 04</h1>
                <p></p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tabel SDM</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/sdm04"> SDM 04</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h4 class="title"></h4>
                        <?php echo $this->session->userdata("status_insert") ?>
                        <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i>Add Item </button>
                    </div>
                    
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>NPP</th>
                                    <th>NO URUT</th>
                                    <th>KODE PENDIDIKAN</th>
                                    <th>NAMA</th>
                                    <th>KETERANGAN</th>
                                    <th>DNLN</th>
                                    <th>TANGGAL AWAL</th>
                                    <th>TANGGAL AKHIR</th>
                                    <th>NO SERTIFIKAT</th>
                                    <th>TANGGAL SERTIFIKAT</th>
                                    <th>NILAI</th>
                                    <th>GRADE</th>
                                    <th>BULAN PROSES</th>
                                    <th>STAT REC</th>
                                    <th>TANGGAL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tsdm04->result_array() as $d) { ?>
                                <tr>
                                    <td><?php echo $d['npp'] ?></td>
                                    <td><?php echo $d['no_urut'] ?></td>
                                    <td><?php echo $d['kd_pend'] ?></td>
                                    <td><?php echo $d['nama'] ?></td>
                                    <td><?php echo $d['ket'] ?></td>
                                    <td><?php echo $d['dnln'] ?></td>
                                    <td><?php echo $d['tgl_awal'] ?></td>
                                    <td><?php echo $d['tgl_akhir'] ?></td>
                                    <td><?php echo $d['no_sert'] ?></td>
                                    <td><?php echo $d['tgl_sert'] ?></td>
                                    <td><?php echo $d['nilai'] ?></td>
                                    <td><?php echo $d['grade'] ?></td>
                                    <td><?php echo $d['bln_proses'] ?></td>
                                    <td><?php echo $d['stat_rec'] ?></td>
                                    <td><?php echo $d['tgl'] ?></td>
                                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $d['id_sdm04'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet<?php echo $d['id_sdm04'] ?>"><i class="fa fa-trash" aria-hidden="true"></i>Delet </button>
                                    </td>
                                </tr>
                                <?php 
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Add -->
        <div id="add" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Input Data SDM 04</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <?php $attributes = array('id' => 'regForm');
                        echo form_open('', $attributes); ?>

                        <div class="form-group">
                            <label class="control-label">NPP</label>
                            <input class="form-control" type="number" name="npp" placeholder="NPP">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Urut</label>
                            <input class="form-control" type="number" name="no_urut" placeholder="Masukan No Urut Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kode Pendidikan</label>
                            <input class="form-control" type="text" name="kd_pend" placeholder="Masukan Kode Pendidikan Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama </label>
                            <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Pelatihan">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Keterangan </label>
                            <input class="form-control" type="text" name="ket" placeholder="Keterangan">
                        </div>
                        <div class="form-group">
                            <label class="control-label">DNLN</label>
                            <input class="form-control" type="text" name="dnln" placeholder="Masukan DNLN">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Awal</label>
                            <input class="form-control" type="date" name="tgl_awal" placeholder="Masukan Tanggal Awal ">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Akhir</label>
                            <input class="form-control" type="date" name="tgl_akhir" placeholder="Masukan Tanggal Akhir">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Sertifikat</label>
                            <input class="form-control" type="text" name="no_sert" placeholder="Masukan No Sertifikat">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Sertifikat</label>
                            <input class="form-control" type="date" name="tgl_sert" placeholder="Masukan Tanggal Sertifikasi">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nilai</label>
                            <input class="form-control" type="number" name="nilai" placeholder="Masukan Nilai Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Grade</label>
                            <input class="form-control" type="number" name="grade" placeholder="Masukan Grade Nilai Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bulan Proses</label>
                            <input class="form-control" type="text" name="bln_proses" placeholder="Bulan Proses">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stat REC</label>
                            <input class="form-control" type="text" name="stat_rec" placeholder="Stat REC">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close() ?>
                </div>

            </div>
        </div>

        <!-- Modal Edit-->
        <?php foreach ($tsdm04->result_array() as $d) { ?>
        <div id="edit<?php echo $d['id_sdm04'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data SDM 04</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <?php $attributes = array('id' => 'regForm');
                        echo form_open('', $attributes); ?>
                        <input type="hidden" name="id_sdm04" value="<?php echo $d['id_sdm04'] ?>">
                        <div class="form-group">
                            <label class="control-label">NPP</label>
                            <input class="form-control" type="number" name="npp" placeholder="Masukan NPP" value="<?php echo $d['npp'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Urut</label>
                            <input class="form-control" type="number" name="no_urut" placeholder="Masukan No Urut Anda" value="<?php echo $d['no_urut'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kode Pendidikan</label>
                            <input class="form-control" type="text" name="kd_pend" placeholder="Masukan Kode Pendidikan Anda" value="<?php echo $d['kd_pend'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama </label>
                            <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Pelatihan" value="<?php echo $d['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Keterangan </label>
                            <input class="form-control" type="text" name="ket" placeholder="Masukan Keterangan" value="<?php echo $d['ket'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">DNLN</label>
                            <input class="form-control" type="text" name="dnln" placeholder="Masukan DNLN" value="<?php echo $d['dnln'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Awal</label>
                            <input class="form-control" type="date" name="tgl_awal" placeholder="Masukan Tanggal Awal" value="<?php echo $d['tgl_awal'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Akhir</label>
                            <input class="form-control" type="date" name="tgl_akhir" placeholder="Masukan Tanggal Akhir" value="<?php echo $d['tgl_akhir'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Sertifikat</label>
                            <input class="form-control" type="text" name="no_sert" placeholder="Masukan No Sertifikat" value="<?php echo $d['no_sert'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Sertifikat</label>
                            <input class="form-control" type="date" name="tgl_sert" placeholder="Masukan Tanggal Sertifikasi" value="<?php echo $d['tgl_sert'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nilai</label>
                            <input class="form-control" type="number" name="nilai" placeholder="Masukan Nilai Anda" value="<?php echo $d['nilai'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Grade</label>
                            <input class="form-control" type="number" name="grade" placeholder="Masukan Grade Nilai Anda" value="<?php echo $d['grade'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bulan Proses</label>
                            <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses" value="<?php echo $d['bln_proses'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stat Rec</label>
                            <input class="form-control" type="text" name="stat_rec" placeholder="Masukan Stat Rec" value="<?php echo $d['stat_rec'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" name="edit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close() ?>
                </div>

            </div>
        </div>
        <?php 
    } ?>
        <!-- End Modal Edit-->

        <!-- Modal Delet -->
        <?php foreach ($tsdm04->result_array() as $d) { ?>
        <div id="delet<?php echo $d['id_sdm04'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Data SDM 04</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/Admin/delet_sdm04' ?>">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus <b><?php echo $d['npp'] . " | " . $d['kd_pend'] ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_sdm04" value="<?php echo $d['id_sdm04'] ?>">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <?php 
    } ?>
        <!-- End Modal Delet -->

        <footer>
            <!-- footer area start -->
                <?php $this->load->view('template/footer') ?>
                <!-- footer area end -->
        </footer>
    </main>

    <!-- Main Menu area start-->
    <?php $this->load->view('template/script') ?>
    <!-- Main Menu area End-->

</body>

</html>
<?php 
}
$this->session->unset_userdata("status_insert"); ?> 