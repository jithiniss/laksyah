<?php
/* @var $this OrderController */
/* @var $data Order */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
    <?php echo CHtml::encode($data->user_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('total_amount')); ?>:</b>
    <?php echo CHtml::encode($data->total_amount); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('order_date')); ?>:</b>
    <?php echo CHtml::encode($data->order_date); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('address_book_id')); ?>:</b>
    <?php echo CHtml::encode($data->address_book_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
    <?php echo CHtml::encode($data->comment); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('payment_mode')); ?>:</b>
    <?php echo CHtml::encode($data->payment_mode); ?>
    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('admin_comment')); ?>:</b>
    <?php echo CHtml::encode($data->admin_comment); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('transaction_id')); ?>:</b>
      <?php echo CHtml::encode($data->transaction_id); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('payment_status')); ?>:</b>
      <?php echo CHtml::encode($data->payment_status); ?>
      <br />
     *
     *  <b><?php echo CHtml::encode($data->getAttributeLabel('admin_status')); ?>:</b>
      <?php echo CHtml::encode($data->admin_status); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
      <?php echo CHtml::encode($data->status); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('DOC')); ?>:</b>
      <?php echo CHtml::encode($data->DOC); ?>
      <br />

     */ ?>

</div>