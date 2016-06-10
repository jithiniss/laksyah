<div class="container main_container inner_pages ">
    <h1>Method</h1>
    <div class="price_group radio_buttons" id="fitting">
        <form id="myForm">
            <?php // $model->type = 1; ?>
            <label class="radio_group active" id="UserSizechart_type_0" >
                <input type="radio" class="chekbx stand" hidden="true" value="1" name="radioName">
                <?php //echo $form->radioButton($model, 'type', array('value' => 1, 'uncheckValue' => null, 'hidden' => 'true', 'class' => 'chekbx stand')); ?>
            </label>
            <span class="radio_label pull-left">By Mail</span>
            <label class="radio_group" id="UserSizechart_type_1" >
                <input type="radio" class="chekbx stand" hidden="true" value="2" name="radioName">
                <?php //echo $form->radioButton($model, 'type', array('value' => 2, 'uncheckValue' => null, 'hidden' => 'true', 'class' => 'chekbx cstum')); ?>
            </label>
            <span class="radio_label pull-left">By Post</span>
            <div class="clearfix"></div>
        </form>
    </div>

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
    <div class="row">
        <div class="col-md-8">
            <div class="check_out related_element">
                <div class="border_box">
                    <input type="hidden" value="<?php echo $deafult_shipping->country; ?>" class="country_default" name="country_default" />
                    <div class="box_title">
                        Billing Details
                    </div>
                    <div class="box_content">
                        <h3>Biiling Address</h3>
                        <div class="form_row">
                            <label>Select a billing address from your address book or enter a new address.</label>
                            <select  name="bill_address" class="select_bill_exist form-control" id="bill_exist">
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
                        </div>

                        <div class=" bill_form" style="">
                            <div class="row">
                                <?php //echo $form->errorSummary($billing); ?>
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]first_name', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($billing, '[bill]first_name', array('placeholder' => 'First Name ', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]first_name'); ?>
                                </div>

                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]last_name', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($billing, '[bill]last_name', array('placeholder' => 'Last Name ', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]last_name'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]contact_number', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($billing, '[bill]contact_number', array('placeholder' => 'Contact Number ', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]contact_number'); ?>
                                </div>

                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]address_1', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($billing, '[bill]address_1', array('placeholder' => 'Address Line 1 ', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]address_1'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]address_2', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($billing, '[bill]address_2', array('placeholder' => 'Address Line 2 ', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]address_2'); ?>
                                </div>

                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]city', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($billing, '[bill]city', array('placeholder' => 'City ', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]city'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]postcode', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($billing, '[bill]postcode', array('placeholder' => 'Postal Code ', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]postcode'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]country', array('class' => 'control-label')); ?>
                                    <?php echo CHtml::activeDropDownList($billing, '[bill]country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select--', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]country'); ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($billing, '[bill]state', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($billing, '[bill]state', array('placeholder' => 'state ', 'class' => 'form-control aik')); ?>
                                    <?php echo $form->error($billing, '[bill]state'); ?>
                                </div>
                                <div class="col-sm-6">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>



                <div class="border_box" id="shipping_address">
                    <div class="box_title">
                        Shipping Details
                    </div>
                    <div class="box_content">
                        <h3>Shipping Address <span class="pull-right"><input type="checkbox" checked=""  name="billing_same" value="1" class="bill_same"><label>Same as Billing Address</label></span></h3>
                        <div class="ship_form">
                            <div class="form_row">
                                <label>Select a billing address from your address book or enter a new address.</label>
                                <select  name="ship_address" class="select_ship_exist form-control">
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
                            </div>


                            <div class="row ship_form_content">
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]first_name', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]first_name', array('placeholder' => 'First Name ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]first_name'); ?>
                                </div>

                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]last_name', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]last_name', array('placeholder' => 'Last Name ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]last_name'); ?>
                                </div>
                            </div>
                            <div class="row ship_form_content">
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]contact_number', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]contact_number', array('placeholder' => 'Contact Number ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]contact_number'); ?>
                                </div>

                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]address_1', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]address_1', array('placeholder' => 'Address Line 1 ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]address_1'); ?>
                                </div>
                            </div>
                            <div class="row ship_form_content">
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]address_2', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]address_2', array('placeholder' => 'Address Line 2 ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]address_2'); ?>
                                </div>

                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]city', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]city', array('placeholder' => 'City ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]city'); ?>
                                </div>
                            </div>
                            <div class="row ship_form_content">
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]postcode', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]postcode', array('placeholder' => 'Postal Code ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]postcode'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]country', array('class' => 'control-label')); ?>
                                    <?php echo CHtml::activeDropDownList($shipping, '[ship]country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select--', 'class' => 'form-control aik1 shipping_country')); ?>

                                    <?php echo $form->error($shipping, '[ship]country'); ?>
                                </div>
                            </div>
                            <div class="row ship_form_content">
                                <div class="col-sm-6">
                                    <?php echo $form->labelEx($shipping, '[ship]state', array('class' => 'control-label')); ?>
                                    <?php echo $form->textField($shipping, '[ship]state', array('placeholder' => 'state ', 'class' => 'form-control aik1')); ?>
                                    <?php echo $form->error($shipping, '[ship]state'); ?>
                                </div>
                                <div class="col-sm-6">

                                </div>
                            </div>
                        </div>
                        <h3>Shipping Method</h3>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <?php if (Yii::app()->user->hasFlash('shipp_availability')): ?>
                                        <div class="alert alert-danger fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">x</a>
                                            <?php echo Yii::app()->user->getFlash('shipp_availability'); ?>
                                        </div>

                                <?php endif; ?>

                                <div id="shipping_method" class="shipping_method">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 sidebar-right">
            <div class="fixed_scroller">
                <div class="order_summary">
                    <div class="panel-body cart_products">

                        <?php
                        $card_details = GiftCard::model()->findByPk(Yii::app()->session['gift_card_detail']);
                        ?>
                        <div class="cart_product_detail">

                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/gift/<?php echo $card_details->id; ?>.<?php echo $card_details->image; ?>" class="img-responsive crt">


                            <h3><?php echo $card_details->name; ?><span class="pull-right"><strong><?php
                                        if (isset(Yii::app()->session['currency'])) {
                                                $prod_price = round($card_details->amount, 2);
                                                echo Yii::app()->Currency->convert($prod_price);
                                        } else {
                                                $prod_price = $card_details->amount;
                                                echo Yii::app()->Currency->convert($prod_price);
                                        }
                                        ?>
                                    </strong></span>
                            </h3>
                            <div class="clearfix"></div>

                        </div>
                        <div class="cart_product_detail">

                            <?php
                            if ($cart->gift_option != 0) {
                                    ?>

                                    <?php $gift_user_details = TempUserGifts::model()->findByAttributes(array('cart_id' => $cart->id)); ?>
                                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/laksyah_gift.jpg" class="img-responsive crt"  />
                                    <h3>GIFT PACK <span class="pull-right"><strong><?php echo Yii::app()->Currency->convert($cart->rate); ?>
                                            </strong></span>
                                    </h3>
                                    <p><span>From:</span><?php echo $gift_user_details->from; ?></p>
                                    <p><span>To:</span> <?php echo $gift_user_details->to; ?></p>
                                    <div class="clearfix"></div>
                                    <?php $gift += $cart->rate; ?>

                                    <?php
                            }
                            ?>

                            <?php $product_price += $producttotal; ?>
                        </div>


                    </div>


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
                            <div class="panel-body gift_card_details">
                                <h4>GIFT VOUCHER / GIFT CARD CODE</h4>
                                <p><span>Code:</span>	<?php echo $giftvoucher->code; ?></p>
                                <p><span>Discount:</span><strong class="pull-right"><?php echo Yii::app()->Currency->convert($giftvoucher->discount); ?></strong></p>
                                <div class="clearfix"></div>
                            </div>
                            <?php
                    } else {
                            $giftvoucher = 0;
                    }
                    ?>




                </div>
                <div class="order_amount">
                    <div class="price_group">

                        <div class="pull-left">Subtotal : </div>
                        <div class="pull-right"><?php echo Yii::app()->Currency->convert($subtotal); ?></div>
                        <div class="clearfix"></div>

                    </div>
                    <div class="price_group">
                        <div class="pull-left">Shipping</div>
                        <div class="pull-right"><span id="shipping_charge"></span></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="seperator"></div>
                    <div class="price_group total_amount">

                        <div class="pull-left">ORDER TOTAL</div>
                        <div class="pull-right"><span id="grant_total"></span></div>
                        <div class="clearfix"></div>

                    </div>
                    <div class="price_group apply_credit">

                        <?php if (Yii::app()->session['user']['wallet_amt'] != 0) { ?>
                                <div class="pull-left">My Credit</div>
                                <div class="pull-right"><input type="number" class="wallet_amount" value="" /></div>
                                <input type="hidden" class="wallet_amount" name="wallet_amount"  />
                                <div class="clearfix"></div>
                                <p class="text-right">Available Credit: <strong>  <span id="wallet_total"><?php echo Yii::app()->Currency->convert(Yii::app()->session['user']['wallet_amt']); ?></span></strong></p>
                        <?php } ?>
                        <?php if (Yii::app()->session['user']['wallet_amt'] > 0) { ?>
                                <p class="text-right">Current Credit Balance: <strong>   <span id="wallet_total1"><?php echo Yii::app()->Currency->convert(Yii::app()->session['user']['wallet_amt']); ?></span></strong></p>
                        <?php } ?>

                    </div>

                </div>
                <div class="total_pay total_to_pay">
                    <div class="price_group">

                        <div class="pull-left">Total Amount to pay :</div>
                        <div class="pull-right"><span id="total_pay"></span> <input type="hidden" name="total_pay" class="total_pay" /></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="price_group payment_method">

                        <strong class="radio_label pull-left"><input type="radio" checked="" name="payment_method" value="2">CREDIT/DEBIT/NET BANKING</strong>
                        <strong class="radio_label pull-left"><input type="radio" name="payment_method" value="3">PAYPAL</strong>
                        <div class="clearfix"></div>



                    </div>
                </div>
                <div class="agree_terms">
                    <p><input type="checkbox" required> By placing an order you agree to our Terms &
                        Conditions and  Privacy Policy</p>
                </div>

                <div class="cart_buttons">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'PAY SECURELY NOW', array('class' => 'btn-primary btn-full', 'id' => 'laksyah_order_payment')); ?>
                </div>

            </div>
            <div class="cart_buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'PAY SECURELY NOW', array('class' => 'btn-primary btn-full', 'id' => 'laksyah_order_payment')); ?>
            </div>
            <?php $this->endWidget(); ?>
        </div>








    </div>
