<?php
if(empty($_SESSION['status_login'])){
    redirect();
}
else{
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <?php $this->load->view('template/head') ?>

    </head>
    <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/Welcome/in_kar">PTPN VIII</a>
        
        <?php $this->load->view('template/header') ?>
    
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_kar') ?>

    <main class="app-content">
        <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Pendidikan Formal </h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Riwayat Pendidikan</li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/karyawan/data/riwayat pendidikan/pend_formal"> Pendidikan Formal</a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title"></h3>
                        <p><a class="btn btn-primary icon-btn" href=""><i class="fa fa-plus"></i>Add Item	</a></p>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pendidikan</th>
                                    <th>Nama Sekolah/Lembaga</th>
                                    <th>Kota</th>
                                    <th>Tahun Mulai</th>
                                    <th>Tahun Selesai</th>
                                    <th>No Ijasah</th>
                                    <th>Tanggal Ijasah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pend as $p) {?>
                                    <tr>
                                        <td><?php echo $p['no_urut']?></td>
                                        <?php $tk = $this->Model_karyawan->get_pddk($p['kd_pend']);
                                        foreach ($tk as $nm) { ?>
                                            <td><?php echo $nm['nm_pend']?></td>
                                        <?php } ?>
                                        <td><?php echo $p['ket']?></td>
                                        <td><?php echo $p['kota']?></td>
                                        <td><?php echo $p['thn_awal']?></td>
                                        <td><?php echo $p['thn_akhir']?></td>
                                        <td><?php echo $p['no_ijasah']?></td>
                                        <td><?php echo $p['tgl_ijasah']?></td>
                                    </tr>
                                <?php } ?>
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