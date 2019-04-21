<?php

    class model_admin extends CI_Model
    {   
        function entry_sdm01($npp, $nama, $nm_pgl, $glr_dpn, $glr_blk, $kota_lhr,
                                $prov_lhr, $ngr_lhr, $tgl_lhr, $j_kelamin,
                                $gol_darah, $agama, $tgl_masuk, $st_sipil,
                                $jmlh_ank, $no_astek, $no_pens, $npwp, $alamat_tgl,
                                $kd_lokasi, $kode_pos, $no_telp, $no_nik, $no_kk,
                                $no_bpjs, $user_id, $bln_proses, $tinggal, $ket,
                                $tglpen, $noskpen, $tglskpen, $jns_pen, $stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date("Y/m/d H:i:s");
            $data   =   array('npp'          =>  $npp,
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

            $insert =   $this->db->insert('sdm01',$data);
            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }

        }

        function edit_sdm01($id_sdm01, $npp, $nama, $nm_pgl, $glr_dpn, $glr_blk, $kota_lhr,
                                $prov_lhr, $ngr_lhr, $tgl_lhr, $j_kelamin,
                                $gol_darah, $agama, $tgl_masuk, $st_sipil,
                                $jmlh_ank, $no_astek, $no_pens, $npwp, $alamat_tgl,
                                $kd_lokasi, $kode_pos, $no_telp, $no_nik, $no_kk,
                                $no_bpjs, $user_id, $bln_proses, $tinggal, $ket,
                                $tglpen, $noskpen, $tglskpen, $jns_pen, $stat_rec)
        {
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
            
            $this->db->where('id_sdm01',$id_sdm01);
            $this->db->update('sdm01',$data);

            return 1;

        }

        function delet_sdm01($id_sdm01){
        $hasil = $this->db->query("DELETE FROM sdm01 WHERE id_sdm01='$id_sdm01'");
        return $hasil;
        }

        function tampil_sdm01()
        {
            $hasil  =   $this->db->query("SELECT * FROM sdm01" );

            return $hasil;
        }

        function cari_sdm02($npp)
        {
            return $this->db->query("SELECT * FROM sdm02 where npp = $npp")->result_array();
        }

        function get_data_bynpp($npp) // pencarian menggunakan NPP
        {
            $hsl = $this->db->query("SELECT * FROM sdm01 WHERE npp='$npp'");
            if($hsl->num_rows()>0){
                foreach ($hsl->result_array() as $data) 
                {
                    $hasil = array(
                        'id_sdm01'   =>  $data ['id_sdm01'],
                        'npp'        =>  $data ['npp'],
                        'nama'       =>  $data ['nama'],
                        'nm_pgl'	 =>  $data ['nm_pgl'],
                        'glr_dpn'	 =>  $data ['glr_dpn'],
                        'glr_blk'	 =>  $data ['glr_blk'],
                        'kota_lhr'	 =>  $data ['kota_lhr'],
                        'prov_lhr'	 =>  $data ['prov_lhr'],
                        'ngr_lhr'	 =>  $data ['ngr_lhr'],
                        'tgl_lhr'	 =>  $data ['tgl_lhr'],
                        'j_kelamin'	 =>  $data ['j_kelamin'],
                        'gol_darah'	 =>  $data ['gol_darah'],
                        'agama'		 =>  $data ['agama'],
                        'tgl_masuk'	 =>  $data ['tgl_masuk'],
                        'st_sipil'	 =>  $data ['st_sipil'],
                        'jmlh_ank'	 =>  $data ['jmlh_ank'],
                        'no_astek'	 =>  $data ['no_astek'],
                        'no_pens'	 =>  $data ['no_pens'],
                        'npwp'		 =>  $data ['npwp'],
                        'alamat_tgl' =>  $data ['alamat_tgl'],
                        'kd_lokasi'	 =>  $data ['kd_lokasi'],
                        'kode_pos'	 =>  $data ['kode_pos'],
                        'no_telp'	 =>  $data ['no_telp'],
                        'no_nik'	 =>  $data ['no_nik'],
                        'no_kk'		 =>  $data ['no_kk'],
                        'no_bpjs'	 =>  $data ['no_bpjs'],
                        'user_id'	 =>  $data ['user_id'],
                        'bln_proses' =>  $data ['bln_proses'],
                        'tinggal'	 =>  $data ['tinggal'],
                        'ket'		 =>  $data ['ket'],
                        'tglpen'	 =>  $data ['tglpen'],
                        'noskpen'	 =>  $data ['noskpen'],
                        'tglskpen'	 =>  $data ['tglskpen'],
                        'jns_pen'	 =>  $data ['jns_pen'],
                        'stat_rec'	 =>  $data ['stat_rec'],
                        'tgl'		 =>  $data ['tgl'],
                        
                        );
                }
            }
            return $hasil;
        }

        function entry_sdm02($npp,$no_urut,$nama,$hbg_klg,$tgl_lhr,
                                $kota_lhr,$ngr_lhr,$kelamin,$gol_darah,
                                $agama,$tk_ped,$st_sipil,$st_kerja,$tgl_nkh,
                                $tgl_cerai,$tgl_mgl,$alamat,$no_kk,$nik,$no_bpjs,$bln_proses,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date("Y/m/d H:i:s");
                        $this->db->select_max('no_urut');
                        $this->db->from('sdm02');
                        $this->db->where('npp',$npp);
            $query  =   $this->db->get()->result_array();
            $urut   =   $query[0]['no_urut']+1;
            $data   =   array('npp'          =>  $npp,
                                'no_urut'    =>  $urut,
                                'nama'       =>  $nama,
                                'hbg_klg'    =>  $hbg_klg,
                                'tgl_lhr'    =>  $tgl_lhr,
                                'kota_lhr'   =>  $kota_lhr,
                                'ngr_lhr'    =>  $ngr_lhr,
                                'kelamin'    =>  $kelamin,
                                'gol_darah'  =>  $gol_darah,
                                'agama'      =>  $agama,
                                'tk_ped'     =>  $tk_ped,
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


            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_sdm02($id_sdm02,$npp,$no_urut,$nama,$hbg_klg,$tgl_lhr,
                            $kota_lhr,$ngr_lhr,$kelamin,$gol_darah,
                            $agama,$tk_ped,$st_sipil,$st_kerja,$tgl_nkh,
                            $tgl_cerai,$tgl_mgl,$alamat,$no_kk,$nik,$no_bpjs,$bln_proses,$stat_rec)
        {
            $data   =   array('npp'          =>  $npp,
                                'no_urut'    =>  $no_urut,
                                'nama'       =>  $nama,
                                'hbg_klg'    =>  $hbg_klg,
                                'tgl_lhr'    =>  $tgl_lhr,
                                'kota_lhr'   =>  $kota_lhr,
                                'ngr_lhr'    =>  $ngr_lhr,
                                'kelamin'    =>  $kelamin,
                                'gol_darah'  =>  $gol_darah,
                                'agama'      =>  $agama,
                                'tk_ped'     =>  $tk_ped,
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
            
            $this->db->where('id_sdm02',$id_sdm02);
            $this->db->update('sdm02',$data);

            return 1;

        }

        function delet_sdm02($id_sdm02){
        $hasil = $this->db->query("DELETE FROM sdm02 WHERE id_sdm02='$id_sdm02'");
        return $hasil;
        }

        function tampil_sdm02()
        {
            $hasil =    $this->db->query( "SELECT * FROM sdm02 LIMIT 100");
            
            return $hasil;
        }

        function entry_sdm03($npp,$no_urut,$tk_pend,$kd_pend,$nama,$kota,
                            $st_akred,$dnln,$thn_awal,$thn_akhir,$st_lulus,
                            $no_ijasah,$tgl_ijasah,$nilai,$grade,$ket,$bln_proses,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date("Y/m/d H:i:s");
            $data   =   array('npp'          =>  $npp,
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
                                'stat_rec'   =>  $stat_rec,
                                'tgl'        =>  $date
                            );
            
            $insert     =   $this->db->insert('sdm03',$data); 

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_sdm03($id_sdm03,$npp,$no_urut,$tk_pend,$kd_pend,$nama,$kota,
                            $st_akred,$dnln,$thn_awal,$thn_akhir,$st_lulus,
                            $no_ijasah,$tgl_ijasah,$nilai,$grade,$ket,$bln_proses,$stat_rec)
        {
            $data   =   array('npp'          =>  $npp,
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

            $this->db->where('id_sdm03',$id_sdm03);
            $this->db->update('sdm03',$data);

            return 1;

        }

        function delet_sdm03($id_sdm03){
        $hasil = $this->db->query("DELETE FROM sdm03 WHERE id_sdm03='$id_sdm03'");
        return $hasil;
        }

        function tampil_sdm03()
        {
            $hasil =    $this->db->query( "SELECT * FROM sdm03 LIMIT 1000");

            return $hasil;
        }

        function entry_sdm04($npp,$no_urut,$kd_pend,$nama,$ket,$dnln,$tgl_awal,$tgl_akhir,
                            $no_sert,$tgl_sert,$nilai,$grade,$bln_proses,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date("Y/m/d H:i:s");
            $data   =   array('npp'          =>  $npp,
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
                                'tgl'        =>  $date
                            );
            
            $insert     =   $this->db->insert('sdm04',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_sdm04($id_sdm04,$npp,$no_urut,$kd_pend,$nama,$ket,$dnln,$tgl_awal,$tgl_akhir,
                            $no_sert,$tgl_sert,$nilai,$grade,$bln_proses,$stat_rec)
        {
            $data   =   array('npp'          =>  $npp,
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
            
            $this->db->where('id_sdm04',$id_sdm04);
            $this->db->update('sdm04',$data);

            return 1;
        }

        function delet_sdm04($id_sdm04){
        $hasil = $this->db->query("DELETE FROM sdm04 WHERE id_sdm04='$id_sdm04'");
        return $hasil;
        }

        function tampil_sdm04()
        {
            $hasil =    $this->db->query( "SELECT * FROM sdm04 LIMIT 1000");

            return $hasil;
        }

        function entry_sdm05($npp,$no_urut,$thn_awal,$thn_akhir,$nama,
                            $jabatan,$nm_jbt,$no_sk,$tgl_sk,$bln_proses,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date("Y/m/d H:i:s");
            $data   =   array('npp'          =>  $npp,
                                'no_urut'    =>  $no_urut,
                                'thn_awal'   =>  $thn_awal,
                                'thn_akhir'  =>  $thn_akhir,
                                'nama'       =>  $nama,
                                'jabatan'    =>  $jabatan,
                                'nm_jbt'     =>  $nm_jbt,
                                'no_sk'      =>  $no_sk,
                                'tgl_sk'     =>  $bln_proses,
                                'stat_rec'   =>  $stat_rec,
                                'tgl'        =>  $date
                            );
            
            $insert     =   $this->db->insert('sdm05',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }


        function edit_sdm05( $id_sdm05,$npp,$no_urut,$thn_awal,$thn_akhir,$nama,
                            $jabatan,$nm_jbt,$no_sk,$tgl_sk,$bln_proses,$stat_rec)
        {
            $data   =   array('npp'          =>  $npp,
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
            $this->db->update('sdm05',$data);

            return 1;
        }

        function delet_sdm05($id_sdm05){
        $hasil = $this->db->query("DELETE FROM sdm05 WHERE id_sdm05='$id_sdm05'");
        return $hasil;
        }
        
        function tampil_sdm05()
        {
            $hasil =    $this->db->query( "SELECT * FROM sdm05 LIMIT 1000");

            return $hasil;
        }

        function entry_sdm06($npp,$no_urut,$st_peg,$tmt,$no_sk,$tgl_sk,$npp_jbt,$bln_proses,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date("Y/m/d H:i:s");
            $data   =   array('npp'          =>  $npp,
                                'no_urut'    =>  $no_urut,
                                'st_peg'     =>  $st_peg,
                                'tmt'        =>  $tmt,
                                'no_sk'      =>  $no_sk,
                                'tgl_sk'     =>  $tgl_sk,
                                'npp_jbt'    =>  $npp_jbt,
                                'bln_proses' =>  $bln_proses,
                                'stat_rec'   =>  $stat_rec,
                                'tgl'        =>  $date
                            );

            $insert     =   $this->db->insert('sdm06',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_sdm06( $id_sdm06,$npp,$no_urut,$st_peg,$tmt,$no_sk,$tgl_sk,$npp_jbt,$bln_proses,$stat_rec)
        {
            $data   =   array('npp'          =>  $npp,
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
            $this->db->update('sdm06',$data);

            return 1;
        }

        function delet_sdm06($id_sdm06){
        $hasil = $this->db->query("DELETE FROM sdm06 WHERE id_sdm06='$id_sdm06'");
        return $hasil;
        }

        function tampil_sdm06()
        {
            $hasil =    $this->db->query( "SELECT * FROM sdm06 LIMIT 1000");

            return $hasil;
        }

        function entry_sdm07($npp,$no_urut,$st_peg,$tmt,$no_sk,$tgl_sk,$tgl_akhir,$npp_jbt,$bln_proses,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date("Y/m/d H:i:s");
            $data   =   array('npp'          =>  $npp,
                                'no_urut'    =>  $no_urut,
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

            $insert     =   $this->db->insert('sdm07',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_sdm07($id_sdm07,$npp,$no_urut,$st_peg,$tmt,$no_sk,$tgl_sk,$tgl_akhir,$npp_jbt,$bln_proses,$stat_rec)
        {
            $data   =   array('npp'          =>  $npp,
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
            $this->db->update('sdm07',$data);

            return 1;
        }

        function delet_sdm07($id_sdm07){
        $hasil = $this->db->query("DELETE FROM sdm07 WHERE id_sdm07='$id_sdm07'");
        return $hasil;
        }

        function tampil_sdm07()
        {
            $hasil =    $this->db->query( "SELECT * FROM sdm07 LIMIT 1000");

            return $hasil;
        }

        function entry_sdm08($npp,$no_urut,$kd_mutasi,$kd_unit,$kd_adf,
                            $kd_bud,$jabatan,$tmt,$no_sk,$tgl_sk,$npp_jbt,
                            $tinggal,$bln_proses,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('npp'          =>  $npp,
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
                                'stat_rec'   =>  $stat_rec,
                                'tgl'        =>  $date
                            );
            
            $insert     =   $this->db->insert('sdm08', $data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_sdm08($id_sdm08,$npp,$no_urut,$kd_mutasi,$kd_unit,$kd_adf,
                            $kd_bud,$jabatan,$tmt,$no_sk,$tgl_sk,$npp_jbt,
                            $tinggal,$bln_proses,$stat_rec)
        {
            $data   =   array('npp'          =>  $npp,
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
            $this->db->update('sdm08',$data);

            return 1;
        }

        function delet_sdm08($id_sdm08){
            $hasil = $this->db->query("DELETE FROM sdm08 WHERE id_sdm08='$id_sdm08'");
            return $hasil;
        }

        function tampil_sdm08()
        {
            $hasil =    $this->db->query( "SELECT * FROM sdm08 LIMIT 1000");

            return $hasil;
        }

        function entry_sdm09($npp,$no_urut,$kd_unit,$jabatan,$tmt,$no_sk,$tgl_sk,
                            $lama_jab,$tgl_akhir,$npp_jbt,$bln_proses,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('npp'          =>  $npp,
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
                                'stat_rec'   =>  $stat_rec,
                                'tgl'        =>  $date
                            );

            $insert     =   $this->db->insert('sdm09', $data);

            if($insert)
            {
                return 1;
            }
            else{
                return 0;
            }
        }

        function edit_sdm09( $id_sdm09,$npp,$no_urut,$kd_unit,$jabatan,$tmt,$no_sk,$tgl_sk,
                            $lama_jab,$tgl_akhir,$npp_jbt,$bln_proses,$stat_rec)
        {
            $data   =   array('npp'          =>  $npp,
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

            $this->db->where('id_sdm09',$id_sdm09);
            $this->db->update('sdm09', $data);

            return 1;
        }

        function delet_sdm09($id_sdm09){
            $hasil = $this->db->query("DELETE FROM sdm09 WHERE id_sdm09='$id_sdm09'");
            return $hasil;
        }
        
        function tampil_sdm09()
        {
            $hasil =    $this->db->query( "SELECT * FROM sdm09 LIMIT 1000");

            return $hasil;
        }

        function entry_sdm10($npp,$no_urut,$kd_inst,$jabatan,$tmt,
                            $lama_jab,$no_sk,$tgl_sk,$tgl_akhir,$npp_jbt,
                            $bln_proses,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('npp'          =>  $npp,
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
                                'stat_rec'    =>  $stat_rec,
                                'tgl'         =>  $date
                            );
            
            $insert =   $this->db->insert('sdm10', $data);

            if($insert)
            {
                return 1;
            }
            else{
                return 0;
            }
        }

        function edit_sdm10($id_sdm10,$npp,$no_urut,$kd_inst,$jabatan,$tmt,
                            $lama_jab,$no_sk,$tgl_sk,$tgl_akhir,$npp_jbt,
                            $bln_proses,$stat_rec)
        {
            $data   =   array('npp'          =>  $npp,
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
            $this->db->update('sdm10',$data);

            return 1;
        }

        function delet_sdm10($id_sdm10){
            $hasil = $this->db->query("DELETE FROM sdm10 WHERE id_sdm10='$id_sdm10'");
            return $hasil;
        }

        function tampil_sdm10()
        {
            $hasil =    $this->db->query( "SELECT * FROM sdm10 LIMIT 1000");

            return $hasil;
        }

        function entry_sdm11($npp,$no_urut,$nm_satgas,$jabatan,$tmt,
                            $no_sk,$tgl_sk,$tgl_akhir,$npp_jbt,$bln_proses,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('npp'           =>  $npp,
                                'no_urut'     =>  $no_urut,
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
            
            $insert     =   $this->db->insert('sdm11',$data);

            if($insert)
            {
                return 1;
            }
            else{
                return 0;
            }
        }

        function edit_sdm11( $id_sdm11,$npp,$no_urut,$nm_satgas,$jabatan,$tmt,
                            $no_sk,$tgl_sk,$tgl_akhir,$npp_jbt,$bln_proses,$stat_rec )
        {
            $data   =   array('npp'           =>  $npp,
                                'no_urut'     =>  $no_urut,
                                'nm_satgas'   =>  $nm_satgas,
                                'jabatan'     =>  $jabatan,
                                'tmt'         =>  $tmt,
                                'no_sk'       =>  $no_sk,
                                'tgl_sk'      =>  $tgl_sk,
                                'tgl_akhir'   =>  $tgl_akhir,
                                'npp_jbt'     =>  $npp_jbt,
                                'bln_proses'  =>  $bln_proses,
                                'stat_rec'    =>  $stat_rec
                            );

            $this->db->where('id_sdm11', $id_sdm11);
            $this->db->update('sdm11',$data);

            return 1;
        }

        function delet_sdm11($id_sdm11){
            $hasil = $this->db->query("DELETE FROM sdm11 WHERE id_sdm11='$id_sdm11'");
            return $hasil;
        }

        function tampil_sdm11()
        {
            $hasil =    $this->db->query( "SELECT * FROM sdm11 LIMIT 1000");

            return $hasil;
        }

        function entry_sdm12($npp,$no_urut,$tmt,$nilai_krd,$no_sk,$tgl_sk,$npp_jbt,$bln_proses,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('npp'           =>  $npp,
                                'no_urut'     =>  $no_urut,
                                'tmt'         =>  $tmt,
                                'nilai_krd'   =>  $nilai_krd,
                                'no_sk'       =>  $no_sk,
                                'tgl_sk'      =>  $tgl_sk,
                                'npp_jbt'     =>  $npp_jbt,
                                'bln_proses'  =>  $bln_proses,
                                'stat_rec'    =>  $stat_rec,
                                'tgl'         =>  $date
                            );
            
            $insert     =   $this->db->insert('sdm12',$data);

            if($insert)
            {
                return 1;
            }else{
                return 0;
            }
        }

        function edit_sdm12($id_sdm12,$npp,$no_urut,$tmt,$nilai_krd,$no_sk,$tgl_sk,$npp_jbt,$bln_proses,$stat_rec)
        {
            $data   =   array('npp'           =>  $npp,
                                'no_urut'     =>  $no_urut,
                                'tmt'         =>  $tmt,
                                'nilai_krd'   =>  $nilai_krd,
                                'no_sk'       =>  $no_sk,
                                'tgl_sk'      =>  $tgl_sk,
                                'npp_jbt'     =>  $npp_jbt,
                                'bln_proses'  =>  $bln_proses,
                                'stat_rec'    =>  $stat_rec
                            );

            $this->db->where('id_sdm12', $id_sdm12);
            $this->db->update('sdm12',$data);

            return 1;
        }

        function delet_sdm12($id_sdm12){
            $hasil = $this->db->query("DELETE FROM sdm12 WHERE id_sdm12='$id_sdm12'");
            return $hasil;
        }

        function tampil_sdm12()
        {
            $hasil =    $this->db->query( "SELECT * FROM sdm12 LIMIT 1000");

            return $hasil;
        }

        function entry_sdm13($npp,$no_urut,$jns_harga,$uraian,$tgl_harga,$no_sk,$tgl_sk,$npp_jbt,$bln_proses,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('npp'           =>  $npp,
                                'no_urut'     =>  $no_urut,
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
            
            $insert     =   $this->db->insert('sdm13',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_sdm13( $id_sdm13,$npp,$no_urut,$jns_harga,$uraian,$tgl_harga,$no_sk,$tgl_sk,$npp_jbt,$bln_proses,$stat_rec)
        {
            $data   =   array('npp'           =>  $npp,
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
            $this->db->update('sdm13',$data);

            return 1;
        }

        function delet_sdm13($id_sdm13){
            $hasil = $this->db->query("DELETE FROM sdm13 WHERE id_sdm13='$id_sdm13'");
            return $hasil;
        }

        function tampil_sdm13()
        {
            $hasil =    $this->db->query( "SELECT * FROM sdm13 LIMIT 1000");

            return $hasil;
        }

        function entry_sdm14($npp,$no_urut,$tgl_lgr,$jns_lgr,$uraian,
                            $jns_hukum,$tmt,$no_sk,$tgl_sk,$npp_jbt,$bln_proses,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('npp'           =>  $npp,
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
                                'tgl'         =>  $date
                            );
            
            $insert     =   $this->db->insert('sdm14',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_sdm14( $id_sdm14,$npp,$no_urut,$tgl_lgr,$jns_lgr,$uraian,
                            $jns_hukum,$tmt,$no_sk,$tgl_sk,$npp_jbt,$bln_proses,$stat_rec)
        {   
            $data   =   array('npp'           =>  $npp,
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
                                'stat_rec'    =>  $stat_rec
                            );

            $this->db->where('id_sdm14', $id_sdm14);
            $this->db->update('sdm14',$data);

            return 1;
        }

        function delet_sdm14($id_sdm14){
            $hasil = $this->db->query("DELETE FROM sdm14 WHERE id_sdm14='$id_sdm14'");
            return $hasil;
        }

        function tampil_sdm14()
        {
            $hasil =    $this->db->query( "SELECT * FROM sdm14 LIMIT 1000");

            return $hasil;
        }

        function entry_sdm15($npp,$no_urut,$jns_cuti,$tmt,$lama_cuti,
                            $thn_angg,$no_sk,$tgl_sk,$npp_jbt,$bln_proses,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('npp'           =>  $npp,
                                'no_urut'     =>  $no_urut,
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
            
            $insert     =   $this->db->insert('sdm15',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_sdm15( $id_sdm15,$npp,$no_urut,$jns_cuti,$tmt,$lama_cuti,
                            $thn_angg,$no_sk,$tgl_sk,$npp_jbt,$bln_proses,$stat_rec)
        {
            $data   =   array('npp'           =>  $npp,
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
            $this->db->update('sdm15',$data);

            return 1;
        }

        function delet_sdm15($id_sdm15){
            $hasil = $this->db->query("DELETE FROM sdm15 WHERE id_sdm15='$id_sdm15'");
            return $hasil;
        }

        function tampil_sdm15()
        {
            $hasil =    $this->db->query( "SELECT * FROM sdm15 LIMIT 1000");

            return $hasil;
        }

        function entry_sdm16($npp,$no_urut,$st_peg,$golongan,$mk,
                            $tmt,$jns_naik,$no_sk,$tgl_sk,$npp_jbt,$bln_proses,$kd_kelas,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('npp'          =>  $npp,
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
                                'stat_rec'   =>  $stat_rec,
                                'tgl'        =>  $date
                            );
            
            $insert     =   $this->db->insert('sdm16',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_sdm16( $id_sdm16,$npp,$no_urut,$st_peg,$golongan,$mk,
                            $tmt,$jns_naik,$no_sk,$tgl_sk,$npp_jbt,$bln_proses,$kd_kelas,$stat_rec)
        {
            $data   =   array('npp'          =>  $npp,
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
            $this->db->update('sdm16',$data);

            return 1;
        }

        function delet_sdm16($id_sdm16){
            $hasil = $this->db->query("DELETE FROM sdm16 WHERE id_sdm16='$id_sdm16'");
            return $hasil;
        }

        function tampil_sdm16()
        {
            $hasil =    $this->db->query( "SELECT * FROM sdm16 LIMIT 1000");
            return $hasil;
        }

        function show_pend()
        {
            $hasil =    $this->db->query( "SELECT * FROM pend");
            return $hasil;
        }

        function entry_agama($kd_agama,$nm_agama,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('kd_agama'   => $kd_agama,
                                'nm_agama' => $nm_agama,
                                'stat_rec' => $stat_rec,
                                'tgl'      => $date
                            );
            
            $insert     =   $this->db->insert('agama',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_agama( $id_agama,$kd_agama,$nm_agama,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('kd_agama'   => $kd_agama,
                                'nm_agama' => $nm_agama,
                                'stat_rec' => $stat_rec
                            );
            
            $this->db->where('id_agama', $id_agama);
            $this->db->update('agama',$data);

            return 1;
        }

        function tampil_agama()
        {
            $hasil = $this->db->query("SELECT * FROM agama");
            
            return $hasil;
        }

        function entry_akred($kd_akred,$nm_akred,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('kd_akred'   => $kd_akred,
                                'nm_akred' => $nm_akred,
                                'stat_rec' => $stat_rec,
                                'tgl'      => $date
                            );
            
            $insert     =   $this->db->insert('akred',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_akred( $id_akred,$kd_akred,$nm_akred,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('kd_akred'   => $kd_akred,
                                'nm_akred' => $nm_akred,
                                'stat_rec' => $stat_rec
                            );
            
            $this->db->where('id_akred', $id_akred);
            $this->db->update('akred',$data);

            return 1;
        }

        function tampil_akred()
        {
            $hasil = $this->db->query("SELECT * FROM akred");
            
            return $hasil;
        }

        function entry_budidaya($kd_bud,$kd_jnsprod,$nm_bud,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('kd_bud'       => $kd_bud,
                                'kd_jnsprod' => $kd_jnsprod,
                                'nm_bud'     => $nm_bud,
                                'stat_rec'   => $stat_rec,
                                'tgl'        => $date
                            );
            
            $insert     =   $this->db->insert('budidaya',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_budidaya( $id_bud,$kd_bud,$kd_jnsprod,$nm_bud,$stat_rec)
        {

            $data   =   array('kd_bud'       => $kd_bud,
                                'kd_jnsprod' => $kd_jnsprod,
                                'nm_bud'     => $nm_bud,
                                'stat_rec'   => $stat_rec
                            );
            
            $this->db->where('id_bud', $id_bud);
            $this->db->update('budidaya',$data);

            return 1;
        }

        function tampil_budidaya()
        {
            $hasil = $this->db->query("SELECT * FROM budidaya");
            
            return $hasil;
        }

        function entry_golongan($kd_gol,$gol)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('kd_gol'  =>  $kd_gol,
                                'gol'   =>  $gol,
                                'tgl'   =>  $date
                            );
            
            $insert     =   $this->db->insert('gol',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_golongan( $id_gol,$kd_gol,$gol)
        {
            $data   =   array('kd_gol'  =>  $kd_gol,
                                'gol'   =>  $gol
                            );
            
            $this->db->where('id_gol', $id_gol);
            $this->db->update('gol',$data);

            return 1;
        }

        function tampil_golongan()
        {
            $hasil = $this->db->query("SELECT * FROM gol");
            
            return $hasil;
        }

        function entry_jabatan($jabatan,$nama,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('jabatan'     =>  $jabatan,
                                'nama'      =>  $nama,
                                'stat_rec'  =>  $stat_rec,
                                'tgl'       =>  $date
                            );
            
            $insert     =   $this->db->insert('jab',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_jabatan( $id_jab,$jabatan,$nama,$stat_rec)
        {
            $data   =   array('jabatan'     =>  $jabatan,
                                'nama'      =>  $nama,
                                'stat_rec'  =>  $stat_rec
                            );

            $this->db->where('id_jab', $id_jab);
            $this->db->update('jab',$data);

            return 1;
        }

        function tampil_jabatan()
        {
            $hasil = $this->db->query("SELECT * FROM jab");
            
            return $hasil;
        }

        function entry_komoditi($kd_bud,$kd_jnsprod,$nm_bud)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('kd_bud'       =>  $kd_bud,
                                'kd_jnsprod' =>  $kd_jnsprod,
                                'nm_bud'     =>  $nm_bud,
                                'tgl'        =>  $date
                            );

            $insert     =   $this->db->insert('komoditi',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_komoditi( $id_komoditi,$kd_bud,$kd_jnsprod,$nm_bud)
        {
            $data   =   array('kd_bud'       =>  $kd_bud,
                                'kd_jnsprod' =>  $kd_jnsprod,
                                'nm_bud'     =>  $nm_bud
                            );
            
            $this->db->where('id_komoditi', $id_komoditi);
            $this->db->update('komoditi',$data);

            return 1;
        }
        
        function tampil_komoditi()
        {
            $hasil = $this->db->query("SELECT * FROM komoditi");
            
            return $hasil;
        }

        function entry_pendidikan($kd_pend,$nm_pend,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('kd_pend'      =>  $kd_pend,
                                'nm_pend'    =>  $nm_pend,
                                'stat_rec'   =>  $stat_rec,
                                'tgl'        =>  $date
                            );

            $insert     =   $this->db->insert('pend',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_pendidikan( $id_pend,$kd_pend,$nm_pend,$stat_rec)
        {
            $data   =   array('kd_pend'      =>  $kd_pend,
                                'nm_pend'    =>  $nm_pend,
                                'stat_rec'   =>  $stat_rec
                            );
            
            $this->db->where('id_pend', $id_pend);
            $this->db->update('pend',$data);

            return 1;
        }

        function tampil_pendidikan()
        {
            $hasil = $this->db->query("SELECT * FROM pend");
            
            return $hasil;
        }

        function entry_sipil($kd_sipil,$nm_sipil,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('kd_sipil'      =>  $kd_sipil,
                                'nm_sipil'    =>  $nm_sipil,
                                'stat_rec'    =>  $stat_rec,
                                'tgl'         =>  $date
                            );

            $insert     =   $this->db->insert('sipil',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_sipil( $id_sipil,$kd_sipil,$nm_sipil,$stat_rec)
        {
            $data   =   array('kd_sipil'      =>  $kd_sipil,
                                'nm_sipil'    =>  $nm_sipil,
                                'stat_rec'    =>  $stat_rec
                            );
                
            $this->db->where('id_sipil', $id_sipil);
            $this->db->update('sipil',$data);

            return 1;
        }

        function tampil_sipil()
        {
            $hasil = $this->db->query("SELECT * FROM sipil");
            
            return $hasil;
        }

        function entry_tkpend($kd_tkpend,$nm_tkpend,$stat_rec)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('kd_tkpend'      =>  $kd_tkpend,
                                'nm_tkpend'    =>  $nm_tkpend,
                                'stat_rec'     =>  $stat_rec,
                                'tgl'          =>  $date
                            );

            $insert     =   $this->db->insert('kt_pend',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_tkpend($id_tkpend,$kd_tkpend,$nm_tkpend,$stat_rec)
        {
            $data   =   array('kd_tkpend'      =>  $kd_tkpend,
                                'nm_tkpend'    =>  $nm_tkpend,
                                'stat_rec'     =>  $stat_rec
                            );
            
            $this->db->where('id_tkpend', $id_tkpend);
            $this->db->update('kt_pend',$data);

            return 1;
        }

        function tampil_tkpend()
        {
            $hasil = $this->db->query("SELECT * FROM kt_pend");
            
            return $hasil;
        }

        function entry_unit($kd_kebun,$nm_unit)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('kd_kebun'     =>  $kd_kebun,
                                'nm_unit'    =>  $nm_unit,
                                'tgl'        =>  $date
                            );

            $insert     =   $this->db->insert('unit',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_unit($id_unit,$kd_kebun,$nm_unit)
        {
            $data   =   array('kd_kebun'     =>  $kd_kebun,
                                'nm_unit'    =>  $nm_unit
                            );

            $this->db->where('id_unit', $id_unit);
            $this->db->update('unit',$data);

            return 1;
        }
        
        function tampil_unit()
        {
            $hasil = $this->db->query("SELECT * FROM unit");
            
            return $hasil;
        }

        function entry_rekap($no,$nik,$nama,$jabatan,$golongan,
                            $jenis,$sanksi,$kasus_kebun,$no_surat,
                            $tgl_surat,$masa_berlaku,$no_pers)
        {
            date_default_timezone_set('Asia/Jakarta');

            $date   =   date('Y/m/d H:i:s');
            $data   =   array('no'             =>  $no,
                                'nik'          =>  $nik,
                                'nama'         =>  $nama,
                                'jabatan'      =>  $jabatan,
                                'golongan'     =>  $golongan,
                                'jenis'        =>  $jenis,
                                'sanksi'       =>  $sanksi,
                                'kasus_kebun'  =>  $kasus_kebun,
                                'no_surat'     =>  $no_surat,
                                'tgl_surat'    =>  $tgl_surat,
                                'masa_berlaku' =>  $masa_berlaku,
                                'no_pers'      =>  $no_pers,
                                'tgl'          =>  $date
                            );

            $insert     =   $this->db->insert('rekap_peringatan',$data);

            if($insert)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

        function edit_rekap($id_rekap,$no,$nik,$nama,$jabatan,$golongan,
                            $jenis,$sanksi,$kasus_kebun,$no_surat,
                            $tgl_surat,$masa_berlaku,$no_pers)
        {
            $data   =   array('no'             =>  $no,
                                'nik'          =>  $nik,
                                'nama'         =>  $nama,
                                'jabatan'      =>  $jabatan,
                                'golongan'     =>  $golongan,
                                'jenis'        =>  $jenis,
                                'sanksi'       =>  $sanksi,
                                'kasus_kebun'  =>  $kasus_kebun,
                                'no_surat'     =>  $no_surat,
                                'tgl_surat'    =>  $tgl_surat,
                                'masa_berlaku' =>  $masa_berlaku,
                                'no_pers'      =>  $no_pers
                            );
            
            $this->db->where('id_rekap', $id_rekap);
            $this->db->update('rekap_peringatan',$data);

            return 1;
        }

        function tampil_rekap()
        {
            $hasil = $this->db->query("SELECT * FROM rekap_peringatan");
            
            return $hasil;
        }

        function tampil_a1()
        {
            $hasil = $this->db->query("SELECT * FROM sdm01 ");
            return $hasil;
        }

        function get_sdm02_a1($npp)
        {
            return $query = $this->db->query(
                "SELECT sdm02.st_sipil as sipil, sdm02.tgl_nkh ,sdm02.tgl_cerai from sdm02
                    RIGHT JOIN sdm01 ON sdm02.npp = sdm01.npp
                    where sdm01.npp = $npp 
                    group by sdm01.npp"
            )->result_array();
        }

        function get_sdm02_a1_anak($npp)
        {   
            return $query = $this->db->query(
                "SELECT max(sdm02.no_urut) as tanggungan from sdm02
                    RIGHT JOIN sdm01 ON sdm02.npp = sdm01.npp
                    where sdm01.npp = $npp 
                    group by sdm01.npp"
            )->result_array();
        }

        function get_sdm03_a1($npp)
        {   
            $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm03 where npp = $npp group by npp")->result_array();
            $no = $no_urut[0]['no_urut'];
            return $query = $this->db->query(
                    "SELECT sdm03.kd_pend from sdm03
                    RIGHT JOIN sdm01 ON sdm03.npp = sdm01.npp
                    where sdm03.npp = $npp and sdm03.no_urut = $no"
            )->result_array();
        }

        function get_sdm08_a1($npp)
        {
            return $query = $this->db->query(
                "SELECT sdm08.tgl_sk, sdm08.no_sk from sdm08
                    RIGHT JOIN sdm01 ON sdm08.npp = sdm01.npp
                    where sdm01.npp = $npp 
                    group by sdm01.npp"
            )->result_array();
        }

        function get_sdm16_a1($npp)
        {
            return $query = $this->db->query(
                "SELECT sdm16.st_peg AS kd_kelas, sdm16.tmt AS kls_tmt, 
                sdm16.no_sk AS kls_sk, sdm16.golongan, sdm16.tgl_sk from sdm16
                    RIGHT JOIN sdm01 ON sdm16.npp = sdm01.npp
                    where sdm01.npp = $npp 
                    group by sdm01.npp = sdm16.npp"
            )->result_array();
        }

        function get_sdm16_a1_akhir($npp)
        {
            $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm16 where npp = $npp group by npp")->result_array();
            $no = $no_urut[0]['no_urut'];
            return $query = $this->db->query(
                "SELECT sdm16.tmt AS gol_tmt, sdm16.no_sk AS gol_sk , sdm16.golongan, sdm16.mk, sdm16.tgl_sk from sdm16
                    RIGHT JOIN sdm01 ON sdm16.npp = sdm01.npp
                    where sdm16.npp= $npp AND sdm16.no_urut=$no
                    GROUP BY sdm16.npp = sdm01.npp"
            )->result_array();
        }

        function get_sdm08_a1_akhir($npp)
        {
            $no_urut = $this->db->query("SELECT MAX(no_urut) as no_urut from sdm08 where npp = $npp group by npp")->result_array();
            $no = $no_urut[0]['no_urut'];
            return $query = $this->db->query(
                "SELECT sdm08.kd_unit AS kd_kbn, sdm08.kd_adf, sdm08.jabatan AS kd_jab,
                sdm08.kd_bud, sdm08.tmt AS jab_tmt, sdm08.no_sk AS jab_sk, sdm08.tgl_sk AS jab_tgl
                from sdm08
                    RIGHT JOIN sdm01 ON sdm08.npp = sdm01.npp
                    where sdm08.npp = $npp AND sdm08.no_urut=$no"
            )->result_array();
        }
        
        

        
        
        
    }
?>