</div>
<script>
        $(document).ready(function () {
            $('#shipping_address').hide();
            $('.chekbx').click(function () {
                var check_value = $(".chekbx:checked").val();
                if (check_value == 2) {
                    if ($('.bill_same').is(":checked"))
                    {
                        getcountry(select_val);

                    }
                    $('#shipping_address').show();
                }
            });
        });
</script>
<script>         var select_val = $('.select_bill_exist').val();
        if (select_val != 0) {
            $('.bill_form').hide();
        } else {
            $('.bill_form').show();
        }
        $(".select_bill_exist").change(function () {
            var select_val_add = $(this).val();
            if (select_val_add != 0) {
                $('.bill_form').hide();
            } else {
                $('.bill_form').show();
            }
        });
</script>

<script>
        $(".wallet_amount"
                ).keyup(function () {
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

        function
                calculatetotalpay() {
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
                async: false, url: baseurl + 'CheckOut/currencyconvert',
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
                async: false, url: baseurl + 'CheckOut/totalcalculate',
                data: {wallet: wallet, grant: grant, country: country}
            }).done(function (data) {
                var obj = jQuery.parseJSON(data);

                $("#wallet_total").html(obj.wallet_balance);
                if (obj.total == 0) {

                    $(".wallet_amount").val(obj.wallet);
                    $("#total_pay").html(obj.totalamounttopay);
                    $(".total_pay").val(obj.total);
                    $('.total_to_pay').hide();
                    $('#laksyah_order_payment').val('CONFIRM ORDER');

                } else {
                    $(".wallet_amount").val(obj.wallet);
                    $('.total_to_pay').show();
                    $("#total_pay").html(obj.totalamounttopay);
                    $(".total_pay").val(obj.total);
                    $('#laksyah_order_payment').val('PAY SECURELY NOW');
                }

                //$(".wallet_amount").val(obj.wallet);
            });


        }
        function getshipmethod(country) {
            showLoader();
            $.ajax({
                type: "POST",
                cache: 'false',
                async: false, url: baseurl + 'CheckOut/Getshippingmethod',
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
                async: false, url: baseurl + 'CheckOut/Getshippingcharge',
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
                async: false, url: baseurl + 'CheckOut/Getcountry',
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
                async: false, url: baseurl + 'CheckOut/Getcountry',
                data: {country: country}
            }).done(function (data) {

                get
                shippingcharge(data);
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
