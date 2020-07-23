<?php

class model_admin extends CI_Model
{
    function entry_sdm01(
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
        $user_id,
        $bln_proses,
        $tinggal,
        $ket,
        $tglpen,
        $noskpen,
        $tglskpen,
        $jns_pen,
        $stat_rec,
        $nama1,
        $username,
        $md5,
        $image,
        $status,
        $valid
    ) {
        date_default_timezone_set('Asia/Jakarta');

        $date   =   date("Y/m/d H:i:s");
        $data1   =   array(
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
            'user_id'    =>  $user_id,
            'bln_proses' =>  $bln_proses,
            'tinggal'    =>  $tinggal,
            'ket'        =>  $ket,
            'tglpen'     =>  $tglpen,
            'noskpen'    =>  $noskpen,
            'tglskpen'   =>  $tglskpen,
            'jns_pen'    =>  $jns_pen,
            'stat_rec'   =>  $stat_rec,
            'tgl'        =>  $date
        );

        $insert1 =   $this->db->insert('sdm01', $data1);

        $data2 = array(
            'nama'      =>  $nama1,
            'username'  =>  $username,
            'pass'      =>  $md5,
            'image'     =>  $image,
            'status'    =>  $status,
            'tgl'       =>  $date,
            'valid'     =>  $valid
        );

        $insert2 = $this->db->input('login_karyawan', $data2);
        if ($insert1 && $insert2) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_sdm01(
        $id_sdm01,
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
        $user_id,
        $bln_proses,
        $tinggal,
        $ket,
        $tglpen,
        $noskpen,
        $tglskpen,
        $jns_pen,
        $stat_rec
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
            'user_id'    =>  $user_id,
            'bln_proses' =>  $bln_proses,
            'tinggal'    =>  $tinggal,
            'ket'        =>  $ket,
            'tglpen'     =>  $tglpen,
            'noskpen'    =>  $noskpen,
            'tglskpen'   =>  $tglskpen,
            'jns_pen'    =>  $jns_pen,
            'stat_rec'   =>  $stat_rec,
            'tgl'        =>  $date
        );

        $this->db->where('id_sdm01', $id_sdm01);
        $this->db->update('sdm01', $data);

        return 1;
    }

    function delet_absen($id_absen)
    {
        return $this->db->query("DELETE FROM absensi WHERE id_absen='$id_absen'");
    }

    function delet_sdm01($id_sdm01)
    {
        $hasil = $this->db->query("DELETE FROM sdm01 WHERE id_sdm01='$id_sdm01'");
        return $hasil;
    }

    function tampil_sdm01()
    {
        $hasil  =   $this->db->query("SELECT * FROM sdm01");

        return $hasil;
    }

    function sdm01($npp)
    {
        return $this->db->query("SELECT * FROM sdm01 WHERE npp = '$npp'")->result_array();
    }

    function jmlh_sdm01()
    {
        return $this->db->query("SELECT COUNT(id_sdm01) AS id FROM sdm01")->result_array();
    }

