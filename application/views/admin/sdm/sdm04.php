<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php 
        $data['tittle'] = "Pelatihan";
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
                    <h1><i class="fa fa-line-chart"></i> Pelatihan</h1>
                    <p>Menampilkan Data Pelatihan Karyawan</p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Tabel Kepegawaian</li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/admin/tabel_sdm/sdm04"> Pelatihan</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h4 class="title">Data Pelatihan</h4>
                        </div>
                        <hr align="right" color="black">
                        <div class="row">
                            <div class="form-group mx-sm-3 mb-2">
                                <?= form_open(''); ?>
                                <input class="form-control" type="text" aria-describedby="basic-addon2" name="npp_cari" placeholder=" Masukan NPP....." required><small class="form-text text-muted" id="emailHelp">Masukkan NPP yang akan anda cari</small>
                            </div>
                            <button class="btn btn-info mb-5" title="Cari NPP" type="submit" name="cari"><i class="fa fa-search"></i>Cari</button>&nbsp;&nbsp;&nbsp;
                            <?= form_close() ?>
                            <a class="btn btn-info icon-btn mb-5" title="Add Item" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm04"><i class="fa fa-plus"></i>Add Item </a>&nbsp;&nbsp;&nbsp;
                            <button type="button" title="Cetak A1" class="btn btn-info icon-btn mb-5" href="<?= base_url() ?>index.php/ExcelA1/export"><i class="fa fa-print"></i>Cetak A1 </button>
                        </div>
                        <div class="tile">
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
                                    <?php
                                    if (isset($_POST['cari'])) { //Dari sini
                                        foreach ($cari as $d) { ?>
                                            <tr>
                                                <td><?= $d['npp'] ?></td>
                                                <td><?= $d['no_urut'] ?></td>
                                                <td><?= $d['kd_pend'] ?></td>
                                                <td><?= $d['nama'] ?></td>
                                                <td><?= $d['ket'] ?></td>
                                                <td><?= $d['dnln'] ?></td>
                                                <td><?= date('d-m-Y', strtotime($d['tgl_awal'])) ?></td>
                                                <td><?= date('d-m-Y', strtotime($d['tgl_akhir'])) ?></td>
                                                <td><?= $d['no_sert'] ?></td>
                                                <td><?= $d['tgl_sert'] ?></td>
                                                <td><?= $d['nilai'] ?></td>
                                                <td><?= $d['grade'] ?></td>
                                                <td><?= $d['bln_proses'] ?></td>
                                                <td><?= $d['stat_rec'] ?></td>
                                                <td><?= $d['tgl'] ?></td>
                                                <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?= $d['id_sdm04'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </button>&nbsp;&nbsp;&nbsp;
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet<?= $d['id_sdm04'] ?>"><i class="fa fa-trash" aria-hidden="true"></i>Delet </button>
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

            <!-- Modal Edit-->
            <?php if (isset($_POST['cari'])) foreach ($cari as $d) { ?>
                <div id="edit<?= $d['id_sdm04'] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Data Pelatihan</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <?php $attributes = array('id' => 'regForm');
                                echo form_open('', $attributes); ?>
                                <input type="hidden" name="id_sdm04" value="<?= $d['id_sdm04'] ?>">
                                <div class="form-group">
                                    <label class="control-label">NPP</label>
                                    <input class="form-control" type="number" name="npp" placeholder="Masukan NPP" value="<?= $d['npp'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No Urut</label>
                                    <input class="form-control" type="number" name="no_urut" placeholder="Masukan No Urut Anda" value="<?= $d['no_urut'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kode Pendidikan</label>
                                    <select class="form-control" name="kd_pend">
                                        <optgroup label="Pilih Kode Pendidikan">
                                            <?php $ini = $this->Model_karyawan->get_pend($d['kd_pend']);
                                            foreach ($ini as $i) { ?>
                                                <option value="<?= $d['kd_pend'] ?>">(<?= $d['kd_pend'] ?>) --> <?= $i['nama'] ?></option>
                                            <?php } ?>
                                            <?php foreach ($pend as $q) { ?>
                                                <option value="<?= $q['kd_pend'] ?>">(<?= $q['kd_pend'] ?>) -> <?= $q['nama'] ?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select> </div>
                                <div class="form-group">
                                    <label class="control-label">Nama </label>
                                    <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Pelatihan" value="<?= $d['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Keterangan </label>
                                    <input class="form-control" type="text" name="ket" placeholder="Masukan Keterangan" value="<?= $d['ket'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">DNLN</label>
                                    <input class="form-control" type="text" name="dnln" placeholder="Masukan DNLN" value="<?= $d['dnln'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Awal</label>
                                    <input class="form-control" type="date" name="tgl_awal" placeholder="Masukan Tanggal Awal" value="<?= $d['tgl_awal'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Akhir</label>
                                    <input class="form-control" type="date" name="tgl_akhir" placeholder="Masukan Tanggal Akhir" value="<?= $d['tgl_akhir'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No Sertifikat</label>
                                    <input class="form-control" type="text" name="no_sert" placeholder="Masukan No Sertifikat" value="<?= $d['no_sert'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Sertifikat</label>
                                    <input class="form-control" type="date" name="tgl_sert" placeholder="Masukan Tanggal Sertifikasi" value="<?= $d['tgl_sert'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nilai</label>
                                    <input class="form-control" type="number" name="nilai" placeholder="Masukan Nilai Anda" value="<?= $d['nilai'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Grade</label>
                                    <input class="form-control" type="number" name="grade" placeholder="Masukan Grade Nilai Anda" value="<?= $d['grade'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Bulan Proses</label>
                                    <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses" value="<?= $d['bln_proses'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Stat Rec</label>
                                    <input class="form-control" type="text" name="stat_rec" placeholder="Masukan Stat Rec" value="<?= $d['stat_rec'] ?>">
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
            <!-- End Modal Edit-->

            <!-- Modal Delet -->
            <?php if (isset($_POST['cari'])) foreach ($cari as $d) { ?>
                <div id="delet<?= $d['id_sdm04'] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Hapus Data Pelatihan</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form class="form-horizontal" method="post" action="<?= base_url() . 'index.php/Admin/delet_sdm04' ?>">
                                <div class="modal-body">
                                    <p>Anda yakin mau menghapus <b><?= $d['npp'] . " No Urut (" . $d['no_urut'] . ")"?> </b><br> Keterangan Pelatihan <b><?= $d['ket']?></b></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id_sdm04" value="<?= $d['id_sdm04'] ?>">
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