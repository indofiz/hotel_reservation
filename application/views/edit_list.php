
<div class="section__content section__content--p30 m-t-75">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 m-t-30">
                <div class="card">
                <form method="post" action=""> 
                    <div class="card-header">
                        <strong>Edit Reservation</strong>
                        <small class="ruangan"></small>
                    </div>

                    <!-- Form -->
                    <div class="card-body card-block row">
                    <div class="col-md-6 col-md-offset-3 mx-auto">
                    <?= $this->session->flashdata('message'); ?>
                    
                    <?= validation_errors('<div class="alert alert-danger col-sm-12" role="alert" id="alert-danger">', '</div>'); ?>
                        <div class="form-group">
                            <label for="nama" class=" form-control-label">Nama Lengkap</label>

                            <input type="hidden" name="id" value="<?= $guest['id']; ?>">
                            <input type="text" id="nama" class="form-control text-inp" value="<?= $guest['name']; ?>" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="telpon" class=" form-control-label">Nomor Telpon</label>
                            <input type="text" id="telpon" class="form-control text-inp" value="<?= $guest['telpon']; ?>" name="telpon">
                        </div>
                        <div class="form-group m-t-20 row">
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

                                <select class="js-select2" name="ruangan" id="ruangan2">
                                    <?php foreach ($room as $rm) : ?>
                                    <?php if ($rm['number'] == $guest['ruangan']) : ?>
                                        <option value="<?= $rm['number']; ?>" selected><?= $rm['number']; ?></option>
                                    <?php elseif($rm['status'] == $rm['max_people']): ?>
                                        <option value="<?= $rm['number']; ?>" disabled><?= $rm['number']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $rm['number']; ?>"><?= $rm['number']; ?></option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <div class="dropDownSelect2"></div>
                                <input type="hidden" id="ruangan-before" name="ruangan-before" value="<?= $guest['ruangan']; ?>">
                            </div>
                            <div class="rs-select2--dark rs-select2--md col-sm-4">
                                <label for="orang" class="form-control-label">Orang</label>

                                <select class="js-select2" name="orang" id="orang">
                                    <?php if($guest['total_people'] == 1) : ?>
                                        <option value="1" selected="selected">1</option>
                                        <option value="2">2</option>
                                    <?php else : ?>
                                        <option value="1">1</option>
                                        <option value="2" selected="selected">2</option>
                                    <?php endif; ?>
                                </select>
                                <div class="dropDownSelect2"></div>
                                <input type="hidden" id="total-before" name="total-before" value="<?= $guest['total_people']; ?>">
                            </div>
                        </div>


                        <div class="row m-t-20">
                            <div class="form-group col-md-6">
                                <div class="rs-select2--dark rs-select2--md">
                                    <label for="type" class=" form-control-label">Type</label>

                                    <select class="js-select2" name="type" id="type">
                                        <?php foreach($guest_category as $gs) : ?>
                                            <?php if ($guest['type'] == $gs['id']) : ?>
                                                <?php echo '<option value="'.$gs['id'].'" selected>'.$gs['category'].'</option>'; ?>
                                            <?php else : ?>
                                                <?php echo '<option value="'.$gs['id'].'">'.$gs['category'].'</option>'; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                <div class="dropDownSelect2"></div>
                                
                                </div>
                                
                            </div>
                            <div class="form-group col-md-6" id="load-harga">
                                <label for="harga" class=" form-control-label">Harga</label>
                                <div class="input-group">
                                    
                                    <div class="input-group-addon">
                                        Rp.
                                    </div>
                                    <input type="text" id="harga" name="harga" placeholder="0" value="<?= $guest['cost']; ?>" class="form-control" data-harga="<?= $guest_category_cost; ?>">

                                    <span id="ruangan_error" class="text-danger"><?= form_error('harga');?></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-t-10">
                            <label for="ruangan" class="form-control-label">Check In</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" id="txtCheckin" placeholder="<?= $guest['check_in']; ?>" class="form-control check-in" value="<?= $guest['check_in']; ?>" name="check_in">
                            </div>
                            
                        </div>
                        <div class="form-group m-t-10">
                            <label for="ruangan" class=" form-control-label">Check Out</label>

                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" id="txtCheckout" placeholder="<?= $guest['check_out']; ?>" class="form-control check-out" value="<?= $guest['check_out']; ?>" name="check_out">
                            </div>
                                <input type="hidden" id="range_day2" name="range_day" value="">

                        </div>
                        

                        <div class="form-group m-t-10">
                            <label for="deskripti" class=" form-control-label">Deskripsi</label>
                            <textarea type="text" id="deskripsi" placeholder="ex: Mikrotik, Robotik.." class="form-control text-inp" name="deskripsi"><?= $guest['deskripsi']; ?></textarea>
                        </div>
                    <!-- Form End -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-md" id="proses_button2">
                                <i class="fa fa-dot-circle-o"></i> Proses
                            </button>
                            <a href="<?php echo base_url("/list_reservasi/"); ?>" class="btn btn-danger btn-md">
                                <i class="fa fa-ban"></i> Cencel
                            </a>
                        </div>
                    </div>  
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>