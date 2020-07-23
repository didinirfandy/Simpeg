<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_karyawan');
        $this->load->model('Model_admin');
        $this->load->model('Model_login');
        $this->load->helper(array('form', 'url'));

        if (empty($_SESSION['status_login'])) 
        {
            redirect('Welcome/index');
        }
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function in_kar()
    {
        $npp = $this->session->userdata('status_login_username');
        $data['hsl']             = $this->Model_karyawan->nilai($npp);
        $data['jmlh_c_sakit']    = $this->Model_karyawan->jmlh_c_sakit($npp);
        $data['jmlh_c_thn']      = $this->Model_karyawan->jmlh_c_thn($npp);
        $data['jmlh_c_pjg']      = $this->Model_karyawan->jmlh_c_pjg($npp);
        $data['jmlh_hsl_p_lmbr'] = $this->Model_karyawan->jmlh_hsl_p_lmbr($npp);
        $this->load->view('karyawan/in_kar', $data);
    }

    public function data_diri()
    {
        $page   =   $this->uri->segment(3);

        switch ($page) {
            case 'biodiri':
                $data['t_biodiri'] = $this->Model_karyawan->get_bio();
                $this->load->view('karyawan/data/data diri/bio_diri', $data);
                break;

            case 'ed_diri':
                $data['t_biodiri'] = $this->Model_karyawan->get_bio();
                $this->load->view('karyawan/data/data diri/ed_diri', $data);
                break;

            case 'biokel':
                $data['t_kel']     = $this->Model_karyawan->get_bio_kel();
                $this->load->view('karyawan/data/data diri/bio_kel', $data);
                break;

            case 'in_kel':
                $data['kel']    = $this->Model_karyawan->get_bio_kel();
                $data['tkpend'] = $this->Model_karyawan->tkpend();
                $this->load->view('karyawan/data/data diri/in_bio_kel', $data);
                break;

            case 'ed_kel':
                $no_urut = $this->uri->segment(4);
                $data['tkpend']     = $this->Model_karyawan->tkpend();
                $data['kel_urut']   = $this->Model_karyawan->get_sdm02_urut($no_urut);
                $this->load->view('karyawan/data/data diri/ed_kel', $data);
                break;

            case 'temp':
                $npp            = $this->session->userdata('status_login_username');
                $data['tempt2']  = $this->Model_admin->tempt02_kar($npp);
                $this->load->view('karyawan/data/data diri/tb_temp', $data);
                break;
        }
    }

    public function riwayat_pekerjaan()
    {
        $page   =   $this->uri->segment(3);

        switch ($page) {
            case 'ling':
                $data['ta1']    = $this->Model_karyawan->get_bio();
                $this->load->view('karyawan/data/riwayat pekerjaan/ling_ptpn', $data);

                break;
        }
    }

    function data_mpg()
    {
        $data = $this->Model_karyawan->get_sdm16();
        echo json_encode($data);
    }

    function data_rjs()
    {
        $data = $this->Model_karyawan->get_rjs();
        echo json_encode($data);
    }

    public function riwayat_pndidikan()
    {
        $page   =   $this->uri->segment(3);

        switch ($page) {
            case 'pendformal':
                $data['pend'] = $this->Model_karyawan->get_sdm03();
                $this->load->view('karyawan/data/riwayat pendidikan/pend_formal', $data);
                break;

            case 'pend':
                $data['tkpend'] = $this->Model_karyawan->tkpend();
                $data['pend']   = $this->Model_karyawan->get_sdm03();
                $this->load->view('karyawan/data/riwayat pendidikan/in_pend', $data);
                break;

            case 'ed_pend':
                $no_urut = $this->uri->segment(4);
                $data['tkpend'] = $this->Model_karyawan->tkpend();
                $data['pend']   = $this->Model_karyawan->get_sdm03_urut($no_urut);
                $data['isiglr'] = $this->Model_karyawan->get_bio();
                $this->load->view('karyawan/data/riwayat pendidikan/ed_pend', $data);
                break;

            case 'temp_pen':
                $npp             = $this->session->userdata('status_login_username');
                $data['tempt3']  = $this->Model_admin->tempt03_kar($npp);
                $this->load->view('karyawan/data/riwayat pendidikan/tb_temp_pen', $data);
                break;
        }
    }


    public function riwayat_pengembangan()
    {
        $page   =   $this->uri->segment(3);

        switch ($page) {
            case 'pelatihan':
                $data['pela'] = $this->Model_karyawan->get_sdm04();
                $this->load->view('karyawan/data/riwayat pengembangan/pelatihan', $data);
                break;

            case 'in_pelatihan':
                $data['pend'] = $this->Model_karyawan->pend02();
                $data['pela'] = $this->Model_karyawan->get_sdm04();
                $this->load->view('karyawan/data/riwayat pengembangan/in_pelatihan', $data);
                break;

            case 'ed_pelatihan':
                $no_urut = $this->uri->segment(4);
                $data['pend'] = $this->Model_karyawan->pend02();
                $data['no']   = $this->Model_karyawan->get_sdm04_urut($no_urut);
                $this->load->view('karyawan/data/riwayat pengembangan/ed_pelatihan', $data);
                break;

            case 'temp_plthn':
                $npp            = $this->session->userdata('status_login_username');
                $data['tempt4']  = $this->Model_admin->tempt04_kar($npp);
                $this->load->view('karyawan/data/riwayat pengembangan/tb_temp_plthn', $data);
                break;

            case 'assessment':
                $this->load->view('karyawan/data/riwayat pengembangan/assessment');
                break;
        }
    }

    public function riwayat_hukuman()
    {
        $data['hkm'] = $this->Model_karyawan->get_sdm14();
        $this->load->view('karyawan/data/riwayat_huk', $data);
    }

    public function cetak_cv()
    {
        $this->load->view('karyawan/cv_kar');
    }

    public function cuti()
    {
        $page = $this->uri->segment(3);
        switch ($page) {
            case 'in_cuti':
                $npp            = $this->session->userdata('status_login_username');
                $kasubdiv       = $this->Model_karyawan->kasubdiv($npp);
                $kasubdiv       = $kasubdiv['kd_menu'];
                $data['subdiv'] = $this->Model_karyawan->get_subdiv($kasubdiv);
                $this->load->view('karyawan/data/pengajuan cuti/in_cuti');
                break;

            case 'tb_cuti':
                $data['cuti_pjg']   = $this->Model_karyawan->tb_cuti_pjg();
                $data['cuti_thn']   = $this->Model_karyawan->tb_cuti_thn();
                $data['cuti_sakit'] = $this->Model_karyawan->tb_cuti_sakit();
                $this->load->view('karyawan/data/pengajuan cuti/tb_cuti', $data);
                break;
        }
    }

    public function cuti_subdiv()
    {
        $page = $this->uri->segment(3);
        switch ($page) {
            case 'in_cuti':
                $this->load->view('karyawan/data/pengajuan cuti/in_cuti_sub');
                break;

            case 'tb_cuti':
                $npp                     =  $this->session->userdata('status_login_username');
                $kasubdiv                =  $this->Model_karyawan->kasubdiv($npp);
                $kasubdiv                =  $kasubdiv['kd_menu'];
                $data['staf_cuti_thn']   =  $this->Model_karyawan->get_cuti_thn_subdiv($kasubdiv);
                $data['staf_cuti_pjg']   =  $this->Model_karyawan->get_cuti_pjg_subdiv($kasubdiv);
                $data['staf_cuti_sakit'] =  $this->Model_karyawan->get_cuti_sakit_subdiv($kasubdiv);
                $data['quota_thn']       =  $this->Model_karyawan->quota_cuti_thn_sub($kasubdiv);
                $data['quota_pjg']       =  $this->Model_karyawan->quota_cuti_pjg_sub($kasubdiv);
                $data['quota_sakit']     =  $this->Model_karyawan->quota_cuti_sakit_sub($kasubdiv);
                $this->load->view('karyawan/data/pengajuan cuti/tb_cuti_sub', $data);
                break;
        }
    }

    public function history_cuti_kadiv()
    {
        $npp                     =  $this->session->userdata('status_login_username');
        $kasubdiv                =  $this->Model_karyawan->kasubdiv($npp);
        $kasubdiv                =  $kasubdiv['kd_menu'];
        $data['staf_cuti_thn']   =  $this->Model_karyawan->get_cuti_thn_kadiv($kasubdiv);
        $data['staf_cuti_pjg']   =  $this->Model_karyawan->get_cuti_pjg_kadiv($kasubdiv);
        $data['staf_cuti_sakit'] =  $this->Model_karyawan->get_cuti_sakit_kadiv($kasubdiv);
        $data['quota_thn']       =  $this->Model_karyawan->quota_cuti_thn_ka($kasubdiv);
        $data['quota_pjg']       =  $this->Model_karyawan->quota_cuti_pjg_ka($kasubdiv);
        $data['quota_sakit']     =  $this->Model_karyawan->quota_cuti_sakit_ka($kasubdiv);
        $this->load->view('karyawan/data/pengajuan cuti/tb_cuti_kadiv', $data);
    }

    public function history_nilai_kadiv()
    {
        $npp             =  $this->session->userdata('status_login_username');
        $data['tb_nli']  =  $this->Model_karyawan->get_nilai_subdiv($npp);
        $this->load->view('karyawan/data/penilaian/tb_nilai', $data);
    }



    public function lembur()
    {
        $page   =   $this->uri->segment(3);
        switch ($page) {
            case 'tb_lembur':
                $data['p_lmbr']   = $this->Model_karyawan->tb_p_lmbr();
                $this->load->view('karyawan/data/pengajuan lembur/tb_lembur', $data);
                break;
        }
    }

    public function lembur_subdiv()
    {
        $page  = $this->uri->segment(3);
        switch ($page) {
            case 'in_lembur':
                $npp               =  $this->session->userdata('status_login_username');
                $kasubdiv          =  $this->Model_karyawan->kasubdiv($npp);
                $kasubdiv          =  $kasubdiv['kd_menu'];
                $data['staf']      =  $this->Model_karyawan->get_subdiv($kasubdiv);
                $data['kode_lmbr'] =  $this->Model_karyawan->kode_lmbr();
                $kode_lmbr         =  $data['kode_lmbr'];
                $data['post']      =  $this->Model_karyawan->show_id_lmbr($kode_lmbr);

                $this->load->view('karyawan/data/pengajuan lembur/in_lembur', $data);
                break;

            case 'tb_lembur_sub':
                $npp              =  $this->session->userdata('status_login_username');
                $kasubdiv         =  $this->Model_karyawan->kasubdiv($npp);
                $kasubdiv         =  $kasubdiv['kd_menu'];
                $data['tb_staf']  =  $this->Model_karyawan->get_lembur($kasubdiv);

                $this->load->view('karyawan/data/pengajuan lembur/tb_lembur_sub', $data);
                break;
        }
    }

    public function penilaian_kasubdiv()
    {
        $page  = $this->uri->segment(3);
        switch ($page) {
            case 'data_kar':
                $npp           =  $this->session->userdata('status_login_username');
                $kasubdiv      =  $this->Model_karyawan->kasubdiv($npp);
                $kasubdiv      =  $kasubdiv['kd_menu'];
                $data['staf']  =  $this->Model_karyawan->get_subdiv($kasubdiv);
                $this->load->view('karyawan/data/penilaian/in_nilai', $data);
                break;

            case 'penilaian':
                $npp            =  $this->uri->segment(4);
                $data['ham']    =  $this->Model_karyawan->ham();
                $data['km']     =  $this->Model_karyawan->km();
                $data['kdp']    =  $this->Model_karyawan->kdp();
                $data['teknis'] =  $this->Model_karyawan->teknis();
                $data['diri']   =  $this->Model_karyawan->get_biodata($npp);
                $this->load->view('karyawan/data/penilaian/p_kinerja', $data);
                break;

            case 'nilai':
                $npp            =  $this->session->userdata('status_login_username');
                $kasubdiv       =  $this->Model_karyawan->kasubdiv($npp);
                $kasubdiv       =  $kasubdiv['kd_menu'];
                $data['tb_nli'] =  $this->Model_karyawan->get_nilai($kasubdiv);
                $this->load->view('karyawan/data/penilaian/tb_nilai', $data);
                break;
        }
    }

    public function kofirmasi_cuti_pjg_setuju()
    {
        $id_cuti_pjg = $this->uri->segment(3);
        $berhasil = $this->Model_karyawan->konfirmasi_cuti_pjg_setuju($id_cuti_pjg);
        if ($berhasil == 1) {
            $this->session->set_flashdata('statusinsert', 'Disetujui!!!');
            redirect('karyawan/cuti_subdiv/tb_cuti');
        } else {
            $this->session->set_flashdata('statusgagal', 'Disetujui!!!');
            redirect('karyawan/cuti_subdiv/tb_cuti');
        }
    }

    public function kofirmasi_cuti_pjg_tolak()
    {
        if (isset($_POST['edit'])) {
            $id_cuti_pjg = $this->input->post('id_cuti_pjg');
            $alasan      = $this->input->post('alasan');

            $berhasil = $this->Model_karyawan->konfirmasi_cuti_pjg_tolak($id_cuti_pjg, $alasan);
            if ($berhasil == 1) {
                $this->session->set_flashdata('statusinsert', 'Ditolak!!!');
                redirect('karyawan/cuti_subdiv/tb_cuti');
            } else {
                $this->session->set_flashdata('statusgagal', 'Ditolak!!!');
                redirect('karyawan/cuti_subdiv/tb_cuti');
            }
        }
    }

    public function kofirmasi_cuti_thn_setuju()
    {
        $id_cuti_thn = $this->uri->segment(3);
        $berhasil = $this->Model_karyawan->konfirmasi_cuti_thn_setuju($id_cuti_thn);
        if ($berhasil == 1) {
            $this->session->set_flashdata('statusinsert', 'Disetujui!!!');
            redirect('karyawan/cuti_subdiv/tb_cuti');
        } else {
            $this->session->set_flashdata('statusgagal', 'Disetujui!!!');
            redirect('karyawan/cuti_subdiv/tb_cuti');
        }
    }

    public function kofirmasi_cuti_thn_tolak()
    {
        if (isset($_POST['edit'])) {
            $id_cuti_thn = $this->input->post('id_cuti_thn');
            $alasan      = $this->input->post('alasan');

            $berhasil = $this->Model_karyawan->konfirmasi_cuti_thn_tolak($id_cuti_thn, $alasan);
            if ($berhasil == 1) {
                $this->session->set_flashdata('statusinsert', 'Ditolak!!!');
                redirect('karyawan/cuti_subdiv/tb_cuti');
            } else {
                $this->session->set_flashdata('statusgagal', 'Ditolak!!!');
                redirect('karyawan/cuti_subdiv/tb_cuti');
            }
        }
    }

    public function kofirmasi_cuti_sakit_setuju()
    {
        $id_cuti_sakit = $this->uri->segment(3);
        $berhasil = $this->Model_karyawan->konfirmasi_cuti_sakit_setuju($id_cuti_sakit);
        if ($berhasil == 1) {
            $this->session->set_flashdata('statusinsert', 'Disetujui!!!');
            redirect('karyawan/cuti_subdiv/tb_cuti');
        } else {
            $this->session->set_flashdata('statusgagal', 'Disetujui!!!');
            redirect('karyawan/cuti_subdiv/tb_cuti');
        }
    }

    public function kofirmasi_cuti_sakit_tolak()
    {
        if (isset($_POST['edit'])) {
            $id_cuti_sakit = $this->input->post('id_cuti_sakit');
            $alasan        = $this->input->post('alasan');

            $berhasil = $this->Model_karyawan->konfirmasi_cuti_sakit_tolak($id_cuti_sakit, $alasan);
            if ($berhasil == 1) {
                $this->session->set_flashdata('statusinsert', 'Ditolak!!!');
                redirect('karyawan/cuti_subdiv/tb_cuti');
            } else {
                $this->session->set_flashdata('statusgagal', 'Ditolak!!!');
                redirect('karyawan/cuti_subdiv/tb_cuti');
            }
        }
    }

    public function kofirmasi_p_lmbr_setuju()
    {
        $id_p_lmbr = $this->uri->segment(3);
        $berhasil = $this->Model_karyawan->konfirmasi_p_lmbr_setuju($id_p_lmbr);
        if ($berhasil == 1) {
            $this->session->set_flashdata('statusinsert', 'Disetujui!!!');
            redirect('Karyawan/lembur/tb_lembur');
        } else {
            $this->session->set_flashdata('statusgagal', 'Disetujui!!!');
            redirect('Karyawan/lembur/tb_lembur');
        }
    }

    public function kofirmasi_p_lmbr_tolak()
    {
        if (isset($_POST['edit'])) {
            $id_p_lmbr = $this->input->post('id_p_lmbr');
            $alasan    = $this->input->post('alasan');

            $berhasil = $this->Model_karyawan->konfirmasi_p_lmbr_tolak($id_p_lmbr, $alasan);
            if ($berhasil == 1) {
                $this->session->set_flashdata('statusinsert', 'Ditolak!!!');
                redirect('Karyawan/lembur/tb_lembur');
            } else {
                $this->session->set_flashdata('statusgagal', 'Ditolak!!!');
                redirect('Karyawan/lembur/tb_lembur');
            }
        }
    }

    public function karyawan()
    {
        $page = $this->uri->segment(3);
        switch ($page) {
            case 'diri_action':
                if (isset($_POST['edit'])) {
                    $npp         =  $this->input->post('npp');
                    $nama        =  $this->input->post('nama');
                    $nm_pgl      =  $this->input->post('nm_pgl');
                    $glr_dpn     =  $this->input->post('glr_dpn');
                    $glr_blk     =  $this->input->post('glr_blk');
                    $kota_lhr    =  $this->input->post('kota_lhr');
                    $prov_lhr    =  $this->input->post('prov_lhr');
                    $ngr_lhr     =  $this->input->post('ngr_lhr');
                    $tgl_lhr     =  $this->input->post('tgl_lhr');
                    $j_kelamin   =  $this->input->post('j_kelamin');
                    $gol_darah   =  $this->input->post('gol_darah');
                    $agama       =  $this->input->post('agama');
                    $tgl_masuk   =  $this->input->post('tgl_masuk');
                    $st_sipil    =  $this->input->post('st_sipil');
                    $jmlh_ank    =  $this->input->post('jmlh_ank');
                    $no_astek    =  $this->input->post('no_astek');
                    $no_pens     =  $this->input->post('no_pens');
                    $npwp        =  $this->input->post('npwp');
                    $alamat_tgl  =  $this->input->post('alamat_tgl');
                    $kd_lokasi   =  $this->input->post('kd_lokasi');
                    $kode_pos    =  $this->input->post('kode_pos');
                    $no_telp     =  $this->input->post('no_telp');
                    $no_nik      =  $this->input->post('no_nik');
                    $no_kk       =  $this->input->post('no_kk');
                    $no_bpjs     =  $this->input->post('no_bpjs');
                    $valid       =  $this->input->post('valid');
                    $status      =  $this->input->post('status');
                    $image       =  $this->_uploadImage_biodiri();

                    if ($image == 0) {
                        $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                        redirect('Karyawan/data_diri/biodiri');
                    } else {
                        $berhasil    =  $this->Model_karyawan->edit_diri(
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
                            $valid,
                            $status,
                            $image
                        );

                        if ($berhasil == 1) {
                            $this->session->set_flashdata('statusinsert', 'Ditambahkan!!!');
                            redirect('Karyawan/data_diri/biodiri');
                        } else {
                            $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                            redirect('Karyawan/data_diri/biodiri');
                        }
                    }
                }
                break;

            case 'pend_action':
                if (isset($_POST['submit'])) {
                    $npp        =   $this->input->post('npp');
                    $no_urut    =   $this->input->post('no_urut');
                    $ket        =   $this->input->post('ket');
                    $tk_pend    =   $this->input->post('tk_pend');
                    $nama       =   $this->input->post('nama');
                    $kd_pend    =   $this->input->post('kd_pend');
                    $kota       =   $this->input->post('kota');
                    $thn_awal   =   $this->input->post('thn_awal');
                    $thn_akhir  =   $this->input->post('thn_akhir');
                    $no_ijasah  =   $this->input->post('no_ijasah');
                    $tgl_ijasah =   $this->input->post('tgl_ijasah');
                    $glr_dpn    =   $this->input->post('glr_dpn');
                    $glr_blk    =   $this->input->post('glr_blk');
                    $valid      =   $this->input->post('valid');
                    $status     =   $this->input->post('status');
                    $image      =   $this->_uploadImage_pen();
                    if ($image == 0) {
                        $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                        redirect('Karyawan/riwayat_pndidikan/pendformal');
                    } else {
                        $berhasil   =   $this->Model_karyawan->entry_pend(
                            $npp,
                            $no_urut,
                            $ket,
                            $tk_pend,
                            $nama,
                            $kd_pend,
                            $kota,
                            $thn_awal,
                            $thn_akhir,
                            $no_ijasah,
                            $tgl_ijasah,
                            $glr_dpn,
                            $glr_blk,
                            $valid,
                            $status,
                            $image
                        );

                        if ($berhasil == 1) {
                            $this->session->set_flashdata('statusinsert', 'Ditambahkan!!!');
                            redirect('Karyawan/riwayat_pndidikan/pendformal');
                        } else {
                            $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                            redirect('Karyawan/riwayat_pndidikan/pend');
                        }
                    }
                }

                if (isset($_POST['edit'])) {
                    $id_sdm03   =   $this->input->post('id_sdm03');
                    $npp        =   $this->input->post('npp');
                    $no_urut    =   $this->input->post('no_urut');
                    $ket        =   $this->input->post('ket');
                    $tk_pend    =   $this->input->post('tk_pend');
                    $nama       =   $this->input->post('nama');
                    $kd_pend    =   $this->input->post('kd_pend');
                    $kota       =   $this->input->post('kota');
                    $thn_awal   =   $this->input->post('thn_awal');
                    $thn_akhir  =   $this->input->post('thn_akhir');
                    $no_ijasah  =   $this->input->post('no_ijasah');
                    $tgl_ijasah =   $this->input->post('tgl_ijasah');
                    $glr_dpn    =   $this->input->post('glr_dpn');
                    $glr_blk    =   $this->input->post('glr_blk');
                    $valid      =   $this->input->post('valid');
                    $status     =   $this->input->post('status');
                    $image      =   $this->_uploadImage_pen();

                    if ($image == 0) {
                        $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                        redirect('Karyawan/riwayat_pndidikan/pendformal');
                    } else {
                        $berhasil   =   $this->Model_karyawan->edit_pend(
                            $id_sdm03,
                            $npp,
                            $no_urut,
                            $ket,
                            $tk_pend,
                            $nama,
                            $kd_pend,
                            $kota,
                            $thn_awal,
                            $thn_akhir,
                            $no_ijasah,
                            $tgl_ijasah,
                            $glr_dpn,
                            $glr_dpn,
                            $valid,
                            $status,
                            $image
                        );

                        if ($berhasil == 1) {
                            $this->session->set_flashdata('statusinsert', 'Ditambahkan!!!');
                            redirect('Karyawan/riwayat_pndidikan/pendformal');
                        } else {
                            $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                            redirect('Karyawan/riwayat_pndidikan/pendformal');
                        }
                    }
                }
                break;

            case 'kel_action':
                if (isset($_POST['submit'])) {
                    $npp        =   $this->input->post('npp');
                    $no_urut    =   $this->input->post('no_urut');
                    $nama       =   $this->input->post('nama');
                    $hbg_klg    =   $this->input->post('hbg_klg');
                    $tgl_lhr    =   $this->input->post('tgl_lhr');
                    $kota_lhr   =   $this->input->post('kota_lhr');
                    $ngr_lhr    =   $this->input->post('ngr_lhr');
                    $kelamin    =   $this->input->post('kelamin');
                    $gol_darah  =   $this->input->post('gol_darah');
                    $agama      =   $this->input->post('agama');
                    $tk_pend    =   $this->input->post('tk_pend');
                    $st_sipil   =   $this->input->post('st_sipil');
                    $st_kerja   =   $this->input->post('st_kerja');
                    $tgl_nkh    =   $this->input->post('tgl_nkh');
                    $tgl_cerai  =   $this->input->post('tgl_cerai');
                    $tgl_mgl    =   $this->input->post('tgl_mgl');
                    $alamat     =   $this->input->post('alamat');
                    $no_kk      =   $this->input->post('no_kk');
                    $nik        =   $this->input->post('nik');
                    $no_bpjs    =   $this->input->post('no_bpjs');
                    $stat_rec   =   $this->input->post('stat_rec');
                    $valid      =   $this->input->post('valid');
                    $status     =   $this->input->post('status');
                    $image      =   $this->_uploadImage_kel();

                    if ($image == 0) {
                        $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                        redirect('Karyawan/data_diri/biokel');
                    } else {
                        $berhasil   =   $this->Model_karyawan->entry_kel(
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
                            $stat_rec,
                            $valid,
                            $status,
                            $image
                        );

                        if ($berhasil == 1) {
                            $this->session->set_flashdata('statusinsert', 'Ditambahkan!!!');
                            redirect('Karyawan/data_diri/biokel');
                        } else {
                            $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                            redirect('Karyawan/data_diri/in_kel');
                        }
                    }
                }

                if (isset($_POST['edit'])) {
                    $id_sdm02   =   $this->input->post('id_sdm02');
                    $npp        =   $this->input->post('npp');
                    $no_urut    =   $this->input->post('no_urut');
                    $nama       =   $this->input->post('nama');
                    $hbg_klg    =   $this->input->post('hbg_klg');
                    $tgl_lhr    =   $this->input->post('tgl_lhr');
                    $kota_lhr   =   $this->input->post('kota_lhr');
                    $ngr_lhr    =   $this->input->post('ngr_lhr');
                    $kelamin    =   $this->input->post('kelamin');
                    $gol_darah  =   $this->input->post('gol_darah');
                    $agama      =   $this->input->post('agama');
                    $tk_pend    =   $this->input->post('tk_pend');
                    $st_sipil   =   $this->input->post('st_sipil');
                    $st_kerja   =   $this->input->post('st_kerja');
                    $tgl_nkh    =   $this->input->post('tgl_nkh');
                    $tgl_cerai  =   $this->input->post('tgl_cerai');
                    $tgl_mgl    =   $this->input->post('tgl_mgl');
                    $alamat     =   $this->input->post('alamat');
                    $no_kk      =   $this->input->post('no_kk');
                    $nik        =   $this->input->post('nik');
                    $no_bpjs    =   $this->input->post('no_bpjs');
                    $valid      =   $this->input->post('valid');
                    $status     =   $this->input->post('status');
                    $image      =   $this->_uploadImage_kel();
                    if ($image == 0) {
                        $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                        redirect('Karyawan/data_diri/biokel');
                    } else {

                        $berhasil   =   $this->Model_karyawan->edit_kel(
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
                            $valid,
                            $status,
                            $image
                        );

                        if ($berhasil == 1) {
                            $this->session->set_flashdata('statusinsert', 'Ditambahkan!!!');
                            redirect('Karyawan/data_diri/biokel');
                        } else {
                            $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                            redirect('Karyawan/data_diri/biokel');
                        }
                    }
                }

                break;

            case 'plthn_action':
                if (isset($_POST['submit'])) {
                    $npp        =   $this->input->post('npp');
                    $no_urut    =   $this->input->post('no_urut');
                    $kd_pend    =   $this->input->post('kd_pend');
                    $nama       =   $this->input->post('nama');
                    $ket        =   $this->input->post('ket');
                    $dnln       =   $this->input->post('dnln');
                    $tgl_awal   =   $this->input->post('tgl_awal');
                    $tgl_akhir  =   $this->input->post('tgl_akhir');
                    $no_sert    =   $this->input->post('no_sert');
                    $tgl_sert   =   $this->input->post('tgl_sert');
                    $nilai      =   $this->input->post('nilai');
                    $grade      =   $this->input->post('grade');
                    $bln_proses =   $this->input->post('bln_proses');
                    $stat_rec   =   $this->input->post('stat_rec');
                    $valid      =   $this->input->post('valid');
                    $status     =   $this->input->post('status');
                    $image      =   $this->_uploadImage_plthn();

                    if ($image == 0) {
                        $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                        redirect('Karyawan/riwayat_pengembangan/pelatihan');
                    } else {

                        $berhasil   =   $this->Model_karyawan->entry_plthn(
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
                            $stat_rec,
                            $valid,
                            $status,
                            $image
                        );

                        if ($berhasil == 1) {
                            $this->session->set_flashdata('statusinsert', 'Ditambahkan!!!');
                            redirect('Karyawan/riwayat_pengembangan/pelatihan');
                        } else {
                            $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                            redirect('Karyawan/riwayat_pengembangan/in_pelatihan');
                        }
                    }
                }

                if (isset($_POST['edit'])) {
                    $id_sdm04   =   $this->input->post('id_sdm04');
                    $npp        =   $this->input->post('npp');
                    $no_urut    =   $this->input->post('no_urut');
                    $kd_pend    =   $this->input->post('kd_pend');
                    $nama       =   $this->input->post('nama');
                    $ket        =   $this->input->post('ket');
                    $dnln       =   $this->input->post('dnln');
                    $tgl_awal   =   $this->input->post('tgl_awal');
                    $tgl_akhir  =   $this->input->post('tgl_akhir');
                    $no_sert    =   $this->input->post('no_sert');
                    $tgl_sert   =   $this->input->post('tgl_sert');
                    $nilai      =   $this->input->post('nilai');
                    $grade      =   $this->input->post('grade');
                    $bln_proses =   $this->input->post('bln_proses');
                    $stat_rec   =   $this->input->post('stat_rec');
                    $valid      =   $this->input->post('valid');
                    $status     =   $this->input->post('status');
                    $image      =   $this->_uploadImage_plthn();

                    if ($image == 0) {
                        $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                        redirect('Karyawan/riwayat_pengembangan/pelatihan');
                    } else {
                        $berhasil   =   $this->Model_karyawan->edit_plthn(
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
                            $stat_rec,
                            $valid,
                            $status,
                            $image
                        );

                        if ($berhasil == 1) {
                            $this->session->set_flashdata('statusinsert', 'Ditambahkan!!!');
                            redirect('Karyawan/riwayat_pengembangan/pelatihan');
                        } else {
                            $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                            redirect('Karyawan/riwayat_pengembangan/pelatihan');
                        }
                    }
                }
                break;
            case 'cuti_thn':
                if (isset($_POST['submit'])) {
                    $npp        =   $this->input->post('npp');
                    $nama_kar   =   $this->input->post('nama_kar');
                    $kd_jabatan =   $this->input->post('kd_jabatan');
                    $nm_jabatan =   $this->input->post('nm_jabatan');
                    $jmlh_hari  =   $this->input->post('jmlh_hari');
                    $ket        =   $this->input->post('ket');
                    $tgl_mulai  =   $this->input->post('tgl_mulai');
                    $tgl_akhir  =   $this->input->post('tgl_akhir');
                    $jns_cuti   =   $this->input->post('jns_cuti');

                    date_default_timezone_set('Asia/Jakarta');
                    $date   =   date('d-m-y');
                    $v = $this->db->query("SELECT * FROM cuti_thn WHERE npp ='$npp' AND tgl = '$date' ");
                    if ($v->num_rows() <> 0) {
                        $this->session->set_flashdata('statusdanger', 'Ditambahkan!!!');
                        redirect('Karyawan/cuti/in_cuti');
                    } else {
                        $thn = $this->db->query("SELECT * FROM cuti_thn WHERE npp = '$npp' GROUP BY npp")->row_array();
                        if ($thn == "") {
                            $berhasil = $this->Model_karyawan->cuti_thn($npp, $nama_kar, $kd_jabatan, $nm_jabatan, $jmlh_hari, $ket, $tgl_mulai, $tgl_akhir, $jns_cuti);

                            if ($berhasil == 1) {
                                $this->session->set_flashdata('statusinsert', 'Ditambahkan!!!');
                                redirect('Karyawan/cuti/in_cuti');
                            } else {
                                $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                                redirect('Karyawan/cuti/in_cuti');
                            }
                        } else {
                            $sisa_cuti = $this->Model_admin->quota_cuti_thn();
                            $sisa      = $sisa_cuti[0]['sisa_tb_cuti_thn'];
                            if ($jmlh_hari <= $sisa) {
                                $berhasil   =   $this->Model_karyawan->cuti_thn($npp, $nama_kar, $kd_jabatan, $nm_jabatan, $jmlh_hari, $ket, $tgl_mulai, $tgl_akhir, $jns_cuti );

                                if ($berhasil == 1) {
                                    $this->session->set_flashdata('statusinsert', 'Ditambahkan!!!');
                                    redirect('Karyawan/cuti/in_cuti');
                                } else {
                                    $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                                    redirect('Karyawan/cuti/in_cuti');
                                }
                            }
                            $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                            redirect('Karyawan/cuti/in_cuti');
                        }
                    }
                }
                break;

            case 'cuti_pjg':
                if (isset($_POST['submit'])) {
                    $npp        =   $this->input->post('npp');
                    $nama_kar   =   $this->input->post('nama_kar');
                    $kd_jabatan =   $this->input->post('kd_jabatan');
                    $nm_jabatan =   $this->input->post('nm_jabatan');
                    $jmlh_hari  =   $this->input->post('jmlh_hari');
                    $ket        =   $this->input->post('ket');
                    $tgl_mulai  =   $this->input->post('tgl_mulai');
                    $tgl_akhir  =   $this->input->post('tgl_akhir');
                    $jns_cuti   =   $this->input->post('jns_cuti');

                    date_default_timezone_set('Asia/Jakarta');
                    $date   =   date('d-m-y');
                    $v = $this->db->query("SELECT * FROM cuti_pjg WHERE npp='$npp' AND tgl='$date' ");
                    if ($v->num_rows() <> 0) {
                        $this->session->set_flashdata('statusdanger', 'Ditambahkan!!!');
                        redirect('Karyawan/cuti/in_cuti');
                    } else {
                        $sisa_cuti = $this->Model_admin->quota_cuti_thn();
                        $sisa      = $sisa_cuti[0]['sisa_tb_cuti_thn'];
                        if ($jmlh_hari <= $sisa) {
                            $berhasil   =   $this->Model_karyawan->cuti_pjg(
                                $npp,
                                $nama_kar,
                                $kd_jabatan,
                                $nm_jabatan,
                                $jmlh_hari,
                                $ket,
                                $tgl_mulai,
                                $tgl_akhir,
                                $jns_cuti
                            );

                            if ($berhasil == 1) {
                                $this->session->set_flashdata('statusinsert', 'Ditambahkan!!!');
                                redirect('Karyawan/cuti/in_cuti');
                            } else {
                                $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                                redirect('Karyawan/cuti/in_cuti');
                            }
                        }
                        $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                        redirect('Karyawan/cuti/in_cuti');
                    }
                }
                break;

            case 'cuti_sakit':
                if (isset($_POST['submit'])) {
                    $npp        =   $this->input->post('npp');
                    $nama_kar   =   $this->input->post('nama_kar');
                    $kd_jabatan =   $this->input->post('kd_jabatan');
                    $nm_jabatan =   $this->input->post('nm_jabatan');
                    $jmlh_hari  =   $this->input->post('jmlh_hari');
                    $ket        =   $this->input->post('ket');
                    $tgl_mulai  =   $this->input->post('tgl_mulai');
                    $tgl_akhir  =   $this->input->post('tgl_akhir');
                    $jns_cuti   =   $this->input->post('jns_cuti');

                    $date   =   date('d-m-y');
                    $v = $this->db->query("SELECT * FROM cuti_sakit WHERE npp='$npp' AND tgl='$date' ");
                    if ($v->num_rows() <> 0) {
                        $this->session->set_flashdata('statusdanger', 'Ditambahkan!!!');
                        redirect('Karyawan/cuti/in_cuti');
                    } else {
                        $berhasil   =   $this->Model_karyawan->cuti_sakit(
                            $npp,
                            $nama_kar,
                            $kd_jabatan,
                            $nm_jabatan,
                            $jmlh_hari,
                            $ket,
                            $tgl_mulai,
                            $tgl_akhir,
                            $jns_cuti
                        );

                        if ($berhasil == 1) {
                            $this->session->set_flashdata('statusinsert', 'Ditambahkan!!!');
                            redirect('Karyawan/cuti/in_cuti');
                        } else {
                            $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                            redirect('Karyawan/cuti/in_cuti');
                        }
                    }
                }
                break;

            case 'tambah_lmbr':
                $kode_lmbr   = $this->input->post('kode_lmbr');
                $npp         = $this->input->post('npp');
                $nama_p_lmbr = $this->input->post('nama_p_lmbr');
                $jabatan     = $this->input->post('jabatan');
                $kd_menu     = $this->input->post('kd_menu');
                $pimpinan    = $this->input->post('pimpinan');
                $tgl_p       = $this->input->post('tgl_p');
                $awal        = $this->input->post('awal');
                $akhir       = $this->input->post('akhir');
                $jmlh        = $this->input->post('jmlh');
                $ket         = $this->input->post('ket');
                $alasan      = $this->input->post('alasan');
                $valid       = $this->input->post('valid');

                $cuti_thn   = $this->db->query("SELECT * FROM cuti_thn WHERE npp = '$npp' order by id_cuti_thn DESC")->row_array();
                $cuti_pjg   = $this->db->query("SELECT * FROM cuti_pjg WHERE npp = '$npp' order by id_cuti_pjg DESC")->row_array();
                $cuti_sakit = $this->db->query("SELECT * FROM cuti_sakit WHERE npp = '$npp' order by id_cuti_sakit DESC")->row_array();
                $tgl1       = $cuti_thn['tgl_mulai'];
                $tgl2       = $cuti_thn['tgl_akhir'];
                $tgl3       = $cuti_pjg['tgl_mulai'];
                $tgl4       = $cuti_pjg['tgl_akhir'];
                $tgl5       = $cuti_sakit['tgl_mulai'];
                $tgl6       = $cuti_sakit['tgl_akhir'];
                if ($tgl_p == $tgl1  or $tgl_p == $tgl2 or $tgl_p == $tgl3 or $tgl_p == $tgl4 or $tgl_p == $tgl5 or $tgl_p == $tgl6 ) 
                {
                    $result['pesan'] = $this->session->set_flashdata('statusdanger', 'karyawan sedang cuti!!!');
                    echo json_encode($result);
                } else {
                    date_default_timezone_set('Asia/Jakarta');
                    $date = date("Y/m/d H:i:s");
                    $data = array(
                        'kode_lmbr'   => $kode_lmbr,
                        'npp'         => $npp,
                        'nama_p_lmbr' => $nama_p_lmbr,
                        'jabatan'     => $jabatan,
                        'kd_menu'     => $kd_menu,
                        'pimpinan'    => $pimpinan,
                        'tgl_p'       => $tgl_p,
                        'awal'        => $awal,
                        'akhir'       => $akhir,
                        'jmlh'        => $jmlh,
                        'ket'         => $ket,
                        'alasan'      => $alasan,
                        'tgl'         => $date,
                        'valid'       => $valid
                    );

                    $berhasil = $this->Model_karyawan->tambah_lmbr('p_lmbr', $data);

                    if ($berhasil == 1) {
                        $result['pesan'] = $this->session->set_flashdata('statusinsert', 'di daftarkan!!!');
                    } else {
                        $result['pesan'] = $this->session->set_flashdata('statusgagal', 'di daftarkan!!!');
                    }
                    echo json_encode($result);
                }   
                break;

            case 'action_nilai':
                if (isset($_POST['submit'])) {
                    $npp            = $this->input->post('npp');
                    $nm_kar         = $this->input->post('nm_kar');
                    $npp_pmpn       = $this->input->post('npp_pmpn');
                    $nm_pmpn        = $this->input->post('nm_pmpn');
                    $npp_ats_pmpn   = $this->input->post('npp_ats_pmpn');
                    $nm_ats_pmpn    = $this->input->post('nm_ats_pmpn');
                    $jabatan        = $this->input->post('jabatan');
                    $kd_menu        = $this->input->post('kd_menu');
                    $nilai          = $this->input->post('nilai');
                    $ket            = $this->input->post('ket');

                    $berhasil = $this->Model_karyawan->in_nilai($npp, $nm_kar, $npp_pmpn, $nm_pmpn, $npp_ats_pmpn, $nm_ats_pmpn, $jabatan, $kd_menu, $nilai, $ket);

                    if ($berhasil == 1) {
                        $this->session->set_flashdata('statusinsert', 'Ditambahkan!!!');
                        redirect('Karyawan/penilaian_kasubdiv/data_kar');
                    } else {
                        $this->session->set_flashdata('statusgagal', 'Ditambahkan!!!');
                        redirect('Karyawan/penilaian_kasubdiv/data_kar');
                    }
                }
                break;
        }
    }

    function tampil_p_lembur()
    {
        $kode_lmbr  = $this->input->post('kode_lmbr');
        $data       = $this->Model_karyawan->tampil_lmbr('p_lmbr', $kode_lmbr)->result_array();
        echo json_encode($data);
    }

    function delete_p_lmbr()
    {
        $id_p_lmbr  =  $this->input->post('id_p_lmbr');
        $data       =  $this->Model_karyawan->delete_p_lmbr('p_lmbr', $id_p_lmbr);
        echo json_encode($data);
    }

    public function pendentry()
    {
        $no   = $this->input->post('no');
        $data = $this->Model_karyawan->pend($no);

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>--PILIH--</option>";
        $lists2 = "<option value=''>--PILIH--</option>";

        foreach ($data as $key) {
            $lists .= "<option value='" . $key['nama'] . "'>" . $key['nama'] . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        foreach ($data as $row) {
            $lists2 .= "<option value='" . $row['kd_pend'] . "'>" . $row['nama'] . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        $callback = array('list_nama' => $lists, 'list_kd_pend' => $lists2); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

        echo json_encode($callback); // mengembalikan varibael $callback menjadi JSON
    }

    public function pendedit()
    {
        $no   = $this->input->post('no');
        $data = $this->Model_karyawan->pend($no);

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>--PILIH--</option>";
        $lists2 = "<option value=''>--PILIH--</option>";
        $sdm03 = $this->Model_karyawan->get_sdm03();
        foreach ($sdm03 as $ini) {
            $lists .= "<option value='" . $ini['nama'] . "'>" . $ini['nama'] . "</option>";
            $lists2 .= "<option value='" . $ini['kd_pend'] . "'>" . $ini['nama'] . "</option>";
        }

        foreach ($data as $key) {
            $lists .= "<option value='" . $key['nama'] . "'>" . $key['nama'] . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        foreach ($data as $row) {
            $lists2 .= "<option value='" . $row['kd_pend'] . "'>" . $row['nama'] . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        $callback = array('list_nama2' => $lists, 'list_kd_pend2' => $lists2); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

        echo json_encode($callback); // mengembalikan varibael $callback menjadi JSON
    }

    public function setting()
    {
        $this->load->view('karyawan/setting');
    }

    public function ed_akun()
    {
        $nama       =   $this->input->post('nama');
        $username   =   $this->input->post('username');

        $config['upload_path']    = "./assets_application/assets/faces/";
        $config['allowed_types']  = 'png|jpg|jpeg';
        $config['overwrite']      = true;
        $config['max_size']        = 2048;
        $config['file_name']      = $username;

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

                $berhasil = $this->Model_karyawan->edit_photo($nama, $username, $image);

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
            $username           = $this->input->post('username');
            $pass               = md5($this->input->post('pass'));
            $new_password       = $this->input->post('new_password');
            $confirm_password   = $this->input->post('confirm_password');
            $cek_old_password   = $this->Model_karyawan->cek_old_password($username, $pass);

            if ($cek_old_password == 1) {
                if ($new_password == $confirm_password) {
                    $berhasil = $this->Model_karyawan->ganti_password($username, md5($new_password));
                    $this->session->set_flashdata('statusinsert', 'Password Diganti!!!');
                } else {
                    $this->session->set_flashdata('statusgagal', 'Password Baru Tidak Cocok!!!');
                }
            } else {
                $this->session->set_flashdata('statuslama', 'Password Lama Salah!!!');
            }
        }
        redirect(base_url() . "index.php/Karyawan/setting");
    }

    private function _uploadImage_kel()
    {
        $npp = $this->session->userdata('status_login_username');
        $config['upload_path']   = './assets_application/assets/PrintOUT/karyawan/BioKeluarga/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['overwrite']     = true;
        $config['max_size']      = 2048;
        // $config['max_width']     = 600;
        // $config['max_height']    = 600;
        $config['file_name']     = $npp;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">
				<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
				<span class="icon-sc-cl" aria-hidden="true">x</span>
			</button>' . $error . '</div>');
            return 0;
        } else {
            return $config['file_name'] . $this->upload->data('file_ext');
        }
    }

    private function _uploadImage_pen()
    {
        $npp = $this->session->userdata('status_login_username');
        $config['upload_path']   = './assets_application/assets/PrintOUT/karyawan/pendidikan/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['overwrite']     = true;
        $config['max_size']      = 2048;
        // $config['max_width']     = 600;
        // $config['max_height']    = 600;
        $config['file_name']     = $npp;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">
				<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
				<span class="icon-sc-cl" aria-hidden="true">x</span>
            </button>' . $error . '</div>');
            return 0;
        } else {
            return $config['file_name'] . $this->upload->data('file_ext');
        }
    }

    private function _uploadImage_plthn()
    {
        $npp = $this->session->userdata('status_login_username');
        $config['upload_path']   = './assets_application/assets/PrintOUT/karyawan/pelatihan/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['overwrite']     = true;
        $config['max_size']      = 2048;
        // $config['max_width']     = 600;
        // $config['max_height']    = 600;
        $config['file_name']     = $npp;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">
				<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
				<span class="icon-sc-cl" aria-hidden="true">x</span>
			</button>' . $error . '</div>');
            return 0;
        } else {
            return $config['file_name'] . $this->upload->data('file_ext');
        }
    }

    private function _uploadImage_biodiri()
    {
        $npp = $this->session->userdata('status_login_username');
        $config['upload_path']   = './assets_application/assets/PrintOUT/karyawan/Bio/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['overwrite']     = true;
        $config['max_size']      = 2048;
        // $config['max_width']     = 600;
        // $config['max_height']    = 600;
        $config['file_name']     = $npp;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">
				<button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
				<span class="icon-sc-cl" aria-hidden="true">x</span>
			</button>' . $error . '</div>');
            return 0;
        } else {
            return $config['file_name'] . $this->upload->data('file_ext');
        }
    }

    public function date_range()
    {
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_akhir = $this->input->post('tgl_akhir');

        if ($tgl_mulai != "" and $tgl_akhir != "") {
            $begin = new DateTime($tgl_mulai);
            $end   = new DateTime($tgl_akhir);

            $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);
            //mendapatkan range antara dua tanggal dan di looping
            $i   = 0;
            $x   = 0;
            $end = 1;

            foreach ($daterange as $date) {
                $daterange = $date->format("Y-m-d");
                $datetime  = DateTime::createFromFormat('Y-m-d', $daterange);

                //Convert tanggal untuk mendapatkan nama hari
                $day         = $datetime->format('D');

                //Check untuk menghitung yang bukan hari sabtu dan minggu
                if ($day != "Sun" && $day != "Sat") {
                    //echo $i;
                    $x += $end - $i;
                }
                $end++;
                $i++;
            }
            if ($x == 0) {
                $x == 1;
            }

            echo json_encode($x);
        }
    }

    public function time_range()
    {
        $jam_awal   = $this->input->post('jam_awal');
        $jam_akhir  = $this->input->post('jam_akhir');

        if ($jam_awal != "" and $jam_akhir != "") {
            $start  = strtotime($jam_awal);
            $end    = strtotime($jam_akhir);

            $diff = $start - $end;
            $jam   = floor($diff / (60 * 60));
            $menit = $diff - $jam * (60 * 60);
            $selisih = $jam . floor($menit / 60);
            echo json_encode($jam);
        }
    }
}
