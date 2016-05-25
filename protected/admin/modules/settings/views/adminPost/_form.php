<?php
/* @var $this AdminPostController */
/* @var $model AdminPost */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'admin-post-form',
            'htmlOptions' => array('class' => "form-horizontal"),
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>



        <div class="form-group">
                <?php echo $form->labelEx($model, 'post_name', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'post_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'post_name'); ?></div>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'admin', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->dropDownList($model, 'admin', array('1' => 'Yes', '0' => 'No'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'admin'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'products', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->dropDownList($model, 'products', array('1' => 'Yes', '0' => 'No'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'products'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'orders', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->dropDownList($model, 'orders', array('1' => 'Yes', '0' => 'No'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'orders'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'coupons', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->dropDownList($model, 'coupons', array('1' => 'Yes', '0' => 'No'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'coupons'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'cms', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->dropDownList($model, 'cms', array('1' => 'Yes', '0' => 'No'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'cms'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'masters', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->dropDownList($model, 'masters', array('1' => 'Yes', '0' => 'No'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'masters'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'user_details', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->dropDownList($model, 'user_details', array('1' => 'Yes', '0' => 'No'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'user_details'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'reports', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->dropDownList($model, 'reports', array('1' => 'Yes', '0' => 'No'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'reports'); ?></div>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->dropDownList($model, 'status', array('1' => 'Yes', '0' => 'No'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'status'); ?></div>
        </div>

        <div class="form-group btns">
                <label>&nbsp;</label><br/>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->