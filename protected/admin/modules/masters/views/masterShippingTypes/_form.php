<?php
/* @var $this MasterShippingTypesController */
/* @var $model MasterShippingTypes */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'master-shipping-types-form',
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
    <br/>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'shipping_type', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'shipping_type', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'shipping_type'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'shipping_rate', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'shipping_rate', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'shipping_rate'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <!--    <div class="form-group">
    <?php echo $form->labelEx($model, 'cb'); ?>
    <?php echo $form->textField($model, 'cb', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'cb'); ?>
        </div>
    
        <div class="form-group">
    <?php echo $form->labelEx($model, 'ub'); ?>
    <?php echo $form->textField($model, 'ub', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'ub'); ?>
        </div>
    
        <div class="form-group">
    <?php echo $form->labelEx($model, 'doc'); ?>
    <?php echo $form->textField($model, 'doc', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'doc'); ?>
        </div>
    
        <div class="form-group">
    <?php echo $form->labelEx($model, 'dou'); ?>
    <?php echo $form->textField($model, 'dou', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'dou'); ?>
        </div>-->

    <div class="box-footer">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success pos')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->