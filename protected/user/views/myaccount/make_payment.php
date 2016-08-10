<div class="container main_container inner_pages ">
        <div class="breadcrumbs"> <?php echo CHtml::link('HOME', array('site/index')); ?>  <span>/</span> <?php echo CHtml::link('My Account', array('Myaccount/index')); ?> <span>/</span> Make a Payment </div>
        <?php
        if (Yii::app()->session['currency'] != "") {

                $cur_symbol = Yii::app()->session['currency']->currency_code;
        } else {
                $cur_symbol = 'INR';
        }
        ?>
        <div class="row">
                <?php echo $this->renderPartial('_menu'); ?>
                <div class="col-sm-9 user_content">
                        <?php echo CHtml::link('Payment History', array('Myaccount/PaymentHistory'), array('class' => 'account_link pull-right')); ?>
                        <h1>Make Payment</h1>

                        <?php if (Yii::app()->user->hasFlash('success')): ?>
                                <div class="alert alert-success normal">
                                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                </div>
                        <?php endif; ?>
                        <?php if (Yii::app()->user->hasFlash('error')): ?>
                                <div class="alert alert-danger">
                                        <strong>Danger!</strong> <?php echo Yii::app()->user->getFlash('error'); ?>
                                </div>
                        <?php endif; ?>
                        <div class="registration_form">
                                <?php
                                if ($_GET['p'] != '') {
                                        $p = $_GET['p'];
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'make-payment-form',
                                            'action' => Yii::app()->baseUrl . '/index.php/Myaccount/Makepayment?p=' . $p,
                                            // Please note: When you enable ajax validation, make sure the corresponding
                                            // controller action is handling ajax validation correctly.
                                            // There is a call to performAjaxValidation() commented in generated controller code.
                                            // See class documentation of CActiveForm for details on this.
                                            'enableAjaxValidation' => false,
                                        ));
                                } else {
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'make-payment-form',
                                            'action' => Yii::app()->baseUrl . '/index.php/Myaccount/Makepayment',
                                            // Please note: When you enable ajax validation, make sure the corresponding
                                            // controller action is handling ajax validation correctly.
                                            // There is a call to performAjaxValidation() commented in generated controller code.
                                            // See class documentation of CActiveForm for details on this.
                                            'enableAjaxValidation' => false,
                                        ));
                                }
                                ?>
                                <?php if (!empty($enquiry_product)) { ?>
                                        <div class="row">
                                                <div class="col-sm-3">
                                                        <label>Product Name<font color="red">*</font></label>
                                                </div>
                                                <div class="col-sm-8 col-md-6">
                                                        <?php echo $form->textField($model, 'product_name', array('value' => $enquiry_product->product_name, 'class' => 'form-control', 'readonly' => 'on')); ?>
                                                        <?php echo $form->error($model, 'product_name', array('style' => 'color:red')); ?>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-sm-3">
                                                        <label>Product Code<font color="red">*</font></label>
                                                </div>
                                                <div class="col-sm-8 col-md-6">
                                                        <?php echo $form->textField($model, 'product_code', array('value' => $enquiry_product->product_code, 'class' => 'form-control', 'readonly' => 'on')); ?>
                                                        <?php echo $form->error($model, 'product_code', array('style' => 'color:red')); ?>
                                                </div>
                                        </div>
                                <?php } else { ?>
                                        <div class="row">
                                                <div class="col-sm-3">
                                                        <label>Product Name</label>
                                                </div>
                                                <div class="col-sm-8 col-md-6">
                                                        <?php echo $form->textField($model, 'product_name', array('class' => 'form-control')); ?>
                                                        <?php echo $form->error($model, 'product_name', array('style' => 'color:red')); ?>
                                                </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-sm-3">
                                                        <label>Product Code</label>
                                                </div>
                                                <div class="col-sm-8 col-md-6">
                                                        <?php echo $form->textField($model, 'product_code', array('class' => 'form-control')); ?>
                                                        <?php echo $form->error($model, 'product_code', array('style' => 'color:red')); ?>
                                                </div>
                                        </div>


                                <?php } ?>
                                <div class="row">
                                        <div class="col-sm-3">
                                                <label>Description<font color="red">*</font></label>
                                        </div>
                                        <div class="col-sm-8 col-md-6">
                                                <?php echo $form->textArea($model, 'message', array('size' => 200, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'message', array('style' => 'color:red')); ?>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-3">
                                                <label>Amount<font color="red">*</font></label>
                                        </div>
                                        <div class="col-md-6 col-sm-8">
                                                <div class="row margin-normal">
                                                        <?php if (!isset($_GET['p'])) { ?>
                                                                <div class="col-xs-5">
                                                                        <?php echo $form->dropDownList($model, 'amount_type', CHtml::listData(MasterPaymentType::model()->findAll(array('condition' => 'status=1', 'order' => 'sorting asc')), 'id', 'type'), array('empty' => 'Select Type', 'class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'amount_type', array('style' => 'color:red')); ?>

                                                                </div>
                                                        <?php } ?>
                                                        <div class="col-xs-2"><input type="text" class="form-control text-center" readonly placeholder="" value="<?php echo $cur_symbol; ?>"></div>
                                                        <div class="col-xs-5">
                                                                <?php if (!empty($celeb_history)) { ?>

                                                                        <input type="hidden"  id="MakePayment_amount1"  value='<?php echo Yii::app()->Currency->convert($celeb_history->pay_amount); ?>'/>
                                                                        <input class="form-control" readonly="" name="MakePayment[total_amount]" id="MakePayment_total_amount" type="text" maxlength="25"  autocomplete="off" value="<?php echo $celeb_history->pay_amount; ?>">
                                                                <?php } else { ?>
                                                                        <?php echo $form->textField($model, 'total_amount', array('class' => 'form-control', 'placeholder' => "₹ 0.00")); ?>
                                                                        <?php echo $form->error($model, 'total_amount', array('style' => 'color:red')); ?>
                                                                <?php } ?>
                                                        </div>
                                                </div>

                                        </div>
                                </div>
                                <div class="row" id="other_payment" style="display:none;">
                                        <div class="col-sm-3">

                                        </div>
                                        <div class="col-md-6 col-sm-8">
                                                <div class="row margin-normal">
                                                        <div class="col-xs-5">
                                                                <?php echo $form->textField($model, 'other_amount_type', array('class' => 'form-control')); ?>
                                                                <?php echo $form->error($model, 'other_amount_type', array('style' => 'color:red')); ?>

                                                        </div>

                                                </div>

                                        </div>
                                </div>
 <?php if (Yii::app()->session['user']['wallet_amt'] != 0) { ?>
                                <div class="row">
                                        <div class="col-sm-3">
                                                <label>Amount from My Credit</label>
                                        </div>
                                        <div class="col-md-6 col-sm-8">
                                                <div class="row margin-normal margin-bottom-none">
                                                        <div class="col-xs-5">


                                                                <input type="text" name="MakePayment[credit_amount]" autocomplete="off" id="credit_amount" class="form-control" >
                                                        </div>
                                                        <div class="col-xs-7" style="padding-top:12px;"> <b>( Available Credit: <span id="balance"> <?php echo Yii::app()->Currency->convert(Yii::app()->session['user']['wallet_amt']); ?> </span>)</b></div>
                                                </div>

                                        </div>
                                </div>
<?php } ?>
                                <div class="row">
                                        <div class="col-sm-3">

                                        </div>
                                        <div class="col-md-6 col-sm-8">
                                                <div class="price_group">
                                                        <?php if (!empty($celeb_history)) { ?>
                                                                Total amount to pay  <span id="payment_blnc"><?php echo Yii::app()->Currency->convert($celeb_history->pay_amount); ?></span>
                                                        <?php } ?>
                                                </div>

                                        </div>
                                </div>


                                <div class="row"id="payment_modes">
                                        <div class="col-sm-3">
                                                <label>Payment Method<font color="red">*</font></label>
                                        </div>
                                        <div class="col-sm-6">
                                                <div class="price_group1 payment_method">
                                                        <label class="radio_group1 active">
                                                                <input type="radio"  name="MakePayment[payment_mode]"  checked hidden="" value="2" id="RadioGroup1_3">
                                                        </label>
                                                        <strong class="radio_label pull-left">CREDIT/DEBIT/NET BANKING </strong>
                                                        <label class="radio_group1 ">
                                                                <input type="radio"name="MakePayment[payment_mode]"  hidden="" value="3" id="RadioGroup1_4">
                                                        </label>
                                                        <strong class="radio_label pull-left">PAYPAL</strong>
                                                        <div class="clearfix"></div>
                                                </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-3">

                                        </div>
                                        <div class="col-sm-6">
                                                <div class="confirm">
                                                        <div class="custom_check"> <i class="fa fa-check "></i> By making the payment you agree to our <?php echo CHtml::link('Terms', array('site/Terms')); ?> &amp; <?php echo CHtml::link('Policies', array('site/PrivacyPolicy')); ?>.
                                                                <input type="checkbox" hidden="" name="payment_agree" id="payment_agree">
                                                        </div>
                                                        <div id="agrees"></div>
                                                </div>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-3">

                                        </div>
                                        <div class="col-sm-6">
                                                <div class="form_button">
                                                        <strong><button type="submit" class="btn btn-success pos btn-primary">PAY SECURELY NOW</button></strong>

                                                </div>
                                        </div>
                                </div>
                                <?php $this->endWidget(); ?>
                        </div>
                </div>
        </div>

</div>


<script>
        $(document).ready(function () {
                $('#make-payment-form').submit(function () {

                        if ($('#payment_agree').prop('checked')) {

                                $('#agrees').html('').hide();
                                return true;
                        } else {
                                $('#agrees').html('Please accept our agreement.').show();
                                return false;
                        }


                });

                if ($('#MakePayment_amount_type').val() == 5) {
                        $('#other_payment').show();
                } else {
                        $('#other_payment').hide();
                }


                $('#MakePayment_amount_type').change(function () {
                        if ($('#MakePayment_amount_type').val() == 5) {
                                $('#other_payment').show();
                        } else {
                                $('#other_payment').hide();
                        }
                });

                // Custom Radio
                $('.price_group1 .radio_group1').click(function () {
                        $(this).parents('.price_group1').find('.radio_group1').removeClass('active');
                        $(this).addClass('active');
                        $(this).find('input').attr('checked', true);
                });


                var amount;
<?php if (!empty($celeb_history)) { ?>
                        amount = <?php echo $celeb_history->pay_amount; ?>;
<?php } ?>
                var wallet_amount = <?php echo Yii::app()->session['user']['wallet_amt']; ?>;

                $('#credit_amount').on('blur', function () {
<?php if (empty($celeb_history)) { ?>
                                amount = $("#MakePayment_total_amount").val();
<?php } ?>
                        var credit = $("#credit_amount").val();

                        if (parseInt(credit) > parseInt(amount)) {
                                $("#credit_amount").val('');
                                $("#balance").html(wallet_amount);
                                $("#payment_blnc").html(amount);
                                alert('Invalid Amount');
                        } else {

                                if (credit > wallet_amount) {
                                        alert("Your Amount greater than available balance");
                                } else {
                                        var balance = wallet_amount - credit;
                                        var payment_blnc = amount - credit;
                                        if (credit == amount) {
                                                $('#payment_modes').hide();
                                        } else {
                                                $('#payment_modes').show();
                                        }
                                        $("#balance").html(balance);

                                        $("#payment_blnc").html(payment_blnc);
                                }

                        }
                });

        });
</script>