    function get_data_bynpp($npp) // pencarian menggunakan NPP
    {
        $hsl = $this->db->query("SELECT * FROM sdm01 WHERE npp='$npp'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result_array() as $data) {
                $hasil = array(
                    'id_sdm01'   =>  $data['id_sdm01'],
                    'npp'        =>  $data['npp'],
                    'nama'       =>  $data['nama'],
                    'nm_pgl'     =>  $data['nm_pgl'],
                    'glr_dpn'    =>  $data['glr_dpn'],
                    'glr_blk'    =>  $data['glr_blk'],
                    'kota_lhr'   =>  $data['kota_lhr'],
                    'prov_lhr'   =>  $data['prov_lhr'],
                    'ngr_lhr'    =>  $data['ngr_lhr'],
                    'tgl_lhr'    =>  $data['tgl_lhr'],
                    'j_kelamin'  =>  $data['j_kelamin'],
                    'gol_darah'  =>  $data['gol_darah'],
                    'agama'      =>  $data['agama'],
                    'tgl_masuk'  =>  $data['tgl_masuk'],
                    'st_sipil'   =>  $data['st_sipil'],
                    'jmlh_ank'   =>  $data['jmlh_ank'],
                    'no_astek'   =>  $data['no_astek'],
                    'no_pens'    =>  $data['no_pens'],
                    'npwp'       =>  $data['npwp'],
                    'alamat_tgl' =>  $data['alamat_tgl'],
                    'kd_lokasi'  =>  $data['kd_lokasi'],
                    'kode_pos'   =>  $data['kode_pos'],
                    'no_telp'    =>  $data['no_telp'],
                    'no_nik'     =>  $data['no_nik'],
                    'no_kk'      =>  $data['no_kk'],
                    'no_bpjs'    =>  $data['no_bpjs'],
                    'user_id'    =>  $data['user_id'],
                    'bln_proses' =>  $data['bln_proses'],
                    'tinggal'    =>  $data['tinggal'],
                    'ket'        =>  $data['ket'],
                    'tglpen'     =>  $data['tglpen'],
                    'noskpen'    =>  $data['noskpen'],
                    'tglskpen'   =>  $data['tglskpen'],
                    'jns_pen'    =>  $data['jns_pen'],
                    'stat_rec'   =>  $data['stat_rec'],
                    'tgl'        =>  $data['tgl'],

                );
            }
        }
        return $hasil;
    }

    function aprove_sdm01($id_sdm01)
    {
        $get = $this->db->get_where('temp_sdm01', array('id_sdm01' => $id_sdm01))->result_array();

        $insert_sdm01 = $this->db->insert('sdm01', array(
            'nama'       =>  $get[0]['nama'],
            'nm_pgl'     =>  $get[0]['nm_pgl'],
            'glr_dpn'    =>  $get[0]['glr_dpn'],
            'glr_blk'    =>  $get[0]['glr_blk'],
            'kota_lhr'   =>  $get[0]['kota_lhr'],
            'prov_lhr'   =>  $get[0]['prov_lhr'],
            'ngr_lhr'    =>  $get[0]['ngr_lhr'],
            'tgl_lhr'    =>  $get[0]['tgl_lhr'],
            'j_kelamin'  =>  $get[0]['j_kelamin'],
            'gol_darah'  =>  $get[0]['gol_darah'],
            'agama'      =>  $get[0]['agama'],
            'tgl_masuk'  =>  $get[0]['tgl_masuk'],
            'st_sipil'   =>  $get[0]['st_sipil'],
            'jmlh_ank'   =>  $get[0]['jmlh_ank'],
            'no_astek'   =>  $get[0]['no_astek'],
            'no_pens'    =>  $get[0]['no_pens'],
            'npwp'       =>  $get[0]['npwp'],
            'alamat_tgl' =>  $get[0]['alamat_tgl'],
            'kd_lokasi'  =>  $get[0]['kd_lokasi'],
            'kode_pos'   =>  $get[0]['kode_pos'],
            'no_telp'    =>  $get[0]['no_telp'],
            'no_nik'     =>  $get[0]['no_nik'],
            'no_kk'      =>  $get[0]['no_kk'],
            'no_bpjs'    =>  $get[0]['no_bpjs'],
            'user_id'    =>  $get[0]['user_id'],
            'bln_proses' =>  $get[0]['bln_proses'],
            'tinggal'    =>  0,
            'ket'        =>  $get[0]['ket'],
            'tglpen'     =>  $get[0]['tglpen'],
            'noskpen'    =>  $get[0]['noskpen'],
            'tglskpen'   =>  $get[0]['tglskpen'],
            'jns_pen'    =>  $get[0]['jns_pen'],
            'stat_rec'   =>  0,
            'tgl'        =>  $get[0]['tgl']
        ));

        $update = $this->db->query("UPDATE temp_sdm01 SET status = '2' WHERE id_sdm01 = '$id_sdm01' ");

        if ($insert_sdm01 && $update) {
            return 1;
        } else {
            return 0;
        }
    }

    function aprove_edit_sdm01($id_sdm01)
    {
        $get  = $this->db->get_where('temp_sdm01', array('id_sdm01' => $id_sdm01))->result_array();
        $data = array(
            'nama'       =>  $get[0]['nama'],
            'nm_pgl'     =>  $get[0]['nm_pgl'],
            'glr_dpn'    =>  $get[0]['glr_dpn'],
            'glr_blk'    =>  $get[0]['glr_blk'],
            'kota_lhr'   =>  $get[0]['kota_lhr'],
            'prov_lhr'   =>  $get[0]['prov_lhr'],
            'ngr_lhr'    =>  $get[0]['ngr_lhr'],
            'tgl_lhr'    =>  $get[0]['tgl_lhr'],
            'j_kelamin'  =>  $get[0]['j_kelamin'],
            'gol_darah'  =>  $get[0]['gol_darah'],
            'agama'      =>  $get[0]['agama'],
            'tgl_masuk'  =>  $get[0]['tgl_masuk'],
            'st_sipil'   =>  $get[0]['st_sipil'],
            'jmlh_ank'   =>  $get[0]['jmlh_ank'],
            'no_astek'   =>  $get[0]['no_astek'],
            'no_pens'    =>  $get[0]['no_pens'],
            'npwp'       =>  $get[0]['npwp'],
            'alamat_tgl' =>  $get[0]['alamat_tgl'],
            'kd_lokasi'  =>  $get[0]['kd_lokasi'],
            'kode_pos'   =>  $get[0]['kode_pos'],
            'no_telp'    =>  $get[0]['no_telp'],
            'no_nik'     =>  $get[0]['no_nik'],
            'no_kk'      =>  $get[0]['no_kk'],
            'no_bpjs'    =>  $get[0]['no_bpjs'],
            'user_id'    =>  $get[0]['user_id'],
            'bln_proses' =>  $get[0]['bln_proses'],
            'tinggal'    =>  0,
            'ket'        =>  $get[0]['ket'],
            'tglpen'     =>  $get[0]['tglpen'],
            'noskpen'    =>  $get[0]['noskpen'],
            'tglskpen'   =>  $get[0]['tglskpen'],
            'jns_pen'    =>  $get[0]['jns_pen'],
            'stat_rec'   =>  0,
            'tgl'        =>  $get[0]['tgl']
        );
        $update1 = $this->db->update('sdm01', $data, array('npp' => $get[0]['npp']));

        $update = $this->db->query("UPDATE temp_sdm01 SET status = '2' WHERE id_sdm01 = '$id_sdm01' ");

        if ($update1 && $update) {
            return 1;
        } else {
            return 0;
        }
    }

    function reject_sdm01($id_sdm01, $status)
    {
        $data = array('status' => $status);

        $this->db->where('id_sdm01', $id_sdm01);
        $this->db->update('temp_sdm01', $data);

        return 1;
    }

    function tempt01()
    {
        return $this->db->query("SELECT * FROM temp_sdm01")->result_array();
    }

    //========================================== SDM 02 ==================================================
    //========================================== SDM 02 ==================================================  
    //========================================== SDM 02 ==================================================  
    //========================================== SDM 02 ==================================================  
    //========================================== SDM 02 ==================================================         

    function cari_sdm02($npp)
    {
        return $this->db->query("SELECT * FROM sdm02 where npp = $npp ")->result_array();
    }

    function entry_sdm02(
        $npp,
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
        $bln_proses,
        $stat_rec
    ) {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("Y/m/d H:i:s");
        $this->db->select_max('no_urut');
        $this->db->from('sdm02');
        $this->db->where('npp', $npp);
        $query  =   $this->db->get()->result_array();
        $urut   =   $query[0]['no_urut'] + 1;
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $urut,
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
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec,
            'tgl'        =>  $date
        );

        $insert     =   $this->db->insert('sdm02', $data);


        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_sdm02(
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
        $bln_proses,
        $stat_rec
    ) {
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
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec
        );

        $this->db->where('id_sdm02', $id_sdm02);
        $this->db->update('sdm02', $data);

        return 1;
    }

    function delet_sdm02($id_sdm02)
    {
        $hasil = $this->db->query("DELETE FROM sdm02 WHERE id_sdm02='$id_sdm02'");
        return $hasil;
    }

    function tampil_sdm02()
    {
        $hasil =    $this->db->query("SELECT * FROM sdm02");

        return $hasil;
    }

    function get_sdm02_a1($npp)
    {
        return $this->db->query(
            "SELECT sdm02.st_sipil as sipil, sdm02.tgl_nkh ,sdm02.tgl_cerai from sdm02
                    RIGHT JOIN sdm01 ON sdm02.npp = sdm01.npp
                    where sdm01.npp = $npp 
                    group by sdm01.npp"
        )->result_array();
    }

    function get_sdm02_a1_anak($npp)
    {
        return $this->db->query(
            "SELECT max(sdm02.no_urut) as tanggungan from sdm02
                    RIGHT JOIN sdm01 ON sdm02.npp = sdm01.npp
                    where sdm01.npp = $npp 
                    group by sdm01.npp"
        )->result_array();
    }

    function aprove_sdm02($id_sdm02)
    {
        $get = $this->db->get_where('temp_sdm02', array('id_sdm02' => $id_sdm02))->result_array();

        $insert_sdm02 = $this->db->insert('sdm02', array(
            'npp'        =>  $get[0]['npp'],
            'no_urut'    =>  $get[0]['no_urut'],
            'nama'       =>  $get[0]['nama'],
            'hbg_klg'    =>  $get[0]['hbg_klg'],
            'tgl_lhr'    =>  $get[0]['tgl_lhr'],
            'kota_lhr'   =>  $get[0]['kota_lhr'],
            'ngr_lhr'    =>  $get[0]['ngr_lhr'],
            'kelamin'    =>  $get[0]['kelamin'],
            'gol_darah'  =>  $get[0]['gol_darah'],
            'agama'      =>  $get[0]['agama'],
            'tk_pend'    =>  $get[0]['tk_pend'],
            'st_sipil'   =>  $get[0]['st_sipil'],
            'st_kerja'   =>  $get[0]['st_kerja'],
            'tgl_nkh'    =>  $get[0]['tgl_nkh'],
            'tgl_cerai'  =>  $get[0]['tgl_cerai'],
            'tgl_mgl'    =>  $get[0]['tgl_mgl'],
            'alamat'     =>  $get[0]['alamat'],
            'no_kk'      =>  $get[0]['no_kk'],
            'nik'        =>  $get[0]['nik'],
            'no_bpjs'    =>  $get[0]['no_bpjs'],
            'bln_proses' =>  $get[0]['bln_proses'],
            'stat_rec'   =>  $get[0]['stat_rec'],
            'tgl'        =>  $get[0]['tgl']
        ));

        $update = $this->db->query("UPDATE temp_sdm02 SET status = '2' WHERE id_sdm02 = '$id_sdm02' ");

        if ($insert_sdm02 && $update) {
            return 1;
        } else {
            return 0;
        }
    }

    function aprove_edit_sdm02($id_sdm02)
    {
        $get = $this->db->get_where('temp_sdm02', array('id_sdm02' => $id_sdm02))->result_array();
        $data = array(
            'npp'        =>  $get[0]['npp'],
            'no_urut'    =>  $get[0]['no_urut'],
            'nama'       =>  $get[0]['nama'],
            'hbg_klg'    =>  $get[0]['hbg_klg'],
            'tgl_lhr'    =>  $get[0]['tgl_lhr'],
            'kota_lhr'   =>  $get[0]['kota_lhr'],
            'ngr_lhr'    =>  $get[0]['ngr_lhr'],
            'kelamin'    =>  $get[0]['kelamin'],
            'gol_darah'  =>  $get[0]['gol_darah'],
            'agama'      =>  $get[0]['agama'],
            'tk_pend'    =>  $get[0]['tk_pend'],
            'st_sipil'   =>  $get[0]['st_sipil'],
            'st_kerja'   =>  $get[0]['st_kerja'],
            'tgl_nkh'    =>  $get[0]['tgl_nkh'],
            'tgl_cerai'  =>  $get[0]['tgl_cerai'],
            'tgl_mgl'    =>  $get[0]['tgl_mgl'],
            'alamat'     =>  $get[0]['alamat'],
            'no_kk'      =>  $get[0]['no_kk'],
            'nik'        =>  $get[0]['nik'],
            'no_bpjs'    =>  $get[0]['no_bpjs'],
            'bln_proses' =>  $get[0]['bln_proses'],
            'stat_rec'   =>  $get[0]['stat_rec'],
            'tgl'        =>  $get[0]['tgl']
        );
        $update1 = $this->db->update('sdm02', $data, array('npp' => $get[0]['npp'], 'no_urut' => $get[0]['no_urut']));

        $update = $this->db->query("UPDATE temp_sdm02 SET status = '2' WHERE id_sdm02 = '$id_sdm02' ");

        if ($update1 && $update) {
            return 1;
        } else {
            return 0;
        }
    }

    function reject_sdm02($id_sdm02, $status)
    {
        $data = array('status' => $status);

        $this->db->where('id_sdm02', $id_sdm02);
        $this->db->update('temp_sdm02', $data);

        return 1;
    }

    function tempt02()
    {
        return $this->db->query("SELECT * FROM temp_sdm02")->result_array();
    }

    function tempt02_kar($npp)
    {
        $npp    = $this->session->userdata('status_login_username');
        return $this->db->query("SELECT * FROM temp_sdm02 WHERE npp='$npp' ")->result_array();
    }



    //========================================== SDM 03 ==================================================  
    //========================================== SDM 03 ==================================================  
    //========================================== SDM 03 ==================================================  
    //========================================== SDM 03 ==================================================  
    //========================================== SDM 03 ==================================================  

    function cari_sdm03($npp)
    {
        return $this->db->query("SELECT * FROM sdm03 where npp = $npp")->result_array();
    }

    function entry_sdm03(
        $npp,
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
    ) {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("Y/m/d H:i:s");
        $this->db->select_max('no_urut');
        $this->db->from('sdm03');
        $this->db->where('npp', $npp);
        $query  =   $this->db->get()->result_array();
        $urut   =   $query[0]['no_urut'] + 1;
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $urut,
            'tk_pend'    =>  $tk_pend,
            'kd_pend'    =>  $kd_pend,
            'nama'       =>  $nama,
            'kota'       =>  $kota,
            'st_akred'   =>  $st_akred,
            'dnln'       =>  $dnln,
            'thn_awal'   =>  $thn_awal,
            'thn_akhir'  =>  $thn_akhir,
            'st_lulus'   =>  $st_lulus,
            'no_ijasah'  =>  $no_ijasah,
            'tgl_ijasah' =>  $tgl_ijasah,
            'nilai'      =>  $nilai,
            'grade'      =>  $grade,
            'ket'        =>  $ket,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec,
            'tgl'        =>  $date
        );

        $insert     =   $this->db->insert('sdm03', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_sdm03(
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
    ) {
        $data   =   array(
            'npp'          =>  $npp,
            'no_urut'    =>  $no_urut,
            'tk_pend'    =>  $tk_pend,
            'kd_pend'    =>  $kd_pend,
            'nama'       =>  $nama,
            'kota'       =>  $kota,
            'st_akred'   =>  $st_akred,
            'dnln'       =>  $dnln,
            'thn_awal'   =>  $thn_awal,
            'thn_akhir'  =>  $thn_akhir,
            'st_lulus'   =>  $st_lulus,
            'no_ijasah'  =>  $no_ijasah,
            'tgl_ijasah' =>  $tgl_ijasah,
            'nilai'      =>  $nilai,
            'grade'      =>  $grade,
            'ket'        =>  $ket,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec
        );

        $this->db->where('id_sdm03', $id_sdm03);
        $this->db->update('sdm03', $data);

        return 1;
    }

    function delet_sdm03($id_sdm03)
    {
        $hasil = $this->db->query("DELETE FROM sdm03 WHERE id_sdm03 = '$id_sdm03'");
        return $hasil;
    }

    function tampil_sdm03()
    {
        $hasil =    $this->db->query("SELECT * FROM sdm03")->result_array();

        return $hasil;
    }

    function pend_sdm03($npp)
    {

        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm03 group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        $query = $this->db->query(
            "SELECT sdm03.no_urut from sdm03
                    where sdm03.npp = $npp and sdm03.no_urut = $no"
        );
        return $query->result_array();
    }

    function get_sdm03_a1($npp)
    {
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm03 where npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        $query = $this->db->query(
            "SELECT sdm03.kd_pend from sdm03
                    LEFT JOIN sdm01 ON sdm03.npp = sdm01.npp
                    where sdm03.npp = $npp and sdm03.no_urut = $no"
        );
        return $query->result_array();
    }

    function aprove_sdm03($id_sdm03)
    {
        $get = $this->db->get_where('temp_sdm03', array('id_sdm03' => $id_sdm03))->result_array();

        $insert_sdm03 = $this->db->insert('sdm03', array(
            'npp'        => $get[0]['npp'],
            'no_urut'    => $get[0]['no_urut'],
            'tk_pend'    => $get[0]['tk_pend'],
            'kd_pend'    => $get[0]['kd_pend'],
            'nama'       => $get[0]['nama'],
            'kota'       => $get[0]['kota'],
            'st_akred'   => $get[0]['st_akred'],
            'dnln'       => $get[0]['dnln'],
            'thn_awal'   => $get[0]['thn_awal'],
            'thn_akhir'  => $get[0]['thn_akhir'],
            'st_lulus'   => $get[0]['st_lulus'],
            'no_ijasah'  => $get[0]['no_ijasah'],
            'tgl_ijasah' => $get[0]['tgl_ijasah'],
            'nilai'      => $get[0]['nilai'],
            'grade'      => $get[0]['grade'],
            'ket'        => $get[0]['ket'],
            'bln_proses' => $get[0]['bln_proses'],
            'stat_rec'   => $get[0]['stat_rec'],
            'tgl'        => $get[0]['tgl']
        ));

        $data2 =    array(
            'glr_dpn' => $get[0]['glr_dpn'],
            'glr_blk' => $get[0]['glr_blk']
        );
        $insert2    = $this->db->update('sdm01', $data2, array('npp', $get[0]['npp']));

        if ($insert_sdm03 && $insert2) {
            return 1;
        } else {
            return 0;
        }
    }

    function aprove_edit_sdm03($id_sdm03)
    {
        $get = $this->db->get_where('temp_sdm03', array('id_sdm03' => $id_sdm03))->result_array();
        $data = array(
            'npp'        => $get[0]['npp'],
            'no_urut'    => $get[0]['no_urut'],
            'tk_pend'    => $get[0]['tk_pend'],
            'kd_pend'    => $get[0]['kd_pend'],
            'nama'       => $get[0]['nama'],
            'kota'       => $get[0]['kota'],
            'st_akred'   => $get[0]['st_akred'],
            'dnln'       => $get[0]['dnln'],
            'thn_awal'   => $get[0]['thn_awal'],
            'thn_akhir'  => $get[0]['thn_akhir'],
            'st_lulus'   => $get[0]['st_lulus'],
            'no_ijasah'  => $get[0]['no_ijasah'],
            'tgl_ijasah' => $get[0]['tgl_ijasah'],
            'nilai'      => $get[0]['nilai'],
            'grade'      => $get[0]['grade'],
            'ket'        => $get[0]['ket'],
            'bln_proses' => $get[0]['bln_proses'],
            'stat_rec'   => $get[0]['stat_rec'],
            'tgl'        => $get[0]['tgl']
        );
        $update1 = $this->db->update('sdm03', $data, array('npp' => $get[0]['npp'], 'no_urut' => $get[0]['no_urut']));

        $data2 =    array(
            'glr_dpn' => $get[0]['glr_dpn'],
            'glr_blk' => $get[0]['glr_blk']
        );
        $update2    = $this->db->update('sdm01', $data2, array('npp', $get[0]['npp']));

        if ($update1 && $update2) {
            return 1;
        } else {
            return 0;
        }
    }

    function reject_sdm03($id_sdm03, $status)
    {
        $data = array('status' => $status);

        $this->db->where('id_sdm03', $id_sdm03);
        $this->db->update('temp_sdm03', $data);

        return 1;
    }

    function tempt03()
    {
        return $this->db->query("SELECT * FROM temp_sdm03")->result_array();
    }

    function tempt03_kar($npp)
    {
        $npp    = $this->session->userdata('status_login_username');
        return $this->db->query("SELECT * FROM temp_sdm03 WHERE npp='$npp' ")->result_array();
    }


    //========================================== SDM 04 ==================================================
    //========================================== SDM 04 ==================================================  
    //========================================== SDM 04 ==================================================  
    //========================================== SDM 04 ==================================================  
    //========================================== SDM 04 ==================================================    

    function cari_sdm04($npp)
    {
        return $this->db->query("SELECT * FROM sdm04 where npp = $npp")->result_array();
    }

    function entry_sdm04(
        $npp,
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
    ) {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("Y/m/d H:i:s");
        $this->db->select_max('no_urut');
        $this->db->from('sdm04');
        $this->db->where('npp', $npp);
        $query  =   $this->db->get()->result_array();
        $urut   =   $query[0]['no_urut'] + 1;
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $urut,
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
            'tgl'        =>  $date
        );

        $insert     =   $this->db->insert('sdm04', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_sdm04(
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
    ) {
        $data   =   array(
            'npp'          =>  $npp,
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
            'stat_rec'   =>  $stat_rec
        );

        $this->db->where('id_sdm04', $id_sdm04);
        $this->db->update('sdm04', $data);

        return 1;
    }

    function delet_sdm04($id_sdm04)
    {
        $hasil = $this->db->query("DELETE FROM sdm04 WHERE id_sdm04='$id_sdm04'");
        return $hasil;
    }

    function tampil_sdm04()
    {
        $hasil =    $this->db->query("SELECT * FROM sdm04");

        return $hasil;
    }

    function aprove_sdm04($id_sdm04)
    {
        $get = $this->db->get_where('temp_sdm04', array('id_sdm04' => $id_sdm04))->result_array();

        $insert_sdm04 = $this->db->insert('sdm04', array(
            'npp'        => $get[0]['npp'],
            'no_urut'    => $get[0]['no_urut'],
            'kd_pend'    => $get[0]['kd_pend'],
            'nama'       => $get[0]['nama'],
            'ket'        => $get[0]['ket'],
            'dnln'       => $get[0]['dnln'],
            'tgl_awal'   => $get[0]['tgl_awal'],
            'tgl_akhir'  => $get[0]['tgl_akhir'],
            'no_sert'    => $get[0]['no_sert'],
            'tgl_sert'   => $get[0]['tgl_sert'],
            'nilai'      => $get[0]['nilai'],
            'grade'      => $get[0]['grade'],
            'bln_proses' => $get[0]['bln_proses'],
            'stat_rec'   => $get[0]['stat_rec'],
            'tgl'        => $get[0]['tgl']
        ));

        $update = $this->db->query("UPDATE temp_sdm04 SET status = '2' WHERE id_sdm04 = '$id_sdm04' ");

        if ($insert_sdm04 && $update) {
            return 1;
        } else {
            return 0;
        }
    }

    function aprove_edit_sdm04($id_sdm04)
    {
        $get = $this->db->get_where('temp_sdm04', array('id_sdm04' => $id_sdm04))->result_array();
        $data = array(
            'npp'        => $get[0]['npp'],
            'no_urut'    => $get[0]['no_urut'],
            'kd_pend'    => $get[0]['kd_pend'],
            'nama'       => $get[0]['nama'],
            'ket'        => $get[0]['ket'],
            'dnln'       => $get[0]['dnln'],
            'tgl_awal'   => $get[0]['tgl_awal'],
            'tgl_akhir'  => $get[0]['tgl_akhir'],
            'no_sert'    => $get[0]['no_sert'],
            'tgl_sert'   => $get[0]['tgl_sert'],
            'nilai'      => $get[0]['nilai'],
            'grade'      => $get[0]['grade'],
            'bln_proses' => $get[0]['bln_proses'],
            'stat_rec'   => $get[0]['stat_rec'],
            'tgl'        => $get[0]['tgl']
        );
        $update4 = $this->db->update('sdm04', $data, array('npp' => $get[0]['npp'], 'no_urut' => $get[0]['no_urut']));

        $update = $this->db->query("UPDATE temp_sdm04 SET status = '2' WHERE id_sdm04 = '$id_sdm04' ");

        if ($update4 && $update) {
            return 1;
        } else {
            return 0;
        }
    }

    function reject_sdm04($id_sdm04, $status)
    {
        $data = array('status' => $status);

        $this->db->where('id_sdm04', $id_sdm04);
        $this->db->update('temp_sdm04', $data);

        return 1;
    }

    function tempt04()
    {
        return $this->db->query("SELECT * FROM temp_sdm04")->result_array();
    }

    function tempt04_kar($npp)
    {
        $npp    = $this->session->userdata('status_login_username');
        return $this->db->query("SELECT * FROM temp_sdm04 WHERE npp='$npp' ")->result_array();
    }

    //========================================== SDM 05 ==================================================  
    //========================================== SDM 05 ==================================================  
    //========================================== SDM 05 ==================================================  
    //========================================== SDM 05 ==================================================  
    //========================================== SDM 05 ==================================================  

    function cari_sdm05($npp)
    {
        return $this->db->query("SELECT * FROM sdm05 where npp = $npp")->result_array();
    }

    function entry_sdm05(
        $npp,
        $thn_awal,
        $thn_akhir,
        $nama,
        $jabatan,
        $nm_jbt,
        $no_sk,
        $tgl_sk,
        $bln_proses,
        $stat_rec
    ) {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("Y/m/d H:i:s");
        $this->db->select_max('no_urut');
        $this->db->from('sdm05');
        $this->db->where('npp', $npp);
        $query  =   $this->db->get()->result_array();
        $urut   =   $query[0]['no_urut'] + 1;
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $urut,
            'thn_awal'   =>  $thn_awal,
            'thn_akhir'  =>  $thn_akhir,
            'nama'       =>  $nama,
            'jabatan'    =>  $jabatan,
            'nm_jbt'     =>  $nm_jbt,
            'no_sk'      =>  $no_sk,
            'tgl_sk'     =>  $tgl_sk,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec,
            'tgl'        =>  $date
        );

        $insert     =   $this->db->insert('sdm05', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }


    function edit_sdm05(
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
    ) {
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $no_urut,
            'thn_awal'   =>  $thn_awal,
            'thn_akhir'  =>  $thn_akhir,
            'nama'       =>  $nama,
            'jabatan'    =>  $jabatan,
            'nm_jbt'     =>  $nm_jbt,
            'no_sk'      =>  $no_sk,
            'tgl_sk'     =>  $tgl_sk,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec
        );

        $this->db->where('id_sdm05', $id_sdm05);
        $this->db->update('sdm05', $data);

        return 1;
    }

    function delet_sdm05($id_sdm05)
    {
        $hasil = $this->db->query("DELETE FROM sdm05 WHERE id_sdm05='$id_sdm05'");
        return $hasil;
    }

    function tampil_sdm05()
    {
        $hasil =    $this->db->query("SELECT * FROM sdm05");

        return $hasil;
    }

    //========================================== SDM 06 ==================================================  
    //========================================== SDM 06 ==================================================  
    //========================================== SDM 06 ==================================================  
    //========================================== SDM 06 ==================================================  
    //========================================== SDM 06 ==================================================  

    function cari_sdm06($npp)
    {
        return $this->db->query("SELECT * FROM sdm06 where npp = $npp")->result_array();
    }

    function entry_sdm06($npp, $st_peg, $tmt, $no_sk, $tgl_sk, $npp_jbt, $bln_proses, $stat_rec)
    {
        date_default_timezone_set('Asia/Jakarta');

        $date   =   date("Y/m/d H:i:s");
        $this->db->select_max('no_urut');
        $this->db->from('sdm06');
        $this->db->where('npp', $npp);
        $query  =   $this->db->get()->result_array();
        $urut   =   $query[0]['no_urut'] + 1;
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $urut,
            'st_peg'     =>  $st_peg,
            'tmt'        =>  $tmt,
            'no_sk'      =>  $no_sk,
            'tgl_sk'     =>  $tgl_sk,
            'npp_jbt'    =>  $npp_jbt,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec,
            'tgl'        =>  $date
        );

        $insert     =   $this->db->insert('sdm06', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_sdm06($id_sdm06, $npp, $no_urut, $st_peg, $tmt, $no_sk, $tgl_sk, $npp_jbt, $bln_proses, $stat_rec)
    {
        $data   =   array(
            'npp'          =>  $npp,
            'no_urut'    =>  $no_urut,
            'st_peg'     =>  $st_peg,
            'tmt'        =>  $tmt,
            'no_sk'      =>  $no_sk,
            'tgl_sk'     =>  $tgl_sk,
            'npp_jbt'    =>  $npp_jbt,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec
        );

        $this->db->where('id_sdm06', $id_sdm06);
        $this->db->update('sdm06', $data);

        return 1;
    }

    function delet_sdm06($id_sdm06)
    {
        $hasil = $this->db->query("DELETE FROM sdm06 WHERE id_sdm06='$id_sdm06'");
        return $hasil;
    }

    function tampil_sdm06()
    {
        $hasil =    $this->db->query("SELECT * FROM sdm06");

        return $hasil;
    }

    //========================================== SDM 07 ==================================================  
    //========================================== SDM 07 ==================================================  
    //========================================== SDM 07 ==================================================  
    //========================================== SDM 07 ==================================================  
    //========================================== SDM 07 ==================================================  

    function cari_sdm07($npp)
    {
        return $this->db->query("SELECT * FROM sdm07 where npp = $npp")->result_array();
    }

    function entry_sdm07($npp, $st_peg, $tmt, $no_sk, $tgl_sk, $tgl_akhir, $npp_jbt, $bln_proses, $stat_rec)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("Y/m/d H:i:s");
        $this->db->select_max('no_urut');
        $this->db->from('sdm07');
        $this->db->where('npp', $npp);
        $query  =   $this->db->get()->result_array();
        $urut   =   $query[0]['no_urut'] + 1;
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $urut,
            'st_peg'     =>  $st_peg,
            'tmt'        =>  $tmt,
            'no_sk'      =>  $no_sk,
            'tgl_sk'     =>  $tgl_sk,
            'tgl_akhir'  =>  $tgl_akhir,
            'npp_jbt'    =>  $npp_jbt,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec,
            'tgl'        =>  $date
        );

        $insert     =   $this->db->insert('sdm07', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_sdm07($id_sdm07, $npp, $no_urut, $st_peg, $tmt, $no_sk, $tgl_sk, $tgl_akhir, $npp_jbt, $bln_proses, $stat_rec)
    {
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $no_urut,
            'st_peg'     =>  $st_peg,
            'tmt'        =>  $tmt,
            'no_sk'      =>  $no_sk,
            'tgl_sk'     =>  $tgl_sk,
            'tgl_akhir'  =>  $tgl_akhir,
            'npp_jbt'    =>  $npp_jbt,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec
        );

        $this->db->where('id_sdm07', $id_sdm07);
        $this->db->update('sdm07', $data);

        return 1;
    }

    function delet_sdm07($id_sdm07)
    {
        $hasil = $this->db->query("DELETE FROM sdm07 WHERE id_sdm07='$id_sdm07'");
        return $hasil;
    }

    function tampil_sdm07()
    {
        $hasil =    $this->db->query("SELECT * FROM sdm07 ");

        return $hasil;
    }

    //========================================== SDM 08 ==================================================  
    //========================================== SDM 08 ==================================================  
    //========================================== SDM 08 ==================================================  
    //========================================== SDM 08 ==================================================  
    //========================================== SDM 08 ==================================================  

    function cari_sdm08($npp)
    {
        return $this->db->query("SELECT * FROM sdm08 where npp = $npp")->result_array();
    }

    function entry_sdm08(
        $npp,
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
    ) {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date('Y/m/d H:i:s');
        $this->db->select_max('no_urut');
        $this->db->from('sdm08');
        $this->db->where('npp', $npp);
        $query  =   $this->db->get()->result_array();
        $urut   =   $query[0]['no_urut'] + 1;
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $urut,
            'kd_mutasi'  =>  $kd_mutasi,
            'kd_unit'    =>  $kd_unit,
            'kd_adf'     =>  $kd_adf,
            'kd_bud'     =>  $kd_bud,
            'jabatan'    =>  $jabatan,
            'tmt'        =>  $tmt,
            'no_sk'      =>  $no_sk,
            'tgl_sk'     =>  $tgl_sk,
            'npp_jbt'    =>  $npp_jbt,
            'tinggal'    =>  $tinggal,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec,
            'tgl'        =>  $date
        );

        $insert     =   $this->db->insert('sdm08', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_sdm08(
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
    ) {
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $no_urut,
            'kd_mutasi'  =>  $kd_mutasi,
            'kd_unit'    =>  $kd_unit,
            'kd_adf'     =>  $kd_adf,
            'kd_bud'     =>  $kd_bud,
            'jabatan'    =>  $jabatan,
            'tmt'        =>  $tmt,
            'no_sk'      =>  $no_sk,
            'tgl_sk'     =>  $tgl_sk,
            'npp_jbt'    =>  $npp_jbt,
            'tinggal'    =>  $tinggal,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec
        );

        $this->db->where('id_sdm08', $id_sdm08);
        $this->db->update('sdm08', $data);

        return 1;
    }

    function delet_sdm08($id_sdm08)
    {
        $hasil = $this->db->query("DELETE FROM sdm08 WHERE id_sdm08='$id_sdm08'");
        return $hasil;
    }

    function tampil_sdm08()
    {
        $hasil =    $this->db->query("SELECT * FROM sdm08");
        return $hasil;
    }

    function get_bynpp($npp)
    {
        $hsl = $this->db->query("SELECT * FROM sdm08 WHERE npp='$npp'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result_array() as $data) {
                $hasil = array(
                    'id_sdm08'   =>  $data['id_sdm08'],
                    'npp'        =>  $data['npp'],
                    'no_urut'    =>  $data['no_urut'],
                    'kd_mutasi'  =>  $data['kd_mutasi'],
                    'kd_unit'    =>  $data['kd_unit'],
                    'kd_adf'     =>  $data['kd_adf'],
                    'kd_bud'     =>  $data['kd_bud'],
                    'jabatan'    =>  $data['jabatan'],
                    'tmt'        =>  $data['tmt'],
                    'no_sk'      =>  $data['no_sk'],
                    'tgl_sk'     =>  $data['tgl_sk'],
                    'npp_jbt'    =>  $data['npp_jbt'],
                    'tinggal'    =>  $data['tinggal'],
                    'bln_proses' =>  $data['bln_proses'],
                    'stat_rec'   =>  $data['stat_rec'],
                    'tgl'        =>  $data['tgl'],
                );
            }
        }
        return $hasil;
    }

    function get_jabini()
    {
        return $this->db->query("SELECT * FROM jab ")->result_array();
    }

    function get_sdm08_a1($npp)
    {
        return $this->db->query(
            "SELECT sdm08.tgl_sk, sdm08.no_sk from sdm08
                    RIGHT JOIN sdm01 ON sdm08.npp = sdm01.npp
                    where sdm01.npp = $npp 
                    group by sdm01.npp"
        )->result_array();
    }

    function get_sdm08_a1_akhir($npp)
    {
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm08 where npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        return $this->db->query(
            "SELECT sdm08.kd_unit AS kd_kbn, sdm08.kd_adf, sdm08.jabatan AS kd_jab,
                sdm08.kd_bud, sdm08.tmt AS jab_tmt, sdm08.no_sk AS jab_sk, sdm08.tgl_sk AS jab_tgl
                from sdm08
                    RIGHT JOIN sdm01 ON sdm08.npp = sdm01.npp
                    where sdm08.npp = $npp AND sdm08.no_urut=$no"
        )->result_array();
    }

    function get_jabatan($jabatan)
    {
        return $this->db->query(
            "SELECT jab.jabatan, jab.nama 
                FROM jab
                JOIN sdm08 ON jab.jabatan = sdm08.jabatan
                WHERE jab.jabatan = '$jabatan'
                GROUP BY jab.jabatan = sdm08.jabatan"
        )->result_array();
    }

    //========================================== SDM 09 ==================================================  
    //========================================== SDM 09 ==================================================  
    //========================================== SDM 09 ==================================================  
    //========================================== SDM 09 ==================================================  
    //========================================== SDM 09 ==================================================  

    function cari_sdm09($npp)
    {
        return $this->db->query("SELECT * FROM sdm09 where npp = $npp")->result_array();
    }

    function entry_sdm09(
        $npp,
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
    ) {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date('Y/m/d H:i:s');
        $this->db->select_max('no_urut');
        $this->db->from('sdm09');
        $this->db->where('npp', $npp);
        $query  =   $this->db->get()->result_array();
        $urut   =   $query[0]['no_urut'] + 1;
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $urut,
            'kd_unit'    =>  $kd_unit,
            'jabatan'    =>  $jabatan,
            'tmt'        =>  $tmt,
            'no_sk'      =>  $no_sk,
            'tgl_sk'     =>  $tgl_sk,
            'lama_jab'   =>  $lama_jab,
            'tgl_akhir'  =>  $tgl_akhir,
            'npp_jbt'    =>  $npp_jbt,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec,
            'tgl'        =>  $date
        );

        $insert     =   $this->db->insert('sdm09', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_sdm09(
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
    ) {
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $no_urut,
            'kd_unit'    =>  $kd_unit,
            'jabatan'    =>  $jabatan,
            'tmt'        =>  $tmt,
            'no_sk'      =>  $no_sk,
            'tgl_sk'     =>  $tgl_sk,
            'lama_jab'   =>  $lama_jab,
            'tgl_akhir'  =>  $tgl_akhir,
            'npp_jbt'    =>  $npp_jbt,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec
        );

        $this->db->where('id_sdm09', $id_sdm09);
        $this->db->update('sdm09', $data);

        return 1;
    }

    function delet_sdm09($id_sdm09)
    {
        $hasil = $this->db->query("DELETE FROM sdm09 WHERE id_sdm09='$id_sdm09'");
        return $hasil;
    }

    function tampil_sdm09()
    {
        $hasil =    $this->db->query("SELECT * FROM sdm09");

        return $hasil;
    }

    //========================================== SDM 10 ==================================================  
    //========================================== SDM 10 ==================================================  
    //========================================== SDM 10 ==================================================  
    //========================================== SDM 10 ==================================================  
    //========================================== SDM 10 ==================================================  

    function cari_sdm10($npp)
    {
        return $this->db->query("SELECT * FROM sdm10 where npp = $npp")->result_array();
    }

    function entry_sdm10(
        $npp,
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
    ) {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date('Y/m/d H:i:s');
        $this->db->select_max('no_urut');
        $this->db->from('sdm10');
        $this->db->where('npp', $npp);
        $query  =   $this->db->get()->result_array();
        $urut   =   $query[0]['no_urut'] + 1;
        $data   =   array(
            'npp'         =>  $npp,
            'no_urut'     =>  $urut,
            'kd_inst'     =>  $kd_inst,
            'jabatan'     =>  $jabatan,
            'tmt'         =>  $tmt,
            'lama_jab'    =>  $lama_jab,
            'no_sk'       =>  $no_sk,
            'tgl_sk'      =>  $tgl_sk,
            'tgl_akhir'   =>  $tgl_akhir,
            'npp_jbt'     =>  $npp_jbt,
            'bln_proses'  =>  $bln_proses,
            'stat_rec'    =>  $stat_rec,
            'tgl'         =>  $date
        );

        $insert =   $this->db->insert('sdm10', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_sdm10(
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
    ) {
        $data   =   array(
            'npp'         =>  $npp,
            'no_urut'     =>  $no_urut,
            'kd_inst'     =>  $kd_inst,
            'jabatan'     =>  $jabatan,
            'tmt'         =>  $tmt,
            'lama_jab'    =>  $lama_jab,
            'no_sk'       =>  $no_sk,
            'tgl_sk'      =>  $tgl_sk,
            'tgl_akhir'   =>  $tgl_akhir,
            'npp_jbt'     =>  $npp_jbt,
            'bln_proses'  =>  $bln_proses,
            'stat_rec'    =>  $stat_rec
        );

        $this->db->where('id_sdm10', $id_sdm10);
        $this->db->update('sdm10', $data);

        return 1;
    }

    function delet_sdm10($id_sdm10)
    {
        $hasil = $this->db->query("DELETE FROM sdm10 WHERE id_sdm10='$id_sdm10'");
        return $hasil;
    }

    function tampil_sdm10()
    {
        $hasil =    $this->db->query("SELECT * FROM sdm10");

        return $hasil;
    }

    //========================================== SDM 11 ==================================================  
    //========================================== SDM 11 ==================================================  
    //========================================== SDM 11 ==================================================  
    //========================================== SDM 11 ==================================================  
    //========================================== SDM 11 ==================================================  

    function cari_sdm11($npp)
    {
        return $this->db->query("SELECT * FROM sdm11 where npp = $npp")->result_array();
    }

    function entry_sdm11(
        $npp,
        $nm_satgas,
        $jabatan,
        $tmt,
        $no_sk,
        $tgl_sk,
        $tgl_akhir,
        $npp_jbt,
        $bln_proses,
        $stat_rec
    ) {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date('Y/m/d H:i:s');
        $this->db->select_max('no_urut');
        $this->db->from('sdm11');
        $this->db->where('npp', $npp);
        $query  =   $this->db->get()->result_array();
        $urut   =   $query[0]['no_urut'] + 1;
        $data   =   array(
            'npp'         =>  $npp,
            'no_urut'     =>  $urut,
            'nm_satgas'   =>  $nm_satgas,
            'jabatan'     =>  $jabatan,
            'tmt'         =>  $tmt,
            'no_sk'       =>  $no_sk,
            'tgl_sk'      =>  $tgl_sk,
            'tgl_akhir'   =>  $tgl_akhir,
            'npp_jbt'     =>  $npp_jbt,
            'bln_proses'  =>  $bln_proses,
            'stat_rec'    =>  $stat_rec,
            'tgl'         =>  $date
        );

        $insert     =   $this->db->insert('sdm11', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_sdm11(
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
    ) {
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $no_urut,
            'nm_satgas'  =>  $nm_satgas,
            'jabatan'    =>  $jabatan,
            'tmt'        =>  $tmt,
            'no_sk'      =>  $no_sk,
            'tgl_sk'     =>  $tgl_sk,
            'tgl_akhir'  =>  $tgl_akhir,
            'npp_jbt'    =>  $npp_jbt,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec
        );

        $this->db->where('id_sdm11', $id_sdm11);
        $this->db->update('sdm11', $data);

        return 1;
    }

    function delet_sdm11($id_sdm11)
    {
        $hasil = $this->db->query("DELETE FROM sdm11 WHERE id_sdm11='$id_sdm11'");
        return $hasil;
    }

    function tampil_sdm11()
    {
        $hasil =    $this->db->query("SELECT * FROM sdm11");

        return $hasil;
    }

    //========================================== SDM 12 ==================================================  
    //========================================== SDM 12 ==================================================  
    //========================================== SDM 12 ==================================================  
    //========================================== SDM 12 ==================================================  
    //========================================== SDM 12 ==================================================  

    function cari_sdm12($npp)
    {
        return $this->db->query("SELECT * FROM sdm12 where npp = $npp")->result_array();
    }

    function entry_sdm12($npp, $tmt, $nilai_krd, $no_sk, $tgl_sk, $npp_jbt, $bln_proses, $stat_rec)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date('Y/m/d H:i:s');
        $this->db->select_max('no_urut');
        $this->db->from('sdm12');
        $this->db->where('npp', $npp);
        $query  =   $this->db->get()->result_array();
        $urut   =   $query[0]['no_urut'] + 1;
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $urut,
            'tmt'        =>  $tmt,
            'nilai_krd'  =>  $nilai_krd,
            'no_sk'      =>  $no_sk,
            'tgl_sk'     =>  $tgl_sk,
            'npp_jbt'    =>  $npp_jbt,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec,
            'tgl'        =>  $date
        );

        $insert     =   $this->db->insert('sdm12', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_sdm12($id_sdm12, $npp, $no_urut, $tmt, $nilai_krd, $no_sk, $tgl_sk, $npp_jbt, $bln_proses, $stat_rec)
    {
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $no_urut,
            'tmt'        =>  $tmt,
            'nilai_krd'  =>  $nilai_krd,
            'no_sk'      =>  $no_sk,
            'tgl_sk'     =>  $tgl_sk,
            'npp_jbt'    =>  $npp_jbt,
            'bln_proses' =>  $bln_proses,
            'stat_rec'   =>  $stat_rec
        );

        $this->db->where('id_sdm12', $id_sdm12);
        $this->db->update('sdm12', $data);

        return 1;
    }

    function delet_sdm12($id_sdm12)
    {
        $hasil = $this->db->query("DELETE FROM sdm12 WHERE id_sdm12='$id_sdm12'");
        return $hasil;
    }

    function tampil_sdm12()
    {
        $hasil =    $this->db->query("SELECT * FROM sdm12 ");

        return $hasil;
    }

    //========================================== SDM 13 ==================================================  
    //========================================== SDM 13 ==================================================  
    //========================================== SDM 13 ==================================================  
    //========================================== SDM 13 ==================================================  
    //========================================== SDM 13 ==================================================  

    function cari_sdm13($npp)
    {
        return $this->db->query("SELECT * FROM sdm13 where npp = $npp")->result_array();
    }

    function entry_sdm13($npp, $jns_harga, $uraian, $tgl_harga, $no_sk, $tgl_sk, $npp_jbt, $bln_proses, $stat_rec)
    {
        $date   =   date('Y/m/d H:i:s');
        date_default_timezone_set('Asia/Jakarta');
        $this->db->select_max('no_urut');
        $this->db->from('sdm13');
        $this->db->where('npp', $npp);
        $query  =   $this->db->get()->result_array();
        $urut   =   $query[0]['no_urut'] + 1;
        $data   =   array(
            'npp'         =>  $npp,
            'no_urut'     =>  $urut,
            'jns_harga'   =>  $jns_harga,
            'uraian'      =>  $uraian,
            'tgl_harga'   =>  $tgl_harga,
            'no_sk'       =>  $no_sk,
            'tgl_sk'      =>  $tgl_sk,
            'npp_jbt'     =>  $npp_jbt,
            'bln_proses'  =>  $bln_proses,
            'stat_rec'    =>  $stat_rec,
            'tgl'         =>  $date
        );

        $insert     =   $this->db->insert('sdm13', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_sdm13($id_sdm13, $npp, $no_urut, $jns_harga, $uraian, $tgl_harga, $no_sk, $tgl_sk, $npp_jbt, $bln_proses, $stat_rec)
    {
        $data   =   array(
            'npp'         =>  $npp,
            'no_urut'     =>  $no_urut,
            'jns_harga'   =>  $jns_harga,
            'uraian'      =>  $uraian,
            'tgl_harga'   =>  $tgl_harga,
            'no_sk'       =>  $no_sk,
            'tgl_sk'      =>  $tgl_sk,
            'npp_jbt'     =>  $npp_jbt,
            'bln_proses'  =>  $bln_proses,
            'stat_rec'    =>  $stat_rec
        );

        $this->db->where('id_sdm13', $id_sdm13);
        $this->db->update('sdm13', $data);

        return 1;
    }

    function delet_sdm13($id_sdm13)
    {
        $hasil = $this->db->query("DELETE FROM sdm13 WHERE id_sdm13='$id_sdm13'");
        return $hasil;
    }

    function tampil_sdm13()
    {
        $hasil =    $this->db->query("SELECT * FROM sdm13");

        return $hasil;
    }

    //========================================== SDM 14 ==================================================  
    //========================================== SDM 14 ==================================================  
    //========================================== SDM 14 ==================================================  
    //========================================== SDM 14 ==================================================  
    //========================================== SDM 14 ==================================================  

    function cari_sdm14($npp)
    {
        return $this->db->query("SELECT * FROM sdm14 where npp = $npp")->result_array();
    }

    function entry_sdm14(
        $npp,
        $tgl_lgr,
        $jns_lgr,
        $uraian,
        $jns_hukum,
        $tmt,
        $no_sk,
        $tgl_sk,
        $npp_jbt,
        $bln_proses,
        $stat_rec,
        $masa_berlaku
    ) {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date('Y/m/d H:i:s');
        $this->db->select_max('no_urut');
        $this->db->from('sdm14');
        $this->db->where('npp', $npp);
        $query  =   $this->db->get()->result_array();
        $urut   =   $query[0]['no_urut'] + 1;
        $data   =   array(
            'npp'          =>  $npp,
            'no_urut'      =>  $urut,
            'tgl_lgr'      =>  $tgl_lgr,
            'jns_lgr'      =>  $jns_lgr,
            'uraian'       =>  $uraian,
            'jns_hukum'    =>  $jns_hukum,
            'tmt'          =>  $tmt,
            'no_sk'        =>  $no_sk,
            'tgl_sk'       =>  $tgl_sk,
            'npp_jbt'      =>  $npp_jbt,
            'bln_proses'   =>  $bln_proses,
            'stat_rec'     =>  $stat_rec,
            'masa_berlaku' =>  $masa_berlaku,
            'tgl'          =>  $date
        );

        $insert     =   $this->db->insert('sdm14', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_sdm14(
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
        $stat_rec,
        $masa_berlaku
    ) {
        $data   =   array(
            'npp'         =>  $npp,
            'no_urut'     =>  $no_urut,
            'tgl_lgr'     =>  $tgl_lgr,
            'jns_lgr'     =>  $jns_lgr,
            'uraian'      =>  $uraian,
            'jns_hukum'   =>  $jns_hukum,
            'tmt'         =>  $tmt,
            'no_sk'       =>  $no_sk,
            'tgl_sk'      =>  $tgl_sk,
            'npp_jbt'     =>  $npp_jbt,
            'bln_proses'  =>  $bln_proses,
            'stat_rec'    =>  $stat_rec,
            'masa_berlaku' =>  $masa_berlaku
        );

        $this->db->where('id_sdm14', $id_sdm14);
        $this->db->update('sdm14', $data);

        return 1;
    }

    function delet_sdm14($id_sdm14)
    {
        $hasil = $this->db->query("DELETE FROM sdm14 WHERE id_sdm14='$id_sdm14'");
        return $hasil;
    }

    function tampil_sdm14()
    {
        $hasil =    $this->db->query("SELECT * FROM sdm14");

        return $hasil;
    }

    //========================================== SDM 15 ==================================================  
    //========================================== SDM 15 ==================================================  
    //========================================== SDM 15 ==================================================  
    //========================================== SDM 15 ==================================================  
    //========================================== SDM 15 ==================================================  

    function cari_sdm15($npp)
    {
        return $this->db->query("SELECT * FROM sdm15 where npp = $npp")->result_array();
    }

    function entry_sdm15(
        $npp,
        $jns_cuti,
        $tmt,
        $lama_cuti,
        $thn_angg,
        $no_sk,
        $tgl_sk,
        $npp_jbt,
        $bln_proses,
        $stat_rec
    ) {
        date_default_timezone_set('Asia/Jakarta');

        $date   =   date('Y/m/d H:i:s');
        $this->db->select_max('no_urut');
        $this->db->from('sdm15');
        $this->db->where('npp', $npp);
        $query  =   $this->db->get()->result_array();
        $urut   =   $query[0]['no_urut'] + 1;
        $data   =   array(
            'npp'         =>  $npp,
            'no_urut'     =>  $urut,
            'jns_cuti'    =>  $jns_cuti,
            'tmt'         =>  $tmt,
            'lama_cuti'   =>  $lama_cuti,
            'thn_angg'    =>  $thn_angg,
            'no_sk'       =>  $no_sk,
            'tgl_sk'      =>  $tgl_sk,
            'npp_jbt'     =>  $npp_jbt,
            'bln_proses'  =>  $bln_proses,
            'stat_rec'    =>  $stat_rec,
            'tgl'         =>  $date
        );

        $insert     =   $this->db->insert('sdm15', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_sdm15(
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
    ) {
        $data   =   array(
            'npp'         =>  $npp,
            'no_urut'     =>  $no_urut,
            'jns_cuti'    =>  $jns_cuti,
            'tmt'         =>  $tmt,
            'lama_cuti'   =>  $lama_cuti,
            'thn_angg'    =>  $thn_angg,
            'no_sk'       =>  $no_sk,
            'tgl_sk'      =>  $tgl_sk,
            'npp_jbt'     =>  $npp_jbt,
            'bln_proses'  =>  $bln_proses,
            'stat_rec'    =>  $stat_rec
        );

        $this->db->where('id_sdm15', $id_sdm15);
        $this->db->update('sdm15', $data);

        return 1;
    }

    function delet_sdm15($id_sdm15)
    {
        $hasil = $this->db->query("DELETE FROM sdm15 WHERE id_sdm15='$id_sdm15'");
        return $hasil;
    }

    function tampil_sdm15()
    {
        $hasil =    $this->db->query("SELECT * FROM sdm15");

        return $hasil;
    }

    //========================================== SDM 16 ==================================================  
    //========================================== SDM 16 ==================================================  
    //========================================== SDM 16 ==================================================  
    //========================================== SDM 16 ==================================================  
    //========================================== SDM 16 ==================================================  

    function cari_sdm16($npp)
    {
        return $this->db->query("SELECT * FROM sdm16 where npp = $npp")->result_array();
    }

    function entry_sdm16(
        $npp,
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
    ) {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date('Y/m/d H:i:s');
        $this->db->select_max('no_urut');
        $this->db->from('sdm16');
        $this->db->where('npp', $npp);
        $query  =   $this->db->get()->result_array();
        $urut   =   $query[0]['no_urut'] + 1;
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $urut,
            'st_peg'     =>  $st_peg,
            'golongan'   =>  $golongan,
            'mk'         =>  $mk,
            'tmt'        =>  $tmt,
            'jns_naik'   =>  $jns_naik,
            'no_sk'      =>  $no_sk,
            'tgl_sk'     =>  $tgl_sk,
            'npp_jbt'    =>  $npp_jbt,
            'bln_proses' =>  $bln_proses,
            'kd_kelas'   =>  $kd_kelas,
            'stat_rec'   =>  $stat_rec,
            'tgl'        =>  $date
        );

        $insert     =   $this->db->insert('sdm16', $data);

        if ($insert) {
            return 1;
        } else {
            return 0;
        }
    }

    function edit_sdm16(
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
    ) {
        $data   =   array(
            'npp'        =>  $npp,
            'no_urut'    =>  $no_urut,
            'st_peg'     =>  $st_peg,
            'golongan'   =>  $golongan,
            'mk'         =>  $mk,
            'tmt'        =>  $tmt,
            'jns_naik'   =>  $jns_naik,
            'no_sk'      =>  $no_sk,
            'tgl_sk'     =>  $tgl_sk,
            'npp_jbt'    =>  $npp_jbt,
            'bln_proses' =>  $bln_proses,
            'kd_kelas'   =>  $kd_kelas,
            'stat_rec'   =>  $stat_rec
        );

        $this->db->where('id_sdm16', $id_sdm16);
        $this->db->update('sdm16', $data);

        return 1;
    }

    function delet_sdm16($id_sdm16)
    {
        $hasil = $this->db->query("DELETE FROM sdm16 WHERE id_sdm16='$id_sdm16'");
        return $hasil;
    }

    function tampil_sdm16()
    {
        $hasil =    $this->db->query("SELECT * FROM sdm16");
        return $hasil;
    }

    function get_bynpp_16($npp)
    {
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm16 where npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        $hsl = $this->db->query("SELECT * FROM sdm16 WHERE npp='$npp' AND no_urut='$no' ");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result_array() as $data) {
                $hasil = array(
                    'npp'        =>  $data['npp'],
                    'no_urut'    =>  $data['no_urut'],
                    'st_peg'     =>  $data['st_peg'],
                    'golongan'   =>  $data['golongan'],
                    'mk'         =>  $data['mk'],
                    'tmt'        =>  $data['tmt'],
                    'jns_naik'   =>  $data['jns_naik'],
                    'no_sk'      =>  $data['no_sk'],
                    'tgl_sk'     =>  $data['tgl_sk'],
                    'npp_jbt'    =>  $data['npp_jbt'],
                    'bln_proses' =>  $data['bln_proses'],
                    'kd_kelas'   =>  $data['kd_kelas'],
                    'stat_rec'   =>  $data['stat_rec'],
                    'tgl'        =>  $data['tgl'],
                );
            }
        }
        return $hasil;
    }

    function get_sdm16_a1($npp)
    {
        return $this->db->query(
            "SELECT sdm16.st_peg AS kd_kelas, sdm16.tmt AS kls_tmt, 
                sdm16.no_sk AS kls_sk, sdm16.golongan, sdm16.tgl_sk from sdm16
                    RIGHT JOIN sdm01 ON sdm16.npp = sdm01.npp
                    where sdm01.npp = $npp 
                    group by sdm01.npp"
        )->result_array();
    }

    function get_sdm16_a1_akhir($npp)
    {
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm16 where npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        return $this->db->query(
            "SELECT sdm16.tmt AS gol_tmt, sdm16.no_sk AS gol_sk , sdm16.golongan, sdm16.mk, sdm16.tgl_sk from sdm16
                    RIGHT JOIN sdm01 ON sdm16.npp = sdm01.npp
                    where sdm16.npp= $npp AND sdm16.no_urut=$no"
        )->result_array();
    }

    //========================================== PENDIDIKAN ==================================================  
    //========================================== PENDIDIKAN ==================================================  
    //========================================== PENDIDIKAN ==================================================  
    //========================================== PENDIDIKAN ==================================================  
    //========================================== PENDIDIKAN ==================================================  

    function show_pend()
    {
        $hasil =    $this->db->query("SELECT * FROM pend");
        return $hasil;
    }

    //========================================== A1 ==================================================  
    //========================================== A1 ==================================================  
    //========================================== A1 ==================================================  
    //========================================== A1 ==================================================  
    //========================================== A1 ==================================================

    function tampil_a1()
    {
        $hasil = $this->db->query("SELECT * FROM sdm01 LIMIT 30"); /* Tak Pake Limit */
        return $hasil;
    }

    // function proses()
    // {
    //     return $this->db->query("SELECT count(*) AS Jmlh FROM sdm01 LIMIT 40")->result_array();
    // }

    function bio_diri($npp)
    {
        return $this->db->query("SELECT * FROM sdm01 where npp = $npp")->result_array();
    }

    // Biodata Diri
    function get_bio($npp)
    {
        $this->db->select('npp,nama,kota_lhr,tgl_lhr,tgl_masuk,alamat_tgl,agama,j_kelamin,gol_darah,st_sipil');
        $this->db->from('sdm01');
        $this->db->where('npp', $npp);
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
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm16 where npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        return $this->db->query(
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
    function get_bio_kel($npp)
    {
        $this->db->SELECT('sdm02.no_urut, sdm02.nama, sdm02.hbg_klg, sdm02.kota_lhr, sdm02.tgl_lhr, sdm02.tgl_lhr, sdm02.gol_darah, sdm02.tk_pend');
        $this->db->FROM('sdm02');
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
            JOIN sdm02 ON tk_pend.tk_pend = sdm02.tk_pend
            WHERE tk_pend.tk_pend = '$tk_pend'
            GROUP BY tk_pend.tk_pend = sdm02.tk_pend"
        )->result_array();
    }

    function almt($npp)
    {
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
    function get_mutasi($npp)
    {
        $this->db->SELECT('sdm16.no_urut, sdm16.golongan, sdm16.mk, sdm16.tmt, sdm16.jns_naik, sdm16.no_sk, sdm16.tgl_sk, sdm16.npp_jbt');
        $this->db->FROM('sdm16');
        $this->db->WHERE('sdm16.npp', $npp);
        $this->db->ORDER_BY('sdm16.no_urut ASC');
        return $this->db->GET()->result_array();
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

    function get_sdm08($npp)
    {
        $this->db->SELECT('sdm08.no_urut, sdm08.jabatan, sdm08.kd_unit, sdm08.tmt, sdm08.no_sk, sdm08.tgl_sk, sdm08.npp_jbt');
        $this->db->FROM('sdm08');
        $this->db->WHERE('sdm08.npp', $npp);
        $this->db->ORDER_BY('sdm08.no_urut ASC');
        return $this->db->GET()->result_array();
    }

    function get_jab($jabatan)
    {
        return $this->db->query(
            "SELECT jab.jabatan, jab.nama
                FROM jab
                JOIN sdm08 ON jab.jabatan = sdm08.jabatan
                WHERE jab.jabatan = $jabatan
                GROUP BY jab.jabatan"
        )->result_array();
    }

    function naik()
    {
        return $this->db->query("SELECT * FROM naik")->result_array();
    }

    function gol()
    {
        return $this->db->query("SELECT * FROM gol")->result_array();
    }

    function get_no_id($npp)
    {
        return $this->db->query("SELECT * FROM login_karyawan WHERE username = '$npp' GROUP BY id")->result_array();
    }

    // PENDIDIKAN FORMAL
    function get_sdm03($npp)
    {
        $this->db->SELECT('sdm03.no_urut, sdm03.kd_pend, sdm03.ket, sdm03.kota, sdm03.thn_awal, sdm03.thn_akhir, sdm03.no_ijasah, sdm03.tgl_ijasah');
        $this->db->FROM('sdm03');
        $this->db->WHERE('sdm03.npp', $npp);
        $this->db->ORDER_BY('sdm03.no_urut ASC');
        return $this->db->GET()->result_array();
    }

    function get_sdm03_no($npp)
    {
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut FROM sdm03 WHERE npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        $query = $this->db->query(
            "SELECT sdm03.no_urut FROM sdm03
            WHERE sdm03.npp = $npp and sdm03.no_urut = $no"
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

    function get_sdm04($npp)
    {
        $this->db->SELECT('sdm04.no_urut, sdm04.ket, sdm04.nama, sdm04.no_sert');
        $this->db->FROM('sdm04');
        $this->db->WHERE('sdm04.npp', $npp);
        $this->db->ORDER_BY('sdm04.no_urut ASC');
        return $this->db->GET()->result_array();
    }

    function get_sdm14($npp)
    {
        $this->db->SELECT('sdm14.no_urut, sdm14.jns_hukum, sdm14.uraian, sdm14.no_sk, sdm14.tgl_sk, sdm14.tmt, sdm14.masa_berlaku');
        $this->db->FROM('sdm14');
        $this->db->WHERE('sdm14.npp', $npp);
        $this->db->ORDER_BY('sdm14.no_urut ASC');
        return $this->db->GET()->result_array();
    }

    function get_login_admin()
    {
        $id = $this->session->userdata('id');
        return $this->db->query("SELECT * FROM login_admin WHERE id='$id' GROUP BY id='$id'")->result_array();
    }

    function cari_login_karyawan($username)
    {
        return $this->db->query("SELECT * FROM login_karyawan where username = $username")->result_array();
    }

    function get_id($id)
    {
        return $this->db->query("SELECT * FROM login_karyawan WHERE id = '$id' ")->result_array();
    }

    function get_hak_akses()
    {
        return $this->db->query("SELECT * FROM login_karyawan")->result_array();
    }

    function edit_login_kar($id, $nama, $username, $md5)
    {
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("Y/m/d h:i:s");
        $data   =   array(
            'nama'      =>  $nama,
            'username'  =>  $username,
            'pass'      =>  $md5,
            'image'     =>  "default.jpg",
            'tgl'       =>  $date
        );
        $this->db->where('id', $id);
        $this->db->update('login_karyawan', $data);

        return 1;
    }

    function edit_login_kar2($id, $image)
    {
        $data   =   array(
            'image' => $image
        );
        $this->db->where('id', $id);
        $this->db->update('login_karyawan', $data);

        return 1;
    }

    function delete($id, $valid)
    {
        if ($valid == 1) {
            $data    =    array(
                'valid'  =>  0,
                'status' =>  0
            );

            $this->db->where('id', $id);
            $this->db->update('login_karyawan', $data);

            return 1;
        } else {
            $data     =     array(
                'valid'   =>  1,
                'status'  =>  0
            );

            $this->db->where('id', $id);
            $this->db->update('login_karyawan', $data);

            return 1;
        }
    }

    function lg_admin()
    {
        $id = $this->session->userdata('id');
        return $this->db->query("SELECT * FROM login_admin Where id = $id ")->result_array();
    }

    function edit_image($id, $nama, $alamat, $tlp, $email, $username, $image)
    {
        $data   =   array(
            'nama'     => $nama,
            'alamat'   => $alamat,
            'tlp'      => $tlp,
            'email'    => $email,
            'username' => $username,
            'image'    => $image
        );
        $this->db->where('id', $id);
        $this->db->update('login_admin', $data);

        return 1;
    }

    function cek_old_password($id, $pass)
    {
        $result = $this->db->query("SELECT * FROM login_admin WHERE id = '$id' AND pass = '$pass' ");
        if ($result->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function ganti_password($id, $new_password)
    {
        return $this->db->query("UPDATE login_admin SET pass = '$new_password' WHERE id = '$id' ");
    }

    function save_batch_sdm08($data)
    {
        return $this->db->insert_batch('sdm08', $data);
    }

    function save_batch_sdm16($data)
    {
        return $this->db->insert_batch('sdm16', $data);
    }

    function get_sdm08_no($npp)
    {
        $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm08 where npp = $npp group by npp")->result_array();
        $no = $no_urut[0]['no_urut'];
        $query = $this->db->query(
            "SELECT sdm08.no_urut from sdm08
                    where sdm08.npp = $npp and sdm08.no_urut = $no"
        );
        return $query->result_array();
    }

    function quota_cuti_thn()
    {
        return $this->db->query("SELECT * FROM (
            SELECT tb_cuti_thn.npp, tb_cuti_thn.jns_cuti, tb_cuti_thn.valid, sdm01.nama, 12-SUM(tb_cuti_thn.jmlh_hari) AS sisa_tb_cuti_thn 
                    FROM tb_cuti_thn
                    JOIN sdm01 ON tb_cuti_thn.npp=sdm01.npp  
                    WHERE YEAR(tb_cuti_thn.tgl_mulai)=YEAR(now())
                    GROUP BY tb_cuti_thn.npp
            
            UNION

            SELECT tb_cuti_thn.npp, tb_cuti_thn.jns_cuti, tb_cuti_thn.valid, sdm01.nama, 12 AS sisa_tb_cuti_thn
                    FROM tb_cuti_thn
                    JOIN sdm01 ON tb_cuti_thn.npp = sdm01.npp
                    GROUP BY tb_cuti_thn.npp
            
            ) AS semua
                
            GROUP BY semua.npp")->result_array();
    }

    function quota_cuti_pjg()
    {
        return $this->db->query("SELECT * FROM (
            SELECT tb_cuti_pjg.npp, tb_cuti_pjg.jns_cuti, tb_cuti_pjg.valid, sdm01.nama, 30-SUM(tb_cuti_pjg.jmlh_hari) AS sisa_tb_cuti_pjg 
                    FROM tb_cuti_pjg
                    JOIN sdm01 
                    ON tb_cuti_pjg.npp=sdm01.npp  
                    WHERE YEAR(tb_cuti_pjg.tgl_mulai)=YEAR(now())
                    GROUP BY tb_cuti_pjg.npp
            
            UNION

            SELECT tb_cuti_pjg.npp, tb_cuti_pjg.jns_cuti, tb_cuti_pjg.valid, sdm01.nama, 30 AS sisa_tb_cuti_pjg
                    FROM tb_cuti_pjg
                    JOIN sdm01 ON tb_cuti_pjg.npp = sdm01.npp
                    GROUP BY tb_cuti_pjg.npp
            ) AS semua
                
            GROUP BY semua.npp")->result_array();
    }

    function quota_cuti_sakit()
    {
        return $this->db->query("SELECT * FROM (
            SELECT tb_cuti_sakit.npp, tb_cuti_sakit.jns_cuti, tb_cuti_sakit.valid, sdm01.nama, 30-SUM(tb_cuti_sakit.jmlh_hari) AS sisa_tb_cuti_sakit 
                    FROM tb_cuti_sakit
                    JOIN sdm01 
                    ON tb_cuti_sakit.npp=sdm01.npp  
                    WHERE YEAR(tb_cuti_sakit.tgl_mulai)=YEAR(now())
                    GROUP BY tb_cuti_sakit.npp
            
            UNION

            SELECT tb_cuti_sakit.npp, tb_cuti_sakit.jns_cuti, tb_cuti_sakit.valid, sdm01.nama, 30 AS sisa_tb_cuti_sakit
                    FROM tb_cuti_sakit
                    JOIN sdm01 ON tb_cuti_sakit.npp = sdm01.npp
                    GROUP BY tb_cuti_sakit.npp
            ) AS semua
                
            GROUP BY semua.npp")->result_array();
    }

    function cuti_pjg()
    {
        return $this->db->query("SELECT * FROM cuti_pjg")->result_array();
    }

    function cuti_thn()
    {
        return $this->db->query("SELECT * FROM cuti_thn")->result_array();
    }

    function cuti_sakit()
    {
        return $this->db->query("SELECT * FROM cuti_sakit")->result_array();
    }

    function jmlh_c_sakit()
    {
        $query = $this->db->get('cuti_sakit');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function jmlh_c_thn()
    {
        $query = $this->db->get('cuti_thn');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function jmlh_c_pjg()
    {
        $query = $this->db->get('cuti_pjg');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function jmlh_hsl_p_lmbr()
    {
        $query = $this->db->get('hsl_p_lmbr');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function get_lembur($kasubdiv)
    {
        return $this->db->query(
            "SELECT * FROM hsl_p_lmbr
            LEFT JOIN jab ON hsl_p_lmbr.kd_menu = jab.kd_menu
            WHERE jab.kd_menu LIKE '$kasubdiv%' 
            AND jab.kd_menu NOT LIKE '8342'
            AND jab.kd_menu NOT LIKE '8311'
            GROUP BY hsl_p_lmbr.tgl_p DESC
            "
        )->result_array();
    }

    function tb_lembur()
    {
        return $this->db->query("SELECT * FROM jab WHERE kd_menu GROUP BY kd_menu")->result_array();
    }

    function kd_menu($kd_menu)
    {
        return $this->db->get_where('jab', array('kd_menu' => $kd_menu))->result_array();
    }

    function get_absen($kasubdiv)
    {
        return $this->db->query(
            "SELECT absensi.tgl, absensi.npp, (absensi.nama) AS nm_kar, absensi.masuk, absensi.keluar FROM absensi
            LEFT JOIN jab ON absensi.kd_menu = jab.kd_menu
            WHERE jab.kd_menu LIKE '$kasubdiv%' 
            AND jab.kd_menu NOT LIKE '8342'
            AND jab.kd_menu NOT LIKE '8311'
            GROUP BY absensi.tgl DESC
            "
        )->result_array();
    }

    function get_nilai()
    {
        return $this->db->query("SELECT * FROM hsl_nilai")->result_array();
    }

    function data_jam_kerja()
    {
        return $this->db->query("SELECT * FROM jam_kerja")->result_array();
    }

    function upah()
    {
        return $this->db->query(
            "SELECT jam_kerja.jam_masuk, jam_kerja.jam_pulang, absensi.masuk, absensi.keluar, absensi.npp
            FROM absensi 
            LEFT JOIN jam_kerja ON absensi.tgl = jam_kerja.tgl
            WHERE absensi.npp"
        );
    }

    function p_upah($kasubdiv)
    {
        return $this->db->query(
            "SELECT jam_kerja.jam_masuk, jam_kerja.jam_pulang, absensi.masuk, absensi.keluar, absensi.npp, sdm01.nama, absensi.tgl, MAX(sdm08.jabatan) AS jabatan, MAX(sdm16.golongan) AS golongan, MAX(sdm16.mk) AS mk
            FROM absensi 
            LEFT JOIN jam_kerja ON absensi.tgl = jam_kerja.tgl
            LEFT JOIN sdm01 ON absensi.npp = sdm01.npp
            LEFT JOIN sdm08 ON absensi.npp = sdm08.npp
            LEFT JOIN sdm16 ON absensi.npp = sdm16.npp
            LEFT JOIN jab ON absensi.kd_menu = jab.kd_menu
            WHERE jab.kd_menu LIKE '$kasubdiv%' 
            AND jab.kd_menu NOT LIKE '8342'
            AND jab.kd_menu NOT LIKE '8311'
            AND absensi.npp
            AND absensi.tgl
            GROUP BY absensi.tgl DESC"
        )->result_array();
    }

    function upah_bln($tanggal)
    {   
        $bulan = date("m",strtotime($tanggal)); 
        return $this->db->query(
            "SELECT jam_kerja.jam_masuk, jam_kerja.jam_pulang, absensi.masuk, absensi.keluar, absensi.npp, sdm01.nama, absensi.tgl, MAX(sdm08.jabatan) AS jabatan, MAX(sdm16.golongan) AS golongan, MAX(sdm16.mk) AS mk
            FROM absensi 
            LEFT JOIN jam_kerja ON absensi.tgl = jam_kerja.tgl
            LEFT JOIN sdm01 ON absensi.npp = sdm01.npp
            LEFT JOIN sdm08 ON absensi.npp = sdm08.npp
            LEFT JOIN sdm16 ON absensi.npp = sdm16.npp
            LEFT JOIN jab ON absensi.kd_menu = jab.kd_menu
            WHERE MONTH(absensi.tgl) = '$bulan'
            AND YEAR(absensi.tgl) = '$tanggal'
            AND absensi.npp
            AND absensi.tgl
            GROUP BY absensi.tgl"
        )->result_array();
    }

    function get_bln($bulan)
    {
        return $this->db->get_where('absensi', array('tgl' => $bulan))->result_array();
    }

    function get_hari($npp)
    {
        return $this->db->query("SELECT * FROM absensi WHERE npp = '$npp' AND tgl")->num_rows();
    }

    function jam_kerja()
    {
        $this->db->order_by('id_jk', 'DESC');
        $query = $this->db->get('jam_kerja');
        return $query;
    }

    function absensi()
    {
        $this->db->order_by('id_absen', 'DESC');
        $query = $this->db->get('absensi');
        return $query;
    }

    function insert_jam_kerja($data)
    {
        $this->db->insert_batch('jam_kerja', $data);
    }

    function insert_absensi($data)
    {
        $this->db->insert_batch('absensi', $data);
    }

    function delet_hsl_p_lmbr($id_p_lmbr)
    {
        $hasil = $this->db->query("DELETE FROM hsl_p_lmbr WHERE id_p_lmbr='$id_p_lmbr'");
        return $hasil;
    }

    function edit_hsl_p_lmbr($id_p_lmbr, $tgl, $awal, $akhir)
    {
        $data = array(
            'tgl'   => $tgl,
            'awal'  => $awal,
            'akhir' => $akhir
        );
        $berhasil = $this->db->update('hsl_p_lmbr', $data, array('id_p_lmbr' => $id_p_lmbr));
        if ($berhasil) {
            return 1;
        } else {
            return 0;
        }
    }
}
