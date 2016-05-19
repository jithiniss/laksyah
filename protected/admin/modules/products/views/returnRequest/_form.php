

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'return-request-form',
        'htmlOptions' => array('class' => 'form-horizontal'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'product_description', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textArea($model, 'product_description', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'product_description'); ?>
    </div>
    <div class="box-footer">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success pos')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->