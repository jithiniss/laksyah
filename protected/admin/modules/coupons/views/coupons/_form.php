

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'coupons-form',
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
        <?php echo $form->labelEx($model, 'product_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php
            if (!is_array($model->product_id)) {
                    $myArray = explode(',', $model->product_id);
            } else {
                    $myArray = $model->product_id;
            }

            $product = array();
            foreach ($myArray as $value) {
                    $product[$value] = array('selected' => 'selected');
            }
            ?>
            <?php echo CHtml::activeDropDownList($model, 'product_id', CHtml::listData(Products::model()->findAll(['order' => 'id']), 'id', 'product_name'), array('empty' => '-Select-', 'class' => 'form-control', 'options' => $product, 'multiple' => 'true'));
            ?>

        </div>
        <?php echo $form->error($model, 'product_id'); ?>
    </div>



    <div class="form-group">
        <?php echo $form->labelEx($model, 'user_id', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php
            if (!is_array($model->user_id)) {
                    $user = explode(',', $model->user_id);
            } else {
                    $user = $model->user_id;
            }
            $user1 = array();
            foreach ($user as $data) {
                    $user1[$data] = array('selected' => 'selected');
            }
            ?>
            <?php
            echo $form->dropDownList($model, 'user_id', CHtml::listData(UserDetails::model()->findAllByAttributes(array('status' => 1)), 'id', 'first_name'), array('empty' => '--select--', 'multiple' => true, 'size' => '8', 'class' => 'form-control', 'options' => $user1));
            ?>
            <?php echo $form->error($model, 'user_id'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'cash_limit', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->textField($model, 'cash_limit', array('class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'cash_limit'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'code', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->textField($model, 'code', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'code'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'starting_date', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php
                $from = date('Y') - 80;
                $to = date('Y') + 10;
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'starting_date',
                    'value' => 'starting_date',
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',
                        'changeYear' => true, // can change year
                        'changeMonth' => true, // can change month
                        'yearRange' => $from . ':' . $to, // range of year
                        'showButtonPanel' => true, // show button panel
                    ),
                    'htmlOptions' => array(
                        'size' => '10', // textField size
                        'maxlength' => '10', // textField maxlength
                        'class' => 'form-control',
                        'placeholder' => 'starting_date',
                    ),
                ));
                ?>
            </div>
            <?php echo $form->error($model, 'starting_date'); ?>
        </div>


        <div class="form-group">
            <?php echo $form->labelEx($model, 'expiry_date', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php
                $from = date('Y') - 80;
                $to = date('Y') + 10;
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'expiry_date',
                    'value' => 'expiry_date',
                    'options' => array(
                        'dateFormat' => 'yy-mm-dd',
                        'changeYear' => true, // can change year
                        'changeMonth' => true, // can change month
                        'yearRange' => $from . ':' . $to, // range of year
                        'showButtonPanel' => true, // show button panel
                    ),
                    'htmlOptions' => array(
                        'size' => '10', // textField size
                        'maxlength' => '10', // textField maxlength
                        'class' => 'form-control',
                        'placeholder' => 'expiry_date',
                    ),
                ));
                ?>
            </div>
            <?php echo $form->error($model, 'expiry_date'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'discount', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->textField($model, 'discount', array('class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'discount'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'discount_type', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->dropDownList($model, 'discount_type', array('1' => 'Fixed', '0' => 'Percentage'), array('class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'discount_type'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'unique', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->dropDownList($model, 'unique', array('1' => 'Yes', '0' => 'No'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'unique'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->dropDownList($model, 'status', array('1' => 'Enabled', '0' => 'Disabled'), array('class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'status'); ?>
        </div>

        <div class="box-footer">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->