

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'districts-form',
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
        <?php echo $form->labelEx($model, 'country_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'country_id', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'country_id'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'state_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'state_id', CHtml::listData(States::model()->findAll(), 'Id', 'state_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'state_id'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'district_name', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'district_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'district_name'); ?>
    </div>

    <div class="box-footer">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->