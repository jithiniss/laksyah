<!-- Modal -->
<style>
        @media (min-width: 768px){
                .form-inline .form-control {
                        display: inline-block;
                        width: 100%;
                        vertical-align: middle;
                }
        }
</style>
<div class="modal fade" id="loginModal" tabindex="-2" role="dialog">
        <div class="modal-dialog">
                <div class="modal-content">
                        <div class="modal-header text-left">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#signin" aria-controls="home" role="tab" data-toggle="tab">Sign In</a></li>
                                        <li role="presentation"><a href="#register" aria-controls="profile" role="tab" data-toggle="tab">Register</a></li>
                                </ul>
                        </div>
                        <div class="modal-body">
                                <div class="login_popup">
                                        <!-- Nav tabs -->


                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="signin">
                                                        <h2>SIGN IN</h2>
                                                        <h4>Sign in to proceed to Checkout</h4>
                                                        <label>Email Address</label>
                                                        <input class="form-control" type="text">
                                                        <label>Password</label>
                                                        <input class="form-control" type="password">
                                                        <p><a href="#" class="forgot">Forgot Password?</a></p>
                                                        <button class="btn-primary btn-full">SIGN IN</button>
                                                        <p class="text-center register italic">Not a Member? <a href="#">REGISTER NOW</a></p>
                                                </div>
                                                <div role="tabpanel" class="tab-pane" id="register">
                                                        <h2>Registration</h2>
                                                        <h4>Please fillout your profile information</h4>
                                                        <label>First Name*</label>
                                                        <input class="form-control" type="text">
                                                        <label>Last Name*</label>
                                                        <input class="form-control" type="text">
                                                        <label>Email Address*</label>
                                                        <input class="form-control" type="text">
                                                        <label>Phone Number*</label>
                                                        <input class="form-control" type="text">
                                                        <label>Password*</label>
                                                        <input type="text" class="form-control" placeholder="">

                                                        <label>Confirm Password*</label>
                                                        <input type="text" class="form-control error" placeholder="">

                                                        <button class="btn-primary btn-full">Create an Acocunt</button>

                                                </div>
                                        </div>
                                </div>
                        </div>
                </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
</div>


