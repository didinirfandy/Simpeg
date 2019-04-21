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
            <h1><i class="fa fa-th-list"></i> SDM 01</h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tabel SDM</li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/sdm01"> SDM 01</a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">

                <?php $attributes = array('id' => 'regForm'); 
                echo form_open('admin/input_sdm/sdm01',$attributes);?> 

                    <h3 class="tile-title">Form Input SDM 01</h3>
                    <p><?php echo $status_insert ?></p>
                    <div class="tile-body">
                        <form>
                            <div class="form-group">
                                <label class="control-label">NPP</label>
                                <input class="form-control" type="text"  name="npp" placeholder="NPP" require>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama" placeholder="Masukan Nama Lengkap Anda" pattern="[A-Za-z\s]{1,20}" title="Harus Menggunakan Huruf(1-20)" require>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nama Panggilan</label>
                                <input class="form-control" type="text" name="nm_pgl" placeholder="Masukan Nama Panggilan Anda" require>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Gelar Depan Anda</label>
                                <input class="form-control" type="text"  name="glr_dpn" placeholder="Masukan Gelar Depan Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Gelar Belakang Anda</label>
                                <input class="form-control" type="text"  name="glr_blk" placeholder="Masukan Gelar Belakang Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kota Lahir</label>
                                <input class="form-control" type="text"  name="kota_lhr" placeholder="Masukan Nama Kota Lahir Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Provinsi Lahir</label>
                                <input class="form-control" type="text"  name="prov_lhr" placeholder="Masukan Nama Provinsi Lahir Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Negara Lahir</label>
                                <input class="form-control" type="text"  name="ngr_lhr" placeholder="Masukan Nama Negara Lahir Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" name="tgl_lhr"  placeholder="Masukan Tanggal Lahir Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Jenis Kelamin</label>
                                <input class="form-control" type="text"  name="j_kelamin" placeholder="Masukan Jenis Kelamin Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Golongan Darah</label>
                                <input class="form-control" type="text"  name="gol_darah" placeholder="Masukan Golongan Darah Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Agama</label>
                                <input class="form-control" type="text" name="agama"  placeholder="Masukan Agama Anda Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Tanggal Masuk</label>
                                <input class="form-control" type="date"  name="tgl_masuk" placeholder="Masukan Tanggal Masuk Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Status Sipil</label>
                                <input class="form-control" type="text"  name="st_sipil" placeholder="Masukan Status Sipil Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Jumlah Anak</label>
                                <input class="form-control" type="text" name="jmlh_ank"  placeholder="Masukan Jumlah Anak Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">No Astek</label>
                                <input class="form-control" type="number" name="no_astek"  placeholder="Masukan No Astek Anda" >
                            </div>
                            <div class="form-group">
                                <label class="control-label">No Pens</label>
                                <input class="form-control" type="text" name="no_pens"  placeholder="Masukan No Pens Anda" >
                            </div>
                            <div class="form-group">
                                <label class="control-label">No NPWP</label>
                                <input class="form-control" type="text" name="npwp"  placeholder="Masukan No NPWP Anda" >
                            </div>
                            <div class="form-group">
                                <label class="control-label">Alamat Tinggal</label>
                                <textarea class="form-control" rows="4" name="alamat_tgl" placeholder="Enter your address" ></textarea>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kode Lokasi</label>
                                <input class="form-control" type="number" name="kd_lokasi"  placeholder="Masukan Kode Lokasi Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kode Pos</label>
                                <input class="form-control" type="number" name="kode_pos"  placeholder="Masukan Kode Pos Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">No Telepon</label>
                                <input class="form-control" type="number" name="no_telp"  placeholder="Masukan No Telepon Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">No NIK</label>
                                <input class="form-control" type="text" name="no_nik"  placeholder="Masukan No NIK Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">No KK</label>
                                <input class="form-control" type="number" name="no_kk"  placeholder="Masukan No KK Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">No BPJS</label>
                                <input class="form-control" type="text" name="no_bpjs"  placeholder="Masukan No BPJS Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">User Id</label>
                                <input class="form-control" type="text" name="user_id"  placeholder="Masukan User Id Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Bln Proses</label>
                                <input class="form-control" type="text" name="bln_proses"  placeholder="Masukan Bln Proses Anda">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Keterangan</label>
                                <input class="form-control" type="text" name="ket"  placeholder="Keterangan">
                            </div>
                        </form>
                        <div class="tile-footer">
                            <button class="btn btn-primary" name="submit" type="submit">
                            <i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-secondary" href="<?php echo base_url() ?>index.php/admin/kembali/out_sdm01"><i class="fa fa-fw fa-lg fa-times-circle"></i>Kembali</a>
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