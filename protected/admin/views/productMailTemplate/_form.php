<?php
/* @var $this ProductMailTemplateController */
/* @var $model ProductMailTemplate */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'product-mail-template-form',
            'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
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
                <?php echo $form->labelEx($model, 'product_id', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'product_id', CHtml::listData(Products::model()->findAll(), 'id', 'product_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'product_id'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'title', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'title'); ?>
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

        <div class="box-footer">
                <label>&nbsp;</label><br/>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->