<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        $data['tittle'] = "Upah Lembur Perbulan";
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
                <h1><i class="fa fa-clock-o"></i> Upah Lembur Perbulan</h1>
                <p>Menampikan Data Upah Lembur Perbulan</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/Admin/lembur_admin"></a> Upah Lembur Perbulan</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <?php
                            if (isset($_POST['cari_bln'])) {
                                foreach ($upah_bln as $u) { } ?>
                        <h4 class="title">Daftar Lembur Karyawan Bulan
                            <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $date = date('F Y', strtotime($u['tgl']));
                                    echo $date;
                                    ?>
                        </h4>
                        <?php
                            } elseif (empty($_POST['cari_bln'])) { ?>
                        <h4 class="title">Daftar Lembur Karyawan</h4>
                        <?php } ?>
                    </div>
                    <hr align="right" color="black">
                    <div class="row">
                        <div class="form-group mx-sm-3 mb-2">
                            <?= form_open('Admin/lembur_admin/lmbr'); ?>
                            <input type="month" name="tanggal" class="form-control">
                            <small class="form-text text-muted">Pilih Bulan yang akan anda cari</small>
                        </div>
                        <button class="btn btn-info mb-5" name="cari_bln" type="submit"><i class="fa fa-search fa-fw"></i> Cari</button>
                    </div>
                    <?= form_close() ?>
                    <div class="tile">
                        <table class="table table-hover table-bordered" id="upahblnTable">
                            <thead>
                                <tr>
                                    <th>NPP</th>
                                    <th>NAMA KARYAWAN</th>
                                    <th>JABATAN</th>
                                    <th>GOLONGAN / MK</th>
                                    <th>JUMLAH GAJI</th>
                                    <th>UPAH PER-JAM</th>
                                    <th>MAKS JUMLAH JAM</th>
                                    <th>JUMLAH HARI</th>
                                    <th>JUMLAH JAM LEMBUR</th>
                                    <th>JUMLAH JAM KE-1</th>
                                    <th>JAM KE-1 (x 1,5)</th>
                                    <th>JUMLAH JAM KE-2 dst</th>
                                    <th>JAM KE-2 dst (x 2)</th>
                                    <th>JUMLAH LEMBUR</th>
                                    <th>LEMBUR YANG DIBAYAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (isset($_POST['cari_bln'])) {
                                        $no = 1;
                                        $total_lembur = 0;
                                        $total_h_jam_p = 0;
                                        $total_h_jam_s = 0;
                                        $total_hsl_jam_s = 0;
                                        $total = 0;
                                        foreach ($upah_bln as $u) {
                                            if ($u == "") { ?>
                                <tr>
                                    <td colspan="16" class='text-center'>Data Not Exists</td>
                                </tr>
                                <?php }
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
                                    <td><?= number_format($tarif) ?></td>
                                    <td>173</td>
                                    <td>
                                        <?php
                                                $t = $this->Model_admin->get_hari($u['npp']);

                                                echo $t;
                                                ?>
                                    </td>
                                    <td><?= $total_lembur ?></td>
                                    <td><?= $total_h_jam_p ?></td>
                                    <td>
                                        <?php
                                                $i = 1.5;
                                                $jk1 = $total_h_jam_p * $i;
                                                echo $jk1;
                                                ?>
                                    </td>
                                    <td><?= $total_h_jam_s ?></td>
                                    <td>
                                        <?php
                                                $i = 2;
                                                $js1 = $total_h_jam_s * $i;
                                                echo $js1;
                                                ?>
                                    </td>
                                    <td>
                                        <?php
                                                $jl = $js1 + $jk1;
                                                echo $jl;
                                                ?>
                                    </td>
                                    <td>
                                        <?php
                                                $mjj = 173;
                                                if ($jl >= $mjj) {
                                                    $lyb = $mjj * $tarif;
                                                } else {
                                                    $lyb = $jl * $tarif;
                                                }
                                                echo number_format($lyb);
                                                ?>
                                    </td>
                                </tr>
                                <?php } elseif (empty($_POST['cari_bln'])) { ?>
                                <tr>
                                    <td colspan="16" class='text-center'>Data Not Exists</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
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
        $('#upahblnTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        });
    </script>


</body>

</html>
<?php
}
$this->session->unset_userdata("status_insert");
?>