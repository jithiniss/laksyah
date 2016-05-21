<?php
/* @var $this OrderHistoryController */
/* @var $model OrderHistory */
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
		<?php echo $form->label($model,'order_id'); ?>
		<?php echo $form->textField($model,'order_id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_status_comment'); ?>
		<?php echo $form->textField($model,'order_status_comment',array('size'=>60,'maxlength'=>500,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_status'); ?>
		<?php echo $form->textField($model,'order_status',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shipping_type'); ?>
		<?php echo $form->textField($model,'shipping_type',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tracking_id'); ?>
		<?php echo $form->textField($model,'tracking_id',array('size'=>60,'maxlength'=>225,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cb'); ?>
		<?php echo $form->textField($model,'cb',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ub'); ?>
		<?php echo $form->textField($model,'ub',array('class' => 'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->