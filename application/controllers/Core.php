<?php

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
                $this->session->set_userdata('notif',"<br>USERNAME ATAU PASSWORD ADA YANG SALAH");
                redirect();
            }
        }
        else
        {
            $this->load->view(form_login);
        }
    }

    function logout_su()
    {
        $username   =   $this->session->userdata('status_login');
                        $this->Model_login->logout_super_admin($username);
                        $this->session->sess_destroy();

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
                redirect(base_url(). "index.php/karyawan/in_kar");
            }
            else
            {
                $this->session->set_userdata('notif',"<br>USERNAME ATAU PASSWORD ADA YANG SALAH");
                redirect();
            }
        }
        else
        {
            $this->load->view(form_login);
        }
    }

    function logout_kar()
    {
        $username   =   $this->session->userdata('status_login');
                        $this->Model_login->logout_karyawan($username);
                        $this->session->sess_destroy();

        redirect();
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
                redirect(base_url(). "index.php/admin/in_admin");
            }
            else
            {
                $this->session->set_userdata('notif',"<br>USERNAME ATAU PASSWORD ADA YANG SALAH");
                redirect();
            }
        }
        else
        {
            $this->load->view(form_login);
        }
    }

    function logout_admin()
    {
        $username   =   $this->session->userdata('status_login');
                        $this->Model_login->logout_admin($username);
                        $this->session->sess_destroy();

        redirect('Welcome/index_admin');
    }
}

?>