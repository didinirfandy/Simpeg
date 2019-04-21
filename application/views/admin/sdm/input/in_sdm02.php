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
            <h1><i class="fa fa-th-list"></i> SDM 02</h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tabel SDM</li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/sdm02"> SDM 02</a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">

                <?php $attributes = array('id' => 'regForm'); 
                echo form_open('admin/input_sdm/sdm02',$attributes);?>

                    <h3 class="tile-title">Form Input SDM 02</h3>
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
                                <label class="control-label">Nama Panjang</label>
                                <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Panjang Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Hubungan Keluarga</label>
                                <input class="form-control" type="text" name="hbg_klg" placeholder="Masukan Hubungan Keluarga Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" name="tgl_lhr" placeholder="Masukan Tanggal Lahir Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kota Lahir</label>
                                <input class="form-control" type="text" name="kota_lhr" placeholder="Masukan Nama Kota Lahir Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Negara Lahir</label>
                                <input class="form-control" type="text" name="ngr_lhr" placeholder="Masukan Nama Negara Lahir Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Jenis Kelamin</label>
                                <input class="form-control" type="text" name="kelamin" placeholder="Masukan Jenis Kelamin Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Golongan Darah</label>
                                <input class="form-control" type="text" name="gol_darah" placeholder="Masukan Golongan Darah Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Agama</label>
                                <input class="form-control" type="text" name="agama" placeholder="Masukan Agama Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tingkat Pendidikan</label>
                                <input class="form-control" type="text" name="tk_ped" placeholder="Masukan Tingkat Pendidikan Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tingkat Sipil</label>
                                <input class="form-control" type="text" name="tk_sipil" placeholder="Masukan Tingkat Sipil Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Status Kerja</label>
                                <input class="form-control" type="text" name="st_kerja" placeholder="Masukan Status Kerja Anda Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tanggal Nikah</label>
                                <input class="form-control" type="date" name="tgl_nkh" placeholder="Masukan Tanggal Nikah Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tanggal Cerai</label>
                                <input class="form-control" type="date" name="tgl_cerai" placeholder="Masukan Tanggal Cerai Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tanggal Meninggal</label>
                                <input class="form-control" type="date" name="tgl_mgl" placeholder="Masukan Tanggal Meninggal Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Alamat</label>
                                <textarea class="form-control" rows="2" name="alamat" placeholder="Masukan Alamat Anda" ></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">No KK</label>
                                <input class="form-control" type="number" name="no_kk" placeholder="Masukan No KK Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">No Nik</label>
                                <input class="form-control" type="number" name="nik" placeholder="Masukan No Nik Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">No BPJS</label>
                                <input class="form-control" type="number" name="no_bpjs" placeholder="Masukan No BPJS Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Bulan Proses</label>
                                <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Stat REC</label>
                                <input class="form-control" type="text" name="stat_rec" placeholder="Masukan Stat REC">
                            </div>
                        </form>
                        <div class="tile-footer">
                        <button class="btn btn-primary" name="submit" type="submit">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="<?php echo base_url() ?>index.php/admin/kembali/out_sdm02"><i class="fa fa-fw fa-lg fa-times-circle"></i>Kembali</a>
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