<?php
/* @var $this AdminPostController */
/* @var $data AdminPost */
?>

<div class="view">



    <b><?php echo CHtml::encode($data->getAttributeLabel('post_name')); ?>:</b>
    <?php echo CHtml::encode($data->post_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('static_pages')); ?>:</b>
    <?php echo CHtml::encode($data->static_pages); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('products')); ?>:</b>
    <?php echo CHtml::encode($data->products); ?>

    <br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('enquiry')); ?>:</b>
    <?php echo CHtml::encode($data->enquiry); ?>
    <br />




    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('DOU')); ?>:</b>
      <?php echo CHtml::encode($data->DOU); ?>
      <br />

     */ ?>

</div>