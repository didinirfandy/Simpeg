<?php
if(empty($_SESSION['status_login'])){
    redirect();
}
else{ 
function __construct()
	{
		$this->load->model('Model_admin');
	}
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
            <h1><i class="fa fa-th-list"></i> REKAP PERINGATAN </h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/Welcome/Rekap_peringatan"> REKAP PERINGATAN</a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title"></h3>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>NPP</th>
                                    <th>NAMA</th>
                                    <th>NAMA PANGGIL</th>
                                    <th>GELAR DEPAN</th>
                                    <th>GELAR BELAKANG</th>
                                    <th>TEMPAT LAHIR</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th>KELAMIN</th>
                                    <th>GOLONGAN DARAH</th>
                                    <th>AGAMA</th>
                                    <th>ALAMAT</th>
                                    <th>KOTA</th>
                                    <th>TINGGAL</th>
                                    <th>STATUS SIPIL</th>
                                    <th>STAT IS</th>
                                    <th>TANGGAL NIKAH</th>
                                    <th>TANGGAL CAERAI</th>
                                    <th>ANAK KANDUNG</th>
                                    <th>ANAK ANGKAT</th>
                                    <th>TANGGUNGAN</th>
                                    <th>TGG PPH</th>
                                    <th>KODE PENDIDIKAN</th>
                                    <th>TANGGAL SK</th>
                                    <th>NO SK</th>
                                    <th>KODE KELAS</th>
                                    <th>KELAS TMT</th>
                                    <th>KELAS SK</th>
                                    <th>GOLONGAN</th>
                                    <th>MK</th>
                                    <th>GOLONGAN TMT</th>
                                    <th>GOLONGAN SK</th>
                                    <th>GPO</th>
                                    <th>KODE KEBUN</th>
                                    <th>KODE AFD</th>
                                    <th>KODE JABATAN</th>
                                    <th>NAMA JABATAN</th>
                                    <th>KODE BUDIDAYA</th>
                                    <th>JABATAN TMT</th>
                                    <th>JABATAN SK</th>
                                    <th>JABATAN TANGGAL</th>
                                    <th>ASTEK</th>
                                    <th>TASPEN</th>
                                    <th>NO KK</th>
                                    <th>NO NIK</th>
                                    <th>NO BPJS</th>
                                    <th>tgl lahir</th>
                                    <th>TANGGAL MASA PERSIAPAN PENSIUN</th>
                                    <th>TANGGAL PENSIUN</th>
                                    <th>MK TAHUN</th>
                                    <th>MK BULAN</th>
                                    <th>MK HARI</th>
                                    <th>MASA PERSIAPAN PENSIUN</th>
                                    <th>STAT REC</th>
                            <tbody>
                                <?php foreach ($ta1->result_array() as $i) { ?>
                                    <tr>
                                        <td><?php echo $i['npp'] ?></td>
                                        <td><?php echo $i['nama'] ?></td>
                                        <td><?php echo $i['nm_pgl'] ?></td>
                                        <td><?php echo $i['glr_dpn'] ?></td>
                                        <td><?php echo $i['glr_blk'] ?></td>
                                        <td><?php echo $i['kota_lhr'] ?></td>
                                        <td><?php echo $i['tgl_lhr'] ?></td>
                                        <td><?php echo $i['j_kelamin'] ?></td>
                                        <td><?php echo $i['gol_darah'] ?></td>
                                        <td><?php echo $i['agama'] ?></td>
                                        <td><?php echo $i['alamat_tgl'] ?></td>
                                        <td></td>
                                        <td>1</td>

                                        <!-- sdm02 -->
                                        <?php 
                                        $sdm02 = $this->Model_admin->get_sdm02_a1($i['npp']);
                                        foreach ($sdm02 as $a) { ?>
                                        <td><?php echo $a['sipil'] ?></td>
                                        <td></td>
                                        <td><?php echo $a['tgl_nkh']?></td>
                                        <td><?php echo $a['tgl_cerai']?></td>
                                        <?php } ?>
                                        <!-- end sdm02 -->

                                        <!-- sdm02 anak kandung + angkat = tanggung -->
                                        <?php
                                        $sdm02 = $this->Model_admin->get_sdm02_a1_anak($i['npp']);
                                        foreach ($sdm02 as $b ) { ?>
                                        <td></td>
                                        <td></td>
                                        <td><?php echo $b['tanggungan']?></td>
                                        <td></td>
                                        <?php } ?>
                                        <!-- end sdm02 anak kandung + angkat = tanggung -->

                                        <!-- sdm03 -->
                                        <?php 
                                        $sdm03 = $this->Model_admin->get_sdm03_a1($i['npp']);
                                        foreach ($sdm03 as $c) { ?>
                                        <td><?php echo $c['kd_pend']?></td>
                                        <?php }?>
                                        <!-- end sdm03 -->

                                        <!-- sdm08 -->
                                        <?php 
                                        $sdm08 = $this->Model_admin->get_sdm08_a1($i['npp']);
                                        foreach ($sdm08 as $d) { ?>
                                        <td><?php echo $d['tgl_sk']?></td>
                                        <td><?php echo $d['no_sk']?></td>
                                        <?php }?>
                                        <!-- end sdm08 -->

                                        <!-- sdm16 -->
                                        <?php 
                                        $sdm16 = $this->Model_admin->get_sdm16_a1($i['npp']);
                                        foreach ($sdm16 as $e) { ?>
                                        <td><?php echo $e['kd_kelas']?></td>
                                        <td><?php echo $e['kls_tmt']?></td>
                                        <td><?php echo $e['kls_sk']?></td>
                                        
                                        <?php }?>
                                        <!-- end sdm16 -->

                                        <!--  sdm16_akhir -->
                                        <?php 
                                        $sdm16 = $this->Model_admin->get_sdm16_a1_akhir($i['npp']);
                                        foreach ($sdm16 as $a) { ?>
                                        <td><?php echo $a['golongan']?></td>
                                        <td><?php echo $a['mk']?></td>
                                        <td><?php echo $a['gol_tmt']?></td>
                                        <td><?php echo $a['gol_sk']?></td>
                                        <td></td>
                                        <?php } ?>
                                        <!-- END  sdm16_akhir -->

                                        <!-- sdm 08 akhir  -->
                                        <?php 
                                        $sdm08 = $this->Model_admin->get_sdm08_a1_akhir($i['npp']);
                                        foreach ($sdm08 as $a) { ?>
                                        <td><?php echo $a['kd_kbn']?></td>
                                        <td><?php echo $a['kd_adf']?></td>
                                        <td><?php echo $a['kd_jab']?></td>
                                        <td></td>
                                        <td><?php echo $a['kd_bud']?></td>
                                        <td><?php echo $a['jab_tmt']?></td>
                                        <td><?php echo $a['jab_sk']?></td>
                                        <td><?php echo $a['jab_tgl']?></td>
                                        <?php } ?>
                                        <!-- end sdm 08 akhir -->

                                        <td><?php $i['no_astek']?></td>
                                        <td><?php $i['no_pens']?></td>
                                        <td><?php $i['no_kk']?></td>
                                        <td><?php $i['no_nik']?></td>
                                        <td><?php $i['no_bpjs']?></td>
                                        <td><?php echo $i['tgl_lhr'] ?></td> 
                                        <!-- end sdm08_akhir -->

                                        <!-- MPP PEN -->
                                        <?php
                                        $sdm16 = $this->Model_admin->get_sdm16_a1_akhir($i['npp']);
                                        $golongan = $sdm16[0]['golongan'];
                                        $golongan = (int)$golongan;
                                        if($golongan >= 0 AND $golongan <= 8)
                                        {
                                            $tgl_mpp = date('Y-m-d', strtotime('+19893 days', strtotime($i['tgl_lhr'])));
                                            echo "<td>".$tgl_mpp."</td>";

                                            $tgl_pen = date('Y-m-d', strtotime('+20258 days', strtotime($i['tgl_lhr'])));
                                            echo "<td>".$tgl_pen."</td>";
                                        }
                                        if($golongan >= 9 AND $golongan <= 16)
                                        {
                                            $tgl_mpp = date('Y-m-d', strtotime('+20075 days', strtotime($i['tgl_lhr'])));
                                            echo "<td>".$tgl_mpp."</td>";

                                            $tgl_pen = date('Y-m-d', strtotime('+20440 days', strtotime($i['tgl_lhr'])));
                                            echo "<td>".$tgl_pen."</td>";
                                        }
                                        ?>

                                        <?php
                                        $sdm16 = $this->Model_admin->get_sdm16_a1($i['npp']);
                                        $skrng = date_create($sdm16[0]['tgl_sk']);
                                        $tgl_pen = date_create($tgl_pen);
                                        
                                        $diff = date_diff($skrng,$tgl_pen);
                                        ?>
                                        <?php if ($diff->y > 56){ ?>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>    
                                        <?php }else{ ?>
                                        <td><?php echo $diff->y ?></td>
                                        <td><?php echo $diff->m ?></td>
                                        <td><?php echo $diff->d ?></td>
                                        <td></td>
                                        <td></td>
                                        <?php } ?>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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

    </body>
</html>
<?php } ?>