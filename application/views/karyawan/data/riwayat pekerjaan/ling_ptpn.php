<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <?php
        $data['tittle'] = "Riwayat Pekerjaan";
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
                    <h1><i class="fa fa-briefcase"></i> Riwayat Pekerjaan</h1>
                    <p></p>
                </div>
                <ul class="app-breadcrumb breadcrumb side">
                    <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/karyawan/data/riwayat pekerjaan/ling_ptpn"> Riwayat Pekerjaan</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h3 class="title">RIWAYAT PEKERJAAN <?= $this->session->userdata('status_login'); ?></h3>

                        </div>
                        <hr align="right" color="black">
                        <div class="row">
                            <div class="offset-lg-1">
                                <form>
                                    <?php foreach ($ta1 as $i) { ?>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Tanggal Mulai Kerja</label>
                                            <div class="col-sm-6">
                                                <input type="text" readonly class="form-control-plaintext" value=":     <?php echo date('d-m-Y', strtotime($i['tgl_masuk'])) ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Masa Kerja</label>
                                            <div class="col-sm-6">
                                                <?php
                                                $sdm16 = $this->Model_admin->get_sdm16_a1_akhir($i['npp']);
                                                $golongan = $sdm16[0]['golongan'];
                                                $golongan = (int) $golongan;
                                                if ($golongan >= 0 and $golongan <= 8) {
                                                    $tgl_pen = date('Y-m-d', strtotime('+55 year +1 month', strtotime($i['tgl_lhr'])));
                                                }
                                                if ($golongan >= 9 and $golongan <= 16) {
                                                    $tgl_pen = date('Y-m-d', strtotime('+56 year +1 month', strtotime($i['tgl_lhr'])));
                                                }
                                                ?>
                                                <?php
                                                $sdm16 = $this->Model_admin->get_sdm16_a1($i['npp']);
                                                $skrng = date_create($sdm16[0]['tgl_sk']);
                                                $tgl_pen = date_create($tgl_pen);

                                                $diff = date_diff($skrng, $tgl_pen);
                                                ?>
                                                <?php if ($diff->y > 56) { ?>
                                                    <input type="text" readonly class="form-control-plaintext" value=":">
                                                <?php } else { ?>
                                                    <input type="text" readonly class="form-control-plaintext" value=":     <?= $diff->y ?> Tahun - <?= $diff->m ?> Bulan">
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-6 col-form-label">Tanggal MBT</label>
                                            <div class="col-sm-6">
                                                <?php
                                                $sdm16 = $this->Model_admin->get_sdm16_a1_akhir($i['npp']);
                                                $golongan = $sdm16[0]['golongan'];
                                                $golongan = (int) $golongan;
                                                if ($golongan >= 0 and $golongan <= 8) {
                                                    $tgl_pen = date('Y-m-d', strtotime('+55 year +1 month', strtotime($i['tgl_lhr'])));
                                                    $tgl_mpp = date('Y-m-d', strtotime('-6 month', strtotime($tgl_pen))); ?>
                                                    <input type="text" readonly class="form-control-plaintext" value=":     <?= date('01-m-Y', strtotime($tgl_mpp)) ?>">
                                                <?php }
                                                if ($golongan >= 9 and $golongan <= 16) {
                                                    $tgl_pen = date('Y-m-d', strtotime('+55 year +1 month', strtotime($i['tgl_lhr'])));
                                                    $tgl_mpp = date('Y-m-d', strtotime('-6 month', strtotime($tgl_pen))); ?>
                                                    <input type="text" readonly class="form-control-plaintext" value=":     <?= date('01-m-Y', strtotime($tgl_mpp)) ?>">
                                                <?php } ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                        <div class="tile">
                            <h4 class="title">Mutasi Pangkat/Golongan</h4>
                            <table class="table table-sm" id="mpg_tbl">
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
                                <tbody id="mpg">
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="tile">
                            <h4 class="title">Riwayat Jabatan Struktural</h4>
                            <table class="table table-sm" id="rjs_tbl">
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
                                <tbody id="rjs">

                                </tbody>
                            </table>
                        </div>
                        <hr align="right" color="black">
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

        <script type="text/javascript">
            $(document).ready(function() {
                tampil_data_rjs(); //pemanggilan fungsi tampil_data_rjs.
                tampil_data_mpg(); //pemanggilan fungsi tampil_data_mpg.

                // $('#rjs_tbl').dataTable();
                // $('#mpg_tbl').dataTable();
                
                // fungsi tampil_data_mpg.
                function tampil_data_mpg() {
                    $.ajax({
                        type : "ajax",
                        url : "<?= base_url('index.php/Karyawan/data_mpg') ?>",
                        async : false,
                        dataType : "JSON",
                        success: function(mpg) {
                            var html = "";
                            var i;
                            for (i = 0; i < mpg.length; i++) {
                                html += "<tr>" +
                                    "<td>" + mpg[i].no_urut + "</td>" +
                                    "<td>" + mpg[i].nama + "</td>" +
                                    "<td>" + mpg[i].gol + " / " + mpg[i].mk + "</td>" +
                                    "<td>" + mpg[i].tmt + "</td>" +
                                    "<td>" + mpg[i].no_sk + "</td>" +
                                    "<td>" + mpg[i].tgl_sk + "</td>" +
                                    "<td>" + mpg[i].npp_jbt + "</td>" +
                                    "</tr>";
                                
                            }
                            $('#mpg').html(html);
                        } 
                    });
                }

                //fungsi tampil_data_rjs. 
                function tampil_data_rjs() {
                    $.ajax({
                        type: "ajax",
                        url: "<?= base_url('index.php/Karyawan/data_rjs') ?>",
                        async: false,
                        dataType: "JSON",
                        success: function(rjs) {
                            var html = "";
                            var i;
                            for (i = 0; i < rjs.length; i++) {
                                html += "<tr>" +
                                    "<td>" + rjs[i].no_urut + "</td>" +
                                    "<td>" + rjs[i].nama + "</td>" +
                                    "<td>" + rjs[i].nm_unit + "</td>" +
                                    "<td>" + rjs[i].tmt + "</td>" +
                                    "<td>" + rjs[i].no_sk + "</td>" +
                                    "<td>" + rjs[i].tgl_sk + "</td>" +
                                    "<td>" + rjs[i].npp_jbt + "</td>" +
                                    "</tr>";
                            }
                            $('#rjs').html(html);
                        }
                    });
                }
            });
        </script>

    </body>

    </html>
<?php } ?>