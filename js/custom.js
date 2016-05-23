function addtocart(canname, qty) {

        $.ajax({
                type: "POST",
                url: baseurl + 'cart/Buynow',
                data: {cano_name: canname, qty: qty}
        }).done(function (data) {
                getcartcount();
                getcarttotal();
                $(".cart_box").show();
                $(".cart_box").html(data);

                $("html, body").animate({scrollTop: 0}
                , "slow")
                        ;
                hideLoader();
        });


}


function showLoader() {
        $('.over-lay').show();
}
function hideLoader() {
        $('.over-lay').hide();
}