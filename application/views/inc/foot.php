
    </div>
</div>

<!-- Jquery JS-->
    <script src="<?php echo base_url("/assets/"); ?>vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?php echo base_url("/assets/"); ?>vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?php echo base_url("/assets/"); ?>vendor/slick/slick.min.js">
    </script>
    <script src="<?php echo base_url("/assets/"); ?>vendor/wow/wow.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?php echo base_url("/assets/"); ?>vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?php echo base_url("/assets/"); ?>vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>vendor/select2/select2.min.js">
    </script>
    <script src="<?php echo base_url("/assets/"); ?>vendor/vector-map/jquery.vmap.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>vendor/vector-map/jquery.vmap.world.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>vendor/jquery-ui.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>js/printThis.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script src="<?php echo base_url("/assets/"); ?>DataTables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>DataTables/Buttons-1.5.6/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>DataTables/Buttons-1.5.6/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>DataTables/Buttons-1.5.6/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>DataTables/Buttons-1.5.6/js/buttons.colVis.min.js"></script>

    <!-- Main JS-->
    <script src="<?php echo base_url("/assets/"); ?>js/main.js"></script>
    <script src="<?php echo base_url("/assets/"); ?>js/hotel_reservation.js"></script>
    <script type="text/javascript">
        
    $(document).ready(function () {

            // table guest
            var table = $('#guest-table').DataTable( {
                "order": [[ 8, "desc" ]],
                buttons: [

                {
                    extend: 'pdf',
                    className: 'btn btn-danger',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7 ]
                    }
                },
                {
                    extend: 'print',
                    className: 'btn btn-info',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7 ]
                    }
                },
                {
                    extend: 'excel',
                    className: 'btn btn-success',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,4,5,6,7 ]
                    }
                },
                {
                    extend: 'colvis',
                    text: '',
                }

                ],
                dom: 
                "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                "<'row'<'col-md-12'tr>>" +
                "<'row'<'col-md-5'i><'col-md-7'p>>",
                lengthMenu:[
                    [100,50,25,-1],
                    [100,50,25,"All"]
                ]
            } );
        
            table.buttons().container()
            .appendTo('#table-button');

            // table admin
            $('#admin-table').DataTable();
            $('#room-table').DataTable();

            // detail admin
            $('.detailAdmin').on('click', function(){

                const id = $(this).data('id');
                const imageURL = 'http://localhost/hotel_reservation/assets/images/profile/';

                $.ajax({

                    url : 'http://localhost/hotel_reservation/list_admin/getDetail',
                    data : {id:id},
                    method : 'post',
                    dataType : 'json',
                    success : function(data) {
                      $('#detailAdminModal .modal-body img').attr('src', imageURL + data.image) ;
                      $('#detailAdminModal .modal-body h4').html(data.username);
                      $('#detailAdminModal .modal-body p').html('Terakhir login : ' + data.last_login);
                    }

                });

            });

        // input upload file
        $('.custom-file-input').on('change', function(){
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        /*List Ruangan*/

        $('#lantai').change(function(){
            var lantai = $(this).val();
            if(lantai != ''){
                $.ajax({
                url: "<?php echo base_url('pesan_ruangan/load_room') ;?>",
                method: "POST",
                data: {lantai:lantai},
                success: function(data){
                    $('#ruangan2').html(data);

                    $('#orang').html('<option value="">---</option>');
                }
                });
            }else
            {
                $('#ruangan').html('<option value="">---</option>');
                $('#orang').html('<option value="">---</option>');
            }
            
        });
        $('#ruangan2').change(function(){
            var ruangan = $(this).val();
            if(ruangan != ''){
                $.ajax({
                url: "<?php echo base_url('pesan_ruangan/load_max_people') ;?>",
                method: "POST",
                data: {ruangan:ruangan},
                success: function(data){
                    $('#orang').html(data);
                }
                });
            }else
            {
                $('#orang').html('<option value="">---</option>');
            }
            
        });

        $('#type').change(function(){
            var id_guest = $('#type').val();
           
            if(id_guest != ''){
                $.ajax({
                url: "<?php echo base_url('pesan_ruangan/load_cost') ;?>",
                method: "POST",
                data: {id_guest:id_guest},
                success: function(data){
                    $('#harga').data('harga',data);
                    $('#harga').val(data);
                }
                });
            }else
            {
                $('#harga').val(0);
            }
            
        });

        $('#nama-info-room').change(function(){
            var id_guest = $('#nama-info-room').val();
           
            if(id_guest != ''){
                $.ajax({
                url: "<?php echo base_url('dashboard/info_room') ;?>",
                method: "POST",
                data: {id:id_guest},
                success: function(data){
                    $('#modal-activer').html(data);
                }
                });
                $('#checkout').attr('href',"<?php echo base_url('/list_reservasi/checkout/') ;?>"+id_guest);
                $('#print_page').attr('href',"<?php echo base_url('/list_reservasi/printPage/') ;?>"+id_guest);
                $('#edit_guest').attr('href',"<?php echo base_url('/list_reservasi/editGuest/') ;?>"+id_guest);
            }else
            {
                $('#harga').val(0);
            }
            
        });
        $('#nama-info-room2').change(function(){
            var id_guest = $('#nama-info-room2').val();
           
            if(id_guest != ''){
                $.ajax({
                url: "<?php echo base_url('dashboard/info_room') ;?>",
                method: "POST",
                data: {id:id_guest},
                success: function(data){
                    $('#modal-activer2').html(data);
                }
                });
                $('#checkout2').attr('href',"<?php echo base_url('/list_reservasi/checkout/') ;?>"+id_guest);
                $('#print_page2').attr('href',"<?php echo base_url('/list_reservasi/printPage/') ;?>"+id_guest);
                $('#edit_guest2').attr('href',"<?php echo base_url('/list_reservasi/editGuest/') ;?>"+id_guest);
            }else
            {
                $('#harga').val(0);
            }
            
        });

        /*Info room*/
       $('.activeroom').click(function(){
        var room = $(this).data('room');
        $('#title-room').html('Info Ruang '+room);
        if(room != ''){
            $.ajax({
            url: "<?php echo base_url('dashboard/list_info_room') ;?>",
            method: "POST",
            data: {room:room},
            success: function(data){
                $('#nama-info-room').html(data);
            }
            });
        }else
        {
            $('#nama-info-room').html('<option value="">Pilih Nama</option>');
        }
        });

       $('.warningroom').click(function(){
        var room = $(this).data('room');
        $('#title-room2').html('Info Ruang '+room);
        $('#tambah_guest2').attr('href',"<?php echo base_url('/pesan_ruangan/addRoomby/') ;?>"+room);
        if(room != ''){
            $.ajax({
            url: "<?php echo base_url('dashboard/list_info_room') ;?>",
            method: "POST",
            data: {room:room},
            success: function(data){
                $('#nama-info-room2').html(data);
            }
            });
        }else
        {
            $('#nama-info-room2').html('<option value="">Pilih Nama</option>');
        }
        });

       $('.inactiveroom').click(function(){
        var rooms = $(this).data('room');
        if(rooms != ''){
            $('.inside-room').html('Pesan Ruangan <br>'+rooms);
            $(".addRoomby").attr("href", "<?php echo base_url('/pesan_ruangan/addRoomby/') ;?>"+rooms);
        }
        });

       $(document).on('click','#edit-room',function(){
            var id = $(this).data('id');
            var ruangan = $(this).data('number');
            var max_people = $(this).data('max');
            $('#room-n').val(ruangan);
            $('#room-m').val(max_people);
            $('#room-id').val(id);
       });

       $(document).on('click','#edit-floor',function(){
            var id = $(this).data('id');
            var lantai = $(this).data('lantai');
            $('#lantai-n').val(lantai);
            $('#lantai-id').val(id);
       });

    });
    </script>
</body>
</html>