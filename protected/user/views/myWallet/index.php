<div class="container main_container inner_pages ">
        <div class="breadcrumbs"> <?php echo CHtml::link('HOME', array('site/index')); ?><span>/</span> <?php echo CHtml::link('My Account', array('Myaccount/index')); ?> <span>/</span> Add Credit Money </div>
        <div class="row">
                <?php echo $this->renderPartial('//myaccount/_menu'); ?>
                <!-- / Sidebar-->
                <div class="col-sm-9 user_content">  <?php echo CHtml::link(' <span class="account_link pull-right">Credit History</span>', array('MyWallet/CreditHistory')); ?>
                        <h1>Add Credit Money</h1>
                        <!--<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Success </div>-->
                        <div class="registration_form">
                                <?php if (Yii::app()->user->hasFlash('wallet_success')): ?>
                                        <div class="row">
                                                <div class="alert alert-success alert-dismissable" style="margin:0 auto;">


                                                        <?php echo Yii::app()->user->getFlash('wallet_success'); ?>
                                                </div>
                                        </div>
                                <?php endif; ?>
                                <?php if (Yii::app()->user->hasFlash('wallet_error')): ?>
                                        <div class="row">
                                                <div class="alert alert-danger alert-dismissable" style="margin:0 auto;">


                                                        <?php echo Yii::app()->user->getFlash('wallet_error'); ?>
                                                </div>
                                        </div>
                                <?php endif; ?>
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'wallet-add-form',
                                    'action' => Yii::app()->baseUrl . '/index.php/MyWallet/',
                                    // 'action' => Yii::app()->createUrl('/user/walletHistory/addwallet'),
                                    // 'htmlOptions' => array('class' => 'form-horizontal'),
                                    'enableAjaxValidation' => false,
                                ));
                                ?>
                                <?php if (Yii::app()->user->hasFlash('credit_wallet_success')): ?>
                                        <script type="text/javascript">
                                                $(document).ready(function() {

                                                        $("#walletsuccess").modal({backdrop: 'static', keyboard: false});

                                                });
                                        </script>

                                        <div class="modal fade" id="walletsuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                                <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                                </div>
                                                                <div class="modal-body">
                                                                        <?php echo Yii::app()->user->getFlash('credit_wallet_success'); ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>

                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                <?php endif; ?>


                                <div class="row">
                                        <div class="col-sm-3">
                                                <label>Gift Card Number *</label>
                                        </div>
                                        <div class="col-md-6 col-sm-8">
                                                <div class="row margin-normal">

                                                        <div class="col-xs-12 col-sm-12">
                                                                <?php echo $form->textField($wallet_add, 'unique_code', array('size' => 60, 'maxlength' => 100, 'placeholder' => "Enter Your Code", 'class' => 'form-control text-right', 'id' => 'gift_code', 'required' => true)); ?>
                                                                <span class="gift_status"></span>

                                                                <?php echo $form->error($wallet_add, 'unique_code', array('style' => 'padding-left:0px;')); ?>
                                                        </div>
                                                </div>

                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-3">
                                                <label>Amount*</label>
                                        </div>
                                        <div class="col-md-6 col-sm-8">
                                                <div class="row margin-normal">

                                                        <div class="col-xs-2 col-sm-3"><input type="text" class="form-control text-center" readonly placeholder="" value="Rs."></div>
                                                        <div class="col-xs-10 col-sm-9">
                                                                <?php echo $form->textField($wallet_add, 'amount', array('size' => 60, 'maxlength' => 100, 'placeholder' => "0.00", 'class' => 'form-control text-right gift_amount', 'id' => 'gift_amount', 'required' => true)); ?>

                                                                <?php echo $form->error($wallet_add, 'amount', array('style' => 'padding-left:0px;')); ?>
                                                        </div>
                                                </div>

                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-3">
                                                <label>Message</label>
                                        </div>
                                        <div class="col-sm-6">
                                                <?php echo $form->textArea($wallet_add, 'field1', array('class' => 'form-control')); ?>

                                                <?php echo $form->error($wallet_add, 'field1', array('style' => 'padding-left:0px;')); ?>

                                        </div>
                                </div>
                                <!--     <div class="row">
                                       <div class="col-sm-3">
                                               <label>Payment Method*</label>
                                       </div>
                                                                         <div class="col-sm-6">
                                                                                       <div class="price_group1 payment_method">
                                                                                               <label class="radio_group1 active">
                                                                                                       <input type="radio"  name="WalletHistory[payment_method]"  checked hidden="" value="2" id="RadioGroup1_3">
                                                                                               </label>
                                                                                               <strong class="radio_label pull-left">CREDIT/DEBIT/NET BANKING </strong>
                                                                                               <label class="radio_group1 ">
                                                                                                       <input type="radio"name="WalletHistory[payment_method]"  hidden="" value="3" id="RadioGroup1_4">
                                                                                               </label>
                                                                                               <strong class="radio_label pull-left">PAYPAL</strong>
                                                                                               <div class="clearfix"></div>
                                                                                       </div>
                                                                               </div>
                               </div>-->
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
                                                        <strong><button type="submit" class="btn-primary">PAY SECURELY NOW</button></strong>
                                                </div>
                                        </div>
                                </div>
                                <?php $this->endWidget(); ?>
                        </div>
                </div>
        </div>
</div>
<script>
        $(document).ready(function() {
                $('#wallet-add-form').submit(function() {

                        if ($('#payment_agree').prop('checked')) {

                                $('#agrees').html('').hide();
                                return true;
                        } else {
                                $('#agrees').html('Please accept our agreement.').show();
                                return false;
                        }
                });
                // Custom Radio
                $('.price_group1 .radio_group1').click(function() {
                        $(this).parents('.price_group1').find('.radio_group1').removeClass('active');
                        $(this).addClass('active');
                        $(this).find('input').attr('checked', true);
                });

                $('#gift_amount').click(function() {
                        var gift_code = $("#gift_code").val();
                        if (gift_code != '') {

                                $.ajax({
                                        type: "POST",
                                        url: baseurl + "MyWallet/GetAmount",
                                        data: {gift_code: gift_code}
                                }).done(function(data) {
                                        if (data == 0) {
                                                $('.gift_status').html('<h5 style="color:red">Gift Coupen is Invalid</h5>');
                                                $('#gift_amount').val(data);
                                                $("#gift_amount").attr("readonly", "readonly");
                                        } else {
                                                $('.gift_status').html('<h5 style="color:green">Gift Coupen is valid</h5>');
                                                $('#gift_amount').val(data);
                                                $("#gift_amount").attr("readonly", "readonly");
                                        }

                                });
                        } else {
                                $("#gift_amount").attr("readonly", "readonly");
                        }
                });
        });
</script>