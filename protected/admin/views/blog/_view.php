<?php
/* @var $this BlogController */
/* @var $data Blog */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('heading')); ?>:</b>
	<?php echo CHtml::encode($data->heading); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('small_image')); ?>:</b>
	<?php echo CHtml::encode($data->small_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('big_image')); ?>:</b>
	<?php echo CHtml::encode($data->big_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('small_content')); ?>:</b>
	<?php echo CHtml::encode($data->small_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('big_content')); ?>:</b>
	<?php echo CHtml::encode($data->big_content); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_keywords')); ?>:</b>
	<?php echo CHtml::encode($data->meta_keywords); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_title')); ?>:</b>
	<?php echo CHtml::encode($data->meta_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('meta_description')); ?>:</b>
	<?php echo CHtml::encode($data->meta_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
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

	*/ ?>

</div>