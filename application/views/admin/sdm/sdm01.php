<?php
if(empty($_SESSION['status_login'])){
    redirect();
}
else{
?>

<!DOCTYPE html>
<html lang="en">
    <head>

        <?php
            $data['tittle'] = "Biodata Diri";
            $this->load->view('template/head', $data);
        ?>

    </head>
    <body class="app sidebar-mini rtl" id="simpan">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?php echo base_url() ?>index.php/Admin/in_admin">SIMPEG</a>
        
        <?php $this->load->view('template/header_ad') ?>
    
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>

        <?php $this->load->view('template/menu_admin') ?>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-user-circle"></i> Biodata Diri</h1>
                <p>Menampilkan Biodata Diri Karyawan</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tabel Kepegawaian</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>index.php/admin/tabel_sdm/sdm01"> Diri Biodata Diri</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h4 class="title">Biodata Diri Karyawan</h4>
                        <div class="form-group mx-sm-5 col-md-5 ">
                        </div>
                            <a class="btn btn-info icon-btn" title="Add Item" href="<?php echo base_url() ?>index.php/admin/tabel_sdm/inpt_sdm01"><i class="fa fa-plus" hre></i>Add Item </a>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-info icon-btn" title="Carak A1" href="<?php echo base_url() ?>index.php/ExcelA1/export"><i class="fa fa-print"></i> Cetak A1 </a>
                    </div>
                    <hr align="right" color="black" >
                        <div class="row">
                            <div class="col-lg-4 offset-lg-1">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                    <input class="form-control" type="text" id="npp" name="npp" title="Masukan NPP....." placeholder=" Masukan NPP....." required><small class="form-text text-muted" id="emailHelp">Masukkan NPP yang akan anda cari</small>
                                </div>
                                <hr align="right" color="black" >
                                <div class="form-group">
                                    <label class="control-label">NPP</label>
                                    <input class="form-control" type="text" name="npp" placeholder="Data Not Exists" readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nama Lengkap</label>
                                    <input class="form-control" type="text" name="nama" placeholder=" Data Not Exists" readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nama Panggilan</label>
                                    <input class="form-control" type="text" name="nm_pgl" placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Gelar Depan Anda</label>
                                    <input class="form-control" type="text"  name="glr_dpn" placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Gelar Belakang Anda</label>
                                    <input class="form-control" type="text"  name="glr_blk" placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kota Lahir</label>
                                    <input class="form-control" type="text"  name="kota_lhr" placeholder=" Data Not Exists "  readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Provinsi Lahir</label>
                                    <input class="form-control" type="text"  name="prov_lhr" placeholder=" Data Not Exists "  readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Negara Lahir</label>
                                    <input class="form-control" type="text"  name="ngr_lhr" placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Lahir</label>
                                    <input class="form-control" type="date" name="tgl_lhr"  placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Jenis Kelamin</label>
                                    <input class="form-control" type="text"  name="j_kelamin" placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Golongan Darah</label>
                                    <input class="form-control" type="text"  name="gol_darah" placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Agama</label>
                                    <input class="form-control" type="text" name="agama"  placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Masuk</label>
                                    <input class="form-control" type="date"  name="tgl_masuk" placeholder=" Data Not Exists "  readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Status Sipil</label>
                                    <input class="form-control" type="text"  name="st_sipil" placeholder=" Data Not Exists "  readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Jumlah Anak</label>
                                    <input class="form-control" type="text" name="jmlh_ank"  placeholder=" Data Not Exists "  readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No Astek</label>
                                    <input class="form-control" type="text" name="no_astek"  placeholder=" Data Not Exists "   readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No Pens</label>
                                    <input class="form-control" type="text" name="no_pens"  placeholder=" Data Not Exists "  readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No NPWP</label>
                                    <input class="form-control" type="text" name="npwp"  placeholder=" Data Not Exists "  readonly required>
                                </div>
                            </div>
                            
                            <div class="col-lg-4 offset-lg-2">
                                <div class="form-group">
                                    <label class="control-label"></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"></label>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Alamat Tinggal</label>
                                    <input class="form-control" type="text" name="alamat_tgl" placeholder=" Data Not Exists" readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kode Lokasi</label>
                                    <input class="form-control" type="text" name="kd_lokasi"  placeholder=" Data Not Exists "  readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kode Pos</label>
                                    <input class="form-control" type="text" name="kode_pos"  placeholder=" Data Not Exists "  readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No Telepon</label>
                                    <input class="form-control" type="text" name="no_telp"  placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No NIK</label>
                                    <input class="form-control" type="text" name="no_nik"  placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No KK</label>
                                    <input class="form-control" type="text" name="no_kk"  placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No BPJS</label>
                                    <input class="form-control" type="text" name="no_bpjs"  placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">User Id</label>
                                    <input class="form-control" type="text" name="user_id"  placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Bln Proses</label>
                                    <input class="form-control" type="text" name="bln_proses"  placeholder=" Data Not Exists "  readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tinggal</label>
                                    <input class="form-control" type="text" name="tanggal"  placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Keterangan</label>
                                    <input class="form-control" type="text" name="ket"  placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Pensiun</label>
                                    <input class="form-control" type="text" name="tglpen"  placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No SK Pensiun</label>
                                    <input class="form-control" type="text" name="noskpen"  placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal SK Pensiun</label>
                                    <input class="form-control" type="text" name="tglskpen"  placeholder=" Data Not Exists "  readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Jenis Pensiun</label>
                                    <input class="form-control" type="text" name="jns_pen"  placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">STAT REC</label>
                                    <input class="form-control" type="text" name="stat_rec"  placeholder=" Data Not Exists "  readonly required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tanggal Input</label>
                                    <input class="form-control" type="date" name="tgl"  placeholder=" Data Not Exists " readonly required>
                                </div>
                                <div class="tile-footer">
                                    <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#ModalEdit"><i class="fa fa-pencil" ></i>Edit  </button>
                                </div>
                            </div>
                        </div>
                        <hr align="right" color="black">
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <!-- footer area start-->
                <?php $this->load->view('template/footer')?>
            <!-- footer area end-->
        </footer>
        
    
        <!-- Modal Edit -->
        <div id="ModalEdit" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Biodata Diri</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_sdm01" id="id_sdm01">
                        <div class="form-group">
                            <label class="control-label">NPP</label>
                            <input class="form-control" type="text"  name="npp" id="npp2" placeholder="Masukan NPP">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Lengkap</label>
                            <input class="form-control" type="text" name="nama" id="nama2" placeholder="Masukan Nama Lengkap " >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Panggilan</label>
                            <input class="form-control" type="text" name="nm_pgl" id="nm_pgl2" placeholder="Masukan Nama Panggilan " >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Gelar Depan </label>
                            <input class="form-control" type="text"  name="glr_dpn" id="glr_dpn2" placeholder="Masukan Gelar Depan " >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Gelar Belakang </label>
                            <input class="form-control" type="text"  name="glr_blk" id="glr_blk2" placeholder="Masukan Gelar Belakang "  >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kota Lahir</label>
                            <input class="form-control" type="text"  name="kota_lhr" id="kota_lhr2" placeholder="Masukan Nama Kota Lahir "  >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Provinsi Lahir</label>
                            <input class="form-control" type="text"  name="prov_lhr" id="prov_lhr2" placeholder="Masukan Nama Provinsi Lahir "  >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Negara Lahir</label>
                            <input class="form-control" type="text"  name="ngr_lhr" id="ngr_lhr2" placeholder="Masukan Nama Negara Lahir "  >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            <input class="form-control" type="date" name="tgl_lhr" id="tgl_lhr2"  placeholder="Masukan Tanggal Lahir "  >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Kelamin</label>
                            <select class="form-control" name="j_kelamin" id="j_kelamin2">
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Golongan Darah</label>
                            <select class="form-control" name="gol_darah" id="gol_darah2">
                                <option value="O">O</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            <select class="form-control" name="agama" id="agama2">
                                <option value="I">ISLAM</option>
                                <option value="P">PROTESTAN</option>
                                <option value="K">KATOLIK</option>
                                <option value="H">HINDU</option>
                                <option value="B">BUDHA</option>
                                <option value="L">LAIN-LAIN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Masuk</label>
                            <input class="form-control" type="date"  name="tgl_masuk" id="tgl_masuk2" placeholder="Masukan Tanggal Masuk ">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status Sipil</label>
                            <select class="form-control" name="st_sipil" id="st_sipil2">
                                <option value="T">TIDAK KAWIN</option>
                                <option value="K">KAWIN</option>
                                <option value="J">JANDA</option>
                                <option value="D">DUDA</option>
                                <option value="L">LAIN-LAIN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jumlah Anak</label>
                            <input class="form-control" type="text" name="jmlh_ank" id="jmlh_ank2"  placeholder="Masukan Jumlah Anak " >
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Astek</label>
                            <input class="form-control" type="number" name="no_astek" id="no_astek2"  placeholder="Masukan No Astek " >
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Pensiun</label>
                            <input class="form-control" type="text" name="no_pens" id="no_pens2"  placeholder="Masukan No Pensiun " >
                        </div>
                        <div class="form-group">
                            <label class="control-label">No NPWP</label>
                            <input class="form-control" type="text" name="npwp" id="npwp2"  placeholder="Masukan No NPWP "                         </div>
                        <div class="form-group">
                            <label class="control-label">Alamat Tinggal</label>
                            <textarea class="form-control" rows="4" name="alamat_tgl" id="alamat_tgl2" placeholder="Enter your address" ></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kode Lokasi</label>
                            <input class="form-control" type="number" name="kd_lokasi" id="kd_lokasi2"  placeholder="Masukan Kode Lokasi " >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kode Pos</label>
                            <input class="form-control" type="number" name="kode_pos" id="kode_pos2"  placeholder="Masukan Kode Pos " >
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Telepon</label>
                            <input class="form-control" type="number" name="no_telp" id="no_telp2"  placeholder="Masukan No Telepon " >
                        </div>
                        <div class="form-group">
                            <label class="control-label">No NIK</label>
                            <input class="form-control" type="text" name="no_nik" id="no_nik2"  placeholder="Masukan No NIK ">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No KK</label>
                            <input class="form-control" type="number" name="no_kk" id="no_kk2"  placeholder="Masukan No KK " >
                        </div>
                        <div class="form-group">
                            <label class="control-label">No BPJS</label>
                            <input class="form-control" type="text" name="no_bpjs" id="no_bpjs2"  placeholder="Masukan No BPJS " >
                        </div>
                        <div class="form-group">
                            <label class="control-label">User Id</label>
                            <input class="form-control" type="text" name="user_id" id="user_id2"  placeholder="Masukan User Id " >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bln Proses</label>
                            <input class="form-control" type="text" name="bln_proses" id="bln_proses2"  placeholder="Masukan Bln Proses " >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tinggal</label>
                            <input class="form-control" type="text" name="tinggal" id="tinggal2"  placeholder="Masukan Tinggal" >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Keterangan</label>
                            <input class="form-control" type="text" name="ket" id="ket2"  placeholder="Masukan Keterangan" >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Pensiun</label>
                            <input class="form-control" type="text" name="tglpen" id="tglpen2"  placeholder="Masukan Tanggal Pensiun" >
                        </div>
                        <div class="form-group">
                            <label class="control-label">NO SK Pensiun</label>
                            <input class="form-control" type="text" name="noskpen" id="noskpen2"  placeholder="Masukan NO SK Pensiun"  >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal SK Pensiun</label>
                            <input class="form-control" type="text" name="tglskpen" id="tglskpen2"  placeholder="Masukan Tanggal SK Pensiun" >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Pensiun</label>
                            <input class="form-control" type="text" name="jns_pen" id="jns_pen2"  placeholder="Masukan Jenis Pensiun"  >
                        </div>
                        <div class="form-group">
                            <label class="control-label">Stat Rec</label>
                            <input class="form-control" type="text" name="stat_rec" id="stat_rec2"  placeholder="Masukan Stat Rec" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" id="btn_edit" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </main>
        
        <!-- Main Menu area start-->
            <?php $this->load->view('template/script') ?>
        <!-- Main Menu area End-->
        
        <script type="text/javascript">
        $(document).ready(function()
        {
            $('#npp').on('input',function()
            {
                var npp = $(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?= base_url('index.php/Admin/get_npp') ?>",
                    dataType : "JSON",
                    data : {npp: npp},
                    cache: false,    
                    success: function(data){
                        $.each(data,function( id_sdm01, npp, nama, nm_pgl, glr_dpn, glr_blk, kota_lhr,
                                prov_lhr, ngr_lhr, tgl_lhr, j_kelamin,
                                gol_darah, agama, tgl_masuk, st_sipil,
                                jmlh_ank, no_astek, no_pens, npwp, alamat_tgl,
                                kd_lokasi, kode_pos, no_telp, no_nik, no_kk,
                                no_bpjs, user_id, bln_proses, tanggal, ket,
                                tglpen, noskpen, tglskpen, jns_pen, stat_rec, tgl)
                                {
                                    $('[name="id_sdm01"]').val(data.id_sdm01);
                                    $('[name="npp"]').val(data.npp);
                                    $('[name="nama"]').val(data.nama);
                                    $('[name="nm_pgl"]').val(data.nm_pgl);
                                    $('[name="glr_dpn"]').val(data.glr_dpn);
                                    $('[name="glr_blk"]').val(data.glr_blk);
                                    $('[name="kota_lhr"]').val(data.kota_lhr);
                                    $('[name="prov_lhr"]').val(data.prov_lhr);
                                    $('[name="ngr_lhr"]').val(data.ngr_lhr);
                                    $('[name="tgl_lhr"]').val(data.tgl_lhr);
                                    $('[name="j_kelamin"]').val(data.j_kelamin);
                                    $('[name="gol_darah"]').val(data.gol_darah);
                                    $('[name="agama"]').val(data.agama);
                                    $('[name="tgl_masuk"]').val(data.tgl_masuk);
                                    $('[name="st_sipil"]').val(data.st_sipil);
                                    $('[name="jmlh_ank"]').val(data.jmlh_ank);
                                    $('[name="no_astek"]').val(data.no_astek);
                                    $('[name="no_pens"]').val(data.no_pens);
                                    $('[name="npwp"]').val(data.npwp);
                                    $('[name="alamat_tgl"]').val(data.alamat_tgl);
                                    $('[name="kd_lokasi"]').val(data.kd_lokasi);
                                    $('[name="kode_pos"]').val(data.kode_pos);
                                    $('[name="no_telp"]').val(data.no_telp);
                                    $('[name="no_nik"]').val(data.no_nik);
                                    $('[name="no_kk"]').val(data.no_kk);
                                    $('[name="no_bpjs"]').val(data.no_bpjs);
                                    $('[name="user_id"]').val(data.user_id);
                                    $('[name="bln_proses"]').val(data.bln_proses);
                                    $('[name="tanggal"]').val(data.tanggal);
                                    $('[name="ket"]').val(data.ket);
                                    $('[name="tglpen"]').val(data.tglpen);
                                    $('[name="noskpen"]').val(data.noskpen);
                                    $('[name="tglskpen"]').val(data.tglskpen);
                                    $('[name="jns_pen"]').val(data.jns_pen);
                                    $('[name="stat_rec"]').val(data.stat_rec);
                                    $('[name="tgl"]').val(data.tgl);
                                    
                                });
                            
                    }
                });
                return false;
            });
        

            //Simpan
            $('#btn_add').on('click',function(){
                var npp         =$('#npp1').val();
                var nama        =$('#nama1').val();
                var nm_pgl      =$('#nm_pgl1').val();
                var glr_dpn     =$('#glr_dpn1').val();
                var glr_blk     =$('#glr_blk1').val();
                var kota_lhr    =$('#kota_lhr1').val();
                var prov_lhr    =$('#prov_lhr1').val();
                var ngr_lhr     =$('#ngr_lhr1').val();
                var tgl_lhr     =$('#tgl_lhr1').val();
                var j_kelamin   =$('#j_kelamin1').val();
                var gol_darah   =$('#gol_darah1').val();
                var agama       =$('#agama1').val();
                var tgl_masuk   =$('#tgl_masuk1').val();
                var st_sipil    =$('#st_sipil1').val();
                var jmlh_ank    =$('#jmlh_ank1').val();
                var no_astek    =$('#no_astek1').val();
                var no_pens     =$('#no_pens1').val();
                var npwp        =$('#npwp1').val();
                var alamat_tgl  =$('#alamat_tgl1').val();
                var kd_lokasi   =$('#kd_lokasi1').val();
                var kode_pos    =$('#kode_pos1').val();
                var no_telp     =$('#no_telp1').val();
                var no_nik      =$('#no_nik1').val();
                var no_kk       =$('#no_kk1').val();
                var no_bpjs     =$('#no_bpjs1').val();
                var user_id     =$('#user_id1').val();
                var bln_proses  =$('#bln_proses1').val();
                var tinggal     =$('#tinggal1').val();
                var ket         =$('#ket1').val();
                var tglpen      =$('#tglpen1').val();
                var noskpen     =$('#noskpen1').val();
                var tglskpen    =$('#tglskpen1').val();
                var jns_pen     =$('#jns_pen1').val();
                var stat_rec    =$('#stat_rec1').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('index.php/Admin/add_sdm01')?>",
                    dataType : "JSON",
                    data : { npp:npp, nama:nama, nm_pgl:nm_pgl, glr_dpn:glr_dpn, glr_blk:glr_blk, kota_lhr:kota_lhr, prov_lhr:prov_lhr, 
                            ngr_lhr:ngr_lhr, tgl_lhr:tgl_lhr, j_kelamin:j_kelamin, gol_darah:gol_darah, agama:agama, tgl_masuk:tgl_masuk, st_sipil:st_sipil, 
                            jmlh_ank:jmlh_ank, no_astek:no_astek, no_pens:no_pens, npwp:npwp, alamat_tgl:alamat_tgl, kd_lokasi:kd_lokasi, kode_pos:kode_pos, 
                            no_telp:no_telp, no_nik:no_nik, no_kk:no_kk, no_bpjs:no_bpjs, user_id:user_id, bln_proses:bln_proses, 
                            tinggal:tinggal, ket:ket, tglpen:tglpen, noskpen:noskpen, tglskpen:tglskpen, jns_pen:jns_pen, stat_rec:stat_rec
                            },
                    success: function(data){
                        $('[name="npp1"]').val("");
                        $('[name="nama1"]').val("");
                        $('[name="nm_pgl1"]').val("");
                        $('[name="glr_dpn1"]').val("");
                        $('[name="glr_blk1"]').val("");
                        $('[name="kota_lhr1"]').val("");
                        $('[name="prov_lhr1"]').val("");
                        $('[name="ngr_lhr1"]').val("");
                        $('[name="tgl_lhr1"]').val("");
                        $('[name="j_kelamin1"]').val("");
                        $('[name="gol_darah1"]').val("");
                        $('[name="agama1"]').val("");
                        $('[name="tgl_masuk1"]').val("");
                        $('[name="st_sipil1"]').val("");
                        $('[name="jmlh_ank1"]').val("");
                        $('[name="no_astek1"]').val("");
                        $('[name="no_pens1"]').val("");
                        $('[name="npwp1"]').val("");
                        $('[name="alamat_tgl1"]').val("");
                        $('[name="kd_lokasi1"]').val("");
                        $('[name="kode_pos1"]').val("");
                        $('[name="no_telp1"]').val("");
                        $('[name="no_nik1"]').val("");
                        $('[name="no_kk1"]').val("");
                        $('[name="no_bpjs1"]').val("");
                        $('[name="user_id1"]').val("");
                        $('[name="bln_proses1"]').val("");
                        $('[name="tinggal1"]').val("");
                        $('[name="ket1"]').val("");
                        $('[name="tglpen1"]').val("");
                        $('[name="noskpen1"]').val("");
                        $('[name="tglskpen1"]').val("");
                        $('[name="jns_pen1"]').val("");
                        $('[name="stat_rec1"]').val("");
                        $('#ModalAdd').modal('hide');
                        $('#simpan').load("<?php echo base_url();?>index.php/admin/tabel_sdm/in_sdm01");
                    }
                });
                return false;
            });

            //edit
            $('#btn_edit').on('click',function(){
                var id_sdm01    = $('#id_sdm01').val();
                var npp         = $('#npp2').val();
                var nama        = $('#nama2').val();
                var nm_pgl      = $('#nm_pgl2').val();
                var glr_dpn     = $('#glr_dpn2').val();
                var glr_blk     = $('#glr_blk2').val();
                var kota_lhr    = $('#kota_lhr2').val();
                var prov_lhr    = $('#prov_lhr2').val();
                var ngr_lhr     = $('#ngr_lhr2').val();
                var tgl_lhr     = $('#tgl_lhr2').val();
                var j_kelamin   = $('#j_kelamin2').val();
                var gol_darah   = $('#gol_darah2').val();
                var agama       = $('#agama2').val();
                var tgl_masuk   = $('#tgl_masuk2').val();
                var st_sipil    = $('#st_sipil2').val();
                var jmlh_ank    = $('#jmlh_ank2').val();
                var no_astek    = $('#no_astek2').val();
                var no_pens     = $('#no_pens2').val();
                var npwp        = $('#npwp2').val();
                var alamat_tgl  = $('#alamat_tgl2').val();
                var kd_lokasi   = $('#kd_lokasi2').val();
                var kode_pos    = $('#kode_pos2').val();
                var no_telp     = $('#no_telp2').val();
                var no_nik      = $('#no_nik2').val();
                var no_kk       = $('#no_kk2').val();
                var no_bpjs     = $('#no_bpjs2').val();
                var user_id     = $('#user_id2').val();
                var bln_proses  = $('#bln_proses2').val();
                var tinggal     = $('#tinggal2').val();
                var ket         = $('#ket2').val();
                var tglpen      = $('#tglpen2').val();
                var noskpen     = $('#noskpen2').val();
                var tglskpen    = $('#tglskpen2').val();
                var jns_pen     = $('#jns_pen2').val();
                var stat_rec    = $('#stat_rec2').val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('index.php/Admin/edit_sdm01')?>",
                    dataType : "JSON",
                    data : { id_sdm01:id_sdm01, npp:npp, nama:nama, nm_pgl:nm_pgl, glr_dpn:glr_dpn, glr_blk:glr_blk, kota_lhr:kota_lhr, prov_lhr:prov_lhr, 
                            ngr_lhr:ngr_lhr, tgl_lhr:tgl_lhr, j_kelamin:j_kelamin, gol_darah:gol_darah, agama:agama, tgl_masuk:tgl_masuk, st_sipil:st_sipil, 
                            jmlh_ank:jmlh_ank, no_astek:no_astek, no_pens:no_pens, npwp:npwp, alamat_tgl:alamat_tgl, kd_lokasi:kd_lokasi, kode_pos:kode_pos, 
                            no_telp:no_telp, no_nik:no_nik, no_kk:no_kk, no_bpjs:no_bpjs, user_id:user_id, bln_proses:bln_proses, 
                            tinggal:tinggal, ket:ket, tglpen:tglpen, noskpen:noskpen, tglskpen:tglskpen, jns_pen:jns_pen, stat_rec:stat_rec },
                    success: function(data){
                        $('[name="id_sdm01"]').val("");
                        $('[name="npp"]').val("");
                        $('[name="nama"]').val("");
                        $('[name="nm_pgl"]').val("");
                        $('[name="glr_dpn"]').val("");
                        $('[name="glr_blk"]').val("");
                        $('[name="kota_lhr"]').val("");
                        $('[name="prov_lhr"]').val("");
                        $('[name="ngr_lhr"]').val("");
                        $('[name="tgl_lhr"]').val("");
                        $('[name="j_kelamin"]').val("");
                        $('[name="gol_darah"]').val("");
                        $('[name="agama"]').val("");
                        $('[name="tgl_masuk"]').val("");
                        $('[name="st_sipil"]').val("");
                        $('[name="jmlh_ank"]').val("");
                        $('[name="no_astek"]').val("");
                        $('[name="no_pens"]').val("");
                        $('[name="npwp"]').val("");
                        $('[name="alamat_tgl"]').val("");
                        $('[name="kd_lokasi"]').val("");
                        $('[name="kode_pos"]').val("");
                        $('[name="no_telp"]').val("");
                        $('[name="no_nik"]').val("");
                        $('[name="no_kk"]').val("");
                        $('[name="no_bpjs"]').val("");
                        $('[name="user_id"]').val("");
                        $('[name="bln_proses"]').val("");
                        $('[name="tinggal"]').val("");
                        $('[name="ket"]').val("");
                        $('[name="tglpen"]').val("");
                        $('[name="noskpen"]').val("");
                        $('[name="tglskpen"]').val("");
                        $('[name="jns_pen"]').val("");
                        $('[name="stat_rec"]').val("");
                        $('#ModalEdit').modal('hide');
                        $('#simpan').load("<?php echo base_url();?>index.php/admin/tabel_sdm/in_sdm01");
                    }
                });
                return false;
            });
        
        });
        </script>
    </body>
</html>
<?php }
    $this->session->unset_userdata("status_insert");
?>