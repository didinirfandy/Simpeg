<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo base_url() ;?>assets_application/assets/faces/9.jpg">
        <div>
            <span class="app-sidebar__user-name"><?php echo $this->session->userdata('status_login');?></span>
            <p class="app-sidebar__user-designation">Karyawan</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item <?php if($this->uri->segment(2)=="in_kar"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/Karyawan/in_kar">
                <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview <?php if($this->uri->segment(2)=="data_diri"){echo "is-expanded";} ?>">
            <a class="app-menu__item <?php if($this->uri->segment(2)=="data_diri"){echo "active";} ?>" href="#tdata" data-toggle="treeview">
                <i class="app-menu__icon fa fa-th-list"></i>
                    <span class="app-menu__label">Data Diri</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li id="tdata">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="biodiri"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/karyawan/data_diri/biodiri"><i class="icon fa fa-circle-o"></i> Biodata Diri</a>
                </li>
                <li id="tdata">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="biokel"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/karyawan/data_diri/biokel"><i class="icon fa fa-circle-o"></i> Biodata Keluarga</a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php if($this->uri->segment(2)=="riwayat_pekerjaan"){echo "is-expanded";} ?>">
            <a class="app-menu__item <?php if($this->uri->segment(2)=="riwayat_pekerjaan"){echo "active";} ?>" href="#tpkjr" data-toggle="treeview">
                <i class="app-menu__icon fa fa-th-list"></i>
                    <span class="app-menu__label">Riwayat Pekerjaan</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li id="tpkjr">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="ling"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/karyawan/riwayat_pekerjaan/ling"><i class="icon fa fa-circle-o"></i> Lingkungan PTPN VIII</a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php if($this->uri->segment(2)=="riwayat_pndidikan"){echo "is-expanded";} ?>">
            <a class="app-menu__item <?php if($this->uri->segment(2)=="riwayat_pndidikan"){echo "active";} ?>" href="#tpnd" data-toggle="treeview">
                <i class="app-menu__icon fa fa-th-list"></i>
                    <span class="app-menu__label">Riwayat Pendidikan</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li id="tpnd">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="pendformal"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/karyawan/riwayat_pndidikan/pendformal"><i class="icon fa fa-circle-o"></i> Pendidikan Formal</a>
                </li>
            </ul>
        </li>
        <li class="treeview <?php if($this->uri->segment(2)=="riwayat_pengembangan"){echo "is-expanded";} ?>">
            <a class="app-menu__item <?php if($this->uri->segment(2)=="riwayat_pengembangan"){echo "active";} ?>" href="#tpeng" data-toggle="treeview">
                <i class="app-menu__icon fa fa-th-list"></i>
                    <span class="app-menu__label">Riwayat Pengembangan</span>
                        <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li id="tpeng">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="pelatihan"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/karyawan/riwayat_pengembangan/pelatihan"><i class="icon fa fa-circle-o"></i> Pelatihan</a>
                </li>
            </ul>
            <ul class="treeview-menu">
                <li id="tpeng">
                    <a class="treeview-item <?php if($this->uri->segment(3)=="assessment"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/karyawan/riwayat_pengembangan/assessment"><i class="icon fa fa-circle-o"></i> Assessmet</a>
                </li>
            </ul>
        </li>
        <li class="">
            <a class="app-menu__item <?php if($this->uri->segment(2)=="riwayat_hukuman"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/karyawan/riwayat_hukuman">
                <i class="app-menu__icon fa fa-pie-chart"></i>
                    <span class="app-menu__label">Riwayat Hukuman</span>
            </a>
        </li>
        
    </ul>
</aside>