<?php
/* @var $this UserNotifyController */
/* @var $model UserNotify */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-notify-form',
        'htmlOptions' => array('class' => 'form-horizontal'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php
    echo $form->errorSummary($model);
    $name = UserDetails::model()->findByPk($model->user_id);
    ?>


    <br/>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'email_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"> <input type="text" value="<?= $name->email; ?>" class="form-control" readonly="true"></div>
        <?php echo $form->error($model, 'user_id'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'prod_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">  <?php echo $form->textField($model, 'prod_id', array('class' => 'form-control', 'readonly' => 'true')); ?></div>
        <?php echo $form->error($model, 'prod_id'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"> <?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?></div>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'date', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">  <?php echo $form->textField($model, 'date', array('class' => 'form-control')); ?></div>
        <?php echo $form->error($model, 'date'); ?>
    </div>


    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->