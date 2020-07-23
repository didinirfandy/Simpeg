<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "From Input Data Kepegawaian";
        $this->load->view('template/head', $data);
        ?>

    </head>

    <body class="app sidebar-mini rtl" id="simpan">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/Admin/in_admin">SIMPEG</a>

            <?php $this->load->view('template/header_ad') ?>

        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_admin') ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-user-circle"></i> Data Kepegawaian</h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Tabel Kepegawaian</li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm01"> Data Kepegawaian</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <?= form_open('admin/tabel_sdm/in_sdm01'); ?>
                        <h3 class="tile-title">Form Input Data Kepegawaian</h3>
                        <?= $this->session->userdata('status_insert'); ?>
                        <hr align="right" color="black">
                        <div class="tile-body">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">NPP</label>
                                    <div class="col-md-6">
                                        <input class="form-control textbox" type="text" name="npp" id="npp" placeholder="Masukan NPP" pattern=".{14}" title="Masukkan NPP 14 Karakter dan Tidak Boleh Kosong!!!" required><small class="form-text text-danger" id="npp_error_message"></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Nama Lengkap</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Lengkap">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Nama Panggilan</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="nm_pgl" placeholder="Masukan Nama Panggilan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Gelar Depan </label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="glr_dpn" placeholder="Masukan Gelar Depan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Gelar Belakang </label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="glr_blk" placeholder="Masukan Gelar Belakang">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kota Lahir</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="kota_lhr" placeholder="Masukan Nama Kota Lahir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Provinsi Lahir</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="prov_lhr" placeholder="Masukan Nama Provinsi Lahir ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Negara Lahir</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="ngr_lhr" placeholder="Masukan Nama Negara Lahir ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal Lahir</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" name="tgl_lhr" placeholder="Masukan Tanggal Lahir ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Jenis Kelamin</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="j_kelamin">
                                            <optgroup label="Pilih Jenis Kelamin">
                                                <option value="">---PILIH---</option>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Golongan Darah</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="gol_darah">
                                            <optgroup label="Pilih Golongan Darah">
                                                <option value="">---PILIH---</option>
                                                <option value="O">O</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="AB">AB</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Agama</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="agama">
                                            <optgroup label="Pilih Agama">
                                                <option value="">---PILIH---</option>
                                                <option value="I">ISLAM</option>
                                                <option value="P">PROTESTAN</option>
                                                <option value="K">KATOLIK</option>
                                                <option value="H">HINDU</option>
                                                <option value="B">BUDHA</option>
                                                <option value="L">LAIN-LAIN</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal Masuk</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" name="tgl_masuk" placeholder="Masukan Tanggal Masuk ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Status Sipil</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="st_sipil">
                                            <optgroup label="Pilih Status Sipil">
                                                <option value="">---PILIH---</option>
                                                <option value="T">TIDAK KAWIN</option>
                                                <option value="K">KAWIN</option>
                                                <option value="J">JANDA</option>
                                                <option value="D">DUDA</option>
                                                <option value="L">LAIN-LAIN</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Jumlah Anak</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="jmlh_ank" placeholder="Masukan Jumlah Anak ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No Astek</label>
                                    <div class="col-md-6">
                                        <span class="text-danger" id="error_no_astek"></span>
                                        <input class="form-control" type="number" name="no_astek" placeholder="Masukan No Astek ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No Pensiun</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="no_pens" placeholder="Masukan No Pensiun ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No NPWP</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="npwp" placeholder="Masukan No NPWP ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Alamat Tinggal</label>
                                    <div class="col-md-6">
                                        <span class="text-danger" id="error_alamat_tgl"></span>
                                        <textarea class="form-control" rows="3" name="alamat_tgl" placeholder="Masukan Alamat Tinggal"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kode Lokasi</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="kd_lokasi" placeholder="Masukan Kode Lokasi ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kode Pos</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="kode_pos" placeholder="Masukan Kode Pos ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No Telepon</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="no_telp" placeholder="Masukan No Telepon ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No NIK</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="no_nik" placeholder="Masukan No NIK ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No KK</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="no_kk" placeholder="Masukan No KK ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No BPJS</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="no_bpjs" placeholder="Masukan No BPJS ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">User Id</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="user_id" placeholder="Masukan User Id ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Bln Proses</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bln Proses ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tinggal</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="tinggal" value="1" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Keterangan</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="ket" placeholder="Masukan Keterangan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal Pensiun</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" name="tglpen" placeholder="Masukan Tanggal Pensiun">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">NO SK Pensiun</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="noskpen" placeholder="Masukan NO SK Pensiun">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal SK Pensiun</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" name="tglskpen" placeholder="Masukan Tanggal SK Pensiun">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Jenis Pensiun</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="jns_pen" placeholder="Masukan Jenis Pensiun">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Stat Rec</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="stat_rec" value="0" readonly>
                                    </div>
                                </div>
                                <h4>Input Akun Karyawan</h4><br><br>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Nama Lengkap</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="nama1" placeholder="Masukan Nama Lengkap">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">NPP</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="username" placeholder="Masukan Npp"><strong><small class="form-text text-muted">Npp Akan Menjadi Username</small></strong>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Password</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="pass" value="123456" readonly>
                                    </div>
                                </div>
                                <input type="hidden" name="image" value="default.jpg">
                                <input type="hidden" name="status" value="0">
                                <input type="hidden" name="valid" value="1"><br><br>
                            </form>
                            <div class="tile-footer row">
                                <div class="col-md-7"></div>
                                <div class="col-md-5">
                                    <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-secondary" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm01"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Kembali</a>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
            <footer>
                <!-- footer area start-->
                <?php $this->load->view('template/footer') ?>
                <!-- footer area end-->
            </footer>
        </main>

        <!-- Main Menu area start-->
        <?php $this->load->view('template/script'); ?>
        <!-- Main Menu area End-->

        <script type="text/javascript">
            $(document).ready(function() {

                $("#npp_error_message").hide();
                var error_npp = false;
                $("#npp").focusout(function() {
                    check_npp()
                });

                function check_npp() {
                    var npp_length = $("#npp").val().length;

                    if (npp_length <= 14 || npp_length <= 0) {
                        $("#npp_error_message").html("Masukkan NPP 14 Karakter dan Tidak Boleh Kosong!!!");
                        $("#npp_error_message").show();
                        error_npp = true;
                    } else {
                        $("#npp_error_message").hide();
                    }
                }
            });
        </script>

    </body>

    </html>
<?php
} ?>