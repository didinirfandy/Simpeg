<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Model_admin');
		$this->load->model('Model_login');

		if (empty($_SESSION['status_login'])) {
			redirect('Welcome/index_admin');
		}
	}

	public function in_admin()
	{
		$this->load->view('admin/in_admin');
	}


	public function input_tabel()
	{
		$page = $this->uri->segment(3);

		switch ($page) {
			case 'agama':
				if (isset($_POST['submit'])) {
					$kd_agama	=	$this->input->post('kd_agama', true);
					$nm_agama	=	$this->input->post('nm_agama', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_agama($kd_agama, $nm_agama, $stat_rec);

					if ($berhasil == 1) {
						$data['status_insert']	=	"Data Berhasil Di Simpan";
						$data['tagama']			=	$this->Model_admin->tampil_agama();
						$this->load->view('admin/tabel/input/in_agama', $data);
					} else {
						$data['status_insert']	=	"Data Gagal Di Simpan";
						$data['tagama']			=	$this->Model_admin->tampil_agama();
						$this->load->view('admin/tabel/input/in_agama', $data);
					}
				} else {
					$data['status_insert']	=	"";
					$data['tagama']	=	$this->Model_admin->tampil_agama();
					$this->load->view('admin/tabel/input/in_agama', $data);
				}
				break;

			case 'akreditasi':
				if (isset($_POST['submit'])) {
					$kd_akred	=	$this->input->post('kd_akred', true);
					$nm_akred	=	$this->input->post('nm_akred', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_akred($kd_akred, $nm_akred, $stat_rec);

					if ($berhasil == 1) {
						$data['status_insert']	=	"Data Berhasil Di Simpan";
						$data['takred']			=	$this->Model_admin->tampil_akred();
						$this->load->view('admin/tabel/input/in_akreditasi', $data);
					} else {
						$data['status_insert']	=	"Data Gagal Di Simpan";
						$data['takred']			=	$this->Model_admin->tampil_akred();
						$this->load->view('admin/tabel/input/in_akreditasi', $data);
					}
				} else {
					$data['status_insert']	=	"";
					$data['takred']	=	$this->Model_admin->tampil_akred();
					$this->load->view('admin/tabel/input/in_akreditasi', $data);
				}
				break;

			case 'budidaya':
				if (isset($_POST['submit'])) {
					$kd_bud			=	$this->input->post('kd_bud', true);
					$kd_jnsprod 	=	$this->input->post('kd_jnsprod', true);
					$nm_bud			=	$this->input->post('nm_bud', true);
					$stat_rec		=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_budidaya($kd_bud, $kd_jnsprod, $nm_bud, $stat_rec);

					if ($berhasil == 1) {
						$data['status_insert']	=	"Data Berhasil Di Simpan";
						$data['tbudi']			=	$this->Model_admin->tampil_budidaya();
						$this->load->view('admin/tabel/input/in_budidaya', $data);
					} else {
						$data['status_insert']	=	"Data Gagal Di Simpan";
						$data['tbudi']			=	$this->Model_admin->tampil_budidaya();
						$this->load->view('admin/tabel/input/in_budidaya', $data);
					}
				} else {
					$data['status_insert']	=	"";
					$data['tbudi']	=	$this->Model_admin->tampil_budidaya();
					$this->load->view('admin/tabel/input/in_budidaya', $data);
				}
				break;

			case 'golongan':
				if (isset($_POST['submit'])) {
					$kd_gol	=	$this->input->post('kd_gol', true);
					$gol	=	$this->input->post('gol', true);

					$berhasil	=	$this->Model_admin->entry_golongan($kd_gol, $gol);

					if ($berhasil == 1) {
						$data['status_insert']	=	"Data Berhasil Di Simpan";
						$data['tgol']			=	$this->Model_admin->tampil_golongan();
						$this->load->view('admin/tabel/input/in_golongan', $data);
					} else {
						$data['status_insert']	=	"Data Gagal Di Simpan";
						$data['tgol']			=	$this->Model_admin->tampil_golongan();
						$this->load->view('admin/tabel/input/in_golongan', $data);
					}
				} else {
					$data['status_insert']	=	"";
					$data['tgol']	=	$this->Model_admin->tampil_golongan();
					$this->load->view('admin/tabel/input/in_golongan', $data);
				}
				break;

			case 'jabatan':
				if (isset($_POST['submit'])) {
					$jabatan	=	$this->input->post('jabatan', true);
					$nama	=	$this->input->post('nama', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_jabatan($jabatan, $nama, $stat_rec);

					if ($berhasil == 1) {
						$data['status_insert']	=	"Data Berhasil Di Simpan";
						$data['tjab']			=	$this->Model_admin->tampil_jabatan();
						$this->load->view('admin/tabel/input/in_jabatan', $data);
					} else {
						$data['status_insert']	=	"Data Gagal Di Simpan";
						$data['tjab']			=	$this->Model_admin->tampil_jabatan();
						$this->load->view('aadmin/tabel/input/in_jabatan', $data);
					}
				} else {
					$data['status_insert']	=	"";
					$data['tjab']	=	$this->Model_admin->tampil_jabatan();
					$this->load->view('admin/tabel/input/in_jabatan', $data);
				}
				break;

			case 'komoditi':
				if (isset($_POST['submit'])) {
					$kd_bud		=	$this->input->post('kd_bud', true);
					$kd_jnsprod	=	$this->input->post('kd_jnsprod', true);
					$nm_bud		=	$this->input->post('nm_bud', true);

					$berhasil	=	$this->Model_admin->entry_komoditi($kd_bud, $kd_jnsprod, $nm_bud);

					if ($berhasil == 1) {
						$data['status_insert']	=	"Data Berhasil Di Simpan";
						$data['tkom']			=	$this->Model_admin->tampil_komoditi();
						$this->load->view('admin/tabel/input/in_komoditi', $data);
					} else {
						$data['status_insert']	=	"Data Gagal Di Simpan";
						$data['tkom']			=	$this->Model_admin->tampil_komoditi();
						$this->load->view('admin/tabel/input/in_komoditi', $data);
					}
				} else {
					$data['status_insert']	=	"";
					$data['tkom']	=	$this->Model_admin->tampil_komoditi();
					$this->load->view('admin/tabel/input/in_komoditi', $data);
				}
				break;

			case 'pendidikan':
				if (isset($_POST['submit'])) {
					$kd_pend	=	$this->input->post('kd_pend', true);
					$nm_pend	=	$this->input->post('nm_pend', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_pendidikan($kd_pend, $nm_pend, $stat_rec);

					if ($berhasil == 1) {
						$data['status_insert']	=	"Data Berhasil Di Simpan";
						$data['tpend']			=	$this->Model_admin->tampil_pendidikan();
						$this->load->view('admin/tabel/input/in_pendidikan', $data);
					} else {
						$data['status_insert']	=	"Data Gagal Di Simpan";
						$data['tpend']			=	$this->Model_admin->tampil_pendidikan();
						$this->load->view('admin/tabel/input/in_pendidikan', $data);
					}
				} else {
					$data['status_insert']	=	"";
					$data['tpend']	=	$this->Model_admin->tampil_pendidikan();
					$this->load->view('admin/tabel/input/in_pendidikan', $data);
				}
				break;

			case 'sipil':
				if (isset($_POST['submit'])) {
					$kd_sipil	=	$this->input->post('kd_sipil', true);
					$nm_sipil	=	$this->input->post('nm_sipil', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sipil($kd_sipil, $nm_sipil, $stat_rec);

					if ($berhasil == 1) {
						$data['status_insert']	=	"Data Berhasil Di Simpan";
						$data['tsip']			=	$this->Model_admin->tampil_sipil();
						$this->load->view('admin/tabel/input/in_sipil', $data);
					} else {
						$data['status_insert']	=	"Data Gagal Di Simpan";
						$data['tsip']			=	$this->Model_admin->tampil_sipil();
						$this->load->view('aadmin/tabel/input/in_sipil', $data);
					}
				} else {
					$data['status_insert']	=	"";
					$data['tsip']	=	$this->Model_admin->tampil_sipil();
					$this->load->view('admin/tabel/input/in_sipil', $data);
				}
				break;

			case 'tingkatpendidikan':
				if (isset($_POST['submit'])) {
					$kd_tkpend	=	$this->input->post('kd_tkpend', true);
					$nm_tkpend	=	$this->input->post('nm_tkpend', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_tkpend($kd_tkpend, $nm_tkpend, $stat_rec);

					if ($berhasil == 1) {
						$data['status_insert']	=	"Data Berhasil Di Simpan";
						$data['tkpend']			=	$this->Model_admin->tampil_tkpend();
						$this->load->view('admin/tabel/input/in_tkpendidikan', $data);
					} else {
						$data['status_insert']	=	"Data Gagal Di Simpan";
						$data['tkpend']			=	$this->Model_admin->tampil_tkpend();
						$this->load->view('admin/tabel/input/in_tkpendidikan', $data);
					}
				} else {
					$data['status_insert']	=	"";
					$data['tkpend']	=	$this->Model_admin->tampil_tkpend();
					$this->load->view('admin/tabel/input/in_tkpendidikan', $data);
				}
				break;

			case 'unit':
				if (isset($_POST['submit'])) {
					$kd_kebun	=	$this->input->post('kd_kebun', true);
					$nm_unit	=	$this->input->post('nm_unit', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_unit($kd_kebun, $nm_unit, $stat_rec);

					if ($berhasil == 1) {
						$data['status_insert']	=	"Data Berhasil Di Simpan";
						$data['tunit']			=	$this->Model_admin->tampil_unit();
						$this->load->view('admin/tabel/input/in_unit', $data);
					} else {
						$data['status_insert']	=	"Data Gagal Di Simpan";
						$data['tunit']			=	$this->Model_admin->tampil_unit();
						$this->load->view('admin/tabel/input/in_unit', $data);
					}
				} else {
					$data['status_insert']	=	"";
					$data['tunit']	=	$this->Model_admin->tampil_unit();
					$this->load->view('admin/tabel/input/in_unit', $data);
				}
				break;
		}
	}

	//============================================  INPUT TABEL REKAP  =============================================
	//============================================  INPUT TABEL REKAP  =============================================
	//============================================  INPUT TABEL REKAP  =============================================
	//============================================  INPUT TABEL REKAP  =============================================

	public function inpt_rekap()
	{
		if (isset($_POST['submit'])) {
			$no				=	$this->input->post('no', true);
			$nik			=	$this->input->post('nik', true);
			$nama			=	$this->input->post('nama', true);
			$jabatan		=	$this->input->post('jabatan', true);
			$golongan		=	$this->input->post('golongan', true);
			$jenis			=	$this->input->post("jenis", true);
			$sanksi			=	$this->input->post("sanksi", true);
			$kasus_kebun	=	$this->input->post("kasus_kebun", true);
			$no_surat		=	$this->input->post("no_surat", true);
			$tgl_surat		=	$this->input->post("tgl_surat", true);
			$masa_berlaku	=	$this->input->post("masa_berlaku", true);
			$no_pers		=	$this->input->post("no_pers", true);

			$berhasil	=	$this->Model_admin->entry_rekap(
				$no,
				$nik,
				$nama,
				$jabatan,
				$golongan,
				$jenis,
				$sanksi,
				$kasus_kebun,
				$no_surat,
				$tgl_surat,
				$masa_berlaku,
				$no_pers
			);

			if ($berhasil == 1) {
				$data['status_insert']	=	"Data Berhasil Di Simpan";
				$data['tbrekap']			=	$this->Model_admin->tampil_rekap();
				$this->load->view('admin/in_rekap', $data);
			} else {
				$data['status_insert']	=	"Data Gagal Di Simpan";
				$data['tbrekap']			=	$this->Model_admin->tampil_rekap();
				$this->load->view('admin/in_rekap', $data);
			}
		} else {
			$data['status_insert']	=	"";
			$data['tbrekap']	=	$this->Model_admin->tampil_rekap();
			$this->load->view('admin/in_rekap', $data);
		}
	}



	//======================================== MEMANGGIL TABEL SDM ===========================================
	//======================================== MEMANGGIL TABEL SDM ===========================================
	//======================================== MEMANGGIL TABEL SDM ===========================================
	//======================================== MEMANGGIL TABEL SDM ===========================================

	


	public function tabel_sdm()
	{
		$page = $this->uri->segment(3);

		switch ($page) {
			case 'in_sdm01':
				
				$data['tsdm01']	 =	$this->Model_admin->tampil_sdm01();
				$this->load->view('admin/sdm/sdm01', $data);
				break;

			case 'in_sdm02':
				if	(isset($_POST['cari'])){
					$npp = $this->input->post('npp_cari');
					$data['cari'] = $this->Model_admin->cari_sdm02($npp);
				}
				if (isset($_POST['submit'])) {
					$npp	  	  	=		$this->input->post('npp', true);
					$no_urut	  	=		$this->input->post('no_urut', true);
					$nama	  	  	=		$this->input->post('nama', true);
					$hbg_klg	  	=		$this->input->post('hbg_klg', true);
					$tgl_lhr	  	=		$this->input->post('tgl_lhr', true);
					$kota_lhr	  	=		$this->input->post('kota_lhr', true);
					$ngr_lhr	  	=		$this->input->post('ngr_lhr', true);
					$kelamin	  	=		$this->input->post('kelamin', true);
					$gol_darah  	=		$this->input->post('gol_darah', true);
					$agama		  	=		$this->input->post('agama', true);
					$tk_ped		  	=		$this->input->post('tk_ped', true);
					$st_sipil	  	=		$this->input->post('st_sipil', true);
					$st_kerja	  	=		$this->input->post('st_kerja', true);
					$tgl_nkh	  	=		$this->input->post('tgl_nkh', true);
					$tgl_cerai  	=		$this->input->post('tgl_cerai', true);
					$tgl_mgl	  	=		$this->input->post('tgl_mgl', true);
					$alamat		  	=		$this->input->post('alamat', true);
					$no_kk		  	=		$this->input->post('no_kk', true);
					$nik		    =		$this->input->post('nik', true);
					$no_bpjs	  	=		$this->input->post('no_bpjs', true);
					$bln_proses		=		$this->input->post('bln_proses', true);
					$stat_rec 		=		$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sdm02(
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
						$tk_ped,
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

						$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm02		= 	$this->input->post('id_sdm02', true);
					$npp				=		$this->input->post('npp', true);
					$no_urut		=		$this->input->post('no_urut', true);
					$nama				=		$this->input->post('nama', true);
					$hbg_klg		=		$this->input->post('hbg_klg', true);
					$tgl_lhr		=		$this->input->post('tgl_lhr', true);
					$kota_lhr		=		$this->input->post('kota_lhr', true);
					$ngr_lhr		=		$this->input->post('ngr_lhr', true);
					$kelamin		=		$this->input->post('kelamin', true);
					$gol_darah	=		$this->input->post('gol_darah', true);
					$agama			=		$this->input->post('agama', true);
					$tk_ped			=		$this->input->post('tk_ped', true);
					$st_sipil		=		$this->input->post('st_sipil', true);
					$st_kerja		=		$this->input->post('st_kerja', true);
					$tgl_nkh		=		$this->input->post('tgl_nkh', true);
					$tgl_cerai	=		$this->input->post('tgl_cerai', true);
					$tgl_mgl		=		$this->input->post('tgl_mgl', true);
					$alamat			=		$this->input->post('alamat', true);
					$no_kk			=		$this->input->post('no_kk', true);
					$nik				=		$this->input->post('nik', true);
					$no_bpjs		=		$this->input->post('no_bpjs', true);
					$bln_proses	=		$this->input->post('bln_proses', true);
					$stat_rec 	=		$this->input->post('stat_rec', true);

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
						$tk_ped,
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

			case 'in_sdm03':
				if (isset($_POST['submit'])) {
					$npp				=		$this->input->post('npp', true);
					$no_urut		=		$this->input->post('no_urut', true);
					$tk_pend		=		$this->input->post('tk_pend', true);
					$kd_pend		=		$this->input->post('kd_pend', true);
					$nama				=		$this->input->post('nama', true);
					$kota				=		$this->input->post('kota', true);
					$st_akred		=		$this->input->post('st_akred', true);
					$dnln				=		$this->input->post('dnln', true);
					$thn_awal		=		$this->input->post('thn_awal', true);
					$thn_akhir	=		$this->input->post('thn_akhir', true);
					$st_lulus		=		$this->input->post('st_lulus', true);
					$no_ijasah	=		$this->input->post('no_ijasah', true);
					$tgl_ijasah	=		$this->input->post('tgl_ijasah', true);
					$nilai			=		$this->input->post('nilai', true);
					$grade			=		$this->input->post('grade', true);
					$ket				=		$this->input->post('ket', true);
					$bln_proses	=		$this->input->post('bln_proses', true);
					$stat_rec		=		$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sdm03(
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

						$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm03		=		$this->input->post('id_sdm03', true);
					$npp				=		$this->input->post('npp', true);
					$no_urut		=		$this->input->post('no_urut', true);
					$tk_pend		=		$this->input->post('tk_pend', true);
					$kd_pend		=		$this->input->post('kd_pend', true);
					$nama				=		$this->input->post('nama', true);
					$kota				=		$this->input->post('kota', true);
					$st_akred		=		$this->input->post('st_akred', true);
					$dnln				=		$this->input->post('dnln', true);
					$thn_awal		=		$this->input->post('thn_awal', true);
					$thn_akhir	=		$this->input->post('thn_akhir', true);
					$st_lulus		=		$this->input->post('st_lulus', true);
					$no_ijasah	=		$this->input->post('no_ijasah', true);
					$tgl_ijasah	=		$this->input->post('tgl_ijasah', true);
					$nilai			=		$this->input->post('nilai', true);
					$grade			=		$this->input->post('grade', true);
					$ket				=		$this->input->post('ket', true);
					$bln_proses	=		$this->input->post('bln_proses', true);
					$stat_rec		=		$this->input->post('stat_rec', true);

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
				$data['pend']			=	$this->Model_admin->show_pend();
				$data['tsdm03']			=	$this->Model_admin->tampil_sdm03();
				$this->load->view('admin/sdm/sdm03', $data);

				break;

			case 'in_sdm04':
				if (isset($_POST['submit'])) {
					$npp				=		$this->input->post('npp', true);
					$no_urut		=		$this->input->post('no_urut', true);
					$kd_pend		=		$this->input->post('kd_pend', true);
					$nama				=		$this->input->post('nama', true);
					$ket				=		$this->input->post('ket', true);
					$dnln				=		$this->input->post('dnln', true);
					$tgl_awal		=		$this->input->post('tgl_awal', true);
					$tgl_akhir	=		$this->input->post('tgl_akhir', true);
					$no_sert		=		$this->input->post('no_sert', true);
					$tgl_sert		=		$this->input->post('tgl_sert', true);
					$nilai			=		$this->input->post('nilai', true);
					$grade			=		$this->input->post('grade', true);
					$bln_proses	=		$this->input->post('bln_proses', true);
					$stat_rec		=		$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sdm04(
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

						$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm04 	= 	$this->input->post('id_sdm04', true);
					$npp				=		$this->input->post('npp', true);
					$no_urut		=		$this->input->post('no_urut', true);
					$kd_pend		=		$this->input->post('kd_pend', true);
					$nama				=		$this->input->post('nama', true);
					$ket				=		$this->input->post('ket', true);
					$dnln				=		$this->input->post('dnln', true);
					$tgl_awal		=		$this->input->post('tgl_awal', true);
					$tgl_akhir	=		$this->input->post('tgl_akhir', true);
					$no_sert		=		$this->input->post('no_sert', true);
					$tgl_sert		=		$this->input->post('tgl_sert', true);
					$nilai			=		$this->input->post('nilai', true);
					$grade			=		$this->input->post('grade', true);
					$bln_proses	=		$this->input->post('bln_proses', true);
					$stat_rec		=		$this->input->post('stat_rec', true);

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
				$data['tsdm04']			=	$this->Model_admin->tampil_sdm04();
				$this->load->view('admin/sdm/sdm04', $data);

				break;

			case 'in_sdm05':
				if (isset($_POST['submit'])) {
					$npp				=		$this->input->post('npp', true);
					$no_urut		=		$this->input->post('no_urut', true);
					$thn_awal		=		$this->input->post('thn_awal', true);
					$thn_akhir	=		$this->input->post('thn_akhir', true);
					$nama				=		$this->input->post('nama', true);
					$jabatan		=		$this->input->post('jabatan', true);
					$nm_jbt			=		$this->input->post('nm_jbt', true);
					$no_sk			=		$this->input->post('no_sk', true);
					$tgl_sk			=		$this->input->post('tgl_sk', true);
					$bln_proses	=		$this->input->post('bln_proses', true);
					$stat_rec		=		$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sdm05(
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

						$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm05		=		$this->input->post('id_sdm05', true);
					$npp				=		$this->input->post('npp', true);
					$no_urut		=		$this->input->post('no_urut', true);
					$thn_awal		=		$this->input->post('thn_awal', true);
					$thn_akhir	=		$this->input->post('thn_akhir', true);
					$nama				=		$this->input->post('nama', true);
					$jabatan		=		$this->input->post('jabatan', true);
					$nm_jbt			=		$this->input->post('nm_jbt', true);
					$no_sk			=		$this->input->post('no_sk', true);
					$tgl_sk			=		$this->input->post('tgl_sk', true);
					$bln_proses	=		$this->input->post('bln_proses', true);
					$stat_rec		=		$this->input->post('stat_rec', true);

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

			case 'in_sdm06':
				if (isset($_POST['submit'])) {
					$npp				=		$this->input->post('npp', true);
					$no_urut		=		$this->input->post('no_urut', true);
					$st_peg			=		$this->input->post('st_peg', true);
					$tmt				=		$this->input->post('tmt', true);
					$no_sk			=		$this->input->post('no_sk', true);
					$tgl_sk			=		$this->input->post('tgl_sk', true);
					$npp_jbt		=		$this->input->post('npp_jbt', true);
					$bln_proses	=		$this->input->post('bln_proses', true);
					$stat_rec		=		$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sdm06(
						$npp,
						$no_urut,
						$st_peg,
						$tmt,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm06		=		$this->input->post('id_sdm06', true);
					$npp				=		$this->input->post('npp', true);
					$no_urut		=		$this->input->post('no_urut', true);
					$st_peg			=		$this->input->post('st_peg', true);
					$tmt				=		$this->input->post('tmt', true);
					$no_sk			=		$this->input->post('no_sk', true);
					$tgl_sk			=		$this->input->post('tgl_sk', true);
					$npp_jbt		=		$this->input->post('npp_jbt', true);
					$bln_proses	=		$this->input->post('bln_proses', true);
					$stat_rec		=		$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->edit_sdm06(
						$id_sdm06,
						$npp,
						$no_urut,
						$st_peg,
						$tmt,
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
				$data['tsdm06']			=	$this->Model_admin->tampil_sdm06();
				$this->load->view('admin/sdm/sdm06', $data);

				break;

			case 'in_sdm07':
				if (isset($_POST['submit'])) {
					$npp				=		$this->input->post('npp', true);
					$no_urut		=		$this->input->post('no_urut', true);
					$st_peg			=		$this->input->post('st_peg', true);
					$tmt				=		$this->input->post('tmt', true);
					$no_sk			=		$this->input->post('no_sk', true);
					$tgl_sk			=		$this->input->post('tgl_sk', true);
					$tgl_akhir	=		$this->input->post('tgl_akhir', true);
					$npp_jbt		=		$this->input->post('npp_jbt', true);
					$bln_proses	=		$this->input->post('bln_proses', true);
					$stat_rec		=		$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sdm07(
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

						$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm07		=		$this->input->post('id_sdm07', true);
					$npp				=		$this->input->post('npp', true);
					$no_urut		=		$this->input->post('no_urut', true);
					$st_peg			=		$this->input->post('st_peg', true);
					$tmt				=		$this->input->post('tmt', true);
					$no_sk			=		$this->input->post('no_sk', true);
					$tgl_sk			=		$this->input->post('tgl_sk', true);
					$tgl_akhir	=		$this->input->post('tgl_akhir', true);
					$npp_jbt		=		$this->input->post('npp_jbt', true);
					$bln_proses	=		$this->input->post('bln_proses', true);
					$stat_rec		=		$this->input->post('stat_rec', true);

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

			case 'in_sdm08':
				if (isset($_POST['submit'])) {
					$npp			=		$this->input->post('npp', true);
					$no_urut		=		$this->input->post('no_urut', true);
					$kd_mutasi		=		$this->input->post('kd_mutasi', true);
					$kd_unit		=		$this->input->post('kd_unit', true);
					$kd_adf			=		$this->input->post('kd_adf', true);
					$kd_bud			=		$this->input->post('kd_bud', true);
					$jabatan		=		$this->input->post('jabatan', true);
					$tmt			=		$this->input->post('tmt', true);
					$no_sk			=		$this->input->post('no_sk', true);
					$tgl_sk			=		$this->input->post('tgl_sk', true);
					$npp_jbt		=		$this->input->post('npp_jbt', true);
					$tinggal		=		$this->input->post('tinggal', true);
					$bln_proses		=		$this->input->post('bln_proses', true);
					$stat_rec		=		$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sdm08(
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

						$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm08		=		$this->input->post('id_sdm08', true);
					$npp			=		$this->input->post('npp', true);
					$no_urut		=		$this->input->post('no_urut', true);
					$kd_mutasi		=		$this->input->post('kd_mutasi', true);
					$kd_unit		=		$this->input->post('kd_unit', true);
					$kd_adf			=		$this->input->post('kd_adf', true);
					$kd_bud			=		$this->input->post('kd_bud', true);
					$jabatan		=		$this->input->post('jabatan', true);
					$tmt			=		$this->input->post('tmt', true);
					$no_sk			=		$this->input->post('no_sk', true);
					$tgl_sk			=		$this->input->post('tgl_sk', true);
					$npp_jbt		=		$this->input->post('npp_jbt', true);
					$tinggal		=		$this->input->post('tinggal', true);
					$bln_proses		=		$this->input->post('bln_proses', true);
					$stat_rec		=		$this->input->post('stat_rec', true);

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

			case 'in_sdm09':
				if (isset($_POST['submit'])) {
					$npp			=		$this->input->post('npp', true);
					$no_urut		=		$this->input->post('no_urut', true);
					$kd_unit		=		$this->input->post('kd_unit', true);
					$jabatan		=		$this->input->post('jabatan', true);
					$tmt			=		$this->input->post('tmt', true);
					$no_sk			=		$this->input->post('no_sk', true);
					$tgl_sk			=		$this->input->post('tgl_sk', true);
					$lama_jab		=		$this->input->post('lama_jab', true);
					$tgl_akhir		=		$this->input->post('tgl_akhir', true);
					$npp_jbt		=		$this->input->post('npp_jbt', true);
					$bln_proses		=		$this->input->post('bln_proses', true);
					$stat_rec		=		$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sdm09(
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

						$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm09		=		$this->input->post('id_sdm09', true);
					$npp			=		$this->input->post('npp', true);
					$no_urut		=		$this->input->post('no_urut', true);
					$kd_unit		=		$this->input->post('kd_unit', true);
					$jabatan		=		$this->input->post('jabatan', true);
					$tmt			=		$this->input->post('tmt', true);
					$no_sk			=		$this->input->post('no_sk', true);
					$tgl_sk			=		$this->input->post('tgl_sk', true);
					$lama_jab		=		$this->input->post('lama_jab', true);
					$tgl_akhir		=		$this->input->post('tgl_akhir', true);
					$npp_jbt		=		$this->input->post('npp_jbt', true);
					$bln_proses		=		$this->input->post('bln_proses', true);
					$stat_rec		=		$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->edit_sdm09(
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

			case 'in_sdm10':
				if (isset($_POST['submit'])) {
					$npp		=	$this->input->post('npp', true);
					$no_urut	=	$this->input->post('no_urut', true);
					$kd_inst	=	$this->input->post('kd_inst', true);
					$jabatan	=	$this->input->post('jabatan', true);
					$tmt		=	$this->input->post('tmt', true);
					$lama_jab	=	$this->input->post('lama_jab', true);
					$no_sk		=	$this->input->post('no_sk', true);
					$tgl_sk		=	$this->input->post('tgl_sk', true);
					$tgl_akhir	=	$this->input->post('tgl_akhir', true);
					$npp_jbt	=	$this->input->post('npp_jbt', true);
					$bln_proses	=	$this->input->post('bln_proses', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sdm10(
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

						$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm10	=	$this->input->post('id_sdm10', true);
					$npp		=	$this->input->post('npp', true);
					$no_urut	=	$this->input->post('no_urut', true);
					$kd_inst	=	$this->input->post('kd_inst', true);
					$jabatan	=	$this->input->post('jabatan', true);
					$tmt		=	$this->input->post('tmt', true);
					$lama_jab	=	$this->input->post('lama_jab', true);
					$no_sk		=	$this->input->post('no_sk', true);
					$tgl_sk		=	$this->input->post('tgl_sk', true);
					$tgl_akhir	=	$this->input->post('tgl_akhir', true);
					$npp_jbt	=	$this->input->post('npp_jbt', true);
					$bln_proses	=	$this->input->post('bln_proses', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

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

			case 'in_sdm11':
				if (isset($_POST['submit'])) {
					$npp		=	$this->input->post('npp', true);
					$no_urut	=	$this->input->post('no_urut', true);
					$nm_satgas	=	$this->input->post('nm_satgas', true);
					$jabatan	=	$this->input->post('jabatan', true);
					$tmt		=	$this->input->post('tmt', true);
					$no_sk		=	$this->input->post('no_sk', true);
					$tgl_sk		=	$this->input->post('tgl_sk', true);
					$tgl_akhir	=	$this->input->post('tgl_akhir', true);
					$npp_jbt	=	$this->input->post('npp_jbt', true);
					$bln_proses	=	$this->input->post('bln_proses', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sdm11(
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

						$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm11	=	$this->input->post('id_sdm11', true);
					$npp		=	$this->input->post('npp', true);
					$no_urut	=	$this->input->post('no_urut', true);
					$nm_satgas	=	$this->input->post('nm_satgas', true);
					$jabatan	=	$this->input->post('jabatan', true);
					$tmt		=	$this->input->post('tmt', true);
					$no_sk		=	$this->input->post('no_sk', true);
					$tgl_sk		=	$this->input->post('tgl_sk', true);
					$tgl_akhir	=	$this->input->post('tgl_akhir', true);
					$npp_jbt	=	$this->input->post('npp_jbt', true);
					$bln_proses	=	$this->input->post('bln_proses', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

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

			case 'in_sdm12':
				if (isset($_POST['submit'])) {
					$npp		=	$this->input->post('npp', true);
					$no_urut	=	$this->input->post('no_urut', true);
					$tmt		=	$this->input->post('tmt', true);
					$nilai_krd	=	$this->input->post('nilai_krd', true);
					$no_sk		=	$this->input->post('no_sk', true);
					$tgl_sk		=	$this->input->post('tgl_sk', true);
					$npp_jbt	=	$this->input->post('npp_jbt', true);
					$bln_proses	=	$this->input->post('bln_proses', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sdm12(
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

						$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm12	=	$this->input->post('id_sdm12', true);
					$npp		=	$this->input->post('npp', true);
					$no_urut	=	$this->input->post('no_urut', true);
					$tmt		=	$this->input->post('tmt', true);
					$nilai_krd	=	$this->input->post('nilai_krd', true);
					$no_sk		=	$this->input->post('no_sk', true);
					$tgl_sk		=	$this->input->post('tgl_sk', true);
					$npp_jbt	=	$this->input->post('npp_jbt', true);
					$bln_proses	=	$this->input->post('bln_proses', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

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

			case 'in_sdm13':
				if (isset($_POST['submit'])) {
					$npp		=	$this->input->post('npp', true);
					$no_urut	=	$this->input->post('no_urut', true);
					$jns_harga	=	$this->input->post('jns_harga', true);
					$uraian		=	$this->input->post('uraian', true);
					$tgl_harga	=	$this->input->post('tgl_harga', true);
					$no_sk		=	$this->input->post('no_sk', true);
					$tgl_sk		=	$this->input->post('tgl_sk', true);
					$npp_jbt	=	$this->input->post('npp_jbt', true);
					$bln_proses	=	$this->input->post('bln_proses', true);
					$stat_rec 	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sdm13(
						$npp,
						$no_urut,
						$jns_harga,
						$uraian,
						$tgl_harga,
						$no_sk,
						$no_sk,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm13	=	$this->input->post('id_sdm13', true);
					$npp		=	$this->input->post('npp', true);
					$no_urut	=	$this->input->post('no_urut', true);
					$jns_harga	=	$this->input->post('jns_harga', true);
					$uraian		=	$this->input->post('uraian', true);
					$tgl_harga	=	$this->input->post('tgl_harga', true);
					$no_sk		=	$this->input->post('no_sk', true);
					$tgl_sk		=	$this->input->post('tgl_sk', true);
					$npp_jbt	=	$this->input->post('npp_jbt', true);
					$bln_proses	=	$this->input->post('bln_proses', true);
					$stat_rec 	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->edit_sdm13(
						$id_sdm13,
						$npp,
						$no_urut,
						$jns_harga,
						$uraian,
						$tgl_harga,
						$no_sk,
						$no_sk,
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

			case 'in_sdm14':
				if (isset($_POST['submit'])) {
					$npp		=	$this->input->post('npp', true);
					$no_urut	=	$this->input->post('no_urut', true);
					$tgl_lgr	=	$this->input->post('tgl_lgr', true);
					$jns_lgr	=	$this->input->post('jns_lgr', true);
					$uraian		=	$this->input->post('uraian', true);
					$jns_hukum	=	$this->input->post('jns_hukum', true);
					$tmt		=	$this->input->post('tmt', true);
					$no_sk		=	$this->input->post('no_sk', true);
					$tgl_sk		=	$this->input->post('tgl_sk', true);
					$npp_jbt	=	$this->input->post('npp_jbt', true);
					$bln_proses	=	$this->input->post('bln_proses', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sdm14(
						$npp,
						$no_urut,
						$tgl_lgr,
						$jns_lgr,
						$uraian,
						$jns_hukum,
						$tmt,
						$no_sk,
						$tgl_sk,
						$npp_jbt,
						$bln_proses,
						$stat_rec
					);

					if ($berhasil == 1) {

						$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm14	=	$this->input->post('id_sdm14', true);
					$npp		=	$this->input->post('npp', true);
					$no_urut	=	$this->input->post('no_urut', true);
					$tgl_lgr	=	$this->input->post('tgl_lgr', true);
					$jns_lgr	=	$this->input->post('jns_lgr', true);
					$uraian		=	$this->input->post('uraian', true);
					$jns_hukum	=	$this->input->post('jns_hukum', true);
					$tmt		=	$this->input->post('tmt', true);
					$no_sk		=	$this->input->post('no_sk', true);
					$tgl_sk		=	$this->input->post('tgl_sk', true);
					$npp_jbt	=	$this->input->post('npp_jbt', true);
					$bln_proses	=	$this->input->post('bln_proses', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->edit_sdm14(
						$id_sdm14,
						$npp,
						$no_urut,
						$tgl_lgr,
						$jns_lgr,
						$uraian,
						$jns_hukum,
						$tmt,
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
				$data['tsdm14']			=	$this->Model_admin->tampil_sdm14();
				$this->load->view('admin/sdm/sdm14', $data);

				break;

			case 'in_sdm15':
				if (isset($_POST['submit'])) {
					$npp		=	$this->input->post('npp', true);
					$no_urut	=	$this->input->post('no_urut', true);
					$jns_cuti	=	$this->input->post('jns_cuti', true);
					$tmt		=	$this->input->post('tmt', true);
					$lama_cuti	=	$this->input->post('lama_cuti', true);
					$thn_angg	=	$this->input->post('thn_angg', true);
					$no_sk		=	$this->input->post('no_sk', true);
					$tgl_sk		=	$this->input->post('tgl_sk', true);
					$npp_jbt	=	$this->input->post('npp_jbt', true);
					$bln_proses	=	$this->input->post('bln_proses', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sdm15(
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

						$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm15	=	$this->input->post('id_sdm15', true);
					$npp		=	$this->input->post('npp', true);
					$no_urut	=	$this->input->post('no_urut', true);
					$jns_cuti	=	$this->input->post('jns_cuti', true);
					$tmt		=	$this->input->post('tmt', true);
					$lama_cuti	=	$this->input->post('lama_cuti', true);
					$thn_angg	=	$this->input->post('thn_angg', true);
					$no_sk		=	$this->input->post('no_sk', true);
					$tgl_sk		=	$this->input->post('tgl_sk', true);
					$npp_jbt	=	$this->input->post('npp_jbt', true);
					$bln_proses	=	$this->input->post('bln_proses', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

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

			case 'in_sdm16':
				if (isset($_POST['submit'])) {
					$npp		=	$this->input->post('npp', true);
					$no_urut	=	$this->input->post('no_urut', true);
					$st_peg		=	$this->input->post('st_peg', true);
					$golongan	=	$this->input->post('golongan', true);
					$mk			=	$this->input->post('mk', true);
					$tmt		=	$this->input->post('tmt', true);
					$jns_naik	=	$this->input->post('jns_naik', true);
					$no_sk		=	$this->input->post('no_sk', true);
					$tgl_sk		=	$this->input->post('tgl_sk', true);
					$npp_jbt	=	$this->input->post('npp_jbt', true);
					$bln_proses	=	$this->input->post('bln_proses', true);
					$kd_kelas	=	$this->input->post('kd_kelas', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

					$berhasil	=	$this->Model_admin->entry_sdm16(
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

						$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
					} else {
						$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
					}
				}

				if (isset($_POST['edit'])) {
					$id_sdm16	=	$this->input->post('id_sdm16', true);
					$npp		=	$this->input->post('npp', true);
					$no_urut	=	$this->input->post('no_urut', true);
					$st_peg		=	$this->input->post('st_peg', true);
					$golongan	=	$this->input->post('golongan', true);
					$mk			=	$this->input->post('mk', true);
					$tmt		=	$this->input->post('tmt', true);
					$jns_naik	=	$this->input->post('jns_naik', true);
					$no_sk		=	$this->input->post('no_sk', true);
					$tgl_sk		=	$this->input->post('tgl_sk', true);
					$npp_jbt	=	$this->input->post('npp_jbt', true);
					$bln_proses	=	$this->input->post('bln_proses', true);
					$kd_kelas	=	$this->input->post('kd_kelas', true);
					$stat_rec	=	$this->input->post('stat_rec', true);

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
		}
	}

	//=================================== MEMANGGIL TABEL CAMPUR  =========================================
	//=================================== MEMANGGIL TABEL CAMPUR  =========================================
	//=================================== MEMANGGIL TABEL CAMPUR  =========================================
	//=================================== MEMANGGIL TABEL CAMPUR  =========================================


	public function tabel()
	{
		$page = $this->uri->segment(3);

		switch ($page) {
			case 'in_agama':
				$data['tagama']			=	$this->Model_admin->tampil_agama();
				$this->load->view('admin/tabel/agama', $data);

				break;

			case 'in_akreditasi':
				$data['takred']			=	$this->Model_admin->tampil_akred();
				$this->load->view('admin/tabel/akreditasi', $data);

				break;

			case 'in_budidaya':
				$data['tbudi']			=	$this->Model_admin->tampil_budidaya();
				$this->load->view('admin/tabel/budidaya', $data);

				break;

			case 'in_golongan':
				$data['tgol']			=	$this->Model_admin->tampil_golongan();
				$this->load->view('admin/tabel/golongan', $data);

				break;

			case 'in_jabatan':
				$data['tjab']			=	$this->Model_admin->tampil_jabatan();
				$this->load->view('admin/tabel/jabatan', $data);

				break;

			case 'in_komoditi':
				$data['tkom']			=	$this->Model_admin->tampil_komoditi();
				$this->load->view('admin/tabel/komoditi', $data);

				break;

			case 'in_pendidikan':
				$data['tpend']			=	$this->Model_admin->tampil_pendidikan();
				$this->load->view('admin/tabel/pendidikan', $data);

				break;

			case 'in_sipil':
				$data['tsip']			=	$this->Model_admin->tampil_sipil();
				$this->load->view('admin/tabel/sipil', $data);

				break;

			case 'in_tkpendidikan':
				$data['tkpend']			=	$this->Model_admin->tampil_tkpend();
				$this->load->view('admin/tabel/tingkatpendidikan', $data);

				break;

			case 'in_unit':
				$data['tunit']			=	$this->Model_admin->tampil_unit();
				$this->load->view('admin/tabel/unit', $data);

				break;

		}
	}

	//======================================= MEMANGGIL TABEL CAMPUR  ============================================
	//======================================= MEMANGGIL TABEL CAMPUR  ============================================
	//======================================= MEMANGGIL TABEL CAMPUR  ============================================
	//======================================= MEMANGGIL TABEL CAMPUR  ============================================

	public function tbl_rekap()
	{
		$data['tbrekap']	=	$this->Model_admin->tampil_rekap();
		$this->load->view('admin/RekapPeringatan', $data);
	}

	public function tabel_a1()
	{
		$data['ta1']			=	$this->Model_admin->tampil_a1();
		$this->load->view('admin/t_a1', $data);
	}


	//============================================  KEMBALI TABEL SDM ================================================
	//============================================  KEMBALI TABEL SDM ================================================
	//============================================  KEMBALI TABEL SDM ================================================
	//============================================  KEMBALI TABEL SDM ================================================


	public function kembali()
	{
		$page = $this->uri->segment(3);

		switch ($page) {
			case 'out_sdm01':
				$data['tsdm01']			=	$this->Model_admin->tampil_sdm01();
				$this->load->view('admin/sdm/sdm01', $data);

				break;

			case 'out_sdm02':
				$data['tsdm02']			=	$this->Model_admin->tampil_sdm02();
				$this->load->view('admin/sdm/sdm02', $data);

				break;

			case 'out_sdm03':
				$data['tsdm03']			=	$this->Model_admin->tampil_sdm03();
				$this->load->view('admin/sdm/sdm03', $data);

				break;

			case 'out_sdm04':
				$data['tsdm04']			=	$this->Model_admin->tampil_sdm04();
				$this->load->view('admin/sdm/sdm04', $data);

				break;

			case 'out_sdm05':
				$data['tsdm05']			=	$this->Model_admin->tampil_sdm05();
				$this->load->view('admin/sdm/sdm05', $data);

				break;

			case 'out_sdm06':
				$data['tsdm06']			=	$this->Model_admin->tampil_sdm06();
				$this->load->view('admin/sdm/sdm06', $data);

				break;

			case 'out_sdm07':
				$data['tsdm07']			=	$this->Model_admin->tampil_sdm07();
				$this->load->view('admin/sdm/sdm07', $data);

				break;

			case 'out_sdm08':
				$data['tsdm08']			=	$this->Model_admin->tampil_sdm08();
				$this->load->view('admin/sdm/sdm08', $data);

				break;

			case 'out_sdm09':
				$data['tsdm09']			=	$this->Model_admin->tampil_sdm09();
				$this->load->view('admin/sdm/sdm09', $data);

				break;

			case 'out_sdm10':
				$data['tsdm10']			=	$this->Model_admin->tampil_sdm10();
				$this->load->view('admin/sdm/sdm10', $data);

				break;

			case 'out_sdm11':
				$data['tsdm11']			=	$this->Model_admin->tampil_sdm11();
				$this->load->view('admin/sdm/sdm11', $data);

				break;

			case 'out_sdm12':
				$data['tsdm12']			=	$this->Model_admin->tampil_sdm12();
				$this->load->view('admin/sdm/sdm12', $data);

				break;

			case 'out_sdm13':
				$data['tsdm13']			=	$this->Model_admin->tampil_sdm13();
				$this->load->view('admin/sdm/sdm13', $data);

				break;

			case 'out_sdm14':
				$data['tsdm14']			=	$this->Model_admin->tampil_sdm14();
				$this->load->view('admin/sdm/sdm14', $data);

				break;

			case 'out_sdm15':
				$data['tsdm15']			=	$this->Model_admin->tampil_sdm15();
				$this->load->view('admin/sdm/sdm15', $data);

				break;

			case 'out_sdm16':
				$data['tsdm16']			=	$this->Model_admin->tampil_sdm16();
				$this->load->view('admin/sdm/sdm16', $data);

				break;
		}
	}

	//=========================================  KEMBALI TABEL CAMPUR ================================================
	//=========================================  KEMBALI TABEL CAMPUR ================================================
	//=========================================  KEMBALI TABEL CAMPUR ================================================
	//=========================================  KEMBALI TABEL CAMPUR ================================================


	public function kembali_tabel()
	{
		$page = $this->uri->segment(3);

		switch ($page) {
			case 'out_agama':
				$data['tagama']			=	$this->Model_admin->tampil_agama();
				$this->load->view('admin/tabel/agama', $data);

				break;

			case 'out_akreditasi':
				$data['takred']			=	$this->Model_admin->tampil_akred();
				$this->load->view('admin/tabel/akreditasi', $data);

				break;

			case 'out_budidaya':
				$data['tbudi']			=	$this->Model_admin->tampil_budidaya();
				$this->load->view('admin/tabel/budidaya', $data);

				break;

			case 'out_golongan':
				$data['tgol']			=	$this->Model_admin->tampil_golongan();
				$this->load->view('admin/tabel/golongan', $data);

				break;

			case 'out_jabatan':
				$data['tjab']			=	$this->Model_admin->tampil_jabatan();
				$this->load->view('admin/tabel/jabatan', $data);

				break;

			case 'out_komoditi':
				$data['tkom']			=	$this->Model_admin->tampil_komoditi();
				$this->load->view('admin/tabel/komoditi', $data);

				break;

			case 'out_pendidikan':
				$data['tpend']			=	$this->Model_admin->tampil_pendidikan();
				$this->load->view('admin/tabel/pendidikan', $data);

				break;

			case 'out_sipil':
				$data['tsip']			=	$this->Model_admin->tampil_sipil();
				$this->load->view('admin/tabel/sipil', $data);

				break;

			case 'out_tingkatpendidikan':
				$data['tkpend']			=	$this->Model_admin->tampil_tkpend();
				$this->load->view('admin/tabel/tingkatpendidikan', $data);

				break;

			case 'out_unit':
				$data['tunit']			=	$this->Model_admin->tampil_unit();
				$this->load->view('admin/tabel/unit', $data);

				break;
		}
	}


	public function kembali_rekap()
	{
		$data['tbrekap']	=	$this->Model_admin->tampil_rekap();
		$this->load->view('admin/RekapPeringatan', $data);
	}

	//================== Delet file all table ======================//
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
	
	public function get_npp()
	{
		$npp  = $this->input->post('npp');
		$data = $this->Model_admin->get_data_bynpp($npp);
		echo json_encode($data);
	}

	public function add_sdm01()
	{
		$npp			=	$this->input->post('npp');
		$nama			=	$this->input->post('nama');
		$nm_pgl			=	$this->input->post('nm_pgl');
		$glr_dpn		=	$this->input->post('glr_dpn');
		$glr_blk		=	$this->input->post('glr_blk');
		$kota_lhr		=	$this->input->post('kota_lhr');
		$prov_lhr		=	$this->input->post('prov_lhr');
		$ngr_lhr		=	$this->input->post('ngr_lhr');
		$tgl_lhr		=	$this->input->post('tgl_lhr');
		$j_kelamin		=	$this->input->post('j_kelamin');
		$gol_darah		=	$this->input->post('gol_darah');
		$agama			=	$this->input->post('agama');
		$tgl_masuk		=	$this->input->post('tgl_masuk');
		$st_sipil		=	$this->input->post('st_sipil');
		$jmlh_ank		=	$this->input->post('jmlh_ank');
		$no_astek		=	$this->input->post('no_astek');
		$no_pens		=	$this->input->post('no_pens');
		$npwp			=	$this->input->post('npwp');
		$alamat_tgl		=	$this->input->post('alamat_tgl');
		$kd_lokasi		=	$this->input->post('kd_lokasi');
		$kode_pos		=	$this->input->post('kode_pos');
		$no_telp		=	$this->input->post('no_telp');
		$no_nik			=	$this->input->post('no_nik');
		$no_kk			=	$this->input->post('no_kk');
		$no_bpjs		=	$this->input->post('no_bpjs');
		$user_id		=	$this->input->post('user_id');
		$bln_proses		=	$this->input->post('bln_proses');
		$tinggal		=	$this->input->post('tinggal');
		$ket			=	$this->input->post('ket');
		$tglpen			=	$this->input->post('tglpen');
		$noskpen		=	$this->input->post('noskpen');
		$tglskpen		=	$this->input->post('tglskpen');
		$jns_pen		=	$this->input->post('jns_pen');
		$stat_rec		=	$this->input->post('stat_rec');

		$berhasil	=	$this->Model_admin->entry_sdm01( $npp, $nama, $nm_pgl, $glr_dpn, $glr_blk, $kota_lhr, $prov_lhr, $ngr_lhr,
														$tgl_lhr, $j_kelamin, $gol_darah, $agama, $tgl_masuk, $st_sipil, $jmlh_ank,
														$no_astek, $no_pens, $npwp, $alamat_tgl, $kd_lokasi, $kode_pos,
														$no_telp, $no_nik, $no_kk, $no_bpjs, $user_id, $bln_proses, $tinggal,
														$ket, $tglpen, $noskpen, $tglskpen, $jns_pen, $stat_rec
		);

		if ($berhasil == 1) {

			$this->session->set_userdata("status_insert", "Data Berhasil Di Simpan");
		} else {
			$this->session->set_userdata("status_insert", "Data Gagal Di Simpan!!!");
		}
		echo json_decode($berhasil);
	}

	public function edit_sdm01()
	{
		$id_sdm01		= 		$this->input->post('id_sdm01');
		$npp			=		$this->input->post('npp');
		$nama			=		$this->input->post('nama');
		$nm_pgl			=		$this->input->post('nm_pgl');
		$glr_dpn		=		$this->input->post('glr_dpn');
		$glr_blk		=		$this->input->post('glr_blk');
		$kota_lhr		=		$this->input->post('kota_lhr');
		$prov_lhr		=		$this->input->post('prov_lhr');
		$ngr_lhr		=		$this->input->post('ngr_lhr');
		$tgl_lhr		=		$this->input->post('tgl_lhr');
		$j_kelamin		=		$this->input->post('j_kelamin');
		$gol_darah		=		$this->input->post('gol_darah');
		$agama			=		$this->input->post('agama');
		$tgl_masuk		=		$this->input->post('tgl_masuk');
		$st_sipil		=		$this->input->post('st_sipil');
		$jmlh_ank		=		$this->input->post('jmlh_ank');
		$no_astek		=		$this->input->post('no_astek');
		$no_pens		=		$this->input->post('no_pens');
		$npwp			=		$this->input->post('npwp');
		$alamat_tgl		=		$this->input->post('alamat_tgl');
		$kd_lokasi		=		$this->input->post('kd_lokasi');
		$kode_pos		=		$this->input->post('kode_pos');
		$no_telp		=		$this->input->post('no_telp');
		$no_nik			=		$this->input->post('no_nik');
		$no_kk			=		$this->input->post('no_kk');
		$no_bpjs		=		$this->input->post('no_bpjs');
		$user_id		=		$this->input->post('user_id');
		$bln_proses		=		$this->input->post('bln_proses');
		$tinggal		=		$this->input->post('tinggal');
		$ket			=		$this->input->post('ket');
		$tglpen			=		$this->input->post('tglpen');
		$noskpen		=		$this->input->post('noskpen');
		$tglskpen		=		$this->input->post('tglskpen');
		$jns_pen		=		$this->input->post('jns_pen');
		$stat_rec		=		$this->input->post('stat_rec');

		$berhasil	=	$this->Model_admin->edit_sdm01(
														$id_sdm01, $npp, $nama, $nm_pgl, $glr_dpn, $glr_blk, $kota_lhr, $prov_lhr, $ngr_lhr,
														$tgl_lhr, $j_kelamin, $gol_darah, $agama, $tgl_masuk, $st_sipil, $jmlh_ank,
														$no_astek, $no_pens, $npwp, $alamat_tgl, $kd_lokasi, $kode_pos,
														$no_telp, $no_nik, $no_kk, $no_bpjs, $user_id, $bln_proses, $tinggal,
														$ket, $tglpen, $noskpen, $tglskpen, $jns_pen, $stat_rec
		);

		if ($berhasil == 1) {

			$this->session->set_userdata("status_insert", "Data Berhasil Di Edit");
		} else {
			$this->session->set_userdata("status_insert", "Data Gagal Di Edit!!!");
		}
		echo json_decode($berhasil);
	}

	
}
