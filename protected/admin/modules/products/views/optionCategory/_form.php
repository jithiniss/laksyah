<?php
/* @var $this OptionCategoryController */
/* @var $model OptionCategory */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'option-category-form',
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
        <?php echo $form->labelEx($model, 'option_type_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">

            <?php echo CHtml::activeDropDownList($model, 'option_type_id', CHtml::listData(OptionType::model()->findAll(['condition' => 'field1=1']), 'id', 'type'), array('empty' => '--Select--', 'class' => 'form-control', $model->isNewRecord ? "" : 'disabled' => 'disabled')); ?>
            <?php echo $form->error($model, 'option_type_id'); ?></div>
    </div>

    <div id="option_color" style="display: none;">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'color_name', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">  <?php echo $form->textField($model, 'color_name', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'color_name'); ?></div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'color_code', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">  <?php echo $form->textField($model, 'color_code', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                <?php echo $form->error($model, 'color_code'); ?></div>
        </div>
    </div>
    <div class="form-group" style="display: none;" id="option_size">
        <?php echo $form->labelEx($model, 'size', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">  <?php echo $form->textField($model, 'size', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'size'); ?></div>
    </div>



    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pull-right')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div>

<script>
        $(document).ready(function () {
            $('#OptionCategory_option_type_id').on('change', function () {
                var option_type = $('#OptionCategory_option_type_id').val();

                if (option_type == 1) {
                    $('#option_color').show();
                    $('#option_size').hide();
                } else if (option_type == '2') {
                    $('#option_size').show();
                    $('#option_color').hide();

                } else {
                    $('#option_size').hide();
                    $('#option_color').hide();
                }
            });

            var option_type = $('#OptionCategory_option_type_id').val();
            if (option_type != "") {
                if (option_type == 1) {
                    $('#option_color').show();
                    $('#option_size').hide();
                } else if (option_type == '2') {
                    $('#option_size').show();
                    $('#option_color').hide();

                } else {
                    $('#option_size').hide();
                    $('#option_color').hide();
                }
            }
        });
</script>