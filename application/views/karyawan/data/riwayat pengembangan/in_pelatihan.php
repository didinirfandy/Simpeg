<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "Form Input Pelatihan";
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
                    <h1><i class="fa fa-desktop"></i> Pelatihan </h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Pengembangan</li>
                    <li class="breadcrumb-item">Pelatihan</li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/karyawan/data/riwayat pengembangan/in_pelatihan">Form Input Pelatihan</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <?= form_open_multipart('Karyawan/karyawan/plthn_action'); ?>
                        <h3 class="tile-title" class="fa fa-database">Form Input Pelatihan</h3>
                        <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                        <hr align="right" color="black">
                        <div class="tile-body">
                            <form class="form-horizontal">
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">NPP</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" class="form-control" name="npp" value="<?= $this->session->userdata('status_login_username'); ?>" placeholder="<?= $this->session->userdata('status_login_username'); ?>" Readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No Urut</label>
                                    <div class="col-md-6">
                                        <?php $no = $this->Model_karyawan->get_sdm04_no($pela[0]['no_urut']);
                                        foreach ($no as $piu) { ?>
                                            <input class="form-control" type="text" class="form-control" name="no_urut" value="<?php if ($piu['no_urut'] < 10) {
                                                                                                                                    echo 0;
                                                                                                                                    echo $piu['no_urut'] + 1;
                                                                                                                                } else {
                                                                                                                                    echo $piu['no_urut'] + 1;
                                                                                                                                } ?>" Readonly>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kode Pendidikan</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="kd_pend">
                                            <optgroup label="Pilih Kode Pendidikan">
                                                <option value="">---PILIH---</option>
                                                <?php foreach ($pend as $q) { ?>
                                                    <option value="<?= $q['kd_pend'] ?>">(<?= $q['kd_pend'] ?>) -> <?= $q['nama'] ?></option>
                                                <?php } ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Nama Tempat Pelatihan</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" class="form-control" name="nama" placeholder="Masukan Nama Tempat Pelatihan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Judul Pelatihan</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" class="form-control" name="ket" placeholder="Masukan Judul Pelatihan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">DNLN</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" class="form-control" name="dnln" placeholder="Masukan DNLN">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal Awal</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" class="form-control" name="tgl_awal" placeholder="Masukan Tanggal Awal Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal Akhir</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" class="form-control" name="tgl_akhir" placeholder="Masukan Tanggal Akhir Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Nomor Sertifikat</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" class="form-control" name="no_sert" placeholder="Masukan Nomor Sertifikat Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal Sertifikat</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" class="form-control" name="tgl_sert" placeholder="Masukan Tanggal Sertifikat Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Nilai</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" class="form-control" name="nilai" placeholder="Masukan Nilai Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Grade</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" class="form-control" name="grade" placeholder="Masukan Grade Anda">
                                    </div>
                                </div>
                                <input type="hidden" name="bln_proses" value="0">
                                <input type="hidden" name="stat_rec" value="0">
                                <h5>Upload Bukti Pelatihan</h5><br>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Image</label>
                                    <div class="col-md-6">
                                        <input required class="form-control" type="file" name="image">
                                        <small class="form-text text-muted"><strong> Format Gambar = jpg/jpeg/png </strong></small>
                                    </div>
                                </div>
                                <input type="hidden" name="valid" value="1">
                                <input type="hidden" name="status" value="1">
                            </form>
                            <div class="modal-footer row">
                                <div class="col-md-7"></div>
                                <div class="col-md-5">
                                    <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-fw fa-floppy-o"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-secondary" href="<?= base_url() ?>index.php/Karyawan/riwayat_pengembangan/pelatihan"><i class="fa fa-fw fa-arrow-left"></i>Kembali</a>
                                </div>
                            </div>
                        </div>
                        <hr align="right" color="black">
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
            <footer>
                <! -- footer area start-->
                    <?php $this->load->view('template/footer') ?>
                    <! -- footer area end-->
            </footer>
        </main>

        <!-- Main Menu area start-->
        <?php $this->load->view('template/script') ?>

        <script type="text/javascript">
            const statusgagal = $('.status-gagal').data('statusgagal');
            // console.log(statusgagal);
            if (statusgagal) {
                swal({
                    title: "Gagal " + statusgagal,
                    text: "INPUT KEMBALI DATA ANDA DENGAN BENAR",
                    type: "error",
                    timer: 10000,
                    showConfirmButton: false
                });
            }
        </script>
        <!-- Main Menu area End-->

    </body>

    </html>
<?php } ?>