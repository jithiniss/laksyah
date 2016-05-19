<?php
/* @var $this ProductsController */
/* @var $data Products */
?>

<div class="view">
    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
    <?php echo CHtml::encode($data->category_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('product_name')); ?>:</b>
    <?php echo CHtml::encode($data->product_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('product_code')); ?>:</b>
    <?php echo CHtml::encode($data->product_code); ?>
    <br />


    <b><?php echo CHtml::encode($data->getAttributeLabel('main_image')); ?>:</b>
    <?php echo CHtml::encode($data->main_image); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('gallery_images')); ?>:</b>
    <?php echo CHtml::encode($data->gallery_images); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
    <?php echo CHtml::encode($data->description); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('meta_title')); ?>:</b>
    <?php echo CHtml::encode($data->meta_title); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('meta_description')); ?>:</b>
    <?php echo CHtml::encode($data->meta_description); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('meta_keywords')); ?>:</b>
      <?php echo CHtml::encode($data->meta_keywords); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('header_visibility')); ?>:</b>
      <?php echo CHtml::encode($data->header_visibility); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
      <?php echo CHtml::encode($data->sort_order); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
      <?php echo CHtml::encode($data->price); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
      <?php echo CHtml::encode($data->quantity); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('subtract_stock')); ?>:</b>
      <?php echo CHtml::encode($data->subtract_stock); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('requires_shipping')); ?>:</b>
      <?php echo CHtml::encode($data->requires_shipping); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('dimensionl')); ?>:</b>
      <?php echo CHtml::encode($data->dimensionl); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('dimensionw')); ?>:</b>
      <?php echo CHtml::encode($data->dimensionw); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('dimensionh')); ?>:</b>
      <?php echo CHtml::encode($data->dimensionh); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('dimension_class')); ?>:</b>
      <?php echo CHtml::encode($data->dimension_class); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
      <?php echo CHtml::encode($data->weight); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('weight_class')); ?>:</b>
      <?php echo CHtml::encode($data->weight_class); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
      <?php echo CHtml::encode($data->status); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('related_products')); ?>:</b>
      <?php echo CHtml::encode($data->related_products); ?>
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