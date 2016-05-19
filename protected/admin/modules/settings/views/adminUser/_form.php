

<?php
/* @var $this AdminUserController */
/* @var $model AdminUser */
/* @var $form CActiveForm */
?>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'admin-user-form',
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
    <?php echo $form->labelEx($model, 'admin_post_id', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'admin_post_id', CHtml::listData(AdminPost::model()->findAll(), 'id', 'post_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?></div>
    <?php echo $form->error($model, 'admin_post_id'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'username', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-10"><?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?></div>
    <?php echo $form->error($model, 'username'); ?>
</div>


<div class="form-group">
    <?php echo $form->labelEx($model, 'password', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-10"><?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?></div>
    <?php echo $form->error($model, 'password'); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-10"><?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?></div>
    <?php echo $form->error($model, 'name'); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-10"> <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?></div>
    <?php echo $form->error($model, 'email'); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($model, 'phone', array('class' => 'col-sm-2 control-label')); ?>
    <div class="col-sm-10"><?php echo $form->textField($model, 'phone', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?></div>
    <?php echo $form->error($model, 'phone'); ?>
</div>

<div class="box-footer">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah')); ?>

</div>

<?php $this->endWidget(); ?>
</div>