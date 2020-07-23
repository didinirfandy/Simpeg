<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        $data['tittle'] = "Kuota Cuti Kayrawan";
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
                <h1><i class="fa fa-user-times"></i> Kuota Cuti Kayrawan</h1>
                <p>Menampilkan Data Kuota Cuti Karyawan</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"> Cuti Karyawan</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/hak_akses/hak"> Kuota Cuti Kayrawan </a></li>
            </ul>
        </div>
        <?= $this->session->flashdata('msg') ?>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <!-- Swetalert Berhasil -->
                    <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
                    <!-- Swetalert Gagal -->
                    <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                    <!-- Swetalert Pass salah -->
                    <div class="status-pass" data-statuspass="<?= $this->session->flashdata('statuspass'); ?>"></div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="c_pjg-tab" data-toggle="tab" href="#c_pjg" role="tab" aria-controls="c_pjg" aria-selected="true">Cuti Panjang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="c_thn-tab" data-toggle="tab" href="#c_thn" role="tab" aria-controls="c_thn" aria-selected="false">Cuti Tahunan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="c_skt-tab" data-toggle="tab" href="#c_skt" role="tab" aria-controls="c_skt" aria-selected="false">Cuti Sakit</a>
                        </li>
                        <!-- <li class="nav-item">
                                                                                                                        <a class="nav-link" id="c_ade-tab" data-toggle="tab" href="#c_ade" role="tab" aria-controls="c_ade" aria-selected="false">Cuti Melahirkan</a>
                                                                                                                    </li>
                                                                                                                    <li class="nav-item">
                                                                                                                        <a class="nav-link" id="c_kk-tab" data-toggle="tab" href="#c_kk" role="tab" aria-controls="c_kk" aria-selected="false">Cuti Keguguran Kandungan</a>
                                                                                                                    </li>
                                                                                                                    <li class="nav-item">
                                                                                                                        <a class="nav-link" id="c_pms-tab" data-toggle="tab" href="#c_pms" role="tab" aria-controls="c_pms" aria-selected="false">Cuti Haid</a>
                                                                                                                    </li> -->
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- CUti Panjang -->
                        <div class="tab-pane" id="c_pjg" role="tabpanel" aria-labelledby="c_pjg-tab">
                            <hr align="right" color="black">
                            <div class="tile-title-w-btn">
                                <h4 class="title">Data Kuota Cuti Panjang</h4>
                            </div>
                            <div class="tile-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>NPP</th>
                                            <th>NAMA</th>
                                            <th>JUMLAH CUTI</th>
                                            <th>SISA CUTI PANJANG</th>
                                            <th>JENIS CUTI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($quota_pjg as $v) { ?>
                                        <tr>
                                            <td><?= $v['npp'] ?></td>
                                            <td><?= $v['nama'] ?></td>
                                            <td>
                                                <?php
                                                        $npp = $v['npp'];
                                                        $jumlah = $this->db->query("SELECT SUM(jmlh_hari) AS jumlah FROM tb_cuti_pjg WHERE npp='$npp' GROUP BY npp='$npp'")->result_array();
                                                        foreach ($jumlah as $key) {
                                                            echo $key['jumlah'];
                                                        }
                                                        ?>
                                            </td>
                                            <td><?= $v['sisa_tb_cuti_pjg'] ?></td>
                                            <td><?= $v['jns_cuti'] ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End Cuti Panjang -->

                        <!-- Cuti Tahunan -->
                        <div class="tab-pane active" id="c_thn" role="tabpanel" aria-labelledby="c_thn-tab">
                            <hr align="right" color="black">
                            <div class="tile-title-w-btn">
                                <h4 class="title">Data Kuota Cuti Tahunan</h4>
                            </div>
                            <div class="tile-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>NPP</th>
                                            <th>NAMA</th>
                                            <th>JUMLAH CUTI</th>
                                            <th>SISA CUTI TAHUNAN</th>
                                            <th>JENIS CUTI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($quota_thn as $v) { ?>
                                        <tr>
                                            <td><?= $v['npp'] ?></td>
                                            <td><?= $v['nama'] ?></td>
                                            <td>
                                                <?php
                                                        $npp = $v['npp'];
                                                        $jumlah = $this->db->query("SELECT SUM(jmlh_hari) AS jumlah FROM tb_cuti_thn WHERE npp='$npp' GROUP BY npp='$npp'")->result_array();
                                                        foreach ($jumlah as $key) {
                                                            echo $key['jumlah'];
                                                        }
                                                        ?>
                                            </td>
                                            <td><?= $v['sisa_tb_cuti_thn'] ?></td>
                                            <td><?= $v['jns_cuti'] ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End Cuti Tahunan -->

                        <!-- Cuti Sakit -->
                        <div class="tab-pane" id="c_skt" role="tabpanel" aria-labelledby="c_skt-tab">
                            <hr align="right" color="black">
                            <div class="tile-title-w-btn">
                                <h4 class="title">Data Kuota Cuti Sakit</h4>
                            </div>
                            <div class="tile-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>NPP</th>
                                            <th>NAMA</th>
                                            <th>JUMLAH CUTI</th>
                                            <th>JENIS CUTI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($quota_sakit as $v) { ?>
                                        <tr>
                                            <td><?= $v['npp'] ?></td>
                                            <td><?= $v['nama'] ?></td>
                                            <td>
                                                <?php
                                                        $npp = $v['npp'];
                                                        $jumlah = $this->db->query("SELECT SUM(jmlh_hari) AS jumlah FROM `tb_cuti_sakit` WHERE npp=$npp GROUP BY npp=$npp")->result_array();
                                                        foreach ($jumlah as $key) {
                                                            echo $key['jumlah'];
                                                        }
                                                        ?>
                                            </td>
                                            <td><?= $v['jns_cuti'] ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End Cuti Sakit -->

                        <!-- Cuti Melahirkan -->
                        <div class="tab-pane" id="c_ade" role="tabpanel" aria-labelledby="c_ade-tab">

                        </div>
                        <!-- End Cuti Melahirkan -->

                        <!-- Curi Keguguran Kandungan -->
                        <div class="tab-pane" id="c_kk" role="tabpanel" aria-labelledby="c_kk-tab">

                        </div>
                        <!-- End Curi Keguguran Kandungan -->

                        <!-- Curi Haid -->
                        <div class="tab-pane" id="c_pms" role="tabpanel" aria-labelledby="c_pms-tab">

                        </div>
                        <!-- End Curi Haid -->


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
        const statusinsert = $('.status-insert').data('statusinsert');
        // console.log(statusinsert);
        if (statusinsert) {
            swal({
                title: "Berhasil " + statusinsert,
                text: "Data Berhasil Di Input",
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

        // const statusmsg = $('.status-msg').data('statusmsg');
        // // console.log(statusmsg);
        // if (statusmsg) {
        //     $.notify({
        //         title: "Warning" + statusmsg "",
        //         message: "Something cool is just updated!",
        //         icon: 'fa fa-check'
        //     }, {
        //         type: "info"
        //     });
        // }

        const statuspass = $('.status-pass').data('statuspass');
        // console.log(statuspass);
        if (statuspass) {
            swal({
                title: "Gagal " + statuspass,
                text: "PASSWORD TIDAK COCOK!!! EDIT KEMBALI DATA ANDA DENGAN BENAR",
                type: "error",
                timer: 8000,
                showConfirmButton: false
            });
        }
    </script>
    <!-- Main Menu area End-->

</body>

</html>
<?php } ?>