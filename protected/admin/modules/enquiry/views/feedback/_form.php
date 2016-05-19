

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'feedback-form',
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
        <div class="col-sm-10"><?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'email', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'address', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textArea($model, 'address', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'address'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'phone', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'phone', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'phone'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'message', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textArea($model, 'message', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'message'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'DOC', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'DOC', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'DOC'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'DOU', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'DOU', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'DOU'); ?>
    </div>

    <div class="box-footer">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->