

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-reviews-form',
        'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
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
        <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'user_id', CHtml::listData(UserDetails::model()->findAll(), 'id', 'first_name'), array('empty' => '--Select--', 'class' => 'form-control', 'value' => $model->user->first_name)); ?>

        </div>
        <?php echo $form->error($model, 'user_id'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'guest_user', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'guest_user', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'guest_user'); ?>
    </div>



    <div class="form-group">
        <?php echo $form->labelEx($model, 'user_image', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->fileField($model, 'user_image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php
            if ($model->user_image != '') {
                    echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/review-image/' . $model->id . '.' . $model->user_image . '" />';
            }
            ?>
        </div>
        <?php echo $form->error($model, 'image_extension'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'product_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'product_id', CHtml::listData(Products::model()->findAll(), 'id', 'product_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'product_id'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'review', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textArea($model, 'review', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'review'); ?>
    </div>


    <!--    <div class="form-group">
    <?php echo $form->labelEx($model, 'approvel', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->dropDownList($model, 'approvel', array('1' => 'Yes', '0' => 'No'), array('class' => 'form-control')); ?>
            </div>
    <?php echo $form->error($model, 'approvel'); ?>
        </div>-->

    <div class="box-footer">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success pos')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->