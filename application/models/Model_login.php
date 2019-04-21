<?php 

class model_login extends CI_Model {
    
    function login($username,$password)
    {
        $coba = $this->db->get_where('tb_login',array('username'=>$username,'pass'=>$password));

        foreach ($coba->result_array() as $q)
        {
            $valid  =   $q['valid'];
        }
        if($valid==1) 
        {
            $row    =   $coba->row_array();
            if ($coba->num_rows()>0)
            {
                date_default_timezone_set('Asia/Jakarta');

                $date   =   date("Y/m/d H:i:s");  
                $data   =   array('tgl_login'=>$date, 'status'=>1);

                $this->db->where(username, $username);
                $this->db->update(tb_login,$data);

                return $row['level'];
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 0;
        }
    }

    function logout($username)
    {
        $this->db->set(status, 0);
        $this->db->where(username, $username);
        $this->db->update(tb_login);
    }

    function login_karyawan($username,$password)
    {
        $coba = $this->db->get_where('login_karyawan',array('username'=>$username, 'pass'=>$password));

        foreach ($coba->result_array() as $q)
        {
            $this->session->set_userdata('status_login', $q['nama']);
            $this->session->set_userdata('status_login_username', $q['username']);
            $valid  =   $q['valid'];
        }
        if($valid==1) 
        {
            if ($coba->num_rows()>0)
            {
                date_default_timezone_set('Asia/Jakarta');

                $date   =   date("Y/m/d H:i:s");  
                $data   =   array('tgl'=>$date, 'status'=>1);

                $this->db->where(username, $username);
                $this->db->update(login_karyawan,$data);

                return $coba;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 0;
        }
    }

    function logout_karyawan()
    {
        $username = $this->session->userdata('status_login_username');
        $this->db->set(status, 0);
        $this->db->where(username, $username);
        $this->db->update(login_karyawan);
    }

    function lg_admin($username,$password)
    {
        $coba = $this->db->get_where('login_admin',array('username'=>$username,'pass'=>$password));

        foreach ($coba->result_array() as $q)
        {
            $valid  =   $q['valid'];
        }
        if($valid==1) 
        {
            if ($coba->num_rows()>0)
            {
                date_default_timezone_set('Asia/Jakarta');

                $date   =   date("Y/m/d H:i:s");  
                $data   =   array('tgl_login'=>$date, 'status'=>1);

                $this->db->where(username, $username);
                $this->db->update(login_admin,$data);

                return $data;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 0;
        }
    }

    function logout_admin($username)
    {
        $this->db->set(status, 0);
        $this->db->where(username, $username);
        $this->db->update(login_admin);
    }

    function lg_super_admin($username,$password)
    {
        $coba = $this->db->get_where('login_super_admin',array('username'=>$username,'pass'=>$password));

        foreach ($coba->result_array() as $q)
        {
            $valid  =   $q['valid'];
        }
        if($valid==1) 
        {
            if ($coba->num_rows()>0)
            {
                date_default_timezone_set('Asia/Jakarta');

                $date   =   date("Y/m/d H:i:s");  
                $data   =   array('tgl_login'=>$date, 'status'=>1);

                $this->db->where(username, $username);
                $this->db->update(login_super_admin,$data);

                return $data;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 0;
        }
    }

    function logout_super_admin($username)
    {
        $this->db->set(status, 0);
        $this->db->where(username, $username);
        $this->db->update(login_super_admin);
    }
}

?>