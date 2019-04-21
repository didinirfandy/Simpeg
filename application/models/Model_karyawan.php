<?php

    class model_karyawan extends CI_Model
    {
        function bio_diri()
        {
            return $query = $this->db->query(
                "SELECT * FROM sdm01 where npp='".$this->session->userdata('status_login')."'")->result_array();
        }

        // Biodata Diri
        function get_bio()
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
            return $quety = $this->db->query(
                "SELECT gol.kd_gol, gol.gol
                FROM gol
                JOIN sdm16 ON gol.kd_gol = sdm16.golongan
                WHERE gol.kd_gol = $golongan
                GROUP BY gol.kd_gol"
            )->result_array();
        }

        // Biodata Keluarga
        function get_bio_kel()
        {
            $npp = $this->session->userdata('status_login_username');
            $this->db->SELECT('sdm02.no_urut, sdm02.nama, sdm02.hbg_klg, sdm02.kota_lhr, sdm02.tgl_lhr, sdm02.tgl_lhr, sdm02.gol_darah, sdm02.tk_ped');
            $this->db->FROM('sdm02');
            $this->db->WHERE('sdm02.npp', $npp);
            $this->db->ORDER_BY('sdm02.no_urut ASC');
            return $query = $this->db->GET()->result_array();
        }
        
        function hubungan($hbg_klg)
        {
            return $query = $this->db->query(
                "SELECT hubungan.hbg_klg, hubungan.nama
                FROM hubungan
                JOIN sdm02 ON hubungan.hbg_klg = sdm02.hbg_klg
                WHERE hubungan.hbg_klg = '$hbg_klg'
                GROUP BY hubungan.hbg_klg = sdm02.hbg_klg"
                )->result_array();
        }

        function almt($npp)
        {
            $npp = $this->session->userdata('status_login_username');
            $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm08 where npp = $npp group by npp")->result_array();
            $no = $no_urut[0]['no_urut'];
            
            return $query = $this->db->query(
                "SELECT sdm08.kd_unit
                FROM sdm08
                JOIN sdm01 ON sdm08.npp = sdm01.npp
                WHERE sdm08.npp = $npp
                AND sdm08.no_urut = $no"
            )->result_array();
        }

        function unit($kd_unit)
        {
            return $query = $this->db->query(
                "SELECT unit.kd_kebun, unit.nm_unit
                FROM unit
                JOIN sdm08 ON unit.kd_kebun = sdm08.kd_unit
                WHERE unit.kd_kebun = $kd_unit
                GROUP BY unit.kd_kebun"
            )->result_array();
        }

        // Riwayat Pekerjaan 
        function get_mutasi()
        {
            $npp = $this->session->userdata('status_login_username');
            $this->db->SELECT('sdm16.no_urut, sdm16.golongan, sdm16.mk, sdm16.tmt, sdm16.jns_naik, sdm16.no_sk, sdm16.tgl_sk, sdm16.npp_jbt');
            $this->db->FROM('sdm16');
            $this->db->WHERE('sdm16.npp', $npp);
            $this->db->ORDER_BY('sdm16.no_urut ASC');
            return $query = $this->db->GET()->result_array();
        }

        function get_naik($jns_naik)
        {
            return $query = $this->db->query(
                "SELECT naik.jns_naik, naik.nama
                FROM naik
                JOIN sdm16 ON naik.jns_naik = sdm16.jns_naik
                WHERE naik.jns_naik = $jns_naik
                GROUP BY naik.jns_naik"
            )->result_array();
        }
        
        function get_sdm08()
        {
            $npp = $this->session->userdata('status_login_username');
            $this->db->SELECT('sdm08.no_urut, sdm08.jabatan, sdm08.kd_unit, sdm08.tmt, sdm08.no_sk, sdm08.tgl_sk, sdm08.npp_jbt');
            $this->db->FROM('sdm08');
            $this->db->WHERE('sdm08.npp', $npp);
            $this->db->ORDER_BY('sdm08.no_urut ASC');
            return $query = $this->db->GET()->result_array();
        }

        function get_jab($jabatan)
        {
            return $query = $this->db->query(
                "SELECT jab.jabatan, jab.nama
                FROM jab
                JOIN sdm08 ON jab.jabatan = sdm08.jabatan
                WHERE jab.jabatan = $jabatan
                GROUP BY jab.jabatan"
            )->result_array();
        }
        
        // PENDIDIKAN FORMAL
        function get_sdm03()
        {
            $npp = $this->session->userdata('status_login_username');
            $this->db->SELECT('sdm03.no_urut, sdm03.kd_pend, sdm03.ket, sdm03.kota, sdm03.thn_awal, sdm03.thn_akhir, sdm03.no_ijasah, sdm03.tgl_ijasah');
            $this->db->FROM('sdm03');
            $this->db->WHERE('sdm03.npp', $npp);
            $this->db->ORDER_BY('sdm03.no_urut ASC');
            return $query = $this->db->GET()->result_array();
        }

        function get_pddk($kd_pend)
        {
            return $query = $this->db->query(
                "SELECT pend.kd_pend, pend.nm_pend
                FROM pend
                JOIN sdm03 ON pend.kd_pend = sdm03.kd_pend
                WHERE pend.kd_pend = '$kd_pend'
                GROUP BY pend.kd_pend"
            )->result_array();
        }

        function get_sdm04()
        {
            $npp = $this->session->userdata('status_login_username');
            $this->db->SELECT('sdm04.no_urut, sdm04.ket, sdm04.nama, sdm04.no_sert');
            $this->db->FROM('sdm04');
            $this->db->WHERE('sdm04.npp', $npp);
            $this->db->ORDER_BY('sdm04.no_urut ASC');
            return $query = $this->db->GET()->result_array();
        }
        
    }

?>