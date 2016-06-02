<div class="container main_container product_archive">
    <div class="breadcrumbs">
        <?php
        //$category_name = Yii::app()->request->getParam('name');
        $url = Yii::app()->request->urlReferrer;
        $catname = explode("/", $url);
        $category_name = $catname[8];
        ?>
        <?php echo $this->renderPartial('_bread_crumb', array('category_name' => $category_name)); ?><span> / Deal
    </div>
    <?php if (!empty($dataprovider) || $dataProvider != '') { ?>
            <div class="deal_header">
                <h2>Deal of the Day</h2>
                <h4>Rush to grab sensational deals on exquisite outfits   </h4>
                <div class="clearfix"></div>
                <div class="deal_timer">
                    <div class="deal_title">Deal Ends in:</div>
                    <div class="deal_time">
                        <div class="" id="clock"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
    <?php } ?>

    <div class="product_list">
        <div class="row">
            <?php
            if (!empty($dataprovider) || $dataProvider != '') {
                    $this->widget('zii.widgets.CListView', array(
                        'dataProvider' => $dataProvider,
                        'itemView' => '_dealview',
                    ));
            } else {

            }
            ?>

        </div>
    </div>
</div>



<script>
        function products() {
            document.getElementById("form_id").submit();
        }
</script>

<script>




        $(document).ready(function () {

            if ($('#clock').length) {
                $('#clock').countdown('<?= date('Y/m/d'); ?> 23:59:59').on('update.countdown', function (event) {
                    var $this = $(this).html(event.strftime(''

                            + '<div class="digit">%H<span>Hrs</span></div><div class="digit">:</div>'
                            + '<div class="digit">%M<span>Min</span></div></div><div class="digit">:</div>'
                            + '<div class="last digit">%S<span>Sec</span></div>'));
                });
            }
            $(".add_to_cart").click(function () {

                var id = $(this).attr('id');
                var canname = $("#cano_name_" + id).val();
                var qty = $(".qty_" + id).val();
                addtocart(canname, qty);
            });
        });

        function addtocart(canname, qty) {

            $.ajax({
                type: "POST",
                url: baseurl + 'cart/Buynow',
                data: {cano_name: canname, qty: qty}
            }).done(function (data) {
                $(".cart_box").html(data);
                $(".cart_box").show();
                $("html, body").animate({scrollTop: 0}, "slow");
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

                $(".cart_box").html(data);
                $(".cart_box").show();
                $("html, body").animate({scrollTop: 0}, "slow");
                hideLoader();
            });
        }

        function showLoader() {
            $('.over-lay').show();
        }
        function hideLoader() {
            $('.over-lay').hide();
        }

</script>