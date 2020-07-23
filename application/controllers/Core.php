<?php
defined('BASEPATH') or exit('No direct script access allowed');

class core extends CI_Controller
{
    function __construct() 
    {
        parent::__construct();
        $this->load->model('Model_login');
    }

    function lg_su()
    {
        if(isset($_POST['submit']))
        {
            
            $username   =   $this->input->post('username',true);
            $password   =   md5($this->input->post('password',true));
            $hasil      =   $this->Model_login->lg_super_admin($username,$password);
            
            if($hasil)
            {
                $this->session->set_userdata('status_login',$username);
                redirect(base_url(). "index.php/su_admin/in_suadmin");
            }
            else
            {
                $this->session->set_userdata('notif','<br><br><div class="alert alert-danger" role="alert">USERNAME ATAU PASSWORD ADA YANG SALAH</div>');
                redirect('Welcome/index_su');
            }
        }
        else
        {
            $this->load->view('form_login');
        }
    }

    function logout_su()
    {
        $username   =   $this->session->userdata('status_login');
                        $this->Model_login->logout_super_admin($username);
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                        Loguot Anda Berhasil</div>');

        redirect('Welcome/index_su');
    }

    function login_kar()
    {
        if(isset($_POST['submit']))
        {
            $username   =   $this->input->post('username',true);
            $password   =   md5($this->input->post('password',true));
            $hasil      =   $this->Model_login->login_karyawan($username, $password);

            if($hasil)
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
				<span class="icon-sc-cl" aria-hidden="true">x</span></button>Login Complete</div>');
                redirect(base_url(). "index.php/karyawan/in_kar");
            }
            else
            {
                $this->session->set_userdata('notif','<br><br><div class="alert alert-danger" role="alert">USERNAME ATAU PASSWORD ADA YANG SALAH</div>');
                redirect('Karyawan/index');
            }
        }
        else
        {
            $this->load->view('form_login');
        }
    }

    function logout_kar()
    {
        $username   =   $this->session->userdata('status_login');
                        $this->Model_login->logout_karyawan($username);
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                        <span class="icon-sc-cl" aria-hidden="true">x</span></button> Loguot Complete, Thank you </div>');
        redirect('Welcome/index');
    }

    function lg_admin()
    {
        if(isset($_POST['submit']))
        {
            
            $username   =   $this->input->post('username',true);
            $password   =   md5($this->input->post('password',true));
            $hasil      =   $this->Model_login->lg_admin($username,$password);
            
            if($hasil)
            {
                $this->session->set_userdata('status_login',$username);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
				<span class="icon-sc-cl" aria-hidden="true">x</span></button>Login Complete</div>');
                redirect(base_url(). "index.php/admin/in_admin");
            }
            else
            {
                $this->session->set_userdata('notif','<br><br><div class="alert alert-danger" role="alert">USERNAME ATAU PASSWORD ADA YANG SALAH</div>');
                redirect('Welcome/index_admin');
            }
        }
        else
        {
            $this->load->view('form_login');
        }
    }

    function logout_admin()
    {
        $username   =   $this->session->userdata('status_login');
                        $this->Model_login->logout_admin($username);
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
                        <span class="icon-sc-cl" aria-hidden="true">x</span></button> Loguot Complete, Thank you  </div>');

        redirect('Welcome/index_admin');
    }
}
