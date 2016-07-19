<?php
/* @var $this WalletHistoryController */
/* @var $model WalletHistory */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'wallet-history-form',
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
                    <?php echo $form->labelEx($model,'user_id'); ?>
                    <?php echo $form->textField($model,'user_id',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'user_id'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'type_id'); ?>
                    <?php echo $form->textField($model,'type_id',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'type_id'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'amount'); ?>
                    <?php echo $form->textField($model,'amount',array('size'=>10,'maxlength'=>10,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'amount'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'entry_date'); ?>
                    <?php echo $form->textField($model,'entry_date',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'entry_date'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'credit_debit'); ?>
                    <?php echo $form->textField($model,'credit_debit',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'credit_debit'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'balance_amt'); ?>
                    <?php echo $form->textField($model,'balance_amt',array('size'=>10,'maxlength'=>10,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'balance_amt'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'ids'); ?>
                    <?php echo $form->textField($model,'ids',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'ids'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'field1'); ?>
                    <?php echo $form->textField($model,'field1',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'field1'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'field2'); ?>
                    <?php echo $form->textField($model,'field2',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'field2'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'payment_method'); ?>
                    <?php echo $form->textField($model,'payment_method',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'payment_method'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'transaction_id'); ?>
                    <?php echo $form->textField($model,'transaction_id',array('class' => 'form-control')); ?>
                    <?php echo $form->error($model,'transaction_id'); ?>
                </div>

                                <div class="form-group">
                    <?php echo $form->labelEx($model,'unique_code'); ?>
                    <?php echo $form->textField($model,'unique_code',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
                    <?php echo $form->error($model,'unique_code'); ?>
                </div>

                    </div>
    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->