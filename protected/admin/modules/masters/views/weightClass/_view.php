<?php
/* @var $this WeightClassController */
/* @var $data WeightClass */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit')); ?>:</b>
	<?php echo CHtml::encode($data->unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CB')); ?>:</b>
	<?php echo CHtml::encode($data->CB); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UB')); ?>:</b>
	<?php echo CHtml::encode($data->UB); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DOC')); ?>:</b>
	<?php echo CHtml::encode($data->DOC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DOU')); ?>:</b>
	<?php echo CHtml::encode($data->DOU); ?>
	<br />


</div>