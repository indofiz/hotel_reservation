<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h3 class="title-3">
                            <i class="zmdi zmdi-account-calendar"></i>Dashboard</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<br />
<section>
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 p-b-70">
                     <div class="user-data m-b-20">
                        <div class="filters">
                            
                            
                            <div class="chart-info">
                                <span class="title-5">Ruangan di: </span>
                                
                                <div class="chart-info__right">
                                    <div class="chart-note">
                                        <span class="dot dot--red"></span>
                                        <span>Penuh</span>
                                    </div>
                                    <div class="chart-note mr-10">
                                        <span class="dot wardot"></span>
                                        <span>Tersedia</span>
                                    </div>
                                    <div class="chart-note mr-0">
                                        <span class="dot indot"></span>
                                        <span>Kosong</span>
                                    </div>
                                </div>
                            </div>
            
                        </div>
                        <?= $this->session->flashdata('message'); ?>

                            <div id="flex-container-room" class="pl-3 pr-3">
                                <div class="default-tab">
                                    <nav>
                                        <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                                             <?php
                                            foreach($lantai as $lnt){ 
                                            if ($lnt->id == 1) {
                                                $lnt->clas = 'active';
                                                
                                            }else{
                                                $lnt->clas = '';
                                            }
                                            if ($lnt->parent_id == false) {
                                            echo '<li class="nav-item"><a class="nav-link '.$lnt->clas.'" id="nav-home-tab" data-toggle="tab" href="#lantai-'.$lnt->id.'" role="tab" aria-controls="lantai-'.$lnt->id.'"
                                             aria-selected="true">'.$lnt->lantai_label.'</a></li>';
                                            }elseif($lnt->sub == TRUE){ ?>
                                                

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle <?=$lnt->clas;?>" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?=$lnt->lantai_label ?>
                                                    <span class="caret"></span>
                                                </a>
                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 44px, 0px); top: 0px; left: 0px; will-change: transform;z-index: 99 !important;font-size: small;">
                                                    <?php
                                                    $this->db->where('parent_id',$lnt->id);
                                                    $query = $this->db->get('lantai')->result_array();
                                                    foreach ($query as $ln) {?>
                                                        <a class="dropdown-item" data-toggle="tab" href="#lantai-<?=$ln['id'];?>" aria-controls="lantai-<?=$ln['id'];?>"
                                             aria-selected="true"><?=$ln['lantai_label']?></a>
                                                    <?php }
                                                    ?>
                                                </div>
                                            </li>

                                          <?php  }
                                            }
                                            ?>
                                        </ul>
                                    </nav>
                                    <div class="tab-content pt-2" id="nav-tabContent">
                                    
                                        <?php foreach($lantai as $lnt):?>

                                            <?php
                                            if ($lnt->id == 1) {
                                                $lnt->clas = 'active';
                                            }else{
                                                $lnt->clas = '';
                                            }
                                            ?>
                                            <div class="tab-pane fade show <?= $lnt->clas;?>" id="lantai-<?= $lnt->id;?>" role="tabpanel" aria-labelledby="nav-<?= $lnt->lantai_label;?>-tab">
                                            <div class="flex-room">
                                             <?php foreach ($isi_lantai as $row):?>
                                                <?php if ($row['lantai'] == $lnt->id) {
                                                if ($row['status'] == $row['max_people']) {
                                                    $row['class'] = 'activeroom';
                                                    $row['modal'] = '#ad2modal';
                                                    
                                                }elseif ($row['status'] > 0) {
                                                    $row['class'] = 'warningroom';
                                                    $row['modal'] = '#ad3modal';
                                                    
                                                }else{
                                                    $row['class'] = 'inactiveroom';
                                                    $row['modal'] = '#admodal';
                                                }
                                                ?>
                                                     
                                                     <div class="list-room <?= $row['class']; ?>" id="<?= $row['id']; ?>" data-toggle="modal" data-target="<?= $row['modal']; ?>" data-room="<?= $row['number']; ?>"><?= $row['number']; ?></div>

                                                 <?php } ?>
                                            <?php endforeach ?> 
                                            </div>
                                            </div>                                             
                                        <?php endforeach ?>
                                    </div>

                                </div>
                            </div>
                        
                    </div>           
                </div>    
            </div>
        </div>
    </div>
</section>

<!-- MODAL -->
<div class="modal fade" id="admodal" tabindex="-1" role="dialog" aria-labelledby="admodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" style="z-index: 99 !important">
            <div class="modal-header" style="border: 0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3><div class="mx-auto inside-room" align="center">Ruang Kosong</div></h3>

            </div>
            <div class="modal-footer mx-auto" style="border: 0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="" class="btn btn-primary addRoomby">Pesan</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ad2modal" tabindex="-1" role="dialog" aria-labelledby="ad2modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" style="z-index: 99 !important">
            <div class="modal-header" style="border: 0">
                <h3 class="modal-title" id="title-room"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-active-room">
                <div class="row">
                <div class="col-md-4"><label for="nama-info-room" class="form-control-label">Nama Pemesan:</label></div>
                <div class="col-8 col-md-8 m-b-20">
                    <select name="select" id="nama-info-room" class="form-control-sm form-control">
                        <option value="">Pilih Nama</option>
                    </select>
                </div>
                </div>
                <table id="modal-activer" class="table table-bordered">
                                    </table>
            </div>
            <div class="modal-footer mx-auto" style="border: 0">
                <a href="" class="btn btn-info" id="print_page"><i class="fa fa-print"></i> Print</a>
                <a href="" class="btn btn-warning" id="checkout"><i class="fa fa-rocket"></i> Check Out</a>
                <a href="" class="btn btn-success" id="edit_guest"><i class="fa fa-edit"></i> Edit</a>
            </div>
        </div>
    </div>
</div>


<!-- Modal warning Room -->

<div class="modal fade" id="ad3modal" tabindex="-1" role="dialog" aria-labelledby="ad3modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" style="z-index: 99 !important">
            <div class="modal-header" style="border: 0">
                <h3 class="modal-title" id="title-room2"></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-active-room">
                <div class="row">
                <div class="col-md-4"><label for="nama-info-room2" class="form-control-label">Nama Pemesan:</label></div>
                <div class="col-8 col-md-8 m-b-20">
                    <select name="select" id="nama-info-room2" class="form-control-sm form-control">
                        <option value="">Pilih Nama</option>
                    </select>
                </div>
                </div>
                <table id="modal-activer2" class="table table-bordered">
                                    </table>
            </div>
            <div class="modal-footer mx-auto" style="border: 0">
                <a href="" class="btn btn-info" id="print_page2"><i class="fa fa-print"></i> Print</a>
                <a href="" class="btn btn-warning" id="checkout2"><i class="fa fa-rocket"></i> Check Out</a>
                <a href="" class="btn btn-success" id="edit_guest2"><i class="fa fa-edit"></i> Edit</a>
                <a href="" class="btn btn-primary" id="tambah_guest2"><i class="fa fa-plus"></i> Pesan Ruang</a>
            </div>
        </div>
    </div>
</div>