<?php
/* @var $this AdminUserController */
/* @var $data AdminUser */
?>

<div class="view">


    <b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
    <?php echo CHtml::encode($data->username); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
    <?php echo CHtml::encode($data->password); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::encode($data->name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
    <?php echo CHtml::encode($data->email); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
    <?php echo CHtml::encode($data->phone); ?>
    <br />

    <?php /*
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