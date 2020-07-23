<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "Form Edit Pelatihan";
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
                    <li class="breadcrumb-item">Pelatihan</li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/karyawan/data/riwayat pengembangan/ed_pelatihan">Form Edit Pelatihan</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <?php foreach ($no as $p) { ?>
                            <?= form_open_multipart('Karyawan/karyawan/plthn_action'); ?>
                            <h3 class="tile-title" class="fa fa-database">Form Edit Pelatihan</h3>
                            <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                            <hr align="right" color="black">
                            <div class="tile-body">
                                <form class="form-horizontal">
                                    <input type="hidden" name="id_sdm04" value="<?= $p['id_sdm04'] ?>">
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
                                            <input class="form-control" type="text" class="form-control" name="no_urut" value="<?= $p['no_urut'] ?>" Readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Kode Pendidikan</label>
                                        <div class="col-md-6">
                                            <select class="form-control" name="kd_pend">
                                                <optgroup label="Pilih Kode Pendidikan">
                                                    <?php $ini = $this->Model_karyawan->get_pend($p['kd_pend']);
                                                    foreach ($ini as $i) { ?>
                                                        <option value="<?= $p['kd_pend'] ?>">(<?= $p['kd_pend'] ?>) --> <?= $i['nama'] ?></option>
                                                    <?php } ?>
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
                                            <input class="form-control" type="text" class="form-control" name="nama" value="<?= $p['nama'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Judul Pelatihan</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" class="form-control" name="ket" value="<?= $p['ket'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">DNLN</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" class="form-control" name="dnln" value="<?= $p['dnln'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Tanggal Awal</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" class="form-control" name="tgl_awal" value="<?= $p['tgl_awal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Tanggal Akhir</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" class="form-control" name="tgl_akhir" value="<?= $p['tgl_akhir'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Nomor Sertifikat</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" class="form-control" name="no_sert" value="<?= $p['no_sert'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Tanggal Sertifikat</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" class="form-control" name="tgl_sert" value="<?= $p['tgl_sert'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Nilai</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" class="form-control" name="nilai" value="<?= $p['nilai'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Grade</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" class="form-control" name="grade" value="<?= $p['grade'] ?>">
                                        </div>
                                    </div>
                                    <input type="hidden" name="bln_proses" value="0">
                                    <input type="hidden" name="stat_rec"   value="0">
                                    <input type="hidden" name="valid"      value="2">
                                    <input type="hidden" name="status"     value="1">
                                    <h5>Upload Bukti Sertifikat</h5><br>
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
                                        <a class="btn btn-secondary" href="<?= base_url() ?>index.php/Karyawan/riwayat_pengembangan/pelatihan"><i class="fa fa-fw fa-arrow-left"></i>Kembali</a>
                                    </div>
                                </div>
                            </div>
                            <hr align="right" color="black">
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
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