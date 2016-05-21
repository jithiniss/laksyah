
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'order-history-form',
        'htmlOptions' => array('class' => 'form-horizontal'),
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
    <!--    <div class="form-group">
    <?php echo $form->labelEx($model, 'order_id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->textField($model, 'order_id', array('class' => 'form-control')); ?></div>
    <?php echo $form->error($model, 'order_id'); ?>
        </div>-->

    <div class="form-group">
        <?php echo $form->labelEx($model, 'order_status_comment', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->textArea($model, 'order_status_comment', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'order_status_comment'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'order_status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"> <?php echo CHtml::activeDropDownList($model, 'order_status', CHtml::listData(OrderStatus::model()->findAll(), 'id', 'title'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'order_status'); ?>
    </div>
    <div id="ship_details">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'shipping_type', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"> <?php echo CHtml::activeDropDownList($model, 'shipping_type', CHtml::listData(MasterShippingTypes::model()->findAll(), 'id', 'shipping_type'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'shipping_type'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'tracking_id', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->textField($model, 'tracking_id', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'tracking_id'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'date', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10">
            <?php
            $from = date('Y') - 80;
            $to = date('Y') + 20;


            Yii::import('application.admin.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker', array(
                'model' => $model, //Model object
                'attribute' => 'date', //attribute name
                'mode' => 'datetime', //use "time","date" or "datetime" (default)
                'language' => 'en-GB',
                'options' => array(
                    'dateFormat' => 'dd-mm-yy',
                    'changeYear' => true, // can change year
                    'changeMonth' => true, // can change month
                    'yearRange' => $from . ':' . $to, // range of year
                    'showButtonPanel' => true, // show button panel
                    'showAnim' => 'fold',
                    'dateFormat' => 'yy-mm-dd',
                    'onSelect' => 'js:function(i,j){

                       function JSClock() {
                          var time = new Date();
                          var hour = time.getHours();
                          var minute = time.getMinutes();
                          var second = time.getSeconds();
                          var temp="";
                          temp +=(hour<10)? "0"+hour : hour;
                          temp += (minute < 10) ? ":0"+minute : ":"+minute ;
                          temp += (second < 10) ? ":0"+second : ":"+second ;
                          return temp;
                        }

                        $v=$(this).val();
                        $(this).val($v+" "+JSClock());

                 }'
                ),
                'htmlOptions' => array(
                    'class' => 'form-control',
                    'value' => date("Y-m-d H:i:s"),
                    'placeHolder' => 'date',
                ),
            ));
            ?>
        </div>
        <?php echo $form->error($model, 'date'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
        <div class="col-sm-10"><?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
        </div>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <!--    <div class="form-group">
    <?php echo $form->labelEx($model, 'cb'); ?>
    <?php echo $form->textField($model, 'cb', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'cb'); ?>
        </div>

        <div class="form-group">
    <?php echo $form->labelEx($model, 'ub'); ?>
    <?php echo $form->textField($model, 'ub', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'ub'); ?>
        </div>-->

    <div class="box-footer">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success pos')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<script>
        $(document).ready(function () {
            $("#ship_details").hide();
            $('#OrderHistory_order_status').change(function () {
                var element = $("#OrderHistory_order_status option:selected");
                var value = element.val();
                if (value == 3) {
                    $("#ship_details").show();
                } else {
                    $("#ship_details").hide();
                }

            });
        });

</script>
