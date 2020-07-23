<?php

class model_karyawan extends CI_Model
{
    function bio_diri()
    {
        return $this->db->query(
            "SELECT * FROM sdm01 where npp='" . $this->session->userdata('status_login') . "'"
        )->result_array();
    }

    // Biodata Diri
    function get_bio()
    {
        $npp = $this->session->userdata('status_login_username');
        $this->db->select('*');
        $this->db->from('sdm01');
        $this->db->where('sdm01.npp', $npp);
        $this->db->group_by('sdm01.npp');
        return $this->db->get()->result_array();
    }

    function get_agama($agama)
    {
        return $this->db->query(
            "SELECT agama.kd_agama, agama.nm_agama 
                FROM agama
                JOIN sdm01 ON agama.kd_agama = sdm01.agama
                WHERE agama.kd_agama = '$agama'
                GROUP BY agama.kd_agama = sdm01.agama"
        )->result_array();
    }

    function get_sipil($st_sipil)
    {
        return $this->db->query(
            "SELECT sipil.kd_sipil, sipil.nm_sipil 
                FROM sipil
                JOIN sdm01 ON sipil.kd_sipil = sdm01.st_sipil
                WHERE sipil.kd_sipil = '$st_sipil'
                GROUP BY sipil.kd_sipil = sdm01.st_sipil"
        )->result_array();
    }

    function get_jenis_kelamin($j_kelamin)
    {
        return $this->db->query(
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
        return $this->db->query(
            "SELECT sdm16.golongan, sdm16.mk from sdm16
                    JOIN sdm01 ON sdm16.npp = sdm01.npp
                    where sdm16.npp = $npp AND sdm16.no_urut = $no"
        )->result_array();
    }

    function get_gol_ak($npp)
    {
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm16 where npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        return $this->db->query(
            "SELECT sdm16.golongan, sdm16.mk from sdm16
                    JOIN sdm01 ON sdm16.npp = sdm01.npp
                    where sdm16.npp = $npp AND sdm16.no_urut = $no"
        )->result_array();
    }

    function get_jab_akhir($npp)
    {
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm08 where npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        $query = $this->db->query(
            "SELECT sdm08.npp, sdm08.no_urut, sdm08.jabatan from sdm08
                    where sdm08.npp = $npp and sdm08.no_urut = $no"
        );
        return $query->result_array();
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
        $this->db->SELECT('*');
        $this->db->FROM('sdm02');
        $this->db->WHERE('sdm02.npp', $npp);
        $this->db->ORDER_BY('sdm02.no_urut ASC');
        return $this->db->GET()->result_array();
    }

    function get_sdm02_no($npp)
    {
        $npp = $this->session->userdata('status_login_username');
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm02 where npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        $query = $this->db->query(
            "SELECT sdm02.no_urut from sdm02
                    where sdm02.npp = $npp and sdm02.no_urut = $no"
        );
        return $query->result_array();
    }

    function get_sdm02_urut($no)
    {
        $npp = $this->session->userdata('status_login_username');
        $this->db->SELECT('*');
        $this->db->FROM('sdm02');
        $this->db->WHERE('sdm02.no_urut', $no);
        $this->db->WHERE('sdm02.npp', $npp);
        $this->db->ORDER_BY('sdm02.no_urut ASC');
        return $this->db->GET()->result_array();
    }

    function hubungan($hbg_klg)
    {
        return $this->db->query(
            "SELECT hubungan.hbg_klg, hubungan.nama
                FROM hubungan
                JOIN sdm02 ON hubungan.hbg_klg = sdm02.hbg_klg
                WHERE hubungan.hbg_klg = '$hbg_klg'
                GROUP BY hubungan.hbg_klg = sdm02.hbg_klg"
        )->result_array();
    }

    function tk_pend($tk_pend)
    {
        return $this->db->query(
            "SELECT tk_pend.tk_pend, tk_pend.nm_tkpend
            FROM tk_pend
            JOIN sdm02 sdm03 ON tk_pend.tk_pend = sdm02.tk_pend ON tk_pend.tk_pend = sdm03.tk_pend
            WHERE tk_pend.tk_pend = '$tk_pend'
            GROUP BY tk_pend.tk_pend = sdm02.tk_pend tk_pend.tk_pend = sdm03.tk_pend"
        )->result_array();
    }

    function almt($npp)
    {
        $npp = $this->session->userdata('status_login_username');
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm08 where npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];

        return $this->db->query(
            "SELECT sdm08.kd_unit
                FROM sdm08
                JOIN sdm01 ON sdm08.npp = sdm01.npp
                WHERE sdm08.npp = $npp
                AND sdm08.no_urut = $no"
        )->result_array();
    }

    function unit($kd_unit)
    {
        return $this->db->query(
            "SELECT unit.kd_kebun, unit.nm_unit
                FROM unit
                JOIN sdm08 ON unit.kd_kebun = sdm08.kd_unit
                WHERE unit.kd_kebun = $kd_unit
                GROUP BY unit.kd_kebun"
        )->result_array();
    }

