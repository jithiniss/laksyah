<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'admin-user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>





    <div class="login-box">
        <div class="login-logo">
            <a href="<?php //echo Yii::app()->baseUrl;         ?>#"><img src="<?php echo Yii::app()->baseUrl; ?>/images/logo.png" /></a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Login to Admin Panel</p>

            <div class="form-group has-feedback">

                <?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'username', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'username'); ?>
            </div>
            <div class="form-group has-feedback">

                <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'password', 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'password'); ?>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <!--                    <div class="checkbox icheck">
                                            <label>
                                                <input type="checkbox"> Remember Me
                                            </label>
                                        </div>-->
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-warning btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
            </div>




            <!--            <a href="#">I forgot my password</a><br>
                        <a href="register.html" class="text-center">Register a new membership</a>-->

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <?php $this->endWidget(); ?>

</div>
