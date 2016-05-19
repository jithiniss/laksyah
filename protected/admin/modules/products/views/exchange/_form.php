

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'exchange-form',
        'htmlOptions' => array('class' => 'form-horizontal',
            'enctype' => 'multipart/form-data',
        ),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>



    <div class="form-group">
        <?php echo $form->labelEx($model, 'product_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'product_id', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'product_id'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'email', array('size' => 30, 'maxlength' => 30, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'email'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'phone', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'phone', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'phone'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'description', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'image', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->fileField($model, 'image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'image'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'date', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'date', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'date'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->dropDownList($model, 'status', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="box-footer">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success pos')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->