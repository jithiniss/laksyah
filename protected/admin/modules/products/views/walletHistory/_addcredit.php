<?php
/* @var $this UserGiftscardHistoryController */
/* @var $model UserGiftscardHistory */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'wallet-history-form-add',
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

                <?php echo $form->labelEx($model, '[addmoney]user_id', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-sm-10">

                        <?php
                        $models = UserDetails::model()->findAll();
                        $data = array();

                        foreach ($models as $model1)
                                $data[$model1->id] = $model1->first_name . ' (USER ID : #' . $model1->id . ' )';

                        echo $form->dropDownList($model, '[addmoney]user_id', $data, array('empty' => '--Select User--', 'class' => 'form-control', 'required' => 'required', 'options' => array('id' => array('selected' => 'selected'))));
                        ?>
                        <?php echo $form->error($model, '[addmoney]user_id'); ?></div>
        </div>





        <div class="form-group">
                <?php echo $form->labelEx($model, 'Enter Amount to add', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10"><?php echo $form->textField($model, '[addmoney]amount', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'required' => 'required')); ?>
                        <?php echo $form->error($model, 'amount'); ?></div>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'Comments', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textArea($model, '[addmoney]field1', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'field1'); ?></div>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'field2', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php
                        echo $form->dropDownList($model, '[addmoney]field2', array('1' => 'Enabled', '0' => 'Disabled'), array('class' => 'form-control', 'options' => array(1 => array('selected' => 'selected'))));
                        ?>
                        <?php echo $form->error($model, 'field2'); ?></div>
        </div>


        <div class="box-footer">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
        </div>


        <?php $this->endWidget(); ?>

</div><!-- form -->