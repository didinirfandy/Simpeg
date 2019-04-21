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
            <h1><i class="fa fa-th-list"></i> Biodata Keluarga </h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Data Diri</li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/karyawan/data/data diri/bio_kel"> Biodata Keluarga</a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title"></h3>
                        <p><a class="btn btn-primary icon-btn" href="#"><i class="fa fa-plus"></i>Add Item	</a></p>
                    </div>
                    <hr align="right" color="black" >
                    <div class="tile">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Hubungan Keluarga</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Umur</th>
                                    <th>Golongan Darah</th>
                                    <th>Tingkat Pendidikan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($t_kel as $v) { ?>
                                    <tr>
                                        <td><?php echo $v['no_urut']?></td>
                                        <td><?php echo $v['nama']?></td>
                                        <?php $hbg = $this->Model_karyawan->hubungan($v['hbg_klg']);
                                        foreach ($hbg as $h) {?>
                                            <td><?php echo $h['nama']?></td>
                                        <?php } ?>
                                        <td><?php echo $v['kota_lhr']?></td>
                                        <td><?php echo $v['tgl_lhr']?></td>
                                        <?php   
                                            $lahir    = new DateTime(date('Y-m-d', strtotime($v['tgl_lhr'])));
                                            $sekarang = new DateTime(date('Y-m-d'));
                                            $tgl      = $lahir->diff($sekarang);
                                            echo "<td>".$tgl->y."</td>"
                                        ?>
                                        <td><?php echo $v['gol_darah']?></td>
                                        <td><?php echo $v['tk_ped']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr align="right" color="black" >
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