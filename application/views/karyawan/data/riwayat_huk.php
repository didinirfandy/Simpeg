<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        $data['tittle'] = "Riwayat Hukuman";
        $this->load->view('template/head', $data);
        ?>

</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/Karyawan/in_kar">SIMPEG</a>

        <?php $this->load->view('template/header') ?>

    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

    <?php $this->load->view('template/menu_kar') ?>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-gavel"></i> Riwayat Hukuman </h1>
                <p></p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/karyawan/data/riwayat_huk"> Riwayat Hukuman</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title">Riwayat Hukuman</h3>
                    </div>
                    <hr align="right" color="black">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis</th>
                                    <th>Sanksi</th>
                                    <th>Kasus Kebun</th>
                                    <th>No Surat</th>
                                    <th>Tanggal Surat</th>
                                    <th>Masa berlaku</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($hkm as $h) {
                                        if ($h['jns_hukum'] == "") { ?>
                                <tr>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                </tr>
                                <?php } else { ?>
                                <tr>
                                    <td><?= $h['no_urut'] ?></td>
                                    <td><?= $h['jns_hukum'] ?></td>
                                    <td><?= $h['uraian'] ?></td>
                                    <td></td>
                                    <td><?= $h['no_sk'] ?></td>
                                    <td><?= $h['tgl_sk'] ?></td>
                                    <td><?= date('d-m-Y', strtotime($h['masa_berlaku'])) ?></td>
                                </tr>
                                <?php }
                                    } ?>
                                <tr>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                    <td class='text-center'>Data Not Exists</td>
                                </tr>
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

</body>

</html>
<?php } ?>