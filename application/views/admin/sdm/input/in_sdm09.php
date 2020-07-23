<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

    <?php
        $data['tittle'] = "From Input SDM 09";
        $this->load->view('template/head', $data);
        ?>

    </head>

    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/welcome/in_admin">SIMPEG</a>

            <?php $this->load->view('template/header') ?>

        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_admin') ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-th-list"></i> SDM 09</h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Tabel SDM</li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/sdm09"> SDM 09</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <?= form_open('admin/tabel_sdm/in_sdm09'); ?>
                        <h3 class="tile-title">Form Input SDM 09</h3>
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
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No Urut</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="no_urut" placeholder="Masukan No Urut Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kode Unit</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="numbe" name="kd_unit" placeholder="Masukan Kode Unit">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Jabatan</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="jabatan" placeholder="Masukan Jabatan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">TMT</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" name="tmt" placeholder="Masukan TMT">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No SK</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="no_sk" placeholder="Masukan No SK ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal SK</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" name="tgl_sk" placeholder="Masukan Tanggal SK">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Lama Jabatan</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="lama_jab" placeholder="Masukan Lama Jabatan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal Akhir</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" name="tgl_akhir" placeholder="Masukan Tanggal Akhir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">NPP Jabatan</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="npp_jbt" placeholder="Masukan NPP Jabatan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Bulan Proses</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses">
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
                                    <a class="btn btn-secondary" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm09"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Kembali</a>
                                </div>
                            </div>
                        </div>
                        <?php echo form_close() ?>
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