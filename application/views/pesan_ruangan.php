
<div class="section__content section__content--p30 m-t-75">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-t-30">
                <div class="card">
                <form action="<?php echo base_url('pesan_ruangan/addRoom') ;?>" method="post">
                    <div class="card-header">
                        <strong>Pesan Ruangan</strong>
                        <small class="ruangan"></small>
                    </div>

                    <!-- Form -->
                    <div class="card-body card-block row">
                        <div class="col-md-6 col-md-offset-3 mx-auto">
                        <?= $this->session->flashdata('message'); ?>
                        
                        <div class="form-group">
                            <label for="nama" class="form-control-label">Nama Lengkap<span id="nama_error" class="text-danger"></span></label>
                            <input type="text" id="nama" class="form-control text-inp" name="nama" value="<?php echo set_value('nama'); ?>">
                            <span id="ruangan_error" class="text-danger"><?= form_error('nama');?></span>
                            
                        </div>
                        <div class="form-group">
                            <label for="telpon" class=" form-control-label">Nomor Telpon</label>
                            <input type="text" id="telpon" class="form-control text-inp" name="telpon" value="<?php echo set_value('telpon'); ?>">
                            <span id="ruangan_error" class="text-danger"><?= form_error('telpon');?></span>

                        </div>
                        <div class="m-t-10 row">
                            <div class="rs-select2--dark rs-select2--md col-sm-4">
                                <label for="telpon" class=" form-control-label">Lantai</label>

                                <select class="js-select2" name="lantai" id="lantai">
                                    <option value="">---</option>
                                    <?php
                                    foreach($lantai_list as $lantai)
                                    {
                                     echo '<option value="'.$lantai->id.'" ';
                                     echo set_value('lantai') == $lantai->id ? "selected" : null;
                                     echo '>';
                                     echo $lantai->lantai_label.'</option>';
                                    }
                                    ?>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--dark rs-select2--md col-sm-4">
                                <label for="ruangan2" class=" form-control-label">Ruang</label>

                                <select class="js-select2" name="ruangan2" id="ruangan2">
                                    <option value="">---</option>
                                    <?php
                                    foreach($room as $row)
                                    {
                                        if ($row->status != $row->max_people) {
                                         echo '<option value="'.$row->number.'" ';
                                         echo set_value('ruangan2') == $row->number ? "selected" : null;
                                         echo '>';
                                         echo $row->number.'</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--dark rs-select2--md col-sm-4">
                                <label for="orang" class=" form-control-label">Orang</label>

                                <select class="js-select2" name="orang" id="orang">
                                    <option value="" selected="selected">---</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                                <span id="orang_error" class="text-danger"></span>
                            </div>
                            <div class="col-sm-12">
                                <span id="ruangan_error" class="text-danger"><?= form_error('ruangan2');?></span>
                                <span id="ruangan_error" class="text-danger"><?= form_error('lantai');?></span>
                                <span id="ruangan_error" class="text-danger"><?= form_error('orang');?></span>  
                            </div>

                        </div>

                        <div class="row m-t-20">
                        <div class="m-t-10 col-md-6">
                            <div class="rs-select2--dark rs-select2--md">
                                <label for="type" class=" form-control-label">Type</label>

                                <select class="js-select2" name="type" id="type">
                                    <?php
                                    foreach($guest_type as $guest)
                                    {

                                     echo '<option value="'.$guest->id.'" ';
                                     echo set_value('type') == $guest->id ? "selected" : null;
                                     echo '>';
                                     echo $guest->category.'</option>';
                                    }
                                    ?>
                                </select>
                                <div class="dropDownSelect2"></div>
                                
                            </div>
                            
                        </div>


                        <div class="m-t-10 col-md-6" id="load-harga">
                            <label for="harga" class=" form-control-label">Harga</label>
                            <div class="input-group">
                                
                                <div class="input-group-addon">
                                    Rp.
                                </div>
                                <input type="text" id="harga" name="harga" placeholder="0" value="<?php echo set_value('harga'); ?>" class="form-control" data-harga="">

                                <span id="ruangan_error" class="text-danger"><?= form_error('harga');?></span>
                            </div>
                        </div>
                                <span id="ruangan_error" class="text-danger"><?= form_error('type');?></span>   
                        
                        </div>
                        <div class="form-group m-t-20">
                            <label for="ruangan" class=" form-control-label">Check In</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" id="txtCheckin" placeholder="dd-M-yy" class="form-control" name="check_in" value="<?php echo set_value('check_in'); ?>">
                                
                            </div>
                                <span id="ruangan_error" class="text-danger"><?= form_error('check_in');?></span>  
                            
                        </div>
                        <div class="form-group m-t-10">
                            <label for="ruangan" class=" form-control-label">Check Out</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" id="txtCheckout" placeholder="dd-M-yy" class="form-control" name="check_out" value="<?php echo set_value('check_out'); ?>">
                                <span id="ruangan_error" class="text-danger"><?= form_error('check_out');?></span>  

                            </div>
                                <input type="hidden" id="range_day" name="range_day">                            
                        </div>
                        
                        <div class="form-group m-t-20">
                            <label for="deskripsi" class=" form-control-label">Deskripsi</label>
                            <textarea type="text" id="deskripsi" placeholder="ex: Mikrotik, Robotik.." class="form-control text-inp" name="deskripsi"><?php echo set_value('deskripsi'); ?></textarea>
                        </div>
                    <!-- Form End -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-md" id="proses_button">
                                <i class="fa fa-dot-circle-o"></i> Proses
                            </button>
                            <button type="reset" class="btn btn-danger btn-md">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>