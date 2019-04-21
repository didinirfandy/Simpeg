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
            <h1><i class="fa fa-th-list"></i> Biodata Diri </h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Data Diri</li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/karyawan/data/data diri/bio_diri"> Biodata Diri</a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title"></h3>
                        <p><a class="btn btn-primary icon-btn" href="<?php echo base_url() ?>index.php/Tabel_CV/view_cv"><i class="fa fa-print"></i>Cetak CV </a>
                    </div>
                    <hr align="right" color="black" >
                    <div class="row">
                        <div class="offset-lg-1">
                            <form>
                            <?php foreach ($t_biodiri as $k) { ?>
                                
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label"><p class="font-weight-bold">No Induk Pegawai</p></label>
                                    <div class="col-sm-6">
                                        <input type="text" readonly class="form-control-plaintext" value=":         <?php echo $k['npp']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label"><p class="font-weight-bold">Nama Lengkap</p></label>
                                    <div class="col-sm-6">
                                        <input type="text" readonly class="form-control-plaintext" value=":         <?php echo $k['nama']?>">
                                    </div>
                                </div>
                                <?php 
                                $golbaru = $this->Model_karyawan->get_gol_akhir($k['npp']);
                                foreach ($golbaru as $d) { ?>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label"><p class="font-weight-bold">Pangkat / Golongan</p></label>
                                    <div class="col-sm-6">
                                    <?php 
                                    $gol = $this->Model_karyawan->get_gol($d['golongan']);
                                    foreach ($gol as $y): ?>
                                        <input type="text" readonly class="form-control-plaintext" value=":         <?php echo $y['gol']?> / <?php echo $d['mk']?>">
                                    <?php endforeach ?>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label"><p class="font-weight-bold">Tempat / Tanggal Lahir</p></label>
                                    <div class="col-sm-6">
                                        <input type="text" readonly class="form-control-plaintext" value=":         <?php echo $k['kota_lhr']?> / <?php echo $k['tgl_lhr']?>">
                                    </div>
                                </div>
                                <?php 
                                $agama = $this->Model_karyawan->get_agama($k['agama']);
                                foreach ($agama as $q): ?>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label"><p class="font-weight-bold">Agama</p></label>
                                    <div class="col-sm-6">
                                        <input type="text" readonly class="form-control-plaintext" value=":         <?php echo $q['nm_agama']?>">
                                    </div>
                                </div>
                                <?php endforeach ?>
                                <?php
                                $alamat = $this->Model_karyawan->almt($k['npp']);
                                foreach ($alamat as $v) { ?>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label"><p class="font-weight-bold">Alamat Kantor</p></label>
                                    <div class="col-sm-6">
                                        <?php
                                        $ini = $this->Model_karyawan->unit($v['kd_unit']);
                                        foreach ($ini as $p) { ?>
                                        <input type="text" readonly class="form-control-plaintext" value=":         <?php echo $p['nm_unit']?>">
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label"><p class="font-weight-bold">Alamat Rumah</p></label>
                                    <div class="col-sm-6">
                                        <input type="text" readonly class="form-control-plaintext" value=":         <?php echo $k['alamat_tgl']?>">
                                    </div>
                                </div>
                                <?php
                                $jk = $this->Model_karyawan->get_jenis_kelamin($k['j_kelamin']);
                                foreach ($jk as $z): ?>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label"><p class="font-weight-bold">Jenis Kelamin</p></label>
                                    <div class="col-sm-6">
                                        <input type="text" readonly class="form-control-plaintext" value=":         <?php echo $z['nm_kelamin']?>">
                                    </div>
                                </div>
                                <?php endforeach ?>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label"><p class="font-weight-bold">Golongan Darah</p></label>
                                    <div class="col-sm-6">
                                        <input type="text" readonly class="form-control-plaintext" value=":         <?php echo $k['gol_darah']?>">
                                    </div>
                                </div>
                                <?php 
                                $sipil = $this->Model_karyawan->get_sipil($k['st_sipil']);
                                foreach ($sipil as $s): ?>
                                <div class="form-group row">
                                    <label class="col-sm-6 col-form-label"><p class="font-weight-bold">Status Pernikahan</p></label>
                                    <div class="col-sm-6">
                                        <input type="text" readonly class="form-control-plaintext" value=":         <?php echo $s['nm_sipil']?>">
                                    </div>
                                </div>
                                <?php endforeach ?>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                    <hr align="right" color="black" >
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
    </body>
</html>
<?php } ?>