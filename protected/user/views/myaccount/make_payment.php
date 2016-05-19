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
<div class="form">

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


        <?php if (Yii::app()->user->hasFlash('success')): ?>
                <div class="alert alert-success normal">
                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                </div>
        <?php endif; ?>
        <?php if (Yii::app()->user->hasFlash('error')): ?>
                <div class="alert alert-danger">
                        <strong>Danger!</strong> <?php echo Yii::app()->user->getFlash('error'); ?>
                </div>
        <?php endif; ?>


        <div class="form_make">
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'product_name'); ?>
                        <?php echo $form->textField($model, 'product_name', array('size' => 60, 'height' => 60)); ?>
                        <?php echo $form->error($model, 'product_name', array('style' => 'color:red')); ?>
                </div>
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'product_code'); ?>
                        <?php echo $form->textField($model, 'product_code', array('size' => 60)); ?>
                        <?php echo $form->error($model, 'product_code', array('style' => 'color:red')); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'message'); ?>
                        <?php echo $form->textArea($model, 'message', array('size' => 200)); ?>
                        <?php echo $form->error($model, 'message', array('style' => 'color:red')); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'amount_type'); ?>
                        <?php
                        echo $form->dropDownList($model, 'amount_type', array('2' => 'Advance Payment', '1' => 'Final', '0' => 'other'));
                        echo $form->textField($model, 'amount', array('size' => 60));
                        ?>
                        <?php echo $form->error($model, 'amount', array('style' => 'color:red')); ?>
                        <?php echo $form->error($model, 'amount_type', array('style' => 'color:red')); ?>
                </div>



                <div class="form-group">
                        <?php echo $form->labelEx($model, 'pay_method'); ?>
                        <?php echo $form->radioButtonList($model, 'pay_method', array('1' => ''), array('uncheckValue' => null)); ?><?php echo 'CREDIT/DEBIT/NET BANKING:'; ?>
                        <?php echo $form->radioButtonList($model, 'pay_method', array('2' => ''), array('uncheckValue' => null)); ?><?php echo 'PAYPAL:'; ?>
                        <?php echo $form->radioButtonList($model, 'pay_method', array('3' => ''), array('uncheckValue' => null)); ?><?php echo 'VOUCHER:'; ?>
                        <?php echo $form->error($model, 'pay_method', array('style' => 'color:red')); ?>
                </div>
                <div class="form-group">

                        <?php echo $form->checkBox($model, 'status', array('value' => 1, 'uncheckValue' => 0)); ?><?php echo 'By making to agree our payment policies:'; ?>
                        <?php echo $form->error($model, 'status'); ?>
                </div>

        </div>
        <div class="row buttons" style="margin-left: 76px;">
                <?php echo CHtml::submitButton('SUBMIT', array('class' => 'btn btn-success pos')); ?>
        </div>

        <?php $this->endWidget(); ?>

        <!-- form -->