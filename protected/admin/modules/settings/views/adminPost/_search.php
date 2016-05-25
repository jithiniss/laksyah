<?php
/* @var $this AdminPostController */
/* @var $model AdminPost */
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
		<?php echo $form->label($model,'post_name'); ?>
		<?php echo $form->textField($model,'post_name',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'products'); ?>
		<?php echo $form->textField($model,'products',array('size'=>60,'maxlength'=>100,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'orders'); ?>
		<?php echo $form->textField($model,'orders',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'coupons'); ?>
		<?php echo $form->textField($model,'coupons',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cms'); ?>
		<?php echo $form->textField($model,'cms',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'masters'); ?>
		<?php echo $form->textField($model,'masters',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_details'); ?>
		<?php echo $form->textField($model,'user_details',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reports'); ?>
		<?php echo $form->textField($model,'reports',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CB'); ?>
		<?php echo $form->textField($model,'CB',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'UB'); ?>
		<?php echo $form->textField($model,'UB',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DOC'); ?>
		<?php echo $form->textField($model,'DOC',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DOU'); ?>
		<?php echo $form->textField($model,'DOU',array('class' => 'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->