<div class="clearfix"></div>
<div class="container">
        <div class="row">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'user-address-form',
                    'htmlOptions' => array('class' => 'form-group'),
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => false,
                ));
                ?>
                <div class="col-md-8">
                        <div class="set-mingg">
                                <div class="">
                                        <div class="row">

                                                <!--            <a href="#add_address" data-toggle="collapse" data-parent="#accordion">Add New Address</a><br>-->

                                                <div class="col-md-12 forward"  id="add_address">
                                                        <div class="row">

                                                                <?php // echo $form->errorSummary($model);     ?>
                                                                <?php if (Yii::app()->user->hasFlash('success')):
                                                                        ?>
                                                                        <div class="info">
                                                                                <?php echo Yii::app()->user->getFlash('success'); ?>
                                                                        </div>
                                                                <?php endif; ?>
                                                                <?php if (Yii::app()->user->hasFlash('checkout_error')): ?>
                                                                        <div class="alert alert-danger fade in">

                                                                                <?php echo Yii::app()->user->getFlash('checkout_error'); ?>
                                                                        </div>

                                                                <?php endif; ?>
                                                                <div class="bill_details">
                                                                        <input type="hidden" value="<?php echo $deafult_shipping->country; ?>" class="country_default" name="country_default" />
                                                                        <h3>Billing Details</h3>
                                                                        <div class="clearfix"></div>
                                                                        <h5>Select a billing address from your address book or enter  a new address.</h5>
                                                                        <select  name="bill_address" class="select_bill_exist" id="bill_exist">
                                                                                <option  value="0">New Address</option>
                                                                                <?php
                                                                                foreach ($addresss as $address) {
                                                                                        ?>
                                                                                        <option <?php
                                                                                        if ($address->default_billing_address == 1) {
                                                                                                echo 'selected';
                                                                                        }
                                                                                        ?>  value="<?php echo $address->id; ?>"><?php echo $address->first_name; ?> <?php echo $data->last_name; ?> ,   <?php echo $address->address_1; ?>
                                                                                                <?php echo $address->address_2; ?> , <?php echo $address->city; ?> ,
                                                                                                <?php echo $address->state; ?> , <?php echo $address->country; ?>
                                                                                                <?php echo $address->postcode; ?></option>
                                                                                        <?php
                                                                                        if (isset($_GET['box'])) {
                                                                                                echo "Success!";
                                                                                        }
                                                                                }
                                                                                ?>
                                                                        </select>
                                                                        <br />
                                                                        <br />
                                                                        <br />
                                                                </div>
                                                                <div class="row  bill_form" style="">
                                                                        <?php //echo $form->errorSummary($billing); ?>
                                                                        <div class="col-md-4">
                                                                                <?php echo $form->labelEx($billing, '[bill]first_name', array('class' => 'control-label')); ?>
                                                                                <?php echo $form->textField($billing, '[bill]first_name', array('placeholder' => 'First Name ', 'class' => 'form-control aik')); ?>
                                                                                <?php echo $form->error($billing, '[bill]first_name'); ?>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                                <?php echo $form->labelEx($billing, '[bill]last_name', array('class' => 'control-label')); ?>
                                                                                <?php echo $form->textField($billing, '[bill]last_name', array('placeholder' => 'Last Name ', 'class' => 'form-control aik')); ?>
                                                                                <?php echo $form->error($billing, '[bill]last_name'); ?>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                                <?php echo $form->labelEx($billing, '[bill]contact_number', array('class' => 'control-label')); ?>
                                                                                <?php echo $form->textField($billing, '[bill]contact_number', array('placeholder' => 'Contact Number ', 'class' => 'form-control aik')); ?>
                                                                                <?php echo $form->error($billing, '[bill]contact_number'); ?>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                                <?php echo $form->labelEx($billing, '[bill]address_1', array('class' => 'control-label')); ?>
                                                                                <?php echo $form->textField($billing, '[bill]address_1', array('placeholder' => 'Address Line 1 ', 'class' => 'form-control aik')); ?>
                                                                                <?php echo $form->error($billing, '[bill]address_1'); ?>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                                <?php echo $form->labelEx($billing, '[bill]address_2', array('class' => 'control-label')); ?>
                                                                                <?php echo $form->textField($billing, '[bill]address_2', array('placeholder' => 'Address Line 2 ', 'class' => 'form-control aik')); ?>
                                                                                <?php echo $form->error($billing, '[bill]address_2'); ?>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                                <?php echo $form->labelEx($billing, '[bill]city', array('class' => 'control-label')); ?>
                                                                                <?php echo $form->textField($billing, '[bill]city', array('placeholder' => 'City ', 'class' => 'form-control aik')); ?>
                                                                                <?php echo $form->error($billing, '[bill]city'); ?>
                                                                        </div>

                                                                        <div class="col-md-4">
                                                                                <?php echo $form->labelEx($billing, '[bill]postcode', array('class' => 'control-label')); ?>
                                                                                <?php echo $form->textField($billing, '[bill]postcode', array('placeholder' => 'Postal Code ', 'class' => 'form-control aik')); ?>
                                                                                <?php echo $form->error($billing, '[bill]postcode'); ?>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                                <?php echo $form->labelEx($billing, '[bill]country', array('class' => 'control-label')); ?>
                                                                                <?php echo CHtml::activeDropDownList($billing, '[bill]country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select--', 'class' => 'form-control aik')); ?>

                                                                                <?php echo $form->error($billing, '[bill]country'); ?>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                                <?php echo $form->labelEx($billing, '[bill]state', array('class' => 'control-label')); ?>
                                                                                <?php echo $form->textField($billing, '[bill]state', array('placeholder' => 'state ', 'class' => 'form-control aik')); ?>

                                                                                <?php echo $form->error($billing, '[bill]state'); ?>
                                                                        </div>

                                                                </div>


                                                        </div>



                                                        <div class="row">
                                                                <br />
                                                                <br />

                                                                <h3>Shipping Details</h3>

                                                                <input type="checkbox" checked="" name="billing_same" value="1" class="bill_same">Same As Billing Address
                                                                <br />
                                                                <br />
                                                                <div class="ship_form">
                                                                        <div class="clearfix"></div>
                                                                        <h5>Select a Shipping address from your address book or enter  a new address.</h5>
                                                                        <select  name="ship_address" class="select_ship_exist">
                                                                                <option  value="0">New Address</option>
                                                                                <?php
                                                                                foreach ($addresss as $address) {
                                                                                        ?>
                                                                                        <option  value="<?php echo $address->id; ?>"><?php echo $address->first_name; ?> <?php echo $data->last_name; ?> ,   <?php echo $address->address_1; ?>
                                                                                                <?php echo $address->address_2; ?> , <?php echo $address->city; ?> ,
                                                                                                <?php echo $address->state; ?> , <?php echo $address->country; ?>
                                                                                                <?php echo $address->postcode; ?></option>
                                                                                        <?php
                                                                                        if (isset($_GET['box'])) {
                                                                                                echo "Success!";
                                                                                        }
                                                                                }
                                                                                ?>
                                                                        </select>

                                                                        <br />

                                                                        <div class="clearfix"></div>

                                                                        <br />

                                                                        <div class="row ship_form_content">
                                                                                <div class="col-md-4">
                                                                                        <?php echo $form->labelEx($shipping, '[ship]first_name', array('class' => 'control-label')); ?>
                                                                                        <?php echo $form->textField($shipping, '[ship]first_name', array('placeholder' => 'First Name ', 'class' => 'form-control aik1')); ?>
                                                                                        <?php echo $form->error($shipping, '[ship]first_name'); ?>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                        <?php echo $form->labelEx($shipping, '[ship]last_name', array('class' => 'control-label')); ?>
                                                                                        <?php echo $form->textField($shipping, '[ship]last_name', array('placeholder' => 'Last Name ', 'class' => 'form-control aik1')); ?>
                                                                                        <?php echo $form->error($shipping, '[ship]last_name'); ?>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                        <?php echo $form->labelEx($shipping, '[ship]contact_number', array('class' => 'control-label')); ?>
                                                                                        <?php echo $form->textField($shipping, '[ship]contact_number', array('placeholder' => 'Contact Number ', 'class' => 'form-control aik1')); ?>
                                                                                        <?php echo $form->error($shipping, '[ship]contact_number'); ?>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                        <?php echo $form->labelEx($shipping, '[ship]address_1', array('class' => 'control-label')); ?>
                                                                                        <?php echo $form->textField($shipping, '[ship]address_1', array('placeholder' => 'Address Line 1 ', 'class' => 'form-control aik1')); ?>
                                                                                        <?php echo $form->error($shipping, '[ship]address_1'); ?>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                        <?php echo $form->labelEx($shipping, '[ship]address_2', array('class' => 'control-label')); ?>
                                                                                        <?php echo $form->textField($shipping, '[ship]address_2', array('placeholder' => 'Address Line 2 ', 'class' => 'form-control aik1')); ?>
                                                                                        <?php echo $form->error($shipping, '[ship]address_2'); ?>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                        <?php echo $form->labelEx($shipping, '[ship]city', array('class' => 'control-label')); ?>
                                                                                        <?php echo $form->textField($shipping, '[ship]city', array('placeholder' => 'City ', 'class' => 'form-control aik1')); ?>
                                                                                        <?php echo $form->error($shipping, '[ship]city'); ?>
                                                                                </div>

                                                                                <div class="col-md-4">
                                                                                        <?php echo $form->labelEx($shipping, '[ship]postcode', array('class' => 'control-label')); ?>
                                                                                        <?php echo $form->textField($shipping, '[ship]postcode', array('placeholder' => 'Postal Code ', 'class' => 'form-control aik1')); ?>
                                                                                        <?php echo $form->error($shipping, '[ship]postcode'); ?>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                        <?php echo $form->labelEx($shipping, '[ship]country', array('class' => 'control-label')); ?>
                                                                                        <?php echo CHtml::activeDropDownList($shipping, '[ship]country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select--', 'class' => 'form-control aik1 shipping_country')); ?>

                                                                                        <?php echo $form->error($shipping, '[ship]country'); ?>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                        <?php echo $form->labelEx($shipping, '[ship]state', array('class' => 'control-label')); ?>
                                                                                        <?php echo $form->textField($shipping, '[ship]state', array('placeholder' => 'state ', 'class' => 'form-control aik1')); ?>

                                                                                        <?php echo $form->error($shipping, '[ship]state'); ?>
                                                                                </div>




                                                                        </div>



                                                                </div>
                                                                <div class="container">
                                                                        <div class="row">
                                                                                <div class="col-xs-12 col-sm-6">

                                                                                        <?php if (Yii::app()->user->hasFlash('shipp_availability')): ?>
                                                                                                <div class="alert alert-danger fade in">
                                                                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">x</a>
                                                                                                        <?php echo Yii::app()->user->getFlash('shipp_availability'); ?>
                                                                                                </div>

                                                                                        <?php endif; ?>
                                                                                        <h3>Shipping Method</h3>
                                                                                        <div id="shipping_method" class="shipping_method">

                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>


                                                        </div>
                                                </div>

                                        </div>
                                </div>
                        </div>
                </div>
                <div class="col-md-4">

                        <?php
                        foreach ($carts as $cart) {
                                $prod_details = Products::model()->findByPk($cart->product_id);
                                $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                ?>
                                <?php $producttotal = $prod_details->price * $cart->quantity; ?>
                                <div class="row">

                                        <div class="col-xs-4">
                                                <?php
                                                if ($cart->options != 0) {
                                                        $option = Options::model()->findByPk($cart->options)
                                                        ?>
                                                        <img class="img-responsive crt" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/options/<?= $option->id; ?>/small.<?php echo $option->image; ?>" width="100%"/>
                                                        <?php
                                                } else {
                                                        ?>
                                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>" class="img-responsive crt" width="100%" align="absmiddle" style="max-height:300px; max-width:200px;display: block;">
                                                <?php }
                                                ?>
                                        </div>
                                        <div class="col-xs-5">
                                                <h4><?php echo $prod_details->product_name; ?></h4>
                                                <h6>Color : Doeskin</h6>
                                                <h6>Size : Red</h6>
                                                <h6>Qty : <?php echo $cart->quantity; ?></h6>
                                        </div>
                                        <div class = "col-xs-3">
                                                <h6 ><strong><?php
                                                                if (isset(Yii::app()->session['currency'])) {
                                                                        $prod_price = round($prod_details->price, 2) * $cart->quantity;
                                                                        echo Yii::app()->Currency->convert($prod_price);
                                                                } else {
                                                                        $prod_price = $prod_details->price * $cart->quantity;
                                                                        echo Yii::app()->Currency->convert($prod_price);
                                                                }
                                                                ?>
                                                        </strong>
                                                </h6>
                                        </div>



                                </div>

                                <?php
                                if ($cart->gift_option != 0) {
                                        ?>



                                        <?php $gift_user_details = TempUserGifts::model()->findByAttributes(array('cart_id' => $cart->id)); ?>


                                        <div class="row">
                                                <br />
                                                <div class="col-xs-4">
                                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gift_img.jpg" class="img-responsive crt" align="absmiddle" style="max-height:300px; max-width:200px;display: block;">

                                                </div>
                                                <div class="col-xs-5">
                                                        <h4>GIft Pack</h4>
                                                        <h6>From : <?php echo $gift_user_details->from; ?></h6>
                                                        <h6>to : <?php echo $gift_user_details->to; ?></h6>

                                                </div>
                                                <div class = "col-xs-3">
                                                        <h6 ><strong><?php echo Yii::app()->Currency->convert($cart->rate); ?>
                                                                </strong>
                                                        </h6>
                                                </div>



                                        </div>
                                        <hr>

                                        <?php $gift += $cart->rate; ?>
                                        <?php
                                }
                                ?>
                                <?php $product_price += $producttotal; ?>
                                <?php
                        }
                        ?>

                        <?php
                        $coupon = CouponHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'coupon_id' => Yii::app()->session['couponid']));


                        $from = $coupon->date;
                        $to = date('Y-m-d H:i:s');
                        $diff_seconds = strtotime($to) - strtotime($from);
                        $hours = floor($diff_seconds / 3600);
                        $minutes = floor(($diff_seconds % 3600) / 60) + ($hours * 60);
                        ?>
                        <?php $subtotal = $gift + $product_price - $giftvoucher->discount; ?>
                        <?php if ($minutes < 30) { ?>
                                <?php $giftvoucher = Coupons::model()->findByPk($coupon->coupon_id); ?>
                                <div class="row">
                                        <div class="col-xs-12">
                                                <h4>GIFT VOUCHER / GIFT CARD CODE</h4>
                                                <h6>Code : <?php echo $giftvoucher->code; ?></h6>
                                                <h6>Discount : -<?php echo Yii::app()->Currency->convert($giftvoucher->discount); ?></h6>
                                        </div>
                                </div>
                                <?php
                        } else {
                                $giftvoucher = 0;
                        }
                        ?>
                        <hr>
                        <div class="row">
                                <div class="col-xs-12">
                                        <h6>Subtotal : <?php echo Yii::app()->Currency->convert($subtotal); ?></h6>
                                        <h6>Shipping : - <span id="shipping_charge"></span></h6>
                                </div>
                        </div>
                        <hr>
                        <div class="row">
                                <div class="col-xs-12">
                                        <h3>Order Total : <span id="grant_total"></span></h3>

                                </div>
                        </div>
                        <hr>
                        <div class="row">
                                <div class="col-xs-12">
                                        <h2>Wallet </h2>
                                        <?php if (Yii::app()->session['user']['wallet_amt'] != 0) { ?>
                                                <h5>My Credit : <input type="number" class="wallet_amount" value="" /></h5>
                                                <input type="hidden" class="wallet_amount" name="wallet_amount"  />
                                                <h6>Available Credit Balance : <span id="wallet_total"><?php echo Yii::app()->Currency->convert(Yii::app()->session['user']['wallet_amt']); ?></span></h6>
                                        <?php } ?>
                                        <h6>Current Credit  Balance: <span id="wallet_total1"><?php echo Yii::app()->Currency->convert(Yii::app()->session['user']['wallet_amt']); ?></span></h6>


                                </div>
                        </div>
                        <hr>
                        <div class="row">
                                <div class="col-xs-12">
                                        <div class="total_to_pay">
                                                <h3 >Total Amount to pay : <span id="total_pay"></span> <input type="hidden" name="total_pay" class="total_pay" /></h3>
                                                <label><input type="radio" checked="" name="payment_method" value="2">CREDIT/DEBIT/NET BANKING</label> <label><input type="radio" name="payment_method" value="3">PAYPAL</label>

                                        </div>
                                </div>
                        </div>

                        <div class="row">
                                <div class="col-md-12">
                                        <br />
                                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Proceed', array('class' => 'btn btn-success soo')); ?>
                                </div>
                        </div>


                </div>
                <?php $this->endWidget(); ?>

        </div>
