<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h3 class="title-3">
                            <i class="zmdi zmdi-account-calendar"></i>Room Control</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section__content section__content--p30 m-t-30">
    <div class="container-fluid">
		<div class="card">
            <div class="card-body">	
            <?= $this->session->flashdata('message'); ?>
            <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <form action="<?= base_url('/room_list/addRoom'); ?>" method="post">
                    <h4 class="m-b-20">Add Room</h4>
                    <div class="row form-group">
                        <div class="col col-sm-3">
                            <label for="lantai_add" class="form-control-label">Lantai</label>
                        <select name="lantai_add" id="select" class="form-control">
                            <?php
                            foreach($lantai as $lnt)
                            {
                             echo '<option value="'.$lnt->id.'">'.$lnt->lantai_label.'</option>';
                            }
                            ?>
                        </select>
                        </div>
                        <div class="col col-sm-3">
                            <label for="add_room" class="form-control-label">Nomor Ruangan</label>
                            <input name="add_room" type="text" placeholder="A1" class="form-control" value="">
                        </div>
                        <div class="col col-sm-3">
                            <label for="max_people" class="form-control-label">Max Orang</label>
                            <input name="max_people" type="text" placeholder="00" class="form-control" value="">
                        </div>
                        <div class="col col-sm-3 align-bottom">
                            <label for="max_people" class="form-control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <button type="submit" class="btn btn-primary btn-md">Tambah Ruangan</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="room-table" class="table table-striped"> 
                    <thead>
                        <tr><th>No</th> <th>Nomor Ruangan</th> <th>Posisi</th><th>Max Orang</th><th>Action</th> </tr> 
                    </thead>

                    <tbody> 
                        <?php $i=1; ?>
                        <?php foreach ($room as $rom) : ?>
                            <?php 
                            if ($rom['lantai'] == 1) {
                                $lantai = 'Lantai 2';
                            }elseif ($rom['lantai'] == 2) {
                                $lantai = 'Lantai 3';
                            }elseif ($rom['lantai'] == 3) {
                                $lantai = 'Perumahan';
                            }else{
                                $lantai ='';
                            }
                            ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $rom['number']; ?></td>
                          <td><?= $lantai; ?></td>
                          <td><?= $rom['max_people']; ?></td>
                          <td>
                            
                            <a href="" id="edit-room" data-toggle="modal" data-target="#modal-edit" data-id="<?= $rom['id']; ?>" data-number="<?= $rom['number']; ?>" data-max="<?= $rom['max_people']; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <a href="<?= base_url('/room_list/delete/') . $rom['id']; ?>" class="btn btn-danger"><i class="fa fa-times-circle"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        <?php endforeach ?>

                    </tbody>
                 </table>

            </div>
        </div>
    </div>
</div>


<!-- MODAL -->

<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form id="form-edit" action="<?php echo base_url('/room_list/editRoom/') ;?>" method="post">
            <div class="modal-header">
                <h4 class="modal-title">Edit Room</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row form-group">
                <div class="col col-sm-6">
                    <label for="add_room" class="form-control-label">Nomor Ruangan</label>
                    <input name="add_room" type="text" placeholder="000" class="form-control" value="" id="room-n">
                </div>
                <div class="col col-sm-6">
                    <label for="max_people" class="form-control-label">Max Orang</label>
                    <input name="max_people" type="text" placeholder="00" class="form-control" value="" id="room-m">
                    <input name="id" type="hidden" class="form-control" value="" id="room-id">
                </div>
            </div>
            <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-success" type="submit"><i class="fa fa-edit"></i> Ubah</button>
            </div>
            </form>
        </div>
    </div>
</div>