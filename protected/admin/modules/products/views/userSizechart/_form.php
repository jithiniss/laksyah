<?php
/* @var $this UserSizechartController */
/* @var $model UserSizechart */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-sizechart-form',
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
                <?php echo $form->labelEx($model, 'user_id', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'user_id', array('class' => 'form-control', 'value' => $model->user->first_name, 'readonly' => true)); ?>
                </div>
                <?php echo $form->error($model, 'user_id'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'product_name', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'product_name', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'product_name'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'product_code', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'product_code', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'product_code'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'type', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'type', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'type'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'unit', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'unit', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'unit'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'around_neck', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'around_neck', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'around_neck'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'neck_depth', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"> <?php echo $form->textField($model, 'neck_depth', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'neck_depth'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'around_upper_chest', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'around_upper_chest', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'around_upper_chest'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'around_chest', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'around_chest', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'around_chest'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'around_lower_chest', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'around_lower_chest', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'around_lower_chest'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'shoulder_to_breastpoint', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'shoulder_to_breastpoint', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'shoulder_to_breastpoint'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'around_waist', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"> <?php echo $form->textField($model, 'around_waist', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'around_waist'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'shoulder_to_waist', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'shoulder_to_waist', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'shoulder_to_waist'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'around_armhole', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'around_armhole', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'around_armhole'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'sleeve_length', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"> <?php echo $form->textField($model, 'sleeve_length', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'sleeve_length'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'arm_length', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'arm_length', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'arm_length'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'around_upper_arm', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'around_upper_arm', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'around_upper_arm'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'around_elbow', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"> <?php echo $form->textField($model, 'around_elbow', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'around_elbow'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'around_wrist', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'around_wrist', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'around_wrist'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'length_upper_garment', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'length_upper_garment', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'length_upper_garment'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'shoulder_width', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'shoulder_width', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'shoulder_width'); ?></div>

        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'around_lower_waist', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'around_lower_waist', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'around_lower_waist'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'waist_to_ankle', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"> <?php echo $form->textField($model, 'waist_to_ankle', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'waist_to_ankle'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'inseam_to_ankle', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'inseam_to_ankle', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'inseam_to_ankle'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'around_hip', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"> <?php echo $form->textField($model, 'around_hip', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'around_hip'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'around_tigh', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"> <?php echo $form->textField($model, 'around_tigh', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'around_tigh'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'around_knee', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'around_knee', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'around_knee'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'around_calf', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'around_calf', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'around_calf'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'around_ankle', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"> <?php echo $form->textField($model, 'around_ankle', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'around_ankle'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'skirt_length', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"> <?php echo $form->textField($model, 'skirt_length', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'skirt_length'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'gown_full_length', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'gown_full_length', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'gown_full_length'); ?></div>
        </div>




        <div class="form-group btns">
                <label>&nbsp;</label><br/>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->