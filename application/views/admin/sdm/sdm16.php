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
                <h1><i class="fa fa-th-list"></i> SDM 16</h1>
                <p></p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tabel SDM</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/sdm16"> SDM 16</a></li>
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
                                    <th>STATUS PEGAWAI</th>
                                    <th>GOLONGAN</th>
                                    <th>MK</th>
                                    <th>TMT</th>
                                    <th>JENIS NAIK</th>
                                    <th>NO SK</th>
                                    <th>TANGGAL SK</th>
                                    <th>NPP JABATAN</th>
                                    <th>BULAN PROSES</th>
                                    <th>KODE KELAS</th>
                                    <th>STAT REC</th>
                                    <th>TANGGAL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tsdm16->result_array() as $x) { ?>
                                <tr>
                                    <td><?php echo $x['npp'] ?></td>
                                    <td><?php echo $x['no_urut'] ?></td>
                                    <td><?php echo $x['st_peg'] ?></td>
                                    <td><?php echo $x['golongan'] ?></td>
                                    <td><?php echo $x['mk'] ?></td>
                                    <td><?php echo $x['tmt'] ?></td>
                                    <td><?php echo $x['jns_naik'] ?></td>
                                    <td><?php echo $x['no_sk'] ?></td>
                                    <td><?php echo $x['tgl_sk'] ?></td>
                                    <td><?php echo $x['npp_jbt'] ?></td>
                                    <td><?php echo $x['bln_proses'] ?></td>
                                    <td><?php echo $x['kd_kelas'] ?></td>
                                    <td><?php echo $x['stat_rec'] ?></td>
                                    <td><?php echo $x['tgl'] ?></td>
                                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $x['id_sdm16'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet<?php echo $x['id_sdm16'] ?>"><i class="fa fa-trash" aria-hidden="true"></i>Delet </button>
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
                        <h4 class="modal-title">Input Data SDM 16</h4>
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
                            <label class="control-label">Status Pegawai</label>
                            <input class="form-control" type="text" name="st_peg" placeholder="Masukan Status Pegawai">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Golongan</label>
                            <input class="form-control" type="text" name="golongan" placeholder="Masukan Golongan">
                        </div>
                        <div class="form-group">
                            <label class="control-label">MK</label>
                            <input class="form-control" type="text" name="mk" placeholder="Masukan MK">
                        </div>
                        <div class="form-group">
                            <label class="control-label">TMT</label>
                            <input class="form-control" type="date" name="tmt" placeholder="Masukan TMT">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Naik</label>
                            <input class="form-control" type="text" name="jns_naik" placeholder="Masukan Jenis Naik">
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
                            <label class="control-label">NPP Jabatan</label>
                            <input class="form-control" type="number" name="npp_jbt" placeholder="Masukan NPP Jabatan">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bulan Proses</label>
                            <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kode Kelas</label>
                            <input class="form-control" type="text" name="kd_kelas" placeholder="Masukan Kode Kelas">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stat REC</label>
                            <input class="form-control" type="text" name="stat_rec" placeholder="Masukan Stat REC">
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
        <?php foreach ($tsdm16->result_array() as $x) { ?>
        <div id="edit<?php echo $x['id_sdm16'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data SDM 16</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <?php $attributes = array('id' => 'regForm');
                        echo form_open('', $attributes); ?>
                        <input type="hidden" name="id_sdm16" value="<?php echo $x['id_sdm16'] ?>">
                        <div class="form-group">
                            <label class="control-label">NPP</label>
                            <input class="form-control" type="number" name="npp" placeholder="NPP" value="<?php echo $x['npp'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Urut</label>
                            <input class="form-control" type="number" name="no_urut" placeholder="Masukan No Urut Anda" value="<?php echo $x['no_urut'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status Pegawai</label>
                            <input class="form-control" type="text" name="st_peg" placeholder="Masukan Status Pegawai" value="<?php echo $x['st_peg'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Golongan</label>
                            <input class="form-control" type="text" name="golongan" placeholder="Masukan Golongan" value="<?php echo $x['golongan'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">MK</label>
                            <input class="form-control" type="text" name="mk" placeholder="Masukan MK" value="<?php echo $x['mk'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">TMT</label>
                            <input class="form-control" type="date" name="tmt" placeholder="Masukan TMT" value="<?php echo $x['tmt'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Naik</label>
                            <input class="form-control" type="text" name="jns_naik" placeholder="Masukan Jenis Naik" value="<?php echo $x['jns_naik'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No SK</label>
                            <input class="form-control" type="number" name="no_sk" placeholder="Masukan No SK" value="<?php echo $x['no_sk'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal SK</label>
                            <input class="form-control" type="date" name="tgl_sk" placeholder="Masukan Tanggal SK" value="<?php echo $x['tgl_sk'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">NPP Jabatan</label>
                            <input class="form-control" type="number" name="npp_jbt" placeholder="Masukan NPP Jabatan" value="<?php echo $x['npp_jbt'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bulan Proses</label>
                            <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses" value="<?php echo $x['bln_proses'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kode Kelas</label>
                            <input class="form-control" type="text" name="kd_kelas" placeholder="Masukan Kode Kelas" value="<?php echo $x['kd_kelas'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stat REC</label>
                            <input class="form-control" type="text" name="stat_rec" placeholder="Masukan Stat REC" value="<?php echo $x['stat_rec'] ?>">
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
        <?php foreach ($tsdm16->result_array() as $x) { ?>
        <div id="delet<?php echo $x['id_sdm16'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delet Data SDM 16</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/Admin/delet_sdm16' ?>">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus <b><?php echo $x['npp'] ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_sdm16" value="<?php echo $x['id_sdm16'] ?>">
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