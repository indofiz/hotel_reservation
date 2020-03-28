<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h3 class="title-3">
                            <i class="zmdi zmdi-account-calendar"></i>List Admin</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Button trigger modal -->
<div class="container">
	<div class="row m-t-20 ml-3">
		<div class="col">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahAdminModal">
			  Tambah Admin
			</button>
		</div>
	</div>
</div>

<div class="section__content section__content--p30 m-t-20">
    <div class="container-fluid">
		<div class="card">
            <div class="card-body">			    

			<?= $this->session->flashdata('message'); ?>
			<table id="admin-table" class="table table-striped" style="width:100%"> 
				<thead> 
					<tr><th>Username</th> <th>Terakhir login</th> <th>Action</th></tr> 
				</thead>

				<tbody> 

				  	<?php foreach ($admins as $admin) : ?>
				    <tr>
				      <td><?= $admin['username']; ?></td>
				      <td><?= date('d-M-Y', $admin['last_login']); ?></td>
				      <td>
				      	<a href="<?= base_url('/list_admin/detail/') . $admin['id']; ?>" class="badge badge-warning detailAdmin" data-toggle="modal" data-target="#detailAdminModal" data-id="<?= $admin['id']; ?>">detail</a>
						<a href="<?= base_url('/list_admin/delete/') . $admin['id']; ?>" class="badge badge-danger">delete</a>
						</td>
				    </tr>
					<?php endforeach ?>
				</tbody>
			 </table>


				</div>		
    		</div>
    </div>
</div>



<!-- Modal Tambah-->
<div class="modal fade" id="tambahAdminModal" tabindex="-1" role="dialog" aria-labelledby="tambahAdminModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahAdminModalLabel">Tambah Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('/list_admin/index'); ?>" method="post">
	      <div class="form-group">
	      	<label for="username">Username</label>
		    <input type="username" class="form-control" id="username" name="username" value="<?= set_value('username'); ?>">
		    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
		  </div>
		  <div class="form-group">
		  	<label for="password">Password</label>
		    <input type="password" class="form-control" id="password" name="password">
		    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
		  </div>
		  <div class="form-group">
		  	<label for="password2">Konfirmasi Password</label>
		    <input type="password" class="form-control" id="password2" name="password2">
		    <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
		  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Detail-->
<div class="modal fade" id="detailAdminModal" tabindex="-1" role="dialog" aria-labelledby="detailAdminModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailAdminModalLabel">Detail Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	      
		<div class="row">
			<div class="col-md">
				<img src="<?php echo base_url("/assets/"); ?>images/profile/default.jpg">
			</div>
			<div class="col-md">
				<h4 class="mt-4"></h4>
				<p class="mt-3 text-muted"></p>
			</div>	
		</div>
		  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>