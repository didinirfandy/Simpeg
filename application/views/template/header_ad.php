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
                $this->load->model('Model_admin');
                $notif1 = $this->Model_admin->tempt01();
                $notif2 = $this->Model_admin->tempt02();
                $notif3 = $this->Model_admin->tempt03();
                $notif4 = $this->Model_admin->tempt04();
                $i = 0;
                foreach ($notif1 as $b) {
                        $i++;
                }
                foreach ($notif2 as $b) {
                        $i++;
                }
                foreach ($notif3 as $a) {
                        $i++;
                }
                foreach ($notif4 as $a) {
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
                                        <?php foreach ($notif1 as $ntf1) { ?>
                                        <li><a class="app-notification__item" href="<?= base_url() ?>index.php/admin/tabel_temp/tmpt_sdm01"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                                        <div>
                                                                <strong>
                                                                        <p class="app-notification__message"><?php $sdm01 = $this->Model_admin->sdm01($ntf1['npp']);
                                                                                                                        foreach ($sdm01 as $s) {
                                                                                                                                echo $s['nama'];
                                                                                                                        } ?> Merubah Data Diri</p>
                                                                </strong>
                                                                <p class="app-notification__meta"><?= date('d-m-Y H:i:s', strtotime($ntf1['tgl'])) ?></p>
                                                        </div>
                                                </a></li>
                                        <?php } ?>
                                        <?php foreach ($notif2 as $ntf2) { ?>
                                        <li><a class="app-notification__item" href="<?= base_url() ?>index.php/admin/tabel_temp/tmpt_sdm02"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                                        <div>
                                                                <strong>
                                                                        <p class="app-notification__message"><?php $sdm01 = $this->Model_admin->sdm01($ntf2['npp']);
                                                                                                                        foreach ($sdm01 as $s) {
                                                                                                                                echo $s['nama'];
                                                                                                                        } ?> Merubah Data Keluarga</p>
                                                                </strong>
                                                                <p class="app-notification__meta"><?= date('d-m-Y H:i:s', strtotime($ntf2['tgl'])) ?></p>
                                                        </div>
                                                </a></li>
                                        <?php } ?>
                                        <?php foreach ($notif3 as $ntf3) { ?>
                                        <li><a class="app-notification__item" href="<?= base_url() ?>index.php/admin/tabel_temp/tmpt_sdm03"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                                        <div>
                                                                <strong>
                                                                        <p class="app-notification__message"><?php $sdm01 = $this->Model_admin->sdm01($ntf3['npp']);
                                                                                                                        foreach ($sdm01 as $s) {
                                                                                                                                echo $s['nama'];
                                                                                                                        } ?> Merubah Data Pendidikan</p>
                                                                </strong>
                                                                <p class="app-notification__meta"><?= date('d-m-Y H:i:s', strtotime($ntf3['tgl'])) ?></p>
                                                        </div>
                                                </a></li>
                                        <?php } ?>
                                        <?php foreach ($notif4 as $ntf4) { ?>
                                        <li><a class="app-notification__item" href="<?= base_url() ?>index.php/admin/tabel_temp/tmpt_sdm04"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                                        <div>
                                                                <strong>
                                                                        <p class="app-notification__message"><?php $sdm01 = $this->Model_admin->sdm01($ntf4['npp']);
                                                                                                                        foreach ($sdm01 as $s) {
                                                                                                                                echo $s['nama'];
                                                                                                                        } ?> Merubah Data Pelatihan</p>
                                                                </strong>
                                                                <p class="app-notification__meta"><?= date('d-m-Y H:i:s', strtotime($ntf4['tgl'])) ?></p>
                                                        </div>
                                                </a></li>
                                        <?php } ?>
                                </div>
                                </div>
                        </ul>
                </li>

                <!-- User Menu-->
                <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                        <ul class="dropdown-menu settings-menu dropdown-menu-right">
                                <li><a class="dropdown-item" href="<?= base_url(); ?>index.php/Admin/settings"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                                <li><a class="dropdown-item" href="<?= base_url(); ?>index.php/core/logout_admin"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                        </ul>
                </li>
        </ul>