<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "From Input Data Keluarga karyawan";
        $this->load->view('template/head', $data);
        ?>

    </head>

    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/Admin/in_admin">SIMPEG</a>

            <?php $this->load->view('template/header') ?>

        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_admin') ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-th-list"></i> Data Keluarga karyawan</h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Tabel Kepegawaian</li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/sdm02"> Data Keluarga karyawan</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <?= form_open('admin/tabel_sdm/in_sdm02'); ?>
                        <h3 class="tile-title">Form Input Data Keluarga karyawan</h3>
                        <?= $this->session->userdata('status_insert'); ?>
                        <hr align="right" color="black">
                        <div class="tile-body">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">NPP</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="npp" id="npp" placeholder="NPP" pattern=".{14}" title="Masukkan NPP 14 Karakter dan Tidak Boleh Kosong!!!" required><small class="form-text text-danger" id="npp_error_message"></small>
                                    </div>
                                </div>
                                <!-- <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No Urut</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="no_urut" placeholder="Masukan No Urut Anda">
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Nama Panjang</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Panjang Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Hubungan keluarga</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="hbg_klg">
                                            <optgroup label="Pilih Hubungan Keluarga">
                                                <option value="">---PILIH---</option>
                                                <option value="I">Istri</option>
                                                <option value="S">Suami</option>
                                                <option value="K">Anak Kandung</option>
                                                <option value="A">Anak Angkat</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal Lahir</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" name="tgl_lhr" placeholder="Masukan Tanggal Lahir Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kota Lahir</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="kota_lhr" placeholder="Masukan Nama Kota Lahir Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Negara Lahir</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="ngr_lhr" placeholder="Masukan Nama Negara Lahir Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Jenis Kelamin</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="kelamin" placeholder="Masukan Jenis Kelamin Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Golongan Darah</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="gol_darah" placeholder="Masukan Golongan Darah Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Agama</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="agama" id="exampleSelect1">
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
                                    <label class="control-label col-md-2 text-right">Tingkat Pendidikan</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="tk_pend" placeholder="Masukan Tingkat Pendidikan Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Status Sipil</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="st_sipil" id="exampleSelect1">
                                            <option value="">---PILIH---</option>
                                            <option value="T">TIDAK KAWIN</option>
                                            <option value="K">KAWIN</option>
                                            <option value="J">JANDA</option>
                                            <option value="D">DUDA</option>
                                            <option value="L">LAIN-LAIN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Status Kerja</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="st_kerja" placeholder="Masukan Status Kerja Anda Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal Nikah</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" name="tgl_nkh" placeholder="Masukan Tanggal Nikah Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal Cerai</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" name="tgl_cerai" placeholder="Masukan Tanggal Cerai Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal Meninggal</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" name="tgl_mgl" placeholder="Masukan Tanggal Meninggal Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Alamat</label>
                                    <div class="col-md-6">
                                        <textarea class="form-control" rows="2" name="alamat" placeholder="Masukan Alamat Anda"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No KK</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="no_kk" placeholder="Masukan No KK Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No Nik</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="nik" placeholder="Masukan No Nik Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No BPJS</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="no_bpjs" placeholder="Masukan No BPJS Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Bulan Proses</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Stat REC</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="stat_rec" placeholder="Masukan Stat REC">
                                    </div>
                                </div>
                            </form>
                            <div class="tile-footer row">
                                <div class="col-md-7"></div>
                                <div class="col-md-5">
                                    <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-secondary" href="<?php echo base_url() ?>index.php/admin/kembali/out_sdm02"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Kembali</a>
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
        <?php $this->load->view('template/script') ?>
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
<?php } ?>