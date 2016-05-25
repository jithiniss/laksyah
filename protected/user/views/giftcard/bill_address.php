<div class="container main_container inner_pages ">
        <h1>Checkout</h1>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-address-form',
            'htmlOptions' => array('class' => 'form-group'),
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>
        <div class="row">
                <div class="col-md-8">
                        <div class="check_out related_element">
                                <div class="border_box">
                                        <input type="hidden" value="<?php echo $deafult_shipping->country; ?>" class="country_default" name="country_default" />
                                        <div class="box_title">
                                                Billing Details
                                        </div>
                                        <div class="box_content">
                                                <h3>Biiling Address</h3>

                                                <div class="form_row">
                                                        <label>Select a billing address from your address book or enter a new address.</label>
                                                        <select  name="bill_address" class="select_bill_exist form-control" id="bill_exist">
                                                                <option  value="0">New Address</option>
                                                                <?php
                                                                foreach ($addresss as $address) {
                                                                        ?>
                                                                        <option <?php
                                                                        if ($address->default_billing_address == 1) {
                                                                                echo 'selected';
                                                                        }
                                                                        ?>  value="<?php echo $address->id; ?>"><?php echo $address->first_name; ?> <?php echo $data->last_name; ?> ,   <?php echo $address->address_1; ?>
                                                                                <?php echo $address->address_2; ?> , <?php echo $address->city; ?> ,
                                                                                <?php echo $address->state; ?> , <?php echo $address->country; ?>
                                                                                <?php echo $address->postcode; ?></option>
                                                                        <?php
                                                                        if (isset($_GET['box'])) {
                                                                                echo "Success!";
                                                                        }
                                                                }
                                                                ?>
                                                        </select>

                                                </div>
                                                <div class="bill_form">
                                                        <div class="row" >
                                                                <div class="col-sm-6">
                                                                        <?php echo $form->labelEx($billing, '[bill]first_name', array('class' => 'control-label')); ?>
                                                                        <?php echo $form->textField($billing, '[bill]first_name', array('placeholder' => 'First Name ', 'class' => 'form-control aik')); ?>
                                                                        <?php echo $form->error($billing, '[bill]first_name'); ?>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                        <?php echo $form->labelEx($billing, '[bill]last_name', array('class' => 'control-label')); ?>
                                                                        <?php echo $form->textField($billing, '[bill]last_name', array('placeholder' => 'Last Name ', 'class' => 'form-control aik')); ?>
                                                                        <?php echo $form->error($billing, '[bill]last_name'); ?>
                                                                </div>
                                                        </div>
                                                        <div class="row" >
                                                                <div class="col-sm-6">
                                                                        <?php echo $form->labelEx($billing, '[bill]contact_number', array('class' => 'control-label')); ?>
                                                                        <?php echo $form->textField($billing, '[bill]contact_number', array('placeholder' => 'Contact Number ', 'class' => 'form-control aik')); ?>
                                                                        <?php echo $form->error($billing, '[bill]contact_number'); ?>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                        <?php echo $form->labelEx($billing, '[bill]address_1', array('class' => 'control-label')); ?>
                                                                        <?php echo $form->textField($billing, '[bill]address_1', array('placeholder' => 'Address Line 1 ', 'class' => 'form-control aik')); ?>
                                                                        <?php echo $form->error($billing, '[bill]address_1'); ?>
                                                                </div>
                                                        </div>
                                                        <div class="row" >
                                                                <div class="col-sm-6">
                                                                        <?php echo $form->labelEx($billing, '[bill]address_2', array('class' => 'control-label')); ?>
                                                                        <?php echo $form->textField($billing, '[bill]address_2', array('placeholder' => 'Address Line 2 ', 'class' => 'form-control aik')); ?>
                                                                        <?php echo $form->error($billing, '[bill]address_2'); ?>
                                                                </div>

                                                                <div class="col-sm-6">
                                                                        <?php echo $form->labelEx($billing, '[bill]city', array('class' => 'control-label')); ?>
                                                                        <?php echo $form->textField($billing, '[bill]city', array('placeholder' => 'City ', 'class' => 'form-control aik')); ?>
                                                                        <?php echo $form->error($billing, '[bill]city'); ?>
                                                                </div>
                                                        </div>
                                                        <div class="row" >
                                                                <div class="col-sm-6">
                                                                        <?php echo $form->labelEx($billing, '[bill]postcode', array('class' => 'control-label')); ?>
                                                                        <?php echo $form->textField($billing, '[bill]postcode', array('placeholder' => 'Postal Code ', 'class' => 'form-control aik')); ?>
                                                                        <?php echo $form->error($billing, '[bill]postcode'); ?>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                        <?php echo $form->labelEx($billing, '[bill]country', array('class' => 'control-label')); ?>
                                                                        <?php echo CHtml::activeDropDownList($billing, '[bill]country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select--', 'class' => 'form-control aik')); ?>

                                                                        <?php echo $form->error($billing, '[bill]country'); ?>
                                                                </div>
                                                        </div>
                                                        <div class="row" >
                                                                <div class="col-sm-6">
                                                                        <?php echo $form->labelEx($billing, '[bill]state', array('class' => 'control-label')); ?>
                                                                        <?php echo $form->textField($billing, '[bill]state', array('placeholder' => 'state ', 'class' => 'form-control aik')); ?>

                                                                        <?php echo $form->error($billing, '[bill]state'); ?>
                                                                </div>
                                                                <div class="col-sm-6">

                                                                </div>

                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-md-12 giftcard">
                                                                <br />
                                                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Proceed', array('class' => 'btn btn-success soo', 'name' => 'giftsubmit')); ?>
                                                        </div>
                                                </div>

                                                <?php $this->endWidget(); ?>

                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>
<script>
        var select_val = $('.select_bill_exist').val();

        if (select_val != 0) {
                $('.bill_form').hide();
        } else {
                $('.bill_form').show();
        }
        $(".select_bill_exist").change(function () {
                var select_val = $(this).val();
                if ($('.bill_same').is(":checked"))
                {
                        getcountry(select_val);

                }
                if (select_val != 0) {
                        $('.bill_form').hide();
                } else {
                        $('.bill_form').show();
                }
        });
</script>