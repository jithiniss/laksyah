<?php
/* @var $this NewsletterContentController */
/* @var $model NewsletterContent */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'newsletter-content-form',
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
        <div class="form-group">
                <?php echo $form->labelEx($model, 'heading', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'heading', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'heading'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'subheading', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'subheading', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'subheading'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'content', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php
                        $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                            'model' => $model,
                            'attribute' => 'content',
                        ));
                        ?></div>
                <?php echo $form->error($model, 'content'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'image', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->fileField($model, 'image'); ?>
                        <?php if ($model->image != "") {
                                ?>

                                <div style="float:left;margin:5px;position:relative;">
                                        <img width="125"  height="75"style="border: 2px solid #d2d2d2;" src="<?= Yii::app()->request->baseUrl; ?> /uploads/newsletter/<?= $model->id; ?>.<?= $model->image; ?>" /></div>
                        <?php } ?>
                                <?php echo $form->error($model, 'image'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'link', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'link', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'link'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php
                        echo $form->dropDownList($model, 'status', array('1' => 'Enabled', '0' => 'Disabled'), array('class' => 'form-control'));
                        ?></div>
                <?php echo $form->error($model, 'status'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'type', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'type', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'type'); ?></div>
        </div>

        <div class="form-group btns">
                <label>&nbsp;</label><br/>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->