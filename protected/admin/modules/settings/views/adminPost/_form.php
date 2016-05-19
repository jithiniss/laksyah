<?php
/* @var $this AdminPostController */
/* @var $model AdminPost */
/* @var $form CActiveForm */
?>



<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'admin-post-form',
    'htmlOptions' => array('class' => "form-horizontal"),
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>

<p class="note">Fields with <span class="required">*</span> are required.</p>



<div class="form-group">
    <?php echo $form->labelEx($model, 'post_name', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-10"><?php echo $form->textField($model, 'post_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?></div>
    <?php echo $form->error($model, 'post_name'); ?>
</div>

<div class="form-group">

    <?php echo $form->labelEx($model, 'static_pages', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-10"><?php echo $form->dropDownList($model, 'static_pages', array('1' => 'Yes', '0' => 'No'), array('class' => 'form-control')); ?></div>
    <?php echo $form->error($model, 'static_pages'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'products', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-10"><?php echo $form->dropDownList($model, 'products', array('1' => 'Yes', '0' => 'No'), array('class' => 'form-control')); ?></div>
    <?php echo $form->error($model, 'products'); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'enquiry', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-10"><?php echo $form->dropDownList($model, 'enquiry', array('1' => 'Yes', '0' => 'No'), array('class' => 'form-control')); ?>
    </div>
    <?php echo $form->error($model, 'enquiry'); ?>
</div>
<div class="box-footer">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah')); ?>
</div>

<?php $this->endWidget(); ?>

