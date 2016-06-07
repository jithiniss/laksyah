<?php
/* @var $this QAndAController */
/* @var $data QAndA */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_q1')); ?>:</b>
	<?php echo CHtml::encode($data->order_q1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_a1')); ?>:</b>
	<?php echo CHtml::encode($data->order_a1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_q2')); ?>:</b>
	<?php echo CHtml::encode($data->order_q2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_a2')); ?>:</b>
	<?php echo CHtml::encode($data->order_a2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_q1')); ?>:</b>
	<?php echo CHtml::encode($data->payment_q1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_a1')); ?>:</b>
	<?php echo CHtml::encode($data->payment_a1); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_q2')); ?>:</b>
	<?php echo CHtml::encode($data->payment_q2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_a2')); ?>:</b>
	<?php echo CHtml::encode($data->payment_a2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cb')); ?>:</b>
	<?php echo CHtml::encode($data->cb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ub')); ?>:</b>
	<?php echo CHtml::encode($data->ub); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc')); ?>:</b>
	<?php echo CHtml::encode($data->doc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dou')); ?>:</b>
	<?php echo CHtml::encode($data->dou); ?>
	<br />

	*/ ?>

</div>