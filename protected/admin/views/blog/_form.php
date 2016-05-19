<?php
/* @var $this BlogController */
/* @var $model Blog */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'blog-form',
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
        <?php echo $form->labelEx($model, 'heading', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'heading', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?></div>
        <?php echo $form->error($model, 'heading'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'small_image', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->fileField($model, 'small_image', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
            <?php if ($model->small_image != "") {
                    ?>

                    <div style="float:left;margin:5px;position:relative;">
                        <a style="position:absolute;top:43%;color:black;color:#DC1D06;margin-left:132px;" href="<?= Yii::app()->request->baseUrl; ?>/admin.php/Blog/imageDelete?type=small&id=<?= $model->id; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                        <img width="125"  height="75"style="border: 2px solid #d2d2d2;" src="<?= Yii::app()->request->baseUrl; ?> /uploads/blog/<?= $model->id; ?>/small.<?= $model->small_image; ?>" /></div>
            <?php } ?>
        </div>
        <?php echo $form->error($model, 'small_image'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'big_image', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->fileField($model, 'big_image', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
            <?php if ($model->big_image != "") {
                    ?>

                    <div style="float:left;margin:5px;position:relative;">
                        <a style="position:absolute;top:43%;color:#DC1D06;margin-left:132px;" href="<?= Yii::app()->request->baseUrl; ?>/admin.php/Blog/imageDelete?type=big&id=<?= $model->id; ?>"><i class="glyphicon glyphicon-trash"></i></a>
                        <img width="125"  height="75"style="border: 2px solid #d2d2d2;" src="<?= Yii::app()->request->baseUrl; ?> /uploads/blog/<?= $model->id; ?>/big.<?= $model->small_image; ?>" /></div>
            <?php } ?>
        </div>
        <?php echo $form->error($model, 'big_image'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'small_content', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php
            $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                'model' => $model,
                'attribute' => 'small_content',
            ));
            ?></div>
        <?php echo $form->error($model, 'small_content'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'big_content', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php
            $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                'model' => $model,
                'attribute' => 'big_content',
            ));
            ?></div>
        <?php echo $form->error($model, 'big_content'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'meta_keywords', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textArea($model, 'meta_keywords', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?></div>
        <?php echo $form->error($model, 'meta_keywords'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'meta_title', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"> <?php echo $form->textField($model, 'meta_title', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?></div>
        <?php echo $form->error($model, 'meta_title'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'meta_description', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php
            $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                'model' => $model,
                'attribute' => 'meta_description',
            ));
            ?></div>
        <?php echo $form->error($model, 'meta_description'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php
            echo $form->dropDownList($model, 'status', array('1' => 'Enabled', '0' => 'Disabled'), array('class' => 'form-control'));
            ?></div>
        <?php echo $form->error($model, 'status'); ?>
    </div>




    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->