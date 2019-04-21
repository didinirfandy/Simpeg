<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_karyawan');
        $this->load->model('Model_admin');
        $this->load->model('Model_login');
        $this->load->helper(array('form', 'url'));

        if(empty($_SESSION['status_login'])){
            redirect('Welcome/index');
        }

        
    }
    
    public function index()
    {
        $this->load->view('login');
    }

    public function in_kar()
	{
		$this->load->view('karyawan/in_kar');
	}
    
    public function data_diri()
    {
        $page   =   $this->uri->segment(3);

        switch($page)
        {
            case 'biodiri':
                $data['t_biodiri'] = $this->Model_karyawan->get_bio();
                $this->load->view('karyawan/data/data diri/bio_diri', $data);
            
            break;

            case 'biokel':

                $data['t_kel']     = $this->Model_karyawan->get_bio_kel();
                $this->load->view('karyawan/data/data diri/bio_kel', $data);

            break;
        }
    }

    public function riwayat_pekerjaan()
    {
        $page   =   $this->uri->segment(3);

        switch($page)
        {
            case 'ling':
                $data['ta1']    = $this->Model_karyawan->get_bio();
                $data['mutasi'] = $this->Model_karyawan->get_mutasi();
                $data['rjs']    = $this->Model_karyawan->get_sdm08();
                $this->load->view('karyawan/data/riwayat pekerjaan/ling_ptpn', $data);
            
            break;
        }
    }

    public function riwayat_pndidikan()
    {
        $page   =   $this->uri->segment(3);

        switch($page)
        {
            case 'pendformal':
                $data['pend'] = $this->Model_karyawan->get_sdm03();
                $this->load->view('karyawan/data/riwayat pendidikan/pend_formal', $data);
            
            break;
        }
    }


    public function riwayat_pengembangan()
    {
        $page   =   $this->uri->segment(3);

        switch($page)
        {
            case 'pelatihan':
                $data['pela'] = $this->Model_karyawan->get_sdm04();
                $this->load->view('karyawan/data/riwayat pengembangan/pelatihan', $data);
            
            break;

            case 'assessment':
                
            
                $this->load->view('karyawan/data/riwayat pengembangan/assessment');
            
            break;
        }
    }

    public function cetak_cv()
    {
		$this->load->view('karyawan/cv_kar');
    }
    
}
?>