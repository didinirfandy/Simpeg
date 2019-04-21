<?php foreach ($ptg->result_array() as $i) { ?>
<div class="modal fade" id="edit<?php echo $i['id']?>" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>EDIT</h5>
                <?php echo form_open('su_admin/edit_karyawan'); ?>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-4 col-xs-12">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-support"></i>
                            </div>
                            <div class="nk-int-st">
                                <input type="text" class="form-control" value="<?php echo $i['nama'] ?>" placeholder="Full Name" name="nama" required pattern="[A-Za-z\s]{1,20}" title="Harus Menggunakan Huruf(1-20)">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group ic-cmp-int">
                            <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-phone"></i>
                            </div>
                            <div class="nk-int-st">
                                <input type="text" class="form-control" value="<?php echo $i['tlp'] ?>" placeholder="Contact Number" name="tlp" pattern="[0-9]{1,12}" title="Harus Menggunakan Angka(1-20)" required >
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-support"></i>
                            </div>
                            <div class="nk-int-st">
                                <input type="text" class="form-control" value="<?php echo $i['username'] ?>" placeholder="username" name="username" required pattern="[a-z]{1,20}" title="Harus Menggunakan Huruf(1-20)">
                            </div>
                        </div>
                    </div>
                </div>
                                
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-map"></i>
                            </div>
                            <div class="nk-int-st">
                                <input type="text" class="form-control" value="<?php echo $i['alamat'] ?>" placeholder="Location" name="alamat" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="form-group ic-cmp-int">
                            <div class="form-ic-cmp">
                                <i class="notika-icon notika-mail"></i>
                            </div>
                            <div class="nk-int-st">
                                <input type="email" class="form-control" value="<?php echo $i['email'] ?>" placeholder="Email Address" name="email" required>
                            </div>
                        </div>
                    </div>
                </div> 
            
            <div class="modal-footer">
                
                <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button class="btn btn-success" type="submit" name="submit">Save</button>
                <?php echo form_close(); ?>  
            </div> 
            </div>
        </div>
    </div> 
</div>
<?php } ?>