<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "From Input Pendidikan";
        $this->load->view('template/head', $data);
        ?>

    </head>

    <body class="app sidebar-mini rtl">
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
                    <h1><i class="fa fa-th-list"></i> Pendidikan</h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Tabel Kepegawaian</li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/inpt_sdm03"> Pendidikan</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <?= form_open('admin/tabel_sdm/in_sdm03'); ?>
                        <h3 class="tile-title">Form Input Pendidikan</h3>
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
                                        <input class="form-control" type="text" name="no_urut" placeholder="No Urut">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Nama Sekolah/Lembaga</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" class="form-control" name="ket" placeholder="Masukan Nama Sekolah/Lembaga" aria-describedby="nm_sklh">
                                        <small class="form-text text-muted" id="nm_sklh"><strong> Masukan Nama Kampus EX: POLITEKNIK POS INDONESIA </strong></small>
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
                                                    <option value="<?php echo $key['tk_pend'] ?>"><?php echo $key['nm_tkpend'] ?></option>
                                                <?php  } ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Nama Pendidikan</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="nama" id="nama" aria-describedby="namaini">
                                            <optgroup label="Pilih Pendidikan">
                                                <option value="">---PILIH---</option>
                                            </optgroup>
                                        </select><small class="form-text text-muted" id="namaini"><strong> Masukan Nama Pendidikan </strong></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kode Pendidikan</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="kd_pend" id="kd_pend" aria-describedby="kodeini">
                                            <optgroup label="Pilih Kode Pendidikan">
                                                <option value="">---PILIH---</option>
                                            </optgroup>
                                        </select><small class="form-text text-muted" id="kodeini"><strong> **Masukan Sesuai Nama Pendidikan yang dipilih</strong></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kota </label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="kota" placeholder="Masukan Kota Sekolah Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Status Akreditasi</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="st_akred" placeholder="Masukan Status Akreditasi Sekolah Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">DNLN</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="dnln" placeholder="Masukan DNLN Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tahun Awal</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="thn_awal" placeholder="Masukan Tahun Awal Sekolah">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tahun Akhir</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="thn_akhir" placeholder="Masukan Tahun Akhir Sekolah">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Status Lulus</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="st_lulus" placeholder="Masukan Status Lulus Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No Ijasah</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="no_ijasah" placeholder="Masukan No Ijasah Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal Ijasah</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="tgl_ijasah" id="demoDate" placeholder="Masukan Tanggal Ijasah Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Nilai</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="nilai" placeholder="Masukan Nilai Ijasah Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Grade</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="grade" placeholder="Masukan Grade Nilai Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Ket</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="ket" placeholder="Keterangan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Bulan Proses</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="bln_proses" placeholder="Bulan Proses">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Stat REC</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="stat_rec" placeholder="Stat REC">
                                    </div>
                                </div>
                            </form>
                            <div class="tile-footer row">
                                <div class="col-md-7"></div>
                                <div class="col-md-5">
                                    <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Simpan</button>&nbsp;&nbsp;
                                    <a class="btn btn-secondary" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm03"><i class="fa fa-fw fa-lg fa-arrow-left"></i>Kembali</a>
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
                $('#tk_pend').change(function() {
                    var no = $(tk_pend).val();
                    if(no!=""){
                        $.ajax({
                            method: "POST",
                            url: "<?php echo base_url('index.php/Karyawan/pendentry') ?>",
                            dataType: "JSON",
                            data: {
                                no: no
                            },
                            async: false,
                            success: function(data) {
                                $('#nama').html(data.list_nama).show();
                                $('#kd_pend').html(data.list_kd_pend).show();
                            }
                        });
                    }
                });
            });

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
        </script>

    </body>

    </html>
<?php } ?>