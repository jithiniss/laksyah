

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-address-form',
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
                <?php echo $form->labelEx($model, 'first_name', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'first_name'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'last_name', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'last_name'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'company', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'company', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'company'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'address_1', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textArea($model, 'address_1', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control', 'rows' => '4', 'cols' => '50')); ?>
                </div>
                <?php echo $form->error($model, 'address_1'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'address_2', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textArea($model, 'address_2', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control', 'rows' => '4', 'cols' => '50')); ?>
                </div>
                <?php echo $form->error($model, 'address_2'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'city', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'city', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'city'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'postcode', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'postcode', array('class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'postcode'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'country', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'country'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'state', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'state', CHtml::listData(States::model()->findAll(), 'Id', 'state_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'state'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'district', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'district', CHtml::listData(Districts::model()->findAll(), 'Id', 'district_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'district'); ?>
        </div>



        <div class="box-footer">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->