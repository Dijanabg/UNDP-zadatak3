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
    $(document).on('click', '.addToCartBtn', function (e) {
        e.preventDefault();
        var prodQty = $(this).closest('.product_data').find('.input-qty').val();
        var prodId = $(this).val();
        //console.log(prodId);

        request=$.ajax({
            method: "POST",
            url: "code/handleCart.php",
            data: {
                "prodId": prodId,
                "prodQty":prodQty,
                "scope": "add"
            }
        });
           
        request.done(function (response, textStatus, jqXHR) {
            console.log(response)
                if (response == 201) {
                            alertify.success("Proizvod je dodat u korpu");
                        }
                        else if (response == "existing") {
                            alertify.success("Proizvod je već dodat u korpu");
                        }
                        else if (response == 401) {
                            alertify.success("Ulogujte se da bi nastavili");
                        }
                        else if (response == 500) {
                            alertify.success("Nešto je pošlo po zlu");
                        }
              });
            
        request.fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Sledeca greska se desila: " + textStatus, errorThrown)
                console.log(jqXHR)
              });
 
            });
        });
    