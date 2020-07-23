<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

<?php         
        $data['tittle'] = "Penugasan";
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
                <h1><i class="fa fa-tasks"></i> Hisroty Penugasan</h1>
                <p>Menampikan Data Hisroty Penugasan Karyawan</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tabel SDM</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/sdm11"> Hisroty Penugasan</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h4 class="title">Data Hisroty Penugasan</h4>
                    </div>
                    <hr align="right" color="black" >
                    <div class="row">
                        <div class="form-group mx-sm-3 mb-2">
                            <?php echo form_open(''); ?>
                            <input class="form-control" type="text" aria-describedby="basic-addon2" name="npp_cari" placeholder=" Masukan NPP....." required><small class="form-text text-muted" id="emailHelp">Masukkan NPP yang akan anda cari</small>
                        </div>
                        <button class="btn btn-info mb-5" title="Cari NPP" type="submit" name="cari"><i class="fa fa-search"></i>Cari</button>&nbsp;&nbsp;&nbsp;
                            <?php echo form_close() ?>
                            <a class="btn btn-info icon-btn mb-5" title="Add Item" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/inpt_sdm11"><i class="fa fa-plus"></i>Add Item </a>&nbsp;&nbsp;&nbsp;
                        <button type="button" title="Cetak A1" class="btn btn-info icon-btn mb-5" href="<?php echo base_url() ?>index.php/ExcelA1/export"><i class="fa fa-print"></i>Cetak A1 </button>                        
                    </div>
                    <div class="tile">
                        <table class="table table-hover table-sm table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>NPP</th>
                                    <th>NO URUT</th>
                                    <th>NAMA SATGAS</th>
                                    <th>JABATAN</th>
                                    <th>TMT</th>
                                    <th>NO SK</th>
                                    <th>TANGGAL SK</th>
                                    <th>TANGGAL AKHIR</th>
                                    <th>NPP JABATAN</th>
                                    <th>BULAN PROSES</th>
                                    <th>STAT REC</th>
                                    <th>TANGGAL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_POST['cari'])){ //Dari sini
                                foreach ($cari as $k) {?>
                                <tr>
                                    <td><?php echo $k['npp'] ?></td>
                                    <td><?php echo $k['no_urut'] ?></td>
                                    <td><?php echo $k['nm_satgas'] ?></td>
                                    <td><?php echo $k['jabatan'] ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($k['tmt'])) ?></td>
                                    <td><?php echo $k['no_sk'] ?></td>
                                    <td><?php echo date('d-m-Y', strtotime($k['tgl_sk'])) ?></td>
                                    <td><?php echo $k['tgl_akhir'] ?></td>
                                    <td><?php echo $k['npp_jbt'] ?></td>
                                    <td><?php echo $k['bln_proses'] ?></td>
                                    <td><?php echo $k['stat_rec'] ?></td>
                                    <td><?php echo $k['tgl'] ?></td>
                                    <td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $k['id_sdm11'] ?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit </button>&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet<?php echo $k['id_sdm11'] ?>"><i class="fa fa-trash" aria-hidden="true"></i>Delet </button>
                                    </td>
                                    </tr>
                                <?php }
                                }
                                else{
                                echo "<tr>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
                                <td class='text-center'>Data Not Exists</td>
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

        <!-- Modal Edit -->
        <?php if(isset($_POST['cari'])) foreach ($cari as $k) { ?>
        <div id="edit<?php echo $k['id_sdm11'] ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Penugasan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <?php $attributes = array('id' => 'regForm');
                        echo form_open('', $attributes); ?>
                        <input type="hidden" name="id_sdm11" value="<?php echo $k['id_sdm11'] ?>">
                        <div class="form-group">
                            <label class="control-label">NPP</label>
                            <input class="form-control" type="number" name="npp" placeholder="NPP" value="<?php echo $k['npp'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Urut</label>
                            <input class="form-control" type="number" name="no_urut" placeholder="Masukan No Urut Anda" value="<?php echo $k['no_urut'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Satgas</label>
                            <input class="form-control" type="text" name="nm_satgas" placeholder="Masukan Nama Satgas" value="<?php echo $k['nm_satgas'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jabatan</label>
                            <input class="form-control" type="text" name="jabatan" placeholder="Masukan Jabatan" value="<?php echo $k['jabatan'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">TMT</label>
                            <input class="form-control" type="date" name="tmt" placeholder="Masukan TMT" value="<?php echo $k['tmt'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No SK</label>
                            <input class="form-control" type="text" name="no_sk" placeholder="Masukan No SK " value="<?php echo $k['no_sk'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal SK</label>
                            <input class="form-control" type="date" name="tgl_sk" placeholder="Masukan Tanggal SK" value="<?php echo $k['tgl_sk'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Akhir</label>
                            <input class="form-control" type="date" name="tgl_akhir" placeholder="Masukan Tanggal Akhir" value="<?php echo $k['tgl_akhir'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">NPP Jabatan</label>
                            <input class="form-control" type="text" name="npp_jbt" placeholder="Masukan NPP Jabatan" value="<?php echo $k['npp_jbt'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bulan Proses</label>
                            <input class="form-control" type="text" name="bln_proses" placeholder="Masukan Bulan Proses" value="<?php echo $k['bln_proses'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stat REC</label>
                            <input class="form-control" type="text" name="stat_rec" placeholder="Masukan Stat REC" value="<?php echo $k['stat_rec'] ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" name="edit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close() ?>
                </div>

            </div>
        </div>
        <?php 
    } ?>
        <!-- End Modal Edit -->

        <!-- Modal Delet -->
        <?php if(isset($_POST['cari'])) foreach ($cari as $k) { ?>
        <div id="delet<?php echo $k['id_sdm11'] ?>" class=" modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delet Data Penugasan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'index.php/Admin/delet_sdm11' ?>">
                        <div class="modal-body">
                            <p>Anda yakin mau menghapus <b><?php echo $k['npp'] ?></b> Dengan No Urut <b>(<?= $k['no_urut'] ?>)</b></p>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_sdm11" value="<?php echo $k['id_sdm11'] ?>">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tidak</button>
                            <button class="btn btn-danger">Ya</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <?php 
    } ?>
        <!-- End Modal Delet -->

        <footer>
                <!-- footer area start-->
                <?php $this->load->view('template/footer') ?>
                <!-- footer area end-->
        </footer>
    </main>

    <!-- Main Menu area start-->
    <?php $this->load->view('template/script') ?>
    <!-- Main Menu area End-->

</body>

</html>
<?php 
}
$this->session->unset_userdata("status_insert"); ?> 