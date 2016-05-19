<div class="container">
        <div class="row">


                <div class="col-md-12">
                        <div class="row">

                                <div class="col-md-4 col-md-offset-4">
                                        <?php if (Yii::app()->user->hasFlash('wishlist_user')): ?>
                                                <div class="alert alert-danger mesage">
                                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                        <strong>sorry!</strong><?php echo Yii::app()->user->getFlash('wishlist_user'); ?>
                                                </div>
                                        <?php endif; ?>

                                        <h1>Login</h1>
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
                                                <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Email Address', 'class' => 'form-contact', 'autocomplete' => "off")); ?>
                                                <?php echo $form->error($model, 'email'); ?>

                                        </div>
                                        <div class="form-group">
                                                <?php echo $form->labelEx($model, 'password', array('class' => '')); ?>
                                                <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Password', 'class' => 'form-contact')); ?>
                                                <?php echo $form->error($model, 'password'); ?>

                                        </div>



                                        <ul class="list-inline list-unstyled">
                                                <li ><a style="text-decoration:underline;" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/forgotPassword/">Forgot Password ?</a></li>
                                                <li><a style="text-decoration:underline;" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/register/">New User ?</a></li>
                                                <li>
                                                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Sign In' : 'Sign In', array('class' => 'btn btn-default bowl3')); ?>
                                                </li>


                                                <?php $this->endWidget(); ?>

                                </div>   </div>   </div>   </div>   </div>