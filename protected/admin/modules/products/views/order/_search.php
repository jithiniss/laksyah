<?php
/* @var $this OrderController */
/* @var $model Order */
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
<?php echo $form->label($model, 'user_id'); ?>
<?php echo $form->textField($model, 'user_id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'total_amount'); ?>
<?php echo $form->textField($model, 'total_amount', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'order_date'); ?>
<?php echo $form->textField($model, 'order_date', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'address_book_id'); ?>
<?php echo $form->textField($model, 'address_book_id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'comment'); ?>
<?php echo $form->textArea($model, 'comment', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'payment_mode'); ?>
<?php echo $form->textField($model, 'payment_mode', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'transaction_id'); ?>
<?php echo $form->textField($model, 'transaction_id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'payment_status'); ?>
        <?php echo $form->textField($model, 'payment_status', array('class' => 'form-control')); ?>
    </div>
    <div class="row">
<?php echo $form->label($model, 'admin_status'); ?>
<?php echo $form->textField($model, 'admin_status', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'status'); ?>
<?php echo $form->textField($model, 'status', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'DOC'); ?>
<?php echo $form->textField($model, 'DOC', array('class' => 'form-control')); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->