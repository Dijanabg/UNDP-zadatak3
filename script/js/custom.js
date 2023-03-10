$(document).ready(function () {
    $('.carousel').carousel()
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
            url: "../code/handleCart.php",
            data: {
                "prodId": prodId,
                "prodQty":prodQty,
                "scope": "add"
            }
        });
           
        request.done(function (response, textStatus, jqXHR) {
            //console.log(response)
                if (response == 200) {
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
    $(document).on('click', '.updateQty', function (e) {
                e.preventDefault();
                var prodQty = $(this).closest('.product_data').find('.input-qty').val();
                var prodId = $(this).closest('.product_data').find('.prodId').val();
        
        //$request= 
        $.ajax({
                    method: "POST",
                    url: "../code/handleCart.php",
                    data: {
                        "prodId": prodId,
                        "prodQty": prodQty,
                        "scope": "update"
                    },
                    success: function(response){
                        console.log(response)
                        if (response == 200) {
                                //to refresh only cart
                                     $('#mycart').load(location.href + " #mycart");
                                    alertify.success("Količina je ažurirana");
                                    
                                }
                                else if (response == 401) {
                                    alertify.success("Ulogujte se da bi nastavili");
                                }
                                else if (response == 500) {
                                    alertify.success("Nešto je pošlo po zlu");
                                }
                    }
                });
                
                //nisam resila gresku ReferenceError: request is not defined at HTMLButtonElement,
                //mislim da je trebalo dodati onclick u html ali neradi
        // request.done(function (response, textStatus, jqXHR) {
        //             console.log(response)
        //             console.log("Sledeca greska se desila: " + textStatus)
        //             console.log(jqXHR)
        //                 if (response == 201) {
        //                             alertify.success("Količina je ažurirana");
        //                             //to refresh only cart
        //             $('#mycart').load(location.href + " #mycart");
        //                         }
        //                         else if (response == 401) {
        //                             alertify.success("Ulogujte se da bi nastavili");
        //                         }
        //                         else if (response == 500) {
        //                             alertify.success("Nešto je pošlo po zlu");
        //                         }
        //         });
        // request.fail(function (jqXHR, textStatus, errorThrown) {
        //             console.error("Sledeca greska se desila: " + textStatus, errorThrown)
        //             console.log(jqXHR)
        //     });
    });
    $(document).on('click', '.deleteItem', function () {
        var cartId = $(this).val();
        //alert(cart_id);
        $.ajax({
            method: "POST",
            url: "../code/handleCart.php",
            data: {
                "cartId": cartId,
                "scope": "delete"
            },
            success: function (response) {
                console.log(response)
                if (response == 200) {
                    alertify.success("Proizvod je izbrisan");
                    //to refresh only cart
                    $('#mycart').load(location.href + " #mycart");
                } else {
                    alertify.success(response);
                }
            }
        });
    });
    $(document).on('click', '.addToWishList', function (e) {
        e.preventDefault();
        var prodId = $(this).val();
        //var prodId = $(this).closest('.product_data').find('.prodId').val();
        console.log(prodId);

        request=$.ajax({
            method: "POST",
            url: "../code/handleWishList.php",
            data: {
                "prodId": prodId,
                "scope2": "add"
            }
        });
           
        request.done(function (response, textStatus, jqXHR) {
            console.log(response)
                if (response == 200) {
                            alertify.success("Proizvod je dodat u listu želja");
                        }
                        else if (response == "existing") {
                            alertify.success("Proizvod je već dodat u listu želja");
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
    $(document).on('click', '.delItem', function () {
        var wishId = $(this).val();
        //var wishId  = $(this).closest('.product_data').find('.id ').val();
        console.log(wishId);
        //alert(cart_id);
        $.ajax({
            method: "POST",
            url: "../code/handleWishList.php",
            data: {
                "id": wishId,
                "scope2": "delete"
            },
            success: function (response) {
                console.log(response)
                if (response == 200) {
                    $('#mywishlist').load(location.href + " #mywishlist");
                    alertify.success("Proizvod je izbrisan");
                    //to refresh only cart
                    
                } else {
                    alertify.success(response);
                }
            }
        });
    });
    
});
$(document).ready(function () {
    $("#search").on("keyup", function(e) {
        //alert("hi");
        e.preventDefault();
        $("#table").trigger("reset");
        var search = $(this).val();
        $.ajax({
            url: "../code/livesearch.php",
            type: "POST",
            data: {
                search: search
            },
            success: function($data) {
                $("#table").html($data);
            }
        });
    });
});
function validateForm() {
    var name =  document.getElementById('name').value;
    if (name == "") {
        document.querySelector('.status').innerHTML = "Name cannot be empty";
        return false;
    }
    var email =  document.getElementById('email').value;
    if (email == "") {
        document.querySelector('.status').innerHTML = "Email cannot be empty";
        return false;
    } else {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(!re.test(email)){
            document.querySelector('.status').innerHTML = "Email format invalid";
            return false;
        }
    }
    var subject =  document.getElementById('subject').value;
    if (subject == "") {
        document.querySelector('.status').innerHTML = "Subject cannot be empty";
        return false;
    }
    var message =  document.getElementById('message').value;
    if (message == "") {
        document.querySelector('.status').innerHTML = "Message cannot be empty";
        return false;
    }
    document.querySelector('.status').innerHTML = "Email sent!";
  }
    