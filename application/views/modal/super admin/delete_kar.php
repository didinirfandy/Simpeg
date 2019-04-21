<?php foreach ($ptg->result_array() as $i) { ?>
<div class="modal fade" id="delete<?php echo $i['id']?>" role="dialog">
    <div class="modal-dialog modals-default nk-red">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-title"></div>
                <div class="modal-body" >
                <?php if($i['valid']==1) {?>
                <font color="red">  
                    Apakah Anda Akan Menonaktifkan Petugas <?php echo $i['username'] ?> ???
                <?php }else{?>
                    <font color="red">  
                    Apakah Anda Akan Mengaktifkan Petugas <?php echo $i['username'] ?> ???
                <?php } ?>
                    <?php echo form_open('su_admin/delete') ?>
                </font>
                    <input type="hidden" value="<?php echo $i['id'] ?>" name="id">
                    <input type="hidden" value="<?php echo $i['valid'] ?>" name="valid">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button class="btn btn-danger" type="submit" name="submit">Ok</button>
                <?php echo form_close(); ?>
            </div>
        </div> <!-- / .modal-content -->
    </div> 
</div><!-- / .modal-dialog -->
<?php } ?>
