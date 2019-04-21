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
                <h1><i class="fa fa-th-list"></i> SDM 05</h1>
                <p></p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tabel SDM</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/sdm05"> SDM 05</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title"></h3>
                        <?php echo $this->session->userdata("status_insert") ?>
                        <button type="button" class="btn btn-primary icon-btn" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i>Add Item </button>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>NPP</th>
                                    <th>NO URUT</th>
                                    <th>TAHUN AWAL</th>
                                    <th>TAHUN AKHIR</th>
                                    <th>NAMA</th>
                                    <th>JABATAN</th>
                                    <th>NAMA JABATAN</th>
                                    <th>NO SK</th>
                                    <th>TANGGAL SK</th>
                                    <th>BULAN PROSES</th>
                                    <th>STAT REC</th>
                                    <th>TANGGAL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tsdm05->result_array() as $e) { ?>
                                <tr>
                                    <td><?php echo $e['npp'] ?></td>
                                    <td><?php echo $e['no_urut'] ?></td>
                                    <td><?php echo $e['thn_awal'] ?></td>
                                    <td><?php echo $e['thn_akhir'] ?></td>
                                    <td><?php echo $e['nama'] ?></td>
                                    <td><?php echo $e['jabatan'] ?></td>
                                    <td><?php echo $e['nm_jbt'] ?></td>
                                    <td><?php echo $e['no_sk'] ?></td>
                                    <td><?php echo $e['tgl_sk'] ?></td>
                                    <td><?php echo $e['bln_proses'] ?></td>
                                    <td><?php echo $e['stat_rec'] ?></td>
                                    <td><?php echo $e['tgl'] ?></td>
                                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $e['id_sdm05'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet<?php echo $e['id_sdm05'] ?>"><i class="fa fa-trash" aria-hidden="true"></i>Delet </button>
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
                        <h4 class="modal-title">Input Data SDM 05</h4>
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
                            <label class="control-label">Tahun Awal</label>
                            <input class="form-control" type="number" name="thn_awal" placeholder="Masukan Tahun Awal">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tahun Akhir </label>
                            <input class="form-control" type="number" name="thn_akhir" placeholder="Masukan Tahun Akhir">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input class="form-control" type="text" name="nama" placeholder="Masukan Nama">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jabatan</label>
                            <input class="form-control" type="text" name="jabatan" placeholder="Masukan Jabatan">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Jabatan</label>
                            <input class="form-control" type="text" name="nm_jbt" placeholder="Masukan Nama Jabatan ">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No SK</label>
                            <input class="form-control" type="number" name="no_sk" placeholder="Masukan No SK">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal SK</label>
                            <input class="form-control" type="date" name="tgl_sk" placeholder="Masukan Tanggal SK">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bulan Proses</label>
                            <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stat REC</label>
                            <input class="form-control" type="text" name="stat_rec" placeholder="Masukan Stat Rec">
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
        <!-- End Modal Add -->


        <!-- Modal Edit -->
        <?php foreach ($tsdm05->result_array() as $e) { ?>
        <div id="edit<?php echo $e['id_sdm05'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data SDM 05</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <?php $attributes = array('id' => 'regForm');
                        echo form_open('', $attributes); ?>
                        <input type="hidden" name="id_sdm05" value="<?php echo $e['id_sdm05'] ?>">
                        <div class="form-group">
                            <label class="control-label">NPP</label>
                            <input class="form-control" type="number" name="npp" placeholder="NPP" value="<?php echo $e['npp'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Urut</label>
                            <input class="form-control" type="number" name="no_urut" placeholder="Masukan No Urut Anda" value="<?php echo $e['no_urut'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tahun Awal</label>
                            <input class="form-control" type="number" name="thn_awal" placeholder="Masukan Tahun Awal" value="<?php echo $e['thn_awal'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tahun Akhir </label>
                            <input class="form-control" type="number" name="thn_akhir" placeholder="Masukan Tahun Akhir" value="<?php echo $e['thn_akhir'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input class="form-control" type="text" name="nama" placeholder="Masukan Nama" value="<?php echo $e['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jabatan</label>
                            <input class="form-control" type="text" name="jabatan" placeholder="Masukan Jabatan" value="<?php echo $e['jabatan'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Jabatan</label>
                            <input class="form-control" type="text" name="nm_jbt" placeholder="Masukan Nama Jabatan" value="<?php echo $e['nm_jbt'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No SK</label>
                            <input class="form-control" type="number" name="no_sk" placeholder="Masukan No SK" value="<?php echo $e['no_sk'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal SK</label>
                            <input class="form-control" type="date" name="tgl_sk" placeholder="Masukan Tanggal SK" value="<?php echo $e['tgl_sk'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bulan Proses</label>
                            <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses" value="<?php echo $e['bln_proses'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stat REC</label>
                            <input class="form-control" type="text" name="stat_rec" placeholder="Masukan Stat Rec" value="<?php echo $e['stat_rec'] ?>">
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
        <!-- End Modal Edit -->


        <!-- Modal Delet -->
        <?php foreach ($tsdm05->result_array() as $e) { ?>
        <div id="delet<?php echo $e['id_sdm05'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Data SDM 05</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/Admin/delet_sdm05' ?>">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus <b><?php echo $e['npp'] . " | " . $e['nama'] ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_sdm05" value="<?php echo $e['id_sdm05'] ?>">
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
            <! -- footer area start-->
                <?php $this->load->view('template/footer') ?>
                <! -- footer area end-->
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