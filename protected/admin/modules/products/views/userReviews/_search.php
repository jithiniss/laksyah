<?php
/* @var $this UserReviewsController */
/* @var $model UserReviews */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'guest_user'); ?>
		<?php echo $form->textField($model,'guest_user',array('size'=>60,'maxlength'=>225,'class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_image'); ?>
		<?php echo $form->textField($model,'user_image',array('size'=>60,'maxlength'=>225,'class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_id'); ?>
		<?php echo $form->textField($model,'product_id',array('class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'review'); ?>
		<?php echo $form->textArea($model,'review',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'approvel'); ?>
		<?php echo $form->textField($model,'approvel',array('class'=>'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->