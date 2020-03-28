<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h3 class="title-3">
                            <i class="zmdi zmdi-account-calendar"></i>List Reservasi</h3>
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
			<div id="table-button" class="m-b-20"></div>
			<table id="guest-table" class="table table-striped" style="width:100%"> 
				<thead> 
					<tr><th>Name</th> <th>Telpon</th> <th>CheckIn</th> <th>Lama</th> <th>Ruangan</th><th>Jumlah</th><th>Status</th><th>Harga</th><th>Action</th> </tr> 
				</thead>

				<tbody> 

				  	<?php foreach ($guest as $gs) : ?>
				    <tr>
				    	<?php
				    	if ($gs['cost'] != '') {
				    		$cost = $gs['cost'];
				    	}else{
				    		$cost = 0;
				    	}
				    	if ($gs['status'] == 1) {
				    		$status = '<span class="text-info">Ongoing</span>';
				    	}else{
				    		$status = '<span class="text-warning">CheckOut</span>';
				    	}

				    	?>
				      <td><?= $gs['name']; ?></td>
				      <td><?= $gs['telpon']; ?></td>
				      <td><?= $gs['check_in']; ?></td>
				      <td><?= $gs['range_day']; ?> hari</td>
					  <td><?= $gs['ruangan']; ?></td>
				      <td><?= $gs['total_people']; ?> orang</td>
				      <td><?= $status; ?></td>
				      <td><?= $gs['cost']; ?></td>
				      <td>
						<?php if ($gs['status'] == 1) {
						?>
				      	<div class="row">
				      		<div class="col">
				      			<a href="<?= base_url('/list_reservasi/checkout/') . $gs['id']; ?>" class="badge badge-warning"><i class="fa fa-check"></i></a>
								<?php }else{?>
								<a href="#" class="badge badge-light"><i class="fa fa-check"></i></a>
								<?php }?>
								
						      	<a href="<?= base_url('/list_reservasi/printPage/') . $gs['id']; ?>" class="badge badge-info" target="_blank"><i class="fa fa-print"></i></a>
				      		</div>	
				      	</div>
				      	<div class="row">
				      		<div class="col">
				      			<a href="<?= base_url('/list_reservasi/editGuest/') . $gs['id']; ?>" class="badge badge-success"><i class="fa fa-edit"></i></a>
								<a href="#modalDelete" data-toggle="modal" onclick="$('#modalDelete #formDelete').attr('action','<?= base_url('/list_reservasi/delete/') . $gs['id']; ?>')" class="badge badge-danger"><i class="fa fa-times-circle"></i></a>
				      		</div>
				      	</div>
					  </td>
				    </tr>
					<?php endforeach ?>
				</tbody>
			 </table>
			
		


			</div>

			
		</div>

    </div>
</div>


<!-- MODAL -->

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