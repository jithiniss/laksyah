<style>
        .hedng h3{
                color: #F7931E;
                text-align: center;
        }
        .crt-div{
                padding-left: 121px;


        }
</style>


<div class="container crt-div">
        <div>
                <div class="row">
                        <div class="col-md-12 hedng">

                                <h3>Order Summary</h3>

                        </div>
                </div>
        </div>

        <div class="modal zoomIn" id="edit_gift_option" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Gift Address</h4>
                                </div>
                                <div class="modal-body edit_modal">




                                </div>
                        </div>
                </div>
        </div>
        <div class="modal zoomIn" id="giftpopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                        <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Gift Address</h4>
                                </div>
                                <div class="modal-body">


                                        <div class="form">

                                                <?php
                                                $form = $this->beginWidget('CActiveForm', array(
                                                    'id' => 'temp-user-gifts-form',
                                                    // Please note: When you enable ajax validation, make sure the corresponding
                                                    // controller action is handling ajax validation correctly.
                                                    // There is a call to performAjaxValidation() commented in generated controller code.
                                                    // See class documentation of CActiveForm for details on this.
                                                    'enableAjaxValidation' => false,
                                                ));
                                                ?>

                                                <?php echo $form->errorSummary($gift_user); ?>
                                                <br/>
                                                <?php if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) { ?>
                                                        <div class="form-group">
                                                                <?php echo $form->hiddenField($gift_user, 'user_id', array('class' => 'form-control', 'value' => Yii::app()->session['user']['id']));
                                                                ?>
                                                                <?php echo $form->error($gift_user, 'user_id'); ?>
                                                        </div>
                                                        <div class="form-group">
                                                                <?php echo $form->hiddenField($gift_user, 'order_product_id', array('class' => 'form-control', 'id' => 'order_product_id')); ?>
                                                                <?php echo $form->error($gift_user, 'order_product_id'); ?>
                                                        </div>
                                                        <div class="form-group">
                                                                <?php echo $form->hiddenField($gift_user, 'order_id', array('class' => 'form-control', 'value' => Yii::app()->session['orderid'])); ?>
                                                                <?php echo $form->error($gift_user, 'order_id'); ?>
                                                        </div>

                                                <?php } else { ?>
                                                        <div class="form-group">
                                                                <?php echo $form->hiddenField($gift_user, 'session_id', array('class' => 'form-control', 'value' => Yii::app()->session['temp_user'])); ?>
                                                                <?php echo $form->error($gift_user, 'session_id'); ?>
                                                        </div>
                                                        <div class="form-group">
                                                                <?php echo $form->hiddenField($gift_user, 'cart_id', array('class' => 'form-control', 'id' => 'gift_cart_id')); ?>
                                                                <?php echo $form->error($gift_user, 'cart_id'); ?>
                                                        </div>

                                                <?php } ?>

                                                <div class="form-group">
                                                        <?php echo $form->labelEx($gift_user, 'from'); ?>
                                                        <?php echo $form->textField($gift_user, 'from', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                                        <?php echo $form->error($gift_user, 'from'); ?>
                                                </div>
                                                <div class="form-group">
                                                        <?php echo $form->labelEx($gift_user, 'to'); ?>
                                                        <?php echo $form->textField($gift_user, 'to', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                                        <?php echo $form->error($gift_user, 'to'); ?>
                                                </div>
                                                <div class="form-group">
                                                        <?php echo $form->labelEx($gift_user, 'message'); ?>
                                                        <?php echo $form->textArea($gift_user, 'message', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                                                        <?php echo $form->error($gift_user, 'message'); ?>
                                                </div>
                                                <div class="modal-footer">
                                                        <?php echo CHtml::submitButton($gift_user->isNewRecord ? 'Submit' : 'Save', array('class' => 'btn btn-primary')); ?>
                                                </div>
                                                <?php $this->endWidget(); ?>
                                        </div>

                                </div>
                        </div>
                </div>
        </div>
        <?php
        foreach ($carts as $cart) {

                $prod_details = Products::model()->findByPk($cart->product_id);
                $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                ?>
                <div class="row">
                        <div class="">
                                <div class="col-md-3">
                                        <?php
                                        if ($cart->options != 0) {
                                                $option = Options::model()->findByPk($cart->options)
                                                ?>
                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/options/<?= $option->id; ?>/small.<?php echo $option->image; ?>" class="img-responsive crt" align="absmiddle" style="max-height:300px; max-width:200px;display: block;">
                                                <?php
                                        } else {
                                                ?>
                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>" class="img-responsive crt" align="absmiddle" style="max-height:300px; max-width:200px;display: block;">
                                        <?php } ?>
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/name/<?php echo $prod_details->canonical_name; ?>"style="font-size:20px;color: #F04032;text-decoration: none;"><?php echo $prod_details->product_name; ?></a>
                                </div>
                                <div class="col-md-2" style="padding-top: 37px;">
                                        <?php
                                        $trimstring = substr($prod_details->description, 0, 100);
                                        ?>
                                        <p><?= $trimstring; ?></p>
                                        <select  class="quantity" cart="<?php echo $cart->id; ?>" style="padding: 5px;">
                                                <?php
                                                $quantity = $prod_details->quantity;
                                                for ($i = 1; $i < $quantity + 1; $i++) {
                                                        ?>
                                                        <option <?= $cart->quantity == $i ? 'selected' : '' ?> value="<?= $i; ?>"><?= $i; ?> </option>

                                                <?php }
                                                ?>
                                        </select>
                                </div>

                                <div class="col-md-2" style="padding-top: 37px;">
                                        <?php
                                        if ($cart->options != 0) {

                                                $price = Options::model()->findByPk($cart->options)->amount;
                                        } else {
                                                if ($prod_details->discount) {
                                                        $price = $prod_details->price - $prod_details->discount;
                                                } else {
                                                        $price = $prod_details->price;
                                                }
                                        }
                                        $cart_qty = $cart->quantity;
                                        $tot_price = ($cart_qty * $price) + $cart->rate;
                                        ?>
                                        <h5>Gift vouchers</h5>


                                        <input type="checkbox" <?php if ($cart->gift_option == '1') { ?> checked="" disabled="" <?php } ?> cart_id="<?php echo $cart->id; ?>" option="<?php echo $cart->options; ?>" product_id="<?php echo $cart->product_id; ?>" <?php if (isset(Yii::app()->session['orderid'])) { ?> order_id="<?php echo Yii::app()->session['orderid']; ?>"  <?php } ?>  name="gift" id="gift_check_<?php echo $cart->id; ?>" value="1" class="gift_options">This is a Gift<br>
                                        <?php if ($tot_price < 5000) { ?>
                                                <div class="gift_msg_<?php echo $cart->id; ?>"><h4 style='color:red; font-size:14px;' >This will be charged an extra of Rs.250 for customized  gift card and gift packing</h4></div>
                                        <?php } else { ?>
                                                <div class="gift_msg_<?php echo $cart->id; ?>"><h4  style=' font-size:14px;'>You are eligible  for a free  customized gift card and gift packing.</h4></div>
                                        <?php }
                                        ?>

                                </div>
                                <div class = "col-md-2">

                                        <h1><br><span class = "range_<?php echo $cart->id; ?>" style = "font-size: 15px">
                                                        <?php echo Yii::app()->Currency->convert($tot_price);
                                                        ?></span></h1>
                                        <input type="hidden" id="cart_<?php echo $cart->id; ?>" value="<?php echo $prod_details->id; ?>">
                                </div>
                                <div class="col-md-3" style="padding-top: 67px;">
                                        <a style="font-size: 22px;"href="<?= Yii::app()->request->baseUrl; ?>/index.php/cart/Delete/<?= $cart->id; ?>"><i class="fa cart-del fa-trash-o"></i></a>
                                </div>

                        </div>
                </div>
                <?php
                if ($cart->gift_option == 1) {
                        ?>
                        <?php
                        if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                                ?>
                                <?php
                                $order_product_id = OrderProducts::model()->findByAttributes(array('order_id' => Yii::app()->session['orderid'], 'product_id' => $cart->product_id, 'option_id' => $cart->options))->id;

                                $gift_user_details = UserGifts::model()->findByAttributes(array('user_id' => $cart->user_id, 'order_id' => Yii::app()->session['orderid'], 'order_product_id' => $order_product_id));
                                ?>
                                <?php
                        } else {
                                ?>

                                <?php $gift_user_details = TempUserGifts::model()->findByAttributes(array('session_id' => $cart->session_id, 'cart_id' => $cart->id)); ?>

                        <?php } ?>
                        <hr>
                        <div class="row" id="gift_cnt_<?php echo $cart->id; ?>">

                                <div class="col-xs-12 col-sm-4">
                                        <h3>GIft Pack</h3>
                                        <h4>Message : <?php echo $gift_user_details->message; ?></h4>
                                        <a  class="edit_gift" cart_id="<?php echo $cart->id; ?>" session_id="<?php echo $cart->session_id; ?>">Edit</a>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                        <h3>Price</h3>
                                        <h5>Rs.<?php echo $cart->rate; ?></h4>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                        <form method="post" action="<?= Yii::app()->request->baseUrl; ?>/index.php/cart/Removegift/">
                                                <?php if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) { ?>
                                                        <input type="hidden" value="<?php echo $cart->id; ?>" name="cart_id" />
                                                        <input type="hidden" value="<?php echo $gift_user_details->id; ?>" name="gift_id" />
                                                <?php } else { ?>
                                                        <input type="hidden" value="<?php echo $cart->id; ?>" name="cart_id" />
                                                        <input type="hidden" value="<?php echo $gift_user_details->id; ?>" name="gift_id" />

                                                <?php } ?>
                                                <button type="submit">Remove Gift Pack</a>

                                        </form>
                                </div>

                        </div>
                        <hr>

                        <?php
                } else {

                }
                ?>



                <?php
                $total+= $tot_price;
        }
        ?>
        <img src="<?= Yii::app()->request->baseUrl; ?>/images/cartbr.png" class="img-responsive crthi"></br>
        <div class="has">
                <div class="container">
                        <div class="row">
                                <div class="col-md-2 col-sm-2 col-xs-12">

                                        <i class="fa fa-angle-left"></i><a href="<?= Yii::app()->baseUrl; ?>/index.php">&nbsp;&nbsp;Continue with shopping</a>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12">
                                        <a href="<?= Yii::app()->baseUrl; ?>/index.php/Cart/EmptyCart">Empty Cart</a>
                                </div>


                                <div class="col-md-4 col-sm-4 col-xs-12"  style="text-align:center;">
                                        <ul class="inew" style="list-style: none;">
                                                <li>YOU PAY</li>
                                                <li>(inclusive of all taxes)</li>
                                        </ul>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                        <ul class="hour" style="list-style: none;">
                                                <li class="range"> <?php echo Yii::app()->Currency->convert($total); ?></li>
                                        </ul>
                                </div>
                                <div class="col-md-12">
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/Proceed/<?php echo $prod->id; ?>"><button type="button" class="btn btn-success cartpg">PROCEED&nbsp;<i class="fa fa-angle-right "></i> </button></a>
                                </div>
                        </div>
                </div>
        </div>
</div>


<script>
        $(document).ready(function () {
                /*
                 * Edit Gift
                 */
                $('.edit_gift').click(function () {
                        var cart_id = $(this).attr('cart_id');
                        var session_id = $(this).attr('session_id');
                        editgift(cart_id, session_id);


                });
                $('.gift_options').click(function () {
                        if ($(this).is(":checked"))
                        {
                                var cart_id = $(this).attr('cart_id');

                                $('#temp-user-gifts-form').trigger("reset");
                                $("#giftpopup").modal('show');
<?php if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) { ?>
                                        var product_id = $('#gift_check_' + cart_id).attr('product_id');
                                        var order_id = $('#gift_check_' + cart_id).attr('order_id');
                                        var option = $('#gift_check_' + cart_id).attr('option');
                                        getorderproduct(product_id, order_id, option);
<?php } else { ?>
                                        var cart_id = $(this).attr("id");
                                        $("#gift_cart_id").val(cart_id);
<?php } ?>
                        }
                });
                $('.quantity').change(function () {
                        showLoader();
                        var cart = $(this).attr('cart');
                        var qty = this.value;
                        var product_id = $('#cart_' + cart).val();
                        quantityChange(cart, qty, product_id);
                        total();
                });
        });
        function getorderproduct(product_id, order_id, option) {
                $.ajax({
                        type: "POST",
                        cache: 'false',
                        async: false,
                        url: baseurl + 'Cart/Getorderproduct',
                        data: {product_id: product_id, order_id: order_id, option: option},
                }).done(function (data) {

                        $("#order_product_id").val(data);
                        hideLoader();
                });


        }
        function quantityChange(cart, qty, product_id) {
                $.ajax({
                        type: "POST",
                        cache: 'false',
                        async: false,
                        url: baseurl + 'Cart/Calculate',
                        data: {cart_id: cart, Qty: qty, prod_id: product_id},
                }).done(function (data) {
                        $(".range_" + cart).html('Rs.' + data);
                        if (data < 3000) {
                                $("#gift_cnt_" + cart + " h5").html('Rs.200');
                                $(".gift_msg_" + cart).html('<h4 style="color:red; font-size:14px; " >This will be charged an extra of Rs.250 for customized  gift card and gift packing</h4>');
                        } else {
                                $("#gift_cnt_" + cart + " h5").html('Rs.0');
                                $(".gift_msg_" + cart).html('<h4  style="font-size:14px;">You are eligible  for a free  customized gift card and gift packing.</h4>');
                        }
                        hideLoader();
                });


        }
        function editgift(cart_id, session_id) {

                $.ajax({
                        type: "POST",
                        cache: 'false',
                        async: false,
                        url: baseurl + 'Cart/EditGIft',
                        data: {cart_id: cart_id, session_id: session_id},
                }).done(function (data) {
                        $(".edit_modal").html(data);
                        $("#edit_gift_option").modal('show');
                        hideLoader();
                });


        }
        function total() {
                $.ajax({
                        type: "POST",
                        cache: 'false',
                        async: false,
                        url: baseurl + 'Cart/Total',
                        data: {}
                }).done(function (data) {
                        $(".range").html('Rs.' + data);
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









