<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <?php
        $profil = $this->Model_karyawan->get_no_id();
        foreach ($profil as $p) { ?>
            <img class="app-sidebar__user-avatar" src="<?= base_url(); ?>assets_application/assets/faces/<?= $p['image'] ?>">
        <?php } ?>
        <div>
            <span class="app-sidebar__user-name">
                <?php $str = $this->session->userdata('status_login');
                echo wordwrap($str, 15, "<br>\n"); ?>
            </span>
            <?php
            $npp    = $this->session->userdata('status_login_username');
            $data   = $this->Model_karyawan->get_sdm08_no($npp);
            foreach ($data as $l) {
                $jab = $this->Model_karyawan->get_jab($l['jabatan']);
                foreach ($jab as $j) { ?>
                    <p class="app-sidebar__user-designation">
                        <?php $ini = $j['nama'];
                        echo wordwrap($ini, 25, "<br>\n"); ?>
                    </p>
                <?php }
            } ?>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item <?php if ($this->uri->segment(2) == "in_kar") {
                                            echo "active";
                                        } ?>" href="<?= base_url() ?>index.php/Karyawan/in_kar">
                <i class="app-menu__icon fa fa-home"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview <?php if ($this->uri->segment(2) == "data_diri") {
                                echo "is-expanded";
                            } ?>">
            <a class="app-menu__item <?php if ($this->uri->segment(2) == "data_diri") {
                                            echo "active";
                                        } ?>" href="#tdata" data-toggle="treeview">
                <i class="app-menu__icon fa fa-address-book"></i>
                <span class="app-menu__label">Data Diri</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>

            <ul class="treeview-menu">
                <li id="tdata">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "biodiri") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "ed_diri") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/Karyawan/data_diri/biodiri" href="<?= base_url() ?>index.php/Karyawan/data_diri/ed_diri"><i class="icon fa fa-check-square-o"></i> Biodata Diri</a>
                </li>
                <li id="tdata">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "biokel") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "in_kel") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "ed_kel") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "temp") {
                                                echo "active";
                                            }
                                            ?>" href="<?= base_url(); ?>index.php/Karyawan/data_diri/biokel" href="<?= base_url(); ?>index.php/Karyawan/data_diri/in_kel" href="<?= base_url(); ?>index.php/Karyawan/data_diri/ed_kel" href="<?= base_url() ?>index.php/karyawan/data_diri/temp">
                        <i class="icon fa fa-check-square-o"></i> Biodata Keluarga
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item <?php if ($this->uri->segment(3) == "ling") {
                                            echo "active";
                                        } ?>" href="<?= base_url() ?>index.php/karyawan/riwayat_pekerjaan/ling">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Riwayat Pekerjaan</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php if ($this->uri->segment(3) == "pendformal") {
                                            echo "active";
                                        }
                                        if ($this->uri->segment(3) == "pend") {
                                            echo "active";
                                        }
                                        if ($this->uri->segment(3) == "ed_pend") {
                                            echo "active";
                                        }
                                        if ($this->uri->segment(3) == "temp_pen") {
                                            echo "active";
                                        }
                                        ?>" href="<?= base_url() ?>index.php/karyawan/riwayat_pndidikan/pendformal" href="<?= base_url() ?>index.php/karyawan/riwayat_pndidikan/pend" href="<?= base_url() ?>index.php/karyawan/riwayat_pndidikan/ed_pend" href="<?= base_url() ?>index.php/Karyawan/riwayat_pndidikan/temp_pen">
                <i class="app-menu__icon fa fa-graduation-cap"></i>
                <span class="app-menu__label">Pendidikan</span>
            </a>
        </li>
        <li class="treeview <?php if ($this->uri->segment(2) == "riwayat_pengembangan") {
                                echo "is-expanded";
                            } ?>">
            <a class="app-menu__item <?php if ($this->uri->segment(2) == "riwayat_pengembangan") {
                                            echo "active";
                                        } ?>" href="#tpeng" data-toggle="treeview">
                <i class="app-menu__icon fa fa-line-chart"></i>
                <span class="app-menu__label">Pengembangan</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li id="tpeng">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "pelatihan") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "in_pelatihan") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "ed_pelatihan") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "temp_plthn") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/karyawan/riwayat_pengembangan/pelatihan" href="<?= base_url() ?>index.php/karyawan/riwayat_pengembangan/in_pelatihan" href="<?= base_url() ?>index.php/karyawan/riwayat_pengembangan/ed_pelatihan" href="<?= base_url() ?>index.php/Karyawan/riwayat_pengembangan/temp_plthn">
                        <i class="icon fa fa-check-square-o "></i> Pelatihan
                    </a>
                </li>
            </ul>
            <ul class="treeview-menu">
                <li id="tpeng">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "assessment") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/karyawan/riwayat_pengembangan/assessment"><i class="icon fa fa-check-square-o "></i> Assessmet</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item <?php if ($this->uri->segment(2) == "riwayat_hukuman") {
                                            echo "active";
                                        } ?>" href="<?= base_url() ?>index.php/karyawan/riwayat_hukuman">
                <i class="app-menu__icon fa fa-gavel"></i>
                <span class="app-menu__label">Riwayat Hukuman</span>
            </a>
        </li>
        <?php
        $npp = $this->session->userdata('status_login_username');
        $data = $this->Model_karyawan->get_kd_menu($npp);
        foreach ($data as $key) {
            $kd_menu = $key['kd_menu'];
        }
        if ($kd_menu >= 81111 and $kd_menu <= 83652) { ?>
            <li class="treeview <?php if ($this->uri->segment(2) == "cuti") {
                                    echo "is-expanded";
                                } ?>">
                <a class="app-menu__item <?php if ($this->uri->segment(2) == "cuti") {
                                                echo "active";
                                            } ?>" href="#tpeng" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-user-times"></i>
                    <span class="app-menu__label">Pengajuan Cuti</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="tpeng">
                        <a class="treeview-item <?php if ($this->uri->segment(3) == "in_cuti") {
                                                    echo "active";
                                                } ?>" href="<?= base_url() ?>index.php/Karyawan/cuti/in_cuti">
                            <i class="icon fa fa-check-square-o "></i> Form Pengajuan Cuti
                        </a>
                    </li>
                </ul>
                <ul class="treeview-menu">
                    <li id="tpeng">
                        <a class="treeview-item <?php if ($this->uri->segment(3) == "tb_cuti") {
                                                    echo "active";
                                                } ?>" href="<?= base_url() ?>index.php/Karyawan/cuti/tb_cuti">
                            <i class="icon fa fa-check-square-o "></i> Status Pengajuan Cuti
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="app-menu__item <?php if ($this->uri->segment(3) == "tb_lembur") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/karyawan/lembur/tb_lembur">
                    <i class="app-menu__icon fa fa-clock-o"></i>
                    <span class="app-menu__label">Status Pengajuan Lembur</span>
                </a>
            </li>
        <?php
        } elseif ($kd_menu == 8111 OR $kd_menu == 8112 OR $kd_menu == 8113 
        OR $kd_menu == 8121 OR $kd_menu == 8122 OR $kd_menu == 8123
        OR $kd_menu == 8131 OR $kd_menu == 8132 OR $kd_menu == 8133 OR $kd_menu == 8134
        OR $kd_menu == 8141 OR $kd_menu == 8142
        OR $kd_menu == 8211 OR $kd_menu == 8212 OR $kd_menu == 8213 OR $kd_menu == 8214 OR $kd_menu == 8215
        OR $kd_menu == 8221 OR $kd_menu == 8222 OR $kd_menu == 8223 OR $kd_menu == 8224
        OR $kd_menu == 8311 OR $kd_menu == 8312
        OR $kd_menu == 8321 OR $kd_menu == 8322 OR $kd_menu == 8323
        OR $kd_menu == 8331 OR $kd_menu == 8332
        OR $kd_menu == 8341 OR $kd_menu == 8342 OR $kd_menu == 8343
        OR $kd_menu == 8351 OR $kd_menu == 8352 OR $kd_menu == 8353 OR $kd_menu == 8354
        OR $kd_menu == 8361 OR $kd_menu == 8362 OR $kd_menu == 8363 OR $kd_menu == 8364 OR $kd_menu == 8365) { ?>
            <li class="treeview <?php if ($this->uri->segment(2) == "cuti_subdiv") {
                                    echo "is-expanded";
                                } ?>">
                <a class="app-menu__item <?php if ($this->uri->segment(2) == "cuti_subdiv") {
                                                echo "active";
                                            } ?>" href="#tpeng" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-user-times"></i>
                    <span class="app-menu__label">Pengajuan Cuti</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="tpeng">
                        <a class="treeview-item <?php if ($this->uri->segment(3) == "in_cuti") {
                                                    echo "active";
                                                } ?>" href="<?= base_url() ?>index.php/Karyawan/cuti_subdiv/in_cuti">
                            <i class="icon fa fa-check-square-o "></i> Form Pengajuan Cuti
                        </a>
                    </li>
                </ul>
                <ul class="treeview-menu">
                    <li id="tpeng">
                        <a class="treeview-item <?php if ($this->uri->segment(3) == "tb_cuti") {
                                                    echo "active";
                                                } ?>" href="<?= base_url() ?>index.php/Karyawan/cuti_subdiv/tb_cuti">
                            <i class="icon fa fa-check-square-o "></i> Status Pengajuan Cuti
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview <?php if ($this->uri->segment(2) == "lembur_subdiv") {
                                    echo "is-expanded";
                                } ?>">
                <a class="app-menu__item <?php if ($this->uri->segment(2) == "lembur_subdiv") {
                                                echo "active";
                                            } ?>" href="#tpeng" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-clock-o"></i>
                    <span class="app-menu__label">Pengajuan Lembur</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="tpeng">
                        <a class="treeview-item <?php if ($this->uri->segment(3) == "in_lembur") {
                                                    echo "active";
                                                } ?>" href="<?= base_url() ?>index.php/Karyawan/lembur_subdiv/in_lembur">
                            <i class="icon fa fa-check-square-o "></i> Form Pengajuan Lembur
                        </a>
                    </li>
                </ul>
                <ul class="treeview-menu">
                    <li id="tpeng">
                        <a class="treeview-item <?php if ($this->uri->segment(3) == "tb_lembur_sub") {
                                                    echo "active";
                                                } ?>" href="<?= base_url() ?>index.php/Karyawan/lembur_subdiv/tb_lembur_sub">
                            <i class="icon fa fa-check-square-o "></i> Status Pengajuan Lembur
                        </a>
                    </li>
                </ul>
            </li>
            <!-- <li>
                <a class="app-menu__item <?php if ($this->uri->segment(3) == "data_kar") {
                                                echo "active";
                                            } 
                                            if ($this->uri->segment(4) == "penilaian") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/karyawan/penilaian_kasubdiv/data_kar" href="<?= base_url() ?>index.php/karyawan/penilaian_kasubdiv/penilaian">
                    <i class="app-menu__icon fa fa-star"></i>
                    <span class="app-menu__label">Penilaian Kinerja</span>
                </a>
            </li> -->
            <li class="treeview <?php if ($this->uri->segment(2) == "penilaian_kasubdiv") {
                                    echo "is-expanded";
                                } ?>">
                <a class="app-menu__item <?php if ($this->uri->segment(2) == "penilaian_kasubdiv") {
                                                echo "active";
                                            } ?>" href="#kp" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-star"></i>
                    <span class="app-menu__label">Penilaian Kinerja</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li id="kp">
                        <a class="treeview-item <?php if ($this->uri->segment(3) == "data_kar") {
                                                    echo "active";
                                                } if ($this->uri->segment(3) == "penilaian") {
                                                    echo "active";
                                                } ?>" href="<?= base_url() ?>index.php/Karyawan/penilaian_kasubdiv/data_kar" href="<?= base_url() ?>index.php/karyawan/penilaian_kasubdiv/penilaian">
                            <i class="icon fa fa-check-square-o "></i> Form Penilaian Kinerja
                        </a>
                    </li>
                </ul>
                <ul class="treeview-menu">
                    <li id="kp">
                        <a class="treeview-item <?php if ($this->uri->segment(3) == "nilai") {
                                                    echo "active";
                                                } ?>" href="<?= base_url() ?>index.php/Karyawan/penilaian_kasubdiv/nilai">
                            <i class="icon fa fa-check-square-o "></i> Hasil Penilaian Kinerja
                        </a>
                    </li>
                </ul>
            </li>
        <?php } elseif ($kd_menu == 8110 OR $kd_menu == 8120 OR $kd_menu == 8130 OR $kd_menu == 8140 
        OR $kd_menu == 8210 OR $kd_menu == 8220 OR $kd_menu == 8310 OR $kd_menu == 8320 OR $kd_menu == 8330 
        OR $kd_menu == 8340 OR $kd_menu == 8350 OR $kd_menu == 8350 OR $kd_menu == 8360) { ?>
            <li>
                <a class="app-menu__item <?php if ($this->uri->segment(2) == "history_nilai_kadiv") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/karyawan/history_nilai_kadiv">
                    <i class="app-menu__icon fa fa-star"></i>
                    <span class="app-menu__label">History Penilaian Kinerja</span>
                </a>
            </li>
            <li>
                <a class="app-menu__item <?php if ($this->uri->segment(2) == "history_cuti_kadiv") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/karyawan/history_cuti_kadiv">
                    <i class="app-menu__icon fa fa-gavel"></i>
                    <span class="app-menu__label">History Cuti Karyawan</span>
                </a>
            </li>
        <?php } elseif ($kd_menu == 4) {
            echo "";
        }
        ?>



    </ul>
</aside>