<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "Golongan";
        $this->load->view('template/head', $data);
        ?>

    </head>

    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="<?= base_url() ?>index.php/Admin/in_admin">SIMPEG</a>

            <?php $this->load->view('template/header_ad') ?>

        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_admin') ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-line-chart"></i> Golongan</h1>
                    <p>Menginput Banyak Data hanya dengan 1 no sk</p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item"> Kepegawaian</li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/admin/hak_akses/hak"> Golongan</a></li>
                </ul>
            </div>
            <?= $this->session->flashdata('status_insert'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h3 class="title">Input Data Golongan</h3>
                        </div>
                        <?= form_open('admin/multiple_insert_sdm16'); ?>
                        <hr align="right" color="black">
                        <div class="tile-body">
                            <form class="form-horizontal">
                                <!-- Buat tombol untuk menabah form data -->
                                <button class="btn btn-primary" type="button" id="btn-tambah-form"><i class="fa fa-fw fa-plus-square"></i>Tambah Data Form</button>&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-warning" type="button" id="btn-reset-form"><i class="fa fa-fw fa-refresh"></i>Reset Form</button><br><br>

                                <hr align="right" color="black">
                                <b>Data ke 1 :</b><br><br>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No SK</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="no_sk[]" placeholder="Masukan No SK">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">NPP</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="npp[]" placeholder="NPP" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">No Urut</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="no_urut[]" placeholder="Masukan No Urut Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Status Pegawai</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="st_peg[]" placeholder="Masukan Status Pegawai">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Golongan</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="golongan[]" placeholder="Masukan Status Golongan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">MK</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="mk[]" placeholder="Masukan MK">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">TMT</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" name="tmt[]" placeholder="Masukan TMT">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Jenis Naik</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="jns_naik[]" placeholder="Masukan Jenis Naik">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tanggal SK</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" name="tgl_sk[]" placeholder="Masukan Tanggal SK">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">NPP Jabatan</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="npp_jbt[]" placeholder="Masukan NPP Jabatan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Bulan Proses</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="bln_proses[]" placeholder="Masukan Bulan Proses">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kode Kelas</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="kd_kelas[]" placeholder="Masukan Kode Kelas">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Stat REC</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="stat_rec[]" placeholder="Masukan Stat REC">
                                    </div>
                                </div>
                                <?php date_default_timezone_set('Asia/Jakarta');
                                $date   =   date('Y/m/d H:i:s'); ?>
                                <input type="hidden" name="tgl[]" value="<?= $date ?>">
                                <div id="insert-form"></div>
                            </form>
                            <div class="tile-footer row">
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <button class="btn btn-success" name="submit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                                </div>
                            </div>
                        </div>
                        <?= form_close() ?>
                        <input type="hidden" id="jumlah-form" value="1">
                    </div>
                </div>
            </div>

            <div class="modal fade" id="lookup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">SDM 08</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">NPP</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" name="npp" id="npp" placeholder="NPP" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">No SK</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" name="no_sk" placeholder="Masukan No SK">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">No Urut</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="number" name="no_urut" placeholder="Masukan No Urut Anda">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">Status Pegawai</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" name="st_peg" placeholder="Masukan Status Pegawai">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">Golongan</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" name="golongan" placeholder="Masukan Status Golongan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">MK</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" name="mk" placeholder="Masukan MK">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">TMT</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="date" name="tmt" placeholder="Masukan TMT">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">Jenis Naik</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" name="jns_naik" placeholder="Masukan Jenis Naik">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">Tanggal SK</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="date" name="tgl_sk" placeholder="Masukan Tanggal SK">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">NPP Jabatan</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" name="npp_jbt" placeholder="Masukan NPP Jabatan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">Bulan Proses</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="number" name="bln_proses" placeholder="Masukan Bulan Proses">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">Kode Kelas</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="text" name="kd_kelas" placeholder="Masukan Kode Kelas">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">Stat REC</label>
                                <div class="col-md-7">
                                    <input class="form-control" type="number" name="stat_rec" placeholder="Masukan Stat REC">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Naik -->
            <div class="modal fade" id="naik" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tabel Naik</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="tile">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>JENIS NANIK</th>
                                            <th>NAMA</th>
                                            <th>STAT REC</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($naik as $b) { ?>
                                            <tr>
                                                <td><?= $b['id_naik'] ?></td>
                                                <td><?= $b['jns_naik'] ?></td>
                                                <td><?= $b['nama'] ?></td>
                                                <td><?= $b['stat_rec'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Naik -->
            <div class="modal fade" id="gol" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Tabel Golongan</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="tile">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>KODE GOLONGAN</th>
                                            <th>GOLONGAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($gol as $b) { ?>
                                            <tr>
                                                <td><?= $b['id_gol'] ?></td>
                                                <td><?= $b['kd_gol'] ?></td>
                                                <td><?= $b['gol'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
            $(document).ready(function() {
                $('#npp').on('input', function() {
                    var npp = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('index.php/Admin/get_npp_sdm16') ?>",
                        dataType: "JSON",
                        data: {
                            npp: npp
                        },
                        cache: false,
                        success: function(data) {
                            $.each(data, function(npp, no_urut, st_peg, golongan, mk, tmt,
                                jns_naik, no_sk, npp_jbt, bln_proses, kd_kelas, stat_rec, tgl) {
                                $('[name="npp"]').val(data.npp);
                                $('[name="no_urut"]').val(data.no_urut);
                                $('[name="st_peg"]').val(data.st_peg);
                                $('[name="golongan"]').val(data.golongan);
                                $('[name="mk"]').val(data.mk);
                                $('[name="tmt"]').val(data.tmt);
                                $('[name="jns_naik"]').val(data.jns_naik);
                                $('[name="no_sk"]').val(data.no_sk);
                                $('[name="npp_jbt"]').val(data.npp_jbt);
                                $('[name="bln_proses"]').val(data.bln_proses);
                                $('[name="kd_kelas"]').val(data.kd_kelas);
                                $('[name="stat_rec"]').val(data.stat_rec);
                                $('[name="tgl"]').val(data.tgl);
                            });
                        }
                    });
                    return false;
                });

                $("#btn-tambah-form").click(function() {
                    var jumlah = parseInt($("#jumlah-form").val());
                    var nextform = jumlah + 1;
                    var no_sk = $('[name="no_sk[]"]').val();

                    $("#insert-form").append(
                        "<hr align='right' color='black'>" +
                        "<b>Data ke " + nextform + " :</b><br><br>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>No SK</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='no_sk[]' placeholder='Masukan No SK'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>NPP</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='npp[]' placeholder='NPP' required>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>No Urut</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='number' name='no_urut[]' placeholder='Masukan No Urut Anda'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>Status Pegawai</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='st_peg[]' placeholder='Masukan Status Pegawai'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>Golongan</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='golongan[]' placeholder='Masukan Status Golongan'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>MK</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='mk[]' placeholder='Masukan MK'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>TMT</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='date' name='tmt[]' placeholder='Masukan TMT'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>Jenis Naik</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='jns_naik[]' placeholder='Masukan Jenis Naik'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>Tanggal SK</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='date' name='tgl_sk[]' placeholder='Masukan Tanggal SK'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>NPP Jabatan</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='npp_jbt[]' placeholder='Masukan NPP Jabatan'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>Bulan Proses</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='number' name='bln_proses[]' placeholder='Masukan Bulan Proses'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>Kode Kelas</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='kd_kelas[]' placeholder='Masukan Kode Kelas'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>Stat REC</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='number' name='stat_rec[]' placeholder='Masukan Stat REC'>" +
                        "</div>" +
                        "</div>"
                    );

                    $('[name="no_sk[]"]').val(no_sk);
                    $("#jumlah-form").val(nextform);
                });

                $("#btn-reset-form").click(function() {
                    $("#insert-form").html("");
                    $("#jumlah-form").val("1");
                });
            });

            document.onkeydown = function(e) {

                switch (e.keyCode) {
                    // f4
                    case 115:
                        $("#lookup").modal();
                        break;
                        // f2
                    case 113:
                        $("#naik").modal();
                        break;
                        // f7
                    case 118:
                        $("#gol").modal();
                        break;
                        // esc
                    case 27:
                        $('#lookup').modal('hide')
                        break;
                    case 27:
                        $('#naik').modal('hide')
                        break;
                    case 27:
                        $('#gol').modal('hide')
                        break;
                }
            };

            function masuk(txt, jabatan) {
                $('[name="jabatan[]"]').val(jabatan);
                $("#lookup").modal('hide');
            }
        </script>
        <!-- Main Menu area End-->

    </body>

    </html>
<?php } ?>