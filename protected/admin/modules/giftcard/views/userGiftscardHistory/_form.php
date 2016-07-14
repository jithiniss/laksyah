<?php
/* @var $this UserGiftscardHistoryController */
/* @var $model UserGiftscardHistory */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-giftscard-history-form',
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
                <?php echo $form->labelEx($model, 'giftcard_id', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'giftcard_id', CHtml::listData(GiftCard::model()->findAll(), 'id', 'name'), array('empty' => '--Select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'giftcard_id'); ?></div>
        </div>


        <?php
        $user_det = UserDetails::model()->findByPk($user_id);
        if (!empty($user_det)) {
                $model->user_id = $user_det->first_name . '( USER ID :' . $user_id . ')';
        }
        ?>
        <div class="form-group">

                <?php if ($user_id == '') { ?>


                <?php } else { ?>
                        <?php echo $form->labelEx($model, 'user_id', array('class' => 'col-md-2 control-label'));
                        ?>
                        <div class="col-md-10"><?php echo $form->textField($model, 'user_id', array('class' => 'form-control', 'readonly' => 'readonly')); ?>
                                <?php echo $form->error($model, 'user_id'); ?></div>
                <?php } ?>
        </div>


        <div class="form-group">
                <?php echo $form->labelEx($model, 'Type gift card code here', array('class' => 'col-md-2 control-label')); ?>
                <div class="col-md-10"><?php echo $form->textField($model, 'unique_code', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'unique_code'); ?></div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php
                        echo $form->dropDownList($model, 'status', array('1' => 'Enabled', '0' => 'Disabled'), array('class' => 'form-control', 'options' => array(1 => array('selected' => 'selected'))));
                        ?>
                        <?php echo $form->error($model, 'status'); ?></div>
        </div>


        <div class="box-footer">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
        </div>


        <?php $this->endWidget(); ?>

</div><!-- form -->