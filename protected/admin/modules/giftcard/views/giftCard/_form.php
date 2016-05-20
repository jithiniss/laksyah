<?php
/* @var $this GiftCardController */
/* @var $model GiftCard */
/* @var $form CActiveForm */
?>


<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'gift-card-form',
            'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>


        <div class="form-group">
                <?php echo $form->labelEx($model, 'name', array('class' => 'col-md-2')); ?>
                <div class="col-md-10"><?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'name'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'amount', array('class' => 'col-md-2')); ?>
                <div class="col-md-10"><?php echo $form->textField($model, 'amount', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'amount'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'image', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"> <?php echo $form->fileField($model, 'image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php
                        if ($model->image != '') {
                                echo '<img width="50" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/gift/' . $model->id . '.' . $model->image . '" />';
                        }
                        ?>
                </div>
                <?php echo $form->error($model, 'image'); ?>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php
                        echo $form->dropDownList($model, 'status', array('1' => 'Enabled', '0' => 'Disabled'), array('class' => 'form-control'));
                        ?>
                        <?php echo $form->error($model, 'status'); ?></div>
        </div>

</div>
<div class='btn  btn-laksyah'>

        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
</div>

<?php $this->endWidget(); ?>

<!-- form -->