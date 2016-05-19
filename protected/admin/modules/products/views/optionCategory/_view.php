<?php
/* @var $this OptionCategoryController */
/* @var $data OptionCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('option_type_id')); ?>:</b>
	<?php echo CHtml::encode($data->option_type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('color_name')); ?>:</b>
	<?php echo CHtml::encode($data->color_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('color_code')); ?>:</b>
	<?php echo CHtml::encode($data->color_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field1')); ?>:</b>
	<?php echo CHtml::encode($data->field1); ?>
	<br />


</div>