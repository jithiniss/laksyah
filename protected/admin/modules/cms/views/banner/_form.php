<?php
/* @var $this BannerController */
/* @var $model Banner */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'banner-form',
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
                <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'name'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'image', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"> <?php echo $form->fileField($model, 'image', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php
                        if ($model->image != '') {
                                echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/banner/' . $model->id . '.' . $model->image . '" />';
                        }
                        ?>
                        <?php echo $form->error($model, 'image'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'heading', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"> <?php echo $form->textField($model, 'heading', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'heading'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'description', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"> <?php echo $form->textField($model, 'description', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'description'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'link', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"> <?php echo $form->textField($model, 'link', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'link'); ?></div>
        </div>


</div>
<div class="box-footer">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
</div>

<?php $this->endWidget(); ?>

<!-- form -->