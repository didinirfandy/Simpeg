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
            <h1><i class="fa fa-th-list"></i> PENDIDIKAN </h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tabel</li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel/pendidikan"> PENDIDIKAN </a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">

                <?php $attributes = array('id' => 'regForm'); 
                echo form_open('admin/input_tabel/pendidikan',$attributes);?> 

                    <h3 class="tile-title">Form Input Tabel Pendidikan</h3>
                    <p><?php echo $status_insert ?></p>
                    <div class="tile-body">
                        <form>
                            <div class="form-group">
                                <label class="control-label"> Kode Pendidikan </label>
                                <input class="form-control" type="text" name="kd_pend" placeholder="Masukan Kode Pendidikan">
                            </div>
                            <div class="form-group">
                                <label class="control-label"> Nama Pendidikan </label>
                                <input class="form-control" type="text" name="nm_pend"  placeholder="Masukan Nama Pendidikan">
                            </div>
                            <div class="form-group">
                                <label class="control-label"> Stat REC </label>
                                <input class="form-control" type="text" name="stat_rec"  placeholder="Stat REC">
                            </div>
                        </form>
                        <div class="tile-footer">
                        <button class="btn btn-primary" name="submit" type="submit">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="<?php echo base_url() ?>index.php/admin/kembali_tabel/out_pendidikan"><i class="fa fa-fw fa-lg fa-times-circle"></i>Kembali</a>
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