<?php
/* @var $this ProductEnquiryController */
/* @var $model ProductEnquiry */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'product-enquiry-form',
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
                <?php echo $form->labelEx($model, 'product_id', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'product_id', CHtml::listData(Products::model()->findAll(), 'id', 'product_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'product_id'); ?>
        </div>
        <div class="form-group">

                <?php echo $form->labelEx($model, 'name', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'name'); ?>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'email', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'email'); ?>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'phone', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'phone', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'phone'); ?>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'Total Product Amount', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'total_amount', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'total_amount'); ?>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'Balance To Pay', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textField($model, 'balance_to_pay', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'disabled' => true)); ?>
                </div>
                <?php echo $form->error($model, 'balance_to_pay'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'country', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select Country--', 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'country'); ?>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'size', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo CHtml::activeDropDownList($model, 'size', CHtml::listData(MasterSize::model()->findAll(), 'id', 'size'), array('empty' => '--Select Size--', 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'size'); ?>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'requirement', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10">

                        <?php echo $form->textarea($model, 'requirement', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>


                </div>
                <?php echo $form->error($model, 'requirement'); ?>
        </div>


        <div class="form-group">
                <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label ')); ?>
                <div class="col-sm-10"><?php echo $form->dropDownList($model, 'status', array('2' => "Measurement Initiate", '3' => "Payment Initiate", '1' => "Enquiry Placed"), array('class' => 'form-control enq_status')); ?>
                </div>
                <?php echo $form->error($model, 'status'); ?>
        </div>
        <div class="form-group">
                <div class="col-sm-2"></div>
                <?php
                $user = $this->encrypt_decrypt('encrypt', 'user_id=' . $model->user_id);
                $user_details = UserDetails::model()->findByPk($model->user_id);
                ?>
                <div class="col-sm-10"><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/products/UserSizechart/admin?user=<?php echo $model->user_id; ?>" class="btn btn-laksyah">View Measurement Details</a></div>
        </div>
        <div class="form-group amount" style="display: none">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                        <?php $payment_details = CelibStyleHistory::model()->findAllByAttributes(array('enq_id' => $model->id, 'status' => 3)); ?>
                        <table border = "1">
                                <thead>
                                        <tr>
                                                <td><strong>Sl.No</strong></td>
                                                <td><strong>Pay amount</strong></td>
                                                <td><strong>Date</strong></td>
                                                <td><strong>Transaction Id</strong></td>
                                                <td><strong>Payment Status</strong></td>
                                        </tr>
                                </thead>
                                <tbody>
                                        <?php
                                        if (!empty($payment_details)) {
                                                $i = 1;
                                                foreach ($payment_details as $payment_detail) {
                                                        ?>
                                                        <tr>
                                                                <td><?= $i; ?></td>
                                                                <td><?= $payment_detail->pay_amount; ?></td>
                                                                <td><?= $payment_detail->date; ?></td>
                                                                <td><?= $payment_detail->payment_id; ?></td>
                                                                <td><?= $payment_detail->payment_status == 1 ? 'paid' : 'Not Paid'; ?></td>
                                                        </tr>
                                                        <?php
                                                        $i++;
                                                }
                                        }
                                        ?>
                                </tbody>
                        </table>
                        <br />
                        <div class = "clearfix"></div>
                </div>
                <label class = "col-sm-2 control-label" for = "ProductEnquiry_Total_Product_Amount"> Amount to pay</label>
                <div class = "col-sm-10"><input size = "60" maxlength = "225" class = "form-control" name = "amount" id = "ProductEnquiry_total_amount" type = "text" >
                </div>
        </div>
        <div class="form-group">
                <?php echo $form->labelEx($model, 'add_to_order', array('class' => 'col-sm-2 control-label ')); ?>
                <div class="col-sm-10"><?php echo $form->dropDownList($model, 'add_to_order', array('2' => "No", '1' => "Yes", '3' => "Order Placed"), array('class' => 'form-control enq_status')); ?>
                </div>
                <?php echo $form->error($model, 'add_to_order'); ?>
        </div>
        <div class = "box-footer">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos'));
                ?>
        </div>
        <?php $this->endWidget(); ?>

</div><!-- form -->

<script>
        $(document).ready(function() {
                var val = $('.enq_status').val();

                if (val == 3) {

                        $(".amount").show();
                } else {
                        $(".amount").hide();
                }
                $('.enq_status').on('change', function() {

                        var value = $('.enq_status').val();

                        if (value == 3) {

                                $(".amount").show();
                        } else {
                                $(".amount").hide();
                        }
                });

        });

</script>
