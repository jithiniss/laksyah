<?php
/* @var $this OptionCategoryController */
/* @var $model OptionCategory */
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
		<?php echo $form->label($model,'option_type_id'); ?>
		<?php echo $form->textField($model,'option_type_id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'color_name'); ?>
		<?php echo $form->textField($model,'color_name',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'color_code'); ?>
		<?php echo $form->textField($model,'color_code',array('size'=>50,'maxlength'=>50,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'size'); ?>
		<?php echo $form->textField($model,'size',array('size'=>10,'maxlength'=>10,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'field1'); ?>
		<?php echo $form->textField($model,'field1',array('class' => 'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->