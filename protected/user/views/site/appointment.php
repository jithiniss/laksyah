<?php
/* @var $this BookAppointmentController */
/* @var $model BookAppointment */
/* @var $form CActiveForm */
?>
<style>
    .normal{
        height:40px;
        width: 426px;
        margin-left: 442px;
    }
</style>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'book-appointment-appointment-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // See class documentation of CActiveForm for details on this,
        // you need to use the performAjaxValidation()-method described there.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note"></p>
    <?php if (Yii::app()->user->hasFlash('success')): ?>
            <div class="alert alert-success normal">
                <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
            </div>
    <?php endif; ?>
    <?php if (Yii::app()->user->hasFlash('error')): ?>
            <div class="alert alert-danger">
                <strong>Danger!</strong> <?php echo Yii::app()->user->getFlash('error'); ?>
            </div>
    <?php endif; ?>
    <h1>Appointment</h1>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60)); ?>
        <?php echo $form->error($model, 'name', array('style' => 'color:red')); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'email'); ?>
        <?php echo $form->textField($model, 'email', array('size' => 60)); ?>
        <?php echo $form->error($model, 'email', array('style' => 'color:red')); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'phone'); ?>
        <?php echo $form->textField($model, 'phone', array('size' => 60)); ?>
        <?php echo $form->error($model, 'phone', array('style' => 'color:red')); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'country'); ?>
        <?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name')); ?>
        <?php echo $form->error($model, 'country', array('style' => 'color:red')); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'city'); ?>
        <?php echo $form->textField($model, 'city', array('size' => 60)); ?>
        <?php echo $form->error($model, 'city', array('style' => 'color:red')); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'address'); ?>
        <?php echo $form->textArea($model, 'address', array('rows' => 5, 'cols' => 60)); ?>
        <?php echo $form->error($model, 'address', array('style' => 'color:red')); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'notes'); ?>
        <?php echo $form->textArea($model, 'notes', array('rows' => 5, 'cols' => 60)); ?>
        <?php echo $form->error($model, 'notes', array('style' => 'color:red')); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit', array('class' => 'btn btn-success pos')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->