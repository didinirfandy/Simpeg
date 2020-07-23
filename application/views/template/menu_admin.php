<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <?php
        $profil = $this->Model_admin->get_login_admin();
        foreach ($profil as $p) { ?>
        <img class="app-sidebar__user-avatar" src="<?= base_url(); ?>assets_application/assets/faces/admin/<?= $p['image'] ?>">
        <?php } ?>
        <!-- <img class="app-sidebar__user-avatar" src="<?= base_url(); ?>assets_application/assets/faces/default.jpg"> -->
        <div>
            <span class="app-sidebar__user-name">
                <?php $str = $this->session->userdata('status_login');
                echo wordwrap($str, 15, "<br>\n"); ?>
            </span>
            <p class="app-sidebar__user-designation">Administrator</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item <?php if ($this->uri->segment(2) == "in_admin") {
                                            echo "active";
                                        } ?>" href="<?= base_url() ?>index.php/Admin/in_admin">
                <i class="app-menu__icon fa fa-home"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview <?php if ($this->uri->segment(2) == "kepegawaian") {
                                        echo "is-expanded";
                                    } ?>">
            <a class="app-menu__item <?php if ($this->uri->segment(2) == "kepegawaian") {
                                            echo "active";
                                        } ?>" href="#tabelkep" data-toggle="treeview">
                <i class="app-menu__icon fa fa-pencil-square"></i>
                <span class="app-menu__label">Kepegawaian</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li id="tabelkep">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "tmpt_sdm03") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/kepegawaian/tmpt_sdm03"><i class="icon fa fa-hand-o-right"></i> Pensiun*</a>
                </li>
                <li id="tabelkep">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "mutasi") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/kepegawaian/mutasi"><i class="icon fa fa-hand-o-right"></i> Mutasi Jabatan</a>
                </li>
                <li id="tabelkep">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "golongan") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/kepegawaian/golongan"><i class="icon fa fa-hand-o-right"></i> Golongan</a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php if ($this->uri->segment(2) == "tabel_sdm") {
                                echo "is-expanded";
                            } ?>">
            <a class="app-menu__item <?php if ($this->uri->segment(2) == "tabel_sdm") {
                                            echo "active";
                                        } ?>" href="#tabelsdm" data-toggle="treeview">
                <i class="app-menu__icon fa fa-th-list"></i>
                <span class="app-menu__label">Tabel Kepegawaian</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <!-- <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "absen") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/absen">
                        <i class="icon fa fa-hand-o-right"></i> Data Absensi</a>
                </li> -->
                <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm01") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm01") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm01" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm01">
                        <i class="icon fa fa-hand-o-right"></i> Biodata Diri</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm02") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm02") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm02" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm02">
                        <i class="icon fa fa-hand-o-right"></i> Keluarga</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm03") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm03") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm03" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm03">
                        <i class="icon fa fa-hand-o-right"></i> Pendidikan</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm04") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm04") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm04" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm04">
                        <i class="icon fa fa-hand-o-right"></i> Pelatihan</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm05") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm05") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm05" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm05">
                        <i class="icon fa fa-hand-o-right"></i> Jabatan</a>
                </li>
                <!-- <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm06") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm06") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm06" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm06">
                        <i class="icon fa fa-hand-o-right"></i> SDM 06</a>
                </li> -->
                <!-- <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm07") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm07") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm07" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm07">
                        <i class="icon fa fa-hand-o-right"></i> SDM 07</a>
                </li> -->
                <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm08") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm08") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm08" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm08">
                        <i class="icon fa fa-hand-o-right"></i> Mutasi</a>
                </li>
                <!-- <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm09") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm09") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm09" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm09">
                        <i class="icon fa fa-hand-o-right"></i> SDM 09</a>
                </li> -->
                <!-- <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm10") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm10") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm10" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm10">
                        <i class="icon fa fa-hand-o-right"></i> SDM 10</a>
                </li> -->
                <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm11") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm11") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm11" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm11">
                        <i class="icon fa fa-hand-o-right"></i> Penugasan</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm12") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm12") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm12" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm12">
                        <i class="icon fa fa-hand-o-right"></i> Nilai Kredit</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm13") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm13") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm13" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm13">
                        <i class="icon fa fa-hand-o-right"></i> Jubilium</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm14") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm14") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm14" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm14">
                        <i class="icon fa fa-hand-o-right"></i> Hukuman</a>
                </li>
                <!-- <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm15") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm15") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm15" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm15">
                        <i class="icon fa fa-hand-o-right"></i> SDM 15</a>
                </li> -->
                <li id="tabelsdm">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "in_sdm16") {
                                                echo "active";
                                            }
                                            if ($this->uri->segment(3) == "inpt_sdm16") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_sdm/in_sdm16" href="<?= base_url() ?>index.php/admin/tabel_sdm/inpt_sdm16">
                        <i class="icon fa fa-hand-o-right"></i> Kenaikan Golonagan</a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php if ($this->uri->segment(2) == "tabel_temp") {
                                echo "is-expanded";
                            } ?>">
            <a class="app-menu__item <?php if ($this->uri->segment(2) == "tabel_temp") {
                                            echo "active";
                                        } ?>" href="#tabeltemp" data-toggle="treeview">
                <i class="app-menu__icon fa fa-pie-chart"></i>
                <span class="app-menu__label">Temporary</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li id="tabeltemp">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "tmpt_sdm01") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_temp/tmpt_sdm01">
                        <i class="icon fa fa-hand-o-right"></i> Data Biodata Diri</a>
                </li>
                <li id="tabeltemp">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "tmpt_sdm02") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_temp/tmpt_sdm02">
                        <i class="icon fa fa-hand-o-right"></i> Data Keluarga</a>
                </li>
                <li id="tabeltemp">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "tmpt_sdm03") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_temp/tmpt_sdm03">
                        <i class="icon fa fa-hand-o-right"></i> Data Pendidikan</a>
                </li>
                <li id="tabeltemp">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "tmpt_sdm04") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/tabel_temp/tmpt_sdm04">
                        <i class="icon fa fa-hand-o-right"></i> Data Pelatihan</a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php if ($this->uri->segment(2) == "cuti_admin") {
                                echo "is-expanded";
                            } ?>">
            <a class="app-menu__item <?php if ($this->uri->segment(2) == "cuti_admin") {
                                            echo "active";
                                        } ?>" href="#tabelcuti" data-toggle="treeview">
                <i class="app-menu__icon fa fa-user-times"></i>
                <span class="app-menu__label">Cuti Karyawan</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li id="tabelcuti">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "kuota_cuti_admin") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/cuti_admin/kuota_cuti_admin"><i class="icon fa fa-hand-o-right"></i> Kuota Cuti</a>
                </li>
                <li id="tabelcuti">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "tb_cuti_admin") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/cuti_admin/tb_cuti_admin"><i class="icon fa fa-hand-o-right"></i> Pengajuan Cuti</a>
                </li>
            </ul>
        </li>
        <!-- <li>
            <a class="app-menu__item <?php if ($this->uri->segment(2) == "tabel_a1") {
                                            echo "active";
                                        } ?>" href="<?= base_url() ?>index.php/Admin/tabel_a1">
                <i class="app-menu__icon fa fa-pencil"></i>
                <span class="app-menu__label">Tabel A1</span>
            </a>
        </li> -->
        <!-- <li>
            <a class="app-menu__item <?php if ($this->uri->segment(2) == "lembur_admin") {
                                            echo "active";
                                        } ?>" href="<?= base_url() ?>index.php/Admin/lembur_admin">
                <i class="app-menu__icon fa fa-clock-o"></i>
                <span class="app-menu__label">Lembur Karyawan</span>
            </a>
        </li> -->
        <li class="treeview <?php if ($this->uri->segment(2) == "lembur_admin") {
                                echo "is-expanded";
                            } ?>">
            <a class="app-menu__item <?php if ($this->uri->segment(2) == "lembur_admin") {
                                            echo "active";
                                        } ?>" href="#tabel_lembur" data-toggle="treeview">
                <i class="app-menu__icon fa fa-clock-o"></i>
                <span class="app-menu__label">Lembur Karyawan</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li id="tabel_lembur">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "p_lmbr") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/lembur_admin/p_lmbr">
                        <i class="icon fa fa-hand-o-right"></i> Pengajuan Lembur</a>
                </li>
                <li id="tabel_lembur">
                    <a class="treeview-item <?php if ($this->uri->segment(3) == "lmbr") {
                                                echo "active";
                                            } ?>" href="<?= base_url() ?>index.php/admin/lembur_admin/lmbr">
                        <i class="icon fa fa-hand-o-right"></i> Upah Lembur Perbulan</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item <?php if ($this->uri->segment(2) == "hsl_nilai") {
                                            echo "active";
                                        } ?>" href="<?= base_url() ?>index.php/admin/hsl_nilai">
                <i class="app-menu__icon fa fa-bar-chart"></i>
                <span class="app-menu__label">Penilaian Kinerja </span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php if ($this->uri->segment(2) == "Cetak_cv_admin") {
                                            echo "active";
                                        } ?>" href="<?= base_url() ?>index.php/Admin/Cetak_cv_admin">
                <i class="app-menu__icon fa fa-print"></i>
                <span class="app-menu__label">Cetak CV Karyawan</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php if ($this->uri->segment(3) == "hak") {
                                            echo "active";
                                        }
                                        if ($this->uri->segment(3) == "ed_hak") {
                                            echo "active";
                                        } ?>" href="<?= base_url() ?>index.php/Admin/hak_akses/hak" href="<?= base_url() ?>index.php/Admin/hak_akses/ed_hak">
                <i class="app-menu__icon fa fa-key"></i>
                <span class="app-menu__label">Hak Akses Karyawan</span>
            </a>
        </li>
    </ul>
</aside>