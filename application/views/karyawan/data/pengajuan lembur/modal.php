<!-- The Modal -->
<div class="modal hide fade" id="data_kar" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="tile">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th width="1%">No</th>
                                <th width="3%">NPP</th>
                                <th width="10%">Nama Karyawan</th>
                                <th width="10%">Jabatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($staf as $s) { ?>
                                <tr id="data" type="checkbox" onclick="get(this,'<?= $s['npp'] ?>','<?= $s['nm_sdm01'] ?>','<?= $s['nama'] ?>','<?= $s['kd_menu'] ?>')">
                                    <td><?= $no++ ?></td>
                                    <td><?= $s['npp'] ?></td>
                                    <td><?= $s['nm_sdm01'] ?></td>
                                    <td><?= $s['nama'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th width="1%">No</th>
                                <th width="3%">NPP</th>
                                <th width="10%">Nama Karyawan</th>
                                <th width="10%">Jabatan</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>