<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?php echo base_url() ;?>assets_application/assets/faces/9.jpg">
        <div>
            <span class="app-sidebar__user-name"><?php echo $this->session->userdata('status_login');?></span>
            <p class="app-sidebar__user-designation">Super Administrator</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item <?php if($this->uri->segment(2)=="in_suadmin"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/su_admin/in_suadmin">
                <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Halaman Utama</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php if($this->uri->segment(2)=="t_kar"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/su_admin/t_kar">
                <i class="app-menu__icon fa fa-edit"></i>
                    <span class="app-menu__label">Input Karyawan</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php if($this->uri->segment(2)=="edit_karyawan"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/su_admin/edit_karyawan">
                <i class="app-menu__icon fa fa-edit"></i>
                    <span class="app-menu__label">Edit Karyawan</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php if($this->uri->segment(2)=="tabel_akryawan"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/su_admin/tabel_akryawan/ptg" >
                <i class="app-menu__icon fa fa-th-list"></i>
                    <span class="app-menu__label">Data Karyawan</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item <?php if($this->uri->segment(2)=="laporan"){echo "active";} ?>" href="<?php echo base_url() ?>index.php/su_admin/laporan">
                <i class="app-menu__icon fa fa-file-text"></i>
                    <span class="app-menu__label">Laporan</span>
            </a>
        </li>
    </ul>
</aside>