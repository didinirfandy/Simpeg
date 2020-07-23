<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        $data['tittle'] = "Pendidikan";
        $this->load->view('template/head', $data);
        ?>

</head>

<body class="app sidebar-mini rtl" id="simpan">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?= base_url() ?>index.php/Karyawan/in_kar">SIMPEG</a>

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
                <li class="breadcrumb-item active"><a href="<?= base_url() ?>index.php/karyawan/data/riwayat pendidikan/pend_formal"> Pendidikan </a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title">Riwayat Pendidikan</h3>
                        <!-- Swetalert Berhasil -->
                        <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
                        <!-- Swetalert Gagal -->
                        <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                        <div class="btn-group">
                            <a class="btn btn-primary" href="<?= base_url() ?>index.php/karyawan/riwayat_pndidikan/temp_pen"><i class="fa fa-eye"></i>View Status </a>
                            <a class="btn btn-primary" href="<?= base_url() ?>index.php/karyawan/riwayat_pndidikan/pend"><i class="fa fa-plus"></i>Add Item </a>
                        </div>
                    </div>
                    <hr align="right" color="black">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>No Urut</th>
                                    <th>Pendidikan</th>
                                    <th>Nama Sekolah/Lembaga</th>
                                    <th>Kota</th>
                                    <th>Tahun Mulai</th>
                                    <th>Tahun Selesai</th>
                                    <th>No Ijasah</th>
                                    <th>Tanggal Ijasah</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pend as $p) {
                                        if ($p['ket'] == "") { ?>
                                <tr>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                </tr>
                                <?php } else {
                                            ?>
                                <tr>
                                    <td><?= $p['no_urut'] ?></td>
                                    <?php $tk = $this->Model_karyawan->get_pddk($p['kd_pend']);
                                                foreach ($tk as $nm) { ?>
                                    <td><?= $nm['nama'] ?></td>
                                    <?php } ?>
                                    <td><?= $p['ket'] ?></td>
                                    <td><?= $p['kota'] ?></td>
                                    <td><?= $p['thn_awal'] ?></td>
                                    <td><?= $p['thn_akhir'] ?></td>
                                    <td><?= $p['no_ijasah'] ?></td>
                                    <td><?= $p['tgl_ijasah'] ?></td>
                                    <td><a href="ed_pend/<?= $p['no_urut'] ?>" class="btn btn-info "><i class="fa fa-pencil"></i>Edit </a>&nbsp;&nbsp;&nbsp;
                                        <!-- <a href="<?= base_url(); ?>/index.php/Karyawan/delet_sdm03/<?= $p['id_sdm03']; ?>" class="btn btn-danger" ><i class="fa fa-times"></i>Delet </a> -->
                                    </td>
                                </tr>
                                <?php }
                                    } ?>
                            </tbody>
                        </table>
                    </div>
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
            $('#tk_pend1').change(function() {
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
                        $('#nama').html(data.list_nama1).show();
                        $('#kd_pend').html(data.list_kd_pend1).show();
                    }
                });
            });

            $('#tk_pend2').change(function() {
                var no = $(tk_pend).val();
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('index.php/Karyawan/pendedit') ?>",
                    dataType: "JSON",
                    data: {
                        no: no
                    },
                    async: false,
                    success: function(data) {
                        $('#nama').html(data.list_nama2).show();
                        $('#kd_pend').html(data.list_kd_pend2).show();
                    }
                });
            });
        });

        const statusinsert = $('.status-insert').data('statusinsert');
        // console.log(statusinsert);
        if (statusinsert) {
            swal({
                title: "Berhasil " + statusinsert,
                text: "DATA AKAN DI VERIFIKASI OLEH ADMIN",
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
    </script>

</body>

</html>
<?php }
$this->session->unset_userdata("status_insert"); ?>