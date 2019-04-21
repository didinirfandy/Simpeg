<!DOCTYPE html>
<html lang="en">
    <head>

        <?php $this->load->view('template/head') ?>

    </head>
    <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/Welcome/in_suadmin">PTPN VIII</a>
        
        <?php $this->load->view('template/header') ?>
    
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_suadmin') ?>

    <main class="app-content">
        <div class="app-title">
        <div>
            <h1><i class="fa fa-pie-chart"></i> Data Karyawan </h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/suadmin/super admin/dt_kar"> Data Karyawan</a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>NAMA</th>
                                    <th>ALAMAT</th>
                                    <th>TELEPON</th>
                                    <th>EMAIL</th>
                                    <th>USERNAME</th>
                                    <th>STATUS</th>
                                    <th>TANGGAL LOGIN</th>
                                    <th>ACTIVE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ptg->result_array() as $k) {?>
                                    <tr>
                                        <td><?php echo $k['nama']?></td>
                                        <td><?php echo $k['alamat']?></td>
                                        <td><?php echo $k['tlp']?></td>
                                        <td><?php echo $k['email']?></td>
                                        <td><?php echo $k['username']?></td>
                                        <td>
                                            <?php 
                                                if($k['status']==1){
                                                    echo "<font color='green'>Online</font>";
                                                }
                                                else {
                                                    echo "<font color='red'>Offline</font>";
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $k['tgl_login']?></td>
                                        <td>
                                            <?php 
                                                if($k['valid']==1){
                                                    echo "<font color='green'>Active</font>";
                                                }
                                                else{
                                                    echo "<font color='red'>Inactive</font>";
                                                }
                                            ?>
                                        </td>
                                    </tr>
                                <?php }?>
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