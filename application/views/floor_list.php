<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h3 class="title-3">
                            <i class="zmdi zmdi-account-calendar"></i>Floor Control</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section__content section__content--p30 m-t-30">
    <div class="container">
		<div class="card">
            <div class="card-body">	
            <?= $this->session->flashdata('message'); ?>
            <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <h4 class="m-b-20">Add Floor</h4>
                <form action="<?= base_url('/control_floor/addFloor'); ?>" method="post">
                  <div class="form-group">
                      <div class="row">
                          <div class="col col-sm-9">
                            <label for="lantai" class="form-control-label">Lantai</label>
                            <input name="lantai" type="text" class="form-control" />
                          </div>
                            <button type="submit" class="btn btn-primary btn-md m-t-35">Tambah</button>
                          </div>
                      </div>
                  </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="room-table" class="table table-striped"> 
                    <thead>
                        <tr><th>No</th> <th>Nama Lantai</th><th>Action</th></tr> 
                    </thead>

                    <tbody> 
                        <?php $i=1; ?>
                        <?php foreach($lantai as $lt) : ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $lt['lantai_label']; ?></td>
                            <td>  
                                <a href="" id="edit-floor" data-toggle="modal" data-target="#modal-edit" data-id="<?= $lt['id']; ?>" data-lantai="<?= $lt['lantai_label']; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action','<?= base_url('/control_floor/delete/') . $lt['id']; ?>')" class="btn btn-danger"><i class="fa fa-times-circle"></i></a>
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
            <form id="form-edit" action="<?php echo base_url('/control_floor/editFloor/') ;?>" method="post">
            <div class="modal-header">
                <h4 class="modal-title">Edit Floor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row form-group">
                <div class="col col-sm">
                    <label for="edit_floor" class="form-control-label">Nama Lantai</label>
                    <input name="edit_floor" type="text" class="form-control" value="" id="lantai-n">
                </div>
            </div>
            <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-success" type="submit"><i class="fa fa-edit"></i> Ubah</button>
            </div>
            <input name="id" type="hidden" class="form-control" value="" id="lantai-id">
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDelete">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Yakin akan menghapus ini?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <form id="formDelete" action="" method="post">
                    <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-danger" type="submit">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>