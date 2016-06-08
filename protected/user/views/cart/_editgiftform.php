<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'temp-user-gifts-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'htmlOptions' => array('enctype' => 'multipart/form-data', 'action' => Yii::app()->baseUrl . '/index.php/Cart/MyCart'),
        'enableAjaxValidation' => false,
    ));
    ?>



    <?php echo $form->errorSummary($gift_user); ?>
    <br/>
    <div class="form-group">
        <?php echo $form->hiddenField($gift_user, 'session_id', array('class' => 'form-control', 'value' => Yii::app()->session['temp_user'])); ?>
        <?php echo $form->error($gift_user, 'user_id'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->hiddenField($gift_user, 'cart_id', array('class' => 'form-control', 'id' => $cart_id)); ?>
        <?php echo $form->error($gift_user, 'order_id'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($gift_user, 'from'); ?>
        <?php echo $form->textField($gift_user, 'from', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        <?php echo $form->error($gift_user, 'from'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($gift_user, 'to'); ?>
        <?php echo $form->textField($gift_user, 'to', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        <?php echo $form->error($gift_user, 'to'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($gift_user, 'message'); ?>
        <?php echo $form->textArea($gift_user, 'message', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        <?php echo $form->error($gift_user, 'message'); ?>
    </div>
    <div class="modal-footer">
        <?php echo CHtml::submitButton($gift_user->isNewRecord ? 'Submit' : 'Save', array('class' => 'btn btn-primary')); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>