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

        <?php $this->load->view('template/menu_suadmin') ?>

    <main class="app-content">
        <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Biodata Diri </h1>
            <p><?php echo $status_edit ?></p>
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
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telpon</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Tanggal Login</th>
                                    <th>Activate</th>
                                    <th>Edit</th>
                                    <th>Hak Akses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($ptg->result_array() as $i) { ?>
                                    <tr>
                                        <td><?php echo $i['nama'] ?></td>
                                        <td><?php echo $i['alamat'] ?></td>
                                        <td><?php echo $i['tlp'] ?></td>
                                        <td><?php echo $i['email'] ?></td>
                                        <td><?php echo $i['username'] ?></td>
                                        <td>
                                            <?php
                                                if($i['status']==1){
                                                    echo "<font color='green'>Online</font>";
                                                }
                                                else{
                                                    echo "<font color='red'>Offline</font>";
                                                }
                                            ?>    
                                        </td>
                                        <td><?php echo $i['tgl_login'] ?></td>
                                        <td>
                                            <?php
                                                if($i['valid']==1){
                                                    echo "<font color='green'>Active</font>";
                                                }
                                                else{
                                                    echo "<font color='red'>Inactive</font>";
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="#edit<?php echo $i['id']?>" data-toggle="modal"><button class="btn btn-info" type="button">Edit</button></a>
                                        </td>
                                        <td>
                                            <a href="#delete<?php echo $i['id']?>" data-toggle="modal"><button class="btn btn-danger" type="button">Akses</button></a>
                                        </td>
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
        
            <?php 
                $this->load->view('template/script');
                $this->load->view('modal/super admin/delete_kar');
                $this->load->view('modal/super admin/edit_karyawan');
            ?>
        <!-- Main Menu area End-->

    </body>
</html>
<?php } ?>