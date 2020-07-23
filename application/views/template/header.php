        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Menampilkan Waktu -->
        <div class="app-nav__item col-md-3">
                <span style="color:white" id="dates"><span id="the-day"></span> || <span id="the-time"></span> </span>
        </div>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
                <!--Notification Menu-->
                <?php
                $npp        = $this->session->userdata('status_login_username');
                $kd_menu   =  $this->Model_karyawan->kasubdiv($npp);
                $kasubdiv   = $kd_menu['kd_menu'];
                
                $p_lmbr     = $this->Model_karyawan->post_lembur($npp);
                $notif2     = $this->Model_admin->tempt02_kar($npp);
                $notif3     = $this->Model_admin->tempt03_kar($npp);
                $notif4     = $this->Model_admin->tempt04_kar($npp);
                $cuti_thn   = $this->Model_karyawan->post_cuti_thn_subdiv($kasubdiv);
                $cuti_pjg   = $this->Model_karyawan->post_cuti_pjg_subdiv($kasubdiv);
                $cuti_sakit = $this->Model_karyawan->post_cuti_sakit_subdiv($kasubdiv);
                $i = 0;
                foreach ($notif2 as $b) {
                        $i++;
                }
                foreach ($notif3 as $a) {
                        $i++;
                }
                foreach ($notif4 as $a) {
                        $i++;
                }
                foreach ($p_lmbr as $a) {
                        $i++;
                }
                foreach ($cuti_thn as $a) {
                        $i++;
                }
                foreach ($cuti_pjg as $a) {
                        $i++;
                }
                foreach ($cuti_sakit as $a) {
                        $i++;
                }
                ?>
                <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications">
                                <i class="fa fa-bell-o fa-lg"></i>
                                <span class="badge badge-light"><?= $i ?></span>
                        </a>
                        <ul class="app-notification dropdown-menu dropdown-menu-right">
                                <li class="app-notification__title">Anda memiliki <?= $i ?> notifikasi baru</li>
                                <div class="app-notification__content">
                                        <?php foreach ($notif2 as $ntf2) { ?>
                                        <li><a class="app-notification__item" href="<?= base_url() ?>index.php/Karyawan/data_diri/temp"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                                        <div>
                                                                <strong>
                                                                        <p class="app-notification__message">Anda <?php
                                                                                                                                if ($ntf2['valid'] == 1) {
                                                                                                                                        echo "<font>Menginput Data Keluarga</font>";
                                                                                                                                } elseif ($ntf2['valid'] == 2) {
                                                                                                                                        echo "<font>Mengedit Data Keluarga</font>";
                                                                                                                                }
                                                                                                                                ?></p>
                                                                </strong>
                                                                <p class="app-notification__meta"><?php
                                                                                                                if ($ntf2['status'] == 1) {
                                                                                                                        echo "<i class='fa fa-hourglass-half'></i> <font class='btn-warning'> Pendding......</font>";
                                                                                                                } elseif ($ntf2['status'] == 2) {
                                                                                                                        echo "<i class='fa fa-check-circle'></i> <font class='btn-success'> Agree</font>";
                                                                                                                } elseif ($ntf2['status'] == 3) {
                                                                                                                        echo "<i class='fa fa-times-circle'></i> <font class='btn-danger'> Reject</font>";
                                                                                                                }
                                                                                                                ?></p>
                                                                <p class="app-notification__meta"><?= date('d-m-Y H:i:s', strtotime($ntf2['tgl'])) ?></p>
                                                        </div>
                                                </a></li>
                                        <?php } ?>
                                        <?php foreach ($notif3 as $ntf3) { ?>
                                        <li><a class="app-notification__item" href="<?= base_url() ?>index.php/Karyawan/riwayat_pndidikan/temp_pen"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                                        <div>
                                                                <strong>
                                                                        <p class="app-notification__message">Anda <?php
                                                                                                                                if ($ntf3['valid'] == 1) {
                                                                                                                                        echo "<font>Menginput Data Pendidikan</font>";
                                                                                                                                } elseif ($ntf3['valid'] == 2) {
                                                                                                                                        echo "<font>Mengedit Data Pendidikan</font>";
                                                                                                                                }
                                                                                                                                ?></p>
                                                                </strong>
                                                                <p class="app-notification__meta"><?php
                                                                                                                if ($ntf3['status'] == 1) {
                                                                                                                        echo "<i class='fa fa-hourglass-half'></i> <font class='btn-warning'> Pendding......</font>";
                                                                                                                } elseif ($ntf3['status'] == 2) {
                                                                                                                        echo "<i class='fa fa-check-circle'></i> <font class='btn-success'> Agree</font>";
                                                                                                                } elseif ($ntf3['status'] == 3) {
                                                                                                                        echo "<i class='fa fa-times-circle'></i> <font class='btn-danger'> Reject</font>";
                                                                                                                }
                                                                                                                ?></p>
                                                                <p class="app-notification__meta"><?= date('d-m-Y H:i:s', strtotime($ntf3['tgl'])) ?></p>
                                                        </div>
                                                </a></li>
                                        <?php } ?>
                                        <?php foreach ($notif4 as $ntf4) { ?>
                                        <li><a class="app-notification__item" href="<?= base_url() ?>index.php/Karyawan/riwayat_pengembangan/temp_plthn"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                                        <div>
                                                                <strong>
                                                                        <p class="app-notification__message">Anda <?php
                                                                                                                                if ($ntf4['valid'] == 1) {
                                                                                                                                        echo "<font>Menginput Data Pelatihan</font>";
                                                                                                                                } elseif ($ntf4['valid'] == 2) {
                                                                                                                                        echo "<font>Mengedit Data Pelatihan</font>";
                                                                                                                                }
                                                                                                                                ?></p>
                                                                        <p class="app-notification__meta"><?php
                                                                                                                        if ($ntf4['status'] == 1) {
                                                                                                                                echo "<i class='fa fa-hourglass-half'></i> <font class='btn-warning'> Pendding......</font>";
                                                                                                                        } elseif ($ntf4['status'] == 2) {
                                                                                                                                echo "<i class='fa fa-check-circle'></i> <font class='btn-success'> Agree</font>";
                                                                                                                        } elseif ($ntf4['status'] == 3) {
                                                                                                                                echo "<i class='fa fa-times-circle'></i> <font class='btn-danger'> Reject</font>";
                                                                                                                        }
                                                                                                                        ?></p>
                                                                </strong>
                                                                <p class="app-notification__meta"><?= date('d-m-Y H:i:s', strtotime($ntf4['tgl'])) ?></p>
                                                        </div>
                                                </a></li>
                                        <?php }
                                        foreach ($p_lmbr as $p) { ?>
                                        <li><a class="app-notification__item" href="<?= base_url() ?>index.php/Karyawan/lembur/tb_lembur"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                                        <div>
                                                                <strong>
                                                                        <p class="app-notification__message">Anda Memilikai Pengajuan Lembur</p>
                                                                        <p class="app-notification__meta"><?php
                                                                                                                        if ($p['valid'] == 1) {
                                                                                                                                echo "<i class='fa fa-hourglass-half'></i> <font class='btn-warning'> Pendding......</font>";
                                                                                                                        } ?></p>
                                                                </strong>
                                                                <p class="app-notification__meta"><?= date('d-m-Y H:i:s', strtotime($p['tgl'])) ?></p>
                                                        </div>
                                                </a></li>
                                        <?php } ?>
                                        <?php
                                        $npp = $this->session->userdata('status_login_username');
                                        $data = $this->Model_karyawan->get_kd_menu($npp);
                                        foreach ($data as $key) {
                                                $kd_menu = $key['kd_menu'];
                                        }
                                        if ($kd_menu >= 81111 and $kd_menu <= 83652) {
                                                echo "";
                                        } elseif (
                                                $kd_menu == 8111 or $kd_menu == 8112 or $kd_menu == 8113
                                                or $kd_menu == 8121 or $kd_menu == 8122 or $kd_menu == 8123
                                                or $kd_menu == 8131 or $kd_menu == 8132 or $kd_menu == 8133 or $kd_menu == 8134
                                                or $kd_menu == 8141 or $kd_menu == 8142
                                                or $kd_menu == 8211 or $kd_menu == 8212 or $kd_menu == 8213 or $kd_menu == 8214 or $kd_menu == 8215
                                                or $kd_menu == 8221 or $kd_menu == 8222 or $kd_menu == 8223 or $kd_menu == 8224
                                                or $kd_menu == 8311 or $kd_menu == 8312
                                                or $kd_menu == 8321 or $kd_menu == 8322 or $kd_menu == 8323
                                                or $kd_menu == 8331 or $kd_menu == 8332
                                                or $kd_menu == 8341 or $kd_menu == 8342 or $kd_menu == 8343
                                                or $kd_menu == 8351 or $kd_menu == 8352 or $kd_menu == 8353 or $kd_menu == 8354
                                                or $kd_menu == 8361 or $kd_menu == 8362 or $kd_menu == 8363 or $kd_menu == 8364 or $kd_menu == 8365
                                        ) {
                                                $cuti_thn   = $this->Model_karyawan->post_cuti_thn_subdiv($kasubdiv);
                                                foreach ($cuti_thn as $ct_th) { ?>
                                        <li><a class="app-notification__item" href="<?= base_url() ?>index.php/Karyawan/cuti_subdiv/tb_cuti"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                                        <div>
                                                                <strong>
                                                                        <p class="app-notification__message">Pengajuan Cuti Tahunan</p>
                                                                        <p class="app-notification__meta"><?php
                                                                                                                                if ($ct_th['valid'] == 1) {
                                                                                                                                        echo "<i class='fa fa-hourglass-half'></i> <font class='btn-warning'> Pendding......</font>";
                                                                                                                                } ?></p>
                                                                </strong>
                                                                <p class="app-notification__meta"><?= date('d-m-Y H:i:s', strtotime($ct_th['tgl'])) ?></p>
                                                        </div>
                                                </a></li>
                                        <?php } ?>
                                        <?php $cuti_pjg   = $this->Model_karyawan->post_cuti_pjg_subdiv($kasubdiv);
                                                foreach ($cuti_pjg as $ct_pj) { ?>
                                        <li><a class="app-notification__item" href="<?= base_url() ?>index.php/Karyawan/cuti_subdiv/tb_cuti"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                                        <div>
                                                                <strong>
                                                                        <p class="app-notification__message">Pengajuan Cuti Panjang</p>
                                                                        <p class="app-notification__meta"><?php
                                                                                                                                if ($ct_pj['valid'] == 1) {
                                                                                                                                        echo "<i class='fa fa-hourglass-half'></i> <font class='btn-warning'> Pendding......</font>";
                                                                                                                                } ?></p>
                                                                </strong>
                                                                <p class="app-notification__meta"><?= date('d-m-Y H:i:s', strtotime($ct_pj['tgl'])) ?></p>
                                                        </div>
                                                </a></li>
                                        <?php } ?>
                                        <?php $cuti_sakit = $this->Model_karyawan->post_cuti_sakit_subdiv($kasubdiv);
                                                foreach ($cuti_sakit as $ct_skt) { ?>
                                        <li><a class="app-notification__item" href="<?= base_url() ?>index.php/Karyawan/cuti_subdiv/tb_cuti"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                                        <div>
                                                                <strong>
                                                                        <p class="app-notification__message">Pengajuan Cuti Sakit</p>
                                                                        <p class="app-notification__meta"><?php
                                                                                                                                if ($ct_skt['valid'] == 1) {
                                                                                                                                        echo "<i class='fa fa-hourglass-half'></i> <font class='btn-warning'> Pendding......</font>";
                                                                                                                                } ?></p>
                                                                </strong>
                                                                <p class="app-notification__meta"><?= date('d-m-Y H:i:s', strtotime($ct_skt['tgl'])) ?></p>
                                                        </div>
                                                </a></li>
                                        <?php } ?>
                                        <?php $p_lmbr     = $this->Model_karyawan->post_lembur($npp);
                                                foreach ($p_lmbr as $p) { ?>
                                        <li><a class="app-notification__item" href="<?= base_url() ?>index.php/Karyawan/cuti_subdiv/tb_cuti"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                                        <div>
                                                                <strong>
                                                                        <p class="app-notification__message">Anda Memilikai Data Pengajuan Lembur</p>
                                                                        <p class="app-notification__meta"><?php
                                                                                                                                if ($p['valid'] == 1) {
                                                                                                                                        echo "<i class='fa fa-hourglass-half'></i> <font class='btn-warning'> Pendding......</font>";
                                                                                                                                } ?></p>
                                                                </strong>
                                                                <p class="app-notification__meta"><?= date('d-m-Y H:i:s', strtotime($p['tgl'])) ?></p>
                                                        </div>
                                                </a></li>
                                        <?php } ?>
                                        <?php } elseif (
                                                $kd_menu == 8110 or $kd_menu == 8120 or $kd_menu == 8130 or $kd_menu == 8140
                                                or $kd_menu == 8210 or $kd_menu == 8220 or $kd_menu == 8310 or $kd_menu == 8320 or $kd_menu == 8330
                                                or $kd_menu == 8340 or $kd_menu == 8350 or $kd_menu == 8350 or $kd_menu == 8360
                                        ) {
                                                echo "";
                                        } elseif ($kd_menu == 4) {
                                                echo "";
                                        }
                                        ?>
                                </div>
                        </ul>
                </li>

                <!-- User Menu-->
                <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                        <ul class="dropdown-menu settings-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="<?= base_url(); ?>index.php/Karyawan/setting"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                                <li><a class="dropdown-item" href="<?= base_url(); ?>index.php/Core/logout_kar"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                        </ul>
                </li>
        </ul>