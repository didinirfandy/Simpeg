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
            <h1><i class="fa fa-th-list"></i> SDM 03</h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tabel SDM</li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/sdm03"> SDM 03</a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">

                <?php $attributes = array('id_sdm03' => 'regForm'); 
                echo form_open('admin/input_sdm/sdm03',$attributes);?>

                    <h3 class="tile-title">Form Input SDM 03</h3>
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
                                <label class="control-label">Tingkat Pendidikan</label>
                                <input class="form-control" type="text" name="tk_pend" placeholder="Masukan Tingkat Pendidikan Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kode Pendidikan</label>
                                <input class="form-control" type="text" name="kd_pend" placeholder="Masukan Kode Pendidikan Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nama Sekolah</label>
                                <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Sekolah Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kota </label>
                                <input class="form-control" type="text" name="kota" placeholder="Masukan Kota Sekolah Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Status Akreditasi</label>
                                <input class="form-control" type="text" name="st_akred" placeholder="Masukan Status Akreditasi Sekolah Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">DNLN</label>
                                <input class="form-control" type="text" name="dnln" placeholder="Masukan DNLN Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tahun Awal</label>
                                <input class="form-control" type="number" name="thn_awal" placeholder="Masukan Tahun Awal Sekolah">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tahun Akhir</label>
                                <input class="form-control" type="number" name="thn_akhir" placeholder="Masukan Tahun Akhir Sekolah">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Status Lulus</label>
                                <input class="form-control" type="text" name="st_lulus" placeholder="Masukan Status Lulus Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">No Ijasah</label>
                                <input class="form-control" type="number" name="no_ijasah" placeholder="Masukan No Ijasah Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tanggal Ijasah</label>
                                <input class="form-control" type="date" name="tgl_ijasah" placeholder="Masukan Tanggal Ijasah Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nilai</label>
                                <input class="form-control" type="number" name="nilai" placeholder="Masukan Nilai Ijasah Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Grade</label>
                                <input class="form-control" type="text" name="grade" placeholder="Masukan Grade Nilai Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Ket</label>
                                <input class="form-control" type="text" name="ket" placeholder="Keterangan">
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
                                <label class="control-label">Tanggal </label>
                                <input class="form-control" type="date" name="tgl" placeholder="Tanggal">
                            </div>
                        </form>
                        <div class="tile-footer">
                        <button class="btn btn-primary" name="submit" type="submit">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="<?php echo base_url() ?>index.php/admin/kembali/out_sdm03"><i class="fa fa-fw fa-lg fa-times-circle"></i>Kembali</a>
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