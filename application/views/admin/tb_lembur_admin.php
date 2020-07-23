<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        $data['tittle'] = "Lembur Karyawan";
        $this->load->view('template/head', $data);
        ?>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"> -->
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
                <h1><i class="fa fa-clock-o"></i> Lembur Karyawan</h1>
                <p>Menampikan Data Lembur Karyawan</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/Admin/lembur_admin"></a> Lembur Karyawan</li> <!-- ini juga ganti sesuaikan -->
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h4 class="title">Pengajuan Lembur Karyawan</h4>
                    </div>
                    <hr align="right" color="black">
                    <div class="row">
                        <div class="form-group col-md-4 mx-sm-3 mb-3">
                            <?= form_open('Admin/lembur_admin/p_lmbr'); ?>
                            <select class="form-control" name="kd_menu_cari">
                                <optgroup label="Pilih Kepala Sub Divisi">
                                    <option value="">---PILIH---</option>
                                    <?php foreach ($tb_lembur as $key) {
                                            if ($key['kd_menu'] >= 8111 and $key['kd_menu'] <= 8365) { ?>
                                    <option value="<?= $key['kd_menu'] ?>"><?= $key['nama'] ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </optgroup>
                            </select>
                            <small class="form-text text-muted" id="emailHelp">Pilih Kepala Sub Divisi yang akan anda cari</small>
                        </div>
                        <button class="btn btn-info mb-5" type="submit" name="cari"><i class="fa fa-search"></i>Cari</button>&nbsp;&nbsp;&nbsp;
                        <?= form_close() ?>
                    </div>
                    <div class="tile">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>KODE LEMBUR</th>
                                    <th>NPP</th>
                                    <th>NAMA KARYAWAN</th>
                                    <th>JABATAN</th>
                                    <th>NAMA PIMPINAN</th>
                                    <th>TANGGAL LEMBUR</th>
                                    <th>JAM AWAL</th>
                                    <th>JAM AKHIR</th>
                                    <th>JUMLAH</th>
                                    <th>JENIS PEKERJAAN</th>
                                    <th>TANGGAL PENGAJUAN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (isset($_POST['cari'])) {
                                        foreach ($staf as $b) { ?>
                                <tr>
                                    <td><?= $b['kode_lmbr'] ?></td>
                                    <td><?= $b['npp'] ?></td>
                                    <td><?= $b['nama_p_lmbr'] ?></td>
                                    <?php $jab = $this->Model_karyawan->get_jab($b['jabatan']);
                                                foreach ($jab as $p) { ?>
                                    <td><?= $p['nama'] ?></td>
                                    <?php } ?>
                                    <td><?= $b['pimpinan'] ?></td>
                                    <td><?= $b['tgl_p'] ?></td>
                                    <td><?= date('H:i:s', strtotime($b['awal'])) ?></td>
                                    <td><?= date('H:i:s', strtotime($b['akhir'])) ?></td>
                                    <td><?= $b['jmlh'] ?></td>
                                    <td><?= $b['ket'] ?></td>
                                    <td><?= date('d-m-Y', strtotime($b['tgl'])) ?></td>
                                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?= $b['id_p_lmbr'] ?>"><i class="fa fa-pencil"></i>Edit </button>&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet<?= $b['id_p_lmbr'] ?>"><i class="fa fa-times"></i>Delet </button>
                                    </td>
                                </tr>
                                <?php }
                                    } else {
                                        echo "<tr>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        </tr>";
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h4 class="title">Upah Lembur Karyawan</h4>
                    </div>
                    <hr align="right" color="black">
                    <div class="tile">
                        <table class="table table-hover table-bordered" id="upahTable">
                            <thead>
                                <tr>
                                    <!-- <th>NO</th> -->
                                    <th>NPP</th>
                                    <th>NAMAKARYAWAN</th>
                                    <th>JABATAN</th>
                                    <th>GOLONGAN</th>
                                    <th>JUMLAH GAJI</th>
                                    <!-- <th>JAM MASUK (KETENTUAN)</th> -->
                                    <!-- <th>JAM PULANG (KETENTUAN)</th> -->
                                    <th>TANGGAL</th>
                                    <th>JAM MASUK REAL</th>
                                    <th>JAM PULANG REAL</th>
                                    <th>LEMBUR</th>
                                    <th>JAM PERTAMA</th>
                                    <th>JAM SETELAH</th>
                                    <th>HASIL JAM SETELAH</th>
                                    <!-- <th>LEMBUR YANG DIBAYAR</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (isset($_POST['cari'])) {
                                        $no = 1;
                                        $total_lembur = 0;
                                        $total_h_jam_p = 0;
                                        $total_h_jam_s = 0;
                                        $total_hsl_jam_s = 0;
                                        $total = 0;
                                        foreach ($upah as $u) {
                                            $a    = strtotime($u['jam_pulang']);
                                            $b    = strtotime($u['keluar']);
                                            $diff = $b - $a;
                                            $jam  = floor($diff / (60 * 60));

                                            if ($jam >= 3) {
                                                $jam_m = $jam;

                                                $jam_min = 1;
                                                $jam_max = 3;

                                                // jam Pertama
                                                if ($jam_m >= $jam_min) {
                                                    $jam_p = $jam_min;
                                                }
                                                $h_jam_p = $jam_p; // jam Pertama
                                                $h_jam_p_max = $jam_p; // jam Pertama

                                                // jam Setelah
                                                if ($jam_m >= $h_jam_p) {
                                                    $jam_s = $jam - $h_jam_p;
                                                }
                                                $h_jam_s = $jam_s; // jam setelah
                                                $h_jam_s_max = $jam_s; // jam setelah

                                                // Hasil Jam Setelah
                                                if ($h_jam_s >= $jam_max) {
                                                    $hsl = $jam_max;
                                                } else {
                                                    $hsl = $h_jam_s;
                                                }
                                                $hsl_jam_s = $hsl; // hasil Jam Setelah
                                                $hsl_jam_s_max = $hsl; // hasil Jam Setelah

                                                $npp = $u['npp'];
                                                $query = $this->db->query(
                                                    "SELECT gol.gol, sdm16.mk FROM sdm16 
                                                LEFT JOIN gol ON sdm16.golongan = gol.kd_gol
                                                where sdm16.npp = '$npp' 
                                                ORDER BY sdm16.no_urut DESC"
                                                )->row_array();
                                                $golongan      = $query['gol'];
                                                $mk            = $query['mk'];
                                                $tbl_gaji      = $this->db->get_where('tbl_gaji', array('gol' => $golongan, 'mk' => $mk))->row_array();
                                                $gaji          = $tbl_gaji['gaji'];
                                                $tarif         = $gaji / 173;
                                                $jumlah_lembur = $h_jam_p + $h_jam_s;
                                                $uph           = $tarif * $jumlah_lembur;
                                                $hsl           = number_format($uph);
                                            } elseif ($jam <= 3) {
                                                $jam_n = $jam;

                                                $jam_min = 1;
                                                $jam_max = 3;

                                                // jam Pertama
                                                if ($jam_n >= $jam_min) {
                                                    $jam_p = $jam_min;
                                                }
                                                $h_jam_p = $jam_p; // jam Pertama
                                                $h_jam_p_min = $jam_p; // jam Pertama

                                                // jam Setelah
                                                if ($jam_n >= $h_jam_p) {
                                                    $jam_s = $jam_n - $h_jam_p;
                                                }
                                                $h_jam_s = $jam_s; // jam setelah
                                                $h_jam_s_min = $jam_s; // jam setelah

                                                // Hasil Jam Setelah
                                                if ($h_jam_s >= $jam_max) {
                                                    $hsl = $jam_max;
                                                } else {
                                                    $hsl = $h_jam_s;
                                                }
                                                $hsl_jam_s = $hsl; // hasil Jam Setelah
                                                $hsl_jam_s_min = $hsl; // hasil Jam Setelah

                                                $npp = $u['npp'];
                                                $query = $this->db->query(
                                                    "SELECT gol.gol, sdm16.mk FROM sdm16 
                                                LEFT JOIN gol ON sdm16.golongan = gol.kd_gol
                                                where sdm16.npp = '$npp' 
                                                ORDER BY sdm16.no_urut DESC"
                                                )->row_array();
                                                $golongan      = $query['gol'];
                                                $mk            = $query['mk'];
                                                $tbl_gaji      = $this->db->get_where('tbl_gaji', array('gol' => $golongan, 'mk' => $mk))->row_array();
                                                $gaji          = $tbl_gaji['gaji'];
                                                $tarif         = $gaji / 173;
                                                $jumlah_lembur = $h_jam_p + $h_jam_s;
                                                $uph           = $tarif * $jumlah_lembur;
                                                $hsl           = number_format($uph);
                                            }
                                            ?>
                                <tr>
                                    <!-- <td><?= $no++; ?></td> -->
                                    <td><?= $u['npp'] ?></td>
                                    <td><?= $u['nama'] ?></td>
                                    <?php $jab = $this->Model_karyawan->get_jab($u['jabatan']);
                                                foreach ($jab as $p) { ?>
                                    <td><?= $p['nama'] ?></td>
                                    <?php } ?>
                                    <?php $gol = $this->Model_karyawan->get_gol($u['golongan']);
                                                foreach ($gol as $q) { ?>
                                    <td><?= $q['gol'] ?> / <?= $u['mk'] ?></td>
                                    <?php } ?>
                                    <td><?= number_format($tbl_gaji['gaji']) ?></td>
                                    <!-- <td><?= $u['jam_masuk'] ?></td> -->
                                    <!-- <td><?= $u['jam_pulang'] ?></td> -->
                                    <td><?= $u['tgl'] ?></td>
                                    <td><?= $u['masuk'] ?></td>
                                    <td><?= $u['keluar'] ?></td>
                                    <td><?= $jam ?></td>
                                    <td><?= $h_jam_p ?></td>
                                    <td><?= $h_jam_s ?></td>
                                    <td><?= $hsl_jam_s ?></td>
                                    <!-- <td><?= $hsl ?></td> -->
                                </tr>
                                <?php
                                            $total_lembur = $total_lembur + $jam;
                                            $total_h_jam_p = $total_h_jam_p + $h_jam_p;
                                            $total_h_jam_s = $total_h_jam_s + $h_jam_s;
                                            $total_hsl_jam_s = $total_hsl_jam_s + $hsl_jam_s;
                                            $total += $uph;
                                            // $total = $total + $h1 + $total + $h2;
                                        }
                                        ?>
                                <tr>
                                    <!-- <td><?= $no++; ?></td> -->
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>TOTAL</td>
                                    <td><?= $total_lembur ?></td>
                                    <td><?= $total_h_jam_p ?></td>
                                    <td><?= $total_h_jam_s ?></td>
                                    <td><?= $total_hsl_jam_s ?></td>
                                    <!-- <td><?= number_format($total) ?></td> -->
                                </tr>
                                <?php } else {
                                        echo "<tr>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        <td class='text-center'>Data Not Exists</td>
                                        </tr>";
                                    } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal edit -->
        <?php if (isset($_POST['cari'])) {
                foreach ($staf as $b) { ?>
        <div id="edit<?= $b['id_p_lmbr'] ?>" class="modal fade">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Edit Data Karyawan</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?= base_url() . 'index.php/Admin/edit_hsl_p_lmbr' ?>">
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-4 text-left">Tanggal</label>
                                <div class="col-md-3">
                                    <input class="form-control-plaintext" type="text" name="tgl" value="<?= date('d-m-Y', strtotime($b['tgl_p'])) ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-4 text-left">Jam Awal</label>
                                <div class="col-md-3">
                                    <input class="form-control-plaintext" type="time" name="awal" value="<?= date('H:i:s', strtotime($b['awal'])) ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="control-label col-md-4 text-left">Jam Akhir</label>
                                <div class="col-md-3">
                                    <input class="form-control-plaintext" type="time" name="akhir" value="<?= date('H:i:s', strtotime($b['akhir'])) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_p_lmbr" value="<?= $b['id_p_lmbr'] ?>">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tidak</button>
                            <button class="btn btn-success">Ya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php }
            } ?>

        <!-- Modal DELET -->
        <?php if (isset($_POST['cari'])) {
                foreach ($staf as $b) { ?>
        <div id="delet<?= $b['id_p_lmbr'] ?>" class="modal fade">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Hapus Data Karyawan</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?= base_url() . 'index.php/Admin/delet_hsl_p_lmbr' ?>">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus <b><?= $b['npp'] . " | " . $b['nama_p_lmbr'] ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_p_lmbr" value="<?= $b['id_p_lmbr'] ?>">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tidak</button>
                            <button class="btn btn-danger">Ya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php }
            } ?>

        <!-- The Modal -->
        <div class="modal fade" id="data_jam_kerja">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Jam Kerja Ketentuan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="tile-body">
                            <form method="post" id="import_csv" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
                                    <button type="submit" title="Import CSV" name="import_csv" class="btn btn-info" id="import_csv_btn">Import CSV</button>
                                </div>
                            </form>
                            <br>
                            <div id="jam_kerja"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="absen">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Absensi Lembur</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="tile-body">
                            <form method="post" id="import_abs" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
                                    <button type="submit" title="Import CSV" name="import_abs" class="btn btn-info" id="import_abs_btn">Import CSV</button>
                                </div>
                            </form>
                            <br>
                            <div id="absensi"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
    <!-- Main Menu area End-->

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

    <script type="text/javascript">
        $('#sampleTable').DataTable();
        $('#absenTable').DataTable();
        $('#upahTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        });

        document.onkeydown = function(e) {
            switch (e.keyCode) {
                // f2
                case 113:
                    $("#data_jam_kerja").modal();
                    break;
                    // esc
                case 27:
                    $("#data_jam_kerja").modal("hide");
                    $("#absen").modal("hide");
                    break;
                    // f4
                case 115:
                    $("#absen").modal();
                    break;

            }
        };

        $(document).ready(function() {

            load_data();
            load_data_absensi();

            function load_data() {
                $.ajax({
                    url: "<?= base_url(); ?>index.php/Admin/tbl_jam_kerja",
                    method: "POST",
                    success: function(data) {
                        $('#jam_kerja').html(data);
                    }
                })
            }

            function load_data_absensi() {
                $.ajax({
                    url: "<?= base_url(); ?>index.php/Admin/tbl_absensi",
                    method: "POST",
                    success: function(data) {
                        $('#absensi').html(data);
                    }
                })
            }

            $('#import_csv').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "<?= base_url(); ?>index.php/Admin/import_jam_kerja",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#import_csv_btn').html('Importing...');
                    },
                    success: function(data) {
                        $('#import_csv')[0].reset();
                        $('#import_csv_btn').attr('disabled', false);
                        $('#import_csv_btn').html('Import Done');
                        load_data();
                    }
                })
            });

            $('#import_abs').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "<?= base_url(); ?>index.php/Admin/import_absensi",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('#import_abs_btn').html('Importing...');
                    },
                    success: function(data) {
                        $('#import_abs')[0].reset();
                        $('#import_abs_btn').attr('disabled', false);
                        $('#import_abs_btn').html('Import Done');
                        load_data_absensi();
                    }
                })
            });
        });
    </script>
</body>

</html>
<?php
}
$this->session->unset_userdata("status_insert");
?>