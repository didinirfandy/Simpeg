<?php 
    
    class model_cv extends CI_Model
    {   
        function view_bio()
        {
            $npp = $this->session->userdata('status_login_username');
            $this->db->select('sdm01.npp,sdm01.nama,sdm01.kota_lhr,sdm01.tgl_lhr,sdm01.tgl_masuk,sdm01.alamat_tgl,sdm01.agama,sdm01.j_kelamin,sdm01.gol_darah,sdm01.st_sipil');
            $this->db->from('sdm01'); 
            $this->db->where('sdm01.npp',$npp);
            $this->db->group_by('sdm01.npp');       
            return $query = $this->db->get()->result_array(); 
            
        }
        function get_agama()
        {
            return $query = $this->db->query(
                "SELECT agama.kd_agama, agama.nm_agama 
                FROM agama
                JOIN sdm01 ON agama.kd_agama = sdm01.agama
                WHERE agama.kd_agama = sdm01.agama
                GROUP BY agama.kd_agama"
            )->result_array();
        }

        function get_sipil($st_sipil)
        {
            return $query = $this->db->query(
                "SELECT sipil.kd_sipil, sipil.nm_sipil 
                FROM sipil
                JOIN sdm01 ON sipil.kd_sipil = sdm01.st_sipil
                WHERE sipil.kd_sipil = sdm01.st_sipil
                GROUP BY sipil.kd_sipil = sdm01.st_sipil"
            )->result_array();
        }

        function get_jenis_kelamin($j_kelamin)
        {
            return $query = $this->db->query(
                "SELECT tb_kelamin.kd_kelamin, tb_kelamin.nm_kelamin
                FROM tb_kelamin
                JOIN sdm01 ON tb_kelamin.kd_kelamin = sdm01.j_kelamin
                WHERE tb_kelamin.kd_kelamin = sdm01.j_kelamin
                GROUP BY tb_kelamin.kd_kelamin = sdm01.j_kelamin"
            )->result_array();
        }

        // Biodata golongan yang terbaru
        function get_gol_akhir($npp)
        {
            $npp = $this->session->userdata('status_login_username');
            $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm16 where npp = $npp group by npp")->result_array();
            $no = $no_urut[0]['no_urut'];
            return $query = $this->db->query(
                "SELECT sdm16.golongan, sdm16.mk from sdm16
                    JOIN sdm01 ON sdm16.npp = sdm01.npp
                    where sdm16.npp= $npp AND sdm16.no_urut=$no"
            )->result_array();
        }

        function get_gol($golongan)
        {
            $quety = $this->db->SELECT('gol.kd_gol, gol.gol')->FROM('gol')->JOIN('sdm16 ON gol.kd_gol = sdm16.golongan')->WHERE('gol.kd_gol = $golongan')->GROUP_BY(' gol.kd_gol')->get();
            return $query->row()->average_score();
        }
    }

?>