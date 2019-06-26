<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ExcelA1 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Model_admin');
    }

    public function in_admin()
    {
        $this->load->view('admin/in_admin');
    }

    public function export()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();

        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("mY");

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Admin PTPN VIII (' .$this->session->userdata('status_login'). ')')
            ->setLastModifiedBy('Admin PTPN VIII (' .$this->session->userdata('status_login'). ')')
            ->setTitle("Data A1" .$date)
            ->setSubject("A1" .$date)
            ->setDescription("Laporan Data A1" .$date)
            ->setKeywords("Data A1" .$date);

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        // Buat header tabel nya pada baris ke 1
        $excel->setActiveSheetIndex(0)->setCellValue('A1', "NPP");
        $excel->setActiveSheetIndex(0)->setCellValue('B1', "NAMA");
        $excel->setActiveSheetIndex(0)->setCellValue('C1', "NM_PGL");
        $excel->setActiveSheetIndex(0)->setCellValue('D1', "GLR_DPN");
        $excel->setActiveSheetIndex(0)->setCellValue('E1', "GLR_BLK");
        $excel->setActiveSheetIndex(0)->setCellValue('F1', "TPT_LAHIR");
        $excel->setActiveSheetIndex(0)->setCellValue('G1', "TGL_LAHIR");
        $excel->setActiveSheetIndex(0)->setCellValue('H1', "KELAMIN");
        $excel->setActiveSheetIndex(0)->setCellValue('I1', "GOL_DARAH");
        $excel->setActiveSheetIndex(0)->setCellValue('J1', "AGAMA");
        $excel->setActiveSheetIndex(0)->setCellValue('K1', "ALAMAT");
        $excel->setActiveSheetIndex(0)->setCellValue('L1', "KOTA");
        $excel->setActiveSheetIndex(0)->setCellValue('M1', "TINGGAL");
        $excel->setActiveSheetIndex(0)->setCellValue('N1', "SIPIL");
        $excel->setActiveSheetIndex(0)->setCellValue('O1', "STAT_IS");
        $excel->setActiveSheetIndex(0)->setCellValue('P1', "TGL_NIKAH");
        $excel->setActiveSheetIndex(0)->setCellValue('Q1', "TGL_CERAI");
        $excel->setActiveSheetIndex(0)->setCellValue('R1', "KANDUNG");
        $excel->setActiveSheetIndex(0)->setCellValue('S1', "ANGKAT");
        $excel->setActiveSheetIndex(0)->setCellValue('T1', "TANGGUNG");
        $excel->setActiveSheetIndex(0)->setCellValue('U1', "TGL_PPH");
        $excel->setActiveSheetIndex(0)->setCellValue('V1', "KD_PEND");
        $excel->setActiveSheetIndex(0)->setCellValue('W1', "TGL_SK");
        $excel->setActiveSheetIndex(0)->setCellValue('X1', "NO_SK");
        $excel->setActiveSheetIndex(0)->setCellValue('Y1', "KD_KELAS");
        $excel->setActiveSheetIndex(0)->setCellValue('Z1', "KLS_TMT");
        $excel->setActiveSheetIndex(0)->setCellValue('AA1', "KLS_SK");
        $excel->setActiveSheetIndex(0)->setCellValue('AB1', "GOL");
        $excel->setActiveSheetIndex(0)->setCellValue('AC1', "MK");
        $excel->setActiveSheetIndex(0)->setCellValue('AD1', "GOL_TMT");
        $excel->setActiveSheetIndex(0)->setCellValue('AE1', "GOL_SK");
        $excel->setActiveSheetIndex(0)->setCellValue('AF1', "GPO");
        $excel->setActiveSheetIndex(0)->setCellValue('AG1', "KD_KBN");
        $excel->setActiveSheetIndex(0)->setCellValue('AH1', "KD_ADF");
        $excel->setActiveSheetIndex(0)->setCellValue('AI1', "KD_JAB");
        $excel->setActiveSheetIndex(0)->setCellValue('AJ1', "NAMA_JAB");
        $excel->setActiveSheetIndex(0)->setCellValue('AK1', "KD_BUD");
        $excel->setActiveSheetIndex(0)->setCellValue('AL1', "JAB_TMT");
        $excel->setActiveSheetIndex(0)->setCellValue('AM1', "JAB_SK");
        $excel->setActiveSheetIndex(0)->setCellValue('AN1', "JAB_TGL");
        $excel->setActiveSheetIndex(0)->setCellValue('AO1', "ASTEK");
        $excel->setActiveSheetIndex(0)->setCellValue('AP1', "TASPEN");
        $excel->setActiveSheetIndex(0)->setCellValue('AQ1', "NO_KK");
        $excel->setActiveSheetIndex(0)->setCellValue('AR1', "NO_NIK");
        $excel->setActiveSheetIndex(0)->setCellValue('AS1', "NO_BPJS");
        $excel->setActiveSheetIndex(0)->setCellValue('AT1', "TGL_MPP");
        $excel->setActiveSheetIndex(0)->setCellValue('AU1', "TGL_PEN");
        $excel->setActiveSheetIndex(0)->setCellValue('AV1', "MKTHN");
        $excel->setActiveSheetIndex(0)->setCellValue('AW1', "MKBLN");
        $excel->setActiveSheetIndex(0)->setCellValue('AX1', "MKHR");
        $excel->setActiveSheetIndex(0)->setCellValue('AY1', "MPP");
        $excel->setActiveSheetIndex(0)->setCellValue('AZ1', "STAT_REC");

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('N1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('O1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
        $excel->getActiveSheet()->getStyle('Q1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_DDMMYYYY);
        $excel->getActiveSheet()->getStyle('R1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('S1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('T1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('U1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('V1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('W1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('X1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('Y1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('Z1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AA1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AB1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AC1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AD1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AE1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AF1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AG1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AH1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AI1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AJ1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AK1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AL1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AM1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AN1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AO1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AP1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AQ1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AR1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AS1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AT1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AU1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AV1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AW1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AX1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AY1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
        $excel->getActiveSheet()->getStyle('AZ1')->applyFromArray($style_col)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);

        // Menampilkan semua data dari tabel rekao A1
        $numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
        $sdm01    =    $this->Model_admin->tampil_a1();
        foreach ($sdm01->result_array() as $i) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('A' . $numrow, $i['npp'], PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $i['nama']);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $i['nm_pgl']);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $i['glr_dpn']);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $i['glr_blk']);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $i['kota_lhr']);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, date('d-m-Y', strtotime($i['tgl_lhr'])));
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $i['j_kelamin']);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $i['gol_darah']);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $i['agama']);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $i['alamat_tgl']);
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, '');
            $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, '1');
            $excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $i['st_sipil']);

            $sdm02 = $this->Model_admin->get_sdm02_a1($i['npp']);
            foreach ($sdm02 as $a) {

                $excel->setActiveSheetIndex(0)->setCellValue('O' . $numrow, '');
                $excel->setActiveSheetIndex(0)->setCellValue('P' . $numrow, date('d-m-Y', strtotime($a['tgl_nkh'])));
                $excel->setActiveSheetIndex(0)->setCellValue('Q' . $numrow, date('d-m-Y', strtotime($a['tgl_cerai'])));
            }

            $sdm02 = $this->Model_admin->get_sdm02_a1_anak($i['npp']);
            foreach ($sdm02 as $b) {
                $excel->setActiveSheetIndex(0)->setCellValue('R' . $numrow, '');
                $excel->setActiveSheetIndex(0)->setCellValue('S' . $numrow, '');
                $excel->setActiveSheetIndex(0)->setCellValue('T' . $numrow, $b['tanggungan']);
                $excel->setActiveSheetIndex(0)->setCellValue('U' . $numrow, '');
            }

            $sdm03 = $this->Model_admin->get_sdm03_a1($i['npp']);
            foreach ($sdm03 as $c) {
                $excel->setActiveSheetIndex(0)->setCellValueExplicit('V' . $numrow, $c['kd_pend'], PHPExcel_Cell_DataType::TYPE_STRING);
            }

            $excel->setActiveSheetIndex(0)->setCellValue('W' . $numrow, date('d-m-Y', strtotime($i['tgl_masuk'])));

            $sdm08 = $this->Model_admin->get_sdm08_a1($i['npp']);
            foreach ($sdm08 as $d) {

                $excel->setActiveSheetIndex(0)->setCellValue('X' . $numrow, $d['no_sk']);
            }

            $sdm16 = $this->Model_admin->get_sdm16_a1($i['npp']);
            foreach ($sdm16 as $e) {
                $excel->setActiveSheetIndex(0)->setCellValue('Y' . $numrow, $e['kd_kelas']);
                $excel->setActiveSheetIndex(0)->setCellValue('Z' . $numrow, date('d-m-Y', strtotime($e['kls_tmt'])));
                $excel->setActiveSheetIndex(0)->setCellValue('AA' . $numrow, $e['kls_sk']);
            }

            $sdm16 = $this->Model_admin->get_sdm16_a1_akhir($i['npp']);
            foreach ($sdm16 as $a) {
                $excel->setActiveSheetIndex(0)->setCellValueExplicit('AB' . $numrow, $a['golongan'], PHPExcel_Cell_DataType::TYPE_STRING);
                $excel->setActiveSheetIndex(0)->setCellValueExplicit('AC' . $numrow, $a['mk'], PHPExcel_Cell_DataType::TYPE_STRING);
                $excel->setActiveSheetIndex(0)->setCellValue('AD' . $numrow, date('d-m-Y', strtotime($a['gol_tmt'])));
                $excel->setActiveSheetIndex(0)->setCellValue('AE' . $numrow, $a['gol_sk']);
                $excel->setActiveSheetIndex(0)->setCellValue('AF' . $numrow, '');
            }

            $sdm08 = $this->Model_admin->get_sdm08_a1_akhir($i['npp']);
            foreach ($sdm08 as $a) {
                $excel->setActiveSheetIndex(0)->setCellValueExplicit('AG' . $numrow, $a['kd_kbn'], PHPExcel_Cell_DataType::TYPE_STRING);
                $excel->setActiveSheetIndex(0)->setCellValueExplicit('AH' . $numrow, $a['kd_adf'], PHPExcel_Cell_DataType::TYPE_STRING);
                $excel->setActiveSheetIndex(0)->setCellValueExplicit('AI' . $numrow, $a['kd_jab'], PHPExcel_Cell_DataType::TYPE_STRING);

                $jab = $this->Model_admin->get_jabatan($a['kd_jab']);
                foreach ($jab as $jab) {
                    $excel->setActiveSheetIndex(0)->setCellValue('AJ' . $numrow, $jab['nama']);
                }

                $excel->setActiveSheetIndex(0)->setCellValueExplicit('AK' . $numrow, $a['kd_bud'], PHPExcel_Cell_DataType::TYPE_STRING);
                $excel->setActiveSheetIndex(0)->setCellValue('AL' . $numrow, date('d-m-Y', strtotime($a['jab_tmt'])));
                $excel->setActiveSheetIndex(0)->setCellValue('AM' . $numrow, $a['jab_sk']);
                $excel->setActiveSheetIndex(0)->setCellValue('AN' . $numrow, date('d-m-Y', strtotime($a['jab_tgl'])));
            }


            $excel->setActiveSheetIndex(0)->setCellValueExplicit('AO' . $numrow, $i['no_astek'], PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('AP' . $numrow, $i['no_pens'], PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('AQ' . $numrow, $i['no_kk'], PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('AR' . $numrow, $i['no_nik'], PHPExcel_Cell_DataType::TYPE_STRING);
            $excel->setActiveSheetIndex(0)->setCellValueExplicit('AS' . $numrow, $i['no_bpjs'], PHPExcel_Cell_DataType::TYPE_STRING);

            $sdm16 = $this->Model_admin->get_sdm16_a1_akhir($i['npp']);
            $golongan = $sdm16[0]['golongan'];
            $golongan = (int)$golongan;
            if ($golongan >= 0 and $golongan <= 8) {
                $tgl_pen = date('Y-m-d', strtotime('+55 year +1 month', strtotime($i['tgl_lhr'])));
                $tgl_mpp = date('Y-m-d', strtotime('-6 month', strtotime($tgl_pen)));
                $excel->setActiveSheetIndex(0)->setCellValue('AT' . $numrow, date('01-m-Y', strtotime($tgl_mpp)));
                $excel->setActiveSheetIndex(0)->setCellValue('AU' . $numrow, date('01-m-Y', strtotime($tgl_pen)));
            }
            if ($golongan >= 9 and $golongan <= 16) {
                $tgl_pen = date('Y-m-d', strtotime('+56 year +1 month', strtotime($i['tgl_lhr'])));
                $tgl_mpp = date('Y-m-d', strtotime('-6 month', strtotime($tgl_pen)));
                $excel->setActiveSheetIndex(0)->setCellValue('AT' . $numrow, date('01-m-Y', strtotime($tgl_mpp)));
                $excel->setActiveSheetIndex(0)->setCellValue('AU' . $numrow, date('01-m-Y', strtotime($tgl_pen)));
            }

            $sdm01 = $this->Model_admin->tampil_a1($i['npp'])->result_array();
            $skrng = date_create($sdm01[0]['tgl_masuk']);
            $tgl_pen = date_create($tgl_pen);

            $diff = date_diff($skrng, $tgl_pen);

            if ($diff->y > 57) {
                $excel->setActiveSheetIndex(0)->setCellValue('AV' . $numrow, '');
                $excel->setActiveSheetIndex(0)->setCellValue('AW' . $numrow, '');
                $excel->setActiveSheetIndex(0)->setCellValue('AX' . $numrow, '');
                $excel->setActiveSheetIndex(0)->setCellValue('AY' . $numrow, '');
                $excel->setActiveSheetIndex(0)->setCellValue('AZ' . $numrow, '');
            } else {
                $excel->setActiveSheetIndex(0)->setCellValue('AV' . $numrow, $diff->y);
                $excel->setActiveSheetIndex(0)->setCellValue('AW' . $numrow, $diff->m);
                $excel->setActiveSheetIndex(0)->setCellValue('AX' . $numrow, $diff->d);
                $excel->setActiveSheetIndex(0)->setCellValue('AY' . $numrow, '');
                $excel->setActiveSheetIndex(0)->setCellValue('AZ' . $numrow, '');
            }

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
            $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('N' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('O' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('P' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('Q' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('R' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('S' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('T' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('U' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('V' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('W' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('X' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('Y' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('Z' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AA' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AB' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AC' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AD' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AE' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AF' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AG' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AH' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AI' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AJ' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AK' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AL' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AM' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AN' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AO' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AP' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AQ' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AR' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AS' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AT' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AU' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AV' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AW' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AX' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AY' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
            $excel->getActiveSheet()->getStyle('AZ' . $numrow)->applyFromArray($style_row)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);

            $numrow++; // Tambah 1 setiap kali looping
        }


        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(50);
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('P')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('R')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('S')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('T')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('U')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('V')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('W')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('X')->setWidth(25);
        $excel->getActiveSheet()->getColumnDimension('Y')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('Z')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('AA')->setWidth(25);
        $excel->getActiveSheet()->getColumnDimension('AB')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('AC')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('AD')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('AE')->setWidth(25);
        $excel->getActiveSheet()->getColumnDimension('AF')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('AG')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('AH')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('AI')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('AJ')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('AK')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('AL')->setWidth(25);
        $excel->getActiveSheet()->getColumnDimension('AM')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('AN')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('AO')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('AP')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('AQ')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('AR')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('AS')->setWidth(15);
        $excel->getActiveSheet()->getColumnDimension('AT')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('AU')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('AV')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('AW')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('AX')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('AY')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('AZ')->setWidth(5);

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        date_default_timezone_set('Asia/Jakarta');
        $date   =   date("mY");

        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("Data A1");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="Data A1' . $date . '.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        header('Content-Transfer-Encoding: binary');
        header('Accept-Ranges: bytes');
        header('Cache-control: no-cache, pre-check=0, post-check=0');
        header('Cache-control: private');
        header('Pragma: private');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // any date in the past

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }
}