<div class="modal " id="logreg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                                <div>

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" id="hom" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Login</a></li>
                                                <li role="presentation" id="prof"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Register</a></li>

                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active login_popup " id="home">

                                                        <h2>SIGN IN</h2>
                                                        <h4>Sign in to proceed to Checkout</h4>
                                                        <div class="col-xs-12">
                                                                <?php if (Yii::app()->user->hasFlash('passworderror1')): ?>
                                                                        <div class="alert alert-danger mesage">
                                                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                                                <strong>sorry!</strong><?php echo Yii::app()->user->getFlash('passworderror1'); ?>
                                                                        </div>
                                                                <?php endif; ?>

                                                                <?php
                                                                $login = $this->beginWidget('CActiveForm', array(
                                                                    'id' => 'login-form',
                                                                    'htmlOptions' => array('class' => ''),
                                                                    // Please note: When you enable ajax validation, make sure the corresponding
                                                                    // controller action is handling ajax validation correctly.
                                                                    // There is a call to performAjaxValidation() commented in generated controller code.
                                                                    // See class documentation of CActiveForm for details on this.
                                                                    'enableAjaxValidation' => false,
                                                                ));
                                                                ?>


                                                                <div class="form-group">
                                                                        <?php echo $login->labelEx($loginform, '[log]email', array('class' => '')); ?>
                                                                        <?php echo $login->textField($loginform, '[log]email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control', 'autocomplete' => "off")); ?>
                                                                        <?php echo $login->error($loginform, '[log]email'); ?>

                                                                </div>
                                                                <div class="form-group">
                                                                        <?php echo $login->labelEx($loginform, '[log]password', array('class' => '')); ?>
                                                                        <?php echo $login->passwordField($loginform, '[log]password', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                                                        <?php echo $login->error($loginform, '[log]password'); ?>

                                                                </div>



                                                                <ul class="list-inline list-unstyled">
                                                                        <li ><a style="text-decoration:underline;" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/forgotPassword/">Forgot Password ?</a></li>
                                                                        <li><a style="text-decoration:underline;" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/register/">New User ?</a></li>
                                                                        <li>
                                                                                <?php echo CHtml::submitButton($loginform->isNewRecord ? 'SIGN IN' : 'SIGN IN', array('class' => 'btn-primary btn-full')); ?>
                                                                        </li>


                                                                        <?php $this->endWidget(); ?>

                                                        </div>

                                                </div>
                                                <div role="tabpanel" class="tab-pane login_popup" id="profile">
                                                        <h2>REGISTRATION</h2>
                                                        <h4>Please fillout your profile information</h4>
                                                        <div class="col-xs-12 forward">
                                                                <?php if (Yii::app()->user->hasFlash('feilderror1')): ?>
                                                                        <div class="alert alert-danger mesage">
                                                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                                                <strong>sorry!</strong><?php echo Yii::app()->user->getFlash('feilderror1'); ?>
                                                                        </div>
                                                                <?php endif; ?>
                                                                <div class="row">

                                                                        <?php
                                                                        $reg = $this->beginWidget('CActiveForm', array(
                                                                            'id' => 'dimension-class-form',
                                                                            'htmlOptions' => array('class' => 'form-inline'),
                                                                            // Please note: When you enable ajax validation, make sure the corresponding
                                                                            // controller action is handling ajax validation correctly.
                                                                            // There is a call to performAjaxValidation() commented in generated controller code.
                                                                            // See class documentation of CActiveForm for details on this.
                                                                            'enableAjaxValidation' => false,
                                                                        ));
                                                                        ?>

                                                                        <?php echo $reg->labelEx($regform, '[reg]first_name', array('class' => '')); ?>
                                                                        <?php echo $reg->textField($regform, '[reg]first_name', array('class' => 'form-control')); ?>
                                                                        <?php echo $reg->error($regform, '[reg]first_name'); ?>


                                                                        <?php echo $reg->labelEx($regform, '[reg]last_name', array('class' => '')); ?>
                                                                        <?php echo $reg->textField($regform, '[reg]last_name', array('class' => 'form-control')); ?>
                                                                        <?php echo $reg->error($regform, '[reg]last_name'); ?>

                                                                        <?php echo $reg->labelEx($regform, 'Date of Birth', array('class' => '')); ?>
                                                                        <?php
                                                                        $from = date('Y') - 80;
                                                                        $to = date('Y') + 20;
                                                                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                            'model' => $regform,
                                                                            'attribute' => '[reg]dob',
                                                                            'value' => '[reg]dob',
                                                                            'options' => array(
                                                                                'dateFormat' => 'dd-mm-yy',
                                                                                'changeYear' => true, // can change year
                                                                                'changeMonth' => true, // can change month
                                                                                'yearRange' => $from . ':' . $to, // range of year
                                                                                'showButtonPanel' => true, // show button panel
                                                                            ),
                                                                            'htmlOptions' => array(
                                                                                'size' => '10', // textField size
                                                                                'maxlength' => '10', // textField maxlength
                                                                                'class' => 'form-control',
                                                                                'placeholder' => 'Date Of Birth',
                                                                            ),
                                                                        ));
                                                                        ?>
                                                                        <?php echo $reg->error($regform, 'Date of Birth'); ?>


                                                                        <?php echo $reg->labelEx($regform, '[reg]gender', array('class' => '')); ?>
                                                                        <?php echo $reg->dropDownList($regform, '[reg]gender', array('male' => "male", 'female' => "fe-male"), array('class' => 'form-control')); ?>
                                                                        <?php echo $reg->error($regform, '[reg]gender'); ?>


                                                                        <?php echo $reg->labelEx($regform, '[reg]email', array('class' => '')); ?>
                                                                        <?php echo $reg->textField($regform, '[reg]email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                                                        <?php echo $reg->error($regform, '[reg]email'); ?>

                                                                        <?php echo $reg->labelEx($regform, '[reg]phone_no_1', array('class' => '')); ?>
                                                                        <?php echo $reg->textField($regform, '[reg]phone_no_1', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                                                        <?php echo $reg->error($regform, '[reg]phone_no_1'); ?>


                                                                        <?php echo $reg->labelEx($regform, '[reg]phone_no_2', array('class' => '')); ?>
                                                                        <?php echo $reg->textField($regform, '[reg]phone_no_2', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                                                        <?php echo $reg->error($regform, '[reg]phone_no_2'); ?>


                                                                        <?php echo $reg->labelEx($regform, '[reg]fax', array('class' => '')); ?>
                                                                        <?php echo $reg->textField($regform, '[reg]fax', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Fax', 'class' => 'form-control')); ?>
                                                                        <?php echo $reg->error($regform, '[reg]fax'); ?>


                                                                        <?php echo $reg->labelEx($regform, '[reg]password', array('class' => '')); ?>
                                                                        <?php echo $reg->passwordField($regform, '[reg]password', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Password', 'class' => 'form-control')); ?>
                                                                        <?php echo $reg->error($regform, '[reg]password'); ?>


                                                                        <?php echo $reg->labelEx($regform, '[reg]confirm', array('class' => '')); ?>
                                                                        <?php echo $reg->passwordField($regform, '[reg]confirm', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Confirm Password', 'class' => 'form-control')); ?>
                                                                        <?php echo $reg->error($regform, '[reg]confirm'); ?>



                                                                        <?php echo $reg->labelEx($regform, '[reg]newsletter', array('class' => '')); ?>
                                                                        <?php echo $reg->dropDownList($regform, '[reg]newsletter', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                                                                        <?php echo $reg->error($regform, '[reg]newsletter'); ?>








                                                                        <div class="box-footer">
                                                                                <?php echo CHtml::submitButton($regform->isNewRecord ? 'Create an Acocunt' : 'Save', array('class' => 'btn-primary btn-full')); ?>
                                                                        </div>

                                                                        <?php $this->endWidget(); ?>

                                                                </div>
                                                        </div>


                                                </div>

                                        </div>

                                </div>
                        </div>
                        <div class="clearfix"></div>
                </div>
        </div>
</div>
<div class="container main_container inner_pages">
        <h1>Shopping Bag</h1>
        <?php if (Yii::app()->user->hasFlash('success')): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                </div>
        <?php endif; ?>
        <?php if (Yii::app()->user->hasFlash('error')): ?>
                <div class="alert alert-danger  alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong></strong> <?php echo Yii::app()->user->getFlash('error'); ?>
                </div>
        <?php endif; ?>
        <!--    <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Discount Coupon Applied
            </div>-->
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
                                                                <?php echo $form->hiddenField($gift_user, 'cart_id', array('class' => 'form-control', 'value' => NULL, 'id' => '')); ?>
                                                                <?php echo $form->error($gift_user, 'cart_id'); ?>
                                                        </div>

                                                <?php } else { ?>

                                                        <div class="form-group">
                                                                <?php echo $form->hiddenField($gift_user, 'session_id', array('class' => 'form-control', 'value' => Yii::app()->session['temp_user'])); ?>
                                                                <?php echo $form->error($gift_user, 'session_id'); ?>
                                                        </div>
                                                        <div class="form-group">
                                                                <?php echo $form->hiddenField($gift_user, 'user_id', array('class' => 'form-control', 'value' => Yii::app()->session['user']['id']));
                                                                ?>
                                                                <?php echo $form->error($gift_user, 'user_id'); ?>
                                                        </div>

                                                <?php } ?>

                                                <div class="form-group">
                                                        <?php echo $form->hiddenField($gift_user, 'cart_id', array('class' => 'form-control', 'id' => 'gift_cart_id')); ?>
                                                        <?php echo $form->error($gift_user, 'cart_id'); ?>
                                                </div>



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
        <div class="row">
                <div class="col-md-8">
                        <div class="my_cart related_element">
                                <div class="cart_table">
                                        <div class="header_row cart_row">
                                                <div class="col-2">PRODUCT</div>
                                                <div class="col-1">GIFT</div>
                                                <div class="col-3">PRICE</div>
                                                <div class="col-4">ACTION</div>
                                        </div>
                                        <!-- / Cart Table Header-->
                                        <?php
                                        foreach ($carts as $cart) {

                                                $prod_details = Products::model()->findByPk($cart->product_id);
                                                $folder = Yii::app()->Upload->folderName(0, 1000, $prod_details->id);
                                                ?>
                                                <!--  Cart items-->
                                                <div class="cart_row with_gift">
                                                        <div class="col-2 cart_product_detail">

                                                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>" class="img-responsive crt" align="absmiddle" style="max-height:300px; max-width:200px;display: block;">

                                                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/name/<?php echo $prod_details->canonical_name; ?>"style="color: #333;text-decoration: none;">  <h3><?php echo $prod_details->product_name; ?></h3></a>
                                                                <p><span>Color:</span>	Doeskin</p>
                                                                <p><span>Size:</span>	S</p>
                                                                <?php
                                                                $trimstring = substr($prod_details->description, 0, 100);
                                                                ?>
                                                                <p><?= $trimstring; ?></p>
                                                                <?php
                                                                if ($prod_details->discount) {
                                                                        $price = $prod_details->price - $prod_details->discount;
                                                                } else {
                                                                        $price = $prod_details->price;
                                                                }

                                                                $cart_qty = $cart->quantity;
                                                                $tot_price = ($cart_qty * $price) + $cart->rate;
                                                                ?>
                                                        </div>

                                                        <div class="col-1">
                                                                <div class="gift_ticker">
                                                                        <input type="checkbox" <?php if ($cart->gift_option == '1') { ?> checked="" disabled="" <?php } ?> cart_id="<?php echo $cart->id; ?>" option="<?php echo $cart->options; ?>" product_id="<?php echo $cart->product_id; ?>" <?php if (isset(Yii::app()->session['orderid'])) { ?> order_id="<?php echo Yii::app()->session['orderid']; ?>"  <?php } ?>  name="gift" id="<?php echo $cart->id; ?>" value="1" class="gift_options gift_ticker">
                                                                </div>
                                                        </div>

                                                        <div class="col-3"><strong><span class = "range_<?php echo $cart->id; ?>" style = "font-size: 15px">
                                                                                <?php echo Yii::app()->Currency->convert($tot_price);
                                                                                ?></span></strong>
                                                                <input type="hidden" id="cart_<?php echo $cart->id; ?>" value="<?php echo $prod_details->id; ?>">
                                                        </div>


                                                        <div class="col-4">
                                                                <div class="cart_action">
                                    <!--                                        <a style="font-size: 22px;"href="<?= Yii::app()->request->baseUrl; ?>/index.php/cart/Delete/<?= $cart->id; ?>"><i class="fa cart-del fa-trash-o"></i></a>-->
                                                                        <a href="<?= Yii::app()->request->baseUrl; ?>/index.php/cart/Delete/<?= $cart->id; ?>">Remove</a>
                                                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Products/Detail/name/<?php echo $prod_details->canonical_name; ?>">Edit</a>
                                                                </div>
                                                        </div>
                                                </div>
                                                <!-- / Cart items-->
                                                <?php
                                                if ($cart->gift_option == 1) {
                                                        ?>
                                                        <?php $gift_user_details = TempUserGifts::model()->findByAttributes(array('cart_id' => $cart->id)); ?>
                                                        <div class="cart_row gift_row" id="gift_cnt_<?php echo $cart->id; ?>">
                                                                <div class="col-1 cart_product_detail">
                                                                        <img src="<?= Yii::app()->request->baseUrl; ?>/images/gift_image.jpg" alt=""/>
                                                                        <h3>GIFT PACK</h3>
                                                                        <p><span>From:</span><?php echo $gift_user_details->from; ?></p>
                                                                        <p><span>To:</span><?php echo $gift_user_details->to; ?></p>
                                                                        <div class="clearfix"></div>
                                                                </div>
                                                                <div class="col-2">
                                                                        <div class="gift_message">
                                                                                Message:  <?php echo $gift_user_details->message; ?>
                                                                        </div>
                                                                </div>
                                                                <div class="col-3"><strong><span id="giftprice_<?php echo $cart->id; ?>"><?php echo Yii::app()->Currency->convert($cart->rate); ?></span></strong></div>
                                                                <div class="col-4">
                                                                        <div class="cart_action">
                                                                                <form method="post" action="<?= Yii::app()->request->baseUrl; ?>/index.php/cart/Removegift/" id="gftremove">
                                                                                        <input type="hidden" value="<?php echo $cart->id; ?>" name="cart_id" />
                                                                                        <input type="hidden" value="<?php echo $gift_user_details->id; ?>" name="gift_id" />
                                                                                        <!--                                                    <button type="submit">Remove</button>-->
                                                                                        <a href="#" class="remvegft">Remove</a>
                                                                                </form>
                                                                                <a  class="edit_gift" cart_id="<?php echo $cart->id; ?>" session_id="<?php echo $cart->session_id; ?>" href="#">Edit</a>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                <?php } ?>
                                                <!-- / Cart Item Gift-->
                                                <?php
                                                $total+= $tot_price;
                                        }
                                        ?>

                                        <?php
                                        if (isset(Yii::app()->session['couponid'])) {
                                                $coupn_details = Coupons::model()->findByPk(Yii::app()->session['couponid']);
                                                if ($coupn_details->discount_type == 1) {
                                                        $coupon_discount = Yii::app()->Currency->convert($coupn_details->discount);
                                                } else {
                                                        $coupon_discount = $coupn_details->discount . '%';
                                                }
                                                ?>
                                                <div class="cart_row gift_row_coupon">
                                                        <div class="col-2 cart_product_detail">
                                                                <h3>GIFT VOUCHER/GIFT CARD CODE</h3>
                                                                <p><span>Code:</span>&nbsp;<?= $coupn_details->code; ?></p>
                                                                <p><span>Details:</span>&nbsp;&nbsp;<?= $coupon_discount ?> off on purchase above <?= Yii::app()->Currency->convert($coupn_details->cash_limit) ?></p>
                                                                <div class="clearfix"></div>
                                                        </div>
                                                        <div class="col-4" style="float:right">
                                                                <div class="cart_action">
                                                                        <a href="<?= Yii::app()->baseUrl; ?>/index.php/cart/RemoveCoupon">Remove</a>
                                                                </div>
                                                        </div>
                                                </div>
                                        <?php } ?>
                                </div>
                        </div>
                </div>


                <div class="col-md-4 sidebar-right">
                        <div class="has fixed_scroller">

                                <div class="order_summary">
                                        <div class="panel-title">ORDER SUMMARY</div>
                                        <div class="panel-body">
                                                <h4>GIFT VOUCHER / GIFT CARD CODE</h4>
                                                <form method="post" name="coupon" class="navbar-form" action="<?= Yii::app()->baseUrl; ?>/index.php/cart/Coupon">
                                                        <input type="text" class="form-control gift_coupon_text" name="coupon" autocomplete="off">
                                                        <button class="btn btn-grayed" type="submit" name="btn_submit">APPLY</button>
                                                </form>
                                                <div class="clearfix"></div>
                                                <p class="small_description">Enter your Gift Voucher / Gift Card Code</p>
                                        </div>
                                </div>
                                <!--. Order Summary-->

                                <div class="order_amount">
                                        <div class="price_group">
                                                <div class="pull-left">Sub Total</div>
                                                <div class="pull-right range" id="subtotal"><?php echo Yii::app()->Currency->convert($total); ?></div>
                                                <div class="clearfix"></div>
                                        </div>
                                        <div class="price_group">

                                                <?php
                                                if (!empty($coupen_details)) {
                                                        $coupen = Coupons::model()->findByPk($coupen_details->coupon_id);
                                                        $discount = $coupen->discount;
                                                        $ordertotal = $total - $discount;
                                                        ?>
                                                        <?php ?>
                                                        <li class="range">Discount : <span id="discount"><?php echo Yii::app()->Currency->convert($coupen->discount); ?></span></li>
                                                <?php } else if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) { ?>
                                                        <?php
                                                        if (isset(Yii::app()->session['orderid'])) {

                                                                $order = CouponHistory::model()->findByAttributes(array('order_id' => Yii::app()->session['orderid']));
                                                                $discount = $order->total_amount;
                                                                $ordertotal = $total - $discount;
                                                        } else {
                                                                $order = CouponHistory::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']), array('order' => 'date desc'));
                                                                $from = $order->date;
                                                                $to = date('Y-m-d H:i:s');
                                                                $diff_seconds = strtotime($to) - strtotime($from);
                                                                $hours = floor($diff_seconds / 3600);
                                                                $minutes = floor(($diff_seconds % 3600) / 60) + ($hours * 60);

                                                                if ($minutes < 30) {
                                                                        $discount = $order->total_amount;
                                                                } else {
                                                                        $discount = 0;
                                                                }
                                                                $ordertotal = $total - $discount;
                                                        }

                                                        if ($order->coupon_id != 0 && $discount != 0) {
                                                                ?>
                                                                <div class="pull-left">Discount</div>
                                                                <div class="pull-right range" id="discount"><?php echo Yii::app()->Currency->convert($discount); ?></div>
                                                        <?php } ?></li>
                                                        <?php
                                                } else {
                                                        $ordertotal = $total;
                                                }
                                                ?>
                                                <div class="clearfix"></div>
                                        </div>
                                        <div class="seperator"></div>
                                        <div class="price_group total_amount">
                                                <div class="pull-left">ORDER TOTAL</div>
                                                <div class="pull-right range" id="order_total"><?php echo Yii::app()->Currency->convert($ordertotal); ?></div>
                                                <div class="clearfix"></div>
                                        </div>
                                </div>
                                <!-- / Order Amount-->
                                <div class="cart_buttons">
                                        <a class="btn-continue" href="<?= Yii::app()->baseUrl; ?>/index.php">CONTINUE SHOPPING</a>
                                        <?php if (isset(Yii::app()->session['user']['id'])) { ?>
                                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/Proceed/<?php echo $prod->id; ?>"><button type="button" class="btn btn-big btn-primary cartpg">CHECKOUT&nbsp;<i class="fa fa-angle-right "></i> </button></a>
                                        <?php } else { ?>
                                                <a class="btn btn-big btn-primary" data-toggle="modal" data-target="#logreg">CHECKOUT&nbsp;<i class="fa fa-angle-right "></i> </a>
                                        <?php } ?>
                                </div>

                        </div>
                </div>
        </div>
</div>

<script>
        $(document).ready(function () {
<?php if ($gift_user->hasErrors()) { ?>
                        $("#giftpopup").modal('show');
<?php } ?>
<?php if ($loginform->hasErrors()) { ?>
                        $("#logreg").modal('show');
<?php } ?>
<?php if ($regform->hasErrors()) { ?>

                        $("#prof").addClass('active');
                        $("#hom").removeClass('active');
                        $("#home").removeClass('active');
                        $("#profile").addClass('active');

                        $("#logreg").modal('show');
<?php } ?>
<?php if (Yii::app()->user->hasFlash('feilderror')) { ?>
                        $("#prof").addClass('active');
                        $("#hom").removeClass('active');
                        $("#home").removeClass('active');
                        $("#profile").addClass('active');
                        $("#logreg").modal('show');
<?php } ?>
        });
</script>
<script>
        $(document).ready(function () {
                /*submit gift pack remove form */
                $('.remvegft').click(function () {
                        $('#gftremove').submit();
                });
                /*
                 * CHeck box uncheked while popup is desable
                 */
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

                                $('#temp-user-gifts-form').trigger("reset");
                                $("#giftpopup").modal('show');
                                var cart_id = $(this).attr("id");
                                $("#gift_cart_id").val(cart_id);
                                $(document).on('hide.bs.modal', '#giftpopup', function () {
                                        $('#' + cart_id).prop("checked", false);
                                });
                        }
                });
                $('.quantity').change(function () {
                        showLoader();
                        var cart = $(this).attr('cart');
                        var qty = this.value;
                        var product_id = $('#cart_' + cart).val();
                        quantityChange(cart, qty, product_id);
                        //total();
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
                        var obj = jQuery.parseJSON(data);
                        $(".range_" + cart).html(obj.producttotal);
                        $("#giftprice_" + cart).html(obj.gift_rate);
                        $("#subtotal").html(obj.subtotal);
                        $("#discount").html(obj.discount);
                        $("#ordertotal").html(obj.granttotal);
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









