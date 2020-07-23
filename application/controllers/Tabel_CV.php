<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tabel_cv extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Model_karyawan');
        $this->load->model('Model_admin');

        if (empty($_SESSION['status_login'])) {
            redirect('Welcome/index');
        }
    }

    function view_cv()
    {
        $nama  = $this->session->userdata('status_login');
        $pdf  = new FPDF("P", "cm", "letter");

        // membuat halaman baru
        $pdf->AliasNbPages();
        $pdf->AddPage();
        // End Halaman Baru

        $pdf->ln(0.2);
        $pdf->SetFont('Times', 'B', 25);
        $pdf->Image(base_url() . 'assets_login/images/logo.png', 1.5, 0.8, 2.7, 1.7);
        $pdf->MultiCell(23.5, 0.4, 'PT PERKEBUNAN NUSANTARA VIII', 0, 'C');
        $pdf->ln(0.3);
        $pdf->SetFont('Times', '', 10);
        $pdf->MultiCell(23.5, 0.4, 'Jalan Sindangsirna No. 4 Bandung 40153 - Indonesia, Kotak Pos 1176, Tlp. (62-22) 2038966', 0, 'C');
        $pdf->MultiCell(23.5, 0.4, 'Fax. (62-22) 2031 455, E-mail:ptpb8@pn8.co.id; Webside:http://www.pn8.co.id', 0, 'C');

        //line
        $pdf->ln(0.3);
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(0, 0, "====================================================================================================", 0, 0, 'C');
        //end Line

        //Judul
        $pdf->ln(0.8);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(20, 0.4, 'DAFTAR RIWAYAT HIDUP', 0, 1, 'C');
        //end Judul

        //Header I
        $pdf->ln(0.7);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(19.5, 0.4, 'I. DATA PRIBADI', 0, 1);
        //end Header

        // Foto
        $profil = $this->Model_karyawan->get_no_id();
        foreach ($profil as $p) {
            $pdf->Image(base_url() . 'assets_application/assets/faces/' . $p['image'], 16, 6, 4, 5);
        }

        //Data Probadi
        $pdf->ln(1);
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(4.5, 0, '1. No Induk Pegawai', 0, 0);
        $pdf->Cell(1, 0, ':', 0, 0);
        $biodiri = $this->Model_karyawan->get_bio();
        foreach ($biodiri as $row) {
            $pdf->Cell(2.3, 0, $row['npp'], 0, 1, 'L'); // memanggil npp
            $pdf->ln(0.1);
            $pdf->Cell(4.5, 1, '2. Nama Lengkap', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 0);
            $pdf->Cell(2.3, 1, $row['nama'], 0, 1, 'L'); // memanggil nama

            $golbaru = $this->Model_karyawan->get_gol_akhir($row['npp']);
            foreach ($golbaru as $d) {
                $gol = $this->Model_karyawan->get_gol($d['golongan']);
                foreach ($gol as $y) {
                    $pdf->ln(0.1);
                    $pdf->Cell(4.5, 0, '3. Pangkat/Golongan', 0, 0);
                    $pdf->Cell(1, 0, ':', 0, 0);
                    $pdf->Cell(1.5, 0, $y['gol'], 0, 0, 'L'); // memanggil golongan
                }
                $pdf->Cell(1, 0, '/', 0, 0);
                $pdf->Cell(2.3, 0, $d['mk'], 0, 1, 'L'); // memanggil mk
            }
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 1, '4. Tempat/Tanggal Lahir', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 0);
            $pdf->Cell(2.8, 1, $row['kota_lhr'], 0, 0); // memanggil kota lahir
            $pdf->Cell(1, 1, '/', 0, 0);
            $pdf->Cell(2.3, 1, date('d-m-Y', strtotime($row['tgl_lhr'])), 0, 1, 'L'); // memanggil tgl lahir
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 0, '5. Agama', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 0);
            $agama = $this->Model_karyawan->get_agama($row['agama']);
            foreach ($agama as $q) {
                if ($q['kd_agama'] < 0) {
                    $pdf->Cell(2.3, 0, '', 0, 1, 'L'); // memanggil agama
                } else {
                    $pdf->Cell(2.3, 0, $q['nm_agama'], 0, 1, 'L'); // memanggil agama
                }
            }
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 1, '6. Alamat Kantor', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 0);
            $alamat = $this->Model_karyawan->almt($row['npp']);
            foreach ($alamat as $v) {

                $ini = $this->Model_karyawan->unit($v['kd_unit']);
                foreach ($ini as $p) {
                    $pdf->Cell(2.3, 1, $p['nm_unit'], 0, 1, 'L'); // memanggil alamat kantor
                }
            }
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 0, '7. Alamat Rumah', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 0);
            $pdf->Cell(2.3, 0, $row['alamat_tgl'], 0, 1, 'L'); // memanggil alamat tempat tinggal
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 1, '8. Jenis Kelamin', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 0);
            $jk = $this->Model_karyawan->get_jenis_kelamin($row['j_kelamin']);
            foreach ($jk as $z) {
                $pdf->Cell(2.3, 1, $z['nm_kelamin'], 0, 1, 'L'); // memanggil jenis kelamin
            }
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 0, '9. Gol Darah', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 0);
            $pdf->Cell(2.3, 0, $row['gol_darah'], 0, 1, 'L'); // memanggil golongan darah
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 1, '10. Status Sipil', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 0);
            $sipil = $this->Model_karyawan->get_sipil($row['st_sipil']);
            foreach ($sipil as $s) {
                if ($s['kd_sipil'] < 0) {
                    $pdf->Cell(2.3, 1, '', 0, 1, 'L'); // memanggil status sipil
                } else {
                    $pdf->Cell(2.3, 1, $s['nm_sipil'], 0, 1, 'L'); // memanggil status sipil
                }
            }

            // End Data pribadi

            // Data Keluarga
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 0, '11. Susunan Keluarga', 0, 0);
            $pdf->Cell(0.6, 0, ':', 0, 1);
            $pdf->ln(0.5);
            $pdf->SetFont('Times', 'B', 10);
            $pdf->Cell(0.7, 1, 'No', 1, 0, 'C');
            $pdf->Cell(1, 1, 'Foto', 1, 0, 'C');
            $pdf->Cell(5.5, 1, 'Nama', 1, 0, 'C');
            $pdf->Cell(2.9, 1, 'Hubungan', 1, 0, 'C');
            $pdf->Cell(2.5, 1, 'Tempat Lahir', 1, 0, 'C');
            $pdf->Cell(2.5, 1, 'Tanggal Lahir', 1, 0, 'C');
            $pdf->Cell(1.2, 1, 'Umur', 1, 0, 'C');
            $pdf->Cell(1.8, 1, 'Gol Darah', 1, 0, 'C');
            $pdf->Cell(1.5, 1, 'Tkt Pen', 1, 1, 'C');
            $pdf->SetFont('Times', '', 9);
            $kel = $this->Model_karyawan->get_bio_kel();
            foreach ($kel as $v) {
                $pdf->Cell(0.7, 1, $v['no_urut'], 1, 0, 'L'); // memanggil no urut
                $pdf->Cell(1, 1, 'Foto', 1, 0, 'L');
                $pdf->Cell(5.5, 1, $v['nama'], 1, 0, 'L'); // memanggil nama
                $hbg = $this->Model_karyawan->hubungan($v['hbg_klg']);
                foreach ($hbg as $h) {
                    $pdf->SetFont('Times', '', 8);
                    $pdf->Cell(2.9, 1, $h['nama'], 1, 0, 'L'); // memanggil hubungan keluarga
                }
                $pdf->Cell(2.5, 1, $v['kota_lhr'], 1, 0, 'L'); // memanggil kota lahir
                $pdf->Cell(2.5, 1, date('d-m-Y', strtotime($v['tgl_lhr'])), 1, 0, 'L'); // memanggil tanggal lahir

                $lahir    = new DateTime(date('Y-m-d', strtotime($v['tgl_lhr'])));
                $sekarang = new DateTime(date('Y-m-d'));
                $tgl      = $lahir->diff($sekarang);
                $pdf->Cell(1.2, 1, $tgl->y, 1, 0, 'L'); // menjumlahkan tgl lahir dan tgl sekarang menjadi umur

                $pdf->Cell(1.8, 1, $v['gol_darah'], 1, 0, 'L'); // memanggil golongan darah
                $pdf->Cell(1.5, 1, $v['tk_pend'], 1, 1, 'L'); // memanggil tingakt pendidikan
            }
            // End Data Kluarga

            //line\
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(0, 0, "----------------------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 0, 'C');
            //end Line

            // membuat halaman baru
            $pdf->AliasNbPages();
            $pdf->AddPage();
            // End Halaman Baru

            //line\
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 0, 'C');
            //end Line

            //Header II
            $pdf->ln(0.6);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(19.5, 1, 'II. RIWAYAT PEKERJAAN', 0, 1);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(4.5, 0, 'A. Di Lingkungan PTPN VII', 0, 1);
            //end Header

            // Data Riwayat Pekerjaan
            $pdf->ln(1);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(4, 0, '1.  Tanggal Mulai Kerja', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 0);
            $pdf->Cell(1.5, 0, date('d-m-Y', strtotime($row['tgl_masuk'])), 0, 3, 'L'); // memanggil tangga masuk
            $pdf->ln(0.2);
            $pdf->Cell(4, 1, '2.  Masa Kerja', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 0);
            $sdm16 = $this->Model_admin->get_sdm16_a1($row['npp']);
            $golongan = $sdm16[0]['golongan'];
            $golongan = (int) $golongan;
            if ($golongan >= 0 and $golongan <= 8) {
                $tgl_pen = date('Y-m-d', strtotime('+55 year +1 month', strtotime($row['tgl_lhr'])));
            }
            if ($golongan >= 9 and $golongan <= 16) {
                $tgl_pen = date('Y-m-d', strtotime('+56 year +1 month', strtotime($row['tgl_lhr'])));
            }
            $skrng = date_create($sdm16[0]['tgl_sk']);
            $tgl_pen = date_create($tgl_pen);

            $diff = date_diff($skrng, $tgl_pen);

            if ($diff->y > 56) {
                $pdf->Cell(0.4, 1, '', 0, 3, 'L');
            } else {
                $pdf->Cell(0.4, 1, $diff->y . ' Tahun - ' . $diff->m . ' Bulan', 0, 3, 'L');
            }
            $pdf->ln(0.2);
            $pdf->Cell(4, 0, '3.  Tanggal MBT', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 0);
            $sdm16 = $this->Model_admin->get_sdm16_a1_akhir($row['npp']);
            $golongan = $sdm16[0]['golongan'];
            $golongan = (int) $golongan;
            if ($golongan >= 0 and $golongan <= 8) {
                $tgl_pen = date('Y-m-d', strtotime('+55 year +1 month', strtotime($row['tgl_lhr'])));
                $tgl_mpp = date('Y-m-d', strtotime('-6 month', strtotime($tgl_pen)));

                $pdf->Cell(1.5, 0, date('01-m-Y', strtotime($tgl_mpp)), 0, 3, 'L');
            }
            if ($golongan >= 9 and $golongan <= 16) {
                $tgl_pen = date('Y-m-d', strtotime('+55 year +1 month', strtotime($row['tgl_lhr'])));
                $tgl_mpp = date('Y-m-d', strtotime('-6 month', strtotime($tgl_pen)));

                $pdf->Cell(1.5, 0, date('01-m-Y', strtotime($tgl_mpp)), 0, 3, 'L');
            }

            // end 1-3

            // 4 Data Mutasi
            $pdf->ln(0.2);
            $pdf->Cell(4, 1, '4.  Mutasi Pangkat/Gol', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 1);
            $pdf->ln(0.1);
            $pdf->SetFont('Times', 'B', 10);
            $pdf->Cell(0.7, 1, 'No', 1, 0, 'C');
            $pdf->Cell(5, 1, 'Kenaikan', 1, 0, 'C');
            $pdf->Cell(1.3, 1, 'Gol', 1, 0, 'C');
            $pdf->Cell(2, 1, 'TMT', 1, 0, 'C');
            $pdf->Cell(3.6, 1, 'No SK', 1, 0, 'C');
            $pdf->Cell(2.1, 1, 'Tanggal SK', 1, 0, 'C');
            $pdf->Cell(3.6, 1, 'Pejabat', 1, 1, 'C');
            $pdf->SetFont('Times', '', 9);
            $mutasi = $this->Model_karyawan->get_mutasi();
            foreach ($mutasi as $key) {
                $pdf->Cell(0.7, 1, $key['no_urut'], 1, 0, 'C'); // memanggil no urut
                $naik = $this->Model_karyawan->get_naik($key['jns_naik']);
                foreach ($naik as $n) {
                    $pdf->SetFont('Times', '', 8);
                    $pdf->Cell(5, 1, $n['nama'], 1, 0);
                }
                $gol = $this->Model_karyawan->get_gol($key['golongan']);
                foreach ($gol as $g) {
                    $pdf->SetFont('Times', '', 9);
                    $pdf->Cell(1.3, 1, $g['gol'], 1, 0);
                    $pdf->Cell(-0.7, 1, '', 0, 0);
                    $pdf->Cell(0.7, 1, '/', 0, 0);
                    $pdf->Cell(-0.5, 1, '', 0, 0);
                    $pdf->Cell(1, 1, $key['mk'], 0, 0);
                }
                $pdf->Cell(-0.5, 1, '', 0, 0);
                $pdf->Cell(2, 1, date('d-m-Y', strtotime($key['tmt'])), 1, 0, 'L');
                $pdf->Cell(3.6, 1, $key['no_sk'], 1, 0);
                $pdf->Cell(2.1, 1, date('d-m-Y', strtotime($key['tgl_sk'])), 1, 0, 'L');
                $pdf->Cell(3.6, 1, $key['npp_jbt'], 1, 1, 'L');
            }
            // End Data Mutasi

            // 5 Riwayat Jabatan Struktural
            $pdf->ln(0.2);
            $pdf->Cell(4, 1, '5.  Riwayat Jabatan Struktural', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 1);
            $pdf->ln(0.1);
            $pdf->SetFont('Times', 'B', 10);
            $pdf->Cell(0.7, 1, 'No', 1, 0, 'C');
            $pdf->Cell(5, 1, 'Nama Jabatan', 1, 0, 'C');
            $pdf->Cell(3.2, 1, 'Unit Kerja', 1, 0, 'C');
            $pdf->Cell(1.8, 1, 'TMT', 1, 0, 'C');
            $pdf->Cell(3.8, 1, 'No SK', 1, 0, 'C');
            $pdf->Cell(1.8, 1, 'Tgl SK', 1, 0, 'C');
            $pdf->Cell(2.8, 1, 'Pejabat', 1, 1, 'C');
            $pdf->SetFont('Times', '', 9);
            $rjs = $this->Model_karyawan->get_sdm08();
            foreach ($rjs as $viv) {
                $pdf->Cell(0.7, 1, $viv['no_urut'], 1, 0, 'C'); // memanggil no urut
                $jab = $this->Model_karyawan->get_jab($viv['jabatan']);
                foreach ($jab as $j) {
                    $pdf->Cell(5, 1, $j['nama'], 1, 0);
                }
                $unit = $this->Model_karyawan->unit($viv['kd_unit']);
                foreach ($unit as $u) {
                    $pdf->Cell(3.2, 1, $u['nm_unit'], 1, 0);
                }
                $pdf->Cell(1.8, 1, date('d-m-Y', strtotime($viv['tmt'])), 1, 0, 'L');
                $pdf->Cell(3.8, 1, $viv['no_sk'], 1, 0, 'L');
                $pdf->Cell(1.8, 1, date('d-m-Y', strtotime($viv['tgl_sk'])), 1, 0, 'L');
                $pdf->Cell(2.8, 1, $viv['npp_jbt'], 1, 1, 'C');
            }
            // end Riwayat Jabatan Struktural

            //line\
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 0, 'C');
            //end Line

            //Header III
            $pdf->ln(0.6);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(19.5, 1, 'III. RIWAYAT PENDIDIKAN', 0, 1);
            $pdf->SetFont('Times', '', 10);
            //end Header

            // Pendidikan Formal
            $pdf->Cell(4.5, 0, 'A. Pendidikan Formal', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 1);
            $pdf->ln(0.3);
            $pdf->SetFont('Times', 'B', 9);
            $pdf->Cell(0.7, 1, 'No', 1, 0, 'C');
            $pdf->Cell(2.5, 1, 'Pendidikan', 1, 0, 'C');
            $pdf->Cell(5, 1, 'Nama Sekolah/Lembaga', 1, 0, 'C');
            $pdf->Cell(2, 1, 'Kota', 1, 0, 'C');
            $pdf->Cell(1.7, 1, 'Thn Mulai', 1, 0, 'C');
            $pdf->Cell(1.7, 1, 'Thn Selesai', 1, 0, 'C');
            $pdf->Cell(3.7, 1, 'No Ijasah', 1, 0, 'C');
            $pdf->Cell(2, 1, 'Tgl Ijasah', 1, 1, 'C');
            $pdf->SetFont('Times', '', 9);
            $pend = $this->Model_karyawan->get_sdm03();
            foreach ($pend as $p) {
                $pdf->Cell(0.7, 1, $p['no_urut'], 1, 0, 'C');
                $tk = $this->Model_karyawan->get_pddk($p['kd_pend']);
                foreach ($tk as $nm) {
                    $pdf->Cell(2.5, 1, $nm['nama'], 1, 0);
                }
                $pdf->Cell(5, 1, $p['ket'], 1, 0, 'C');
                $pdf->Cell(2, 1, $p['kota'], 1, 0, 'C');
                $pdf->Cell(1.7, 1, $p['thn_awal'], 1, 0, 'C');
                $pdf->Cell(1.7, 1, $p['thn_akhir'], 1, 0, 'C');
                $pdf->Cell(3.7, 1, $p['no_ijasah'], 1, 0, 'C');
                $pdf->Cell(2, 1, $p['tgl_ijasah'], 1, 1, 'C');
            }
            // End Pendidikan Formal

            //line\
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 0, 'C');
            //end Line

            //Header
            $pdf->ln(0.6);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(19.5, 1, 'IV. RIWAYAT PENGEMBANGAN', 0, 1);
            $pdf->SetFont('Times', '', 10);
            //end Header

            // Riwayat Pengembangan
            $pdf->Cell(4.5, 0, 'A. Riwayat Pengembangan', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 1);
            $pdf->ln(0.5);
            $pdf->SetFont('Times', 'B', 9);
            $pdf->Cell(0.7, 1, 'No', 1, 0, 'C');
            $pdf->Cell(3.7, 1, 'Nama Pelatihan', 1, 0, 'C');
            $pdf->Cell(3.5, 1, 'Penyelenggara/ kota', 1, 0, 'C');
            $pdf->Cell(3, 1, 'Lama kagiatan', 1, 0, 'C');
            $pdf->Cell(2.5, 1, 'No Sertifikat', 1, 1, 'C');
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(13.4, 1, 'No data available in table', 1, 1, 'C');
            // End Riwayat Pengembangan

            // Assesment
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(4.5, 0, 'B. Assesment', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 1);
            $pdf->ln(0.5);
            $pdf->SetFont('Times', 'B', 9);
            $pdf->Cell(0.7, 1, 'No', 1, 0, 'C');
            $pdf->Cell(3, 1, 'Pendidikan', 1, 0, 'C');
            $pdf->Cell(3, 1, 'Nama Sekolah', 1, 0, 'C');
            $pdf->Cell(2, 1, 'Kota', 1, 0, 'C');
            $pdf->Cell(2, 1, 'Thn Mulai', 1, 0, 'C');
            $pdf->Cell(2, 1, 'Thn Selesai', 1, 0, 'C');
            $pdf->Cell(2, 1, 'No Ijasah', 1, 0, 'C');
            $pdf->Cell(2.5, 1, 'Tgl Ijasah', 1, 0, 'C');
            $pdf->Cell(2.5, 1, 'No Sertifikat', 1, 1, 'C');
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(19.7, 1, 'No data available in table', 1, 1, 'C');
            // end Assesment


            //line\
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 0, 'C');
            //end Line

            // membuat halaman baru
            $pdf->AliasNbPages();
            $pdf->AddPage();
            // End Halaman Baru

            //line\
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 0, 'C');
            //end Line

            //Header
            $pdf->ln(0.6);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(19.5, 1, 'V. RIWAYAT HUKUMAN', 0, 1);
            $pdf->SetFont('Times', '', 10);
            //end Header

            // Riwayat Kesalahan
            $pdf->ln(0.2);
            $Y_Fields_Name_position = 3;
            $pdf->SetFont('Times', 'B', 10);
            $pdf->SetY($Y_Fields_Name_position);
            $pdf->SetX(1);
            $pdf->Cell(0.6, 1, 'No', 1, 0, 'C');
            $pdf->SetX(1.6);
            $pdf->Cell(4.1, 1, 'Jenis', 1, 0, 'C');
            $pdf->SetX(5.7);
            $pdf->Cell(6.1, 1, 'Sanksi', 1, 0, 'C');
            $pdf->SetX(11.8);
            $pdf->Cell(1.8, 1, 'Kasus Kbn', 1, 0, 'C');
            $pdf->SetX(13.6);
            $pdf->Cell(3.3, 1, 'No Surat', 1, 0, 'C');
            $pdf->SetX(16.9);
            $pdf->Cell(2, 1, 'Tgl Surat', 1, 0, 'C');
            $pdf->SetX(18.9);
            $pdf->Cell(2.2, 1, 'Berlaku', 1, 1, 'C');
            $pdf->ln(0.2);
            $Y_Table_Position = 4;

            $pdf->SetFont('Times', '', 9);
            $hkm = $this->Model_karyawan->get_sdm14();
            foreach ($hkm as $hkm) {
                $pdf->SetY($Y_Table_Position);
                $pdf->SetX(1);
                $pdf->MultiCell(0.6, 1, $hkm['no_urut'], 1, 'L'); // NO
                $pdf->SetY($Y_Table_Position);
                $pdf->SetX(1.6);
                $pdf->MultiCell(4.1, 1, $hkm['jns_hukum'], 1, 'L'); // JENIS
                $pdf->SetY($Y_Table_Position);
                $pdf->SetX(5.7);
                $pdf->MultiCell(6.1, 1, $hkm['uraian'], 1, 'L'); // SANKSI
                $pdf->SetY($Y_Table_Position);
                $pdf->SetX(11.8);
                $pdf->MultiCell(1.8, 1, '', 1, 'L'); // KASUS KEBUN
                $pdf->SetY($Y_Table_Position);
                $pdf->SetX(13.6);
                $pdf->MultiCell(3.3, 1, $hkm['no_sk'], 1, 'L'); // NO SURAT
                $pdf->SetY($Y_Table_Position);
                $pdf->SetX(16.9);
                $pdf->MultiCell(2, 1, $hkm['tgl_sk'], 1, 'L'); // TANGGAL SURAT
                $pdf->SetY($Y_Table_Position);
                $pdf->SetX(18.9);
                $pdf->MultiCell(2.2, 1, date('d-m-Y', strtotime($hkm['masa_berlaku'])), 1, 'L');
                $pdf->ln(4);
            }
            // End Riwayat Kesalahan

            //line\
            $pdf->ln(8);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 0, 'C');
            //end Line

            // Text Akhir
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->ln(0.5);
            $pdf->Cell(18, 0, '           Demikian Daftar Riwayat Hidup ini saya buat dengan sesungguhnya dan apabila di kemudian hari terdapat keterangan yang', 0, 1, 'P');
            $pdf->ln(0.5);
            $pdf->Cell(18, 0, '       tidak benar, saya bersedia dituntut di muka pengadilan serta bersedia menerima segala tindakan yang diambil pemerintah.', 0, 1, 'P');

            $pdf->ln(0.5);
            date_default_timezone_set('Asia/Jakarta');
            $date   =   date("d-m-Y");
            $pdf->Cell(32, 1, "Bandung, " . $date, 0, 1, 'C');
            $pdf->ln(2);
            $pdf->Cell(32, 1, $row['nama'], 0, 1, 'C');
            $pdf->ln(-0.5);
            $pdf->Cell(28, 1, 'NPP    :', 0, 0, 'C');
            $pdf->Line(10, 10, 10, 10);
            $pdf->Cell(-23.5, 1, $row['npp'], 0, 1, 'C');
            // End Text Akhir
        }
        $pdf->Output('CV PTPN VIII '. $nama .'.pdf','D');
    }



    function view_cv_admin()
    {

        $npp = $this->uri->segment(3);
        $pdf = new FPDF("P", "cm", "letter");

        // membuat halaman baru
        $pdf->AliasNbPages();
        $pdf->AddPage();
        // End Halaman Baru

        $pdf->ln(0.2);
        $pdf->SetFont('Times', 'B', 25);
        $pdf->Image(base_url() . 'assets_login/images/logo.png', 1.5, 0.8, 2.7, 1.7);
        $pdf->MultiCell(23.5, 0.4, 'PT PERKEBUNAN NUSANTARA VIII', 0, 'C');
        $pdf->ln(0.3);
        $pdf->SetFont('Times', '', 10);
        $pdf->MultiCell(23.5, 0.4, 'Jalan Sindangsirna No. 4 Bandung 40153 - Indonesia, Kotak Pos 1176, Tlp. (62-22) 2038966', 0, 'C');
        $pdf->MultiCell(23.5, 0.4, 'Fax. (62-22) 2031 455, E-mail:ptpb8@pn8.co.id; Webside:http://www.pn8.co.id', 0, 'C');

        //line
        $pdf->ln(0.3);
        $pdf->SetFont('Times', '', 10);
        $pdf->Cell(0, 0, "====================================================================================================", 0, 0, 'C');
        //end Line

        //Judul
        $pdf->ln(0.8);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(20, 0.4, 'DAFTAR RIWAYAT HIDUP', 0, 1, 'C');
        //end Judul

        //Header I
        $pdf->ln(0.7);
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(19.5, 0.4, 'I. DATA PRIBADI', 0, 1);
        //end Header

        $bio = $this->Model_admin->get_bio($npp);
        foreach ($bio AS $row) {
            // Foto
            $profil = $this->Model_admin->get_no_id($row['npp']);
            foreach ($profil AS $p) {
                $pdf->Image(base_url() . 'assets_application/assets/faces/' . $p['image'], 16, 6, 4, 5);
            }

            //Data Probadi
            $pdf->ln(1);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(4.5, 0, '1. No Induk Pegawai', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 0);
            $pdf->Cell(2.3, 0, $row['npp'], 0, 1, 'L'); // memanggil npp
            $pdf->ln(0.1);
            $pdf->Cell(4.5, 1, '2. Nama Lengkap', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 0);
            $pdf->Cell(2.3, 1, $row['nama'], 0, 1, 'L'); // memanggil nama

            $golbaru = $this->Model_admin->get_gol_akhir($row['npp']);
            foreach ($golbaru as $d) {

                $gol = $this->Model_admin->get_gol($d['golongan']);
                foreach ($gol as $y) {
                    $pdf->ln(0.1);
                    $pdf->Cell(4.5, 0, '3. Pangkat/Golongan', 0, 0);
                    $pdf->Cell(1, 0, ':', 0, 0);
                    $pdf->Cell(1.5, 0, $y['gol'], 0, 0, 'L'); // memanggil golongan
                }
                $pdf->Cell(1, 0, '/', 0, 0);
                $pdf->Cell(2.3, 0, $d['mk'], 0, 1, 'L'); // memanggil mk
            }
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 1, '4. Tempat/Tanggal Lahir', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 0);
            $pdf->Cell(2.8, 1, $row['kota_lhr'], 0, 0); // memanggil kota lahir
            $pdf->Cell(1, 1, '/', 0, 0);
            $pdf->Cell(2.3, 1, date('d-m-Y', strtotime($row['tgl_lhr'])), 0, 1, 'L'); // memanggil tgl lahir
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 0, '5. Agama', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 0);
            $agama = $this->Model_admin->get_agama($row['agama']);
            foreach ($agama as $q) {
                if ($q['kd_agama'] < 0) {
                    $pdf->Cell(2.3, 0, '', 0, 1, 'L'); // memanggil agama
                } else {
                    $pdf->Cell(2.3, 0, $q['nm_agama'], 0, 1, 'L'); // memanggil agama
                }
            }
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 1, '6. Alamat Kantor', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 0);
            $alamat = $this->Model_admin->almt($row['npp']);
            foreach ($alamat as $v) {

                $ini = $this->Model_admin->unit($v['kd_unit']);
                foreach ($ini as $p) {
                    $pdf->Cell(2.3, 1, $p['nm_unit'], 0, 1, 'L'); // memanggil alamat kantor
                }
            }
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 0, '7. Alamat Rumah', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 0);
            $pdf->Cell(2.3, 0, $row['alamat_tgl'], 0, 1, 'L'); // memanggil alamat tempat tinggal
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 1, '8. Jenis Kelamin', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 0);
            $jk = $this->Model_admin->get_jenis_kelamin($row['j_kelamin']);
            foreach ($jk as $z) {
                $pdf->Cell(2.3, 1, $z['nm_kelamin'], 0, 1, 'L'); // memanggil jenis kelamin
            }
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 0, '9. Gol Darah', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 0);
            $pdf->Cell(2.3, 0, $row['gol_darah'], 0, 1, 'L'); // memanggil golongan darah
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 1, '10. Status Sipil', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 0);
            $sipil = $this->Model_admin->get_sipil($row['st_sipil']);
            foreach ($sipil as $s) {
                if ($s['kd_sipil'] < 0) {
                    $pdf->Cell(2.3, 1, '', 0, 1, 'L'); // memanggil status sipil
                } else {
                    $pdf->Cell(2.3, 1, $s['nm_sipil'], 0, 1, 'L'); // memanggil status sipil
                }
            }

            // End Data pribadi

            // Data Keluarga
            $pdf->ln(0.2);
            $pdf->Cell(4.5, 0, '11. Susunan Keluarga', 0, 0);
            $pdf->Cell(0.6, 0, ':', 0, 1);
            $pdf->ln(0.5);
            $pdf->SetFont('Times', 'B', 10);
            $pdf->Cell(0.7, 1, 'No', 1, 0, 'C');
            $pdf->Cell(1, 1, 'Foto', 1, 0, 'C');
            $pdf->Cell(5.5, 1, 'Nama', 1, 0, 'C');
            $pdf->Cell(2.9, 1, 'Hubungan', 1, 0, 'C');
            $pdf->Cell(2.5, 1, 'Tempat Lahir', 1, 0, 'C');
            $pdf->Cell(2.5, 1, 'Tanggal Lahir', 1, 0, 'C');
            $pdf->Cell(1.2, 1, 'Umur', 1, 0, 'C');
            $pdf->Cell(1.8, 1, 'Gol Darah', 1, 0, 'C');
            $pdf->Cell(1.5, 1, 'Tk Pend', 1, 1, 'C');
            $pdf->SetFont('Times', '', 9);
            $kel = $this->Model_admin->get_bio_kel($row['npp']);
            foreach ($kel as $v) {
                $pdf->Cell(0.7, 1, $v['no_urut'], 1, 0, 'L'); // memanggil no urut
                $pdf->Cell(1, 1, 'Foto', 1, 0, 'L');
                $pdf->Cell(5.5, 1, $v['nama'], 1, 0, 'L'); // memanggil nama
                $hbg = $this->Model_admin->hubungan($v['hbg_klg']);
                foreach ($hbg as $h) {
                    $pdf->SetFont('Times', '', 8);
                    $pdf->Cell(2.9, 1, $h['nama'], 1, 0, 'L'); // memanggil hubungan keluarga
                }
                $pdf->Cell(2.5, 1, $v['kota_lhr'], 1, 0, 'L'); // memanggil kota lahir
                $pdf->Cell(2.5, 1, date('d-m-Y', strtotime($v['tgl_lhr'])), 1, 0, 'L'); // memanggil tanggal lahir

                $lahir    = new DateTime(date('Y-m-d', strtotime($v['tgl_lhr'])));
                $sekarang = new DateTime(date('Y-m-d'));
                $tgl      = $lahir->diff($sekarang);
                $pdf->Cell(1.2, 1, $tgl->y, 1, 0, 'L'); // menjumlahkan tgl lahir dan tgl sekarang menjadi umur

                $pdf->Cell(1.8, 1, $v['gol_darah'], 1, 0, 'L'); // memanggil golongan darah
                $pdf->Cell(1.5, 1, $v['tk_pend'], 1, 1, 'L'); // memanggil tingakt pendidikan
            }
            // End Data Kluarga

            //line\
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(0, 0, "----------------------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 0, 'C');
            //end Line

            // membuat halaman baru
            $pdf->AliasNbPages();
            $pdf->AddPage();
            // End Halaman Baru

            //line\
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 0, 'C');
            //end Line

            //Header II
            $pdf->ln(0.6);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(19.5, 1, 'II. RIWAYAT PEKERJAAN', 0, 1);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(4.5, 0, 'A. Di Lingkungan PTPN VII', 0, 1);
            //end Header

            // Data Riwayat Pekerjaan
            $pdf->ln(1);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(4, 0, '1.  Tanggal Mulai Kerja', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 0);
            $pdf->Cell(1.5, 0, date('d-m-Y', strtotime($row['tgl_masuk'])), 0, 3, 'L'); // memanggil tangga masuk
            $pdf->ln(0.2);
            $pdf->Cell(4, 1, '2.  Masa Kerja', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 0);
            $sdm16 = $this->Model_admin->get_sdm16_a1($row['npp']);
            $golongan = $sdm16[0]['golongan'];
            $golongan = (int) $golongan;
            if ($golongan >= 0 and $golongan <= 8) {
                $tgl_pen = date('Y-m-d', strtotime('+55 year +1 month', strtotime($row['tgl_lhr'])));
            }
            if ($golongan >= 9 and $golongan <= 16) {
                $tgl_pen = date('Y-m-d', strtotime('+56 year +1 month', strtotime($row['tgl_lhr'])));
            }
            $skrng = date_create($sdm16[0]['tgl_sk']);
            $tgl_pen = date_create($tgl_pen);

            $diff = date_diff($skrng, $tgl_pen);

            if ($diff->y > 56) {
                $pdf->Cell(0.4, 1, '', 0, 3, 'L');
            } else {
                $pdf->Cell(0.4, 1, $diff->y . ' Tahun - ' . $diff->m . ' Bulan', 0, 3, 'L');
            }
            $pdf->ln(0.2);
            $pdf->Cell(4, 0, '3.  Tanggal MBT', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 0);
            $sdm16 = $this->Model_admin->get_sdm16_a1_akhir($row['npp']);
            $golongan = $sdm16[0]['golongan'];
            $golongan = (int) $golongan;
            if ($golongan >= 0 and $golongan <= 8) {
                $tgl_pen = date('Y-m-d', strtotime('+55 year +1 month', strtotime($row['tgl_lhr'])));
                $tgl_mpp = date('Y-m-d', strtotime('-6 month', strtotime($tgl_pen)));

                $pdf->Cell(1.5, 0, date('01-m-Y', strtotime($tgl_mpp)), 0, 3, 'L');
            }
            if ($golongan >= 9 and $golongan <= 16) {
                $tgl_pen = date('Y-m-d', strtotime('+55 year +1 month', strtotime($row['tgl_lhr'])));
                $tgl_mpp = date('Y-m-d', strtotime('-6 month', strtotime($tgl_pen)));

                $pdf->Cell(1.5, 0, date('01-m-Y', strtotime($tgl_mpp)), 0, 3, 'L');
            }

            // end 1-3

            // 4 Data Mutasi
            $pdf->ln(0.2);
            $pdf->Cell(4, 1, '4.  Mutasi Pangkat/Gol', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 1);
            $pdf->ln(0.1);
            $pdf->SetFont('Times', 'B', 10);
            $pdf->Cell(0.7, 1, 'No', 1, 0, 'C');
            $pdf->Cell(5, 1, 'Kenaikan', 1, 0, 'C');
            $pdf->Cell(1.4, 1, 'Gol', 1, 0, 'C');
            $pdf->Cell(2, 1, 'TMT', 1, 0, 'C');
            $pdf->Cell(3.6, 1, 'No SK', 1, 0, 'C');
            $pdf->Cell(2.1, 1, 'Tanggal SK', 1, 0, 'C');
            $pdf->Cell(3.6, 1, 'Pejabat', 1, 1, 'C');
            $pdf->SetFont('Times', '', 9);
            $mutasi = $this->Model_admin->get_mutasi($row['npp']);
            foreach ($mutasi as $key) {
                $pdf->Cell(0.7, 1, $key['no_urut'], 1, 0, 'C'); // memanggil no urut
                $naik = $this->Model_admin->get_naik($key['jns_naik']);
                foreach ($naik as $n) {
                    $pdf->SetFont('Times', '', 8);
                    $pdf->Cell(5, 1, $n['nama'], 1, 0);
                }
                $gol = $this->Model_admin->get_gol($key['golongan']);
                foreach ($gol as $g) {
                    $pdf->SetFont('Times', '', 9);
                    $pdf->Cell(1.4, 1, $g['gol'], 1, 0);
                    $pdf->Cell(-0.7, 1, '', 0, 0);
                    $pdf->Cell(0.7, 1, '/', 0, 0);
                    $pdf->Cell(-0.5, 1, '', 0, 0);
                    $pdf->Cell(1, 1, $key['mk'], 0, 0);
                }
                $pdf->Cell(-0.5, 1, '', 0, 0);
                $pdf->Cell(2, 1, date('d-m-Y', strtotime($key['tmt'])), 1, 0, 'L');
                $pdf->Cell(3.6, 1, $key['no_sk'], 1, 0);
                $pdf->Cell(2.1, 1, date('d-m-Y', strtotime($key['tgl_sk'])), 1, 0, 'L');
                $pdf->Cell(3.6, 1, $key['npp_jbt'], 1, 1, 'L');
            }
            // End Data Mutasi

            // 5 Riwayat Jabatan Struktural
            $pdf->ln(0.2);
            $pdf->Cell(4, 1, '5.  Riwayat Jabatan Struktural', 0, 0);
            $pdf->Cell(1, 1, ':', 0, 1);
            $pdf->ln(0.1);
            $pdf->SetFont('Times', 'B', 10);
            $pdf->Cell(0.7, 1, 'No', 1, 0, 'C');
            $pdf->Cell(5, 1, 'Nama Jabatan', 1, 0, 'C');
            $pdf->Cell(3.2, 1, 'Unit Kerja', 1, 0, 'C');
            $pdf->Cell(1.8, 1, 'TMT', 1, 0, 'C');
            $pdf->Cell(3.8, 1, 'No SK', 1, 0, 'C');
            $pdf->Cell(1.8, 1, 'Tgl SK', 1, 0, 'C');
            $pdf->Cell(2.8, 1, 'Pejabat', 1, 1, 'C');
            $pdf->SetFont('Times', '', 9);
            $rjs = $this->Model_admin->get_sdm08($row['npp']);
            foreach ($rjs as $viv) {
                $pdf->Cell(0.7, 1, $viv['no_urut'], 1, 0, 'C'); // memanggil no urut
                $jab = $this->Model_admin->get_jab($viv['jabatan']);
                foreach ($jab as $j) {
                    $pdf->Cell(5, 1, $j['nama'], 1, 0);
                }
                $unit = $this->Model_admin->unit($viv['kd_unit']);
                foreach ($unit as $u) {
                    $pdf->Cell(3.2, 1, $u['nm_unit'], 1, 0);
                }
                $pdf->Cell(1.8, 1, date('d-m-Y', strtotime($viv['tmt'])), 1, 0, 'L');
                $pdf->Cell(3.8, 1, $viv['no_sk'], 1, 0, 'L');
                $pdf->Cell(1.8, 1, date('d-m-Y', strtotime($viv['tgl_sk'])), 1, 0, 'L');
                $pdf->Cell(2.8, 1, $viv['npp_jbt'], 1, 1, 'C');
            }
            // end Riwayat Jabatan Struktural

            //line\
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 0, 'C');
            //end Line

            //Header III
            $pdf->ln(0.6);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(19.5, 1, 'III. RIWAYAT PENDIDIKAN', 0, 1);
            $pdf->SetFont('Times', '', 10);
            //end Header

            // Pendidikan Formal
            $pdf->Cell(4.5, 0, 'A. Pendidikan Formal', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 1);
            $pdf->ln(0.3);
            $pdf->SetFont('Times', 'B', 9);
            $pdf->Cell(0.7, 1, 'No', 1, 0, 'C');
            $pdf->Cell(2.5, 1, 'Pendidikan', 1, 0, 'C');
            $pdf->Cell(5, 1, 'Nama Sekolah/Lembaga', 1, 0, 'C');
            $pdf->Cell(2, 1, 'Kota', 1, 0, 'C');
            $pdf->Cell(1.7, 1, 'Thn Mulai', 1, 0, 'C');
            $pdf->Cell(1.7, 1, 'Thn Selesai', 1, 0, 'C');
            $pdf->Cell(3.7, 1, 'No Ijasah', 1, 0, 'C');
            $pdf->Cell(2, 1, 'Tgl Ijasah', 1, 1, 'C');
            $pdf->SetFont('Times', '', 9);
            $pend = $this->Model_admin->get_sdm03($row['npp']);
            foreach ($pend as $p) {
                $pdf->Cell(0.7, 1, $p['no_urut'], 1, 0, 'C');
                $tk = $this->Model_admin->get_pddk($p['kd_pend']);
                foreach ($tk as $nm) {
                    $pdf->Cell(2.5, 1, $nm['nama'], 1, 0);
                }
                $pdf->Cell(5, 1, $p['ket'], 1, 0, 'C');
                $pdf->Cell(2, 1, $p['kota'], 1, 0, 'C');
                $pdf->Cell(1.7, 1, $p['thn_awal'], 1, 0, 'C');
                $pdf->Cell(1.7, 1, $p['thn_akhir'], 1, 0, 'C');
                $pdf->Cell(3.7, 1, $p['no_ijasah'], 1, 0, 'C');
                $pdf->Cell(2, 1, $p['tgl_ijasah'], 1, 1, 'C');
            }
            // End Pendidikan Formal

            //line\
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 0, 'C');
            //end Line

            //Header
            $pdf->ln(0.6);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(19.5, 1, 'IV. RIWAYAT PENGEMBANGAN', 0, 1);
            $pdf->SetFont('Times', '', 10);
            //end Header

            // Riwayat Pengembangan
            $pdf->Cell(4.5, 0, 'A. Riwayat Pengembangan', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 1);
            $pdf->ln(0.5);
            $pdf->SetFont('Times', 'B', 9);
            $pdf->Cell(0.7, 1, 'No', 1, 0, 'C');
            $pdf->Cell(3.7, 1, 'Nama Pelatihan', 1, 0, 'C');
            $pdf->Cell(3.5, 1, 'Penyelenggara/ kota', 1, 0, 'C');
            $pdf->Cell(3, 1, 'Lama kagiatan', 1, 0, 'C');
            $pdf->Cell(2.5, 1, 'No Sertifikat', 1, 1, 'C');
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(13.4, 1, 'No data available in table', 1, 1, 'C');
            // End Riwayat Pengembangan

            // Assesment
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(4.5, 0, 'B. Assesment', 0, 0);
            $pdf->Cell(1, 0, ':', 0, 1);
            $pdf->ln(0.5);
            $pdf->SetFont('Times', 'B', 9);
            $pdf->Cell(0.7, 1, 'No', 1, 0, 'C');
            $pdf->Cell(3, 1, 'Pendidikan', 1, 0, 'C');
            $pdf->Cell(3, 1, 'Nama Sekolah', 1, 0, 'C');
            $pdf->Cell(2, 1, 'Kota', 1, 0, 'C');
            $pdf->Cell(2, 1, 'Thn Mulai', 1, 0, 'C');
            $pdf->Cell(2, 1, 'Thn Selesai', 1, 0, 'C');
            $pdf->Cell(2, 1, 'No Ijasah', 1, 0, 'C');
            $pdf->Cell(2.5, 1, 'Tgl Ijasah', 1, 0, 'C');
            $pdf->Cell(2.5, 1, 'No Sertifikat', 1, 1, 'C');
            $pdf->SetFont('Times', '', 9);
            $pdf->Cell(19.7, 1, 'No data available in table', 1, 1, 'C');
            // end Assesment


            //line\
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 0, 'C');
            //end Line

            // membuat halaman baru
            $pdf->AliasNbPages();
            $pdf->AddPage();
            // End Halaman Baru

            //line\
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 0, 'C');
            //end Line

            //Header
            $pdf->ln(0.6);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(19.5, 1, 'V. RIWAYAT HUKUMAN', 0, 1);
            $pdf->SetFont('Times', '', 10);
            //end Header

            // Riwayat Kesalahan
            $pdf->ln(0.2);
            $Y_Fields_Name_position = 3;
            $pdf->SetFont('Times', 'B', 10);
            $pdf->SetY($Y_Fields_Name_position);
            $pdf->SetX(1);
            $pdf->Cell(0.6, 1, 'No', 1, 0, 'C');
            $pdf->SetX(1.6);
            $pdf->Cell(4.1, 1, 'Jenis', 1, 0, 'C');
            $pdf->SetX(5.7);
            $pdf->Cell(6.1, 1, 'Sanksi', 1, 0, 'C');
            $pdf->SetX(11.8);
            $pdf->Cell(1.8, 1, 'Kasus Kbn', 1, 0, 'C');
            $pdf->SetX(13.6);
            $pdf->Cell(3.3, 1, 'No Surat', 1, 0, 'C');
            $pdf->SetX(16.9);
            $pdf->Cell(2, 1, 'Tgl Surat', 1, 0, 'C');
            $pdf->SetX(18.9);
            $pdf->Cell(2.2, 1, 'Berlaku', 1, 1, 'C');
            $pdf->ln(0.2);
            $Y_Table_Position = 4;

            $pdf->SetFont('Times', '', 9);
            $hkm = $this->Model_admin->get_sdm14($row['npp']);
            foreach ($hkm as $hkm) {
                $pdf->SetY($Y_Table_Position);
                $pdf->SetX(1);
                $pdf->MultiCell(0.6, 1, $hkm['no_urut'], 1, 'L'); // NO
                $pdf->SetY($Y_Table_Position);
                $pdf->SetX(1.6);
                $pdf->MultiCell(4.1, 1, $hkm['jns_hukum'], 1, 'L'); // JENIS
                $pdf->SetY($Y_Table_Position);
                $pdf->SetX(5.7);
                $pdf->MultiCell(6.1, 1, $hkm['uraian'], 1, 'L'); // SANKSI
                $pdf->SetY($Y_Table_Position);
                $pdf->SetX(11.8);
                $pdf->MultiCell(1.8, 1, '', 1, 'L'); // KASUS KEBUN
                $pdf->SetY($Y_Table_Position);
                $pdf->SetX(13.6);
                $pdf->MultiCell(3.3, 1, $hkm['no_sk'], 1, 'L'); // NO SURAT
                $pdf->SetY($Y_Table_Position);
                $pdf->SetX(16.9);
                $pdf->MultiCell(2, 1, $hkm['tgl_sk'], 1, 'L'); // TANGGAL SURAT
                $pdf->SetY($Y_Table_Position);
                $pdf->SetX(18.9);
                $pdf->MultiCell(2.2, 1, date('d-m-Y', strtotime($hkm['masa_berlaku'])), 1, 'L');
                $pdf->ln(4);
            }
            // End Riwayat Kesalahan

            //line\
            $pdf->ln(8);
            $pdf->SetFont('Times', '', 10);
            $pdf->Cell(0, 0, "-----------------------------------------------------------------------------------------------------------------------------------------------------------------", 0, 0, 'C');
            //end Line

            // Text Akhir
            $pdf->ln(0.5);
            $pdf->SetFont('Times', '', 10);
            $pdf->ln(0.5);
            $pdf->Cell(18, 0, '           Demikian Daftar Riwayat Hidup ini saya buat dengan sesungguhnya dan apabila di kemudian hari terdapat keterangan yang', 0, 1, 'P');
            $pdf->ln(0.5);
            $pdf->Cell(18, 0, '       tidak benar, saya bersedia dituntut di muka pengadilan serta bersedia menerima segala tindakan yang diambil pemerintah.', 0, 1, 'P');

            $pdf->ln(0.5);
            date_default_timezone_set('Asia/Jakarta');
            $date   =   date("d-m-Y");
            $pdf->Cell(32, 1, "Bandung, " . $date, 0, 1, 'C');
            $pdf->ln(2);
            $pdf->Cell(32, 1, $row['nama'], 0, 1, 'C');
            $pdf->ln(-0.5);
            $pdf->Cell(28, 1, 'NPP:', 0, 0, 'C');
            $pdf->Cell(-23.5, 1, $row['npp'], 0, 1, 'C');

            // End Text Akhir

            $pdf->Output('CV PTPN VIII '.$npp.'.pdf','D');
        }
    }
}
