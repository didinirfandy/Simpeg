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
    <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/welcome/in_admin">PTPN VIII</a>
        
        <?php $this->load->view('template/header') ?>
    
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_admin') ?>

    <main class="app-content">
        <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> REKAP PERINGATAN </h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/Welcome/Rekap_peringatan"> REKAP PERINGATAN</a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title"></h3>
                        <p><a class="btn btn-primary icon-btn" href="<?php echo base_url() ?>index.php/admin/inpt_rekap"><i class="fa fa-plus"></i>Add Item	</a></p>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIK</th>
                                    <th>NAMA</th>
                                    <th>JABATAN</th>
                                    <th>GOLONGAN</th>
                                    <th>JENIS</th>
                                    <th>SANKSI</th>
                                    <th>KASUS KEBUN</th>
                                    <th>NO SURAT</th>
                                    <th>TANGGAL SURAT</th>
                                    <th>MASA BERLAKU</th>
                                    <th>NO PERS</th>
                                    <th>TANGGAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tbrekap->result_array() as $i) { ?>
                                    <tr>
                                        <td><?php echo $i['no'] ?></td>
                                        <td><?php echo $i['nik'] ?></td>
                                        <td><?php echo $i['nama'] ?></td>
                                        <td><?php echo $i['jabatan'] ?></td>
                                        <td><?php echo $i['golongan'] ?></td>
                                        <td><?php echo $i['jenis'] ?></td>
                                        <td><?php echo $i['sanksi'] ?></td>
                                        <td><?php echo $i['kasus_kebun'] ?></td>
                                        <td><?php echo $i['no_surat'] ?></td>
                                        <td><?php echo $i['tgl_surat'] ?></td>
                                        <td><?php echo $i['masa_berlaku'] ?></td>
                                        <td><?php echo $i['no_pers'] ?></td>
                                        <td><?php echo $i['tgl'] ?></td>
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