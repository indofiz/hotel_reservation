
<div class="section__content section__content--p30 m-t-75">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-t-30">
                <div class="card">
                    <div class="card-header">
                        <strong>Ubah Password</strong>
                        <small class="ruangan"></small>
                    </div>


                    <!-- Form -->
                    <form action="<?php echo base_url('admin/change_password'); ?>" method="post">
                        <div class="card-body card-block row">                     
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                            <div class="form-group col-sm-8">
                                <label for="password_lama" class=" form-control-label">Password Lama</label>
                                <input type="password" id="password_lama" class="form-control text-inp" name="password">
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group col-sm-8">
                                <label for="password_baru" class=" form-control-label">Password Baru</label>
                                <input type="password" id="password_baru" class="form-control text-inp" name="password_baru">
                                <?= form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group col-sm-8">
                                <label for="konfirmasi_password_baru" class=" form-control-label">Konfirmasi Password Baru</label>
                                <input type="password" id="konfirmasi_password_baru" class="form-control text-inp" name="konfirmasi_password_baru">
                                <?= form_error('konfirmasi_password_baru', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        
                        <!-- Form End -->

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-md">
                                <i class="fa fa-dot-circle-o"></i> Proses
                            </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>