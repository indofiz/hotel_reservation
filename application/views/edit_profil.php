
<div class="section__content section__content--p30 m-t-75">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-t-30">
                <div class="card">
                    <div class="card-header">
                        <strong>Edit Profil</strong>
                        <small class="ruangan"></small>
                    </div>


                    <!-- Form -->
                    <?php echo form_open_multipart('admin/edit');?>
                        <div class="card-body card-block row">                     
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                            <div class="form-group col-sm-8">
                                <label for="username" class=" form-control-label">Username</label>
                                <input type="username" id="username" class="form-control text-inp" name="username" readonly="" value="<?= $user['username']; ?>">
                            </div>
                            <div class="form-group col-sm-8">
                                <div class="row">
                                    <div class="col">
                                        <label>Picture</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('assets/images/profile/' . $user['image']);  ?>" class="img-thumbnail">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                          <input type="file" class="custom-file-input" id="image" name="image">
                                          <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </div>     
                                </div>
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