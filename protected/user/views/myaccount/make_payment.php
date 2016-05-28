<?php
/* @var $this MakePaymentController */
/* @var $model MakePayment */
/* @var $form CActiveForm */
?>
<style>
    .normal{
        height:40px;
        width: 426px;
        margin-left: 442px;
    }
    .form_make{
        margin-left: 198px;
    }
</style>




<div class="container main_container inner_pages ">




    <div class="breadcrumbs"> <a href="#">HOME</a> <span>/</span> <a href="#">My Account</a> <span>/</span> Make a Payment </div>
    <div class="row">
        <?php echo $this->renderPartial('_menu'); ?>
        <div class="col-sm-9 user_content"> <a class="account_link pull-right" href="#">Credit History</a>
            <h1>Make Payment</h1>
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
            <div class="registration_form">
                <div class="row">
                    <div class="col-sm-3">
                        <label>Product Name*</label>
                    </div>
                    <div class="col-sm-8 col-md-6">

                        <?php echo $form->textField($model, 'product_name', array('size' => 60, 'height' => 60, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'product_name', array('style' => 'color:red')); ?>
                    </div>
                </div>




                <div class="row">
                    <div class="col-sm-3">
                        <label>Product Code*</label>
                    </div>
                    <div class="col-sm-8 col-md-6">
                        <?php echo $form->textField($model, 'product_code', array('size' => 60, 'height' => 60, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'product_code', array('style' => 'color:red')); ?>
                    </div>
                </div>
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




<!--                                <select class="form-control">

                                <?php //echo $form->dropDownList($model, 'amount_type', array('2' => 'Advance Payment', '1' => 'Final', '0' => 'other')); ?>


                                </select>-->


                            </div>
                            <div class="col-xs-2"><input type="text" class="form-control text-center" readonly placeholder="" value="₹"></div>
                            <div class="col-xs-5">
                                <?php echo $form->textField($model, 'amount', array('size' => 60, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'amount', array('style' => 'color:red')); ?>
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

                                <input type="text" name="wallet_amt"  autocomplete="off" id="credit" class="form-control" >
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
                            Total amount to pay ₹ 6880
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-3">
                        <label>Payment Method*</label>
                    </div>
                    <div class="col-sm-6">
                        <div class="price_group payment_method">
                            <!--                            <label class="radio_group active">
                                                            <input type="radio" name="method" hidden="" value="radio" id="RadioGroup1_3">
                                                        </label>
                                                        <strong class="radio_label pull-left">CREDIT/DEBIT/NET BANKING </strong>
                                                        <label class="radio_group ">
                                                            <input type="radio" name="method" checked hidden="" value="radio" id="RadioGroup1_4">
                                                        </label>
                                                        <strong class="radio_label pull-left">PAYPAL</strong>-->


                            <?php echo $form->radioButtonList($model, 'pay_method', array('1' => ''), array('uncheckValue' => null)); ?><?php echo 'CREDIT/DEBIT/NET BANKING:'; ?>
                            <?php echo $form->radioButtonList($model, 'pay_method', array('2' => ''), array('uncheckValue' => null)); ?><?php echo 'PAYPAL:'; ?>
                            <?php echo $form->radioButtonList($model, 'pay_method', array('3' => ''), array('uncheckValue' => null)); ?><?php echo 'VOUCHER:'; ?>

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
            });
        });
</script>
