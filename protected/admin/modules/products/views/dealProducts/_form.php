<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'deal-products-form',
        'htmlOptions' => array('class' => 'form-horizontal'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>


    <div class="hasapge">

        <?php echo $form->errorSummary($model); ?>
        <br/>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'date', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php
                $from = date('Y');
                $to = date('Y') + 20;
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'attribute' => 'date',
                    'value' => 'deal_day_date',
                    'options' => array(
                        'dateFormat' => 'dd-mm-yy',
                        'changeYear' => true, // can change year
                        'changeMonth' => true, // can change month
                        'yearRange' => $from . ':' . $to, // range of year
                        'showButtonPanel' => true, // show button panel
                    ),
                    'htmlOptions' => array(
                        'size' => '10', // textField size
                        'maxlength' => '10', // textField maxlength
                        'class' => 'form-control',
                        'placeholder' => 'deal_day_date',
                    ),
                ));
                ?></div>
            <?php echo $form->error($model, 'date'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'deal_products', array('class' => 'col-sm-2 control-label')); ?>
            <?php
            if (!is_array($model->deal_products)) {
                    $myArray = explode(',', $model->deal_products);
            } else {
                    $myArray = $model->deal_products;
            }


            $deal_products = array();

            foreach ($myArray as $value) {
                    $deal_products[$value] = array('selected' => 'selected');
            }
            ?>

            <div class="col-sm-10">  <?php echo CHtml::activeDropDownList($model, 'deal_products', CHtml::listData(Products::model()->findAllByAttributes(array(), array('condition' => 'discount_rate != 0 AND status = 1')), 'id', 'product_name'), array('empty' => '-Select-', 'class' => 'form-control', 'multiple' => true, 'options' => $deal_products));
            ?>
            </div>
            <?php echo $form->error($model, 'deal_products'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'status'); ?>
        </div>


        <div class="box-footer">
            <label>&nbsp;</label><br/>
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div><!-- form -->
</div>