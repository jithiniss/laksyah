<div class="container">
    <div class="row">
        <div class="login_popup popup">
            <div class="popup_body">
                <h2>SIGN IN</h2>
                <h4>Sign in to proceed to Checkout</h4>
                <?php if(Yii::app()->user->hasFlash('wishlist_user')): ?>
                        <div class="alert alert-danger mesage">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong>sorry!</strong><?php echo Yii::app()->user->getFlash('wishlist_user'); ?>
                        </div>
                <?php endif; ?>
                <?php
                $form = $this->beginWidget('CActiveForm', array(
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
                    <?php echo $form->labelEx($model, 'email', array('class' => '')); ?>
                    <?php echo $form->textField($model, 'email', array('maxlength' => 100, 'class' => 'form-control', 'autocomplete' => "off")); ?>
                    <?php echo $form->error($model, 'email'); ?>

                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'password', array('class' => '')); ?>
                    <?php echo $form->passwordField($model, 'password', array('maxlength' => 100, 'class' => 'form-control')); ?>
                    <?php echo $form->error($model, 'password'); ?>

                </div>



                <ul class="list-inline list-unstyled">
                    <li ><a class="forgot" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/forgotPassword/">Forgot Password ?</a></li>
                    <li><a class="text-center register italic" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/new-user">New User Registration?</a></li>
                    <li>
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'SIGN IN' : 'SIGN IN', array('class' => 'btn-primary btn-full')); ?>
                    </li>


                    <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>