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
            <h1><i class="fa fa-th-list"></i> SDM 16</h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tabel SDM</li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/sdm16"> SDM 16</a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">

                <?php $attributes = array('id' => 'regForm'); 
                echo form_open('admin/input_sdm/sdm16',$attributes);?>

                    <h3 class="tile-title">Form Input SDM 16</h3>
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
                                <label class="control-label">Status Pegawai</label>
                                <input class="form-control" type="text" name="st_peg" placeholder="Masukan Status Pegawai">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Golongan</label>
                                <input class="form-control" type="text" name="golongan" placeholder="Masukan Golongan">
                            </div>
                            <div class="form-group">
                                <label class="control-label">MK</label>
                                <input class="form-control" type="text" name="mk" placeholder="Masukan MK">
                            </div>
                            <div class="form-group">
                                <label class="control-label">TMT</label>
                                <input class="form-control" type="date" name="tmt" placeholder="Masukan TMT">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Jenis Naik</label>
                                <input class="form-control" type="text" name="jns_naik" placeholder="Masukan Jenis Naik">
                            </div>
                            <div class="form-group">
                                <label class="control-label">No SK</label>
                                <input class="form-control" type="number" name="no_sk" placeholder="Masukan No SK">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tanggal SK</label>
                                <input class="form-control" type="date" name="tgl_sk" placeholder="Masukan Tanggal SK">
                            </div>
                            <div class="form-group">
                                <label class="control-label">NPP Jabatan</label>
                                <input class="form-control" type="number" name="npp_jbt" placeholder="Masukan NPP Jabatan">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Bulan Proses</label>
                                <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kode Kelas</label>
                                <input class="form-control" type="text" name="kd_kelas" placeholder="Masukan Kode Kelas">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Stat REC</label>
                                <input class="form-control" type="text" name="stat_rec" placeholder="Masukan Stat REC">
                            </div>
                        </form>
                        <div class="tile-footer">
                        <button class="btn btn-primary" name="submit" type="submit">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="<?php echo base_url() ?>index.php/admin/kembali/out_sdm16"><i class="fa fa-fw fa-lg fa-times-circle"></i>Kembali</a>
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