

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'order-form',
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
        <?php echo $form->labelEx($model, 'total_amount', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'total_amount', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'total_amount'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'order_date', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'order_date', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'order_date'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'ship_address_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'ship_address_id', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'ship_address_id'); ?>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'bill_address_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'bill_address_id', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'bill_address_id'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'comment', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textArea($model, 'comment', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'comment'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'payment_mode', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'payment_mode', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'payment_mode'); ?>
    </div>


    <!--    <div class="form-group">
    <?php echo $form->labelEx($model, 'admin_comment', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->textArea($model, 'admin_comment', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
            </div>
    <?php echo $form->error($model, 'admin_comment'); ?>
        </div>-->
    <div class="form-group">
        <?php echo $form->labelEx($model, 'transaction_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'transaction_id', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'transaction_id'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'payment_status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'payment_status', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'payment_status'); ?>
    </div>
    <!--    <div class="form-group">
    <?php echo $form->labelEx($model, 'admin_status', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'admin_status', CHtml::listData(OrderStatus::model()->findAll(), 'id', 'title'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
            </div>
    <?php echo $form->error($model, 'admin_status'); ?>
        </div>-->

    <div class="form-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'DOC', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textField($model, 'DOC', array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'DOC'); ?>
    </div>

    <div class="box-footer">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success pos')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->