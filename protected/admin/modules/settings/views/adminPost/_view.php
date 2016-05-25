<?php
/* @var $this AdminPostController */
/* @var $data AdminPost */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('post_name')); ?>:</b>
	<?php echo CHtml::encode($data->post_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('products')); ?>:</b>
	<?php echo CHtml::encode($data->products); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orders')); ?>:</b>
	<?php echo CHtml::encode($data->orders); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('coupons')); ?>:</b>
	<?php echo CHtml::encode($data->coupons); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cms')); ?>:</b>
	<?php echo CHtml::encode($data->cms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('masters')); ?>:</b>
	<?php echo CHtml::encode($data->masters); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('user_details')); ?>:</b>
	<?php echo CHtml::encode($data->user_details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reports')); ?>:</b>
	<?php echo CHtml::encode($data->reports); ?>
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