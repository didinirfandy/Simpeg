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
        <?php $this->load->view('template/header_ad') ?>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <?php $this->load->view('template/menu_admin') ?>
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> SDM 02</h1>
                <p></p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tabel SDM</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/sdm02"></a></li> <!-- ini juga ganti sesuaikan -->
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h4 class="title">Data SDM 02</h4>
                        <?php echo $this->session->userdata("status_insert") ?>
                    </div>
                    <div class="row">
                        <div class="form-group mx-sm-3 mb-2">
                            <?php echo form_open(''); ?>
                            <input class="form-control" type="text" aria-describedby="basic-addon2" name="npp_cari" placeholder=" Masukan NPP....." required><small class="form-text text-muted" id="emailHelp">Masukkan NPP yang akan anda cari</small>
                        </div>
                        <button class="btn btn-success mb-5" type="submit" name="cari"><i class="fa fa-search"></i>Cari</button>&nbsp;&nbsp;&nbsp;
                            <?php echo form_close() ?>
                        <button type="button" class="btn btn-primary icon-btn mb-5" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i>Add Item </button>                        
                    </div>
                    <hr align="right" color="black" >
                    <div class="tile">
                        <table class="table table-hover table-bordered" id="sampleTable" >
                            <thead>
                                <tr>
                                    <th>NPP</th>
                                    <th>NO URUT</th>
                                    <th>NAMA</th>
                                    <th>HUBUNGAN KELUARGA</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th>KOTA LAHIR</th>
                                    <th>NEGARA LAHIR</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>GOLONGAN DARAH</th>
                                    <th>AGAMA</th>
                                    <th>TINGKAT PENDIDIKAN</th>
                                    <th>TINGKAT SIPIL</th>
                                    <th>STATUS KERJA</th>
                                    <th>TANGGAL NIKAH</th>
                                    <th>TANGGAL CERAI</th>
                                    <th>TANGGAL MENIGGAL</th>
                                    <th>ALAMAT</th>
                                    <th>NO KARTU KELUARGA</th>
                                    <th>NIK</th>
                                    <th>NO BPJS</th>
                                    <th>BULAN PROSES</th>
                                    <th>STAT REC</th>
                                    <th>TANGGAL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_POST['cari'])){
                                foreach ($cari as $b) {?>
                                <tr>
                                    <td><?php echo $b['npp']?></td>
                                    <td><?php echo $b['no_urut']?></td>
                                    <td><?php echo $b['nama']?></td>
                                    <td><?php echo $b['hbg_klg']?></td>
                                    <td><?php echo $b['tgl_lhr']?></td>
                                    <td><?php echo $b['kota_lhr']?></td>
                                    <td><?php echo $b['ngr_lhr']?></td>
                                    <td><?php echo $b['kelamin']?></td>
                                    <td><?php echo $b['gol_darah']?></td>
                                    <td><?php echo $b['agama']?></td>
                                    <td><?php echo $b['tk_ped']?></td>
                                    <td><?php echo $b['st_sipil']?></td>
                                    <td><?php echo $b['st_kerja']?></td>
                                    <td><?php echo $b['tgl_nkh']?></td>
                                    <td><?php echo $b['tgl_cerai']?></td>
                                    <td><?php echo $b['tgl_mgl']?></td>
                                    <td><?php echo $b['alamat']?></td>
                                    <td><?php echo $b['no_kk']?></td>
                                    <td><?php echo $b['nik']?></td>
                                    <td><?php echo $b['no_bpjs']?></td>
                                    <td><?php echo $b['bln_proses']?></td>
                                    <td><?php echo $b['stat_rec']?></td>
                                    <td><?php echo $b['tgl'] ?></td>
                                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $b['id_sdm02'] ?>"><i class="fa fa-pencil"></i>Edit   </button>&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet<?php echo $b['id_sdm02'] ?>"><i class="fa fa-times"></i>Delet   </button>
                                    </td>
                                </tr>
                                <?php }
                                }
                                else{
                                echo "<tr><td colspan='24' class='text-center'>Data Not Exists</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal add -->
        <div id="add" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Input Data SDM 02</h4>
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
                            <label class="control-label">Nama Panjang</label>
                            <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Panjang Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Hubungan Keluarga</label>
                            <select class="form-control" name="hbg_klg" id="exampleSelect1">
                                <option value="">Pilih</option>
                                <option value="I">Istri</option>
                                <option value="S">Suami</option>
                                <option value="K">Anak Kandung</option>
                                <option value="A">Anak Angkat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            <input class="form-control" type="date" name="tgl_lhr" placeholder="Masukan Tanggal Lahir Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kota Lahir</label>
                            <input class="form-control" type="text" name="kota_lhr" placeholder="Masukan Nama Kota Lahir Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Negara Lahir</label>
                            <input class="form-control" type="text" name="ngr_lhr" placeholder="Masukan Nama Negara Lahir Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Kelamin</label>
                            <select class="form-control" name="kelamin" id="exampleSelect1">
                                <option value="">Pilih</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Golongan Darah</label>
                            <select class="form-control" name="gol_darah" id="exampleSelect1">
                                <option value="">Pilih</option>
                                <option value="O">O</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <select class="form-control" name="agama" id="exampleSelect1">
                                <option value="">Pilih</option>
                                <option value="I">ISLAM</option>
                                <option value="P">PROTESTAN</option>
                                <option value="K">KATOLIK</option>
                                <option value="H">HINDU</option>
                                <option value="B">BUDHA</option>
                                <option value="L">LAIN-LAIN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tingkat Pendidikan</label>
                            <select class="form-control" name="tk_ped" id="exampleSelect1">
                                <option value="">Pilih</option>
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status Sipil</label>
                            <select class="form-control" name="st_sipil" id="exampleSelect1">
                                <option value="">Pilih</option>
                                <option value="T">TIDAK KAWIN</option>
                                <option value="K">KAWIN</option>
                                <option value="J">JANDA</option>
                                <option value="D">DUDA</option>
                                <option value="L">LAIN-LAIN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status Kerja</label>
                            <input class="form-control" type="text" name="st_kerja" placeholder="Masukan Status Kerja Anda Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Nikah</label>
                            <input class="form-control" type="date" name="tgl_nkh" placeholder="Masukan Tanggal Nikah Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Cerai</label>
                            <input class="form-control" type="date" name="tgl_cerai" placeholder="Masukan Tanggal Cerai Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Meninggal</label>
                            <input class="form-control" type="date" name="tgl_mgl" placeholder="Masukan Tanggal Meninggal Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <textarea class="form-control" rows="2" name="alamat" placeholder="Masukan Alamat Anda"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">No KK</label>
                            <input class="form-control" type="number" name="no_kk" placeholder="Masukan No KK Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Nik</label>
                            <input class="form-control" type="number" name="nik" placeholder="Masukan No Nik Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No BPJS</label>
                            <input class="form-control" type="number" name="no_bpjs" placeholder="Masukan No BPJS Anda">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bulan Proses</label>
                            <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses Anda">
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
        <!-- End Modal add -->

        <?php  if(isset($_POST['cari']))
        foreach ($cari as $b) { ?>
        <!-- Modal edit -->
        <div id="edit<?php echo $b['id_sdm02'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data SDM 02</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <?php $attributes = array('id' => 'regForm');
                        echo form_open('', $attributes); ?>
                        <input type="hidden" name="id_sdm02" value="<?php echo $b['id_sdm02'] ?>">
                        <div class="form-group">
                            <label class="control-label">NPP</label>
                            <input class="form-control" type="number" name="npp" placeholder="NPP" value="<?php echo $b['npp'] ?>">
                        </div>
                        <div class=" form-group">
                            <label class="control-label">Nama Panjang</label>
                            <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Panjang Anda" value="<?php echo $b['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Hubungan Keluarga</label>
                            <select class="form-control" name="hbg_klg" id="exampleSelect1">
                                <option value="<?php echo $b['hbg_klg']?>"><?php echo $b['hbg_klg']?></option>
                                <option value="I">Istri</option>
                                <option value="S">Suami</option>
                                <option value="K">Anak Kandung</option>
                                <option value="A">Anak Angkat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            <input class="form-control" type="date" name="tgl_lhr" placeholder="Masukan Tanggal Lahir Anda" value="<?php echo $b['tgl_lhr'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kota Lahir</label>
                            <input class="form-control" type="text" name="kota_lhr" placeholder="Masukan Nama Kota Lahir Anda" value="<?php echo $b['kota_lhr'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Negara Lahir</label>
                            <input class="form-control" type="text" name="ngr_lhr" placeholder="Masukan Nama Negara Lahir Anda" value="<?php echo $b['ngr_lhr'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Kelamin</label>
                            <select class="form-control" id="exampleSelect1">
                                <option value="<?php echo $b['kelamin'] ?>"><?php echo $b['kelamin'] ?></option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Golongan Darah</label>
                            <select class="form-control" name="gol_darah" id="exampleSelect1">
                                <option value="<?php echo $b['gol_darah'] ?>"><?php echo $b['gol_darah'] ?></option>
                                <option value="O">O</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <select class="form-control" name="agama" id="exampleSelect1">
                                <option value="<?php echo $b['agama'] ?>"><?php echo $b['agama'] ?></option>
                                <option value="I">ISLAM</option>
                                <option value="P">PROTESTAN</option>
                                <option value="K" >KATOLIK</option>
                                <option value="H">HINDU</option>
                                <option value="B">BUDHA</option>
                                <option value="L">LAIN-LAIN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tingkat Pendidikan</label>
                            <select class="form-control" name="tk_ped" id="exampleSelect1">
                                <option value="<?php echo $b['tk_ped'] ?>"><?php echo $b['tk_ped'] ?></option>
                                <option value="0">TIDAK SEKOLAH/TDK TAMAT PENDIDIKAN DASAR</option>
                                <option value="1">TINGKAT PENDIDIKAN DASAR</option>
                                <option value="2">TINGKAT SEKOLAH LANJUTAN PERTAMA</option>
                                <option value="3">TINGKAT SEKOLAH LANJUTAN ATAS</option>
                                <option value="4">TINGKAT DIPLOMA-I</option>
                                <option value="5">TINGKAT DIPLOMA-II</option>
                                <option value="6">TINGKAT SARJANA MUDA/DIPLOMA-III</option>
                                <option value="7">TINGKAT SARJANA/DIPLOMA-IV</option>
                                <option value="8">TINGKAT MAGISTER/SPESIALIS-I</option>
                                <option value="9">TINGKAT DOKTOR/SPESIALIS-II</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tingkat Sipil</label>
                            <select class="form-control" name="st_sipil" id="exampleSelect1">
                                <option value="<?php echo $b['st_sipil'] ?>"><?php echo $b['st_sipil'] ?></option>
                                <option value="T">TIDAK KAWIN</option>
                                <option value="K">KAWIN</option>
                                <option value="J">JANDA</option>
                                <option value="D">DUDA</option>
                                <option value="L">LAIN-LAIN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status Kerja</label>
                            <input class="form-control" type="text" name="st_kerja" placeholder="Masukan Status Kerja Anda Anda" value="<?php echo $b['st_kerja'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Nikah</label>
                            <input class="form-control" type="date" name="tgl_nkh" placeholder="Masukan Tanggal Nikah Anda" value="<?php echo $b['tgl_nkh'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Cerai</label>
                            <input class="form-control" type="date" name="tgl_cerai" placeholder="Masukan Tanggal Cerai Anda" value="<?php echo $b['tgl_cerai'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Meninggal</label>
                            <input class="form-control" type="date" name="tgl_mgl" placeholder="Masukan Tanggal Meninggal Anda" value="<?php echo $b['tgl_mgl'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <textarea class="form-control" rows="2" name="alamat" placeholder="Masukan Alamat Anda" value="<?php echo $b['alamat'] ?>"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">No KK</label>
                            <input class="form-control" type="number" name="no_kk" placeholder="Masukan No KK Anda" value="<?php echo $b['no_kk'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Nik</label>
                            <input class="form-control" type="number" name="nik" placeholder="Masukan No Nik Anda" value="<?php echo $b['nik'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No BPJS</label>
                            <input class="form-control" type="number" name="no_bpjs" placeholder="Masukan No BPJS Anda" value="<?php echo $b['no_bpjs'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bulan Proses</label>
                            <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses Anda" value="<?php echo $b['bln_proses'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stat REC</label>
                            <input class="form-control" type="text" name="stat_rec" placeholder="Masukan Stat REC" value="<?php echo $b['stat_rec'] ?>">
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

        <!-- Modal DELET -->
        <?php  if(isset($_POST['cari']))
        foreach ($cari as $b) { ?>
        <div id="delet<?php echo $b['id_sdm02'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Hapus Data SDM 02</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/Admin/delet_sdm02' ?>">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus <b><?php echo $b['npp'] . " | " . $b['nama'] ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_sdm02" value="<?php echo $b['id_sdm02'] ?>">
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
$this->session->unset_userdata("status_insert");
?> 