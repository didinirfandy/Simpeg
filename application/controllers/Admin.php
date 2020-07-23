<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('Csvimport');
		$this->load->model('Model_karyawan');
		$this->load->model('Model_admin');
		$this->load->model('Model_login');
		$this->load->helper(array('form', 'url'));

		if (empty($_SESSION['status_login'])) {
			redirect('Welcome/index_admin');
		}
	}

	public function in_admin()
	{
		$data['jmlh']   	     = $this->Model_admin->jmlh_sdm01();
		$data['jmlh_c_sakit']    = $this->Model_admin->jmlh_c_sakit();
		$data['jmlh_c_thn'] 	 = $this->Model_admin->jmlh_c_thn();
		$data['jmlh_c_pjg'] 	 = $this->Model_admin->jmlh_c_pjg();
		$data['jmlh_hsl_p_lmbr'] = $this->Model_admin->jmlh_hsl_p_lmbr();
		$this->load->view('admin/in_admin', $data);
	}


	//======================================== MEMANGGIL TABEL SDM ===========================================
	//======================================== MEMANGGIL TABEL SDM ===========================================
	//======================================== MEMANGGIL TABEL SDM ===========================================
	//======================================== MEMANGGIL TABEL SDM ===========================================

	public function tabel_sdm()
	{
		$page = $this->uri->segment(3);

		switch ($page) {
			case 'absen':
				// $data['absen']	=	$this->Model_admin->absen();
				$this->load->view('admin/sdm/absen');
				break;
			case 'in_sdm01':
				if (isset($_POST['submit'])) {
					$npp		=	$this->input->post('npp');
					$nama		=	$this->input->post('nama');
					$nm_pgl		=	$this->input->post('nm_pgl');
					$glr_dpn	=	$this->input->post('glr_dpn');
					$glr_blk	=	$this->input->post('glr_blk');
					$kota_lhr	=	$this->input->post('kota_lhr');
					$prov_lhr	=	$this->input->post('prov_lhr');
					$ngr_lhr	=	$this->input->post('ngr_lhr');
					$tgl_lhr	=	$this->input->post('tgl_lhr');
					$j_kelamin	=	$this->input->post('j_kelamin');
					$gol_darah	=	$this->input->post('gol_darah');
					$agama		=	$this->input->post('agama');
					$tgl_masuk	=	$this->input->post('tgl_masuk');
					$st_sipil	=	$this->input->post('st_sipil');
					$jmlh_ank	=	$this->input->post('jmlh_ank');
					$no_astek	=	$this->input->post('no_astek');
					$no_pens	=	$this->input->post('no_pens');
					$npwp		=	$this->input->post('npwp');
					$alamat_tgl	=	$this->input->post('alamat_tgl');
					$kd_lokasi	=	$this->input->post('kd_lokasi');
					$kode_pos	=	$this->input->post('kode_pos');
					$no_telp	=	$this->input->post('no_telp');
					$no_nik		=	$this->input->post('no_nik');
					$no_kk		=	$this->input->post('no_kk');
					$no_bpjs	=	$this->input->post('no_bpjs');
					$user_id	=	$this->input->post('user_id');
					$bln_proses	=	$this->input->post('bln_proses');
					$tinggal	=	$this->input->post('tinggal');
					$ket		=	$this->input->post('ket');
					$tglpen		=	$this->input->post('tglpen');
					$noskpen	=	$this->input->post('noskpen');
					$tglskpen	=	$this->input->post('tglskpen');
					$jns_pen	=	$this->input->post('jns_pen');
					$stat_rec	=	$this->input->post('stat_rec');
					$nama1		=	$this->input->post('nama1');
					$username	=	$this->input->post('username');
					$pass		=	$this->input->post('pass');
					$image		=	$this->input->post('image');
					$status		=	$this->input->post('status');
					$valid		=	$this->input->post('valid');

					$md5 		= 	md5($pass);
					$berhasil	=	$this->Model_admin->entry_sdm01(
						$npp,
						$nama,
						$nm_pgl,
						$glr_dpn,
						$glr_blk,
						$kota_lhr,
						$prov_lhr,
						$ngr_lhr,
						$tgl_lhr,
						$j_kelamin,
						$gol_darah,
						$agama,
						$tgl_masuk,
						$st_sipil,
						$jmlh_ank,
						$no_astek,
						$no_pens,
						$npwp,
						$alamat_tgl,
						$kd_lokasi,
						$kode_pos,
						$no_telp,
						$no_nik,
						$no_kk,
						$no_bpjs,
						$user_id,
						$bln_proses,
						$tinggal,
						$ket,
						$tglpen,
						$noskpen,
						$tglskpen,
						$jns_pen,
						$stat_rec,
						$nama1,
						$username,
						$md5,
						$image,
						$status,
						$valid
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm01", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm01", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm01	=	$this->input->post('id_sdm01');
					$npp		=	$this->input->post('npp');
					$nama		=	$this->input->post('nama');
					$nm_pgl		=	$this->input->post('nm_pgl');
					$glr_dpn	=	$this->input->post('glr_dpn');
					$glr_blk	=	$this->input->post('glr_blk');
					$kota_lhr	=	$this->input->post('kota_lhr');
					$prov_lhr	=	$this->input->post('prov_lhr');
					$ngr_lhr	=	$this->input->post('ngr_lhr');
					$tgl_lhr	=	$this->input->post('tgl_lhr');
					$j_kelamin	=	$this->input->post('j_kelamin');
					$gol_darah	=	$this->input->post('gol_darah');
					$agama		=	$this->input->post('agama');
					$tgl_masuk	=	$this->input->post('tgl_masuk');
					$st_sipil	=	$this->input->post('st_sipil');
					$jmlh_ank	=	$this->input->post('jmlh_ank');
					$no_astek	=	$this->input->post('no_astek');
					$no_pens	=	$this->input->post('no_pens');
					$npwp		=	$this->input->post('npwp');
					$alamat_tgl	=	$this->input->post('alamat_tgl');
					$kd_lokasi	=	$this->input->post('kd_lokasi');
					$kode_pos	=	$this->input->post('kode_pos');
					$no_telp	=	$this->input->post('no_telp');
					$no_nik		=	$this->input->post('no_nik');
					$no_kk		=	$this->input->post('no_kk');
					$no_bpjs	=	$this->input->post('no_bpjs');
					$user_id	=	$this->input->post('user_id');
					$bln_proses	=	$this->input->post('bln_proses');
					$tinggal	=	$this->input->post('tinggal');
					$ket		=	$this->input->post('ket');
					$tglpen		=	$this->input->post('tglpen');
					$noskpen	=	$this->input->post('noskpen');
					$tglskpen	=	$this->input->post('tglskpen');
					$jns_pen	=	$this->input->post('jns_pen');
					$stat_rec	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->edit_sdm01(
						$id_sdm01,
						$npp,
						$nama,
						$nm_pgl,
						$glr_dpn,
						$glr_blk,
						$kota_lhr,
						$prov_lhr,
						$ngr_lhr,
						$tgl_lhr,
						$j_kelamin,
						$gol_darah,
						$agama,
						$tgl_masuk,
						$st_sipil,
						$jmlh_ank,
						$no_astek,
						$no_pens,
						$npwp,
						$alamat_tgl,
						$kd_lokasi,
						$kode_pos,
						$no_telp,
						$no_nik,
						$no_kk,
						$no_bpjs,
						$user_id,
						$bln_proses,
						$tinggal,
						$ket,
						$tglpen,
						$noskpen,
						$tglskpen,
						$jns_pen,
						$stat_rec
					);

					if ($berhasil == 1) {
						$this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
					} else {
						$this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
					}
				}
				$data['tsdm01']	 =	$this->Model_admin->tampil_sdm01();
				$this->load->view('admin/sdm/sdm01', $data);
				break;

			case 'inpt_sdm01': {
					$this->load->view('admin/sdm/input/in_sdm01');
				}
				break;

				//======================================== SDM 02 ===========================================
				//======================================== SDM 02 ===========================================
				//======================================== SDM 02 ===========================================
				//======================================== SDM 02 ===========================================
				//======================================== SDM 02 ===========================================

			case 'in_sdm02': // dari sini 
				if (isset($_POST['cari'])) {
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm02($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	=	$this->input->post('npp');
					$nama	  	=	$this->input->post('nama');
					$hbg_klg	=	$this->input->post('hbg_klg');
					$tgl_lhr	=	$this->input->post('tgl_lhr');
					$kota_lhr	=	$this->input->post('kota_lhr');
					$ngr_lhr	=	$this->input->post('ngr_lhr');
					$kelamin	=	$this->input->post('kelamin');
					$gol_darah  =	$this->input->post('gol_darah');
					$agama		=	$this->input->post('agama');
					$tk_pend	=	$this->input->post('tk_pend');
					$st_sipil	=	$this->input->post('st_sipil');
					$st_kerja	=	$this->input->post('st_kerja');
					$tgl_nkh	=	$this->input->post('tgl_nkh');
					$tgl_cerai  =	$this->input->post('tgl_cerai');
					$tgl_mgl	=	$this->input->post('tgl_mgl');
					$alamat		=	$this->input->post('alamat');
					$no_kk		=	$this->input->post('no_kk');
					$nik		=	$this->input->post('nik');
					$no_bpjs	=	$this->input->post('no_bpjs');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec 	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->entry_sdm02(
						$npp,
						$nama,
						$hbg_klg,
						$tgl_lhr,
						$kota_lhr,
						$ngr_lhr,
						$kelamin,
						$gol_darah,
						$agama,
						$tk_pend,
						$st_sipil,
						$st_kerja,
						$tgl_nkh,
						$tgl_cerai,
						$tgl_mgl,
						$alamat,
						$no_kk,
						$nik,
						$no_bpjs,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm02", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm02", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm02	=	$this->input->post('id_sdm02');
					$npp		=	$this->input->post('npp');
					$no_urut	=	$this->input->post('no_urut');
					$nama		=	$this->input->post('nama');
					$hbg_klg	=	$this->input->post('hbg_klg');
					$tgl_lhr	=	$this->input->post('tgl_lhr');
					$kota_lhr	=	$this->input->post('kota_lhr');
					$ngr_lhr	=	$this->input->post('ngr_lhr');
					$kelamin	=	$this->input->post('kelamin');
					$gol_darah	=	$this->input->post('gol_darah');
					$agama		=	$this->input->post('agama');
					$tk_pend	=	$this->input->post('tk_pend');
					$st_sipil	=	$this->input->post('st_sipil');
					$st_kerja	=	$this->input->post('st_kerja');
					$tgl_nkh	=	$this->input->post('tgl_nkh');
					$tgl_cerai	=	$this->input->post('tgl_cerai');
					$tgl_mgl	=	$this->input->post('tgl_mgl');
					$alamat		=	$this->input->post('alamat');
					$no_kk		=	$this->input->post('no_kk');
					$nik		=	$this->input->post('nik');
					$no_bpjs	=	$this->input->post('no_bpjs');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec 	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->edit_sdm02(
						$id_sdm02,
						$npp,
						$no_urut,
						$nama,
						$hbg_klg,
						$tgl_lhr,
						$kota_lhr,
						$ngr_lhr,
						$kelamin,
						$gol_darah,
						$agama,
						$tk_pend,
						$st_sipil,
						$st_kerja,
						$tgl_nkh,
						$tgl_cerai,
						$tgl_mgl,
						$alamat,
						$no_kk,
						$nik,
						$no_bpjs,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
					}
				}
				$data['tsdm02']			=	$this->Model_admin->tampil_sdm02();
				$this->load->view('admin/sdm/sdm02', $data);

				break;

			case 'inpt_sdm02': {
					$this->load->view('admin/sdm/input/in_sdm02');
				}
				break;

				//======================================== SDM 03 ===========================================
				//======================================== SDM 03 ===========================================
				//======================================== SDM 03 ===========================================
				//======================================== SDM 03 ===========================================
				//======================================== SDM 03 ===========================================

			case 'in_sdm03':
				if (isset($_POST['cari'])) {
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm03($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	  =  $this->input->post('npp');
					$tk_pend  	  =  $this->input->post('tk_pend');
					$kd_pend	  =  $this->input->post('kd_pend');
					$nama	 	  =  $this->input->post('nama');
					$kota	  	  =  $this->input->post('kota');
					$st_akred	  =  $this->input->post('st_akred');
					$dnln	  	  =  $this->input->post('dnln');
					$thn_awal  	  =  $this->input->post('thn_awal');
					$thn_akhir	  =  $this->input->post('thn_akhir');
					$st_lulus	  =  $this->input->post('st_lulus');
					$no_ijasah	  =  $this->input->post('no_ijasah');
					$tgl_ijasah	  =  $this->input->post('tgl_ijasah');
					$nilai  	  =  $this->input->post('nilai');
					$grade  	  =  $this->input->post('grade');
					$ket	  	  =  $this->input->post('ket');
					$bln_proses	  =  $this->input->post('bln_proses');
					$stat_rec  	  =  $this->input->post('stat_rec');

					$berhasil	  =	 $this->Model_admin->entry_sdm03(
						$npp,
						$tk_pend,
						$kd_pend,
						$nama,
						$kota,
						$st_akred,
						$dnln,
						$thn_awal,
						$thn_akhir,
						$st_lulus,
						$no_ijasah,
						$tgl_ijasah,
						$nilai,
						$grade,
						$ket,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm03", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm03", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm03	=	$this->input->post('id_sdm03');
					$npp		=	$this->input->post('npp');
					$no_urut	=	$this->input->post('no_urut');
					$tk_pend	=	$this->input->post('tk_pend');
					$kd_pend	=	$this->input->post('kd_pend');
					$nama		=	$this->input->post('nama');
					$kota		=	$this->input->post('kota');
					$st_akred	=	$this->input->post('st_akred');
					$dnln		=	$this->input->post('dnln');
					$thn_awal	=	$this->input->post('thn_awal');
					$thn_akhir	=	$this->input->post('thn_akhir');
					$st_lulus	=	$this->input->post('st_lulus');
					$no_ijasah	=	$this->input->post('no_ijasah');
					$tgl_ijasah	=	$this->input->post('tgl_ijasah');
					$nilai		=	$this->input->post('nilai');
					$grade		=	$this->input->post('grade');
					$ket		=	$this->input->post('ket');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec 	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->edit_sdm03(
						$id_sdm03,
						$npp,
						$no_urut,
						$tk_pend,
						$kd_pend,
						$nama,
						$kota,
						$st_akred,
						$dnln,
						$thn_awal,
						$thn_akhir,
						$st_lulus,
						$no_ijasah,
						$tgl_ijasah,
						$nilai,
						$grade,
						$ket,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
					}
				}
				$data['tkpend'] = $this->Model_karyawan->tkpend();
				$data['tsdm03'] = $this->Model_admin->tampil_sdm03();
				$this->load->view('admin/sdm/sdm03', $data);

				break;

			case 'inpt_sdm03':
				$data['tkpend'] = $this->Model_karyawan->tkpend();
				$data['npp']	= $this->Model_admin->tampil_sdm03();
				$this->load->view('admin/sdm/input/in_sdm03', $data);
				break;


				//======================================== SDM 04 ===========================================
				//======================================== SDM 04 ===========================================
				//======================================== SDM 04 ===========================================
				//======================================== SDM 04 ===========================================
				//======================================== SDM 04 ===========================================

			case 'in_sdm04':
				if (isset($_POST['cari'])) {
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm04($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	=	$this->input->post('npp');
					$kd_pend	=	$this->input->post('kd_pend');
					$nama	 	=	$this->input->post('nama');
					$ket	  	=	$this->input->post('ket');
					$dnln	  	=	$this->input->post('dnln');
					$tgl_awal  	=	$this->input->post('tgl_awal');
					$tgl_akhir	=	$this->input->post('tgl_akhir');
					$no_sert	=	$this->input->post('no_sert');
					$tgl_sert	=	$this->input->post('tgl_sert');
					$nilai	  	=	$this->input->post('nilai');
					$grade  	=	$this->input->post('grade');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->entry_sdm04(
						$npp,
						$kd_pend,
						$nama,
						$ket,
						$dnln,
						$tgl_awal,
						$tgl_akhir,
						$no_sert,
						$tgl_sert,
						$nilai,
						$grade,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm04", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm04", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm04	=	$this->input->post('id_sdm04');
					$npp	  	=	$this->input->post('npp');
					$no_urut	=	$this->input->post('no_urut');
					$kd_pend	=	$this->input->post('kd_pend');
					$nama	 	=	$this->input->post('nama');
					$ket	  	=	$this->input->post('ket');
					$dnln	  	=	$this->input->post('dnln');
					$tgl_awal  	=	$this->input->post('tgl_awal');
					$tgl_akhir	=	$this->input->post('tgl_akhir');
					$no_sert	=	$this->input->post('no_sert');
					$tgl_sert	=	$this->input->post('tgl_sert');
					$nilai	  	=	$this->input->post('nilai');
					$grade  	=	$this->input->post('grade');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->edit_sdm04(
						$id_sdm04,
						$npp,
						$no_urut,
						$kd_pend,
						$nama,
						$ket,
						$dnln,
						$tgl_awal,
						$tgl_akhir,
						$no_sert,
						$tgl_sert,
						$nilai,
						$grade,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
					}
				}
				$data['pend']   = $this->Model_karyawan->pend02();
				$data['tsdm04']	= $this->Model_admin->tampil_sdm04();
				$this->load->view('admin/sdm/sdm04', $data);

				break;

			case 'inpt_sdm04':
				$data['pend'] = $this->Model_karyawan->pend02();
				$this->load->view('admin/sdm/input/in_sdm04', $data);
				break;

				//======================================== SDM 05 ===========================================
				//======================================== SDM 05 ===========================================
				//======================================== SDM 05 ===========================================
				//======================================== SDM 05 ===========================================
				//======================================== SDM 05 ===========================================

			case 'in_sdm05':
				if (isset($_POST['cari'])) {
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm05($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	=	$this->input->post('npp');
					$thn_awal	=	$this->input->post('thn_awal');
					$thn_akhir 	=	$this->input->post('thn_akhir');
					$nama	  	=	$this->input->post('nama');
					$jabatan  	=	$this->input->post('jabatan');
					$nm_jbt	  	=	$this->input->post('nm_jbt');
					$no_sk	  	=	$this->input->post('no_sk');
					$tgl_sk	  	=	$this->input->post('tgl_sk');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->entry_sdm05(
						$npp,
						$thn_awal,
						$thn_akhir,
						$nama,
						$jabatan,
						$nm_jbt,
						$no_sk,
						$tgl_sk,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm05", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm05", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm05	=	$this->input->post('id_sdm05');
					$npp	  	=	$this->input->post('npp');
					$no_urut	=	$this->input->post('no_urut');
					$thn_awal	=	$this->input->post('thn_awal');
					$thn_akhir 	=	$this->input->post('thn_akhir');
					$nama	  	=	$this->input->post('nama');
					$jabatan  	=	$this->input->post('jabatan');
					$nm_jbt	  	=	$this->input->post('nm_jbt');
					$no_sk	  	=	$this->input->post('no_sk');
					$tgl_sk	  	=	$this->input->post('tgl_sk');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->edit_sdm05(
						$id_sdm05,
						$npp,
						$no_urut,
						$thn_awal,
						$thn_akhir,
						$nama,
						$jabatan,
						$nm_jbt,
						$no_sk,
						$tgl_sk,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
					}
				}
				$data['tsdm05']			=	$this->Model_admin->tampil_sdm05();
				$this->load->view('admin/sdm/sdm05', $data);

				break;

			case 'inpt_sdm05':
				$this->load->view('admin/sdm/input/in_sdm05');
				break;

				//======================================== SDM 06 ===========================================
				//======================================== SDM 06 ===========================================
				//======================================== SDM 06 ===========================================
				//======================================== SDM 06 ===========================================
				//======================================== SDM 06 ===========================================

			case 'in_sdm06':
				if (isset($_POST['cari'])) {
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm06($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	=	$this->input->post('npp');
					$st_peg	  	=	$this->input->post('st_peg');
					$tmt	  	=	$this->input->post('tmt');
					$no_sk 		=	$this->input->post('no_sk');
					$tgl_sk	  	=	$this->input->post('tgl_sk');
					$npp_jbt  	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->entry_sdm06(
						$npp,
						$st_peg,
						$tmt,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm06", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm06", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm06	=	$this->input->post('id_sdm06');
					$npp	  	=	$this->input->post('npp');
					$no_urut	=	$this->input->post('no_urut');
					$st_peg	  	=	$this->input->post('st_peg');
					$tmt	  	=	$this->input->post('tmt');
					$no_sk 		=	$this->input->post('no_sk');
					$tgl_sk	  	=	$this->input->post('tgl_sk');
					$npp_jbt  	=	$this->input->post('npp_jbt');
					$nm_jbt	  	=	$this->input->post('nm_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->edit_sdm06(
						$id_sdm06,
						$npp,
						$no_urut,
						$st_peg,
						$tmt,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$nm_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
					}
				}
				$data['tsdm06']			=	$this->Model_admin->tampil_sdm06();
				$this->load->view('admin/sdm/sdm06', $data);

				break;

			case 'inpt_sdm06':
				$this->load->view('admin/sdm/input/in_sdm06');
				break;

				//======================================== SDM 07 ===========================================
				//======================================== SDM 07 ===========================================
				//======================================== SDM 07 ===========================================
				//======================================== SDM 07 ===========================================
				//======================================== SDM 07 ===========================================

			case 'in_sdm07':
				if (isset($_POST['cari'])) {
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm07($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	=	$this->input->post('npp');
					$st_peg	  	=	$this->input->post('st_peg');
					$tmt	  	=	$this->input->post('tmt');
					$no_sk 		=	$this->input->post('no_sk');
					$tgl_sk	  	=	$this->input->post('tgl_sk');
					$tgl_akhir	=	$this->input->post('tgl_akhir');
					$npp_jbt  	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->entry_sdm07(
						$npp,
						$st_peg,
						$tmt,
						$no_sk,
						$tgl_sk,
						$tgl_akhir,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm07", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm07", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm07	=	$this->input->post('id_sdm07');
					$npp	  	=	$this->input->post('npp');
					$no_urut	=	$this->input->post('no_urut');
					$st_peg	  	=	$this->input->post('st_peg');
					$tmt	  	=	$this->input->post('tmt');
					$no_sk 		=	$this->input->post('no_sk');
					$tgl_sk	  	=	$this->input->post('tgl_sk');
					$tgl_akhir	=	$this->input->post('tgl_akhir');
					$npp_jbt  	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->edit_sdm07(
						$id_sdm07,
						$npp,
						$no_urut,
						$st_peg,
						$tmt,
						$no_sk,
						$tgl_sk,
						$tgl_akhir,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
					}
				}
				$data['tsdm07']			=	$this->Model_admin->tampil_sdm07();
				$this->load->view('admin/sdm/sdm07', $data);

				break;

			case 'inpt_sdm07':
				$this->load->view('admin/sdm/input/in_sdm07');
				break;

				//======================================== SDM 08 ===========================================
				//======================================== SDM 08 ===========================================
				//======================================== SDM 08 ===========================================
				//======================================== SDM 08 ===========================================
				//======================================== SDM 08 ===========================================

			case 'in_sdm08':
				if (isset($_POST['cari'])) {
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm08($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	=	$this->input->post('npp');
					$kd_mutasi	=	$this->input->post('kd_mutasi');
					$kd_unit	=	$this->input->post('kd_unit');
					$kd_adf	  	=	$this->input->post('kd_adf');
					$kd_bud	  	=	$this->input->post('kd_bud');
					$jabatan	=	$this->input->post('jabatan');
					$tmt	  	=	$this->input->post('tmt');
					$no_sk	  	=	$this->input->post('no_sk');
					$tgl_sk 	=	$this->input->post('tgl_sk');
					$npp_jbt	=	$this->input->post('npp_jbt');
					$tinggal	=	$this->input->post('tinggal');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->entry_sdm08(
						$npp,
						$kd_mutasi,
						$kd_unit,
						$kd_adf,
						$kd_bud,
						$jabatan,
						$tmt,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$tinggal,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm08", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm08", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm08	=	$this->input->post('id_sdm08');
					$npp	  	=	$this->input->post('npp');
					$no_urut	=	$this->input->post('no_urut');
					$kd_mutasi	=	$this->input->post('kd_mutasi');
					$kd_unit	=	$this->input->post('kd_unit');
					$kd_adf	  	=	$this->input->post('kd_adf');
					$kd_bud	  	=	$this->input->post('kd_bud');
					$jabatan	=	$this->input->post('jabatan');
					$tmt	  	=	$this->input->post('tmt');
					$no_sk	  	=	$this->input->post('no_sk');
					$tgl_sk 	=	$this->input->post('tgl_sk');
					$npp_jbt	=	$this->input->post('npp_jbt');
					$tinggal	=	$this->input->post('tinggal');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->edit_sdm08(
						$id_sdm08,
						$npp,
						$no_urut,
						$kd_mutasi,
						$kd_unit,
						$kd_adf,
						$kd_bud,
						$jabatan,
						$tmt,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$tinggal,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
					}
				}
				$data['tsdm08']			=	$this->Model_admin->tampil_sdm08();
				$this->load->view('admin/sdm/sdm08', $data);

				break;

			case 'inpt_sdm08':
				$this->load->view('admin/sdm/input/in_sdm08');
				break;

				//======================================== SDM 09 ===========================================
				//======================================== SDM 09 ===========================================
				//======================================== SDM 09 ===========================================
				//======================================== SDM 09 ===========================================
				//======================================== SDM 09 ===========================================

			case 'in_sdm09':
				if (isset($_POST['cari'])) {
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm09($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	=	$this->input->post('npp');
					$kd_unit	=	$this->input->post('kd_unit');
					$jabatan	=	$this->input->post('jabatan');
					$tmt	  	=	$this->input->post('tmt');
					$no_sk	  	=	$this->input->post('no_sk');
					$tgl_sk	  	=	$this->input->post('tgl_sk');
					$lama_jab  	=	$this->input->post('lama_jab');
					$tgl_akhir 	=	$this->input->post('tgl_akhir');
					$npp_jbt 	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->entry_sdm09(
						$npp,
						$kd_unit,
						$jabatan,
						$tmt,
						$no_sk,
						$tgl_sk,
						$lama_jab,
						$tgl_akhir,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm09", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm09", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm09	=	$this->input->post('id_sdm09');
					$npp	  	=	$this->input->post('npp');
					$no_urut	=	$this->input->post('no_urut');
					$kd_unit	=	$this->input->post('kd_unit');
					$jabatan	=	$this->input->post('jabatan');
					$tmt	  	=	$this->input->post('tmt');
					$no_sk	  	=	$this->input->post('no_sk');
					$tgl_sk	  	=	$this->input->post('tgl_sk');
					$lama_jab  	=	$this->input->post('lama_jab');
					$tgl_akhir 	=	$this->input->post('tgl_akhir');
					$npp_jbt 	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->edit_sdm08(
						$id_sdm09,
						$npp,
						$no_urut,
						$kd_unit,
						$jabatan,
						$tmt,
						$no_sk,
						$tgl_sk,
						$lama_jab,
						$tgl_akhir,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
					}
				}
				$data['tsdm09']			=	$this->Model_admin->tampil_sdm09();
				$this->load->view('admin/sdm/sdm09', $data);

				break;

			case 'inpt_sdm09':
				$this->load->view('admin/sdm/input/in_sdm09');
				break;

				//======================================== SDM 10 ===========================================
				//======================================== SDM 10 ===========================================
				//======================================== SDM 10 ===========================================
				//======================================== SDM 10 ===========================================
				//======================================== SDM 10 ===========================================

			case 'in_sdm10':
				if (isset($_POST['cari'])) {
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm10($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	=	$this->input->post('npp');
					$kd_inst	=	$this->input->post('kd_inst');
					$jabatan	=	$this->input->post('jabatan');
					$tmt	  	=	$this->input->post('tmt');
					$lama_jab	=	$this->input->post('lama_jab');
					$no_sk	  	=	$this->input->post('no_sk');
					$tgl_sk	  	=	$this->input->post('tgl_sk');
					$tgl_akhir  =	$this->input->post('tgl_akhir');
					$npp_jbt 	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->entry_sdm10(
						$npp,
						$kd_inst,
						$jabatan,
						$tmt,
						$lama_jab,
						$no_sk,
						$tgl_sk,
						$tgl_akhir,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm10", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm10", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm10	=	$this->input->post('id_sdm10');
					$npp	  	=	$this->input->post('npp');
					$no_urut	=	$this->input->post('no_urut');
					$kd_inst	=	$this->input->post('kd_inst');
					$jabatan	=	$this->input->post('jabatan');
					$tmt	  	=	$this->input->post('tmt');
					$lama_jab	=	$this->input->post('lama_jab');
					$no_sk	  	=	$this->input->post('no_sk');
					$tgl_sk	  	=	$this->input->post('tgl_sk');
					$tgl_akhir  =	$this->input->post('tgl_akhir');
					$npp_jbt 	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->edit_sdm10(
						$id_sdm10,
						$npp,
						$no_urut,
						$kd_inst,
						$jabatan,
						$tmt,
						$lama_jab,
						$no_sk,
						$tgl_sk,
						$tgl_akhir,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
					}
				}
				$data['tsdm10']			=	$this->Model_admin->tampil_sdm10();
				$this->load->view('admin/sdm/sdm10', $data);

				break;

			case 'inpt_sdm10':
				$this->load->view('admin/sdm/input/in_sdm10');
				break;

				//======================================== SDM 11 ===========================================
				//======================================== SDM 11 ===========================================
				//======================================== SDM 11 ===========================================
				//======================================== SDM 11 ===========================================
				//======================================== SDM 11 ===========================================

			case 'in_sdm11':
				if (isset($_POST['cari'])) {
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm11($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	=	$this->input->post('npp');
					$nm_satgas	=	$this->input->post('nm_satgas');
					$jabatan	=	$this->input->post('jabatan');
					$tmt	  	=	$this->input->post('tmt');
					$no_sk	  	=	$this->input->post('no_sk');
					$tgl_sk	  	=	$this->input->post('tgl_sk');
					$tgl_akhir	=	$this->input->post('tgl_akhir');
					$npp_jbt  	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->entry_sdm11(
						$npp,
						$nm_satgas,
						$jabatan,
						$tmt,
						$no_sk,
						$tgl_sk,
						$tgl_akhir,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm11", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm11", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm11	=	$this->input->post('id_sdm11');
					$npp	  	=	$this->input->post('npp');
					$no_urut	=	$this->input->post('no_urut');
					$nm_satgas	=	$this->input->post('nm_satgas');
					$jabatan	=	$this->input->post('jabatan');
					$tmt	  	=	$this->input->post('tmt');
					$no_sk	  	=	$this->input->post('no_sk');
					$tgl_sk	  	=	$this->input->post('tgl_sk');
					$tgl_akhir	=	$this->input->post('tgl_akhir');
					$npp_jbt  	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->edit_sdm11(
						$id_sdm11,
						$npp,
						$no_urut,
						$nm_satgas,
						$jabatan,
						$tmt,
						$no_sk,
						$tgl_sk,
						$tgl_akhir,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
					}
				}
				$data['tsdm11']			=	$this->Model_admin->tampil_sdm11();
				$this->load->view('admin/sdm/sdm11', $data);

				break;

			case 'inpt_sdm11':
				$this->load->view('admin/sdm/input/in_sdm11');
				break;

				//======================================== SDM 12 ===========================================
				//======================================== SDM 12 ===========================================
				//======================================== SDM 12 ===========================================
				//======================================== SDM 12 ===========================================
				//======================================== SDM 12 ===========================================

			case 'in_sdm12':
				if (isset($_POST['cari'])) {
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm12($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	=	$this->input->post('npp');
					$tmt	  	=	$this->input->post('tmt');
					$nilai_krd	=	$this->input->post('nilai_krd');
					$no_sk	  	=	$this->input->post('no_sk');
					$tgl_sk	  	=	$this->input->post('tgl_sk');
					$npp_jbt  	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->entry_sdm12(
						$npp,
						$tmt,
						$nilai_krd,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm12", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm12", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm12	=	$this->input->post('id_sdm12');
					$npp	  	=	$this->input->post('npp');
					$no_urut	=	$this->input->post('no_urut');
					$tmt	  	=	$this->input->post('tmt');
					$nilai_krd	=	$this->input->post('nilai_krd');
					$no_sk	  	=	$this->input->post('no_sk');
					$tgl_sk	  	=	$this->input->post('tgl_sk');
					$npp_jbt  	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->edit_sdm12(
						$id_sdm12,
						$npp,
						$no_urut,
						$tmt,
						$nilai_krd,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
					}
				}
				$data['tsdm12']			=	$this->Model_admin->tampil_sdm12();
				$this->load->view('admin/sdm/sdm12', $data);

				break;

			case 'inpt_sdm12':
				$this->load->view('admin/sdm/input/in_sdm12');
				break;

				//======================================== SDM 13 ===========================================
				//======================================== SDM 13 ===========================================
				//======================================== SDM 13 ===========================================
				//======================================== SDM 13 ===========================================
				//======================================== SDM 13 ===========================================

			case 'in_sdm13':
				if (isset($_POST['cari'])) {
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm13($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	=	$this->input->post('npp');
					$jns_harga	=	$this->input->post('jns_harga');
					$uraian	  	=	$this->input->post('uraian');
					$tgl_harga	=	$this->input->post('tgl_harga');
					$no_sk	  	=	$this->input->post('no_sk');
					$tgl_sk  	=	$this->input->post('tgl_sk');
					$npp_jbt  	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->entry_sdm13(
						$npp,
						$jns_harga,
						$uraian,
						$tgl_harga,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm13", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm13", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm13	=	$this->input->post('id_sdm13');
					$npp	  	=	$this->input->post('npp');
					$no_urut	=	$this->input->post('no_urut');
					$jns_harga	=	$this->input->post('jns_harga');
					$uraian	  	=	$this->input->post('uraian');
					$tgl_harga	=	$this->input->post('tgl_harga');
					$no_sk	  	=	$this->input->post('no_sk');
					$tgl_sk  	=	$this->input->post('tgl_sk');
					$npp_jbt  	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->edit_sdm13(
						$id_sdm13,
						$npp,
						$no_urut,
						$jns_harga,
						$uraian,
						$tgl_harga,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
					}
				}
				$data['tsdm13']			=	$this->Model_admin->tampil_sdm13();
				$this->load->view('admin/sdm/sdm13', $data);

				break;

			case 'inpt_sdm13':
				$this->load->view('admin/sdm/input/in_sdm13');
				break;

				//======================================== SDM 14 ===========================================
				//======================================== SDM 14 ===========================================
				//======================================== SDM 14 ===========================================
				//======================================== SDM 14 ===========================================
				//======================================== SDM 14 ===========================================

			case 'in_sdm14':
				if (isset($_POST['cari'])) {
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm14($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	  =	 $this->input->post('npp');
					$tgl_lgr	  =	 $this->input->post('tgl_lgr');
					$jns_lgr	  =	 $this->input->post('jns_lgr');
					$uraian	  	  =	 $this->input->post('uraian');
					$jns_hukum	  =	 $this->input->post('jns_hukum');
					$tmt  		  =	 $this->input->post('tmt');
					$no_sk  	  =	 $this->input->post('no_sk');
					$tgl_sk  	  =	 $this->input->post('tgl_sk');
					$npp_jbt  	  =	 $this->input->post('npp_jbt');
					$bln_proses	  =	 $this->input->post('bln_proses');
					$stat_rec  	  =	 $this->input->post('stat_rec');
					$masa_berlaku =	 $this->input->post('masa_berlaku');

					$berhasil	  =	 $this->Model_admin->entry_sdm14(
						$npp,
						$tgl_lgr,
						$jns_lgr,
						$uraian,
						$jns_hukum,
						$tmt,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$bln_proses,
						$stat_rec,
						$masa_berlaku
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm14", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm14", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm14	   =   $this->input->post('id_sdm14');
					$npp	  	   =   $this->input->post('npp');
					$no_urut	   =   $this->input->post('no_urut');
					$tgl_lgr	   =   $this->input->post('tgl_lgr');
					$jns_lgr	   =   $this->input->post('jns_lgr');
					$uraian	  	   =   $this->input->post('uraian');
					$jns_hukum	   =   $this->input->post('jns_hukum');
					$tmt  		   =   $this->input->post('tmt');
					$no_sk  	   =   $this->input->post('no_sk');
					$tgl_sk  	   =   $this->input->post('tgl_sk');
					$npp_jbt  	   =   $this->input->post('npp_jbt');
					$bln_proses	   =   $this->input->post('bln_proses');
					$stat_rec  	   =   $this->input->post('stat_rec');
					$masa_berlaku  =   $this->input->post('masa_berlaku');

					$berhasil	   =   $this->Model_admin->edit_sdm14(
						$id_sdm14,
						$npp,
						$no_urut,
						$jns_lgr,
						$uraian,
						$tgl_lgr,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$bln_proses,
						$stat_rec,
						$masa_berlaku
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
					}
				}
				$data['tsdm14']			=	$this->Model_admin->tampil_sdm14();
				$this->load->view('admin/sdm/sdm14', $data);

				break;

			case 'inpt_sdm14':
				$this->load->view('admin/sdm/input/in_sdm14');
				break;

				//======================================== SDM 15 ===========================================
				//======================================== SDM 15 ===========================================
				//======================================== SDM 15 ===========================================
				//======================================== SDM 15 ===========================================
				//======================================== SDM 15 ===========================================

			case 'in_sdm15':
				if (isset($_POST['cari'])) {
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm15($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	=	$this->input->post('npp');
					$jns_cuti	=	$this->input->post('jns_cuti');
					$tmt	  	=	$this->input->post('tmt');
					$lama_cuti	=	$this->input->post('lama_cuti');
					$thn_angg	=	$this->input->post('thn_angg');
					$no_sk  	=	$this->input->post('no_sk');
					$tgl_sk  	=	$this->input->post('tgl_sk');
					$npp_jbt  	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->entry_sdm15(
						$npp,
						$jns_cuti,
						$tmt,
						$lama_cuti,
						$thn_angg,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm15", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm15", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm15	=	$this->input->post('id_sdm15');
					$npp	  	=	$this->input->post('npp');
					$no_urut	=	$this->input->post('no_urut');
					$jns_cuti	=	$this->input->post('jns_cuti');
					$tmt	  	=	$this->input->post('tmt');
					$lama_cuti	=	$this->input->post('lama_cuti');
					$thn_angg	=	$this->input->post('thn_angg');
					$no_sk  	=	$this->input->post('no_sk');
					$tgl_sk  	=	$this->input->post('tgl_sk');
					$npp_jbt  	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->edit_sdm15(
						$id_sdm15,
						$npp,
						$no_urut,
						$jns_cuti,
						$tmt,
						$lama_cuti,
						$thn_angg,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
					}
				}
				$data['tsdm15']			=	$this->Model_admin->tampil_sdm15();
				$this->load->view('admin/sdm/sdm15', $data);

				break;

			case 'inpt_sdm15':
				$this->load->view('admin/sdm/input/in_sdm15');
				break;

				//======================================== SDM 16 ===========================================
				//======================================== SDM 16 ===========================================
				//======================================== SDM 16 ===========================================
				//======================================== SDM 16 ===========================================
				//======================================== SDM 16 ===========================================

			case 'in_sdm16':
				if (isset($_POST['cari'])) {
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm16($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	=	$this->input->post('npp');
					$st_peg	  	=	$this->input->post('st_peg');
					$golongan	=	$this->input->post('golongan');
					$mk	  		=	$this->input->post('mk');
					$tmt	  	=	$this->input->post('tmt');
					$jns_naik  	=	$this->input->post('jns_naik');
					$no_sk  	=	$this->input->post('no_sk');
					$tgl_sk  	=	$this->input->post('tgl_sk');
					$npp_jbt  	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$kd_kelas	=	$this->input->post('kd_kelas');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->entry_sdm16(
						$npp,
						$st_peg,
						$golongan,
						$mk,
						$tmt,
						$jns_naik,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$bln_proses,
						$kd_kelas,
						$stat_rec
					);

					if ($berhasil == 1) {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-success" role="alert">Data Berhasil di Simpan</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm16", $data);
					} else {
						$data = $this->session->set_userdata('status_insert', '<div class="alert alert-danger" role="alert">Data Berhasil Gagal di Simpan!!!</div>');
						redirect(base_url() . "index.php/admin/tabel_sdm/inpt_sdm16", $data);
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm16	=	$this->input->post('id_sdm16');
					$npp	  	=	$this->input->post('npp');
					$no_urut	=	$this->input->post('no_urut');
					$st_peg	  	=	$this->input->post('st_peg');
					$golongan	=	$this->input->post('golongan');
					$mk	  		=	$this->input->post('mk');
					$tmt	  	=	$this->input->post('tmt');
					$jns_naik  	=	$this->input->post('jns_naik');
					$no_sk  	=	$this->input->post('no_sk');
					$tgl_sk  	=	$this->input->post('tgl_sk');
					$npp_jbt  	=	$this->input->post('npp_jbt');
					$bln_proses	=	$this->input->post('bln_proses');
					$kd_kelas	=	$this->input->post('kd_kelas');
					$stat_rec  	=	$this->input->post('stat_rec');

					$berhasil	=	$this->Model_admin->edit_sdm16(
						$id_sdm16,
						$npp,
						$no_urut,
						$st_peg,
						$golongan,
						$mk,
						$tmt,
						$jns_naik,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$bln_proses,
						$kd_kelas,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
					}
				}
				$data['tsdm16']			=	$this->Model_admin->tampil_sdm16();
				$this->load->view('admin/sdm/sdm16', $data);

				break;

			case 'inpt_sdm16':
				$data['naik'] = $this->Model_admin->naik();
				$data['gol']  = $this->Model_admin->gol();
				$this->load->view('admin/sdm/input/in_sdm16', $data);
				break;
		}
	}

	public function cuti_admin()
	{
		$page = $this->uri->segment(3);
		switch ($page) {
			case 'kuota_cuti_admin':
				$data['quota_thn']	 =	$this->Model_admin->quota_cuti_thn();
				$data['quota_pjg']	 =	$this->Model_admin->quota_cuti_pjg();
				$data['quota_sakit'] =	$this->Model_admin->quota_cuti_sakit();
				$this->load->view('admin/kt_cuti_admin', $data);
				break;

			case 'tb_cuti_admin':
				$data['cuti_pjg']	=	$this->Model_admin->cuti_pjg();
				$data['cuti_thn']	=	$this->Model_admin->cuti_thn();
				$data['cuti_sakit']	=	$this->Model_admin->cuti_sakit();
				$this->load->view('admin/tb_cuti_admin', $data);
				break;
		}
	}

	public function tabel_temp()
	{
		$page = $this->uri->segment(3);
		switch ($page) {
			case 'tmpt_sdm01':
				$data['tempt'] = $this->Model_admin->tempt01();
				$this->load->view('admin/sdm/temp_sdm01', $data);
				break;
			case 'tmpt_sdm02':
				$data['tempt'] = $this->Model_admin->tempt02();
				$this->load->view('admin/sdm/temp_sdm02', $data);
				break;

			case 'tmpt_sdm03':
				$data['tempt'] = $this->Model_admin->tempt03();
				$this->load->view('admin/sdm/temp_sdm03', $data);
				break;

			case 'tmpt_sdm04':
				$data['tempt'] = $this->Model_admin->tempt04();
				$this->load->view('admin/sdm/temp_sdm04', $data);
				break;
		}
	}

	public function aprove_sdm01()
	{
		$id_sdm01 = $this->uri->segment(3);
		$berhasil = $this->Model_admin->aprove_sdm01($id_sdm01);
		if ($berhasil == 1) {
			$this->session->set_flashdata('berhasil', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm01');
		} else {
			$this->session->set_flashdata('gagal', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm01');
		}
	}

	public function aprove_edit_sdm01()
	{
		$id_sdm01 = $this->uri->segment(3);
		$berhasil = $this->Model_admin->aprove_edit_sdm01($id_sdm01);
		if ($berhasil == 1) {
			$this->session->set_flashdata('berhasil', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm01');
		} else {
			$this->session->set_flashdata('gagal', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm01');
		}
	}

	public function reject_sdm01()
	{
		if (isset($_POST['reject'])) {
			$id_sdm01 = $this->input->post('id_sdm01');
			$status	  = $this->input->post('status');

			$berhasil = $this->Model_admin->reject_sdm01($id_sdm01, $status);
			if ($berhasil == 1) {
				$this->session->set_flashdata('berhasil', 'Reject!!!');
				redirect('admin/tabel_temp/tmpt_sdm01');
			} else {
				$this->session->set_flashdata('gagal', 'Reject!!!');
				redirect('admin/tabel_temp/tmpt_sdm01');
			}
		}
	}

	public function aprove_sdm02()
	{
		$id_sdm02 = $this->uri->segment(3);
		$berhasil = $this->Model_admin->aprove_sdm02($id_sdm02);
		if ($berhasil == 1) {
			$this->session->set_flashdata('berhasil', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm02');
		} else {
			$this->session->set_flashdata('gagal', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm02');
		}
	}

	public function aprove_edit_sdm02()
	{
		$id_sdm02 = $this->uri->segment(3);
		$berhasil = $this->Model_admin->aprove_edit_sdm02($id_sdm02);
		if ($berhasil == 1) {
			$this->session->set_flashdata('berhasil', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm02');
		} else {
			$this->session->set_flashdata('gagal', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm02');
		}
	}

	public function reject_sdm02()
	{
		if (isset($_POST['reject'])) {
			$id_sdm02 = $this->input->post('id_sdm02');
			$status	  = $this->input->post('status');

			$berhasil = $this->Model_admin->reject_sdm02($id_sdm02, $status);
			if ($berhasil == 1) {
				$this->session->set_flashdata('berhasil', 'Reject!!!');
				redirect('admin/tabel_temp/tmpt_sdm02');
			} else {
				$this->session->set_flashdata('gagal', 'Reject!!!');
				redirect('admin/tabel_temp/tmpt_sdm02');
			}
		}
	}

	public function aprove_sdm03()
	{
		$id_sdm03 = $this->uri->segment(3);
		$berhasil = $this->Model_admin->aprove_sdm03($id_sdm03);
		if ($berhasil == 1) {
			$this->session->set_flashdata('berhasil', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm03');
		} else {
			$this->session->set_flashdata('gagal', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm03');
		}
	}

	public function aprove_edit_sdm03()
	{
		$id_sdm03 = $this->uri->segment(3);
		$berhasil = $this->Model_admin->aprove_edit_sdm03($id_sdm03);
		if ($berhasil == 1) {
			$this->session->set_flashdata('berhasil', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm03');
		} else {
			$this->session->set_flashdata('gagal', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm03');
		}
	}

	public function reject_sdm03()
	{
		if (isset($_POST['reject'])) {
			$id_sdm03 = $this->input->post('id_sdm03');
			$status	  = $this->input->post('status');

			$berhasil = $this->Model_admin->reject_sdm03($id_sdm03, $status);
			if ($berhasil == 1) {
				$this->session->set_flashdata('berhasil', 'Reject!!!');
				redirect('admin/tabel_temp/tmpt_sdm03');
			} else {
				$this->session->set_flashdata('gagal', 'Reject!!!');
				redirect('admin/tabel_temp/tmpt_sdm03');
			}
		}
	}

	public function aprove_sdm04()
	{
		$id_sdm04 = $this->uri->segment(3);
		$berhasil = $this->Model_admin->aprove_sdm04($id_sdm04);
		if ($berhasil == 1) {
			$this->session->set_flashdata('berhasil', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm04');
		} else {
			$this->session->set_flashdata('gagal', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm04');
		}
	}

	public function aprove_edit_sdm04()
	{
		$id_sdm04 = $this->uri->segment(3);
		$berhasil = $this->Model_admin->aprove_edit_sdm04($id_sdm04);
		if ($berhasil == 1) {
			$this->session->set_flashdata('berhasil', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm04');
		} else {
			$this->session->set_flashdata('gagal', 'Di Simpan!!!');
			redirect('admin/tabel_temp/tmpt_sdm04');
		}
	}

	public function reject_sdm04()
	{
		if (isset($_POST['reject'])) {
			$id_sdm04 = $this->input->post('id_sdm04');
			$status	  = $this->input->post('status');

			$berhasil = $this->Model_admin->reject_sdm04($id_sdm04, $status);
			if ($berhasil == 1) {
				$this->session->set_flashdata('berhasil', 'Reject!!!');
				redirect('admin/tabel_temp/tmpt_sdm04');
			} else {
				$this->session->set_flashdata('gagal', 'Reject!!!');
				redirect('admin/tabel_temp/tmpt_sdm04');
			}
		}
	}

	public function Cetak_cv_admin()
	{
		if (isset($_POST['cari'])) {
			$npp = $this->input->post('npp_cari');
			$data['bio'] = $this->Model_admin->get_bio($npp);
			$this->load->view('admin/Cetak_cv_admin', $data);
		} else {
			$this->load->view('admin/Cetak_cv_admin');
		}
	}

	public function tabel_a1()
	{
		$data['ta1']		=	$this->Model_admin->tampil_a1();
		$this->load->view('admin/t_a1', $data);
	}

	public function kembali_rekap()
	{
		$data['tbrekap']	=	$this->Model_admin->tampil_rekap();
		$this->load->view('admin/RekapPeringatan', $data);
	}

	//================== Delet file all table ======================//
	//================== Delet file all table ======================//
	//================== Delet file all table ======================//

	public function delet_absen()
	{
		$data = $this->input->post('id_absen');
		$this->Model_admin->delet_absen($data);
		redirect('admin/tabel_sdm/absen');
	}

	public function delet_sdm01()
	{
		$id_sdm01 = $this->input->post('id_sdm01');
		$data = $this->Model_admin->delet_sdm01($id_sdm01);
		echo json_encode($data);
	}

	public function delet_sdm02()
	{
		$data = $this->input->post('id_sdm02');
		$this->Model_admin->delet_sdm02($data);
		redirect('admin/tabel_sdm/in_sdm02');
	}

	public function delet_sdm03()
	{
		$data = $this->input->post('id_sdm03');
		$this->Model_admin->delet_sdm03($data);
		redirect('admin/tabel_sdm/in_sdm03');
	}

	public function delet_sdm04()
	{
		$data = $this->input->post('id_sdm04');
		$this->Model_admin->delet_sdm04($data);
		redirect('admin/tabel_sdm/in_sdm04');
	}

	public function delet_sdm05()
	{
		$data = $this->input->post('id_sdm05');
		$this->Model_admin->delet_sdm05($data);
		redirect('admin/tabel_sdm/in_sdm05');
	}

	public function delet_sdm06()
	{
		$data = $this->input->post('id_sdm06');
		$this->Model_admin->delet_sdm06($data);
		redirect('admin/tabel_sdm/in_sdm06');
	}

	public function delet_sdm07()
	{
		$data = $this->input->post('id_sdm07');
		$this->Model_admin->delet_sdm07($data);
		redirect('admin/tabel_sdm/in_sdm07');
	}

	public function delet_sdm08()
	{
		$data = $this->input->post('id_sdm08');
		$this->Model_admin->delet_sdm08($data);
		redirect('admin/tabel_sdm/in_sdm08');
	}

	public function delet_sdm10()
	{
		$data = $this->input->post('id_sdm10');
		$this->Model_admin->delet_sdm10($data);
		redirect('admin/tabel_sdm/in_sdm10');
	}

	public function delet_sdm11()
	{
		$data = $this->input->post('id_sdm11');
		$this->Model_admin->delet_sdm11($data);
		redirect('admin/tabel_sdm/in_sdm11');
	}

	public function delet_sdm12()
	{
		$data = $this->input->post('id_sdm12');
		$this->Model_admin->delet_sdm12($data);
		redirect('admin/tabel_sdm/in_sdm12');
	}

	public function delet_sdm13()
	{
		$data = $this->input->post('id_sdm13');
		$this->Model_admin->delet_sdm13($data);
		redirect('admin/tabel_sdm/in_sdm13');
	}

	public function delet_sdm14()
	{
		$data = $this->input->post('id_sdm14');
		$this->Model_admin->delet_sdm14($data);
		redirect('admin/tabel_sdm/in_sdm14');
	}

	public function delet_sdm15()
	{
		$data = $this->input->post('id_sdm15');
		$this->Model_admin->delet_sdm15($data);
		redirect('admin/tabel_sdm/in_sdm15');
	}

	public function delet_sdm16()
	{
		$data = $this->input->post('id_sdm16');
		$this->Model_admin->delet_sdm16($data);
		redirect('admin/tabel_sdm/in_sdm16');
	}

	public function delet_hsl_p_lmbr()
	{
		$id_p_lmbr = $this->input->post('id_p_lmbr');
		$this->Model_admin->delet_hsl_p_lmbr($id_p_lmbr);
		redirect('Admin/lembur_admin/p_lmbr');
	}

	public function edit_hsl_p_lmbr()
	{
		$id_p_lmbr = $this->input->post('id_p_lmbr');
		$tgl	   = $this->input->post('tgl');
		$awal  	   = $this->input->post('awal'); 
		$akhir	   = $this->input->post('akhir');
		$this->Model_admin->edit_hsl_p_lmbr($id_p_lmbr, $tgl, $awal, $akhir);
		redirect('Admin/lembur_admin/p_lmbr');
	}

	public function get_npp()
	{
		$npp  = $this->input->post('npp');
		$data = $this->Model_admin->get_data_bynpp($npp);
		echo json_encode($data);
	}

	public function get_npp_sdm08()
	{
		$npp  = $this->input->post('npp');
		$data = $this->Model_admin->get_bynpp($npp);
		echo json_encode($data);
	}

	public function get_npp_sdm16()
	{
		$npp  = $this->input->post('npp');
		$data = $this->Model_admin->get_bynpp_16($npp);
		echo json_encode($data);
	}

	public function sdm03_entry()
	{
		$npp  = $this->input->post('npp');
		$data = $this->Model_admin->pend_sdm03($npp);

		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>--PILIH--</option>";

		foreach ($data as $key) {
			$lists .= "<option value='" . $key[0]['no_urut'] . +1. . "'>" . $key[0]['no_urut'] . +1. . "</option>"; // Tambahkan tag option ke variabel $lists
		}

		$callback = array('list' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // mengembalikan varibael $callback menjadi JSON
	}

	public function hak_akses()
	{
		$page = $this->uri->segment(3);

		switch ($page) {
			case 'hak':
				if (isset($_POST['cari'])) {
					$username = $this->input->post('username');
					$data['cari'] = $this->Model_admin->cari_login_karyawan($username);
				}

				$data['hak']	=	$this->Model_admin->get_hak_akses();
				$this->load->view('admin/hak_akses', $data);
				break;

			case 'ed_hak':
				$id = $this->uri->segment(4);
				$data['lgn']	=	$this->Model_admin->get_id($id);
				$this->load->view('admin/ed_akses', $data);
				break;
		}
	}

	function ed_action()
	{
		$id			=	$this->input->post('id');
		$username	=	$this->input->post('username');
		if ($_POST['pass'] != "" | $_POST['kpass'] != "") 
		{
			$nama		=	$this->input->post('nama');
			$pass		=	$this->input->post('pass');
			$kpass 		= 	$this->input->post('kpass');
			if ($pass == $kpass) {
				$md5 		= 	md5($pass);
				$berhasil = $this->Model_admin->edit_login_kar($id, $nama, $username, $md5);

				if ($berhasil == 1) {
					$this->session->set_flashdata('statusinsert', 'Di edit!!!');
				} else {
					$this->session->set_flashdata('statusgagal', 'Di edit!!!');
				}
			} else {
				$this->session->set_flashdata('statuspass', 'Input Data!!!');
			}
		}
		$config['upload_path']   = './assets_application/assets/faces/';
		$config['allowed_types'] = 'gif|jpeg|jpg|png';
		$config['overwrite']	 = true;
		$config['max_size']  	 = 2048;
		$config['max_width']     = 600;
		$config['max_height']    = 600;
		$config['file_name'] 	 = $username;
		$this->load->library('upload', $config);

		if (isset($_FILES['image'])) {
			if (!$this->upload->do_upload('image')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">
				<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
				<span class="icon-sc-cl" aria-hidden="true">x</span>
			</button>' . $error . '</div>');
			} else {
				$image = $config['file_name'] . $this->upload->data('file_ext');
				$berhasil = $this->Model_admin->edit_login_kar2($id, $image);

				if ($berhasil == 1) {
					$this->session->set_flashdata('statusinsert', 'Di edit!!!');
				} else {
					$this->session->set_flashdata('statusgagal', 'Di edit!!!');
				}
			}
			$this->output->delete_cache();
		}
		// $this->session->set_flashdata('statusinsert', 'Di edit!!!');
		redirect(base_url() . "index.php/admin/hak_akses/hak");
	}

	public function delete()
	{
		$id 	= 	$this->input->post('id');
		$valid 	= 	$this->input->post('valid');
		$delete	=	$this->Model_admin->delete($id, $valid);

		if ($delete == 1) {
			redirect(base_url() . "index.php/admin/hak_akses/hak");
		}
	}

	public function settings()
	{
		$this->load->view('admin/settings');
	}

	public function ed_lg_admin()
	{
		$id			=	$this->input->post('id');
		$nama       =   $this->input->post('nama');
		$alamat		=	$this->input->post('alamat');
		$tlp		=	$this->input->post('tlp');
		$email		=	$this->input->post('email');
		$username   =   $this->input->post('username');

		$config['upload_path']    = "./assets_application/assets/faces/admin";
		$config['allowed_types']  = 'png|jpg|jpeg';
		$config['overwrite']      = true;
		$config['max_size']       = 16048;
		$config['file_name']      = $id;

		$this->load->library('upload', $config);

		if (isset($_FILES['image'])) {
			if (!$this->upload->do_upload('image')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">
				<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
				<span class="icon-sc-cl" aria-hidden="true">x</span>
            </button>' . $error . '</div>');
			} else {
				$image = $config['file_name'] . $this->upload->data('file_ext');

				$berhasil = $this->Model_admin->edit_image($id, $nama, $alamat, $tlp, $email, $username, $image);

				if ($berhasil == 1) {
					$this->session->set_flashdata('statusok', 'Diganti!!!');
				} else {
					$this->session->set_flashdata('gagal', '<div class="alert alert-warning" role="alert">
                        <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                        <span class="icon-sc-cl" aria-hidden="true">x</span>
                    </button>Photo Gagal Diganti!!!</div>');
				}
			}
			$this->output->delete_cache();
		}
		if ($_POST['pass'] != "" | $_POST['new_password'] != "" | $_POST['confirm_password'] != "") {
			$id					= $this->input->post('id');
			$pass               = md5($this->input->post('pass'));
			$new_password       = $this->input->post('new_password');
			$confirm_password   = $this->input->post('confirm_password');
			$cek_old_password   = $this->Model_admin->cek_old_password($id, $pass);

			if ($cek_old_password == 1) {
				if ($new_password == $confirm_password) {
					$berhasil = $this->Model_admin->ganti_password($id, md5($new_password));
					$this->session->set_flashdata('statusinsert', 'Password Diganti!!!');
				} else {
					$this->session->set_flashdata('statusgagal', 'Password Baru Tidak Cocok!!!');
				}
			} else {
				$this->session->set_flashdata('statuslama', 'Password Lama Salah!!!');
			}
		}
		redirect(base_url() . "index.php/Admin/settings");
	}

	public function multiple_insert_sdm08()
	{
		$npp	  	=	$_POST['npp'];
		$no_urut	=	$_POST['no_urut'];
		$kd_mutasi	=	$_POST['kd_mutasi'];
		$kd_unit	=	$_POST['kd_unit'];
		$kd_adf	  	=	$_POST['kd_adf'];
		$kd_bud	  	=	$_POST['kd_bud'];
		$jabatan	=	$_POST['jabatan'];
		$tmt	  	=	$_POST['tmt'];
		$no_sk	  	=	$_POST['no_sk'];
		$tgl_sk 	=	$_POST['tgl_sk'];
		$npp_jbt	=	$_POST['npp_jbt'];
		$tinggal	=	$_POST['tinggal'];
		$bln_proses	=	$_POST['bln_proses'];
		$stat_rec  	=	$_POST['stat_rec'];

		$data = array();

		$i = 0;
		foreach ($npp as $datanpp) {
			date_default_timezone_set('Asia/Jakarta');
			$date   =   date('Y/m/d H:i:s');
			array_push($data, array(
				'npp'	  		=>	$datanpp,
				'no_urut'		=>	$no_urut[$i],
				'kd_mutasi'		=>	$kd_mutasi[$i],
				'kd_unit'		=>	$kd_unit[$i],
				'kd_adf'	  	=>	$kd_adf[$i],
				'kd_bud'	  	=>	$kd_bud[$i],
				'jabatan'		=>	$jabatan[$i],
				'tmt'	  		=>	$tmt[$i],
				'no_sk'	  		=>	$no_sk[$i],
				'tgl_sk' 		=>	$tgl_sk[$i],
				'npp_jbt'		=>	$npp_jbt[$i],
				'tinggal'		=>	$tinggal[$i],
				'bln_proses'	=>	$bln_proses[$i],
				'stat_rec'  	=>	$stat_rec[$i],
				'tgl'			=>	$date,
			));

			$i++;
		}
		$sql = $this->Model_admin->save_batch_sdm08($data);

		if ($sql) {
			$data = $this->session->set_flashdata('status_insert', '<div class="alert alert-success" role="alert"><button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
			<span class="icon-sc-cl" aria-hidden="true">x</span></button>Data Berhasil di Simpan</div>');
			redirect(base_url() . "index.php/admin/mutasi", $data);
		} else {
			$data = $this->session->set_flashdata('status_insert', '<div class="alert alert-danger" role="alert"><button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
			<span class="icon-sc-cl" aria-hidden="true">x</span></button>Data Berhasil Gagal di Simpan!!!</div>');
			redirect(base_url() . "index.php/admin/mutasi", $data);
		}
	}

	public function multiple_insert_sdm16()
	{
		$npp	  	=	$_POST['npp'];
		$no_urut	=	$_POST['no_urut'];
		$st_peg		=	$_POST['st_peg'];
		$golongan	=	$_POST['golongan'];
		$mk		  	=	$_POST['mk'];
		$tmt	  	=	$_POST['tmt'];
		$jns_naik  	=	$_POST['jns_naik'];
		$no_sk	  	=	$_POST['no_sk'];
		$tgl_sk 	=	$_POST['tgl_sk'];
		$npp_jbt	=	$_POST['npp_jbt'];
		$bln_proses	=	$_POST['bln_proses'];
		$kd_kelas	=	$_POST['kd_kelas'];
		$stat_rec  	=	$_POST['stat_rec'];

		$data = array();

		$i = 0;
		foreach ($npp as $datanpp) {
			date_default_timezone_set('Asia/Jakarta');
			$date   =   date('Y/m/d H:i:s');
			array_push($data, array(
				'npp'	  		=>	$datanpp,
				'no_urut'		=>	$no_urut[$i],
				'st_peg'		=>	$st_peg[$i],
				'golongan'		=>	$golongan[$i],
				'mk'		  	=>	$mk[$i],
				'tmt'	  		=>	$tmt[$i],
				'jns_naik'	  	=>	$jns_naik[$i],
				'no_sk'	  		=>	$no_sk[$i],
				'tgl_sk' 		=>	$tgl_sk[$i],
				'npp_jbt'		=>	$npp_jbt[$i],
				'bln_proses'	=>	$bln_proses[$i],
				'kd_kelas'		=>	$kd_kelas[$i],
				'stat_rec'  	=>	$stat_rec[$i],
				'tgl'			=>	$date,
			));

			$i++;
		}
		$sql = $this->Model_admin->save_batch_sdm16($data);

		if ($sql) {
			$data = $this->session->set_flashdata('status_insert', '<div class="alert alert-success" role="alert"><button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
			<span class="icon-sc-cl" aria-hidden="true">x</span></button>Data Berhasil di Simpan</div>');
			redirect(base_url() . "index.php/admin/kepegawaian/golongan", $data);
		} else {
			$data = $this->session->set_flashdata('status_insert', '<div class="alert alert-danger" role="alert"><button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
			<span class="icon-sc-cl" aria-hidden="true">x</span></button>Data Berhasil Gagal di Simpan!!!</div>');
			redirect(base_url() . "index.php/admin/kepegawaian/golongan", $data);
		}
	}

	public function kepegawaian()
	{
		$page = $this->uri->segment(3);
		switch ($page) {
				// case ('pensiun'): 
				// 	$this->load->view('admin/mutasi');
				// break;

			case ('mutasi'):
				$data['jab']	=	$this->Model_admin->get_jabini();
				$this->load->view('admin/mutasi', $data);
				break;

			case ('golongan'):
				$data['naik'] = $this->Model_admin->naik();
				$data['gol']  = $this->Model_admin->gol();
				$this->load->view('admin/golongan', $data);
				break;
		}
	}

	public function lembur_admin()
	{
		$page = $this->uri->segment(3);
		switch ($page) {
			case 'p_lmbr':
				if (isset($_POST['cari'])) {
					$kd_menu       =  $this->input->post('kd_menu_cari');
					$kasubdiv 	   =  $this->Model_admin->kd_menu($kd_menu);
					$kasubdiv      =  $kasubdiv[0]['kd_menu'];
					$data['staf']  =  $this->Model_admin->get_lembur($kasubdiv);
					$data['upah']  =  $this->Model_admin->p_upah($kasubdiv);
					$this->load->view('admin/tb_lembur_admin', $data);
				} elseif (empty($_POST['cari'])) {
					$data['tb_lembur'] =  $this->Model_admin->tb_lembur();
					$this->load->view('admin/tb_lembur_admin', $data);
				}
				break;

			case 'lmbr':
				if (isset($_POST['cari_bln'])) {
					$tanggal             =  $this->input->post('tanggal');
					$data['upah_bln']  =  $this->Model_admin->upah_bln($tanggal);
					$this->load->view('admin/uph_lembur_admin', $data);
				} elseif (empty($_POST['cari_bln'])) {
					$this->load->view('admin/uph_lembur_admin');
				}
				break;
		}
	}

	public function tbl_jam_kerja()
	{
		$data = $this->Model_admin->jam_kerja();
		$output = '
		<table class="table table-striped table-bordered">
			<tr>
				<th>No</th>
				<th>Tanggal</th>
				<th>Jam Masuk</th>
				<th>Jam Pulang</th>
			</tr>
		';
		$count = 1;
		if ($data->num_rows() > 0) {
			foreach ($data->result() as $row) {
				$no = $count++;
				$output .= '
				<tr>
					<td>' . $no . '</td>
					<td>' . $row->tgl . '</td>
					<td>' . $row->jam_masuk . '</td>
					<td>' . $row->jam_pulang . '</td>
				</tr>
				';
			}
		} else {
			$output .= '
			<tr>
				<td colspan="4" align="center">Data not Available</td>
			</tr>
			';
		}
		$output .= '</table></div>';
		echo $output;
	}

	public function import_jam_kerja()
	{
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		foreach ($file_data as $row) {
			$data[] = array(
				'tgl'		  =>  $row["Tanggal"],
				'jam_masuk'	  =>  $row["Jam Masuk"],
				'jam_pulang'  =>  $row["Jam Pulang"]
			);
		}
		$this->Model_admin->insert_jam_kerja($data);
	}

	public function tbl_absensi()
	{
		$data = $this->Model_admin->absensi();
		$output = '
		<table class="table table-striped table-bordered">
			<tr>
				<th>No</th>
				<th>NPP</th>
				<th>Nama Karyawan</th>
				<th>Tanggal</th>
				<th>Jam Masuk</th>
				<th>Jam Keluar</th>
			</tr>
		';
		$count = 1;
		if ($data->num_rows() > 0) {
			foreach ($data->result() as $row) {
				$no = $count++;
				$output .= '
				<tr>
					<td>' . $no . '</td>
					<td>' . $row->npp . '</td>
					<td>' . $row->nama . '</td>
					<td>' . $row->tgl . '</td>
					<td>' . $row->masuk . '</td>
					<td>' . $row->keluar . '</td>
				</tr>
				';
			}
		} else {
			$output .= '
			<tr>
				<td colspan="6" align="center">Data not Available</td>
			</tr>
			';
		}
		$output .= '</table></div>';
		echo $output;
	}

	public function import_absensi()
	{
		$file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
		foreach ($file_data as $row) {
			$data[] = array(
				'tgl'	  =>  $row["Tanggal"],
				'npp'	  =>  $row["NPP"],
				'nama'	  =>  $row["Nama"],
				'masuk'	  =>  $row["Masuk"],
				'keluar'  =>  $row["Keluar"],
				'kd_menu' =>  $row["Kd Menu"]
			);
		}
		$this->Model_admin->insert_absensi($data);
	}

	public function hsl_nilai()
	{
		$data['tb_nli'] = $this->Model_admin->get_nilai();
		$this->load->view('Admin/hsl_nilai', $data);
	}
}
