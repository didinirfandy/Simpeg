<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "Form Input Pendidikan";
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
                    <h1><i class="fa fa-graduation-cap"></i> Pendidikan </h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Pendidikan</li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/karyawan/data/riwayat pendidikan/in_formal"> Form Input Pendidikan </a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <?= form_open_multipart('Karyawan/karyawan/pend_action'); ?>
                        <h3 class="tile-title" class="fa fa-database">Form Input Pendidikan </h3>
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
                                        <?php $no = $this->Model_karyawan->get_sdm03_no($pend[0]['no_urut']);
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
                                                <option value="">--PILIH--</option>
                                                <?php foreach ($tkpend as $key) { ?>
                                                    <option value="<?= $key['tk_pend'] ?>"><?= $key['nm_tkpend'] ?></option>
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
                                                <option value="">--PILIH--</option>
                                            </optgroup>
                                        </select><small class="form-text text-muted" id="namaini"><strong> Masukan Nama Pendidikan </strong></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kode Pendidikan**</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="kd_pend" id="kd_pend" aria-describedby="kodeini">
                                            <optgroup label="Pilih Kode Pendidikan">
                                                <option value="">--PILIH--</option>
                                            </optgroup>
                                        </select><small class="form-text text-muted" id="kodeini"><strong> **Masukan Sesuai Nama Pendidikan yang dipilih</strong></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kota</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" class="form-control" name="kota" placeholder="Masukan Kota Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tahun Mulai</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" class="form-control" name="thn_awal" placeholder="Masukan Tahun Mulai Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tahun Selesai</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" class="form-control" name="thn_akhir" placeholder="Masukan Tahun Akhir Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No Ijasah</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" class="form-control" name="no_ijasah" placeholder="Masukan No Ijasah Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal Ijasah</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" class="form-control" name="tgl_ijasah" placeholder="Masukan Tanggal Ijasah Anda">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Gelar Depan</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" aria-describedby="depanHelp" class="form-control" name="glr_dpn" placeholder="Masukan Gelar Depan Anda">
                                        <small class="form-text text-muted" id="depanHelp"><strong> Untuk Menambah Gelar di Depan Nama Anda </strong></small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Gelar Belakang</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" aria-describedby="belakangHelp" class="form-control" name="glr_blk" placeholder="Masukan Gelar Belakang Anda">
                                        <small class="form-text text-muted" id="belakangHelp"><strong> Untuk Menambah Gelar di Belakang Nama Anda </strong></small>
                                    </div>
                                </div>
                                <input type="hidden" name="valid" value="1">
                                <input type="hidden" name="status" value="1">
                                <h5>Upload Bukti Ijasah</h5><br>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Image</label>
                                    <div class="col-md-6">
                                        <input required class="form-control" type="file" name="image">
                                        <small class="form-text text-muted"><strong> Format Gambar = jpg/jpeg/png </strong></small>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer row">
                                <div class="col-md-7"></div>
                                <div class="col-md-5">
                                    <button class="btn btn-primary" name="submit" type="submit"><i class="fa fa-fw fa-floppy-o"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
                                    <a class="btn btn-secondary" href="<?= base_url() ?>index.php/karyawan/riwayat_pndidikan/pendformal"><i class="fa fa-fw fa-arrow-left"></i>Kembali</a>
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
        <!-- Main Menu area End-->

        <script type="text/javascript">
            $(document).ready(function() {
                $('#tk_pend').change(function() {
                    var no = $(tk_pend).val();
                    $.ajax({
                        method: "POST",
                        url: "<?= base_url('index.php/Karyawan/pendentry') ?>",
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
                });
            });

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

    </body>

    </html>
<?php } ?>