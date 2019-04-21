<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
class su_admin extends CI_Controller
    {
        function __construct() 
        {
            parent::__construct();
            $this->load->model('Model_su_admin');
            $this->load->helper(array('form', 'url'));
            $this->load->model('Model_login');

            if(empty($_SESSION['status_login'])){
                redirect('Welcome/index_su');
            }

            
        }

        public function in_suadmin()
        {
            
            $this->load->view('super admin/in_suadmin');
        }
        
        public function tabel_akryawan()
        {
            $data['ptg']	=	$this->Model_su_admin->show_ptg();
            $this->load->view('super admin/dt_kar',$data);
        }

        public function t_kar()
        {
            $this->load->view('super admin/input_kar');
        }

        public function input_karyawan()
        {
            $nama		= 	$this->input->post('nama',true);
            $alamat		= 	$this->input->post('alamat',true);
            $tlp 		= 	$this->input->post('tlp',true);
            $email 		= 	$this->input->post('email',true);
            $username 	= 	$this->input->post('username',true);
            $password 	= 	$this->input->post('pass',true);
            $kpassword 	= 	$this->input->post('kpassword',true);

            if($password == $kpassword)
            {
                $md5 		= 	md5($password);
                $berhasil 	= 	$this->Model_su_admin->insert(	$nama,
                                                                $alamat,
                                                                $tlp,
                                                                $email,
                                                                $username,
                                                                $md5
                                                            );

                if($berhasil == 1)
                {
                    $data['status_insert'] 	= 	"Data Berhasil Diinput";
                    echo json_encode('Data Berhasil Diinput');
                    
                }
                else
                {
                    $data['status_insert'] 	= 	"Data Gagal Diinput";
                    echo json_encode('Data Gagal Diinput');
                
                }
        
            }	
            else
            {
                $data['status_insert'] 	= 	"Password Tidak Cocok";
                echo json_encode('Password Tidak Cocok');
            
            }
        }

        public function delete()
        {
            $id 	= 	$this->input->post('id');
            $valid 	= 	$this->input->post('valid');
            $delete	=	$this->Model_su_admin->delete($id,$valid);

            if($delete == 1)
            {
                redirect('su_admin/edit_karyawan');
            }
        }

        public function edit_karyawan()
        {
            if(isset($_POST['submit']))
            {
                $nama 		= 	$this->input->post('nama',true);
                $alamat 	= 	$this->input->post('alamat',true);
                $tlp 		= 	$this->input->post('tlp',true);
                $email 		= 	$this->input->post('email',true);
                $username 	= 	$this->input->post('username',true);

                $berhasil 	= 	$this->Model_su_admin->update($nama,$alamat,$tlp,$email,$username);

                if($berhasil==1)
                {
                    $data['ptg']			=	$this->Model_su_admin->show_ptg();
                    $data['status_edit'] 	= 	"Berhasil Di Edit";

                    $this->load->view('super admin/edit_kar',$data);
                }
                else
                {
                    $data['ptg']			=	$this->Model_su_admin->show_ptg();
                    $data['status_edit'] 	= 	"Gagal Edit";

                    $this->load->view('super admin/edit_kar',$data);
                }
            }
            else
            {
                $data['ptg']			=	$this->Model_su_admin->show_ptg();
                $data['status_edit'] 	= 	"";

                $this->load->view('super admin/edit_kar',$data);
            }
            
        }

        function select_user()
        {
            $level=$this->input->post('level');
            $dataptg=$this->Model_su_admin->tampil_ptg('tb_login',$level)->result();
            echo json_encode($dataptg);
	    }
    }
    
?>