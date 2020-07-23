<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php         
        $data['tittle'] = "History Jabatan";
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
                <h1><i class="fa fa-university"></i> History Jabatan</h1>
                <p>Menampilkan Tempat Kerja Karyawa</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tabel Kepegawaian</li>
                <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/admin/tabel_sdm/sdm05"> History Jabatan</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h4 class="title">Data History Jabatan</h4>
                    </div>
                    <hr align="right" color="black" >
                    <div class="row">
                        <div class="form-group mx-sm-3 mb-2">
                            <?= form_open('Admin/tabel_sdm/in_sdm05'); ?>
                            <input class="form-control" type="text" aria-describedby="basic-addon2" name="npp_cari" placeholder=" Masukan NPP....." required><small class="form-text text-muted" id="emailHelp">Masukkan NPP yang akan anda cari</small>
                        </div>
                        <button class="btn btn-info mb-5" title="Cari NPP" type="submit" name="cari"><i class="fa fa-search"></i>Cari</button>&nbsp;&nbsp;&nbsp;
                            <?= form_close() ?>
                            <a class="btn btn-info icon-btn mb-5" title="Add Item" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm05"><i class="fa fa-plus"></i>Add Item </a>&nbsp;&nbsp;&nbsp;
                        <button type="button" title="Cetak A1" class="btn btn-info icon-btn mb-5" href="<?= base_url() ?>index.php/ExcelA1/export"><i class="fa fa-print"></i>Cetak A1 </button>                        
                    </div>
                    <div class="tile">
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
                            <?php
                                if(isset($_POST['cari'])){ //Dari sini
                                foreach ($cari as $e) {?>
                                <tr>
                                    <td><?= $e['npp'] ?></td>
                                    <td><?= $e['no_urut'] ?></td>
                                    <td><?= $e['thn_awal'] ?></td>
                                    <td><?= $e['thn_akhir'] ?></td>
                                    <td><?= $e['nama'] ?></td>
                                    <td><?= $e['jabatan'] ?></td>
                                    <td><?= $e['nm_jbt'] ?></td>
                                    <td><?= $e['no_sk'] ?></td>
                                    <td><?= $e['tgl_sk'] ?></td>
                                    <td><?= $e['bln_proses'] ?></td>
                                    <td><?= $e['stat_rec'] ?></td>
                                    <td><?= $e['tgl'] ?></td>
                                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?= $e['id_sdm05'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </button>&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet<?= $e['id_sdm05'] ?>"><i class="fa fa-trash" aria-hidden="true"></i>Delet </button>
                                    </td>
                                </tr>
                                <?php } 
                                }
                                else{
                                echo "<tr>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
                                </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- Modal Edit -->
        <?php if(isset($_POST['cari'])) foreach ($cari as $e) { ?>
        <div id="edit<?= $e['id_sdm05'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data History Jabatan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <?php $attributes = array('id' => 'regForm');
                        echo form_open('', $attributes); ?>
                        <input type="hidden" name="id_sdm05" value="<?= $e['id_sdm05'] ?>">
                        <div class="form-group">
                            <label class="control-label">NPP</label>
                            <input class="form-control" type="number" name="npp" placeholder="NPP" value="<?= $e['npp'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Urut</label>
                            <input class="form-control" type="number" name="no_urut" placeholder="Masukan No Urut Anda" value="<?= $e['no_urut'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tahun Awal</label>
                            <input class="form-control" type="number" name="thn_awal" placeholder="Masukan Tahun Awal" value="<?= $e['thn_awal'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tahun Akhir </label>
                            <input class="form-control" type="number" name="thn_akhir" placeholder="Masukan Tahun Akhir" value="<?= $e['thn_akhir'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input class="form-control" type="text" name="nama" placeholder="Masukan Nama" value="<?= $e['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jabatan</label>
                            <input class="form-control" type="text" name="jabatan" placeholder="Masukan Jabatan" value="<?= $e['jabatan'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Jabatan</label>
                            <input class="form-control" type="text" name="nm_jbt" placeholder="Masukan Nama Jabatan" value="<?= $e['nm_jbt'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No SK</label>
                            <input class="form-control" type="text" name="no_sk" placeholder="Masukan No SK" value="<?= $e['no_sk'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal SK</label>
                            <input class="form-control" type="date" name="tgl_sk" placeholder="Masukan Tanggal SK" value="<?= $e['tgl_sk'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bulan Proses</label>
                            <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses" value="<?= $e['bln_proses'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stat REC</label>
                            <input class="form-control" type="text" name="stat_rec" placeholder="Masukan Stat Rec" value="<?= $e['stat_rec'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" name="edit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?= form_close() ?>
                </div>

            </div>
        </div>
        <?php 
    } ?>
        <!-- End Modal Edit -->


        <!-- Modal Delet -->
        <?php if(isset($_POST['cari'])) foreach ($cari as $e) { ?>
        <div id="delet<?= $e['id_sdm05'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Data History Jabatan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?= base_url() . 'index.php/Admin/delet_sdm05' ?>">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus <b><?= $e['npp'] . " Dengan No Urut " . $e['no_urut'] ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_sdm05" value="<?= $e['id_sdm05'] ?>">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tidak</button>
                            <button class="btn btn-danger">Ya</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <?php 
    } ?>
        <!-- End Modal Delet -->

        <footer>
                <!-- footer area start-->
                <?php $this->load->view('template/footer') ?>
                <!-- footer area end-->
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