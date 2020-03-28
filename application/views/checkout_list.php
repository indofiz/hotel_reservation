<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h3 class="title-3">
                            <i class="zmdi zmdi-account-calendar"></i>Check Out <span class="text-danger"><?= $guest['ruangan'];?></span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section__content section__content--p30 m-t-30">
    <div class="container-fluid">
		<div class="card">
            <form action="" method="post">
            <div class="card-body">			    
			<div class="col-md-6 col-md-offset-3 mx-auto">
            <div class="form-group m-t-10">
            <label for="name" class="form-control-label">Atas Nama</label>

            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-user"></i>
                </div>
                <input type="text" placeholder="<?= $guest['name']; ?>" class="form-control" value="<?= $guest['name']; ?>" disabled="">
            </div>
                
            </div>
			<div class="form-group m-t-10">
                <label for="ruangan" class="form-control-label">Check In</label>

                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" id="txtCheckin" placeholder="<?= $guest['check_in']; ?>" class="form-control check-in" value="<?= $guest['check_in']; ?>" name="check_in" disabled="">
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
            <div class="row">
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
            <div class="form-group col-md-6" id="load-harga">
                <label for="harga" class=" form-control-label">Total</label>
                <div class="input-group">
                    
                    <input type="text" id="range_day" name="range_day" placeholder="0" value="<?= $guest['range_day']; ?>" class="form-control" disabled="">
                    <div class="input-group-addon">
                        Hari
                    </div>
                </div>
            </div>
            <div class="form-group ml-auto m-t-30">
	            <a href="<?php echo base_url("/list_reservasi/"); ?>" class="btn btn-default">
	                 Cencel
	            </a>
	            <button type="submit" class="btn btn-warning btn-md" id="check_out-btn">
	                <i class="fa fa-rocket"></i> Check Out
	            </button>
	        </div>
            </div>


			</div>
			</div>
			</form>
		</div>

    </div>
</div>