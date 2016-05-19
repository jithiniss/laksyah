<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="row">
        <?php echo $form->label($model, 'id'); ?>
        <?php echo $form->textField($model, 'id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'category_id'); ?>
        <?php echo $form->textField($model, 'category_id', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model, 'product_name'); ?>
        <?php echo $form->textField($model, 'product_name', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'product_code'); ?>
        <?php echo $form->textField($model, 'product_code', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
    </div>
    <div class="row">
        <?php echo $form->label($model, 'main_image'); ?>
        <?php echo $form->textField($model, 'main_image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'gallery_images'); ?>
        <?php echo $form->textField($model, 'gallery_images', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'description'); ?>
        <?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'meta_title'); ?>
        <?php echo $form->textField($model, 'meta_title', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'meta_description'); ?>
        <?php echo $form->textArea($model, 'meta_description', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'meta_keywords'); ?>
        <?php echo $form->textField($model, 'meta_keywords', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'header_visibility'); ?>
        <?php echo $form->textField($model, 'header_visibility', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'sort_order'); ?>
        <?php echo $form->textField($model, 'sort_order', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'price'); ?>
        <?php echo $form->textField($model, 'price', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'quantity'); ?>
        <?php echo $form->textField($model, 'quantity', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'subtract_stock'); ?>
        <?php echo $form->textField($model, 'subtract_stock', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'requires_shipping'); ?>
        <?php echo $form->textField($model, 'requires_shipping', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'requires_shipping'); ?>
        <?php echo $form->textField($model, 'requires_shipping', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'enquiry_sale'); ?>
        <?php echo $form->textField($model, 'enquiry_sale', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'new_from'); ?>
        <?php echo $form->textField($model, 'new_from', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'new_to'); ?>
        <?php echo $form->textField($model, 'new_to', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'sale_from'); ?>
        <?php echo $form->textField($model, 'sale_from', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'sale_to'); ?>
        <?php echo $form->textField($model, 'sale_to', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'special_price_from'); ?>
        <?php echo $form->textField($model, 'special_price_from', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'special_price_to'); ?>
        <?php echo $form->textField($model, 'special_price_to', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'tax'); ?>
        <?php echo $form->textField($model, 'tax', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'gift_option'); ?>
        <?php echo $form->textField($model, 'gift_option', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'stock_availability'); ?>
        <?php echo $form->textField($model, 'stock_availability', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'canonical_name'); ?>
        <?php echo $form->textField($model, 'canonical_name', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'video_link'); ?>
        <?php echo $form->textField($model, 'video_link', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'dimensionl'); ?>
        <?php echo $form->textField($model, 'dimensionl', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'dimensionw'); ?>
        <?php echo $form->textField($model, 'dimensionw', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'dimensionh'); ?>
        <?php echo $form->textField($model, 'dimensionh', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'dimension_class'); ?>
        <?php echo $form->textField($model, 'dimension_class', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'weight'); ?>
        <?php echo $form->textField($model, 'weight', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'weight_class'); ?>
        <?php echo $form->textField($model, 'weight_class', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'status'); ?>
        <?php echo $form->textField($model, 'status', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'exchange'); ?>
        <?php echo $form->textField($model, 'exchange', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'related_products'); ?>
        <?php echo $form->textField($model, 'related_products', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'CB'); ?>
        <?php echo $form->textField($model, 'CB', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'UB'); ?>
        <?php echo $form->textField($model, 'UB', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'DOC'); ?>
        <?php echo $form->textField($model, 'DOC', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'DOU'); ?>
        <?php echo $form->textField($model, 'DOU', array('class' => 'form-control')); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->