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
                <h1><i class="fa fa-th-list"></i> SDM 03</h1>
                <p></p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tabel SDM</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/sdm03"> SDM 03</a></li>
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
                                <?php foreach ($tsdm03->result_array() as $c) { ?>
                                <tr>
                                    <td><?php echo $c['npp'] ?></td>
                                    <td><?php echo $c['no_urut'] ?></td>
                                    <td><?php echo $c['tk_pend'] ?></td>
                                    <td><?php echo $c['kd_pend'] ?></td>
                                    <td><?php echo $c['nama'] ?></td>
                                    <td><?php echo $c['kota'] ?></td>
                                    <td><?php echo $c['st_akred'] ?></td>
                                    <td><?php echo $c['dnln'] ?></td>
                                    <td><?php echo $c['thn_awal'] ?></td>
                                    <td><?php echo $c['thn_akhir'] ?></td>
                                    <td><?php echo $c['st_lulus'] ?></td>
                                    <td><?php echo $c['no_ijasah'] ?></td>
                                    <td><?php echo $c['tgl_ijasah'] ?></td>
                                    <td><?php echo $c['nilai'] ?></td>
                                    <td><?php echo $c['grade'] ?></td>
                                    <td><?php echo $c['ket'] ?></td>
                                    <td><?php echo $c['bln_proses'] ?></td>
                                    <td><?php echo $c['stat_rec'] ?></td>
                                    <td><?php echo $c['tgl'] ?></td>
                                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $c['id_sdm03'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet<?php echo $c['id_sdm03'] ?>"><i class="fa fa-trash" aria-hidden="true"></i>Delet </button>
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
                        <h4 class="modal-title">Input Data SDM 03</h4>
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
                            <label class="control-label">Tingkat Pendidikan</label>
                            <select class="form-control" name="tk_pend" id="exampleSelect1">
                                <option value="0000">TIDAK TAMAT SEKOLAH DASAR</option>
                                <option value="1000">PENDIDIKAN DASAR</option>
                                <option value="1A00">SD/SR</option>
                                <option value="1M00">MADRASAH IBTIDAIYAH (MI)</option>
                                <option value="1Z00">PERSAMAAN SD (PAKET A)</option>
                                <option value="2000">SEKOLAH LANJUTAN TINGKAT PERTAMA (SLTP)</option>
                                <option value="2A00">SMP</option>
                                <option value="2AA0">SMP BAGIAN A</option>
                                <option value="2AB0">SMP BAGIAN B</option>
                                <option value="2AC0">SMP BAGIAN C</option>
                                <option value="2B00">SEKOLAH TEKNIK (ST)</option>
                                <option value="2BA0">ST BANGUNAN</option>
                                <option value="2BA1">ST BANGUNAN AIR</option>
                                <option value="2BA2">ST BANGUNAN AIR DAN JALAN</option>
                                <option value="2BA3">ST BANGUNAN GEDUNG</option>
                                <option value="2BB0">ST ELEKTRO</option>
                                <option value="2BB1">ST ELEKTRONIKA</option>
                                <option value="2BB2">ST TELEKOMUNIKASI</option>
                                <option value="2BC0">ST LISTRIK</option>
                                <option value="2BD0">ST MESIN</option>
                                <option value="2BD1">ST MESIN KAPAL</option>
                                <option value="2BD2">ST MESIN KONSTRUKSI</option>
                                <option value="2BD3">ST MESIN PRODUKSI</option>
                                <option value="2BD4">ST MESIN TENAGA</option>
                                <option value="2BE0">ST OTOMOTIF</option>
                                <option value="2BE1">ST MOTOR BENSIN</option>
                                <option value="2BE2">ST MOTOR DIESEL</option>
                                <option value="2D00">SMEP</option>
                                <option value="2DA0">SMEP AKUNTANSI</option>
                                <option value="2DB0">SMEP KEUANGAN</option>
                                <option value="2DC0">SMEP TATA BUKU</option>
                                <option value="2DD0">SMEP TATA NIAGA</option>
                                <option value="2DE0">SMEP TATA USAHA</option>
                                <option value="2DF0">SMEP KESEKRETARIATAN</option>
                                <option value="2DG0">SMEP KOPERASI</option>
                                <option value="2DH0">SMEP PARIWISATA</option>
                                <option value="2G00">SKP</option>
                                <option value="2M00">MADRASAH TSANAWIYAH (MTs)</option>
                                <option value="2W00">SEKOLAH MILITER/ KEPOLISIAN TINGKAT SLTP</option>
                                <option value="2Z00">PERSAMAAN SMP (PAKET B)</option>
                                <option value="3000">SEKOLAH LANJUTAN TINGKAT ATAS (SLTA)</option>
                                <option value="3A00">SMA</option>
                                <option value="3AA0">SMA BAGIAN A</option>
                                <option value="3AB0">SMA BAGIAN B</option>
                                <option value="3AC0">SMA BAGIAN C</option>
                                <option value="3AD0">SMA PASPAL</option>
                                <option value="3AE0">SMA SOSBUD</option>
                                <option value="3AF0">SMA SASTRA</option>
                                <option value="3AG0">SMA ILMU PENGETAHUAN ALAM (IPA)</option>
                                <option value="3AH0">SMA ILMU PENGETAHUAN SOSIAL (IPS)</option>
                                <option value="3AI0">SMA ILMU PENGETAHUAN BUDAYA (IPB)</option>
                                <option value="3AJ0">SMA A-1</option>
                                <option value="3AK0">SMA A-2</option>
                                <option value="3AL0">SMA A-3</option>
                                <option value="3AM0">SMA A-4</option>
                                <option value="3AO0">SMA ILMU-ILMU FISIKA (IIF)</option>
                                <option value="3AP0">SMA ILMU-ILMU BIOLOGI (IIB)</option>
                                <option value="3AQ0">SMA ILMU-ILMU SOSIAL (IIS)</option>
                                <option value="3B00">STM</option>
                                <option value="3BA0">STM BANGUNAN</option>
                                <option value="3BA1">STM BANGUNAN AIR</option>
                                <option value="3BA2">STM BANGUNAN AIR DAN JALAN</option>
                                <option value="3BA3">STM BANGUNAN GEDUNG</option>
                                <option value="3BB0">STM ELEKTRO</option>
                                <option value="3BB1">STM ELEKTRONIKA</option>
                                <option value="3BB2">STM TELEKOMUNIKASI</option>
                                <option value="3BC0">STM LISTRIK</option>
                                <option value="3BD0">STM MESIN</option>
                                <option value="3BD1">STM MESIN KAPAL</option>
                                <option value="3BD2">STM MESIN KONSTRUKSI</option>
                                <option value="3BD3">STM MESIN PRODUKSI</option>
                                <option value="3BD4">STM MESIN TENAGA</option>
                                <option value="3BE0">STM OTOMOTIF</option>
                                <option value="3BE1">STM MOTOR BENSIN</option>
                                <option value="3BE2">STM MOTOR DIESEL</option>
                                <option value="3BF0">STM PENERBANGAN</option>
                                <option value="3BF1">STM MOTOR DAN RANGKA PESAWAT</option>
                                <option value="3BF2">STM PEMELIHARAAN PESAWAT TERBANG</option>
                                <option value="3BG0">STM GEOLOGI DAN PERTAMBANGAN</option>
                                <option value="3BG1">STM GEOLOGI</option>
                                <option value="3BG2">STM PERTAMBANGAN</option>
                                <option value="3BG3">STM PENGERJAAN LOGAM</option>
                                <option value="3C00">SPK</option>
                                <option value="3CA0">SPK PERAWAT UMUM</option>
                                <option value="3CB0">SPK PERAWAT GIGI</option>
                                <option value="3D00">SMEA</option>
                                <option value="3DA0">SMEA AKUNTANSI</option>
                                <option value="3DB0">SMEA KEUANGAN</option>
                                <option value="3DC0">SMEA TATA BUKU</option>
                                <option value="3DD0">SMEA TATA NIAGA</option>
                                <option value="3DE0">SMEA TATA USAHA</option>
                                <option value="3DF0">SMEA KESEKRETARIATAN</option>
                                <option value="3DG0">SMEA KOPERASI</option>
                                <option value="3DH0">SMEA PARIWISATA</option>
                                <option value="3E00">SPMA</option>
                                <option value="3F00">SPMA ANALIS KIMIA</option>
                                <option value="3G00">SKKA</option>
                                <option value="3H00">SMKK</option>
                                <option value="3I00">SPG</option>
                                <option value="3J00">SGO</option>
                                <option value="3K00">PGA</option>
                                <option value="3M00">MADRASAH ALIYAH (MA)</option>
                                <option value="3W00">SEKOLAH MILITER/ KEPOLISIAN TINGKAT SLTA</option>
                                <option value="3X00">KURSUS TEKNIK BREVET C</option>
                                <option value="3Z00">KKPA/PERSAMAAN SMA (PAKET C)</option>
                                <option value="4000">DIPLOMA-I</option>
                                <option value="5000">DIPLOMA-II</option>
                                <option value="6000">SM/D-III</option>
                                <option value="7000">S-1/D-IV</option>
                                <option value="8000">S-2/SP-1</option>
                                <option value="9000">S-3/SP-2</option>
                                <option value="A000">MATEMATIKA DAN ILMU PENGETAHUAN ALAM (MIPA)</option>
                                <option value="AA00">MATEMATIKA</option>
                                <option value="AA10">STATISTIKA</option>
                                <option value="AB00">FISIKA</option>
                                <option value="AC00">KIMIA</option>
                                <option value="AD00">BIOLOGI</option>
                                <option value="AE00">FARMASI</option>
                                <option value="AF00">GEOLOGI</option>
                                <option value="AG00">GEOFISIKA DAN METEOROLOGI</option>
                                <option value="AH00">ASTRONOMI</option>
                                <option value="B000">TEKNIK</option>
                                <option value="BA00">TEKNOLOGI INDUSTRI</option>
                                <option value="BA10">TEKNIK FISIKA</option>
                                <option value="BA20">TEKNIK KIMIA</option>
                                <option value="BA30">BIOTEKNOLOGI</option>
                                <option value="BA40">TEKNIK MESIN</option>
                                <option value="BA41">TEKNIK MESIN KONSTRUKSI</option>
                                <option value="BA42">TEKNIK MESIN KAPAL</option>
                                <option value="BA50">TEKNIK ELEKTRO</option>
                                <option value="BA51">TEKNIK ELEKTRONIKA</option>
                                <option value="BA52">TEKNIK LISTRIK</option>
                                <option value="BA60">TEKNIK INDUSTRI</option>
                                <option value="BA70">TEKNIK KOMPUTER/INFORMATIKA</option>
                                <option value="BB00">TEKNOLOGI SIPIL DAN PERENCANAAN</option>
                                <option value="BB10">TEKNIK SIPIL</option>
                                <option value="BB11">TEKNIK SIPIL BASAH</option>
                                <option value="BB12">TEKNIK SIPIL KERING</option>
                                <option value="BB13">TEKNIK SIPIL KONSTRUKSI</option>
                                <option value="BB14">TEKNIK SIPIL PERHUBUNGAN</option>
                                <option value="BB15">TEKNIK SIPIL STRUKTUR</option>
                                <option value="BB16">TEKNIK SIPIL TRANSPORTASI</option>
                                <option value="BB17">SISTEM DAN TEKNIK JALAN RAYA</option>
                                <option value="BB20">TEKNIK ARSITEKTUR</option>
                                <option value="BB21">TEKNIK ARSITEKTUR LANSEKAP</option>
                                <option value="BB30">TEKNIK GEODESI</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kode Pendidikan</label>
                            <input class="form-control" type="text" name="kd_pend" placeholder="Masukan Kode Pendidikan Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Sekolah</label>
                            <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Sekolah Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kota </label>
                            <input class="form-control" type="text" name="kota" placeholder="Masukan Kota Sekolah Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status Akreditasi</label>
                            <input class="form-control" type="text" name="st_akred" placeholder="Masukan Status Akreditasi Sekolah Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">DNLN</label>
                            <input class="form-control" type="text" name="dnln" placeholder="Masukan DNLN Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tahun Awal</label>
                            <input class="form-control" type="number" name="thn_awal" placeholder="Masukan Tahun Awal Sekolah">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tahun Akhir</label>
                            <input class="form-control" type="number" name="thn_akhir" placeholder="Masukan Tahun Akhir Sekolah">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status Lulus</label>
                            <input class="form-control" type="text" name="st_lulus" placeholder="Masukan Status Lulus Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Ijasah</label>
                            <input class="form-control" type="number" name="no_ijasah" placeholder="Masukan No Ijasah Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Ijasah</label>
                            <input class="form-control" type="date" name="tgl_ijasah" placeholder="Masukan Tanggal Ijasah Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nilai</label>
                            <input class="form-control" type="number" name="nilai" placeholder="Masukan Nilai Ijasah Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Grade</label>
                            <input class="form-control" type="text" name="grade" placeholder="Masukan Grade Nilai Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ket</label>
                            <input class="form-control" type="text" name="ket" placeholder="Keterangan">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bulan Proses</label>
                            <input class="form-control" type="text" name="bln_proses" placeholder="Bulan Proses">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stat REC</label>
                            <input class="form-control" type="text" name="stat_rec" placeholder="Stat REC">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal </label>
                            <input class="form-control" type="date" name="tgl" placeholder="Tanggal">
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
        <?php foreach ($tsdm03->result_array() as $c) { ?>
        <div id="edit<?php echo $c['id_sdm03'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data SDM 03</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <?php $attributes = array('id' => 'regForm');
                        echo form_open('', $attributes); ?>
                        <input type="hidden" name="id_sdm03" value="<?php echo $c['id_sdm03'] ?>">
                        <div class="form-group">
                            <label class="control-label">NPP</label>
                            <input class="form-control" type="number" name="npp" placeholder="NPP" value="<?php echo $c['npp'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Urut</label>
                            <input class="form-control" type="number" name="no_urut" placeholder="Masukan No Urut Anda" value="<?php echo $c['no_urut'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tingkat Pendidikan</label>
                            <input class="form-control" type="text" name="tk_pend" placeholder="Masukan Tingkat Pendidikan Anda" value="<?php echo $c['tk_pend'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kode Pendidikan</label>
                            <input class="form-control" type="text" name="kd_pend" placeholder="Masukan Kode Pendidikan Anda" value="<?php echo $c['kd_pend'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Sekolah</label>
                            <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Sekolah Anda" value="<?php echo $c['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kota </label>
                            <input class="form-control" type="text" name="kota" placeholder="Masukan Kota Sekolah Anda" value="<?php echo $c['kota'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status Akreditasi</label>
                            <input class="form-control" type="text" name="st_akred" placeholder="Masukan Status Akreditasi Sekolah Anda" value="<?php echo $c['st_akred'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">DNLN</label>
                            <input class="form-control" type="text" name="dnln" placeholder="Masukan DNLN Anda" value="<?php echo $c['dnln'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tahun Awal</label>
                            <input class="form-control" type="number" name="thn_awal" placeholder="Masukan Tahun Awal Sekolah" value="<?php echo $c['thn_awal'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tahun Akhir</label>
                            <input class="form-control" type="number" name="thn_akhir" placeholder="Masukan Tahun Akhir Sekolah" value="<?php echo $c['thn_akhir'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status Lulus</label>
                            <input class="form-control" type="text" name="st_lulus" placeholder="Masukan Status Lulus Anda" value="<?php echo $c['st_lulus'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Ijasah</label>
                            <input class="form-control" type="number" name="no_ijasah" placeholder="Masukan No Ijasah Anda" value="<?php echo $c['no_ijasah'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Ijasah</label>
                            <input class="form-control" type="date" name="tgl_ijasah" placeholder="Masukan Tanggal Ijasah Anda" value="<?php echo $c['tgl_ijasah'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nilai</label>
                            <input class="form-control" type="number" name="nilai" placeholder="Masukan Nilai Ijasah Anda" value="<?php echo $c['nilai'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Grade</label>
                            <input class="form-control" type="text" name="grade" placeholder="Masukan Grade Nilai Anda" value="<?php echo $c['grade'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Ket</label>
                            <input class="form-control" type="text" name="ket" placeholder="Keterangan" value="<?php echo $c['ket'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bulan Proses</label>
                            <input class="form-control" type="text" name="bln_proses" placeholder="Bulan Proses" value="<?php echo $c['bln_proses'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stat REC</label>
                            <input class="form-control" type="text" name="stat_rec" placeholder="Stat REC" value="<?php echo $c['stat_rec'] ?>">
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

        <!-- Modal Delet-->
        <?php foreach ($tsdm03->result_array() as $c) { ?>
        <div id="delet<?php echo $c['id_sdm03'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus Data SDM 03</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/Admin/delet_sdm03' ?>">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus <b><?php echo $c['npp'] . " | " . $c['nama'] ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_sdm03" value="<?php echo $c['id_sdm03'] ?>">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <?php 
    } ?>
        <!-- End Modal Delet-->

        <footer>
            <! -- footer area start-->
                <?php $this->load->view('template/footer') ?>
                <! -- footer area end-->
        </footer>
    </main>

    <!-- Main Menu area start-->
    <?php $this->load->view('template/script') ?>
    <!-- Main Menu area End-->

    <script>
        function masuk(kd_pend,nm_pend) {
            document.getElementById('kode_obat').value = kode_obat;
            document.getElementById('nama_obat').value = nama_obat;
            document.getElementById('jenis_obat').value = jenis_obat;
            document.getElementById('harga').value = harga;
            document.getElementById('stok').value = jumlah;
            document.getElementById('jumlah').max = jumlah; // ini berfungsi mengisi value  yang ber id textbox
            $("#lookup").modal('hide');
            } // ini berfungsi untuk menyembunyikan modal
    </script>

</body>

</html>
<?php 
}
$this->session->unset_userdata("status_insert"); ?> 