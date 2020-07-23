<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "From Edit Biodata Diri";
        $this->load->view('template/head', $data);
        ?>

    </head>

    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="index.php/Karyawan/in_kar">SIMPEG</a>

            <?php $this->load->view('template/header') ?>

        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_kar') ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-address-book"></i> Biodata Diri</h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Data Diri</li>
                    <li class="breadcrumb-item">Biodata Diri</li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/karyawan/data/data diri/bio_diri">Form Edit Biodata Diri</a></li>
                </ul>
            </div>
            <!-- Swetalert Gagal -->
            <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <?php foreach ($t_biodiri as $k) { ?>
                            <?= form_open_multipart('Karyawan/karyawan/diri_action'); ?>
                            <h3 class="tile-title">Form Edit Biodata diri</h3>
                            <hr align="right" color="black">
                            <div class="tile-body">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">NPP</label>
                                        <div class="col-md-6">
                                            <input class="form-control textbox" type="text" name="npp" value="<?= $this->session->userdata('status_login_username'); ?>" placeholder="<?= $this->session->userdata('status_login_username'); ?>" Readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Nama Lengkap</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="nama" value="<?= $k['nama'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Nama Panggilan</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="nm_pgl" value="<?= $k['nm_pgl'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Gelar Depan </label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="glr_dpn" value="<?= $k['glr_dpn'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Gelar Belakang </label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="glr_blk" value="<?= $k['glr_blk'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Kota Lahir</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="  " name="kota_lhr" value="<?= $k['kota_lhr'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Provinsi Lahir</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="prov_lhr" value="<?= $k['prov_lhr'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Negara Lahir</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="ngr_lhr" value="<?= $k['ngr_lhr'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Tanggal Lahir</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" name="tgl_lhr" value="<?= $k['tgl_lhr'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Jenis Kelamin</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="j_kelamin">
                                                <?php $klmn = $this->Model_karyawan->get_jenis_kelamin($k['j_kelamin']);
                                                foreach ($klmn as $j) { ?>
                                                    <optgroup label="Pilih Jenis Kelamin">
                                                        <option value="<?= $k['j_kelamin'] ?>"><?= $j['nm_kelamin'] ?></option>
                                                        <option value="L">LAKI-LAKI</option>
                                                        <option value="P">PEREMPUAN</option>
                                                    </optgroup>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Golongan Darah</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="gol_darah">
                                                <optgroup label="Pilih Golongan Darah">
                                                    <option value="<?= $k['gol_darah'] ?>"><?= $k['gol_darah'] ?></option>
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
                                                <?php $agm = $this->Model_karyawan->get_agama($k['agama']);
                                                foreach ($agm as $a) { ?>
                                                    <optgroup label="Pilih Agama">
                                                        <option value="<?= $k['agama'] ?>"><?= $a['nm_agama'] ?></option>
                                                        <option value="I">ISLAM</option>
                                                        <option value="P">PROTESTAN</option>
                                                        <option value="K">KATOLIK</option>
                                                        <option value="H">HINDU</option>
                                                        <option value="B">BUDHA</option>
                                                        <option value="L">LAIN-LAIN</option>
                                                    </optgroup>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Tanggal Masuk</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" name="tgl_masuk" value="<?= $k['tgl_masuk'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Status Sipil</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="st_sipil">
                                                <optgroup label="Pilih Status Sipil">
                                                    <?php $pil = $this->Model_karyawan->get_sipil($k['st_sipil']);
                                                    foreach ($pil as $p) { ?>
                                                        <option value="<?= $k['st_sipil'] ?>"><?= $p['nm_sipil'] ?></option>
                                                        <option value="T">TIDAK KAWIN</option>
                                                        <option value="K">KAWIN</option>
                                                        <option value="J">JANDA</option>
                                                        <option value="D">DUDA</option>
                                                        <option value="L">LAIN-LAIN</option>
                                                    <?php } ?>
                                                </optgroup>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Jumlah Anak</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="jmlh_ank" value="<?= $k['jmlh_ank'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">No Astek</label>
                                        <div class="col-md-6">
                                            <span class="text-danger" id="error_no_astek"></span>
                                            <input class="form-control" type="number" name="no_astek" value="<?= $k['no_astek'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">No Pensiun</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="no_pens" value="<?= $k['no_pens'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">No NPWP</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="npwp" value="<?= $k['npwp'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Alamat Tinggal</label>
                                        <div class="col-md-6">
                                            <span class="text-danger" id="error_alamat_tgl"></span>
                                            <textarea class="form-control" rows="2" name="alamat_tgl" value="<?= $k['alamat_tgl'] ?>"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Kode Lokasi</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" name="kd_lokasi" value="<?= $k['kd_lokasi'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Kode Pos</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" name="kode_pos" value="<?= $k['kode_pos'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">No Telepon</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" name="no_telp" value="<?= $k['no_telp'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">No NIK</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" name="no_nik" value="<?= $k['no_nik'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">No KK</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" name="no_kk" value="<?= $k['no_kk'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">No BPJS</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="number" name="no_bpjs" value="<?= $k['no_bpjs'] ?>">
                                        </div>
                                    </div>
                                    <input type="hidden" name="valid" value="2">
                                    <input type="hidden" name="status" value="1">
                                    <h5>Upload Bukti</h5><br>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Image</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="file" name="image">
                                            <small class="form-text text-muted"><strong> Format Gambar = jpg/jpeg/png </strong></small>
                                        </div>
                                    </div>
                                </form>
                                <div class="modal-footer row">
                                    <div class="col-md-7"></div>
                                    <div class="col-md-5">
                                        <button class="btn btn-primary" name="edit" type="submit"><i class="fa fa-fw fa-floppy-o"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-secondary" href="<?= base_url() ?>index.php/karyawan/data_diri/biodiri"><i class="fa fa-fw fa-arrow-left"></i>Kembali</a>
                                    </div>
                                </div>
                            </div>
                            <hr align="right" color="black">
                            <?= form_close() ?>
                        </div>
                    </div>
                <?php } ?>
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
            const statusgagal = $('.status-gagal').data('statusgagal');
            console.log(statusgagal);
            // if (statusgagal) {
            //     swal({
            //         title: "Gagal " + statusgagal,
            //         text: "EDIT KEMBALI DATA ANDA DENGAN BENAR",
            //         type: "error",
            //         timer: 10000,
            //         showConfirmButton: false
            //     });
            // }
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