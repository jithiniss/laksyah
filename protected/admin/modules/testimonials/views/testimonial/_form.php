<?php
/* @var $this TestimonialController */
/* @var $model Testimonial */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'testimonial-form',
        'htmlOptions' => array('class' => 'form-horizontal'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>


    <div class="form-group">
        <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 111, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'position', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'position', array('size' => 60, 'maxlength' => 111, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'position'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'content', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php
            $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                'model' => $model,
                'attribute' => 'content',
            ));
            ?>
        </div>
        <?php echo $form->error($model, 'content'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'status'); ?>
    </div>
    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->