<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php 
            $data['tittle'] = "Pendidikan";
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
                    <h1><i class="fa fa-graduation-cap"></i> Pendidikan</h1>
                    <p>Menampikan Data Pendidikan Karyawan</p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Tabel Kepegawaian</li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/admin/tabel_sdm/sdm03"> Pendidikan</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h4 class="title">Data Pendidikan</h4>
                        </div>
                        <hr align="right" color="black">
                        <div class="row">
                            <div class="form-group mx-sm-3 mb-2">
                                <?= form_open(''); ?>
                                <input class="form-control" type="text" aria-describedby="basic-addon2" name="npp_cari" placeholder=" Masukan NPP....." required><small class="form-text text-muted" id="emailHelp">Masukkan NPP yang akan anda cari</small>
                            </div>
                            <button class="btn btn-info mb-5" title="Cari NPP" type="submit" name="cari"><i class="fa fa-search"></i>Cari</button>&nbsp;&nbsp;&nbsp;
                            <?= form_close() ?>
                            <a class="btn btn-info icon-btn mb-5" title="Add Item" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm03"><i class="fa fa-plus"></i>Add Item </a>&nbsp;&nbsp;&nbsp;
                            <button type="button" title="Cetak A1" class="btn btn-info icon-btn mb-5" href="<?= base_url() ?>index.php/ExcelA1/export"><i class="fa fa-print"></i>Cetak A1 </button>
                        </div>
                        <div class="tile">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>NPP</th>
                                        <th>NO URUT</th>
                                        <th>TINGKAT PENDIDIKAN</th>
                                        <th>KODE PENDIDIKAN</th>
                                        <th>NAMA</th>
                                        <th>KOTA</th>
                                        <th>STATUS AKREDITASI</th>
                                        <th>DNLN</th>
                                        <th>TAHUN AWAL</th>
                                        <th>TAHUN AKHIR</th>
                                        <th>STATUS LULUS</th>
                                        <th>NO IJASAH</th>
                                        <th>TANGGAL IJASAH</th>
                                        <th>NILAI</th>
                                        <th>GRADE</th>
                                        <th>KETERANGAN</th>
                                        <th>BULAN PROSES</th>
                                        <th>STAT REC</th>
                                        <th>TANGGAL</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($_POST['cari'])) { //Dari sini
                                        foreach ($cari as $c) { ?>
                                            <tr>
                                                <td><?= $c['npp'] ?></td>
                                                <td><?= $c['no_urut'] ?></td>
                                                <td><?= $c['tk_pend'] ?></td>
                                                <td><?= $c['kd_pend'] ?></td>
                                                <td><?= $c['nama'] ?></td>
                                                <td><?= $c['kota'] ?></td>
                                                <td><?= $c['st_akred'] ?></td>
                                                <td><?= $c['dnln'] ?></td>
                                                <td><?= $c['thn_awal'] ?></td>
                                                <td><?= $c['thn_akhir'] ?></td>
                                                <td><?= $c['st_lulus'] ?></td>
                                                <td><?= $c['no_ijasah'] ?></td>
                                                <td><?= $c['tgl_ijasah'] ?></td>
                                                <td><?= $c['nilai'] ?></td>
                                                <td><?= $c['grade'] ?></td>
                                                <td><?= $c['ket'] ?></td>
                                                <td><?= $c['bln_proses'] ?></td>
                                                <td><?= $c['stat_rec'] ?></td>
                                                <td><?= $c['tgl'] ?></td>
                                                <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?= $c['id_sdm03'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </button>&nbsp;&nbsp;&nbsp;
                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet<?= $c['id_sdm03'] ?>"><i class="fa fa-trash" aria-hidden="true"></i>Delet </button>
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
            <?php if (isset($_POST['cari'])) foreach ($cari as $c) { ?>
                <div id="edit<?= $c['id_sdm03'] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Data Pendidikan</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <?php $attributes = array('id' => 'regForm');
                                echo form_open('', $attributes); ?>
                                <input type="hidden" name="id_sdm03" value="<?= $c['id_sdm03'] ?>">
                                <div class="form-group">
                                    <label class="control-label">NPP</label>
                                    <input class="form-control" type="number" name="npp" placeholder="NPP" value="<?= $c['npp'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No Urut</label>
                                    <input class="form-control" type="number" name="no_urut" placeholder="Masukan No Urut Anda" value="<?= $c['no_urut'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nama Sekolah/Lembaga</label>
                                    <input class="form-control" type="text" class="form-control" name="ket" value="<?= $c['ket'] ?>" aria-describedby="nm_sklh">
                                    <small class="form-text text-muted" id="nm_sklh"><strong> Masukan Nama Kampus EX: POLITEKNIK POS INDONESIA </strong></small>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tingkat Pendidikan</label>
                                    <select class="form-control" name="tk_pend" id="tk_pend">
                                        <optgroup label="Pilih Tingkat Pendidikan">
                                            <?php $tkpendini = $this->Model_karyawan->get_tk_pend($p['tk_pend']);
                                            foreach ($tkpendini as $y) { ?>
                                                <option value="<?= $p['tk_pend'] ?>"><?= $y['nm_tkpend'] ?></option>
                                            <?php } ?>
                                            <?php foreach ($tkpend as $key) { ?>
                                                <option value="<?= $key['tk_pend'] ?>"><?= $key['nm_tkpend'] ?></option>
                                            <?php  } ?>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nama Pendidikan</label>
                                    <select class="form-control" name="nama" id="nama" aria-describedby="namaini">
                                        <optgroup label="Pilih Pendidikan">
                                            <option value="<?= $c['nama'] ?>"><?= $c['nama'] ?></option>
                                        </optgroup>
                                    </select><small class="form-text text-muted" id="namaini"><strong> Masukan Nama Pendidikan </strong></small>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kode Pendidikan</label>
                                    <select class="form-control" name="kd_pend" id="kd_pend" aria-describedby="kodeini">
                                        <optgroup label="Pilih Kode Pendidikan">
                                            <option value="<?= $c['kd_pend'] ?>"><?= $c['kd_pend'] ?></option>
                                        </optgroup>
                                    </select><small class="form-text text-muted" id="kodeini"><strong> **Masukan Sesuai Nama Pendidikan yang dipilih</strong></small>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kota </label>
                                    <input class="form-control" type="text" name="kota" placeholder="Masukan Kota Sekolah Anda" value="<?= $c['kota'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Status Akreditasi</label>
                                    <input class="form-control" type="text" name="st_akred" placeholder="Masukan Status Akreditasi Sekolah Anda" value="<?= $c['st_akred'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">DNLN</label>
                                    <input class="form-control" type="text" name="dnln" placeholder="Masukan DNLN Anda" value="<?= $c['dnln'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tahun Awal</label>
                                    <input class="form-control" type="number" name="thn_awal" placeholder="Masukan Tahun Awal Sekolah" value="<?= $c['thn_awal'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tahun Akhir</label>
                                    <input class="form-control" type="number" name="thn_akhir" placeholder="Masukan Tahun Akhir Sekolah" value="<?= $c['thn_akhir'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Status Lulus</label>
                                    <input class="form-control" type="text" name="st_lulus" placeholder="Masukan Status Lulus Anda" value="<?= $c['st_lulus'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No Ijasah</label>
                                    <input class="form-control" type="number" name="no_ijasah" placeholder="Masukan No Ijasah Anda" value="<?= $c['no_ijasah'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Ijasah</label>
                                    <input class="form-control" type="date" name="tgl_ijasah" placeholder="Masukan Tanggal Ijasah Anda" value="<?= $c['tgl_ijasah'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nilai</label>
                                    <input class="form-control" type="text" name="nilai" placeholder="Masukan Nilai Ijasah Anda" value="<?= $c['nilai'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Grade</label>
                                    <input class="form-control" type="text" name="grade" placeholder="Masukan Grade Nilai Anda" value="<?= $c['grade'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Ket</label>
                                    <input class="form-control" type="text" name="ket" placeholder="Keterangan" value="<?= $c['ket'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Bulan Proses</label>
                                    <input class="form-control" type="text" name="bln_proses" placeholder="Bulan Proses" value="<?= $c['bln_proses'] ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Stat REC</label>
                                    <input class="form-control" type="text" name="stat_rec" placeholder="Stat REC" value="<?= $c['stat_rec'] ?>">
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
            <?php } ?>
            <!-- End Modal Edit -->

            <!-- Modal Delet-->
            <?php if (isset($_POST['cari'])) foreach ($cari as $c) { ?>
                <div id="delet<?= $c['id_sdm03'] ?>" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Hapus Data Pendidikan</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form class="form-horizontal" method="post" action="<?= base_url() . 'index.php/Admin/delet_sdm03' ?>">
                                <div class="modal-body">
                                    <p>Anda yakin mau menghapus <b><?= $c['npp']?></b> Dengan No Urut <b>(<?= $c['no_urut'] ?>)</b></p>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id_sdm03" value="<?= $c['id_sdm03'] ?>">
                                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tidak</button>
                                    <button class="btn btn-danger">Ya</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            <?php
        } ?>
            <!-- End Modal Delet-->

            <footer>
                <!-- footer area start-->
                <?php $this->load->view('template/footer') ?>
                <!-- footer area end-->
            </footer>
        </main>

        <!-- Main Menu area start-->
        <?php $this->load->view('template/script') ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#tk_pend').change(function() {
                    var no = $(tk_pend).val();
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url('index.php/Karyawan/pendentry') ?>",
                        dataType: "JSON",
                        data: {
                            no: no
                        },
                        async: false,
                        success: function(data) {
                            $('#nama').html(data.list_nama).show();
                            $('#kd_pend').html(data.list_kd_pend).show();
                        }
                    });
                });
            });

            $('#demoDate').datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                todayHighlight: true
            });

            $('#demoSelect').select2();
        </script>
        <!-- Main Menu area End-->
    </body>

    </html>
<?php
} ?>