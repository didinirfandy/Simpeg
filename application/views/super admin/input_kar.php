
<html lang="en">
    <head id="simpan">

        <?php $this->load->view('template/head') ?>

    </head>
    <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/Welcome/in_suadmin">PTPN VIII</a>
        
        <?php $this->load->view('template/header') ?>
    
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_suadmin') ?>

    <main class="app-content">
        <div class="app-title">
        <div>
            <h1><i class="fa fa-pie-chart"></i> Data Karyawan </h1>
            <p></p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/suadmin/super admin/dt_kar"> Data Karyawan</a></li>
        </ul>
        </div>
        <div class="row" >
            <div class="clearix"></div>
            <div class="col-md-12">
                <div class="tile">

                <?php $attributes = array('id' => 'regForm');
                echo form_open('su_admin/input_karyawan',$attributes);?>

                    <h3 class="tile-title">Input Data Admin</h3>
                    <div class="tile-body" >
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" name="nama" id="nm" placeholder="Enter full name" pattern="[A-Za-z\s]{1,50}" title="Harus Menggunakan Huruf(1-50)" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <textarea class="form-control" rows="4" name="alamat" id="almt" placeholder="Enter your address" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Telepon / HP</label>
                            <input class="form-control" type="number" name="tlp" id="tlp" placeholder="Enter telepon / hp" pattern="[0-9]{1,12}" title="Harus Menggunakan Angka(1-20)" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input class="form-control" type="email" name="email" id="eml" placeholder="Enter email address" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input class="form-control" type="text" name="username" id="user" placeholder="Enter username" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input class="form-control" type="password" name="pass" id="txtPassword" placeholder="Enter password" pattern=".{6}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Harus 6 Karakter, Tidak Boleh Lebih' : ''); if(this.checkValidity()) form.kpassword.pattern = this.value;" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Konfirmasi Password</label>
                            <input class="form-control" type="password" name="kpassword" id="txtConfirmPassword" placeholder="Enter password" pattern=".{6}" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');" required>
                        </div>
                        <div class="tile-footer">
                            <button class="btn btn-primary" id="btnSubmit" name="submit" type="submit">Submit</button>
                        </div>    
                    </div>  
                <?php echo form_close() ?>
                </div>
            </div>
        </div>
    <footer>
        <! -- footer area start-->
            <?php $this->load->view('template/footer') ?>
        <! -- footer area end-->
    </footer>
    </main>

        <!-- Main Menu area start-->
            <?php $this->load->view('template/script') ?>
        <!-- Main Menu area End-->

        <!-- Main Menu area Konfirmasi Password start-->
        <script type="text/javascript" src="<?php echo base_url() ?>assets_application/js/plugins/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() 
        {
            $("#btnSubmit").click(function () 
            {
                var password = $("#txtPassword").val();
                var confirmPassword = $("#txtConfirmPassword").val();
                if (password != confirmPassword) 
                {
                    alert("Passwords do not match.");
                    return false;
                }
                return true;
            });

            $("#regForm").submit(function() 
            {
                $.ajax({
                    type : 'POST',
                    data : $('#regForm').serialize(),
                    url  : '<?php echo base_url(). 'index.php/su_admin/input_karyawan'?>',
                    dataType : 'json',
                    success : function(data) {
                        $('#nm').val("");
                        $('#almt').val("");
                        $('#tlp').val("");
                        $('#eml').val("");
                        $('#user').val("");
                        $('#txtPassword').val("");
                        $('#txtConfirmPassword').val("");
                        alert(data);
                        $('#simpan').load("<?php echo base_url();?>index.php/su_admin/t_kar");
                    }
                });
                return false;
            });
        });
        </script>
        <!-- Main Menu area Konfirmasi Password end-->

    </body>
</html>