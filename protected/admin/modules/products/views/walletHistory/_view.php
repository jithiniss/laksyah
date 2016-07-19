<?php
/* @var $this WalletHistoryController */
/* @var $data WalletHistory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_id')); ?>:</b>
	<?php echo CHtml::encode($data->type_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry_date')); ?>:</b>
	<?php echo CHtml::encode($data->entry_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('credit_debit')); ?>:</b>
	<?php echo CHtml::encode($data->credit_debit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('balance_amt')); ?>:</b>
	<?php echo CHtml::encode($data->balance_amt); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ids')); ?>:</b>
	<?php echo CHtml::encode($data->ids); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field1')); ?>:</b>
	<?php echo CHtml::encode($data->field1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field2')); ?>:</b>
	<?php echo CHtml::encode($data->field2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_method')); ?>:</b>
	<?php echo CHtml::encode($data->payment_method); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transaction_id')); ?>:</b>
	<?php echo CHtml::encode($data->transaction_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unique_code')); ?>:</b>
	<?php echo CHtml::encode($data->unique_code); ?>
	<br />

	*/ ?>

</div>