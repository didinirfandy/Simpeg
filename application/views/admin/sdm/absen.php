<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        $data['tittle'] = "Data Absensi";
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
                <h1><i class="fa fa-clock-o"></i> Data Absensi</h1>
                <p>Menampikan Data Diri Absensi</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tabel Kepegawaian</li>
                <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/admin/tabel_sdm/sdm02"></a>Data Absensi</li> <!-- ini juga ganti sesuaikan -->
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h4 class="title">Data Absensi</h4>
                    </div>
                    <hr align="right" color="black">
                    <div class="tile-body">
                        <form method="post" id="import_csv" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="file" name="csv_file" id="csv_file" required accept=".csv" />
                                <button type="submit" title="Import CSV" name="import_csv" class="btn btn-info" id="import_csv_btn">Import CSV</button>
                            </div>
                        </form>
                        <br>
                        <div id="absensi"></div>
                        <!-- <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NPP</th>
                                    <th>NAMA KARYAWAN</th>
                                    <th>TANGGAL</th>
                                    <th>JAM MASUK</th>
                                    <th>JAM KELUAR</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($absen as $b) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $b['npp'] ?></td>
                                    <td><?= $b['nama'] ?></td>
                                    <td><?= date('d-m-Y', strtotime($b['tgl'])) ?></td>
                                    <td><?= date('H:i:s', strtotime($b['masuk'])) ?></td>
                                    <td><?= date('H:i:s', strtotime($b['keluar'])) ?></td>
                                    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet<?= $b['id_absen'] ?>"><i class="fa fa-fw fa-lg fa-times"></i>Delet </button></td> 
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal DELET -->
        <!-- <?php
            foreach ($absen as $b) { ?>
        <div id="delet<?= $b['id_absen'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                Modal content
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Hapus Data Keluarga Karyawan</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?= base_url() . 'index.php/Admin/delet_sdm02' ?>">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus <b><?= $b['npp'] . " | " . $b['nama'] ?></b></p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_absen" value="<?= $b['id_absen'] ?>">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tidak</button>
                            <button class="btn btn-danger">Ya</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <?php
            } ?> -->

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

            load_data_absensi();

            function load_data_absensi() {
                $.ajax({
                    url: "<?= base_url(); ?>index.php/Admin/tbl_absensi",
                    method: "POST",
                    success: function(data) {
                        $('#absensi').html(data);
                    }
                })
            }

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