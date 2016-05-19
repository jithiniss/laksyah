<?php
/* @var $this UserAddressController */
/* @var $model UserAddress */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-address-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <br/>
    <div class="form-inline">
        <div style="margin-left: 345px;">
            <div class="form-group">
                <?php echo $form->labelEx($model, 'first_name'); ?>
                <?php echo $form->textField($model, 'first_name', array('size' => 40, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'first_name'); ?>
            </div>
            <br><br>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'last_name'); ?>
                <?php echo $form->textField($model, 'last_name', array('size' => 40, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'last_name'); ?>
            </div>
            <br><br>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'company'); ?>
                <?php echo $form->textField($model, 'company', array('size' => 40, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'company'); ?>
            </div>
            <br><br>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'contact_number'); ?>
                <?php echo $form->textField($model, 'contact_number', array('size' => 40, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'contact_number'); ?>
            </div>
            <br><br>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'address_1'); ?>
                <?php echo $form->textArea($model, 'address_1', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'address_1'); ?>
            </div>
            <br><br>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'address_2'); ?>
                <?php echo $form->textArea($model, 'address_2', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'address_2'); ?>
            </div>
            <br><br>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'city'); ?>
                <?php echo $form->textField($model, 'city', array('size' => 40, 'maxlength' => 100, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'city'); ?>
            </div>
            <br><br>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'postcode'); ?>
                <?php echo $form->textField($model, 'postcode', array('size' => 40, 'maxlength' => 111, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'postcode'); ?>
            </div>
            <br><br>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'country'); ?>
                <?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name')); ?>
                <?php echo $form->error($model, 'country'); ?>
            </div>
            <br><br>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'state'); ?>
                <?php echo $form->textField($model, 'state', array('size' => 60, 'maxlength' => 111, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'state'); ?>
            </div>
            <br><br>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'default_billing_address'); ?>
                <?php echo $form->checkBox($model, 'default_billing_address', array('size' => 60, 'maxlength' => 111, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'default_billing_address'); ?>
            </div>
            <br><br>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'default_shipping_address'); ?>
                <?php echo $form->checkBox($model, 'default_shipping_address', array('size' => 60, 'maxlength' => 111, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'default_shipping_address'); ?>
            </div>
            <label>&nbsp;</label><br/>
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->