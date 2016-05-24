<div class="container main_container inner_pages ">
    <div class="breadcrumbs"> <a href="#">HOME</a> <span>/</span> <a href="#">My Account</a> <span>/</span> Make a Payment </div>
    <div class="row">
        <div class="col-sm-3 sidebar">
            <h3 class="side_nav_toggle"><i class="fa fa-align-justify "></i>My Account</h3>
            <div class="cat_nav">
                <ul class="catmenu">
                    <li><a href="#">My Profile</a></li>
                    <li> <a href="#">My Credit</a></li>
                    <li> <a href="#">Address Book</a></li>
                    <li> <a href="#">My Orders</a></li>
                    <li> <a href="#">My Wishlist</a></li>
                    <li> <a href="#">Measurement</a></li>
                    <li> <a href="#">Make a Payment</a></li>
                    <li> <a href="#">Track My Order</a></li>
                </ul>
            </div>
        </div>
        <!-- / Sidebar-->
        <div class="col-sm-9 user_content"> <a class="account_link pull-right" href="#">Credit History</a>
            <h1>Add Credit Money</h1>
            <!--<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    Success </div>-->
            <div class="registration_form">
                <?php if(Yii::app()->user->hasFlash('success1')): ?>
                        <div class="alert alert-success alert-dismissable" style="margin:0 auto;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b><i class="icon fa fa-check"></i> Alert ! </b>
                            <?php echo Yii::app()->user->getFlash('success1'); ?>
                        </div>

                <?php endif; ?>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'wallet-add-form',
                    // 'action' => Yii::app()->createUrl('/user/walletHistory/addwallet'),
                    // 'htmlOptions' => array('class' => 'form-horizontal'),
                    'enableAjaxValidation' => false,
                ));
                ?>



                <div class="row">
                    <div class="col-sm-3">
                        <label>Amount*</label>
                    </div>
                    <div class="col-md-6 col-sm-8">
                        <div class="row margin-normal">
                            <div class="col-xs-5">
                                <?php echo $form->dropDownlist($wallet_add, 'type_id', CHtml::listData(MasterHistoryType::model()->findAllByAttributes(['credit_debit' => 2]), 'id', 'type'), array('empty' => 'Select Type', 'class' => 'form-control')); ?>

                                <?php echo $form->error($wallet_add, 'type_id', array('style' => 'padding-left:0px;')); ?>

                            </div>
                            <div class="col-xs-2"><input type="text" class="form-control text-center" readonly placeholder="" value="Rs."></div>
                            <div class="col-xs-5">
                                <?php echo $form->textField($wallet_add, 'amount', array('size' => 60, 'maxlength' => 100, 'placeholder' => "0.00", 'class' => 'form-control text-right')); ?>

                                <?php echo $form->error($wallet_add, 'amount', array('style' => 'padding-left:0px;')); ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Message*</label>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $form->textArea($wallet_add, 'field1', array('class' => 'form-control')); ?>

                        <?php echo $form->error($wallet_add, 'field1', array('style' => 'padding-left:0px;')); ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <label>Payment Method*</label>
                    </div>
                    <div class="col-sm-6">
                        <div class="price_group payment_method">
                            <label class="radio_group active">
                                <input type="radio"  name="WalletHistory[payment_method]"  hidden="" value="2" id="RadioGroup1_3">
                            </label>
                            <strong class="radio_label pull-left">CREDIT/DEBIT/NET BANKING </strong>
                            <label class="radio_group ">
                                <input type="radio"name="WalletHistory[payment_method]" checked hidden="" value="3" id="RadioGroup1_4">
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
                                <input type="checkbox" hidden="" name="payment_agree">
                            </div>
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

</script>