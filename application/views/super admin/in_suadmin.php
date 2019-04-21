<!DOCTYPE html>
<html lang="en">
    <head>

        <?php $this->load->view('template/head') ?>
    
    </head>
    <body class="app sidebar-mini rtl">
        <!-- Navbar-->
        <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/su_admin/in_suadmin">PTPN VIII</a>
            <?php $this->load->view('template/header_su') ?>
        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        
            <?php $this->load->view('template/menu_suadmin') ?>
        
        <main class="app-content">
        <div class="app-title">
            <div>
            <h1><i class="fa fa-dashboard"></i> Halaman Utama</h1>
            <p></p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>index.php/welcome/in_suadmin">Dashboard</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Monthly Sales</h3>
                <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                </div>
            </div>
            </div>
            <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Support Requests</h3>
                <div class="embed-responsive embed-responsive-16by9">
                <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Features</h3>
                <ul>
                
                <p class="mt-4 mb-4"><a class="btn btn-primary mr-2 mb-2" href="http://pratikborsadiya.in/blog/vali-admin" target="_blank"><i class="fa fa-file"></i>Docs</a><a class="btn btn-info mr-2 mb-2" href="https://github.com/pratikborsadiya/vali-admin" target="_blank"><i class="fa fa-github"></i>GitHub</a><a class="btn btn-success mr-2 mb-2" href="https://github.com/pratikborsadiya/vali-admin/archive/master.zip" target="_blank"><i class="fa fa-download"></i>Download</a></p>
            </div>
            </div>
            <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Compatibility with frameworks</h3>
                <p>This theme is not built for a specific framework or technology like Angular or React etc. But due to it's modular nature it's very easy to incorporate it into any front-end or back-end framework like Angular, React or Laravel.</p>
                <p>Go to <a href="http://pratikborsadiya.in/blog/vali-admin" target="_blank">documentation</a> for more details about integrating this theme with various frameworks.</p>
                <p>The source code is available on GitHub. If anything is missing or weird please report it as an issue on <a href="https://github.com/pratikborsadiya/vali-admin" target="_blank">GitHub</a>. If you want to contribute to this theme pull requests are always welcome.</p>
            </div>
            </div>
        </div>
        </main>
        
        <?php $this->load->view('template/script')?>
        
    </body>
</html>