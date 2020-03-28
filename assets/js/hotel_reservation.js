( function( factory ) {
    if ( typeof define === "function" && define.amd ) {

        // AMD. Register as an anonymous module.
        define( [ "../widgets/datepicker" ], factory );
    } else {

        // Browser globals
        factory( jQuery.datepicker );
    }
}( function( datepicker ) {

datepicker.regional.id = {
    closeText: "Tutup",
    prevText: "&#x3C;mundur",
    nextText: "maju&#x3E;",
    currentText: "hari ini",
    monthNames: [ "Januari","Februari","Maret","April","Mei","Juni",
    "Juli","Agustus","September","Oktober","Nopember","Desember" ],
    monthNamesShort: [ "Jan","Feb","Mar","Apr","Mei","Jun",
    "Jul","Agus","Sep","Okt","Nop","Des" ],
    dayNames: [ "Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu" ],
    dayNamesShort: [ "Min","Sen","Sel","Rab","kam","Jum","Sab" ],
    dayNamesMin: [ "Mg","Sn","Sl","Rb","Km","jm","Sb" ],
    weekHeader: "Mg",
    dateFormat: "dd/mm/yy",
    firstDay: 0,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: "" };
datepicker.setDefaults( datepicker.regional.id );

return datepicker.regional.id;

} ) );


$(document).ready(function () {
    /*datepicker*/
    $("#txtCheckin").datepicker({
        dateFormat: "dd-M-yy",
        changeMonth: true,
        changeYear: true,
        minDate: new Date(),
        onSelect: function (date) {
            var date2 = $('#txtCheckin').datepicker('getDate');
            date2.setDate(date2.getDate());
            //sets minDate to dateofbirth date + 1
            $('#txtCheckout').datepicker('option', 'minDate', date2);
        }
    });
    $('#txtCheckout').datepicker({
        dateFormat: "dd-M-yy",
        changeMonth: true,
        changeYear: true,
        onClose: function () {
            var dt1 = $('#txtCheckin').datepicker('getDate');
            var dt2 = $('#txtCheckout').datepicker('getDate');
            days = (dt2- dt1) / (1000 * 60 * 60 * 24);
            rangeday = (Math.round(days));
            
            var dataharga = Math.abs($('#harga').data('harga'));
            console.log(dataharga);
            console.log(rangeday);
            if (rangeday > 0) {
                var harga = dataharga * rangeday;
                $('#range_day').val(rangeday);
                $('#harga').val(harga);
            }else if(rangeday == 0 || rangeday < 0){
                $('#range_day').val(1);
                $('#harga').val(dataharga);
            }
            if (dt2 <= dt1) {
                var minDate = $('#txtCheckout').datepicker('option', 'minDate');
                $('#txtCheckout').datepicker('setDate', minDate);
            }
        }
    });



    $('.check-in').datepicker( "setDate", $('#txtCheckin').val());
    $('.check-out').datepicker( 'option', 'minDate', $('#txtCheckin').val());
    

});

