<?php
/* @var $this UserSizechartController */
/* @var $model UserSizechart */
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
		<?php echo $form->label($model,'product_name'); ?>
		<?php echo $form->textField($model,'product_name',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_code'); ?>
		<?php echo $form->textField($model,'product_code',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit'); ?>
		<?php echo $form->textField($model,'unit',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'standerd'); ?>
		<?php echo $form->textField($model,'standerd',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'around_neck'); ?>
		<?php echo $form->textField($model,'around_neck',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'neck_depth'); ?>
		<?php echo $form->textField($model,'neck_depth',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'around_upper_chest'); ?>
		<?php echo $form->textField($model,'around_upper_chest',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'around_chest'); ?>
		<?php echo $form->textField($model,'around_chest',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'around_lower_chest'); ?>
		<?php echo $form->textField($model,'around_lower_chest',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shoulder_to_breastpoint'); ?>
		<?php echo $form->textField($model,'shoulder_to_breastpoint',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'around_waist'); ?>
		<?php echo $form->textField($model,'around_waist',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shoulder_to_waist'); ?>
		<?php echo $form->textField($model,'shoulder_to_waist',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'around_armhole'); ?>
		<?php echo $form->textField($model,'around_armhole',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sleeve_length'); ?>
		<?php echo $form->textField($model,'sleeve_length',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'arm_length'); ?>
		<?php echo $form->textField($model,'arm_length',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'around_upper_arm'); ?>
		<?php echo $form->textField($model,'around_upper_arm',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'around_elbow'); ?>
		<?php echo $form->textField($model,'around_elbow',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'around_wrist'); ?>
		<?php echo $form->textField($model,'around_wrist',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'length_upper_garment'); ?>
		<?php echo $form->textField($model,'length_upper_garment',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shoulder_width'); ?>
		<?php echo $form->textField($model,'shoulder_width',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'around_lower_waist'); ?>
		<?php echo $form->textField($model,'around_lower_waist',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'waist_to_ankle'); ?>
		<?php echo $form->textField($model,'waist_to_ankle',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inseam_to_ankle'); ?>
		<?php echo $form->textField($model,'inseam_to_ankle',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'around_hip'); ?>
		<?php echo $form->textField($model,'around_hip',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'around_tigh'); ?>
		<?php echo $form->textField($model,'around_tigh',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'around_knee'); ?>
		<?php echo $form->textField($model,'around_knee',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'around_calf'); ?>
		<?php echo $form->textField($model,'around_calf',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'around_ankle'); ?>
		<?php echo $form->textField($model,'around_ankle',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skirt_length'); ?>
		<?php echo $form->textField($model,'skirt_length',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gown_full_length'); ?>
		<?php echo $form->textField($model,'gown_full_length',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comments'); ?>
		<?php echo $form->textArea($model,'comments',array('rows'=>6, 'cols'=>50 , 'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enq_id'); ?>
		<?php echo $form->textField($model,'enq_id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enq_history_id'); ?>
		<?php echo $form->textField($model,'enq_history_id',array('class' => 'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->