<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

    <?php
        $data['tittle'] = "From Edit Hak Akses";
        $this->load->view('template/head', $data);
        ?>

    </head>

    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/welcome/in_admin">SIMPEG</a>

            <?php $this->load->view('template/header_ad') ?>

        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_admin') ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-key"></i> Hak Akses Karyawan</h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Hak Akses </li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/hak_akses/hak"> Hak Akses Karyawan </a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <?php foreach ($lgn as $l) { ?>
                            <?= form_open_multipart('Admin/ed_action'); ?>
                            <h3 class="tile-title">Form Edit Hak Akses</h3>
                            <hr align="right" color="black">
                            <div class="tile-body">
                                <form class="form-horizontal">
                                    <input type="hidden" name="id" value="<?= $l['id'] ?>">
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Image</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="file" name="image">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Nama Lengkap</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="nama" placeholder="<?= $l['nama'] ?>" value="<?= $l['nama'] ?>" Readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">NPP / Username</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="username" placeholder="<?= $l['username'] ?>" value="<?= $l['username'] ?>" Readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Password</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="password" name="pass" id="txtPassword" placeholder="Masukan Password" pattern=".{6}" title="Harus 6 Karakter, Tidak Boleh Lebih">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Konfirmasi Password</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="password" name="kpass" id="txtConfirmPassword" placeholder="Konfimasi Passwotd" pattern=".{6}" title="Harus 6 Karakter, Tidak Boleh Lebih">
                                        </div>
                                    </div>
                                </form>
                                <div class="modal-footer">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <button class="btn btn-primary" name="edit" id="btnSubmit" type="submit"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-secondary" href="<?= base_url() ?>index.php/Admin/hak_akses/hak"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Kembali</a>
                                    </div>
                                </div>
                            </div>
                            <?= form_close() ?>
                        <?php } ?>
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
            $(document).ready(function() {
                $(function() {
                    $("#btnSubmit").click(function() {
                        var password = $("#txtPassword").val();
                        var confirmPassword = $("#txtConfirmPassword").val();
                        if (password != confirmPassword) {
                            swal("Password Tidak Cocok", "Coba samakan password dan konfirmasi password", "error", {
                                button: "OK!",
                            });
                            return false;
                        }
                        return true;
                    });
                });
            });
        </script>
        <!-- Main Menu area End-->

    </body>

    </html>
<?php } ?>