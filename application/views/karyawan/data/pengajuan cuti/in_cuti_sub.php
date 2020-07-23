<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "Form Pengajuan Cuti ";
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
                    <h1><i class="fa fa-user-times"></i> Form Pengajuan Cuti </h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item">Pengajuan Cuti</li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/karyawan/data/cuti"> Form Pengajuan Cuti </a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="c_pjg-tab" data-toggle="tab" href="#c_pjg" role="tab" aria-controls="c_pjg" aria-selected="true">Cuti Panjang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="c_thn-tab" data-toggle="tab" href="#c_thn" role="tab" aria-controls="c_thn" aria-selected="false">Cuti Tahunan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="c_skt-tab" data-toggle="tab" href="#c_skt" role="tab" aria-controls="c_skt" aria-selected="false">Cuti Sakit</a>
                            </li>
                            <!-- <li class="nav-item">
                                                                                                <a class="nav-link" id="c_ade-tab" data-toggle="tab" href="#c_ade" role="tab" aria-controls="c_ade" aria-selected="false">Cuti Melahirkan</a>
                                                                                            </li>
                                                                                            <li class="nav-item">
                                                                                                <a class="nav-link" id="c_kk-tab" data-toggle="tab" href="#c_kk" role="tab" aria-controls="c_kk" aria-selected="false">Cuti Keguguran Kandungan</a>
                                                                                            </li>
                                                                                            <li class="nav-item">
                                                                                                <a class="nav-link" id="c_pms-tab" data-toggle="tab" href="#c_pms" role="tab" aria-controls="c_pms" aria-selected="false">Cuti Haid</a>
                                                                                            </li> -->
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!-- CUti Panjang -->
                            <div class="tab-pane" id="c_pjg" role="tabpanel" aria-labelledby="c_pjg-tab">
                                <?= form_open('karyawan/karyawan/cuti_pjg') ?>
                                <hr align="right" color="black">
                                <h3 class="tile-title">From Pengajuan Cuti Panjang </h3>
                                <!-- Swetalert Berhasil -->
                                <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
                                <!-- Swetalert Gagal -->
                                <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                                <!-- Swetalert Danger -->
                                <div class="status-danger" data-statusdanger="<?= $this->session->flashdata('statusdanger'); ?>"></div>
                                <?php
                                $npp   = $this->session->userdata('status_login_username');
                                $total = $this->db->query("SELECT SUM(IF(YEAR(tgl), jmlh_hari, 0)) AS total FROM cuti_pjg GROUP BY npp=$npp")->result_array();
                                $tgl   = $total[0]['total'];
                                if ($tgl >= 30 and $tgl <= 1080) {
                                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Quota Cuti Sudah Mencarapi 30 hari</div>'); ?>
                                    <?= $this->session->flashdata('msg'); ?>
                                    <hr align="right" color="black">
                                    <form class="form-horizontal">
                                        <input class="form-control" type="hidden" name="npp" value="<?= $this->session->userdata('status_login_username'); ?>">
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <label class="control-label col-md-2 text-right">Tanggal Cuti</label>
                                            <div class="col-md-6">
                                                <div class="input-group input-daterange">
                                                    <input type="date" class="form-control" name="tgl_mulai" readonly>
                                                    <div class="input-group-addon">to</div>
                                                    <input type="date" class="form-control" name="tgl_akhir" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <label class="control-label col-md-2 text-right">Jumlah Hari</label>
                                            <div class="col-md-6">
                                                <input class="form-control" type="text" name="jmlh_hari" placeholder="Jumlah Hari Cuti....." readonly>
                                                <input type="hidden" class="form-control" name="jns_cuti" value="Cuti Panjang">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <label class="control-label col-md-2 text-right">Alasan Cuti</label>
                                            <div class="col-md-6">
                                                <textarea class="form-control" rows="2" name="ket" placeholder="Alasan Cuti......" readonly></textarea>
                                            </div>
                                        </div>
                                    </form>
                                <?php } else {
                                    ?>
                                    <hr align="right" color="black">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <label class="control-label col-md-2 text-right">Tanggal Cuti</label>
                                            <div class="col-md-6">
                                                <div class="input-group input-daterange">
                                                    <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai_pjg">
                                                    <div class="input-group-addon">to</div>
                                                    <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir_pjg">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <label class="control-label col-md-2 text-right">Jumlah Hari</label>
                                            <div class="col-md-6">
                                                <input class="form-control" type="text" name="jmlh_hari" id="jmlh_c_pjg" readonly>
                                                <input class="form-control" type="hidden" name="npp" value="<?= $this->session->userdata('status_login_username'); ?>">
                                                <input class="form-control" type="hidden" name="nama_kar" value="<?= $this->session->userdata('status_login'); ?>">
                                                <input class="form-control" type="hidden" name="jns_cuti" value="Cuti Panjang">
                                            </div>
                                        </div>
                                        <?php
                                        $npp    = $this->session->userdata('status_login_username');
                                        $data   = $this->Model_karyawan->get_sdm08_no($npp);
                                        foreach ($data as $l) { ?>
                                            <input class="form-control" type="hidden" name="kd_jabatan" value="<?= $l['jabatan'] ?>">
                                            <?php
                                            $jab = $this->Model_karyawan->get_jab($l['jabatan']);
                                            foreach ($jab as $j) { ?>
                                                <input class="form-control" type="hidden" name="nm_jabatan" value="<?= $j['nama'] ?>">
                                            <?php } ?>
                                        <?php } ?>
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <label class="control-label col-md-2 text-right">Alasan Cuti</label>
                                            <div class="col-md-6">
                                                <textarea class="form-control" rows="2" name="ket" placeholder="Alasan Cuti......" required></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4">
                                                <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
                                                <button class="btn btn-danger" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i>Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
                                <hr align="right" color="black">
                                <?= form_close() ?>
                            </div>
                            <!-- End Cuti Panjang -->

                            <!-- Cuti Tahunan -->
                            <div class="tab-pane active" id="c_thn" role="tabpanel" aria-labelledby="c_thn-tab">
                                <?= form_open('karyawan/karyawan/cuti_thn') ?>
                                <hr align="right" color="black">
                                <h3 class="tile-title">From Pengajuan Cuti Tahunan </h3>
                                <!-- Swetalert Berhasil -->
                                <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
                                <!-- Swetalert Gagal -->
                                <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                                <!-- Swetalert Danger -->
                                <div class="status-danger" data-statusdanger="<?= $this->session->flashdata('statusdanger'); ?>"></div>
                                <?php
                                $npp   = $this->session->userdata('status_login_username');
                                $total = $this->db->query("SELECT SUM(IF(YEAR(tgl), jmlh_hari, 0)) AS total FROM cuti_thn GROUP BY npp=$npp ")->result_array();
                                $tgl   = $total[0]['total'];
                                if ($tgl >= 80 and $tgl <= 360) {
                                    $this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Quota Cuti Sudah Mencarapi 12 hari</div>'); ?>
                                    <?= $this->session->flashdata('msg'); ?>
                                    <hr align="right" color="black">
                                    <form class="form-horizontal">
                                        <input class="form-control" type="hidden" name="npp" value="<?= $this->session->userdata('status_login_username'); ?>">
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <label class="control-label col-md-2 text-right">Tanggal Cuti</label>
                                            <div class="col-md-6">
                                                <div class="input-group input-daterange">
                                                    <input type="date" class="form-control" name="tgl_mulai" readonly>
                                                    <div class="input-group-addon">to</div>
                                                    <input type="date" class="form-control" name="tgl_akhir" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <label class="control-label col-md-2 text-right">Jumlah Hari</label>
                                            <div class="col-md-6">
                                                <input class="form-control" type="text" name="jmlh_hari" readonly>
                                                <input type="hidden" class="form-control" name="jns_cuti" value="Cuti Tahunan">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <label class="control-label col-md-2 text-right">Alasan Cuti</label>
                                            <div class="col-md-6">
                                                <textarea class="form-control" rows="2" name="ket" placeholder="Alasan Cuti......" readonly></textarea>
                                            </div>
                                        </div>>
                                    </form>
                                <?php } else { ?>
                                    <hr align="right" color="black">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <label class="control-label col-md-2 text-right">Tanggal Cuti</label>
                                            <div class="col-md-6">
                                                <div class="input-group input-daterange">
                                                    <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai_thn">
                                                    <div class="input-group-addon">to</div>
                                                    <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir_thn">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <label class="control-label col-md-2 text-right">Jumlah Hari</label>
                                            <div class="col-md-6">
                                                <input class="form-control" type="text" name="jmlh_hari" id="jmlh_c_thn" readonly>
                                                <input class="form-control" type="hidden" name="npp" value="<?= $this->session->userdata('status_login_username'); ?>">
                                                <input class="form-control" type="hidden" name="nama_kar" value="<?= $this->session->userdata('status_login'); ?>">
                                                <input class="form-control" type="hidden" name="jns_cuti" value="Cuti Tahunan">
                                            </div>
                                        </div>
                                        <?php
                                        $npp    = $this->session->userdata('status_login_username');
                                        $data   = $this->Model_karyawan->get_sdm08_no($npp);
                                        foreach ($data as $l) { ?>
                                            <input class=" form-control" type="hidden" name="kd_jabatan" value="<?= $l['jabatan'] ?>">
                                            <?php
                                            $jab = $this->Model_karyawan->get_jab($l['jabatan']);
                                            foreach ($jab as $j) { ?>
                                                <input class="form-control" type="hidden" name="nm_jabatan" value="<?= $j['nama'] ?>">
                                            <?php } ?>
                                        <?php } ?>
                                        <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <label class="control-label col-md-2 text-right">Alasan Cuti</label>
                                            <div class="col-md-6">
                                                <textarea class="form-control" rows="2" name="ket" placeholder="Alasan Cuti......" required></textarea>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <div class="col-md-1"></div>
                                            <label class="control-label col-md-2 text-right">Alasan Cuti</label>
                                            <div class="col-md-6">
                                                <select class="form-control" id="subdiv">
                                                    <optgroup label="Pilih Divisi">
                                                        <option value="">--PILIH--</option>
                                                        <?php 
                                                        $jab = $this->db->query("SELECT * FROM jab")->result_array();
                                                        foreach ($jab as $key) {
                                                            $kd_menu = $key['kd_menu'];
                                                            if($kd_menu >= 811 and $kd_menu <= 836) { ?>
                                                                <option value="<?= $key['kd_menu'] ?>"><?= $key['nama'] ?></option>
                                                            <?php }
                                                        }
                                                        ?>
                                                        
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="modal-footer">
                                            <div class="col-md-1"></div>
                                            <div class="col-md-4">
                                                <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
                                                <button class="btn btn-danger" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i>Reset</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
                                <hr align="right" color="black">
                                <?= form_close() ?>
                            </div>
                            <!-- End Cuti Tahunan -->

                            <!-- Cuti Sakit -->
                            <div class="tab-pane" id="c_skt" role="tabpanel" aria-labelledby="c_skt-tab">
                                <?= form_open('karyawan/karyawan/cuti_sakit') ?>
                                <hr align="right" color="black">
                                <h3 class="tile-title">From Pengajuan Cuti Sakit </h3>
                                <!-- Swetalert Berhasil -->
                                <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
                                <!-- Swetalert Gagal -->
                                <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                                <!-- Swetalert Danger -->
                                <div class="status-danger" data-statusdanger="<?= $this->session->flashdata('statusdanger'); ?>"></div>
                                <hr align="right" color="black">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Tanggal Cuti</label>
                                        <div class="col-md-6">
                                            <div class="input-group input-daterange">
                                                <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai_skt">
                                                <div class="input-group-addon">to</div>
                                                <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir_skt">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Jumlah Hari</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="jmlh_hari" id="jmlh_c_skt" readonly>
                                            <input class="form-control" type="hidden" name="npp" value="<?= $this->session->userdata('status_login_username'); ?>">
                                            <input class="form-control" type="hidden" name="nama_kar" value="<?= $this->session->userdata('status_login'); ?>">
                                            <input class="form-control" type="hidden" name="jns_cuti" value="Cuti Sakit">
                                        </div>
                                    </div>
                                    <?php
                                    $npp    = $this->session->userdata('status_login_username');
                                    $data   = $this->Model_karyawan->get_sdm08_no($npp);
                                    foreach ($data as $l) { ?>
                                        <input class="form-control" type="hidden" name="kd_jabatan" value="<?= $l['jabatan'] ?>">
                                        <?php
                                        $jab = $this->Model_karyawan->get_jab($l['jabatan']);
                                        foreach ($jab as $j) { ?>
                                            <input class="form-control" type="hidden" name="nm_jabatan" value="<?= $j['nama'] ?>">
                                        <?php } ?>
                                    <?php } ?>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Alasan Cuti</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="2" name="ket" placeholder="Alasan Cuti......" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-danger" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i>Reset</button>
                                        </div>
                                    </div>
                                </form>
                                <hr align="right" color="black">
                                <?= form_close() ?>
                            </div>
                            <!-- End Cuti Sakit -->

                            <!-- Cuti Melahirkan -->
                            <div class="tab-pane" id="c_ade" role="tabpanel" aria-labelledby="c_ade-tab">
                                <?= form_open_multipart('karyawan/karyawan/cuti_umum') ?>
                                <hr align="right" color="black">
                                <h3 class="tile-title">From Pengajuan Cuti Melahirkan </h3>
                                <!-- Swetalert Berhasil -->
                                <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
                                <!-- Swetalert Gagal -->
                                <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                                <!-- Swetalert Danger -->
                                <div class="status-danger" data-statusdanger="<?= $this->session->flashdata('statusdanger'); ?>"></div>

                                <hr align="right" color="black">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Jumlah Hari</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="jmlh_hari" placeholder="Jumlah Hari Cuti....." required>
                                            <input class="form-control" type="hidden" name="npp" value="<?= $this->session->userdata('status_login_username'); ?>">
                                            <input class="form-control" type="hidden" name="nama_kar" value="<?= $this->session->userdata('status_login'); ?>">
                                            <input class="form-control" type="hidden" name="jns_cuti" value="Cuti Tahunan">
                                        </div>
                                    </div>
                                    <?php
                                    $npp    = $this->session->userdata('status_login_username');
                                    $data   = $this->Model_karyawan->get_sdm08_no($npp);
                                    foreach ($data as $l) { ?>
                                        <input class="form-control" type="hidden" name="kd_jabatan" value="<?= $l['jabatan'] ?>">
                                        <?php
                                        $jab = $this->Model_karyawan->get_jab($l['jabatan']);
                                        foreach ($jab as $j) { ?>
                                            <input class="form-control" type="hidden" name="nm_jabatan" value="<?= $j['nama'] ?>">
                                        <?php } ?>
                                    <?php } ?>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Dari Tanggal</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" name="tgl_mulai" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Sampai Tanggal</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" name="tgl_akhir" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Alasan Cuti</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="2" name="ket" placeholder="Alasan Cuti......" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-floppy-o"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-danger" type="reset"><i class="fa fa-fw fa-repeat"></i>Reset</button>
                                        </div>
                                    </div>
                                </form>
                                <hr align="right" color="black">
                                <?= form_close() ?>
                            </div>
                            <!-- End Cuti Melahirkan -->

                            <!-- Curi Keguguran Kandungan -->
                            <div class="tab-pane" id="c_kk" role="tabpanel" aria-labelledby="c_kk-tab">
                                <?= form_open_multipart('karyawan/karyawan/cuti_umum') ?>
                                <hr align="right" color="black">
                                <h3 class="tile-title">From Pengajuan Cuti Keguguran Kandungan </h3>
                                <!-- Swetalert Berhasil -->
                                <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
                                <!-- Swetalert Gagal -->
                                <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                                <!-- Swetalert Danger -->
                                <div class="status-danger" data-statusdanger="<?= $this->session->flashdata('statusdanger'); ?>"></div>

                                <hr align="right" color="black">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Jumlah Hari</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="jmlh_hari" placeholder="Jumlah Hari Cuti....." required>
                                            <input class="form-control" type="hidden" name="npp" value="<?= $this->session->userdata('status_login_username'); ?>">
                                            <input class="form-control" type="hidden" name="nama_kar" value="<?= $this->session->userdata('status_login'); ?>">
                                            <input class="form-control" type="hidden" name="jns_cuti" value="Cuti Tahunan">
                                        </div>
                                    </div>
                                    <?php
                                    $npp    = $this->session->userdata('status_login_username');
                                    $data   = $this->Model_karyawan->get_sdm08_no($npp);
                                    foreach ($data as $l) { ?>
                                        <input class="form-control" type="hidden" name="kd_jabatan" value="<?= $l['jabatan'] ?>">
                                        <?php
                                        $jab = $this->Model_karyawan->get_jab($l['jabatan']);
                                        foreach ($jab as $j) { ?>
                                            <input class="form-control" type="hidden" name="nm_jabatan" value="<?= $j['nama'] ?>">
                                        <?php } ?>
                                    <?php } ?>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Dari Tanggal</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" name="tgl_mulai" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Sampai Tanggal</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" name="tgl_akhir" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Alasan Cuti</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="2" name="ket" placeholder="Alasan Cuti......" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-danger" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i>Reset</button>
                                        </div>
                                    </div>
                                </form>
                                <hr align="right" color="black">
                                <?= form_close() ?>
                            </div>
                            <!-- End Curi Keguguran Kandungan -->

                            <!-- Curi Haid -->
                            <div class="tab-pane" id="c_pms" role="tabpanel" aria-labelledby="c_pms-tab">
                                <?= form_open_multipart('karyawan/karyawan/cuti_umum') ?>
                                <hr align="right" color="black">
                                <h3 class="tile-title">From Pengajuan Cuti Haid </h3>
                                <!-- Swetalert Berhasil -->
                                <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
                                <!-- Swetalert Gagal -->
                                <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
                                <!-- Swetalert Danger -->
                                <div class="status-danger" data-statusdanger="<?= $this->session->flashdata('statusdanger'); ?>"></div>

                                <hr align="right" color="black">
                                <form class="form-horizontal">
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Jumlah Hari</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="jmlh_hari" placeholder="Jumlah Hari Cuti....." required>
                                            <input class="form-control" type="hidden" name="npp" value="<?= $this->session->userdata('status_login_username'); ?>">
                                            <input class="form-control" type="hidden" name="nama_kar" value="<?= $this->session->userdata('status_login'); ?>">
                                            <input class="form-control" type="hidden" name="jns_cuti" value="Cuti Tahunan">
                                        </div>
                                    </div>
                                    <?php
                                    $npp    = $this->session->userdata('status_login_username');
                                    $data   = $this->Model_karyawan->get_sdm08_no($npp);
                                    foreach ($data as $l) { ?>
                                        <input class="form-control" type="hidden" name="kd_jabatan" value="<?= $l['jabatan'] ?>">
                                        <?php
                                        $jab = $this->Model_karyawan->get_jab($l['jabatan']);
                                        foreach ($jab as $j) { ?>
                                            <input class="form-control" type="hidden" name="nm_jabatan" value="<?= $j['nama'] ?>">
                                        <?php } ?>
                                    <?php } ?>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Dari Tanggal</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" name="tgl_mulai" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Sampai Tanggal</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="date" name="tgl_akhir" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-1"></div>
                                        <label class="control-label col-md-2 text-right">Alasan Cuti</label>
                                        <div class="col-md-6">
                                            <textarea class="form-control" rows="2" name="ket" placeholder="Alasan Cuti......" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-4">
                                            <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-fw fa-lg fa-floppy-o"></i>Simpan</button>&nbsp;&nbsp;&nbsp;
                                            <button class="btn btn-danger" type="reset"><i class="fa fa-fw fa-lg fa-repeat"></i>Reset</button>
                                        </div>
                                    </div>
                                </form>
                                <hr align="right" color="black">
                                <?= form_close() ?>
                            </div>
                            <!-- End Curi Haid -->
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <!-- footer area start-->
                <?php $this->load->view('template/footer'); ?>
                <!-- footer area end-->
            </footer>
        </main>

        <!-- Main Menu area start-->
        <?php $this->load->view('template/script'); ?>
        <!-- Main Menu area End-->
        <script type="text/javascript">
            $('#myTab a[href="#profile"]').on('click', function(e) {
                e.preventDefault()
                $(this).tab('show')
            });

            // $('.input-daterange input').each(function() {
            //     $(this).datepicker({
            //         format: "dd-mm-yyyy",
            //         autoclose: true,
            //         todayHighlight: true
            //     });
            // });

            $("#tgl_mulai_pjg,#tgl_akhir_pjg").change(function() {
                var tgl_mulai = $('#tgl_mulai_pjg').val();
                var tgl_akhir = $('#tgl_akhir_pjg').val();
                $.ajax({
                    type: "POST",
                    data: {
                        tgl_mulai: tgl_mulai,
                        tgl_akhir: tgl_akhir
                    },
                    url: "<?= base_url('index.php/Karyawan/date_range') ?>",
                    dataType: "JSON",
                    success: function(data) {
                        $('#jmlh_c_pjg').val(data);
                    }
                });
            });

            $("#tgl_mulai_thn,#tgl_akhir_thn").change(function() {
                var tgl_mulai = $('#tgl_mulai_thn').val();
                var tgl_akhir = $('#tgl_akhir_thn').val();
                $.ajax({
                    type: "POST",
                    data: {
                        tgl_mulai: tgl_mulai,
                        tgl_akhir: tgl_akhir
                    },
                    url: "<?= base_url('index.php/Karyawan/date_range') ?>",
                    dataType: "JSON",
                    success: function(data) {
                        $('#jmlh_c_thn').val(data);
                    }
                });
            });

            $("#tgl_mulai_skt,#tgl_akhir_skt").change(function() {
                var tgl_mulai = $('#tgl_mulai_skt').val();
                var tgl_akhir = $('#tgl_akhir_skt').val();
                $.ajax({
                    type: "POST",
                    data: {
                        tgl_mulai: tgl_mulai,
                        tgl_akhir: tgl_akhir
                    },
                    url: "<?= base_url('index.php/Karyawan/date_range') ?>",
                    dataType: "JSON",
                    success: function(data) {
                        $('#jmlh_c_skt').val(data);
                    }
                });
            });

            const statusinsert = $('.status-insert').data('statusinsert');
            // console.log(statusinsert);
            if (statusinsert) {
                swal({
                    title: "Berhasil " + statusinsert,
                    text: "DATA AKAN DI VERIFIKASI OLEH ATASAN",
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

            const statusdanger = $('.status-danger').data('statusdanger');
            // console.log(statusdanger);
            if (statusdanger) {
                swal({
                    title: "Gagal " + statusdanger,
                    text: "Anda Telah Mengajukan Cuty Hari ini , Silahkan Coba Lagi Besok",
                    type: "warning",
                    timer: 8000,
                    showConfirmButton: false
                });
            }
        </script>

    </body>

    </html>
<?php } ?>