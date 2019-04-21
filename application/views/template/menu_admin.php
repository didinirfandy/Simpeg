<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo base_url() ;?>assets_application/assets/faces/10.jpeg">
        <div>
            <span class="app-sidebar__user-name"><?php echo $this->session->userdata('status_login');?></span>
            <p class="app-sidebar__user-designation">Administrator</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item <?php if($this->uri->segment(2)=="in_admin"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/Admin/in_admin">
                <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview <?php if($this->uri->segment(2)=="tabel_sdm"){echo "is-expanded";} ?>" >
            <a class="app-menu__item <?php if($this->uri->segment(2)=="tabel_sdm"){echo "active";} ?>" href="#tabelsdm" data-toggle="treeview">
                <i class="app-menu__icon fa fa-th-list"></i>
                    <span class="app-menu__label">Tabel SDM</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li id="tabelsdm">
                    <a  class="treeview-item <?php if($this->uri->segment(3)=="in_sdm01"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm01"><i class="icon fa fa-circle-o"></i> SDM 01</a>
                </li>
                <li  id="tabelsdm">
                    <a  class="treeview-item <?php if($this->uri->segment(3)=="in_sdm02"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm02"><i class="icon fa fa-circle-o"></i> SDM 02</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="in_sdm03"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm03"><i class="icon fa fa-circle-o"></i> SDM 03</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="in_sdm04"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm04"><i class="icon fa fa-circle-o"></i> SDM 04</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="in_sdm05"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm05"><i class="icon fa fa-circle-o"></i> SDM 05</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="in_sdm06"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm06"><i class="icon fa fa-circle-o"></i> SDM 06</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="in_sdm07"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm07"><i class="icon fa fa-circle-o"></i> SDM 07</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="in_sdm08"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm08"><i class="icon fa fa-circle-o"></i> SDM 08</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="in_sdm09"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm09"><i class="icon fa fa-circle-o"></i> SDM 09</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="in_sdm10"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm10"><i class="icon fa fa-circle-o"></i> SDM 10</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="in_sdm11"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm11"><i class="icon fa fa-circle-o"></i> SDM 11</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="in_sdm12"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm12"><i class="icon fa fa-circle-o"></i> SDM 12</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="in_sdm13"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm13"><i class="icon fa fa-circle-o"></i> SDM 13</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="in_sdm14"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm14"><i class="icon fa fa-circle-o"></i> SDM 14</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="in_sdm15"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm15"><i class="icon fa fa-circle-o"></i> SDM 15</a>
                </li>
                <li id="tabelsdm">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="in_sdm16"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/in_sdm16"><i class="icon fa fa-circle-o"></i> SDM 16</a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php if($this->uri->segment(2)=="tabel"){echo "is-expanded";} ?>">
            <a class="app-menu__item <?php if($this->uri->segment(2)=="tabel"){echo "active";} ?>" href="#tabel" data-toggle="treeview">
                <i class="app-menu__icon fa fa-th-list"></i>
                    <span class="app-menu__label">Tabel</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li id="tabel">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="agama"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel/in_agama"><i class="icon fa fa-circle-o"></i> Agama</a>
                </li>
                <li id="tabel">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="akreditasi"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel/in_akreditasi"><i class="icon fa fa-circle-o"></i> Akreditasi</a>
                </li>
                <li id="tabel">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="budidaya"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel/in_budidaya"><i class="icon fa fa-circle-o"></i> Budidaya</a>
                </li>
                <li id="tabel">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="jabatan"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel/in_jabatan"><i class="icon fa fa-circle-o"></i> Jabatan</a>
                </li>
                <li id="tabel">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="pendidikan"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel/in_pendidikan"><i class="icon fa fa-circle-o"></i> Pendidikan</a>
                </li>
                <li id="tabel">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="sipil"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel/in_sipil"><i class="icon fa fa-circle-o"></i> Sipil</a>
                </li>
                <li id="tabel">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="tingkatpendidikan"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel/in_tkpendidikan"><i class="icon fa fa-circle-o"></i> Tingkat Pendidikan</a>
                </li>
                <li id="tabel">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="unit"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel/in_unit"><i class="icon fa fa-circle-o"></i> Unit</a>
                </li>
                <li id="tabel">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="golongan"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel/in_golongan"><i class="icon fa fa-circle-o"></i> Golongan</a>
                </li>
                <li id="tabel">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="komoditi"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/admin/tabel/in_komoditi"><i class="icon fa fa-circle-o"></i> Komoditi</a>
                </li>
            </ul>
        </li>
        <li>
            <a class="app-menu__item <?php if($this->uri->segment(2)=="tbrekap"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/Admin/tbl_rekap">
                <i class="app-menu__icon fa fa-pie-chart"></i>
                    <span class="app-menu__label">Rekap Peringatan</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php if($this->uri->segment(2)=="ta1"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/Admin/tabel_a1">
                <i class="app-menu__icon fa fa-pie-chart"></i>
                    <span class="app-menu__label">Tabel A1</span>
            </a>
        </li>
    </ul>
</aside>