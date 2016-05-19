

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'social-media-form',
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
        <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'readonly' => true)); ?>
        </div>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'link', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'link', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'link'); ?>
    </div>


    <div class="box-footer">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->