<?php
/* @var $this WalletHistoryController */
/* @var $model WalletHistory */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type_id'); ?>
		<?php echo $form->textField($model,'type_id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'entry_date'); ?>
		<?php echo $form->textField($model,'entry_date',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'credit_debit'); ?>
		<?php echo $form->textField($model,'credit_debit',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'balance_amt'); ?>
		<?php echo $form->textField($model,'balance_amt',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ids'); ?>
		<?php echo $form->textField($model,'ids',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'field1'); ?>
		<?php echo $form->textField($model,'field1',array('size'=>60,'maxlength'=>200,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'field2'); ?>
		<?php echo $form->textField($model,'field2',array('class' => 'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->