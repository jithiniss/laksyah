

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'product-category-path-form',
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
        <?php echo $form->labelEx($model, 'category', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'category', array('class' => 'form-control')); ?>
        </div>
<?php echo $form->error($model, 'category'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'parent', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'parent', array('class' => 'form-control')); ?>
        </div>
<?php echo $form->error($model, 'parent'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'level', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'level', array('class' => 'form-control')); ?>
        </div>
<?php echo $form->error($model, 'level'); ?>
    </div>

    <div class="box-footer">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->