</div>
<script>
        var select_val = $('.select_bill_exist').val();

        if (select_val != 0) {
                $('.bill_form').hide();
        } else {
                $('.bill_form').show();
        }
        $(".select_bill_exist").change(function () {
                var select_val = $(this).val();
                if ($('.bill_same').is(":checked"))
                {
                        getcountry(select_val);

                }
                if (select_val != 0) {
                        $('.bill_form').hide();
                } else {
                        $('.bill_form').show();
                }
        });
</script>

<script>
        /*
         * Select already added addressbook
         */


        var select_ship_val = $('.select_ship_exist').val();

        if (select_ship_val != 0) {
                $('.ship_form_content').hide();
        } else {
                $('.ship_form_content').show();
        }
        $(".select_ship_exist").change(function () {
                var select_ship_val = $(this).val();

                if (select_ship_val != 0) {

                        getcountry(select_ship_val);

                        $('.ship_form_content').hide();
                } else {
                        $("#shipping_method").html('Sorry, no quotes are available for this order at this time.');
                        $('.ship_form_content').show();
                }
        });

</script>

<script>
        /*
         * Check whether the order is checked
         */

        if ($('.bill_same').is(":checked"))
        {
                $('.ship_form').hide();

        }
        else {
                $('.ship_form').show();

        }
        $('.bill_same').click(function () {

                if ($(this).is(":checked"))
                {
                        $('.ship_form').hide();

                        var country = $('.select_bill_exist').val();
                        calculatetotalpay();
                        getcountry(country);

                }
                else {
                        $("#shipping_method").html('Sorry, no quotes are available for this order at this time.');
                        $('.ship_form').show();
                }
        });
