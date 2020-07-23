<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "Biodata Diri";
        $this->load->view('template/head', $data);
        ?>

    </head>

    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="<?= base_url() ?>index.php/Karyawan/in_kar">SIMPEG</a>

            <?php $this->load->view('template/header') ?>

        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_kar') ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-address-book"></i> Biodata Diri </h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Data Diri</li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/Karyawan/data/data diri/bio_diri"> Biodata Diri</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h3 class="title">Biodata Diri Karyawan</h3>
                            <!-- Swetalert Berhasil -->
                            <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
                            <!-- Swetalert Gagal -->
                            <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                            <div class="btn-group">
                                <a class="btn btn-primary" href="<?= base_url(); ?>index.php/Karyawan/data_diri/ed_diri/<?= $this->session->userdata('status_login_username'); ?>"><i class="fa fa-lg fa-edit"></i>Edit</a>
                                <button class="btn btn-primary " data-toggle="modal" data-target="#myModal"><i class="fa fa-eye"></i>View</button>
                                <a class="btn btn-primary" href="<?= base_url(); ?>index.php/Tabel_CV/view_cv"><i class="fa fa-print"></i>Print CV</a>
                            </div>
                        </div>
                        <hr align="right" color="black">
                        <div class="row">
                            <div class="row user1">
                                <div class="col-sm-5"></div><br>
                                <div class="col-md-5">
                                    <div class="profile1">
                                        <div class="info">
                                            <?php
                                            $profil = $this->Model_karyawan->get_no_id();
                                            foreach ($profil as $p) { ?>
                                                <img class="user-img" src="<?= base_url(); ?>assets_application/assets/faces/<?= $p['image'] ?>">
                                            <?php } ?>
                                            <h4><?php $str = $this->session->userdata('status_login');
                                                echo wordwrap($str, 15, "<br>\n"); ?></h4>

                                            <?php
                                            $npp    = $this->session->userdata('status_login_username');
                                            $data   = $this->Model_karyawan->get_sdm08_no($npp);
                                            foreach ($data as $l) { ?>
                                                <?php $jab = $this->Model_karyawan->get_jab($l['jabatan']);
                                                foreach ($jab as $j) { ?>
                                                    <p>
                                                        <?php $ini = $j['nama'];
                                                        echo wordwrap($ini, 25, "<br>\n"); ?>
                                                    </p>
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content">
                                    <form class="form-horizontal">
                                        <?php foreach ($t_biodiri as $k) { ?>
                                            <div class="form-group row">
                                                <div class="col-md-5"></div>
                                                <label class="col-form-label col-md-3 text-left">No Induk Pegawai</label>
                                                <div class="col-md-3">
                                                    <input type="text" readonly class="form-control-plaintext" value=":         <?= $k['npp'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-5"></div>
                                                <label class="col-form-label col-md-3 text-left">Nama Lengkap</label>
                                                <div class="col-md-3">
                                                    <input type="text" readonly class="form-control-plaintext" value=":         <?= $k['glr_dpn'] ?><?= $k['nama'] ?> <?= $k['glr_blk'] ?>">
                                                </div>
                                            </div>
                                            <?php
                                            $golbaru = $this->Model_karyawan->get_gol_akhir($k['npp']);
                                            foreach ($golbaru as $d) { ?>
                                                <div class="form-group row">
                                                    <div class="col-md-5"></div>
                                                    <label class="col-form-label col-md-3 text-left">
                                                        Pangkat / Golongan
                                                    </label>
                                                    <div class="col-md-3">
                                                        <?php
                                                        $gol = $this->Model_karyawan->get_gol($d['golongan']);
                                                        foreach ($gol as $y) : ?>
                                                            <input type="text" readonly class="form-control-plaintext" value=":       <?= $y['gol'] ?> / <?= $d['mk'] ?>">
                                                        <?php endforeach ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="form-group row">
                                                <div class="col-md-5"></div>
                                                <label class="col-form-label col-md-3 text-left">
                                                    Tempat / Tanggal Lahir
                                                </label>
                                                <div class="col-md-3">
                                                    <input type="text" readonly class="form-control-plaintext" value=":      <?= $k['kota_lhr'] ?> / <?= date('d-m-Y', strtotime($k['tgl_lhr'])) ?>">
                                                </div>
                                            </div>
                                            <?php
                                            $agama = $this->Model_karyawan->get_agama($k['agama']);
                                            foreach ($agama as $q) : ?>
                                                <div class="form-group row">
                                                    <div class="col-md-5"></div>
                                                    <label class="col-form-label col-md-3 text-left">
                                                        Agama
                                                    </label>
                                                    <div class="col-md-3">
                                                        <?php if ($q['kd_agama'] < 0) { ?>
                                                            <input type="text" readonly class="form-control-plaintext" value=":         ">
                                                        <?php } else { ?>
                                                            <input type="text" readonly class="form-control-plaintext" value=":       <?= $q['nm_agama'] ?>">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                            <?php
                                            $alamat = $this->Model_karyawan->almt($k['npp']);
                                            foreach ($alamat as $v) { ?>
                                                <div class="form-group row">
                                                    <div class="col-md-5"></div>
                                                    <label class="col-form-label col-md-3 text-left">
                                                        Alamat Kantor
                                                    </label>
                                                    <div class="col-md-3">
                                                        <?php
                                                        $ini = $this->Model_karyawan->unit($v['kd_unit']);
                                                        foreach ($ini as $p) { ?>
                                                            <input type="text" readonly class="form-control-plaintext" value=":      <?= $p['nm_unit'] ?>">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                            <div class="form-group row">
                                                <div class="col-md-5"></div>
                                                <label class="col-form-label col-md-3 text-left">
                                                    Alamat Rumah
                                                </label>
                                                <div class="col-md-3">
                                                    <textarea rows="2" readonly class="form-control-plaintext" value=":      <?= $k['alamat_tgl'] ?>">:      <?= $k['alamat_tgl'] ?></textarea>
                                                </div>
                                            </div>
                                            <?php
                                            $jk = $this->Model_karyawan->get_jenis_kelamin($k['j_kelamin']);
                                            foreach ($jk as $z) : ?>
                                                <div class="form-group row">
                                                    <div class="col-md-5"></div>
                                                    <label class="col-form-label col-md-3 text-left">Jenis Kelamin</label>
                                                    <div class="col-md-3">
                                                        <input type="text" readonly class="form-control-plaintext" value=":     <?= $z['nm_kelamin'] ?>">
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                            <div class="form-group row">
                                                <div class="col-md-5"></div>
                                                <label class="col-form-label col-md-3 text-left">Golongan Darah</label>
                                                <div class="col-md-3">
                                                    <input type="text" readonly class="form-control-plaintext" value=":     <?= $k['gol_darah'] ?>">
                                                </div>
                                            </div>
                                            <?php
                                            $sipil = $this->Model_karyawan->get_sipil($k['st_sipil']);
                                            foreach ($sipil as $s) : ?>
                                                <div class="form-group row">
                                                    <div class="col-md-5"></div>
                                                    <label class="col-form-label col-md-3 text-left">
                                                        Status Pernikahan
                                                    </label>
                                                    <div class="col-md-3">
                                                        <?php if ($s['kd_sipil'] < 0) { ?>
                                                            <input type="text" readonly class="form-control-plaintext" value=":        ">
                                                        <?php } else { ?>
                                                            <input type="text" readonly class="form-control-plaintext" value=":     <?= $s['nm_sipil'] ?>">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        <?php } ?>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <hr align="right" color="black">
                    </div>

                    <!-- Modal -->
                    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Biodata Diri Karyawan</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <?php foreach ($t_biodiri as $k) { ?>
                                        <div class="tile-body">
                                            <form class="form-horizontal">
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">NPP</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="text" name="npp" value=":   <?= $this->session->userdata('status_login_username'); ?>" placeholder="<?= $this->session->userdata('status_login_username'); ?>" Readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Nama Lengkap</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="text" name="nama" value=":    <?= $k['nama'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Nama Panggilan</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="text" name="nm_pgl" value=":    <?= $k['nm_pgl'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Gelar Depan </label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="text" name="glr_dpn" value=":    <?= $k['glr_dpn'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Gelar Belakang </label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="text" name="glr_blk" value=":   <?= $k['glr_blk'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Kota Lahir</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="text" name="kota_lhr" value=":  <?= $k['kota_lhr'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Provinsi Lahir</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="text" name="prov_lhr" value=":  <?= $k['prov_lhr'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Negara Lahir</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="text" name="ngr_lhr" value=":    <?= $k['ngr_lhr'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Tanggal Lahir</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="text" name="tgl_lhr" value=":    <?= date('d-m-Y', strtotime($k['tgl_lhr'])); ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Jenis Kelamin</label>
                                                    <div class="col-md-3">
                                                        <?php $klmn = $this->Model_karyawan->get_jenis_kelamin($k['j_kelamin']);
                                                        foreach ($klmn as $j) { ?>
                                                            <input class="form-control-plaintext" type="text" name="j_kelamin" value=":    <?= $j['nm_kelamin'] ?>" readonly>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Golongan Darah</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="text" name="" value=":    <?= $k['gol_darah'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Agama</label>
                                                    <div class="col-md-3">
                                                        <?php $agm = $this->Model_karyawan->get_agama($k['agama']);
                                                        foreach ($agm as $a) { ?>
                                                            <input class="form-control-plaintext" type="text" name="agama" value=":     <?= $a['nm_agama'] ?>" readonly>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Tanggal Masuk</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="text" name="tgl_masuk" value=":     <?= date('d-m-Y', strtotime($k['tgl_masuk'])) ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Status Sipil</label>
                                                    <div class="col-md-3">
                                                        <?php $pil = $this->Model_karyawan->get_sipil($k['st_sipil']);
                                                        foreach ($pil as $p) { ?>
                                                            <input class="form-control-plaintext" type="text" name="agama" value=":     <?= $p['nm_sipil'] ?>" readonly>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Jumlah Anak</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="text" name="jmlh_ank" value=":      <?= $k['jmlh_ank'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">No Astek</label>
                                                    <div class="col-md-3">
                                                        <span class="text-danger" id="error_no_astek"></span>
                                                        <input class="form-control-plaintext" type="number" name="no_astek" value=":    <?= $k['no_astek'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">No Pensiun</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="text" name="no_pens" value=":   <?= $k['no_pens'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">No NPWP</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="text" name="npwp" value=":      <?= $k['npwp'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Alamat Tinggal</label>
                                                    <div class="col-md-3">
                                                        <span class="text-danger" id="error_alamat_tgl"></span>
                                                        <textarea class="form-control-plaintext" rows="2" name="alamat_tgl" value=":    <?= $k['alamat_tgl'] ?>" readonly></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Kode Lokasi</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="number" name="kd_lokasi" value=":   <?= $k['kd_lokasi'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">Kode Pos</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="number" name="kode_pos" value=":    <?= $k['kode_pos'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">No Telepon</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="number" name="no_telp" value=":     <?= $k['no_telp'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">No NIK</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="number" name="no_nik" value=":      <?= $k['no_nik'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">No KK</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="number" name="no_kk" value=":       <?= $k['no_kk'] ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-1"></div>
                                                    <label class="control-label col-md-4 text-left">No BPJS</label>
                                                    <div class="col-md-3">
                                                        <input class="form-control-plaintext" type="number" name="no_bpjs" value=":     <?= $k['no_bpjs'] ?>" readonly>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <?= form_close() ?>
                                    <?php } ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
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

        <script type="text/javascript">
            const statusinsert = $('.status-insert').data('statusinsert');
            // console.log(statusinsert);
            if (statusinsert) {
                swal({
                    title: "Berhasil " + statusinsert,
                    text: "DATA AKAN DI VERIFIKASI OLEH ADMIN",
                    type: "success",
                    timer: 10000,
                    showConfirmButton: false
                });
            }

            const statusgagal = $('.status-gagal').data('statusgagal');
            // console.log(statusgagal);
            if (statusgagal) {
                swal({
                    title: "Gagal " + statusgagal,
                    text: "EDIT KEMBALI DATA ANDA DENGAN BENAR",
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