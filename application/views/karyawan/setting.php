<!DOCTYPE html>
<html lang="en">

<head>

    <?php
    $data['tittle'] = "Settings";
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
        <div class="row user">
            <div class="col-md-12">
                <div class="profile">
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
                                <p><?= wordwrap($j['nama'], 25, "<br>\n") ?></p>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="cover-image"></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="tile p-0">
                    <ul class="nav flex-column nav-tabs user-tabs">
                        <li class="nav-item"><a class="nav-link <?php if ($this->uri->segment(2) == "setting") {
                                                                    echo "active";
                                                                } ?>" href="#user-settings" data-toggle="tab">Settings</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="user-settings">
                        <?= $this->session->flashdata('msg') ?>
                        <?= $this->session->flashdata('gagal') ?>
                        <!-- Swetalert Berhasil -->
                        <div class="status-ok" data-statusok="<?= $this->session->flashdata('statusok'); ?>"></div>
                        <!-- Swetalert Berhasil -->
                        <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
                        <!-- Swetalert Gagal -->
                        <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                        <div class="status-lama" data-statuslama="<?= $this->session->flashdata('statuslama'); ?>"></div>
                        <div class="tile user-settings">
                            <h4 class="line-head">Settings</h4>
                            <?= form_open_multipart('Karyawan/ed_akun'); ?>
                            <form>
                                <div class="row">
                                    <div class="col-md-8 mb-4">
                                        <label>Nama</label>
                                        <input class="form-control" type="text" value="<?= $this->session->userdata('status_login'); ?>" name="nama" readonly>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-8 mb-4">
                                        <label>Username</label>
                                        <input class="form-control" type="text" value="<?= $this->session->userdata('status_login_username'); ?>" name="username" readonly>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-8 mb-4">
                                        <label>Password Lama</label>
                                        <input class="form-control" type="password" name="pass">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-8 mb-4">
                                        <label>Password Baru</label>
                                        <input class="form-control" type="password" name="new_password">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-8 mb-4">
                                        <label>Konfimasi Password</label>
                                        <input class="form-control" type="password" name="confirm_password">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-8 mb-4">
                                        <label class="control-label">Image</label>
                                        <input class="form-control" type="file" name="image" accept=".jpg,.jpeg,.png">
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-floppy-o"></i> Simpan</button>
                                    </div>
                                </div>
                            </form>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php $this->load->view('template/script') ?>
    <script type="text/javascript">
        const statusok = $('.status-ok').data('statusok');
        // console.log(statusok);
        if (statusok) {
            swal({
                title: "Berhasil " + statusok,
                text: "Data Berhasil Di Input",
                type: "success",
                timer: 8000,
                showConfirmButton: false
            });
        }

        const statusinsert = $('.status-insert').data('statusinsert');
        // console.log(statusinsert);
        if (statusinsert) {
            swal({
                title: "Berhasil " + statusinsert,
                text: "Data Berhasil Di Input",
                type: "success",
                timer: 8000,
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
                timer: 8000,
                showConfirmButton: false
            });
        }

        const statuslama = $('.status-lama').data('statuslama');
        // console.log(statuslama);
        if (statuslama) {
            swal({
                title: "lama " + statuslama,
                text: "EDIT KEMBALI DATA ANDA DENGAN BENAR",
                type: "error",
                timer: 8000,
                showConfirmButton: false
            });
        }
    </script>


</body>

</html>