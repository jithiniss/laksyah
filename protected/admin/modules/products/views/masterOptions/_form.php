<?php
/* @var $this MasterOptionsController */
/* @var $model MasterOptions */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'master-options-form',
        'htmlOptions' => array('class' => 'form-horizontal'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>


    <br/>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'product_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo CHtml::activeDropDownList($model, 'product_id', CHtml::listData(Products::model()->findAll(['condition' => 'status=1']), 'id', 'product_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>

            <?php echo $form->error($model, 'product_id'); ?>
        </div>
    </div>

    <div class="form-group" style="display:none;" id="option_types">
        <?php echo $form->labelEx($model, 'option_type_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php echo CHtml::activeDropDownList($model, 'option_type_id', CHtml::listData(OptionType::model()->findAll(), 'id', 'type'), array('empty' => '--Select--', 'class' => 'form-control')); ?>

            <?php echo $form->error($model, 'option_type_id'); ?>
        </div>
    </div>


    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Next' : 'Save', array('class' => 'btn btn-laksyah pull-right')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script>
        $(document).ready(function () {
            $('#MasterOptions_product_id').on('change', function () {
                var product_id = $(this).val();

                $.ajax({
                    'url': baseurl + 'products/MasterOptions/ProductOptions',
                    'type': "POST",
                    'dataType': 'html',
                    'data': {product_id: product_id},
                    success: function (result) {
                        if (result == 1) {
                            // $("#master-options-form").submit();
                            $('#option_types').hide();
                        } else {
                            $('#option_types').show();
                        }

                    }

                });
            });
            if ($('#MasterOptions_product_id').val() != "") {
                $.ajax({
                    'url': baseurl + 'products/MasterOptions/ProductOptions',
                    'type': "POST",
                    'dataType': 'html',
                    'data': {product_id: $('#MasterOptions_product_id').val()},
                    success: function (result) {
                        if (result == 1) {
                            //  $("#master-options-form").submit();
                            $('#option_types').hide();
                        } else {
                            $('#option_types').show();
                        }

                    }

                });
            }
        });

</script>