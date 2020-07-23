<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

<?php         
        $data['tittle'] = "Hisroty Mutasi";
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
                <h1><i class="fa fa-exchange"></i> Hisroty Mutasi</h1>
                <p>Menampilkan Data Mutasi Karyawan</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tabel Kepegawaian</li>
                <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm08"> Hisroty Mutasi</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h4 class="title">Data Hisroty Mutasi</h4>
                    </div>
                    <hr align="right" color="black" >
                    <div class="row">
                        <div class="form-group mx-sm-3 mb-2">
                            <?= form_open(''); ?>
                            <input class="form-control" type="text" aria-describedby="basic-addon2" name="npp_cari" placeholder=" Masukan NPP....." required><small class="form-text text-muted" id="emailHelp">Masukkan NPP yang akan anda cari</small>
                        </div>
                        <button class="btn btn-info mb-5" title="Cari NPP" type="submit" name="cari"><i class="fa fa-search"></i>Cari</button>&nbsp;&nbsp;&nbsp;
                            <?= form_close() ?>
                            <a class="btn btn-info icon-btn mb-5" title="Add Item" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm08"><i class="fa fa-plus"></i>Add Item </a>&nbsp;&nbsp;&nbsp;
                        <button type="button" title="Cetak A1" class="btn btn-info icon-btn mb-5" href="<?= base_url() ?>index.php/ExcelA1/export"><i class="fa fa-print"></i>Cetak A1 </button>                        
                    </div>
                    <div class="tile">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>NPP</th>
                                    <th>NO URUT</th>
                                    <th>KODE MUTASI</th>
                                    <th>KODE UNIT</th>
                                    <th>KODE ADF</th>
                                    <th>KODE BUDIDIAYA</th>
                                    <th>JABATAN</th>
                                    <th>TMT</th>
                                    <th>NO SK</th>
                                    <th>TANGGAL SK</th>
                                    <th>TINGGAL</th>
                                    <th>NPP JABATAN</th> 
                                    <th>BULAN PROSES</th>
                                    <th>STAT REC</th>
                                    <th>TANGGAL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_POST['cari'])){ //Dari sini
                                foreach ($cari as $h) {?>
                                <tr>
                                    <td><?= $h['npp'] ?></td>
                                    <td><?= $h['no_urut'] ?></td>
                                    <td><?= $h['kd_mutasi'] ?></td>
                                    <td><?= $h['kd_unit'] ?></td>
                                    <td><?= $h['kd_adf'] ?></td>
                                    <td><?= $h['kd_bud'] ?></td>
                                    <td><?= $h['jabatan'] ?></td>
                                    <td><?= date('d-m-Y', strtotime($h['tmt'])) ?></td>
                                    <td><?= $h['no_sk'] ?></td>
                                    <td><?= date('d-m-Y', strtotime($h['tgl_sk'])) ?></td>
                                    <td><?= $h['npp_jbt'] ?></td>
                                    <td><?= $h['tinggal'] ?></td>
                                    <td><?= $h['bln_proses'] ?></td>
                                    <td><?= $h['stat_rec'] ?></td>
                                    <td><?= $h['tgl'] ?></td>
                                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?= $h['id_sdm08'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </button>&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet<?= $h['id_sdm08'] ?>"><i class="fa fa-trash" aria-hidden="true"></i>Delet </button>
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
        <?php if(isset($_POST['cari'])) foreach ($cari as $h) { ?>
        <div id="edit<?= $h['id_sdm08'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Hisroty Mutasi</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <?php $attributes = array('id' => 'regForm');
                        echo form_open('', $attributes); ?>
                        <input type="hidden" name="id_sdm08" value="<?= $h['id_sdm08'] ?>">
                        <div class="form-group">
                            <label class="control-label">NPP</label>
                            <input class="form-control" type="text" name="npp" placeholder="NPP" value="<?= $h['npp'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Urut</label>
                            <input class="form-control" type="text" name="no_urut" placeholder="Masukan No Urut Anda" value="<?= $h['no_urut'] ?>">
                        </div>
                        <div class=" form-group">
                            <label class="control-label">Kode Mutasi</label>
                            <input class="form-control" type="text" name="kd_mutasi" placeholder="Masukan Kode Mutasi" value="<?= $h['kd_mutasi'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kode Unit</label>
                            <input class="form-control" type="text" name="kd_unit" placeholder="Masukan Kode Unit" value="<?= $h['kd_unit'] ?>">
                        </div>
                        <div class=" form-group">
                            <label class="control-label">Kode Adf</label>
                            <input class="form-control" type="text" name="kd_adf" placeholder="Masukan Kode Adf" value="<?= $h['kd_adf'] ?>">
                        </div>
                        <div class=" form-group">
                            <label class="control-label">Kode Budidaya</label>
                            <input class="form-control" type="text" name="kd_bud" placeholder="Masukan Kode Budidaya" value="<?= $h['kd_bud'] ?>">
                        </div>
                        <div class=" form-group">
                            <label class="control-label">Jabatan</label>
                            <input class="form-control" type="text" name="jabatan" placeholder="Masukan Jabatan " value="<?= $h['jabatan'] ?>">
                        </div>
                        <div class=" form-group">
                            <label class="control-label">TMT</label>
                            <input class="form-control" type="text" name="tmt" placeholder="Masukan TMT" value="<?= $h['tmt'] ?>">
                        </div>
                        <div class=" form-group">
                            <label class="control-label">No SK</label>
                            <input class="form-control" type="text" name="no_sk" placeholder="Masukan No SK" value="<?= $h['no_sk'] ?>">
                        </div>
                        <div class=" form-group">
                            <label class="control-label">Tanggal SK</label>
                            <input class="form-control" type="text" name="tgl_sk" placeholder="Masukan Tanggal" value="<?= $h['tgl_sk'] ?>">
                        </div>
                        <div class=" form-group">
                            <label class="control-label">NPP Jabatan</label>
                            <input class="form-control" type="text" name="npp_jbt" placeholder="Masukan NPP Jabatan " value="<?= $h['npp_jbt'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">TINGGAL</label>
                            <input class="form-control" type="text" name="tinggal" placeholder="Masukan TINGGAL " value="<?= $h['tinggal'] ?>">
                        </div>
                        <div class=" form-group">
                            <label class="control-label">Bulan Proses</label>
                            <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses" value="<?= $h['bln_proses'] ?>">
                        </div>
                        <div class=" form-group">
                            <label class="control-label">Stat REC</label>
                            <input class="form-control" type="text" name="stat_rec" placeholder="Masukan Stat REC" value="<?= $h['stat_rec'] ?>">
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <button class="btn btn-primary" name="edit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?= form_close() ?>
                </div>

            </div>
        </div>
        <?php } ?>
        <!-- End Modal Edit -->

        <!-- Modal Delet -->
        <?php if(isset($_POST['cari'])) foreach ($cari as $h) { ?>
        <div id="delet<?= $h['id_sdm08'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delet Data Hisroty Mutasi</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?= base_url() . 'index.php/Admin/delet_sdm08' ?>">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus <b><?= $h['npp'] ?></b> Dengan No Urut <b>(<?= $h['no_urut'] ?>)</b></p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_sdm08" value="<?= $h['id_sdm08'] ?>">
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