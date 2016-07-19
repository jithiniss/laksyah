<?php
/* @var $this UserAddressController */
/* @var $model UserAddress */
/* @var $form CActiveForm */
?>
<div class="container main_container inner_pages ">
        <div class="breadcrumbs"> <?php echo CHtml::link('HOME', array('site/index')); ?> <span>/</span> <?php echo CHtml::link('My Account', array('Myaccount/index')); ?> <span>/</span> New Address Book </div>
        <div class="row">
                <?php echo $this->renderPartial('_menu'); ?>
                <div class="col-sm-9 user_content">
                        <h1>Edit Address Book</h1>
                        <?php if (Yii::app()->user->hasFlash('success')): ?>
                                <div class="alert alert-success">
                                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                </div>
                        <?php endif; ?>
                        <?php if (Yii::app()->user->hasFlash('notice')): ?>
                                <div class="alert alert-danger">
                                        <strong>Danger!</strong> <?php echo Yii::app()->user->getFlash('notice'); ?>
                                </div>
                        <?php endif; ?>
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'user-address-form',
                            'action' => Yii::app()->baseUrl . '/index.php/Myaccount/EditAddress/' . $model->id,
                            // Please note: When you enable ajax validation, make sure the corresponding
                            // controller action is handling ajax validation correctly.
                            // There is a call to performAjaxValidation() commented in generated controller code.
                            // See class documentation of CActiveForm for details on this.
                            'enableAjaxValidation' => false,
                        ));
                        ?>


                        <?php echo $form->errorSummary($model); ?>
                        <div class="registration_form">
                                <div class="row">
                                        <div class="col-sm-6">
                                                <?php echo $form->labelEx($model, 'first_name'); ?>
                                                <?php echo $form->textField($model, 'first_name', array('size' => 40, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'first_name'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                                <?php echo $form->labelEx($model, 'last_name'); ?>
                                                <?php echo $form->textField($model, 'last_name', array('size' => 40, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'last_name'); ?>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-6">
                                                <?php echo $form->labelEx($model, 'company'); ?>
                                                <?php echo $form->textField($model, 'company', array('size' => 40, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'company'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                                <?php echo $form->labelEx($model, 'contact_number'); ?>
                                                <?php echo $form->textField($model, 'contact_number', array('size' => 40, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'contact_number'); ?>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-6">
                                                <?php echo $form->labelEx($model, 'address_1'); ?>
                                                <?php echo $form->textArea($model, 'address_1', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'address_1'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                                <?php echo $form->labelEx($model, 'address_2'); ?>
                                                <?php echo $form->textArea($model, 'address_2', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'address_2'); ?>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-6">
                                                <?php echo $form->labelEx($model, 'city'); ?>
                                                <?php echo $form->textField($model, 'city', array('size' => 40, 'maxlength' => 100, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'city'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                                <?php echo $form->labelEx($model, 'postcode'); ?>
                                                <?php echo $form->textField($model, 'postcode', array('size' => 40, 'maxlength' => 111, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'postcode'); ?>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-6">
                                                <?php echo $form->labelEx($model, 'country'); ?>
                                                <?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select Country--', 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'country'); ?>
                                        </div>
                                        <div class="col-sm-6">
                                                <?php echo $form->labelEx($model, 'state'); ?>
                                                <?php echo $form->textField($model, 'state', array('size' => 60, 'maxlength' => 111, 'class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'state'); ?>
                                        </div>
                                </div>
                                <div class="row">
                                        <div class="col-sm-6">
                                                <?php echo $form->labelEx($model, 'default_billing_address'); ?>
                                                <?php echo $form->checkBox($model, 'default_billing_address', array('class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'default_billing_address'); ?>
                                        </div>

                                        <div class="col-sm-6">
                                                <?php echo $form->labelEx($model, 'default_shipping_address'); ?>
                                                <?php echo $form->checkBox($model, 'default_shipping_address', array('class' => 'form-control')); ?>
                                                <?php echo $form->error($model, 'default_shipping_address'); ?>
                                        </div>
                                </div>
                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn-primary')); ?>
                        </div>

                        <?php $this->endWidget(); ?>

                </div><!-- form -->
        </div>
</div>
</div>
