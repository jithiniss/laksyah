<?php
/* @var $this MakePaymentController */
/* @var $model MakePayment */
/* @var $form CActiveForm */
?>




<div class="container main_container inner_pages ">




    <div class="breadcrumbs"> <?php echo CHtml::link('HOME', array('site/index')); ?>  <span>/</span> <?php echo CHtml::link('My Account', array('Myaccount/index')); ?> <span>/</span> Make a Payment </div>

    <div class="row">
        <?php echo $this->renderPartial('_menu'); ?>
        <div class="col-sm-9 user_content">
            <?php echo CHtml::link('Credit History', array('MyWallet/CreditHistory'), array('class' => 'account_link pull-right')); ?>
            <h1>Make Payment</h1>

            <?php if(Yii::app()->user->hasFlash('success')): ?>
                    <div class="alert alert-success normal">
                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                    </div>
            <?php endif; ?>
            <?php if(Yii::app()->user->hasFlash('error')): ?>
                    <div class="alert alert-danger">
                        <strong>Danger!</strong> <?php echo Yii::app()->user->getFlash('error'); ?>
                    </div>
            <?php endif; ?>
            <div class="registration_form">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'make-payment-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => false,
                ));
                ?>
                <?php if(!empty($enquiry_product)) { ?>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Product Name*</label>
                            </div>
                            <div class="col-sm-8 col-md-6">
                                <?php echo $form->textField($model, 'product_name', array('value' => $enquiry_product->product_name, 'class' => 'form-control', 'readonly' => 'on')); ?>
                                <?php echo $form->error($model, 'product_name', array('style' => 'color:red')); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Product Code*</label>
                            </div>
                            <div class="col-sm-8 col-md-6">
                                <?php echo $form->textField($model, 'product_code', array('value' => $enquiry_product->product_code, 'class' => 'form-control', 'readonly' => 'on')); ?>
                                <?php echo $form->error($model, 'product_code', array('style' => 'color:red')); ?>
                            </div>
                        </div>
                <?php } else { ?>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Product Name*</label>
                            </div>
                            <div class="col-sm-8 col-md-6">
                                <?php echo $form->textField($model, 'product_name', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'product_name', array('style' => 'color:red')); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Product Code*</label>
                            </div>
                            <div class="col-sm-8 col-md-6">
                                <?php echo $form->textField($model, 'product_code', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'product_code', array('style' => 'color:red')); ?>
                            </div>
                        </div>


                <?php } ?>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Message</label>
                    </div>
                    <div class="col-sm-8 col-md-6">
                        <?php echo $form->textArea($model, 'message', array('size' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'message', array('style' => 'color:red')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Amount*</label>
                    </div>
                    <div class="col-md-6 col-sm-8">
                        <div class="row margin-normal">
                            <div class="col-xs-5">
                                <?php echo $form->dropDownList($model, 'amount_type', array('2' => 'Advance Payment', '1' => 'Final', '0' => 'other'), array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'amount_type', array('style' => 'color:red')); ?>

                            </div>
                            <div class="col-xs-2"><input type="text" class="form-control text-center" readonly placeholder="" value="₹"></div>
                            <div class="col-xs-5">
                                <?php if(!empty($celeb_history)) { ?>

                                        <input type="hidden"  id="MakePayment_amount1"  value='<?php echo Yii::app()->Currency->convert($celeb_history->pay_amount); ?>'/>
                                        <input type="text"  id="MakePayment_amount" readonly autocomplete="off" value="<?php echo $celeb_history->pay_amount; ?>" class="form-control"/>
                                <?php } else { ?>
                                        <input type="text"  id="MakePayment_amount"  autocomplete="off"  class="form-control" >
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
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
                <div class="row">
                    <div class="col-sm-3">

                    </div>
                    <div class="col-md-6 col-sm-8">
                        <div class="price_group">
                            Total amount to pay  <span id="payment_blnc"><?php echo Yii::app()->Currency->convert($celeb_history->pay_amount); ?></span>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-3">
                        <label>Payment Method*</label>
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
                            <div class="custom_check"> <i class="fa fa-check "></i> By making the payment you agree to our <a href="#">payment policies</a>.
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
            // Custom Radio
            $('.price_group1 .radio_group1').click(function () {
                $(this).parents('.price_group1').find('.radio_group1').removeClass('active');
                $(this).addClass('active');
                $(this).find('input').attr('checked', true);
            });
        });
</script>

<script type="text/javascript">
        $(document).ready(function () {
            var amount = <?php echo $celeb_history->pay_amount; ?>;
            var wallet_amount = <?php echo Yii::app()->session['user']['wallet_amt']; ?>;

            $('#credit_amount').on('keyup', function () {

                var credit = $("#credit_amount").val();
                if (credit > amount) {
                    $("#credit_amount").val('');
                    alert('Invalid Amount');
                } else {
                    var wallet_amount = <?php echo Yii::app()->session['user']['wallet_amt']; ?>;
                    if (credit > wallet_amount) {
                        alert("Your Amount greater than available balance");
                    } else {
                        var balance = wallet_amount - credit;
                        var payment_blnc = amount - credit;

                        $("#balance").html(balance);

                        $("#payment_blnc").html(payment_blnc);
                    }

                }
            });
        });
</script>