</script>
<script>
        $('input.select').on('change', function () {
                $('input.select').not(this).prop('checked', false);
        });
        $('input.select2').on('change', function () {
                $('input.select2').not(this).prop('checked', false);
        });
</script>
<script>
        $(document).ready(function () {
                var country = $('.country_default').val();
                getshipmethod(country);
        });
</script>
<script>
        $(".wallet_amount").keyup(function () {
                var wallet = $(this).val();
                if ($('.bill_same').is(":checked"))
                {
                        var countryname = $('#bill_exist').val();
                        var country = getcountryid(countryname);
                }
                else {
                        if ($('.select_ship_exist').val() == 0) {
                                var country = $('.ship_form .shipping_country').val();
                        } else {
                                var countryname = $('.ship_form .select_ship_exist').val();
                                var country = getcountryid(countryname);
                        }
                }

                var grant = $("#grant_total").html();
                totalcalculate(wallet, grant, country);

        });

        function calculatetotalpay() {
                var wallet = $('.wallet_amount').val();
                if ($('.bill_same').is(":checked"))
                {
                        var countryname = $('#bill_exist').val();
                        var country = getcountryid(countryname);
                }
                else {
                        if ($('.select_ship_exist').val() == 0) {
                                var country = $('.ship_form .shipping_country').val();
                        } else {
                                var countryname = $('.ship_form .select_ship_exist').val();
                                var country = getcountryid(countryname);
                        }
                }
                var grant = $("#grant_total").html();
                totalcalculate(wallet, grant, country);
        }
