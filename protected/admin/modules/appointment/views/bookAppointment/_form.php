<?php
/* @var $this BookAppointmentController */
/* @var $model BookAppointment */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'book-appointment-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>
    <br/>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'name'); ?>
<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 111, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'email'); ?>
<?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 111, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'phone'); ?>
<?php echo $form->textField($model, 'phone', array('size' => 60, 'maxlength' => 111, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'phone'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'country'); ?>
<?php echo $form->textField($model, 'country', array('size' => 60, 'maxlength' => 111, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'country'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'city'); ?>
<?php echo $form->textField($model, 'city', array('size' => 60, 'maxlength' => 111, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'city'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'address'); ?>
<?php echo $form->textField($model, 'address', array('size' => 60, 'maxlength' => 111, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'address'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'notes'); ?>
<?php echo $form->textField($model, 'notes', array('size' => 60, 'maxlength' => 111, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'notes'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'date'); ?>
<?php echo $form->textField($model, 'date', array('class' => 'form-control')); ?>
<?php echo $form->error($model, 'date'); ?>
    </div>


    <div class="form-group btns">
        <label>&nbsp;</label><br/>
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->