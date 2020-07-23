<?php
if (empty($_SESSION['status_login'])) {
    redirect();
} else {
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php
        $data['tittle'] = "Form Pengajuan Lembur";
        $this->load->view('template/head', $data);
        ?>
    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
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
                <h1><i class="fa fa-clock-o"></i> Form Pengajuan Lembur </h1>
                <p></p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Pengajuan Lembur</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/karyawan/data/pengajuan cuti/tb_cuti_kadiv"> Form Pengajuan Lembur</a></li>
            </ul>
        </div>
        <div class="row">

            <!-- Swetalert Berhasil -->
            <div class="status-insert" data-statusinsert="<?= $this->session->flashdata('statusinsert'); ?>"></div>
            <!-- Swetalert Gagal -->
            <div class="status-gagal" data-statusgagal="<?= $this->session->flashdata('statusgagal'); ?>"></div>
            <!-- Swetalert Danger -->
            <div class="status-danger" data-statusdanger="<?= $this->session->flashdata('statusdanger'); ?>"></div>

            <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                <div class="tile">
                    <?php $attr = array('id' => 'regfrom');
                        echo form_open('karyawan/lembur_subdiv/in_lembur', $attr); ?>
                    <h3 class="tile-title"><i class="fa fa-info-circle " aria-hidden="true"></i> Data Karyawan</h3>
                    <hr align="right" color="black">
                    <br>
                    <div class="form-group row">
                        <label class="control-label col-md-3 text-right">NPP</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="npp" id="npp" readonly required placeholder="NPP">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 text-right">Nama Karyawan</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="nama_p_lmbr" id="nama" readonly required placeholder="Nama Karyawan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 text-right">Jabatan</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="jabatan" id="jabatan" readonly required placeholder="Jabatan">
                            <input class="form-control" type="hidden" name="kd_menu" id="kd_menu" readonly required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 text-right">Tanggal Pengajuan</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="tgl_p" id="tgl_p" required readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 text-right">Dari Jam</label>
                        <div class="col-md-8">
                            <input class="form-control" type="time" name="awal" id="awal" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 text-right">Sampai Jam</label>
                        <div class="col-md-8">
                            <input class="form-control" type="time" name="akhir" id="akhir" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 text-right">Jumlah</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="jmlh" id="selisih" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 text-right">Jenis Pekerjaan</label>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="2" type="text" name="ket" id="ket" placeholder="Masukan Jenis Pekerjaan" required></textarea>
                            <input type="hidden" name="pimpinan" value="<?= $this->session->userdata('status_login'); ?>">
                            <input type="hidden" name="alasan" value="-">
                            <input type="hidden" name="valid" value="1">
                        </div>
                    </div>
                    <br>
                    <div class="tile-footer row">
                        <div class="col-md-7"></div>
                        <div class="col-md-3">
                            <button class="btn btn-info" title="Simpan" id="submit" name="submit" type="submit"><i class="fa fa-fw fa-floppy-o"></i>Simpan</button>
                            <input type="hidden" name="kode_lmbr" value="<?= $kode_lmbr; ?>">
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="col-lg-7 col-md-8 col-sm-7 col-xs-12">
                <div class="tile">
                    <h3 class="tile-title"><i class="fa fa-share" aria-hidden="true"></i> Data Pengajuan Lembur</h3>
                    <hr align="right" color="black">
                    <div class="row">
                        <div class="col-lg-2 col-md-8 col-sm-7 col-xs-12">
                            <input class="form-control" name="kode_lmbr" type="text" value="<?= $kode_lmbr;  ?>" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="tile">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Karyawan</th>
                                    <th>Tanggal Pengajuan</th>
                                    <th>Jam Awal</th>
                                    <th>Jam Akhir</th>
                                    <th>Jumlah</th>
                                    <th>Jenis Pekerjaan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="datakaryawan">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('karyawan/data/pengajuan lembur/modal'); ?>
        <footer>
            <!-- footer area start-->
            <?php $this->load->view('template/footer'); ?>
            <!-- footer area end-->
        </footer>
    </main>

    <!-- Main Menu area start-->
    <?php $this->load->view('template/script') ?>
    <!-- Main Menu area End-->
    <script src="<?= base_url(); ?>assets_application/js/jquery-1.12.4.js"></script>
    <script src="<?= base_url(); ?>assets_application/js/jquery-ui.js"></script>
    <script src="<?= base_url(); ?>assets_application/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        tampil_data();

        $(document).ready(function() {
            $("#regfrom").submit(function() {
                $.ajax({
                    type: "POST",
                    data: $('#regfrom').serialize(),
                    url: "<?= base_url('index.php/Karyawan/karyawan/tambah_lmbr') ?>",
                    dataType: "json",
                    success: function(berhasil) {
                        tampil_data();
                        document.getElementById('npp').value = "";
                        document.getElementById('nama').value = "";
                        document.getElementById('jabatan').value = "";
                        document.getElementById('kd_menu').value = "";
                        document.getElementById('tgl_p').value = "";
                        document.getElementById('awal').value = "";
                        document.getElementById('akhir').value = "";
                        document.getElementById('selisih').value = "";
                        document.getElementById('ket').value = "";
                    }
                });
                return false;
            });
        });

        function tampil_data() {
            var kode_lmbr = $('input[name="kode_lmbr"]').val();
            $.ajax({
                type: "POST",
                data: "kode_lmbr=" + kode_lmbr,
                url: "<?= base_url('index.php/Karyawan/tampil_p_lembur') ?>",
                dataType: "JSON",
                success: function(a) {
                    var row = '';
                    for (var i = 0; i < a.length; i++) {
                        row += "<tr>" +
                            "<td id='id_p_lmbr'>" + a[i].id_p_lmbr + "</td>" +
                            "<td>" + a[i].nama_p_lmbr + "</td>" +
                            "<td>" + a[i].tgl_p + "</td>" +
                            "<td>" + a[i].awal + "</td>" +
                            "<td>" + a[i].akhir + "</td>" +
                            "<td>" + a[i].jmlh + "</td>" +
                            "<td>" + a[i].ket + "</td>" +
                            "<td><button type='submit' title='Hapus' onclick='delete_p_lmbr(this," + a[i].id_p_lmbr + ")'class='btn btn-danger '><i class='fa fa-trash-o'></i></button></td>" +
                            "<tr>";
                    }
                    $('#datakaryawan').html(row);
                }
            });
        }

        function delete_p_lmbr(txt, id_p_lmbr) {
            var id_p_lmbr = $('#id_p_lmbr').html();
            $.ajax({
                type: "POST",
                data: "id_p_lmbr=" + id_p_lmbr,
                url: "<?= base_url('index.php/Karyawan/delete_p_lmbr') ?>",
                dataType: "JSON",
                success: function(a) {
                    tampil_data();
                }
            })
        }

        document.onkeydown = function(e) {
            switch (e.keyCode) {
                // f2
                case 113:
                    $("#data_kar").modal();
                    break;
                    // esc
                case 27:
                    $("#data_kar").modal("hide");
                    break;
            }
        };

        function get(txt, npp, nama, jabatan, kd_menu) {
            $('#npp').val(npp);
            $('#nama').val(nama);
            $('#jabatan').val(jabatan);
            $('#kd_menu').val(kd_menu);
            $("#data_kar").modal('hide');
            // console.log(npp, nama, jabatan);
        }

        $("#awal,#akhir").change(function() {
            var awal = $('#awal').val(),
                akhir = $('#akhir').val(),
                hours = akhir.split(':')[0] - awal.split(':')[0],
                minutes = akhir.split(':')[1] - awal.split(':')[1];

            if (awal <= "00:00:00" && akhir >= "14:00:00") {
                a = 1;
            } else {
                a = 0;
            }
            minutes = minutes.toString().length < 2 ? '0' + minutes : minutes;
            if (minutes < 0) {
                hours--;
                minutes = 60 + minutes;
            }
            hours = hours.toString().length < 2 ? '0' + hours : hours;

            $('#selisih').val('0' + hours - a);
        });

        $(function() {
            $("#tgl_p").datepicker({
                minDate: 0,
                dateFormat: 'yy-mm-dd',
                daysOfWeekDisabled: [0, 6]
            });
        });

        const statusinsert = $('.status-insert').data('statusinsert');
        // console.log(statusinsert);
        if (statusinsert) {
            swal({
                title: "Berhasil " + statusinsert,
                text: "Menunggu karyawan untuk menyetujui lembur",
                type: "success",
                timer: 5000,
                showConfirmButton: false
            });
        }

        const statusgagal = $('.status-gagal').data('statusgagal');
        // console.log(statusgagal);
        if (statusgagal) {
            swal({
                title: "Gagal " + statusgagal,
                text: "Periksa kembali inputan Anda",
                type: "error",
                timer: 5000,
                showConfirmButton: false
            });
        }

        const statusdanger = $('.status-danger').data('statusdanger');
        // console.log(statusdanger);
        if (statusdanger) {
            swal({
                title: "Gagal " + statusdanger,
                text: "Karyawan Anda sedang menjalankan cuti",
                type: "warning",
                timer: 5000,
                showConfirmButton: false
            });
        }
    </script>

</body>

</html>
<?php } ?>