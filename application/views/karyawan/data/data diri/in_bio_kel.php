<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "From Input Biodata Keluarga";
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
                    <h1><i class="fa fa-address-book"></i> Biodata Keluarga</h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Data Diri</li>
                    <li class="breadcrumb-item">Biodata Keluarga</li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/karyawan/data/riwayat pendidikan/pend_formal">Form Input Biodata Keluarga</a></li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <?= form_open_multipart('Karyawan/karyawan/kel_action'); ?>
                        <h3 class="tile-title">Form Input Biodata Keluarga</h3>
                        <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                        <hr align="right" color="black">
                        <div class="tile-body">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">NPP</label>
                                    <div class="col-md-6">
                                        <input  class="form-control" type="text" class="form-control" name="npp" value="<?= $this->session->userdata('status_login_username'); ?>" placeholder="<?= $this->session->userdata('status_login_username'); ?>" Readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No Urut</label>
                                    <div class="col-md-6">
                                        <?php $no = $this->Model_karyawan->get_sdm02_no($kel[0]['no_urut']);
                                        foreach ($no as $piu) { ?>
                                            <input class="form-control" type="text" class="form-control" name="no_urut" id="no" value="<?php if ($piu['no_urut'] < 10) {
                                                                                                                                            echo 0;
                                                                                                                                            echo $piu['no_urut'] + 1;
                                                                                                                                        } else {
                                                                                                                                            echo $piu['no_urut'] + 1;
                                                                                                                                        } ?>" readonly>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Nama Lengkap</label>
                                    <div class="col-md-6">
                                        <input required class="form-control" type="text" class="form-control" name="nama" placeholder="Masukan Nama Lengkap" aria-describedby="nm_sklh">
                                        <small class="form-text text-muted" id="nm_sklh"><strong> Masukan Nama Lengkap Anda ex : Didin Irfandi Jekri Ikrawan </strong></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Hubungan keluarga</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="hbg_klg">
                                            <optgroup label="Pilih Hubungan Keluarga">
                                                <option value="">---PILIH---</option>
                                                <option value="I">ISTRI</option>
                                                <option value="S">SUAMI</option>
                                                <option value="K">ANAK KANDUNG</option>
                                                <option value="A">ANAK ANGKAT</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal Lahir</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" class="form-control" name="tgl_lhr" placeholder="Masukan Tanggal Lahir Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kota Lahir</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" class="form-control" name="kota_lhr" placeholder="Masukan Kota Lahir Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Negara Lahir</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" class="form-control" name="ngr_lhr" placeholder="Masukan Tahun Mulai Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Jenis Kelamin</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="kelamin">
                                            <optgroup label="Pilih Jenis Kelamin">
                                                <option value="">---PILIH---</option>
                                                <option value="L">LAKI-LAKI</option>
                                                <option value="P">PEREMPUAN</option>
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
                                    <label class="control-label col-md-2 text-right">Tingkat Pendidikan</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="tk_pend" id="tk_pend">
                                            <optgroup label="Pilih Tingkat Pendidikan">
                                                <option value="">---PILIH---</option>
                                                <?php foreach ($tkpend as $key) { ?>
                                                    <option value="<?= $key['tk_pend'] ?>"><?= $key['nm_tkpend'] ?></option>
                                                <?php  } ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Status Sipil</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="st_sipil">
                                            <option value="">Pilih</option>
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
                                        <input class="form-control" type="text" name="st_kerja" placeholder="Masukan Status Kerja Anda">
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
                                </div><br>
                                <input type="hidden" name="valid" value="1">
                                <input type="hidden" name="status" value="1">
                                <h5>Upload Bukti Akta Kelahiran</h5><br>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Image</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="file" name="image">
                                        <small class="form-text text-muted"><strong> Format Gambar = jpg/jpeg/png </strong></small>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-fw fa-floppy-o"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-secondary" href="<?= base_url() ?>index.php/karyawan/data_diri/biokel"><i class="fa fa-fw fa-arrow-left"></i>Kembali</a>
                                </div>
                            </div>
                        </div>
                        <hr align="right" color="black">
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
            <footer>
                <!-- footer area start-->
                <?php $this->load->view('template/footer'); ?>
                <!-- footer area end-->
            </footer>
        </main>

        <!-- Main Menu area start-->
        <?php $this->load->view('template/script'); ?>

        <script type="text/javascript">
            const statusgagal = $('.status-gagal').data('statusgagal');
            // console.log(statusgagal);
            if (statusgagal) {
                swal({
                    title: "Gagal " + statusgagal,
                    text: "INPUT KEMBALI DATA ANDA DENGAN BENAR",
                    type: "error",
                    timer: 8000,
                    showConfirmButton: false
                });
            }
        </script>
        <!-- Main Menu area End-->

    </body>

    </html>
<?php } ?>