    // Riwayat Pekerjaan 
    function get_sdm16()
    {
        $npp = $this->session->userdata('status_login_username');
        return $this->db->query(
            "SELECT sdm16.no_urut, naik.nama, gol.gol, sdm16.mk, sdm16.tmt, sdm16.no_sk, sdm16.tgl_sk, sdm16.npp_jbt
            FROM sdm16 
            LEFT JOIN gol on sdm16.golongan = gol.kd_gol
            LEFT JOIN naik ON sdm16.jns_naik = naik.jns_naik
            WHERE sdm16.npp = $npp
            GROUP by sdm16.no_urut"
        )->result_array();
    }

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
        return $this->db->query(
            "SELECT naik.jns_naik, naik.nama
                FROM naik
                JOIN sdm16 ON naik.jns_naik = sdm16.jns_naik
                WHERE naik.jns_naik = $jns_naik
                GROUP BY naik.jns_naik"
        )->result_array();
    }

    function get_rjs()
    {
        $npp = $this->session->userdata('status_login_username');
        return $this->db->query(
            "SELECT sdm08.npp, sdm08.no_urut, sdm08.tmt, sdm08.no_sk, sdm08.tgl_sk, sdm08.npp_jbt, jab.nama, unit.nm_unit
            FROM sdm08 
            LEFT JOIN jab on sdm08.jabatan = jab.jabatan
            LEFT JOIN unit ON sdm08.kd_unit = unit.kd_kebun
            WHERE sdm08.npp = $npp
            GROUP by sdm08.no_urut"
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

    function get_sdm08_no($no)
    {
        $npp = $this->session->userdata('status_login_username');
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm08 where npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        $query = $this->db->query(
            "SELECT sdm08.npp, sdm08.no_urut, sdm08.jabatan from sdm08
                    where sdm08.npp = $npp and sdm08.no_urut = $no"
        );
        return $query->result_array();
    }

    function get_jab_npp($npp)
    {
        $npp = $this->session->userdata('status_login_username');
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm08 where npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        $query = $this->db->query(
            "SELECT sdm08.npp, sdm08.no_urut, sdm08.jabatan from sdm08
                    where sdm08.npp = $npp and sdm08.no_urut = $no"
        );
        return $query->result_array();
    }

    function get_jab($jabatan)
    {
        return $this->db->query(
            "SELECT jab.jabatan, jab.nama, jab.kd_menu
            FROM jab
            JOIN sdm08 ON jab.jabatan = sdm08.jabatan
            WHERE jab.jabatan = $jabatan
            GROUP BY jab.jabatan"
        )->result_array();
    }

    function get_kd_menu($npp)
    {
        $npp = $this->session->userdata('status_login_username');
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm08 WHERE npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        return $this->db->query(
            " SELECT * FROM sdm08 
            LEFT JOIN jab ON sdm08.jabatan = jab.jabatan 
            WHERE sdm08.npp = '$npp' AND sdm08.no_urut = '$no' 
            GROUP BY sdm08.npp "
        )->result_array();
    }

    // PENDIDIKAN FORMAL
    function get_sdm03()
    {
        $npp = $this->session->userdata('status_login_username');
        $this->db->SELECT('*');
        $this->db->FROM('sdm03');
        $this->db->WHERE('sdm03.npp', $npp);
        $this->db->ORDER_BY('sdm03.no_urut ASC');
        return $this->db->GET()->result_array();
    }

    function get_sdm03_urut($no)
    {
        $npp = $this->session->userdata('status_login_username');
        $this->db->SELECT('*');
        $this->db->FROM('sdm03');
        $this->db->WHERE('sdm03.no_urut', $no);
        $this->db->WHERE('sdm03.npp', $npp);
        $this->db->ORDER_BY('sdm03.no_urut ASC');
        return $this->db->GET()->result_array();
    }

    function get_sdm03_no($npp)
    {
        $npp = $this->session->userdata('status_login_username');
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm03 where npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        $query = $this->db->query(
            "SELECT sdm03.no_urut from sdm03
                    where sdm03.npp = $npp and sdm03.no_urut = $no"
        );
        return $query->result_array();
    }

    function get_pddk($kd_pend)
    {
        return $this->db->query(
            "SELECT pend.kd_pend, pend.nama
                FROM pend
                JOIN sdm03 ON pend.kd_pend = sdm03.kd_pend
                WHERE pend.kd_pend = '$kd_pend'
                GROUP BY pend.kd_pend"
        )->result_array();
    }

    // PELATIHAN
    function get_sdm04()
    {
        $npp = $this->session->userdata('status_login_username');
        $this->db->SELECT('*');
        $this->db->FROM('sdm04');
        $this->db->WHERE('sdm04.npp', $npp);
        $this->db->ORDER_BY('sdm04.no_urut ASC');
        return $this->db->GET()->result_array();
    }

    function get_sdm04_no($npp)
    {
        $npp = $this->session->userdata('status_login_username');
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm04 where npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        $query = $this->db->query(
            "SELECT sdm04.no_urut from sdm04
                    where sdm04.npp = $npp and sdm04.no_urut = $no"
        );
        return $query->result_array();
    }

    function get_sdm04_urut($no)
    {
        $npp = $this->session->userdata('status_login_username');
        $this->db->SELECT('*');
        $this->db->FROM('sdm04');
        $this->db->WHERE('sdm04.no_urut', $no);
        $this->db->WHERE('sdm04.npp', $npp);
        $this->db->ORDER_BY('sdm04.no_urut ASC');
        return $this->db->GET()->result_array();
    }

    function pend02()
    {
        return $this->db->query("SELECT kd_pend, nama FROM pend")->result_array();
    }

    function get_pend($kd_pend)
    {
        return $this->db->query(
            "SELECT pend.kd_pend, pend.nama
                FROM pend
                JOIN sdm04 ON pend.kd_pend = sdm04.kd_pend
                WHERE pend.kd_pend = '$kd_pend'
                GROUP BY pend.kd_pend"
        )->result_array();
    }

    function get_tk_pend($tk_pend)
    {
        return $this->db->query(
            "SELECT tk_pend.tk_pend, tk_pend.nm_tkpend
                FROM tk_pend
                JOIN sdm03 ON tk_pend.tk_pend = sdm03.tk_pend
                WHERE tk_pend.tk_pend = '$tk_pend'
                GROUP BY tk_pend.tk_pend"
        )->result_array();
    }

    function get_sdm14()
    {
        $npp = $this->session->userdata('status_login_username');
        $this->db->SELECT('sdm14.no_urut, sdm14.jns_hukum, sdm14.uraian, sdm14.no_sk, sdm14.tgl_sk, sdm14.tmt, sdm14.masa_berlaku');
        $this->db->FROM('sdm14');
        $this->db->WHERE('sdm14.npp', $npp);
        $this->db->ORDER_BY('sdm14.no_urut ASC');
        return $this->db->GET()->result_array();
    }

    function get_no_id()
    {
        $id = $this->session->userdata('status_id');
        return $this->db->query("SELECT * FROM login_karyawan WHERE id='$id' GROUP BY id='$id'")->result_array();
    }

    function get_id($id)
    {
        return $this->db->query("SELECT * FROM login_karyawan WHERE id='$id' GROUP BY id='$id'")->result_array();
    }

    function tkpend()
    {
        return $this->db->query("SELECT * FROM tk_pend")->result_array();
    }

    function nilai($npp)
    {
        return $this->db->query("SELECT * FROM hsl_nilai WHERE npp = '$npp' GROUP BY npp = '$npp' ")->result_array();
    }

    function jmlh_c_sakit($npp)
    {
        $query = $this->db->get_where('tb_cuti_sakit', array('npp' => $npp));
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function jmlh_c_pjg($npp)
    {
        $query = $this->db->get_where('tb_cuti_pjg', array('npp' => $npp));
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function jmlh_c_thn($npp)
    {
        $query = $this->db->get_where('tb_cuti_thn', array('npp' => $npp));
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function jmlh_hsl_p_lmbr($npp)
    {
        $query = $this->db->get_where('hsl_p_lmbr', array('npp' => $npp));
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function kode_lmbr()
    {
        $this->db->select_max('kode_lmbr');
        $hasil = $this->db->get('p_lmbr');
        foreach ($hasil->result_array() as $j) {
            $kode = 1 + $j['kode_lmbr'];
        }
        return $kode;
    }

    function tambah_lmbr($db, $data)
    {
        $berhasil = $this->db->insert($db, $data);
        if ($berhasil) {
            return 1;
        } else {
            return 0;
        }
    }

    function show_id_lmbr($kode_lmbr)
    {
        return $this->db->get_where('p_lmbr', array('kode_lmbr' => $kode_lmbr));
    }

    function tampil_lmbr($db, $kode_lmbr)
    {
        return $this->db->get_where($db, array('kode_lmbr' => $kode_lmbr));
    }

    function delete_p_lmbr($db, $id_p_lmbr)
    {
        $this->db->delete($db, array('id_p_lmbr' => $id_p_lmbr));
    }

    function tb_cuti_pjg()
    {
        $npp = $this->session->userdata('status_login_username');
        return $this->db->query(
            "SELECT * FROM cuti_pjg 
            WHERE npp = $npp"
        )->result_array();
    }

    function tb_cuti_thn()
    {
        $npp = $this->session->userdata('status_login_username');
        return $this->db->query(
            "SELECT * FROM cuti_thn 
            WHERE npp = $npp"
        )->result_array();
    }

    function tb_cuti_sakit()
    {
        $npp = $this->session->userdata('status_login_username');
        return $this->db->query(
            "SELECT * FROM cuti_sakit 
            WHERE npp = $npp"
        )->result_array();
    }

    function tb_p_lmbr()
    {
        $npp = $this->session->userdata('status_login_username');
        return $this->db->query(
            "SELECT * FROM p_lmbr 
            WHERE npp = $npp"
        )->result_array();
    }

    function kasubdiv($npp)
    {
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm08 WHERE npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        return $this->db->query(
            "SELECT * FROM sdm08
            LEFT JOIN jab ON sdm08.jabatan = jab.jabatan
            WHERE sdm08.npp = $npp AND sdm08.no_urut = $no "
        )->row_array();
    }

    function get_cuti_thn_subdiv($kasubdiv)
    {
        return $this->db->query(
            "SELECT * FROM cuti_thn
            LEFT JOIN jab ON cuti_thn.kd_jabatan = jab.jabatan
            WHERE jab.kd_menu LIKE '$kasubdiv%' 
            AND jab.kd_menu NOT LIKE '8342'
            "
        )->result_array();
    }

    function get_cuti_pjg_subdiv($kasubdiv)
    {
        return $this->db->query(
            "SELECT * FROM cuti_pjg
            LEFT JOIN jab ON cuti_pjg.kd_jabatan = jab.jabatan
            WHERE jab.kd_menu LIKE '$kasubdiv%' 
            AND jab.kd_menu NOT LIKE '8342'
            "
        )->result_array();
    }

    function get_cuti_sakit_subdiv($kasubdiv)
    {
        return $this->db->query(
            "SELECT * FROM cuti_sakit
            LEFT JOIN jab ON cuti_sakit.kd_jabatan = jab.jabatan
            WHERE jab.kd_menu LIKE '$kasubdiv%' 
            AND jab.kd_menu NOT LIKE '8342'
            "
        )->result_array();
    }

    function post_cuti_thn_subdiv($kasubdiv)
    {
        return $this->db->query(
            "SELECT * FROM cuti_thn
            LEFT JOIN jab ON cuti_thn.kd_jabatan = jab.jabatan
            WHERE jab.kd_menu LIKE '$kasubdiv%' 
            AND cuti_thn.valid NOT LIKE '3'
            AND cuti_thn.valid NOT LIKE '2' 
            AND jab.kd_menu NOT LIKE '8342'
            "
        )->result_array();
    }

    function post_cuti_pjg_subdiv($kasubdiv)
    {
        return $this->db->query(
            "SELECT * FROM cuti_pjg
            LEFT JOIN jab ON cuti_pjg.kd_jabatan = jab.jabatan
            WHERE jab.kd_menu LIKE '$kasubdiv%' 
            AND cuti_pjg.valid NOT LIKE '3'
            AND cuti_pjg.valid NOT LIKE '2' 
            AND jab.kd_menu NOT LIKE '8342'
            "
        )->result_array();
    }

    function post_cuti_sakit_subdiv($kasubdiv)
    {
        return $this->db->query(
            "SELECT * FROM cuti_sakit
            LEFT JOIN jab ON cuti_sakit.kd_jabatan = jab.jabatan
            WHERE jab.kd_menu LIKE '$kasubdiv%' 
            AND cuti_sakit.valid NOT LIKE '3' 
            AND cuti_sakit.valid NOT LIKE '2' 
            AND jab.kd_menu NOT LIKE '8342'
            "
        )->result_array();
    }

    function post_lembur($npp)
    {
        $npp        = $this->session->userdata('status_login_username');
        return $this->db->query(
            "SELECT * FROM p_lmbr 
            WHERE npp='$npp' 
            AND valid NOT LIKE '3'
            AND valid NOT LIKE '2'
            AND p_lmbr.kd_menu NOT LIKE '8342'
            GROUP BY npp='$npp' "
        )->result_array();
    }

    function get_lembur($kasubdiv)
    {
        return $this->db->query(
            "SELECT * FROM p_lmbr
            LEFT JOIN jab ON p_lmbr.kd_menu = jab.kd_menu
            WHERE jab.kd_menu LIKE '$kasubdiv%' 
            AND jab.kd_menu NOT LIKE '8342'
            AND jab.kd_menu NOT LIKE '8311'
            GROUP BY p_lmbr.npp
            "
        )->result_array();
    }

    function get_kadiv($kasubdiv)
    {
        $a = str_split($kasubdiv, 3);
        $aa = $a[0] . '0';
        return $this->db->query(
            "SELECT sdm08.npp, sdm08.jabatan FROM sdm08
            LEFT JOIN jab ON sdm08.jabatan = jab.jabatan
            WHERE jab.kd_menu = '$aa'
        "
        )->result_array();
    }

    function get_nilai($kasubdiv)
    {
        return $this->db->query(
            "SELECT * FROM hsl_nilai
            WHERE kd_menu LIKE '$kasubdiv%'"
        )->result_array();
    }

    function get_nilai_subdiv($npp)
    {
        return $this->db->query(
            "SELECT * FROM hsl_nilai
            WHERE npp_ats_pmpn = '$npp' "
        )->result_array();
    }

    function get_subdiv($kasubdiv)
    {
        return $this->db->query(
            "SELECT sdm08.npp, sdm08.jabatan, jab.nama, jab.kd_menu, sdm01.nama AS nm_sdm01
            FROM sdm08
            LEFT JOIN jab ON sdm08.jabatan = jab.jabatan
            LEFT JOIN sdm01 ON sdm08.npp = sdm01.npp
            WHERE jab.kd_menu LIKE '$kasubdiv%' 
            AND jab.kd_menu NOT LIKE '8342'
            AND jab.kd_menu NOT LIKE '8311'
            "
        )->result_array();
    }

    function quota_cuti_thn_sub($kasubdiv)
    {
        return $this->db->query("SELECT * FROM (
            SELECT tb_cuti_thn.npp, tb_cuti_thn.jns_cuti, jab.jabatan, jab.kd_menu, tb_cuti_thn.valid, sdm01.nama, 12-SUM(tb_cuti_thn.jmlh_hari) AS sisa_tb_cuti_thn 
                    FROM tb_cuti_thn
                    JOIN sdm01 ON tb_cuti_thn.npp = sdm01.npp
                    JOIN jab ON tb_cuti_thn.kd_jabatan = jab.jabatan
                    WHERE YEAR(tb_cuti_thn.tgl_mulai)=YEAR(now())
                    AND jab.kd_menu LIKE '$kasubdiv%'
                    AND jab.kd_menu NOT LIKE '8342'
                    GROUP BY tb_cuti_thn.npp
            
            UNION

            SELECT tb_cuti_thn.npp, tb_cuti_thn.jns_cuti, jab.jabatan, jab.kd_menu, tb_cuti_thn.valid, sdm01.nama, 12 AS sisa_tb_cuti_thn
                    FROM tb_cuti_thn
                    JOIN sdm01 ON tb_cuti_thn.npp = sdm01.npp
                    JOIN jab ON tb_cuti_thn.kd_jabatan = jab.jabatan
                    WHERE YEAR(tb_cuti_thn.tgl_mulai)=YEAR(now())
                    AND jab.kd_menu LIKE '$kasubdiv%'
                    AND jab.kd_menu NOT LIKE '8342'
                    GROUP BY tb_cuti_thn.npp
            
            ) AS semua
                
            GROUP BY semua.npp")->result_array();
    }

    function quota_cuti_pjg_sub($kasubdiv)
    {
        return $this->db->query("SELECT * FROM (
            SELECT tb_cuti_pjg.npp, tb_cuti_pjg.jns_cuti, jab.jabatan, jab.kd_menu, tb_cuti_pjg.valid, sdm01.nama, 30-SUM(tb_cuti_pjg.jmlh_hari) AS sisa_tb_cuti_pjg 
                    FROM tb_cuti_pjg
                    JOIN sdm01 ON tb_cuti_pjg.npp = sdm01.npp
                    JOIN jab ON tb_cuti_pjg.kd_jabatan = jab.jabatan
                    WHERE YEAR(tb_cuti_pjg.tgl_mulai)=YEAR(now())
                    AND jab.kd_menu LIKE '$kasubdiv%'
                    GROUP BY tb_cuti_pjg.npp
            
            UNION

            SELECT tb_cuti_pjg.npp, tb_cuti_pjg.jns_cuti, jab.jabatan, jab.kd_menu, tb_cuti_pjg.valid, sdm01.nama, 30 AS sisa_tb_cuti_pjg
                    FROM tb_cuti_pjg
                    JOIN sdm01 ON tb_cuti_pjg.npp = sdm01.npp
                    JOIN jab ON tb_cuti_pjg.kd_jabatan = jab.jabatan
                    WHERE jab.kd_menu LIKE '$kasubdiv%'
                    GROUP BY tb_cuti_pjg.npp
            
            ) AS semua
                
            GROUP BY semua.npp")->result_array();
    }

    function quota_cuti_sakit_sub($kasubdiv)
    {
        return $this->db->query("SELECT * FROM (
            SELECT tb_cuti_sakit.npp, tb_cuti_sakit.jns_cuti, jab.jabatan, jab.kd_menu, tb_cuti_sakit.valid, sdm01.nama, 12-SUM(tb_cuti_sakit.jmlh_hari) AS sisa_tb_cuti_sakit 
                    FROM tb_cuti_sakit
                    JOIN sdm01 ON tb_cuti_sakit.npp = sdm01.npp
                    JOIN jab ON tb_cuti_sakit.kd_jabatan = jab.jabatan
                    WHERE YEAR(tb_cuti_sakit.tgl_mulai)=YEAR(now())
                    AND jab.kd_menu LIKE '$kasubdiv%'
                    AND tb_cuti_sakit.valid = 2
                    GROUP BY tb_cuti_sakit.npp
            
            UNION

            SELECT tb_cuti_sakit.npp, tb_cuti_sakit.jns_cuti, jab.jabatan, jab.kd_menu, tb_cuti_sakit.valid, sdm01.nama, 12 AS sisa_tb_cuti_sakit
                    FROM tb_cuti_sakit
                    JOIN sdm01 ON tb_cuti_sakit.npp = sdm01.npp
                    JOIN jab ON tb_cuti_sakit.kd_jabatan = jab.jabatan
                    WHERE jab.kd_menu LIKE '$kasubdiv%'
                    GROUP BY tb_cuti_sakit.npp
            
            ) AS semua
                
            GROUP BY semua.npp")->result_array();
    }

    function get_cuti_thn_kadiv($kasubdiv)
    {
        $a = str_split($kasubdiv, 3);
        $kd = $a[0] . '2';
        return $this->db->query(
            "SELECT * FROM cuti_thn
            LEFT JOIN jab ON cuti_thn.kd_jabatan = jab.jabatan
            WHERE jab.kd_menu LIKE '$kd%' "
        )->result_array();
    }

    function get_cuti_pjg_kadiv($kasubdiv)
    {
        $a = str_split($kasubdiv, 3);
        $kd = $a[0] . '2';
        return $this->db->query(
            "SELECT * FROM cuti_pjg
            LEFT JOIN jab ON cuti_pjg.kd_jabatan = jab.jabatan
            WHERE jab.kd_menu LIKE '$kd%' "
        )->result_array();
    }

    function get_cuti_sakit_kadiv($kasubdiv)
    {
        $a = str_split($kasubdiv, 3);
        $kd = $a[0] . '2';
        return $this->db->query(
            "SELECT * FROM cuti_sakit
            LEFT JOIN jab ON cuti_sakit.kd_jabatan = jab.jabatan
            WHERE jab.kd_menu LIKE '$kd%' "
        )->result_array();
    }

    function quota_cuti_thn_ka($kasubdiv)
    {
        $a = str_split($kasubdiv, 3);
        $kd = $a[0] . '2';
        return $this->db->query("SELECT * FROM (
            SELECT tb_cuti_thn.npp, tb_cuti_thn.jns_cuti, jab.jabatan, jab.kd_menu, tb_cuti_thn.valid, sdm01.nama, 12-SUM(tb_cuti_thn.jmlh_hari) AS sisa_tb_cuti_thn 
                    FROM tb_cuti_thn
                    JOIN sdm01 ON tb_cuti_thn.npp = sdm01.npp
                    JOIN jab ON tb_cuti_thn.kd_jabatan = jab.jabatan
                    WHERE YEAR(tb_cuti_thn.tgl_mulai)=YEAR(now())
                    AND jab.kd_menu LIKE '$kd%'
                    GROUP BY tb_cuti_thn.npp
            
            UNION

            SELECT tb_cuti_thn.npp, tb_cuti_thn.jns_cuti, jab.jabatan, jab.kd_menu, tb_cuti_thn.valid, sdm01.nama, 12 AS sisa_tb_cuti_thn
                    FROM tb_cuti_thn
                    JOIN sdm01 ON tb_cuti_thn.npp = sdm01.npp
                    JOIN jab ON tb_cuti_thn.kd_jabatan = jab.jabatan
                    WHERE YEAR(tb_cuti_thn.tgl_mulai)=YEAR(now())
                    AND jab.kd_menu LIKE '$kd%'
                    GROUP BY tb_cuti_thn.npp
            
            ) AS semua
                
            GROUP BY semua.npp")->result_array();
    }

    function quota_cuti_pjg_ka($kasubdiv)
    {
        $a = str_split($kasubdiv, 3);
        $kd = $a[0] . '2';
        return $this->db->query("SELECT * FROM (
            SELECT tb_cuti_pjg.npp, tb_cuti_pjg.jns_cuti, jab.jabatan, jab.kd_menu, tb_cuti_pjg.valid, sdm01.nama, 30-SUM(tb_cuti_pjg.jmlh_hari) AS sisa_tb_cuti_pjg 
                    FROM tb_cuti_pjg
                    JOIN sdm01 ON tb_cuti_pjg.npp = sdm01.npp
                    JOIN jab ON tb_cuti_pjg.kd_jabatan = jab.jabatan
                    WHERE YEAR(tb_cuti_pjg.tgl_mulai)=YEAR(now())
                    AND jab.kd_menu LIKE '$kd%'
                    GROUP BY tb_cuti_pjg.npp
            
            UNION

            SELECT tb_cuti_pjg.npp, tb_cuti_pjg.jns_cuti, jab.jabatan, jab.kd_menu, tb_cuti_pjg.valid, sdm01.nama, 30 AS sisa_tb_cuti_pjg
                    FROM tb_cuti_pjg
                    JOIN sdm01 ON tb_cuti_pjg.npp = sdm01.npp
                    JOIN jab ON tb_cuti_pjg.kd_jabatan = jab.jabatan
                    WHERE jab.kd_menu LIKE '$kd%'
                    GROUP BY tb_cuti_pjg.npp
            
            ) AS semua
                
            GROUP BY semua.npp")->result_array();
    }

    function quota_cuti_sakit_ka($kasubdiv)
    {
        $a = str_split($kasubdiv, 3);
        $kd = $a[0] . '2';
        return $this->db->query("SELECT * FROM (
            SELECT tb_cuti_sakit.npp, tb_cuti_sakit.jns_cuti, jab.jabatan, jab.kd_menu, tb_cuti_sakit.valid, sdm01.nama, 12-SUM(tb_cuti_sakit.jmlh_hari) AS sisa_tb_cuti_sakit 
                    FROM tb_cuti_sakit
                    JOIN sdm01 ON tb_cuti_sakit.npp = sdm01.npp
                    JOIN jab ON tb_cuti_sakit.kd_jabatan = jab.jabatan
                    WHERE YEAR(tb_cuti_sakit.tgl_mulai)=YEAR(now())
                    AND jab.kd_menu LIKE '$kd%'
                    GROUP BY tb_cuti_sakit.npp
            
            UNION

            SELECT tb_cuti_sakit.npp, tb_cuti_sakit.jns_cuti, jab.jabatan, jab.kd_menu, tb_cuti_sakit.valid, sdm01.nama, 12 AS sisa_tb_cuti_sakit
                    FROM tb_cuti_sakit
                    JOIN sdm01 ON tb_cuti_sakit.npp = sdm01.npp
                    JOIN jab ON tb_cuti_sakit.kd_jabatan = jab.jabatan
                    WHERE jab.kd_menu LIKE '$kd%'
                    GROUP BY tb_cuti_sakit.npp
            
            ) AS semua
                
            GROUP BY semua.npp")->result_array();
    }

    function km()
    {
        return $this->db->query("SELECT * FROM tb_km")->result_array();
    }

    function kdp()
    {
        return $this->db->query("SELECT * FROM tb_kdp")->result_array();
    }

    function ham()
    {
        return $this->db->query("SELECT * FROM tb_ham")->result_array();
    }

    function teknis()
    {
        return $this->db->query("SELECT * FROM tb_teknis")->result_array();
    }

    function get_biodata($npp)
    {
        $this->db->select('*');
        $this->db->from('sdm01');
        $this->db->where('sdm01.npp', $npp);
        $this->db->group_by('sdm01.npp');
        return $this->db->get()->result_array();
    }

    function konfirmasi_cuti_pjg_setuju($id_cuti_pjg)
    {
        $get = $this->db->get_where('cuti_pjg', array('id_cuti_pjg' => $id_cuti_pjg))->result_array();

        $insert = $this->db->insert('tb_cuti_pjg', array(
            'npp'        => $get[0]['npp'],
            'nama_kar'   => $get[0]['nama_kar'],
            'kd_jabatan' => $get[0]['kd_jabatan'],
            'nm_jabatan' => $get[0]['nm_jabatan'],
            'jmlh_hari'  => $get[0]['jmlh_hari'],
            'ket'        => $get[0]['ket'],
            'tgl_mulai'  => $get[0]['tgl_mulai'],
            'tgl_akhir'  => $get[0]['tgl_akhir'],
            'jns_cuti'   => $get[0]['jns_cuti'],
            'alasan'     => $get[0]['alasan'],
            'tgl'        => $get[0]['tgl'],
            'valid'      => $get[0]['valid']
        ));

        $setuju = $this->db->query("UPDATE cuti_pjg SET valid ='2' WHERE id_cuti_pjg='$id_cuti_pjg'");

        if ($insert && $setuju) {
            return 1;
        } else {
            return 0;
        }
    }

    function konfirmasi_cuti_pjg_tolak($id_cuti_pjg, $alasan)
    {
        $data = array(
            'alasan' => $alasan,
            'valid'  => '3'
        );

        $this->db->where('id_cuti_pjg', $id_cuti_pjg);
        $update = $this->db->update('cuti_pjg', $data);

        if ($update) {
            return 1;
        } else {
            return 0;
        }
    }

    function konfirmasi_cuti_thn_setuju($id_cuti_thn)
    {
        $get = $this->db->get_where('cuti_thn', array('id_cuti_thn' => $id_cuti_thn))->result_array();

        $insert = $this->db->insert('tb_cuti_thn', array(
            'npp'        => $get[0]['npp'],
            'nama_kar'   => $get[0]['nama_kar'],
            'kd_jabatan' => $get[0]['kd_jabatan'],
            'nm_jabatan' => $get[0]['nm_jabatan'],
            'jmlh_hari'  => $get[0]['jmlh_hari'],
            'ket'        => $get[0]['ket'],
            'tgl_mulai'  => $get[0]['tgl_mulai'],
            'tgl_akhir'  => $get[0]['tgl_akhir'],
            'jns_cuti'   => $get[0]['jns_cuti'],
            'alasan'     => $get[0]['alasan'],
            'tgl'        => $get[0]['tgl'],
            'valid'      => 2
        ));

        $setuju = $this->db->query("UPDATE cuti_thn SET valid='2' WHERE id_cuti_thn='$id_cuti_thn'");

        if ($insert && $setuju) {
            return 1;
        } else {
            return 0;
        }
    }

    function konfirmasi_cuti_thn_tolak($id_cuti_thn, $alasan)
    {
        $data = array(
            'alasan' => $alasan,
            'valid'  => '3'
        );

        $this->db->where('id_cuti_thn', $id_cuti_thn);
        $update = $this->db->update('cuti_thn', $data);

        if ($update) {
            return 1;
        } else {
            return 0;
        }
    }

    function konfirmasi_cuti_sakit_setuju($id_cuti_sakit)
    {
        $get = $this->db->get_where('cuti_sakit', array('id_cuti_sakit' => $id_cuti_sakit))->result_array();

        $insert = $this->db->insert('tb_cuti_sakit', array(
            'npp'        => $get[0]['npp'],
            'nama_kar'   => $get[0]['nama_kar'],
            'kd_jabatan' => $get[0]['kd_jabatan'],
            'nm_jabatan' => $get[0]['nm_jabatan'],
            'jmlh_hari'  => $get[0]['jmlh_hari'],
            'ket'        => $get[0]['ket'],
            'tgl_mulai'  => $get[0]['tgl_mulai'],
            'tgl_akhir'  => $get[0]['tgl_akhir'],
            'jns_cuti'   => $get[0]['jns_cuti'],
            'alasan'     => $get[0]['alasan'],
            'tgl'        => $get[0]['tgl'],
            'valid'      => $get[0]['valid']
        ));

        $setuju = $this->db->query("UPDATE cuti_sakit SET valid='2' WHERE id_cuti_sakit='$id_cuti_sakit'");

        if ($insert && $setuju) {
            return 1;
        } else {
            return 0;
        }
    }

    function konfirmasi_cuti_sakit_tolak($id_cuti_sakit, $alasan)
    {
        $data = array(
            'alasan' => $alasan,
            'valid'  => '3'
        );

        $this->db->where('id_cuti_sakit', $id_cuti_sakit);
        $update = $this->db->update('cuti_sakit', $data);

        if ($update) {
            return 1;
        } else {
            return 0;
        }
    }

    function konfirmasi_p_lmbr_setuju($id_p_lmbr)
    {
        $get    =   $this->db->get_where('p_lmbr', array('id_p_lmbr' => $id_p_lmbr))->result_array();
        
        $insert =   $this->db->insert('hsl_p_lmbr', array(
            'npp'         => $get[0]['npp'],
            'kode_lmbr'   => $get[0]['kode_lmbr'],
            'nama_p_lmbr' => $get[0]['nama_p_lmbr'],
            'jabatan'     => $get[0]['jabatan'],
            'kd_menu'     => $get[0]['kd_menu'],
            'pimpinan'    => $get[0]['pimpinan'],
            'tgl_p'       => $get[0]['tgl_p'],
            'awal'        => $get[0]['awal'],
            'akhir'       => $get[0]['akhir'],
            'jmlh'        => $get[0]['jmlh'],
            'ket'         => $get[0]['ket'],
            'alasan'      => $get[0]['alasan'],
            'valid'       => 2,
            'tgl'         => $get[0]['tgl'],
        ));

        $setuju = $this->db->query("UPDATE p_lmbr SET valid='2' WHERE id_p_lmbr = $id_p_lmbr");

        if ($setuju && $insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function konfirmasi_p_lmbr_tolak($id_p_lmbr, $alasan)
    {
        $data = array(
            'alasan' => $alasan,
            'valid'  => '3'
        );

        $this->db->where('id_p_lmbr', $id_p_lmbr);
        $update = $this->db->update('p_lmbr', $data);

        if ($update) {
            return 1;
        } else {
            return 0;
        }
    }

    function pend($no)
    {
        $this->db->SELECT('*');
        $this->db->FROM('pend');
        $this->db->WHERE('no', $no);
        return $this->db->GET()->result_array();
    }


    function cuti_thn($npp, $nama_kar, $kd_jabatan, $nm_jabatan, $jmlh_hari, $ket, $tgl_mulai, $tgl_akhir, $jns_cuti)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("Y/m/d H:i:s");
        $data   =   array(
            'npp'        =>  $npp,
            'nama_kar'   =>  $nama_kar,
            'kd_jabatan' =>  $kd_jabatan,
            'nm_jabatan' =>  $nm_jabatan,
            'jmlh_hari'  =>  $jmlh_hari,
            'ket'        =>  $ket,
            'tgl_mulai'  =>  $tgl_mulai,
            'tgl_akhir'  =>  $tgl_akhir,
            'jns_cuti'   =>  $jns_cuti,
            'tgl'        =>  $date,
            'valid'      =>  '1'
        );

        $insert = $this->db->insert('cuti_thn', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function cuti_sakit($npp, $nama_kar, $kd_jabatan, $nm_jabatan, $jmlh_hari, $ket, $tgl_mulai, $tgl_akhir, $jns_cuti)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("Y/m/d H:i:s");
        $data   =   array(
            'npp'        =>  $npp,
            'nama_kar'   =>  $nama_kar,
            'kd_jabatan' =>  $kd_jabatan,
            'nm_jabatan' =>  $nm_jabatan,
            'jmlh_hari'  =>  $jmlh_hari,
            'ket'        =>  $ket,
            'tgl_mulai'  =>  $tgl_mulai,
            'tgl_akhir'  =>  $tgl_akhir,
            'jns_cuti'   =>  $jns_cuti,
            'tgl'        =>  $date,
            'valid'      =>  '1'
        );

        $insert = $this->db->insert('cuti_sakit', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function cuti_pjg($npp, $nama_kar, $kd_jabatan, $nm_jabatan, $jmlh_hari, $ket, $tgl_mulai, $tgl_akhir, $jns_cuti)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("Y/m/d H:i:s");
        $data   =   array(
            'npp'        =>  $npp,
            'nama_kar'       =>  $nama_kar,
            'kd_jabatan' =>  $kd_jabatan,
            'nm_jabatan' =>  $nm_jabatan,
            'jmlh_hari'  =>  $jmlh_hari,
            'ket'        =>  $ket,
            'tgl_mulai'  =>  $tgl_mulai,
            'tgl_akhir'  =>  $tgl_akhir,
            'jns_cuti'   =>  $jns_cuti,
            'tgl'        =>  $date,
            'valid'      =>  '1'
        );

        $insert = $this->db->insert('cuti_pjg', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_diri(
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
    ) {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("Y/m/d H:i:s");
        $data   =   array(
            'npp'        =>  $npp,
            'nama'       =>  $nama,
            'nm_pgl'     =>  $nm_pgl,
            'glr_dpn'    =>  $glr_dpn,
            'glr_blk'    =>  $glr_blk,
            'kota_lhr'   =>  $kota_lhr,
            'prov_lhr'   =>  $prov_lhr,
            'ngr_lhr'    =>  $ngr_lhr,
            'tgl_lhr'    =>  $tgl_lhr,
            'j_kelamin'  =>  $j_kelamin,
            'gol_darah'  =>  $gol_darah,
            'agama'      =>  $agama,
            'tgl_masuk'  =>  $tgl_masuk,
            'st_sipil'   =>  $st_sipil,
            'jmlh_ank'   =>  $jmlh_ank,
            'no_astek'   =>  $no_astek,
            'no_pens'    =>  $no_pens,
            'npwp'       =>  $npwp,
            'alamat_tgl' =>  $alamat_tgl,
            'kd_lokasi'  =>  $kd_lokasi,
            'kode_pos'   =>  $kode_pos,
            'no_telp'    =>  $no_telp,
            'no_nik'     =>  $no_nik,
            'no_kk'      =>  $no_kk,
            'no_bpjs'    =>  $no_bpjs,
            'tgl'        =>  $date,
            'valid'      =>  $valid,
            'status'     =>  $status,
            'image'      =>  $image
        );

        $insert = $this->db->insert('temp_sdm01', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function entry_pend(
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
    ) {

        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("Y/m/d H:i:s");
        $data  =   array(
            'npp'         =>  $npp,
            'no_urut'     =>  $no_urut,
            'tk_pend'     =>  $tk_pend,
            'nama'        =>  $nama,
            'kd_pend'     =>  $kd_pend,
            'ket'         =>  $ket,
            'kota'        =>  $kota,
            'thn_awal'    =>  $thn_awal,
            'thn_akhir'   =>  $thn_akhir,
            'no_ijasah'   =>  $no_ijasah,
            'tgl_ijasah'  =>  $tgl_ijasah,
            'tgl'         =>  $date,
            'glr_dpn'     =>  $glr_dpn,
            'glr_blk'     =>  $glr_blk,
            'valid'       =>  $valid,
            'image'       =>  $image,
            'status'      =>  $status,
            'tgl'         =>  $date
        );
        $insert    =   $this->db->insert('temp_sdm03', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_pend(
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
        $glr_blk,
        $image,
        $status,
        $valid
    ) {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("Y/m/d H:i:s");
        $data  =   array(
            'npp'           =>  $npp,
            'no_urut'       =>  $no_urut,
            'tk_pend'       =>  $tk_pend,
            'nama'          =>  $nama,
            'kd_pend'       =>  $kd_pend,
            'ket'           =>  $ket,
            'kota'          =>  $kota,
            'thn_awal'      =>  $thn_awal,
            'thn_akhir'     =>  $thn_akhir,
            'no_ijasah'     =>  $no_ijasah,
            'tgl_ijasah'    =>  $tgl_ijasah,
            'glr_dpn'       =>  $glr_dpn,
            'glr_blk'       =>  $glr_blk,
            'valid'         =>  $valid,
            'tgl'           =>  $date,
            'image'         =>  $image,
            'status'        =>  $status
        );

        $this->db->where('id_sdm03', $id_sdm03);
        $insert = $this->db->insert('temp_sdm03', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function entry_kel(
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
    ) {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("Y/m/d H:i:s");
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $no_urut,
            'nama'       =>  $nama,
            'hbg_klg'    =>  $hbg_klg,
            'tgl_lhr'    =>  $tgl_lhr,
            'kota_lhr'   =>  $kota_lhr,
            'ngr_lhr'    =>  $ngr_lhr,
            'kelamin'    =>  $kelamin,
            'gol_darah'  =>  $gol_darah,
            'agama'      =>  $agama,
            'tk_pend'    =>  $tk_pend,
            'st_sipil'   =>  $st_sipil,
            'st_kerja'   =>  $st_kerja,
            'tgl_nkh'    =>  $tgl_nkh,
            'tgl_cerai'  =>  $tgl_cerai,
            'tgl_mgl'    =>  $tgl_mgl,
            'alamat'     =>  $alamat,
            'no_kk'      =>  $no_kk,
            'nik'        =>  $nik,
            'no_bpjs'    =>  $no_bpjs,
            'stat_rec'   =>  $stat_rec,
            'valid'      =>  $valid,
            'image'      =>  $image,
            'status'     =>  $status,
            'tgl'        =>  $date
        );
        $insert = $this->db->insert('temp_sdm02', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_kel(
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
    ) {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("Y/m/d H:i:s");
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $no_urut,
            'nama'       =>  $nama,
            'hbg_klg'    =>  $hbg_klg,
            'tgl_lhr'    =>  $tgl_lhr,
            'kota_lhr'   =>  $kota_lhr,
            'ngr_lhr'    =>  $ngr_lhr,
            'kelamin'    =>  $kelamin,
            'gol_darah'  =>  $gol_darah,
            'agama'      =>  $agama,
            'tk_pend'    =>  $tk_pend,
            'st_sipil'   =>  $st_sipil,
            'st_kerja'   =>  $st_kerja,
            'tgl_nkh'    =>  $tgl_nkh,
            'tgl_cerai'  =>  $tgl_cerai,
            'tgl_mgl'    =>  $tgl_mgl,
            'alamat'     =>  $alamat,
            'no_kk'      =>  $no_kk,
            'nik'        =>  $nik,
            'no_bpjs'    =>  $no_bpjs,
            'stat_rec'   =>  0,
            'valid'      =>  $valid,
            'tgl'        =>  $date,
            'image'      =>  $image,
            'status'     =>  $status
        );

        $this->db->where('id_sdm02', $id_sdm02);
        $insert = $this->db->insert('temp_sdm02', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function entry_plthn(
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
        $image,
        $status,
        $valid
    ) {
        date_default_timezone_set('Asia/Jakarta');

        $date   =   date("Y/m/d H:i:s");
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $no_urut,
            'kd_pend'    =>  $kd_pend,
            'nama'       =>  $nama,
            'ket'        =>  $ket,
            'dnln'       =>  $dnln,
            'tgl_awal'   =>  $tgl_awal,
            'tgl_akhir'  =>  $tgl_akhir,
            'no_sert'    =>  $no_sert,
            'tgl_sert'   =>  $tgl_sert,
            'nilai'      =>  $nilai,
            'grade'      =>  $grade,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec,
            'image'      =>  $image,
            'valid'      =>  $valid,
            'status'     =>  $status,
            'tgl'        =>  $date
        );

        $insert     =   $this->db->insert('temp_sdm04', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_plthn(
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
    ) {
        date_default_timezone_set('Asia/Jakarta');

        $date   =   date("Y/m/d H:i:s");
        $data   =   array(
            'id_sdm04'   =>  $id_sdm04,
            'npp'        =>  $npp,
            'no_urut'    =>  $no_urut,
            'kd_pend'    =>  $kd_pend,
            'nama'       =>  $nama,
            'ket'        =>  $ket,
            'dnln'       =>  $dnln,
            'tgl_awal'   =>  $tgl_awal,
            'tgl_akhir'  =>  $tgl_akhir,
            'no_sert'    =>  $no_sert,
            'tgl_sert'   =>  $tgl_sert,
            'nilai'      =>  $nilai,
            'grade'      =>  $grade,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec,
            'valid'      =>  $valid,
            'tgl'        =>  $date,
            'image'      =>  $image,
            'status'     =>  $status
        );
        $insert = $this->db->insert('temp_sdm04', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function in_nilai($npp, $nm_kar, $npp_pmpn, $nm_pmpn, $npp_ats_pmpn, $nm_ats_pmpn, $jabatan, $kd_menu, $nilai, $ket)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("Y/m/d H:i:s");
        $data   =   array(
            'npp'          => $npp,
            'nm_kar'       => $nm_kar,
            'npp_pmpn'     => $npp_pmpn,
            'nm_pmpn'      => $nm_pmpn,
            'npp_ats_pmpn' => $npp_ats_pmpn,
            'nm_ats_pmpn'  => $nm_ats_pmpn,
            'jabatan'      => $jabatan,
            'kd_menu'      => $kd_menu,
            'nilai'        => $nilai,
            'ket'          => $ket,
            'tgl'          => $date
        );
        $insert = $this->db->insert('hsl_nilai', $data);
        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_photo($nama, $username, $image)
    {
        $data   =   array(
            'nama'  => $nama,
            'image' => $image
        );
        $this->db->where('username', $username);
        $this->db->update('login_karyawan', $data);

        return 1;
    }

    function cek_old_password($username, $pass)
    {
        $result = $this->db->query("SELECT * FROM login_karyawan WHERE username = '$username' AND pass = '$pass' ");
        if ($result->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function ganti_password($username, $new_password)
    {
        return $this->db->query("UPDATE login_karyawan SET pass = '$new_password' WHERE username = '$username' ");
    }

    function tempt02($npp)
    {
        return $this->db->query("SELECT * FROM temp_sdm02 WHERE npp=$npp")->result_array();
    }
}
