<?php
class tabel_cv extends CI_Controller
{
    function __construct() 
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Model_karyawan');
        $this->load->model('Model_admin');

        if(empty($_SESSION['status_login'])){
            redirect('Welcome/index');
        }
    }

    function view_cv()
    {   
        $npp = $this->session->userdata('status_login_username');
        $pdf = new FPDF("P","cm","A4");
        // membuat halaman baru
        $pdf->AliasNbPages();
        $pdf->AddPage();
        // End Halaman Baru

        //line
        $pdf->SetFont('Times','',10);
        $pdf->Cell(0,0,"-----------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,'C');
        //end Line

        //Header
        $pdf->ln(0.3);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(19.5,0.4,'I. DATA PRIBADI',0,1);
        //end Header

        //Data Probadi
        $pdf->ln(1);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(4.5,0,'1. No Induk Pegawai',0,0);
        $pdf->Cell(1,0,':',0,0);
        $biodiri = $this->Model_karyawan->get_bio();
        foreach ($biodiri as $row){
            $pdf->Cell(2.3,0, $row['npp'],0,3,'R'); // memanggil npp
            $pdf->ln(0.1);
            $pdf->Cell(4.5,1,'2. Nama Lengkap',0,0);
            $pdf->Cell(1,1,':',0,0);
            $pdf->Cell(1.3,1, $row['nama'],0,3,'R'); // memanggil nama
            
            $golbaru = $this->Model_karyawan->get_gol_akhir($row['npp']);
            foreach ($golbaru as $d) { 
                
                $gol = $this->Model_karyawan->get_gol($d['golongan']);
                foreach ($gol as $y){ 
                    $pdf->ln(0.1);
                    $pdf->Cell(4.5,0,'3. Pangkat/Golongan',0,0);
                    $pdf->Cell(0.6,0,':',0,0);
                    $pdf->Cell(0.5,0,$y['gol'],0,0); // memanggil golongan
                } 
                    $pdf->Cell(1,0,'/',0,1);
                    $pdf->Cell(6.4,0,$d['mk'],0,3,'R'); // memanggil mk
            }
            $pdf->ln(0.2);
            $pdf->Cell(4.5,1,'4. Tempat/Tanggal Lahir',0,0);
            $pdf->Cell(0.6,1,':',0,0);
            $pdf->Cell(1.4,1, $row['kota_lhr'],0,0); // memanggil kota lahir
            $pdf->Cell(1.5,1,'/',0,0);
            $pdf->Cell(0.7,1, $row['tgl_lhr'],0,3,'R'); // memanggil tgl lahir
            $pdf->ln(0.2);
            $pdf->Cell(4.5,0,'5. Agama',0,0);
            $pdf->Cell(0.6,0,':',0,0);
            $agama = $this->Model_karyawan->get_agama($row['agama']);
            foreach ($agama as $q){
                $pdf->Cell(1.3,0,$q['nm_agama'],0,3,'R'); // memanggil agama
            } 
            $pdf->ln(0.2);
            $pdf->Cell(4.5,1,'6. Alamat Kantor',0,0);
            $pdf->Cell(0.6,1,':',0,0);
            $alamat = $this->Model_karyawan->almt($row['npp']);
            foreach ($alamat as $v) { 
                
                $ini = $this->Model_karyawan->unit($v['kd_unit']);
                foreach ($ini as $p) { 
                    $pdf->Cell(3.4,1,$p['nm_unit'],0,3,'R'); // memanggil alamat kantor
                } 
            }
            $pdf->ln(0.2);
            $pdf->Cell(4.5,0,'7. Alamat Rumah',0,0);
            $pdf->Cell(0.6,0,':',0,0);
            $pdf->Cell(1.7,0,$row['alamat_tgl'],0,3,'R'); // memanggil alamat tempat tinggal
            $pdf->ln(0.2);
            $pdf->Cell(4.5,1,'8. Jenis Kelamin',0,0);
            $pdf->Cell(0.6,1,':',0,0);
            $jk = $this->Model_karyawan->get_jenis_kelamin($row['j_kelamin']);
            foreach ($jk as $z){ 
                $pdf->Cell(2,1,$z['nm_kelamin'],0,3,'R'); // memanggil jenis kelamin
                }
            $pdf->ln(0.2);
            $pdf->Cell(4.5,0,'9. Gol Darah',0,0);
            $pdf->Cell(0.6,0,':',0,0);
            $pdf->Cell(0.5,0,$row['gol_darah'],0,3,'R'); // memanggil golongan darah
            $pdf->ln(0.2);
            $pdf->Cell(4.5,1,'10. Status Sipil',0,0);
            $pdf->Cell(0.6,1,':',0,0);
            $sipil = $this->Model_karyawan->get_sipil($row['st_sipil']);
            foreach ($sipil as $s){
                $pdf->Cell(1.4,1,$s['nm_sipil'],0,3,'R'); // memanggil status sipil
                }
        }
        // End Data pribadi

        // Data Keluarga
        $pdf->ln(0.2);
        $pdf->Cell(4.5,0,'11. Susunan Keluarga',0,0);
        $pdf->Cell(0.6,0,':',0,1);
        $pdf->ln(0.5);
        $pdf->SetFont('Times','B',9);
        $pdf->Cell(0.7,1,'No',1,0,'C');
        $pdf->Cell(1,1,'Foto',1,0,'C');
        $pdf->Cell(3.1,1,'Nama',1,0,'C');
        $pdf->Cell(3.5,1,'Hubungan',1,0,'C');
        $pdf->Cell(2.5,1,'Tempat Lahir',1,0,'C');
        $pdf->Cell(2.5,1,'Tanggal Lahir',1,0,'C');
        $pdf->Cell(1.2,1,'Umur',1,0,'C');
        $pdf->Cell(1.8,1,'Gol Darah',1,0,'C');
        $pdf->Cell(2.5,1,'Tkt Pen',1,1,'C');
        $pdf->SetFont('Times','',9);
        $kel = $this->Model_karyawan->get_bio_kel();
        foreach ($kel as $v) {
            $pdf->Cell(0.7,1,$v['no_urut'],1,0,'C'); // memanggil no urut
            $pdf->Cell(1,1,'Foto',1,0,'C');
            $pdf->Cell(3.1,1,$v['nama'],1,0,'C'); // memanggil nama
            $hbg = $this->Model_karyawan->hubungan($v['hbg_klg']);
            foreach ($hbg as $h){
                $pdf->Cell(3.5,1,$h['nama'],1,0,'C'); // memanggil hubungan keluarga
            }
            $pdf->Cell(2.5,1,$v['kota_lhr'],1,0,'C'); // memanggil kota lahir
            $pdf->Cell(2.5,1,$v['tgl_lhr'],1,0,'C'); // memanggil tanggal lahir
            
                $lahir    = new DateTime(date('Y-m-d', strtotime($v['tgl_lhr'])));
                $sekarang = new DateTime(date('Y-m-d'));
                $tgl      = $lahir->diff($sekarang);
                $pdf->Cell(1.2,1,$tgl->y,1,0,'C'); // menjumlahkan tgl lahir dan tgl sekarang menjadi umur
            
            $pdf->Cell(1.8,1,$v['gol_darah'],1,0,'C'); // memanggil golongan darah
            $pdf->Cell(2.5,1,$v['tk_ped'],1,1,'C'); // memanggil tingakt pendidikan
        } 
        // End Data Kluarga

        //line\
        $pdf->ln(0.5);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(0,0,"-----------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,'C');
        //end Line

        //Header
        $pdf->ln(0.6);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(19.5,1,'II. RIWAYAT PEKERJAAN',0,1);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(4.5,0,'A. Di Lingkungan PTPN VII',0,1);
        //end Header

        // Data Riwayat Pekerjaan
        $pdf->ln(1);
        $pdf->SetFont('Times','',9);
        $pdf->Cell(4,0,'1.  Tanggal Mulai Kerja',0,0);
        $pdf->Cell(1,0,':',0,0);
        $pdf->Cell(1.5,0, $row['tgl_masuk'],0,3,'R'); // memanggil tangga masuk
        $pdf->ln(0.2);
        $pdf->Cell(4,1,'2.  Masa Kerja',0,0);
        $pdf->Cell(1,1,':',0,0);
        $sdm16 = $this->Model_admin->get_sdm16_a1_akhir($row['npp']);
        $golongan = $sdm16[0]['golongan'];
        $golongan = (int)$golongan;
        if($golongan >= 0 AND $golongan <= 8)
        {
            $tgl_pen = date('Y-m-d', strtotime('+20258 days', strtotime($row['tgl_lhr'])));
            
            $pdf->Cell(1.5,1,$tgl_pen,0,3,'R');
        }
        if($golongan >= 9 AND $golongan <= 16)
        {
            $tgl_pen = date('Y-m-d', strtotime('+20440 days', strtotime($row['tgl_lhr'])));
            
            $pdf->Cell(1.5,1,$tgl_pen,0,3,'R');
        }
        $pdf->ln(0.2);
        $pdf->Cell(4,0,'3.  Tanggal MBT',0,0);
        $pdf->Cell(1,0,':',0,0);
        $sdm16 = $this->Model_admin->get_sdm16_a1($row['npp']);
        $skrng = date_create($sdm16[0]['tgl_sk']);
        $tgl_pen = date_create($tgl_pen);
        
        $diff = date_diff($skrng,$tgl_pen);
        
        if ($diff->y > 56){ 
        $pdf->Cell(0.2,0,'',0,3,'R');
        }else{
        $pdf->Cell(0.2,0,$diff->y,0,3,'R');
        }
        // end 1-3

        // 4 Data Mutasi
        $pdf->ln(0.2);
        $pdf->Cell(4,1,'4.  Mutasi Pangkat/Gol',0,0);
        $pdf->Cell(1,1,':',0,1);
        $pdf->ln(0.1);
        $pdf->SetFont('Times','B',10);
        $pdf->Cell(0.7,1,'No',1,0,'C');
        $pdf->Cell(5.8,1,'Kenaikan',1,0,'C');
        $pdf->Cell(1.2,1,'Gol',1,0,'C');
        $pdf->Cell(2,1,'TMT',1,0,'C');
        $pdf->Cell(3.6,1,'No SK',1,0,'C');
        $pdf->Cell(2.5,1,'Tanggal SK',1,0,'C');
        $pdf->Cell(3.2,1,'Pejabat',1,1,'C');
        $pdf->SetFont('Times','',10);
        $mutasi = $this->Model_karyawan->get_mutasi();
        foreach ($mutasi as $key){
            $pdf->Cell(0.7,1,$key['no_urut'],1,0,'C'); // memanggil no urut
            $naik = $this->Model_karyawan->get_naik($key['jns_naik']);
            foreach ($naik as $n){
                $pdf->Cell(5.8,1,$n['nama'],1,0);
            }
            $gol = $this->Model_karyawan->get_gol($key['golongan']);
            foreach ($gol as $g){
                $pdf->Cell(1.2,1,$g['gol'],1,0);
                $pdf->Cell(-0.8,1,'',0,0);
                $pdf->Cell(0.6,1,'/',0,0);
                $pdf->Cell(-0.5,1,'',0,0);
                $pdf->Cell(1.2,1,$key['mk'],0,0);
            }
            $pdf->Cell(-0.5,1,'',0,0);
            $pdf->Cell(2,1,$key['tmt'],1,0,'C');
            $pdf->Cell(3.6,1,$key['no_sk'],1,0);
            $pdf->Cell(2.5,1,$key['tgl_sk'],1,0,'C');
            $pdf->Cell(3.2,1,$key['npp_jbt'],1,1,'C');

        }
        // End Data Mutasi

        // 5 Riwayat Jabatan Struktural
        $pdf->ln(0.2);
        $pdf->Cell(4,1,'5.  Riwayat Jabatan Struktural',0,0);
        $pdf->Cell(1,1,':',0,1);
        $pdf->ln(0.1);
        $pdf->SetFont('Times','B',9);
        $pdf->Cell(0.7,1,'No',1,0,'C');
        $pdf->Cell(3.7,1,'Nama Jabatan',1,0,'C');
        $pdf->Cell(3.5,1,'Unit Kerja',1,0,'C');
        $pdf->Cell(2,1,'TMT',1,0,'C');
        $pdf->Cell(4,1,'No SK',1,0,'C');
        $pdf->Cell(2,1,'Tgl SK',1,0,'C');
        $pdf->Cell(3.2,1,'Pejabat',1,1,'C');
        $pdf->SetFont('Times','',9);
        $rjs = $this->Model_karyawan->get_sdm08();
        foreach ($rjs as $viv) {
            $pdf->Cell(0.7,1,$viv['no_urut'],1,0,'C'); // memanggil no urut
            $jab = $this->Model_karyawan->get_jab($viv['jabatan']);
            foreach ($jab as $j){
                $pdf->Cell(3.7,1,$j['nama'],1,0);
            }
            $unit = $this->Model_karyawan->unit($viv['kd_unit']);
            foreach ($unit as $u){
                $pdf->Cell(3.5,1,$u['nm_unit'],1,0);
            }
            $pdf->Cell(2,1,$viv['tmt'],1,0,'C');
            $pdf->Cell(4,1,$viv['no_sk'],1,0);
            $pdf->Cell(2,1,$viv['tgl_sk'],1,0,'C');
            $pdf->Cell(3.2,1,$viv['npp_jbt'],1,1,'C');
        }
        // end Riwayat Jabatan Struktural

        //line\
        $pdf->ln(0.5);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(0,0,"-----------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,'C');
        //end Line

        //Header
        $pdf->ln(0.6);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(19.5,1,'III. RIWAYAT PENDIDIKAN',0,1);
        $pdf->SetFont('Times','',10);
        //end Header

        // Pendidikan Formal
        $pdf->Cell(4.5,0,'A. Pendidikan Formal',0,0);
        $pdf->Cell(1,0,':',0,1);
        $pdf->ln(0.3);
        $pdf->SetFont('Times','B',9);
        $pdf->Cell(0.7,1,'No',1,0,'C');
        $pdf->Cell(3.7,1,'Pendidikan',1,0,'C');
        $pdf->Cell(3.5,1,'Nama Sekolah/Lembaga',1,0,'C');
        $pdf->Cell(2,1,'Kota',1,0,'C');
        $pdf->Cell(2,1,'Thn Mulai',1,0,'C');
        $pdf->Cell(2,1,'Thn Selesai',1,0,'C');
        $pdf->Cell(3,1,'No Ijasah',1,0,'C');
        $pdf->Cell(2,1,'Tgl Ijasah',1,1,'C');
        $pdf->SetFont('Times','',9);
        $pend = $this->Model_karyawan->get_sdm03();
        foreach ($pend as $p) {
            $pdf->Cell(0.7,1,$p['no_urut'],1,0,'C');
            $tk = $this->Model_karyawan->get_pddk($p['kd_pend']);
            foreach ($tk as $nm){
                $pdf->Cell(3.7,1,$nm['nm_pend'],1,0);
            }
            $pdf->Cell(3.5,1,$p['ket'],1,0,'C');
            $pdf->Cell(2,1,$p['kota'],1,0,'C');
            $pdf->Cell(2,1,$p['thn_awal'],1,0,'C');
            $pdf->Cell(2,1,$p['thn_akhir'],1,0,'C');
            $pdf->Cell(3,1,$p['no_ijasah'],1,0,'C');
            $pdf->Cell(2,1,$p['tgl_ijasah'],1,1,'C');
        }
        // End Pendidikan Formal

        //line\
        $pdf->ln(0.5);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(0,0,"-----------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,'C');
        //end Line

        //Header
        $pdf->ln(0.6);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(19.5,1,'IV. RIWAYAT PENGEMBANGAN',0,1);
        $pdf->SetFont('Times','',10);
        //end Header

        // Riwayat Pengembangan
        $pdf->Cell(4.5,0,'A. Riwayat Pengembangan',0,0);
        $pdf->Cell(1,0,':',0,1);
        $pdf->ln(0.5);
        $pdf->SetFont('Times','B',9);
        $pdf->Cell(0.7,1,'No',1,0,'C');
        $pdf->Cell(3.7,1,'Nama Pelatihan',1,0,'C');
        $pdf->Cell(3.5,1,'Penyelenggara/ kota',1,0,'C');
        $pdf->Cell(3,1,'Lama kagiatan',1,0,'C');
        $pdf->Cell(2.5,1,'No Sertifikat',1,1,'C');
        $pdf->SetFont('Times','',9);
        $pdf->Cell(13.4,1,'No data available in table',1,1,'C');
        // End Riwayat Pengembangan

        // Assesment
        $pdf->ln(0.5);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(4.5,0,'B. Assesment',0,0);
        $pdf->Cell(1,0,':',0,1);
        $pdf->ln(0.5);
        $pdf->SetFont('Times','B',9);
        $pdf->Cell(0.7,1,'No',1,0,'C');
        $pdf->Cell(3,1,'Pendidikan',1,0,'C');
        $pdf->Cell(3,1,'Nama Sekolah',1,0,'C');
        $pdf->Cell(2,1,'Kota',1,0,'C');
        $pdf->Cell(2,1,'Thn Mulai',1,0,'C');
        $pdf->Cell(2,1,'Thn Selesai',1,0,'C');
        $pdf->Cell(2,1,'No Ijasah',1,0,'C');
        $pdf->Cell(2.5,1,'Tgl Ijasah',1,0,'C');
        $pdf->Cell(2.5,1,'No Sertifikat',1,1,'C');
        $pdf->SetFont('Times','',9);
        $pdf->Cell(19.7,1,'No data available in table',1,1,'C');
        // end Assesment

        //line\
        $pdf->ln(0.5);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(0,0,"-----------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,'C');
        //end Line

        //Header
        $pdf->ln(0.6);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(19.5,1,'V. RIWAYAT HUKUMAN',0,1);
        $pdf->SetFont('Times','',10);
        //end Header

        // Riwayat Kesalahan
        $pdf->ln(0.2);
        $pdf->SetFont('Times','B',9);
        $pdf->Cell(0.7,1,'No',1,0,'C');
        $pdf->Cell(3,1,'Jenis',1,0,'C');
        $pdf->Cell(3,1,'Sanksi',1,0,'C');
        $pdf->Cell(3,1,'Kasus Kebun',1,0,'C');
        $pdf->Cell(2,1,'No Surat',1,0,'C');
        $pdf->Cell(2,1,'Tgl Surat',1,0,'C');
        $pdf->Cell(3,1,'Masa Berlaku',1,1,'C');
        $pdf->SetFont('Times','',9);
        $pdf->Cell(16.7,1,'No data available in table',1,1,'C');
        // End Riwayat Kesalahan

        //line\
        $pdf->ln(0.5);
        $pdf->SetFont('Times','',10);
        $pdf->Cell(0,0,"-----------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,'C');
        //end Line

        // Text Akhir
        $pdf->ln(0.5);
        $pdf->SetFont('Times','',10);
        $pdf->ln(0.5);
        $pdf->Cell(18,0,'Demikian Daftar Riwayat Hidup ini saya buat dengan sesungguhnya dan apabila di kemudian hari terdapat ',0,1,'P');
        $pdf->ln(0.5);
        $pdf->Cell(18,0,'keterangan yang tidak benar, saya bersedia dituntut di muka pengadilan serta bersedia menerima segala ',0,1,'P');
        $pdf->ln(0.5);
        $pdf->Cell(18,0,'tindakan yang diambil pemerintah.',0,1,'P');
        $pdf->ln(0.5);
        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("d-m-Y");
        $pdf->Cell(32,1,"Bandung , ".$date  ,0,1,'C');
        $pdf->ln(0.5);
        $pdf->Cell(32,1,$row['nama'],0,0,'C');  
        // End Text Akhir

        $pdf->Output();
        $filename = $_SERVER['DOCUMENT_ROOT'].'/aptk/assets_application/assets/PrintOUT/karyawan'.$nama.' '.$npp.' '.$date.'.pdf';


        $pdf->Output($filename,'F');
        
    }

}