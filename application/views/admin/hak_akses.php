<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        $data['tittle'] = "Hak Akses Karyawan";
        $this->load->view('template/head', $data);
        ?>

</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/Admin/in_admin">SIMPEG</a>

        <?php $this->load->view('template/header_ad') ?>

    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

    <?php $this->load->view('template/menu_admin') ?>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-key"></i> Hak Akses Karyawan</h1>
                <p>Memberi Hak Akses Karyawan</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/hak_akses/hak"> Hak Akses Karyawan </a></li>
            </ul>
        </div>
        <?= $this->session->flashdata('msg') ?>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title">Tabel Hak Akses</h3>

                        <!-- Swetalert Berhasil -->
                        <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
                        <!-- Swetalert Gagal -->
                        <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                        <!-- Swetalert Pass salah -->
                        <div class="status-pass" data-statuspass="<?= $this->session->flashdata('statuspass'); ?>"></div>
                        <!-- Swetalert Gagal Upliad Foto -->
                        <!-- <div class="status-msg" data-statusmsg="<?= $this->session->flashdata('statusmsg'); ?>"></div> -->
                    </div>
                    <hr align="right" color="black">
                    <div class="row">
                        <div class="form-group mx-sm-3 mb-2">
                            <?= form_open(''); ?>
                            <input class="form-control" type="text" aria-describedby="basic-addon2" name="username" placeholder=" Masukan NPP / Username....." required><small class="form-text text-muted">Masukkan NPP / Username yang akan anda cari</small>
                        </div>
                        <button class="btn btn-info mb-5" type="submit" name="cari"><i class="fa fa-search"></i>Cari</button>&nbsp;&nbsp;&nbsp;
                        <?= form_close() ?>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <th>NPP (Username)</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Tanggal Login</th>
                                    <th>Activate</th>
                                    <th>Edit</th>
                                    <th>Hak Akses</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($_POST['cari'])) {
                                        foreach ($cari as $u) { ?>
                                <td><?= $u['nama'] ?></td>
                                <td><?= $u['username'] ?></td>
                                <td><?= $u['image'] ?></td>
                                <td>
                                    <?php
                                                if ($u['status'] == 1) {
                                                    echo "<font color='green'>Online</font>";
                                                } else {
                                                    echo "<font color='red'>Offline</font>";
                                                }
                                                ?>
                                </td>
                                <td><?= date('H:i:s -- m/d/Y', strtotime($u['tgl'])) ?></td>
                                <td>
                                    <?php
                                                if ($u['valid'] == 1) {
                                                    echo "<font color='green'>Active</font>";
                                                } else {
                                                    echo "<font color='red'>Inactive</font>";
                                                }
                                                ?>
                                </td>
                                <td>
                                    <a href="ed_hak/<?= $u['id'] ?>" class="btn btn-info"><i class="fa fa-pencil"></i>Edit</a>&nbsp;&nbsp;&nbsp;
                                </td>
                                <td>
                                    <a href="#delete<?= $u['id'] ?>" data-toggle="modal"><button class="btn btn-danger" type="button">Akses</button></a>
                                </td>
                                <?php }
                                    } else {
                                        echo "<tr>
                                            <td class='text-center'>Data Not Exists</td>
                                            <td class='text-center'>Data Not Exists</td>
                                            <td class='text-center'>Data Not Exists</td>
                                            <td class='text-center'>Data Not Exists</td>
                                            <td class='text-center'>Data Not Exists</td>
                                            <td class='text-center'>Data Not Exists</td>
                                            <td class='text-center'>Data Not Exists</td>
                                            <td class='text-center'>Data Not Exists</td>
                                            </tr>";
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Akses -->
        <?php if (isset($_POST['cari']))
                foreach ($cari as $u) { ?>
        <div class="modal fade" id="delete<?= $u['id'] ?>" role="dialog">
            <div class="modal-dialog modals-default nk-red">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-title"></div>
                    <div class="modal-body">
                        <?php if ($u['valid'] == 1) { ?>
                        <font color="red">
                            Apakah Anda Akan Menonaktifkan Petugas <?= $u['nama'] ?> <?= $u['username'] ?> ?
                            <?php } else { ?>
                            <font color="red">
                                Apakah Anda Akan Mengaktifkan Petugas <?= $u['nama'] ?> <?= $u['username'] ?> ?
                                <?php } ?>
                                <?= form_open('Admin/delete') ?>
                            </font>
                            <input type="hidden" value="<?= $u['id'] ?>" name="id">
                            <input type="hidden" value="<?= $u['valid'] ?>" name="valid">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button class="btn btn-danger" type="submit" name="submit">Ok</button>
                        <?= form_close(); ?>
                    </div>
                </div> <!-- / .modal-content -->
            </div>
        </div><!-- / .modal-dialog -->
        <?php } ?>

        <footer>
            <!-- footer area start-->
            <?php $this->load->view('template/footer') ?>
            <!-- footer area end-->
        </footer>
    </main>

    <!-- Main Menu area start-->
    <?php $this->load->view('template/script') ?>

    <script type="text/javascript">
        const statusinsert = $('.status-insert').data('statusinsert');
        // console.log(statusinsert);
        if (statusinsert) {
            swal({
                title: "Berhasil " + statusinsert,
                text: "Data Berhasil Di Input",
                type: "success",
                timer: 8000,
                showConfirmButton: false
            });
        }

        const statusgagal = $('.status-gagal').data('statusgagal');
        // console.log(statusgagal);
        if (statusgagal) {
            swal({
                title: "Gagal " + statusgagal,
                text: "EDIT KEMBALI DATA ANDA DENGAN BENAR",
                type: "error",
                timer: 8000,
                showConfirmButton: false
            });
        }

        // const statusmsg = $('.status-msg').data('statusmsg');
        // // console.log(statusmsg);
        // if (statusmsg) {
        //     $.notify({
        //         title: "Warning" + statusmsg "",
        //         message: "Something cool is just updated!",
        //         icon: 'fa fa-check'
        //     }, {
        //         type: "info"
        //     });
        // }

        const statuspass = $('.status-pass').data('statuspass');
        // console.log(statuspass);
        if (statuspass) {
            swal({
                title: "Gagal " + statuspass,
                text: "PASSWORD TIDAK COCOK!!! EDIT KEMBALI DATA ANDA DENGAN BENAR",
                type: "error",
                timer: 8000,
                showConfirmButton: false
            });
        }
    </script>
    <!-- Main Menu area End-->

</body>

</html>
<?php } ?>