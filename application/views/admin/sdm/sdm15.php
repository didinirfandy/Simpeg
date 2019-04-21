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
                <h1><i class="fa fa-th-list"></i> SDM 15</h1>
                <p></p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tabel SDM</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/sdm15"> SDM 15</a></li>
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
                                    <th>JENIS CUTI</th>
                                    <th>TMT</th>
                                    <th>LAMA CUTI</th>
                                    <th>TAHUN ANGGARAN</th>
                                    <th>NO SK</th>
                                    <th>TANGGAL SK</th>
                                    <th>NPP JABATAN</th>
                                    <th>BULAN PROSES</th>
                                    <th>STAT REC</th>
                                    <th>TANGGAL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tsdm15->result_array() as $m) { ?>
                                <tr>
                                    <td><?php echo $m['npp'] ?></td>
                                    <td><?php echo $m['no_urut'] ?></td>
                                    <td><?php echo $m['jns_cuti'] ?></td>
                                    <td><?php echo $m['tmt'] ?></td>
                                    <td><?php echo $m['lama_cuti'] ?></td>
                                    <td><?php echo $m['thn_angg'] ?></td>
                                    <td><?php echo $m['no_sk'] ?></td>
                                    <td><?php echo $m['tgl_sk'] ?></td>
                                    <td><?php echo $m['npp_jbt'] ?></td>
                                    <td><?php echo $m['bln_proses'] ?></td>
                                    <td><?php echo $m['stat_rec'] ?></td>
                                    <td><?php echo $m['tgl'] ?></td>
                                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $m['id_sdm15'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet<?php echo $m['id_sdm15'] ?>"><i class="fa fa-trash" aria-hidden="true"></i>Delet </button>
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
                        <h4 class="modal-title">Input Data SDM 15</h4>
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
                            <label class="control-label">Jenis Cuti</label>
                            <input class="form-control" type="text" name="jns_cuti" placeholder="Masukan Jenis Cuti">
                        </div>
                        <div class="form-group">
                            <label class="control-label">TMT</label>
                            <input class="form-control" type="date" name="tmt" placeholder="Masukan TMT">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Lama Cuti</label>
                            <input class="form-control" type="text" name="lama_cuti" placeholder="Masukan Lama Cuti">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tahun Anggaran</label>
                            <input class="form-control" type="text" name="thn_angg" placeholder="Masukan Tahun Anggaran">
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
        <?php foreach ($tsdm15->result_array() as $m) { ?>
        <div id="edit<?php echo $m['id_sdm15'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data SDM 15</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <?php $attributes = array('id' => 'regForm');
                        echo form_open('', $attributes); ?>
                        <input type="hidden" name="id_sdm15" value="<?php echo $m['id_sdm15'] ?>">
                        <div class="form-group">
                            <label class="control-label">NPP</label>
                            <input class="form-control" type="number" name="npp" placeholder="NPP" value="<?php echo $m['npp'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Urut</label>
                            <input class="form-control" type="number" name="no_urut" placeholder="Masukan No Urut Anda" value="<?php echo $m['no_urut'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Cuti</label>
                            <input class="form-control" type="text" name="jns_cuti" placeholder="Masukan Jenis Cuti" value="<?php echo $m['jns_cuti'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">TMT</label>
                            <input class="form-control" type="date" name="tmt" placeholder="Masukan TMT" value="<?php echo $m['tmt'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Lama Cuti</label>
                            <input class="form-control" type="text" name="lama_cuti" placeholder="Masukan Lama Cuti" value="<?php echo $m['lama_cuti'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tahun Anggaran</label>
                            <input class="form-control" type="text" name="thn_angg" placeholder="Masukan Tahun Anggaran" value="<?php echo $m['thn_angg'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No SK</label>
                            <input class="form-control" type="number" name="no_sk" placeholder="Masukan No SK" value="<?php echo $m['no_sk'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal SK</label>
                            <input class="form-control" type="date" name="tgl_sk" placeholder="Masukan Tanggal SK" value="<?php echo $m['tgl_sk'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">NPP Jabatan</label>
                            <input class="form-control" type="number" name="npp_jbt" placeholder="Masukan NPP Jabatan" value="<?php echo $m['npp_jbt'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bulan Proses</label>
                            <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses" value="<?php echo $m['bln_proses'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stat REC</label>
                            <input class="form-control" type="text" name="stat_rec" placeholder="Masukan Stat REC" value="<?php echo $m['stat_rec'] ?>">
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
        <?php foreach ($tsdm15->result_array() as $m) { ?>
        <div id="delet<?php echo $m['id_sdm15'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delet Data SDM 15</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/Admin/delet_sdm15' ?>">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus <b><?php echo $m['npp'] ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_sdm15" value="<?php echo $m['id_sdm15'] ?>">
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