<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "Mutasi Jabatan";
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
                    <h1><i class="fa fa-exchange"></i> Mutasi Jabatan</h1>
                    <p>Menginput Banyak Data hanya dengan 1 no sk</p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item"> Kepegawaian</li>
                    <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/admin/kepegawaian/mutasi"> Mutasi Jabatan </a></li>
                </ul>
            </div>
            <?= $this->session->flashdata('status_insert'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h3 class="title">Input Data Mutasi Jabatan</h3>
                        </div>
                        <?= form_open('admin/multiple_insert_sdm08'); ?>
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
                                        <input class="form-control" type="text" name="no_sk[]" placeholder="Masukan No SK" required><small class="form-text text-danger" id="no_error_message"></small>
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
                                        <input class="form-control" type="text" name="no_urut[]" placeholder="Masukan No Urut Anda">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kode Mutasi</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="kd_mutasi[]" placeholder="Masukan Kode Mutasi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kode Unit</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="kd_unit[]" placeholder="Masukan Kode Unit">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kode Adf</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="kd_adf[]" placeholder="Masukan Kode Adf">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Kode Budidaya</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="nunber" name="kd_bud[]" placeholder="Masukan Kode Budidaya">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Jabatan</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="number" name="jabatan[]" placeholder="Masukan Jabatan ">
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
                                    <label class="control-label col-md-2 text-right">Tanggal SK</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="date" name="tgl_sk[]" placeholder="Masukan Tanggal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">NPP Jabatan</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="npp_jbt[]" placeholder="Masukan NPP Jabatan ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Tinggal </label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="tinggal[]" value="1" placeholder="Tinggal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Bulan Proses</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="bln_proses[]" placeholder="Masukan Bulan Proses">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="control-label col-md-2 text-right">Stat REC</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="stat_rec[]" placeholder="Masukan Stat REC">
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
                            <h4 class="modal-title">Master Jabatan</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th>Id Jabatan</th>
                                        <th>Kode Jabatan</th>
                                        <th>Nama Jabatan</th>
                                        <th>Stat Rec</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jab as $i) : ?>
                                        <tr id="data" onClick="masuk(this,'<?= $i['jabatan'] ?>')">
                                            <td><?= $i['id_jab'] ?></td>
                                            <td><?= $i['jabatan'] ?></td>
                                            <td><?= $i['nama'] ?></td>
                                            <td><?= $i['stat_rec'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="lookup2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="npp" id="npp" placeholder="NPP" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">No SK</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="no_sk" placeholder="Masukan No SK" required><small class="form-text text-danger" id="no_error_message"></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">No Urut</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="no_urut" placeholder="Masukan No Urut Anda">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">Kode Mutasi</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="kd_mutasi" placeholder="Masukan Kode Mutasi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">Kode Unit</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="kd_unit" placeholder="Masukan Kode Unit">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">Kode Adf</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="kd_adf" placeholder="Masukan Kode Adf">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">Kode Budidaya</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="nunber" name="kd_bud" placeholder="Masukan Kode Budidaya">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">Jabatan</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" name="jabatan" placeholder="Masukan Jabatan ">
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
                                <label class="control-label col-md-2 text-right">Tanggal SK</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="date" name="tgl_sk" placeholder="Masukan Tanggal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">NPP Jabatan</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="npp_jbt" placeholder="Masukan NPP Jabatan ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-2 text-right">Tinggal </label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="tinggal" value="1" placeholder="Tinggal">
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
                        url: "<?php echo base_url('index.php/Admin/get_npp_sdm08') ?>",
                        dataType: "JSON",
                        data: {
                            npp: npp
                        },
                        cache: false,
                        success: function(data) {
                            $.each(data, function(id_sdm08, npp, no_urut, kd_unit, kd_adf, jabatan, tmt,
                                no_sk, npp_jbt, tinggal, bln_proses, stat_rec, tgl) {
                                $('[name="id_sdm08"]').val(data.id_sdm08);
                                $('[name="npp"]').val(data.npp);
                                $('[name="no_urut"]').val(data.no_urut);
                                $('[name="kd_unit"]').val(data.kd_unit);
                                $('[name="kd_adf"]').val(data.kd_adf);
                                $('[name="jabatan"]').val(data.jabatan);
                                $('[name="tmt"]').val(data.tmt);
                                $('[name="no_sk"]').val(data.no_sk);
                                $('[name="npp_jbt"]').val(data.npp_jbt);
                                $('[name="tinggal"]').val(data.tinggal);
                                $('[name="bln_proses"]').val(data.bln_proses);
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
                        "<b>Data ke " + nextform + " :</b>" +
                        "<br>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>No SK</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='no_sk[]' placeholder='Masukan No SK' required>" +
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
                        "<input class='form-control' type='text' name='no_urut[]' placeholder='Masukan No Urut Anda'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>Kode Mutasi</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='kd_mutasi[]' placeholder='Masukan Kode Mutasi'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>Kode Unit</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='kd_unit[]' placeholder='Masukan Kode Unit'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>Kode Adf</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='kd_adf[]' placeholder='Masukan Kode Adf'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>Kode Budidaya</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='nunber' name='kd_bud[]' placeholder='Masukan Kode Budidaya'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>Jabatan</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='number' name='jabatan[]' placeholder='Masukan Jabatan '>" +
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
                        "<label class='control-label col-md-2 text-right'>Tanggal SK</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='date' name='tgl_sk[]' placeholder='Masukan Tanggal'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>NPP Jabatan</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='npp_jbt[]' placeholder='Masukan NPP Jabatan '>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>Tinggal </label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='tinggal[]' value='1' placeholder='Tinggal'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>Bulan Proses</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='bln_proses[]' placeholder='Masukan Bulan Proses'>" +
                        "</div>" +
                        "</div>" +
                        "<div class='form-group row'>" +
                        "<div class='col-md-1'></div>" +
                        "<label class='control-label col-md-2 text-right'>Stat REC</label>" +
                        "<div class='col-md-6'>" +
                        "<input class='form-control' type='text' name='stat_rec[]' placeholder='Masukan Stat REC'>" +
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
                    // f1
                    case 113:
                        $("#lookup").modal();
                        break;
                        // f3
                    case 115:
                        $("#lookup2").modal();
                        break;
                        // esc
                    case 27:
                        x
                        $('#lookup').modal('hide')
                        break;
                    case 27:
                        x
                        $('#lookup2').modal('hide')
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