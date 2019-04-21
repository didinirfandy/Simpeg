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

        <?php $this->load->view('template/menu_kar') ?>

    <main class="app-content">
        <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Lingkungan PTPN VIII </h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Riwayat Pekerjaan</li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/karyawan/data/riwayat pekerjaan/ling_ptpn"> Lingkungan PTPN VIII</a></li>
        </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title"></h3>
                        
                    </div>
                    <hr align="right" color="black" >
                    <div class="row">
                        <div class="offset-lg-1">
                            <form>
                                <?php foreach ($ta1 as $i) { ?>
                                    <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">Tanggal Mulai Kerja</label>
                                        <div class="col-sm-6">
                                            <input type="text" readonly class="form-control-plaintext" value=":     <?php echo $i['tgl_masuk']?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">Masa Kerja</label>                                    
                                            <div class="col-sm-6">
                                            <?php
                                            $sdm16 = $this->Model_admin->get_sdm16_a1_akhir($i['npp']);
                                            $golongan = $sdm16[0]['golongan'];
                                            $golongan = (int)$golongan;
                                            if($golongan >= 0 AND $golongan <= 8)
                                            {
                                                $tgl_pen = date('Y-m-d', strtotime('+20258 days', strtotime($i['tgl_lhr'])));
                                            }
                                            if($golongan >= 9 AND $golongan <= 16)
                                            {
                                                $tgl_pen = date('Y-m-d', strtotime('+20440 days', strtotime($i['tgl_lhr'])));
                                            }
                                            ?>
                                            <?php
                                            $sdm16 = $this->Model_admin->get_sdm16_a1($i['npp']);
                                            $skrng = date_create($sdm16[0]['tgl_sk']);
                                            $tgl_pen = date_create($tgl_pen);
                                            
                                            $diff = date_diff($skrng,$tgl_pen);
                                            ?>
                                            <?php if ($diff->y > 56){ ?>
                                            <input type="text" readonly class="form-control-plaintext" value=":" >
                                            <?php }else{ ?>
                                            <input type="text" readonly class="form-control-plaintext" value=":     <?php echo $diff->y ?>" >
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-6 col-form-label">Tanggal MBT</label>
                                        <div class="col-sm-6">
                                            <?php
                                            $sdm16 = $this->Model_admin->get_sdm16_a1_akhir($i['npp']);
                                            $golongan = $sdm16[0]['golongan'];
                                            $golongan = (int)$golongan;
                                            if($golongan >= 0 AND $golongan <= 8)
                                            {
                                                $tgl_mpp = date('Y-m-d', strtotime('+19893 days', strtotime($i['tgl_lhr'])));?>
                                                <input type="text" readonly class="form-control-plaintext" value=":     <?php echo $tgl_mpp ?>" >
                                            <?php }
                                            if($golongan >= 9 AND $golongan <= 16)
                                            {
                                                $tgl_mpp = date('Y-m-d', strtotime('+20075 days', strtotime($i['tgl_lhr'])));?>
                                                <input type="text" readonly class="form-control-plaintext" value=":     <?php echo $tgl_mpp ?>" >                                            
                                        <?php }?>
                                        </div>
                                    </div>
                                <?php }?>
                            </form>
                        </div>
                    </div>
                    <div class="tile">
                    <h5 class="title">Mutasi Pangkat/Golongan</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kenaikan</th>
                                    <th>Golongan</th>
                                    <th>TMT</th>
                                    <th>No SK</th>
                                    <th>Tanggal SK</th>
                                    <th>Pejabat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($mutasi as $m) {?>
                                    <tr>
                                        <td><?php echo $m['no_urut']?></td>
                                        <?php $naik = $this->Model_karyawan->get_naik($m['jns_naik']);
                                        foreach ($naik as $n) { ?>
                                        <td><?php echo $n['nama']?></td>
                                        <?php } ?>

                                        <?php $gol = $this->Model_karyawan->get_gol($m['golongan']);
                                        foreach ($gol as $g) { ?>
                                        <td><?php echo $g['gol'] ?>/<?php echo $m['mk']?></td>
                                        <?php } ?>
                                        
                                        <td><?php echo $m['tmt']?></td>
                                        <td><?php echo $m['no_sk']?></td>
                                        <td><?php echo $m['tgl_sk']?></td>
                                        <td><?php echo $m['npp_jbt']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tile">
                    <h5 class="title">Riwayat Jabatan Struktural</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Jabatan</th>
                                    <th>Unit Kerja</th>
                                    <th>TMT</th>
                                    <th>No SK</th>
                                    <th>Tanggal SK</th>
                                    <th>Pejabat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($rjs as $l) { ?>
                                    <tr>
                                        <td><?php echo $l['no_urut'] ?></td>
                                        <?php $jab = $this->Model_karyawan->get_jab($l['jabatan']);
                                        foreach ($jab as $j) { ?>
                                            <td><?php echo $j['nama']?></td>
                                        <?php } ?>

                                        <?php $unit = $this->Model_karyawan->unit($l['kd_unit']);
                                        foreach ($unit as $u) {?>
                                            <td><?php echo $u['nm_unit']?></td>
                                        <?php } ?>
                                        <td><?php echo $l['tmt']?></td>
                                        <td><?php echo $l['no_sk']?></td>
                                        <td><?php echo $l['tgl_sk']?></td>
                                        <td><?php echo $l['npp_jbt']?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <hr align="right" color="black" >
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