</script>
<script>
        $(".shipping_country").change(function () {
                var country = $('.shipping_country').val();
                getshipmethod(country);
        });
        function getcurencyconvert(total) {
                var result;
                showLoader();
                $.ajax({
                        type: "POST",
                        cache: 'false',
                        async: false,
                        url: baseurl + 'Checkout/currencyconvert',
                        data: {total: total}
                }).done(function (data) {

                        result = data;
                });
                return result;

        }

        function totalcalculate(wallet, grant, country) {

                showLoader();
                $.ajax({
                        type: "POST",
                        cache: 'false',
                        async: false,
                        url: baseurl + 'Checkout/totalcalculate',
                        data: {wallet: wallet, grant: grant, country: country}
                }).done(function (data) {

                        var obj = jQuery.parseJSON(data);

                        $("#wallet_total").html(obj.wallet_balance);
                        if (obj.total == 0) {

                                $(".wallet_amount").val(obj.wallet);
                                $("#total_pay").html(obj.totalamounttopay);
                                $(".total_pay").val(obj.total);
                                $('.total_to_pay').hide();


                        } else {
                                $(".wallet_amount").val(obj.wallet);
                                $('.total_to_pay').show();
                                $("#total_pay").html(obj.totalamounttopay);
                                $(".total_pay").val(obj.total);
                        }

                        //$(".wallet_amount").val(obj.wallet);
                });


        }
        function getshipmethod(country) {
                showLoader();
                $.ajax({
                        type: "POST",
                        cache: 'false',
                        async: false,
                        url: baseurl + 'Checkout/Getshippingmethod',
                        data: {country: country}
                }).done(function (data) {
                        $("#shipping_method").html(data);
                        getshippingcharge(country);
                        calculatetotalpay();
                        hideLoader();
                });
        }
        function getshippingcharge(value) {
                showLoader();
                $.ajax({
                        type: "POST",
                        cache: 'false',
                        async: false,
                        url: baseurl + 'Checkout/Getshippingcharge',
                        data: {country: value}
                }).done(function (data) {
                        var obj = jQuery.parseJSON(data);
                        $("#shipping_charge").html(obj.shippingcharge);
                        $("#grant_total").html(obj.granttotal);
                        $("#total_pay").html(obj.granttotal);
                        $(".total_pay").val(obj.totalpay);
                        calculatetotalpay();
                        hideLoader();
                });
        }
        function getcountryid(country) {
                var result;
                showLoader();
                $.ajax({
                        type: "POST",
                        cache: 'false',
                        async: false,
                        url: baseurl + 'Checkout/Getcountry',
                        data: {country: country}
                }).done(function (data) {

                        result = data;
                        hideLoader();
                });
                return result;
        }
        function getcountry(country) {
                showLoader();
                $.ajax({
                        type: "POST",
                        cache: 'false',
                        async: false,
                        url: baseurl + 'Checkout/Getcountry',
                        data: {country: country}
                }).done(function (data) {

                        getshippingcharge(data);
                        if (data != 0) {
                                getshipmethod(data);
                        }
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

