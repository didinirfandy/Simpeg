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
            <h1><i class="fa fa-th-list"></i> SDM 04</h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tabel SDM</li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/sdm04"> SDM 04</a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">

                <?php $attributes = array('id_sdm04' => 'regForm'); 
                echo form_open('admin/input_sdm/sdm04',$attributes);?>

                    <h3 class="tile-title">Form Input SDM 04</h3>
                    <p><?php echo $status_insert ?></p>
                    <div class="tile-body">
                        <form>
                            <div class="form-group">
                                <label class="control-label">NPP</label>
                                <input class="form-control" type="number" name="npp" placeholder="NPP">
                            </div>
                            <div class="form-group">
                                <label class="control-label">No Urut</label>
                                <input class="form-control" type="number" name="no_urut" placeholder="Masukan No Urut Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kode Pendidikan</label>
                                <input class="form-control" type="text" name="kd_pend" placeholder="Masukan Kode Pendidikan Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nama </label>
                                <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Pelatihan">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Keterangan </label>
                                <input class="form-control" type="text" name="ket" placeholder="Keterangan">
                            </div>
                            <div class="form-group">
                                <label class="control-label">DNLN</label>
                                <input class="form-control" type="text" name="dnln" placeholder="Masukan DNLN">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tanggal Awal</label>
                                <input class="form-control" type="date" name="tgl_awal" placeholder="Masukan Tanggal Awal ">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tanggal Akhir</label>
                                <input class="form-control" type="date" name="tgl_akhir" placeholder="Masukan Tanggal Akhir">
                            </div>
                            <div class="form-group">
                                <label class="control-label">No Sertifikat</label>
                                <input class="form-control" type="text" name="no_sert" placeholder="Masukan No Sertifikat">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tanggal Sertifikat</label>
                                <input class="form-control" type="date" name="tgl_sert" placeholder="Masukan Tanggal Sertifikasi">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nilai</label>
                                <input class="form-control" type="number" name="nilai" placeholder="Masukan Nilai Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Grade</label>
                                <input class="form-control" type="number" name="grade" placeholder="Masukan Grade Nilai Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Bulan Proses</label>
                                <input class="form-control" type="text" name="bln_proses" placeholder="Bulan Proses">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Stat REC</label>
                                <input class="form-control" type="text" name="stat_rec" placeholder="Stat REC">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tanggal</label>
                                <input class="form-control" type="date" name="tgl" placeholder="Stat REC">
                            </div>
                        </form>
                        <div class="tile-footer">
                        <button class="btn btn-primary" name="submit" type="submit">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="<?php echo base_url() ?>index.php/admin/kembali/out_sdm04"><i class="fa fa-fw fa-lg fa-times-circle"></i>Kembali</a>
                        </div>
                    </div>
                    <?php echo form_close() ?>
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