<?php
/* @var $this ProductEnquiryController */
/* @var $model ProductEnquiry */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'product-enquiry-form',
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
                <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'name'); ?>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'email'); ?>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'phone', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'phone', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'phone'); ?>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'Total Product Amount', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'total_amount', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'total_amount'); ?>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'Balance To Pay', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'balance_to_pay', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'disabled' => true)); ?>
                </div>
                <?php echo $form->error($model, 'balance_to_pay'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'country', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select Country--', 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'country'); ?>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'size', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'size', CHtml::listData(MasterSize::model()->findAll(), 'id', 'size'), array('empty' => '--Select Size--', 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'size'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'requirement', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php
                        $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                            'model' => $model,
                            'attribute' => 'requirement',
                        ));
                        ?>
                </div>
                <?php echo $form->error($model, 'requirement'); ?>
        </div>


        <div class="form-group">
                <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->dropDownList($model, 'status', array('2' => "Measurement Initiate", '3' => "Payment Initiate", '1' => "Enquiry Placed"), array('class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'status'); ?>
        </div>

        <div class="box-footer">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
        </div>
        <?php $this->endWidget(); ?>

</div><!-- form -->