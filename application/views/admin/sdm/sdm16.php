<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

    <?php         
        $data['tittle'] = "History Kenaikan Golonagan";
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
                    <h1><i class="fa fa-handshake-o"></i> History Kenaikan Golonagan</h1>
                    <p>Menampikan Data Hisroty Kenaikan Golonagan Karyawan</p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Tabel Kepegawaian</li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/admin/tabel_sdm/sdm16"> History Kenaikan Golonagan</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h4 class="title">Data History Kenaikan Golonagan</h4>
                        </div>
                        <hr align="right" color="black">
                        <div class="row">
                            <div class="form-group mx-sm-3 mb-2">
                                <?= form_open(''); ?>
                                <input class="form-control" type="text" aria-describedby="basic-addon2" name="npp_cari" placeholder=" Masukan NPP....." required><small class="form-text text-muted" id="emailHelp">Masukkan NPP yang akan anda cari</small>
                            </div>
                            <button class="btn btn-info mb-5" title="Cari NPP" type="submit" name="cari"><i class="fa fa-search"></i>Cari</button>&nbsp;&nbsp;&nbsp;
                            <?= form_close() ?>
                            <a class="btn btn-info icon-btn mb-5" title="Add Item" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm16"><i class="fa fa-plus"></i>Add Item </a>&nbsp;&nbsp;&nbsp;
                            <button type="button" title="Cetak A1" class="btn btn-info icon-btn mb-5" href="<?= base_url() ?>index.php/ExcelA1/export"><i class="fa fa-print"></i>Cetak A1 </button>
                        </div>
                        <div class="tile">
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
                                    <?php
                                    if (isset($_POST['cari'])) { //Dari sini
                                        foreach ($cari as $x) { ?>
                                            <tr>
                                                <td><?= $x['npp'] ?></td>
                                                <td><?= $x['no_urut'] ?></td>
                                                <td><?= $x['st_peg'] ?></td>
                                                <td><?= $x['golongan'] ?></td>
                                                <td><?= $x['mk'] ?></td>
                                                <td><?= date('d-m-Y', strtotime($x['tmt'])) ?></td>
                                                <td><?= $x['jns_naik'] ?></td>
                                                <td><?= $x['no_sk'] ?></td>
                                                <td><?= date('d-m-Y', strtotime($x['tgl_sk'])) ?></td>
                                                <td><?= $x['npp_jbt'] ?></td>
                                                <td><?= $x['bln_proses'] ?></td>
                                                <td><?= $x['kd_kelas'] ?></td>
                                                <td><?= $x['stat_rec'] ?></td>
                                                <td><?= $x['tgl'] ?></td>
                                                <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?= $x['id_sdm16'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </button>&nbsp;&nbsp;&nbsp;
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet<?= $x['id_sdm16'] ?>"><i class="fa fa-trash" aria-hidden="true"></i>Delet </button>
                                                </td>
                                            </tr>
                                        <?php }
                                } else {
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
            <?php if (isset($_POST['cari'])) foreach ($cari as $x) { ?>
                <div id="edit<?= $x['id_sdm16'] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Data History Kenaikan Golonagan</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <?php $attributes = array('id' => 'regForm');
                                echo form_open('', $attributes); ?>
                                <input type="hidden" name="id_sdm16" value="<?= $x['id_sdm16'] ?>">
                                <div class="form-group">
                                    <label class="control-label">NPP</label>
                                    <input class="form-control" type="number" name="npp" placeholder="NPP" value="<?= $x['npp'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No Urut</label>
                                    <input class="form-control" type="number" name="no_urut" placeholder="Masukan No Urut Anda" value="<?= $x['no_urut'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Status Pegawai</label>
                                    <input class="form-control" type="text" name="st_peg" placeholder="Masukan Status Pegawai" value="<?= $x['st_peg'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Golongan</label>
                                    <?php $gol = $this->Model_karyawan->get_gol($x['golongan']);
                                    foreach ($gol as $g) { ?>
                                        <input class="form-control" type="text" name="golongan" placeholder="Masukan Golongan" value="<?= $g['gol'] ?>">
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">MK</label>
                                    <input class="form-control" type="text" name="mk" placeholder="Masukan MK" value="<?= $x['mk'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">TMT</label>
                                    <input class="form-control" type="date" name="tmt" placeholder="Masukan TMT" value="<?= $x['tmt'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Jenis Naik</label>
                                    <input class="form-control" type="text" name="jns_naik" placeholder="Masukan Jenis Naik" value="<?= $x['jns_naik'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No SK</label>
                                    <input class="form-control" type="text" name="no_sk" placeholder="Masukan No SK" value="<?= $x['no_sk'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal SK</label>
                                    <input class="form-control" type="date" name="tgl_sk" placeholder="Masukan Tanggal SK" value="<?= $x['tgl_sk'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">NPP Jabatan</label>
                                    <input class="form-control" type="text" name="npp_jbt" placeholder="Masukan NPP Jabatan" value="<?= $x['npp_jbt'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Bulan Proses</label>
                                    <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses" value="<?= $x['bln_proses'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kode Kelas</label>
                                    <input class="form-control" type="text" name="kd_kelas" placeholder="Masukan Kode Kelas" value="<?= $x['kd_kelas'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Stat REC</label>
                                    <input class="form-control" type="text" name="stat_rec" placeholder="Masukan Stat REC" value="<?= $x['stat_rec'] ?>">
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
            <?php if (isset($_POST['cari'])) foreach ($cari as $x) { ?>
                <div id="delet<?= $x['id_sdm16'] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Delet Data History Kenaikan Golonagan</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form class="form-horizontal" method="post" action="<?= base_url() . 'index.php/Admin/delet_sdm16' ?>">
                                <div class="modal-body">
                                    <p>Anda yakin mau menghapus <b><?= $x['npp'] ?></b> Dengan No Urut <b>(<?= $x['no_urut'] ?>)</b></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id_sdm16" value="<?= $x['id_sdm16'] ?>">
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