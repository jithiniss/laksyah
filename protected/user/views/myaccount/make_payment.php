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
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'make-payment-form',
                'action' => Yii::app()->baseUrl . '/index.php/Myaccount/Makepayment',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation' => false,
            ));
            ?>
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
                <?php if (!empty($enquiry_product)) { ?>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Product Name*</label>
                            </div>
                            <div class="col-sm-8 col-md-6">

                                <input type="text" name="MakePayment[product_name]" value="<?php echo $enquiry_product->product_name; ?>" readonly class="form-control"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Product Code*</label>
                            </div>
                            <div class="col-sm-8 col-md-6">
                                <input type="text" name="MakePayment[product_code]" value="<?php echo $enquiry_product->product_code; ?>" readonly class="form-control"/>
                            </div>
                        </div>
                <?php } else { ?>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Product Name*</label>
                            </div>
                            <div class="col-sm-8 col-md-6">

                                <input type="text" name="MakePayment[product_name]" class="form-control"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label>Product Code*</label>
                            </div>
                            <div class="col-sm-8 col-md-6">
                                <input type="text" name="MakePayment[product_code]"  class="form-control"/>
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
                                <?php if (!empty($celeb_history)) { ?>
                                        <input type="text"  id="MakePayment_amount" readonly autocomplete="off" value="<?php echo $celeb_history->pay_amount; ?>" class="form-control" >
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

                                <?php
                                $user = UserDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                ?>
                                <input type="hidden" id="wallet_amt" value="<?php echo $user->wallet_amt; ?>">
                                <input type="text" name="MakePayment[amount]" autocomplete="off" id="credit" class="form-control" >
                            </div>
                            <div class="col-xs-7" style="padding-top:12px;"> <b>(Available Credit:<span id="balance">  </span>)</b></div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">

                    </div>
                    <div class="col-md-6 col-sm-8">
                        <div class="price_group">
                            Total amount to pay ₹ <span id="payment_blnc"></span>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-3">
                        <label>Payment Method*</label>
                    </div>
                    <div class="col-sm-6">
                        <div class="price_group payment_method">

                            <label class="radio_group"><?php echo $form->radioButtonList($model, 'pay_method', array('1' => ''), array('uncheckValue' => null, 'hidden' => 'true')); ?></label>
                            <strong class="radio_label pull-left">CREDIT/DEBIT/NET BANKING </strong>
                            <label class="radio_group "><?php echo $form->radioButtonList($model, 'pay_method', array('2' => ''), array('uncheckValue' => null, 'hidden' => 'true')); ?></label>
                            <strong class="radio_label pull-left">PAYPAL</strong>
                            <div class="clearfix"></div>

                        </div>
                        <?php echo $form->error($model, 'pay_method', array('style' => 'color:red')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-6">
                        <div class="confirm">
                            <div class="custom_check">

<!--                                <i class="fa fa-check required"></i> By making the payment you agree to our <a href="#">paymet policies</a>.-->

                                <input type="checkbox"  required>     By making the payment you agree to our <a href="#">paymet policies</a>.



                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">

                    </div>
                    <div class="col-sm-6">
                        <div class="form_button">
                            <strong>
                                <!--                                <button class="btn-primary">PAY SECURELY NOW</button>-->
                                <?php echo CHtml::submitButton('PAY SECURELY NOW', array('class' => 'btn btn-success pos btn-primary')); ?>
                            </strong>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php $this->endWidget(); ?>
</div>

<!-- form -->
<!--<script  src="http://code.jquery.com/jquery.min.js"></script>-->
<script type="text/javascript">
        $(document).ready(function () {
            var amount = $("#wallet_amt").val();
            document.getElementById("balance").innerHTML = amount;
            $('#credit').on('change', function () {
                var credit = $("#credit").val();
                var cred = credit
                .00;
                var wallet_amt = $("#wallet_amt").val();
                if (cred > wallet_amt) {
                    alert("Your Amount greater than available balance");
                } else {
                    var balance = wallet_amt - cred;
                    document.getElementById("balance").innerHTML = balance;
                }
                var payment_blnc = $("#MakePayment_amount").val() - $("#credit").val();
                document.getElementById("payment_blnc").innerHTML = payment_blnc;
            });
        });
</script>
