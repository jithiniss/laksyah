<?php
/* @var $this ShippingChargesController */
/* @var $model ShippingCharges */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'shipping-charges-form',
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

        <!--        <div class="form-group">
        <?php echo $form->labelEx($model, 'country', array('class' => 'col-sm-2 control-label')); ?>

                        <div class="col-sm-10">   <?php echo $form->dropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('class' => 'form-control')); ?>
                        </div>
        <?php echo $form->error($model, 'country'); ?>
                </div>-->
        <div class="form-group">
                <?php echo $form->labelEx($model, 'zone', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->dropDownList($model, 'zone', array('1' => "1", '2' => "2", '3' => "3", '4' => "4", '5' => "5", '6' => "6", '7' => "7", '8' => "8", '9' => "9"), array('class' => 'form-control')); ?>
                </div>

                <?php echo $form->error($model, 'zone'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'weight', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'weight', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'weight'); ?>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'shipping_rate', array('class' => 'col-sm-2 control-label')); ?>

                <div class="col-sm-10">   <?php echo $form->textField($model, 'shipping_rate', array('class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'shipping_rate'); ?>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'status'); ?>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'sort_order', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'sort_order', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'sort_order'); ?>
        </div>



        <div class="box-footer">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->