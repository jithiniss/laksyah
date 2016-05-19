<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'currency-form',
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
        <?php echo $form->labelEx($model, 'country', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"> <?php echo $form->textField($model, 'country', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?></div>
        <?php echo $form->error($model, 'country'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'currency', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'currency', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?></div>
        <?php echo $form->error($model, 'currency'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'currency_code', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'currency_code', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?></div>
        <?php echo $form->error($model, 'currency_code'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'symbol', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'symbol', array('class' => 'form-control')); ?>

        </div>
        <?php echo $form->error($model, 'symbol'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'rate', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'rate', array('class' => 'form-control')); ?></div>
        <?php echo $form->error($model, 'rate'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'image', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"> <?php echo $form->fileField($model, 'image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php
            if ($model->image != '') {
                    echo '<img width="50" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/currency/' . $model->id . '.' . $model->image . '" />';
            }
            ?>
        </div>
        <?php echo $form->error($model, 'image'); ?>
    </div>

    <div class="form-group btns">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->