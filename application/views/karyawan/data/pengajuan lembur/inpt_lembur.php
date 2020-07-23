<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "Form Pengajuan Lembur";
        $this->load->view('template/head', $data);
        ?>

    </head>

    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/Karyawan/in_kar">SIMPEG</a>

            <?php $this->load->view('template/header') ?>

        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_kar') ?>

        <main class="app-content">
            <div class="app-title">
                <div>
                    <h1><i class="fa fa-clock-o"></i> Form Pengajuan Lembur </h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Pengajuan Lembur</li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/karyawan/data/pengajuan cuti/tb_cuti_kadiv"> Form Pengajuan Lembur</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <?= form_open('') ?>

                        <!-- Swetalert Berhasil -->
                        <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
                        <!-- Swetalert Gagal -->
                        <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                        <!-- Swetalert Danger -->
                        <div class="status-danger" data-statusdanger="<?= $this->session->flashdata('statusdanger'); ?>"></div>

                        <h3 class="tile-title"><i class="fa fa-user" aria-hidden="true"></i> Data Pengajuan Lembur Karyawan</h3>
                        
                        
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th width="3%">NPP</th>
                                    <th width="10%">Nama Karyawan</th>
                                    <th width="10%">Jabatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr align="right" color="black">
                    <?= form_close() ?>
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
        <script type="text/javascript">
            
        </script>

    </body>

    </html>
<?php } ?>