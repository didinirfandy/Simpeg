<!-- Modal Tabel sdm01 -->
<div class="modal fade" id="up" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Data SDM 01</h4>
            </div>
            <div class="modal-body">
                <table id="data-table-basic" class="table table-striped">
                    <thead>
                    <tr>
                        <th>NPP</th>
                        <th>NAMA</th>
                        <th>NAMA PANGGILAN</th>
                        <th>GELAR DEPAN</th>
                        <th>GELAR BELAKANG</th>
                        <th>KOTA LAHIR</th>
                        <th>PROVINSI LAHIR</th>
                        <th>NEGARA LAHIR</th>
                        <th>TANGGAL LAHIR</th>
                        <th>JENIS KELAMIN</th>
                        <th>GOLONGAN DARAH</th>
                        <th>AGAMA</th>
                        <th>TANGGAL MASUK</th>
                        <th>STATUS SIPIL</th>
                        <th>JUMLAH ANAK</th>
                        <th>NO ASTEK</th>
                        <th>NO PENS</th>
                        <th>NPWP</th>
                        <th>ALAMAT TINGGAL</th>
                        <th>KODE LOKASI</th>
                        <th>KODE POS</th>
                        <th>NO TELP</th>
                        <th>NO NIK</th>
                        <th>NO KK</th>
                        <th>NO BPJS</th>
                        <th>USER ID</th>
                        <th>BULAN PROSES</th>
                        <th>TINGGAL</th>
                        <th>KETERANGAN</th>
                        <th>TANGGAL PEN</th>
                        <th>NO SK PEN</th>
                        <th>TANGGAL SK PEN</th>
                        <th>JENIS PEN</th>
                        <th>STAT REC</th>
                        <th>TANGGAL</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($tsdm01->result_array() as $a): ?>
                        <tr id="data" onClick="input_from(this,'<?php echo $a['npp'] ?>',
                        '<?php echo $a['nama'] ?>',
                        '<?php echo $a['nm_pgl'] ?>',
                        '<?php echo $a['glr_dpn'] ?>',
                        '<?php echo $a['glr_blk'] ?>',
                        '<?php echo $a['kota_lhr'] ?>',
                        '<?php echo $a['prov_lhr']?>',
                        '<?php echo $a['ngr_lhr']?>',
                        '<?php echo $a['tgl_lhr']?>',
                        '<?php echo $a['j_kelamin']?>',
                        '<?php echo $a['gol_darah']?>',
                        '<?php echo $a['agama']?>',
                        '<?php echo $a['tgl_masuk']?>',
                        '<?php echo $a['st_sipil']?>',
                        '<?php echo $a['jmlh_ank']?>',
                        '<?php echo $a['no_astek']?>',
                        '<?php echo $a['no_pens']?>',
                        '<?php echo $a['npwp']?>',
                        '<?php echo $a['alamat_tgl']?>',
                        '<?php echo $a['kd_lokasi']?>',
                        '<?php echo $a['kode_pos']?>',
                        '<?php echo $a['no_telp']?>',
                        '<?php echo $a['no_nik']?>',
                        '<?php echo $a['no_kk']?>',
                        '<?php echo $a['no_bpjs']?>',
                        '<?php echo $a['user_id']?>',
                        '<?php echo $a['bln_proses']?>',
                        '<?php echo $a['tinggal']?>',
                        '<?php echo $a['ket']?>',
                        '<?php echo $a['tglpen']?>',
                        '<?php echo $a['noskpen']?>',
                        '<?php echo $a['tglskpen']?>',
                        '<?php echo $a['jns_pen']?>',
                        '<?php echo $a['stat_rec']?>',
                        '<?php echo $a['tgl']?>')">
                            <td><?php echo $a['npp'] ?></td>
                            <td><?php echo $a['nama'] ?></td>
                            <td><?php echo $a['nm_pgl'] ?></td>
                            <td><?php echo $a['glr_dpn'] ?></td>
                            <td><?php echo $a['glr_blk'] ?></td>
                            <td><?php echo $a['kota_lhr'] ?></td>
                            <td><?php echo $a['prov_lhr'] ?></td>
                            <td><?php echo $a['ngr_lhr'] ?></td>
                            <td><?php echo $a['tgl_lhr'] ?></td>
                            <td><?php echo $a['j_kelamin'] ?></td>
                            <td><?php echo $a['gol_darah'] ?></td>
                            <td><?php echo $a['agama'] ?></td>
                            <td><?php echo $a['tgl_masuk'] ?></td>
                            <td><?php echo $a['st_sipil'] ?></td>
                            <td><?php echo $a['jmlh_ank'] ?></td>
                            <td><?php echo $a['no_astek'] ?></td>
                            <td><?php echo $a['no_pens'] ?></td>
                            <td><?php echo $a['npwp'] ?></td>
                            <td><?php echo $a['alamat_tgl'] ?></td>
                            <td><?php echo $a['kd_lokasi'] ?></td>
                            <td><?php echo $a['kode_pos'] ?></td>
                            <td><?php echo $a['no_telp'] ?></td>
                            <td><?php echo $a['no_nik'] ?></td>
                            <td><?php echo $a['no_kk'] ?></td>
                            <td><?php echo $a['no_bpjs'] ?></td>
                            <td><?php echo $a['user_id'] ?></td>
                            <td><?php echo $a['bln_proses'] ?></td>
                            <td><?php echo $a['tinggal'] ?></td>
                            <td><?php echo $a['ket'] ?></td>
                            <td><?php echo $a['tglpen'] ?></td>
                            <td><?php echo $a['noskpen'] ?></td>
                            <td><?php echo $a['tglskpen'] ?></td>
                            <td><?php echo $a['jns_pen'] ?></td>
                            <td><?php echo $a['stat_rec'] ?></td>
                            <td><?php echo $a['tgl'] ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Tabel sdm01 -->