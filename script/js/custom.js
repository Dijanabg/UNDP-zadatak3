$(document).ready(function () {
    $(document).on('click', '.increment-btn', function (e) {
        e.preventDefault();
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        //alert(qty);

        var value = parseInt(qty, 10);
        //ako nije broj bice 0 u suprotnom vrednost
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            //$('.input-qty').val(value);
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });
    $(document).on('click', '.decrement-btn', function (e) {
        e.preventDefault();
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        //alert(qty);

        var value = parseInt(qty, 10);
        //ako nije broj bice 0 u suprotnom vrednost
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            //$('.input-qty').val(value);
            $(this).closest('.product_data').find('.input-qty').val(value);
        }
    });
});