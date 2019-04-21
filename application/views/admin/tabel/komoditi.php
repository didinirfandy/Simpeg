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
            <h1><i class="fa fa-th-list"></i> KOMODITI </h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tabel</li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel/komoditi"> KOMODITI</a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title"></h3>
                        <p><a class="btn btn-primary icon-btn" href="<?php echo base_url() ?>index.php/admin/input_tabel/komoditi"><i class="fa fa-plus"></i>Add Item	</a></p>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>KODE BUDIDAYA</th>
                                    <th>KODE JENIS PROD</th>
                                    <th>NAMA BUDIDAYA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tkom->result_array() as $i) { ?>
                                    <tr>
                                        <td><?php echo $i['kd_bud'] ?></td>
                                        <td><?php echo $i['kd_jnsprod'] ?></td>
                                        <td><?php echo $i['nm_bud'] ?></td>
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