<?php
/* @var $this MakePaymentController */
/* @var $model MakePayment */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'make-payment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <br/>
    <div class="form-inline">
                        <div class="form-group">
                    <?php echo $form->labelEx($model,'userid'); ?>
                    <?php echo $form->textField($model,'userid',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'userid'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'product_name'); ?>
                    <?php echo $form->textField($model,'product_name',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'product_name'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'product_code'); ?>
                    <?php echo $form->textField($model,'product_code',array('size'=>15,'maxlength'=>15,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'product_code'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'message'); ?>
                    <?php echo $form->textArea($model,'message',array('rows'=>6, 'cols'=>50 , 'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'message'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'amount_type'); ?>
                    <?php echo $form->textField($model,'amount_type',array('size'=>15,'maxlength'=>15,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'amount_type'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'amount'); ?>
                    <?php echo $form->textField($model,'amount',array('size'=>25,'maxlength'=>25,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'amount'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'pay_method'); ?>
                    <?php echo $form->textField($model,'pay_method',array('size'=>15,'maxlength'=>15,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'pay_method'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'date'); ?>
                    <?php echo $form->textField($model,'date',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'date'); ?>
                </div>

                    </div>
    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->