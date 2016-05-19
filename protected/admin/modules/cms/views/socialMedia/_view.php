<?php
/* @var $this SocialMediaController */
/* @var $data SocialMedia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('DOB')); ?>:</b>
	<?php echo CHtml::encode($data->DOB); ?>
	<br />


</div>