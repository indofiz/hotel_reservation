<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h3 class="title-3">
                            <i class="zmdi zmdi-account-calendar"></i>Kategori Pengunjung</h3>
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
                <h4 class="m-b-20">Tambah Kategori Pengunjung</h4>
                <form action="<?= base_url('/guest_category/addCategory'); ?>" method="post">
                  <div class="form-group">
                      <div class="row">
                          <div class="col col-sm-5">
                            <label for="category" class="form-control-label">Kategori</label>
                            <input name="category" type="text" class="form-control" />
                          </div>
                          <div class="col col-sm-5">
                            <label for="harga" class="form-control-label">Harga</label>
                            <input name="harga" type="text" class="form-control" />
                          </div>
                          <div class="col col-sm-2">
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
                        <tr><th>No</th> <th>Kategori Pengunjung</th><th>Harga</th><th>Action</th></tr> 
                    </thead>

                    <tbody> 
                        <?php $i=1; ?>
                        <?php foreach($category as $cat) : ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $cat['category']; ?></td>
                          <td><?= $cat['harga']; ?></td>
                            <td>  
                                <a href="" id="edit-category" data-toggle="modal" data-target="#modal-edit" data-id="<?= $cat['id']; ?>" data-category="<?= $cat['category']; ?>" data-harga="<?= $cat['harga']; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                <a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action','<?= base_url('/guest_category/delete/') . $cat['id']; ?>')" class="btn btn-danger"><i class="fa fa-times-circle"></i></a>
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
            <form id="form-edit" action="<?php echo base_url('/guest_category/editCategory/') ;?>" method="post">
            <div class="modal-header">
                <h4 class="modal-title">Edit Kategori Pengunjung</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body row form-group">
                <div class="col col-sm">
                    <label for="edit_category" class="form-control-label">Kategori</label>
                    <input name="edit_category" type="text" class="form-control" value="" id="category-n">
                </div>
                <div class="col col-sm">
                    <label for="edit_harga" class="form-control-label">harga</label>
                    <input name="edit_harga" type="text" class="form-control" value="" id="category-m">
                </div>
            </div>
            <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button class="btn btn-success" type="submit"><i class="fa fa-edit"></i> Ubah</button>
            </div>
            <input name="id" type="hidden" class="form-control" value="" id="category-id">
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