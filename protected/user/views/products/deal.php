
<style>
        .list-inline {
                padding-top: 0px;

        }

</style>
<div class="clearfix"></div>


<div class="container sofa">
        <div class="row">




                <div style="padding-top: 108px;">
                        <?php if (Yii::app()->user->hasFlash('success')): ?>
                                <div class="alert alert-success mesage">
                                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                </div>
                        <?php endif; ?>
                        <?php if (Yii::app()->user->hasFlash('error')): ?>
                                <div class="alert alert-danger mesage">
                                        <strong>sorry!</strong><?php echo Yii::app()->user->getFlash('error'); ?>
                                </div>
                        <?php endif; ?>
                </div>

                <div class="form-group">
                        <form  id="form_id" name="submit"  method="get">
                                <select name="category" onchange="products();">
                                        <option value="">Type</option>
                                        <option value="1">Best Seller</option>
                                        <option value="2">Price Low To High</option>
                                        <option value="3">Price High To Low</option>
                                        <option value="4">Name A-Z</option>
                                        <option value="5">Name Z-A</option>
                                </select>
                        </form>
                </div>
                <div class="col-md-9 pickle-space" style="padding-top: 178px;">

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

</div>
<script>
        function products() {
                document.getElementById("form_id").submit();
        }
</script>

<script>



        $(document).ready(function () {

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