$(document).ready(function () {
        
        
        $("#logreg").hide();
        $("#logregs").hide();
        getcartcount();
        getcarttotal();
        getcartdata();
        $('[data-toggle="tooltip"]').tooltip();

        $(document).keydown(function (e) {
                // ESCAPE key pressed
                if (e.keyCode == 27) {
                        $(".cart_box").fadeOut(500);
                }
        });

        /*                  * cart remove funciton . remove individual item from cart
         */
        $("#cart_box").on("click", ".drop_cart>.cart_item>.remove_item", function () {

                var cartid = $(this).attr('cartid');
                var canname = $(this).attr('canname');
                removecart(cartid, canname);

                location.reload();
        });
});


function login() {
        document.getElementById("form_id").submit();
}
function getcartcount() {

        $.ajax({
                type: "POST",
                cache: 'false',
                async: false,
                url: baseurl + 'cart/Getcartcount',
                data: {}
        }).done(function (data) {
                $(".cart_items").html(data);
                hideLoader();
        });
}
function getcarttotal() {

        $.ajax({
                type: "POST",
                cache: 'false',
                async: false,
                url: baseurl + 'cart/Getcarttotal',
                data: {}
        }).done(function (data) {
                $(".amount").html(data);
                hideLoader();
        });
}
function removecart(cartid, canname) {

        $.ajax({
                type: "POST",
                cache: 'false',
                async: false,
                url: baseurl + 'cart/Removecart',
                data: {cartid: cartid, cano_name: canname}
        }).done(function (data) {
                getcartcount();
                getcarttotal();
                $(".cart_box").html(data);

                hideLoader();
        });
}

function getcartdata() {
        $.ajax({
                type: "POST",
                cache: 'false',
                async: false,
                url: baseurl + 'cart/Selectcart',
                data: {}
        }).done(function (data) {
                $(".cart_box").html(data);
                //$(".cart_box").show('fast');
                hideLoader();
        });
}
function showLoader() {
        $('.over-lay').show();
}
function hideLoader() {
        $('.over-lay').hide();
}