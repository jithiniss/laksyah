<div class="container main_container inner_pages ">
        <div class="breadcrumbs"> <?php echo CHtml::link('HOME', array('site/index')); ?> <span>/</span> <?php echo CHtml::link('My Account', array('Myaccount/index')); ?> <span>/</span> Measurement </div>
        <div class="row">

                <?php echo $this->renderPartial('_menu'); ?>


                <!-- / Sidebar-->
                <div class="col-sm-9 user_content">
                        <?php echo CHtml::link('View Measurements', array('myaccount/SizeChartList'), array('class' => 'account_link pull-right')); ?>
                        <h1>Add New Measurement</h1>
                        <?php if (Yii::app()->user->hasFlash('meas_success')): ?>
                                <div class="alert alert-success mesage">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <strong>Success!</strong><?php echo Yii::app()->user->getFlash('meas_success'); ?>
                                </div>
                        <?php endif; ?>


                        <div class="form">

                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'user-sizechart-form',
                                    'action' => Yii::app()->baseUrl . '/index.php/myaccount/SizeChartType',
                                    //    'action' => Yii::app()->baseUrl . '/index.php/cart/Mycart/',
                                    // Please note: When you enable ajax validation, make sure the corresponding
                                    // controller action is handling ajax validation correctly.
                                    // There is a call to performAjaxValidation() commented in generated controller code.
                                    // See class documentation of CActiveForm for details on this.
                                    'enableAjaxValidation' => false,
                                ));
                                ?>


                                <?php echo $form->errorSummary($model); ?>
                                <div class="registration_form two_col_form">
                                        <?php if (isset(Yii::app()->session['enquiry_id']) && isset(Yii::app()->session['history_id'])) { ?>
                                                <div class="row">

                                                        <div class="col-md-2 col-sm-3"> <label><strong>Product Name*</strong></label></div>
                                                        <div class="col-sm-7 col-md-6"><?php echo $form->textField($model, 'product_name', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control ', 'value' => $product_details->product_name, 'readonly' => true)); ?>
                                                                <?php echo $form->error($model, 'product_name'); ?></div>

                                                </div>

                                                <div class="row">
                                                        <div class="col-md-2 col-sm-3">
                                                                <label><strong>Product Code*</strong></label>
                                                        </div>
                                                        <div class="col-sm-7 col-md-6">
                                                                <?php echo $form->textField($model, 'product_code', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control', 'value' => $product_details->product_code, 'readonly' => true)); ?>
                                                                <?php echo $form->error($model, 'product_code'); ?></div>
                                                </div>
                                        <?php } else { ?>

                                                <div class="row">

                                                        <div class="col-md-2 col-sm-3"> <label><strong>Product Name*</strong></label></div>
                                                        <div class="col-sm-7 col-md-6"><?php echo $form->textField($model, 'product_name', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control ', 'value' => $product_details->product_name)); ?>
                                                                <?php echo $form->error($model, 'product_name'); ?></div>

                                                </div>

                                                <div class="row">
                                                        <div class="col-md-2 col-sm-3">
                                                                <label><strong>Product Code*</strong></label>
                                                        </div>
                                                        <div class="col-sm-7 col-md-6">
                                                                <?php echo $form->textField($model, 'product_code', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control', 'value' => $product_details->product_code)); ?>
                                                                <?php echo $form->error($model, 'product_code'); ?></div>
                                                </div>
                                        <?php } ?>
                                        <label><strong>Do you want our Standard fittings or Custom fittings?</strong></label>

                                        <div class="price_group radio_buttons" id="fitting">
                                                <?php // $model->type = 1; ?>
                                                <label class="radio_group active" id="UserSizechart_type_0" >
                                                        <?php echo $form->radioButton($model, 'type', array('value' => 1, 'uncheckValue' => null, 'checked' => true, 'hidden' => 'true', 'class' => 'chekbx stand')); ?>
                                                </label>
                                                <span class="radio_label pull-left">Standard Fittings </span>
                                                <label class="radio_group" id="UserSizechart_type_1" >
                                                        <?php echo $form->radioButton($model, 'type', array('value' => 2, 'uncheckValue' => null, 'hidden' => 'true', 'class' => 'chekbx cstum')); ?>
                                                </label>
                                                <span class="radio_label pull-left">Custom Fittings</span>
                                                <div class="clearfix"></div>
                                        </div>

                                        <div id="std" class="standard_measurement">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered measurement_table">
                                                        <thead>
                                                                <tr class="price_group">
                                                                        <?php $model->standerd = 2; ?>
                                                                        <th></th>
                                                                        <th><label class="radio_group">
                                                                                        <?php echo $form->radioButtonList($model, 'standerd', array('1' => ''), array('uncheckValue' => null, 'hidden' => 'true')); ?>
                                                                                </label> <span class="radio_label pull-left">Small</span></th>
                                                                        <th><label class="radio_group active"><?php echo $form->radioButtonList($model, 'standerd', array('2' => ''), array('uncheckValue' => null, 'hidden' => 'true')); ?></label><span class="radio_label pull-left">Medium</span></th>
                                                                        <th><label class="radio_group"><?php echo $form->radioButtonList($model, 'standerd', array('3' => ''), array('uncheckValue' => null, 'hidden' => 'true')); ?></label><span class="radio_label pull-left">Large</span></th>
                                                                </tr>
                                                        </thead>

                                                        <tbody>
                                                                <tr>
                                                                        <td><strong>Chest</strong></td>
                                                                        <th>34</th>
                                                                        <th>36</th>
                                                                        <th>38</th>
                                                                </tr>
                                                                <tr>
                                                                        <td><strong>Waist</strong></td>
                                                                        <th>28</th>
                                                                        <th>30</th>
                                                                        <th>34</th>
                                                                </tr>

                                                                <tr>
                                                                        <td><strong>Hip</strong></td>
                                                                        <th>38</th>
                                                                        <th>40</th>
                                                                        <th>42</th>
                                                                </tr>
                                                                <tr>
                                                                        <td><strong>Shoulder Back</strong></td>
                                                                        <th>15</th>
                                                                        <th>15</th>
                                                                        <th>15.5</th>
                                                                </tr>
                                                                <tr>
                                                                        <td><strong>Neck</strong></td>
                                                                        <th>7</th>
                                                                        <th>7.5</th>
                                                                        <th>8</th>
                                                                </tr>

                                                                <tr>
                                                                        <td><strong>Skirt length</strong></td>
                                                                        <th>43</th>
                                                                        <th>43</th>
                                                                        <th>43</th>
                                                                </tr>


                                                        </tbody>
                                                </table>
                                        </div>
                                        <div id="custm" class="custom_measurement">
                                                <ul>
                                                        <li>Please see to it that some body else takes the measurement while you are standing upright.</li>
                                                        <li>Please ensure the measure tape is held by the other person</li>
                                                        <li>Do give us your exact body measurements and allow us to keep the margins accordingly. </li>
                                                </ul>
                                                <?php
                                                $measurement = MeasurementPdfs::model()->findByPk(1);
                                                $file = "../uploads/measurement_pdf/" . $measurement->id . "." . $measurement->file;
                                                ?>
                                                <p>  <?php
                                                        echo CHtml::link('Download Measurement Form', array($file), array('download' => true, 'class' => 'text_link'));
                                                        ?></p>
                                                <div>
                                                        <label> </label>

                                                        <div class = "price_group radio_buttons">
                                                                <?php $model->unit = 2;
                                                                ?>
                                                                <p class="pull-left padd-right-25">Measurement Unit :</p>
                                                                <label class="radio_group active inches">
                                                                        <?php echo $form->radioButton($model, 'unit', array('value' => 1, 'uncheckValue' => null, 'hidden' => 'true', 'class' => 'radio_inch')); ?>
                                                                </label>
                                                                <span class="radio_label pull-left"><strong>Inches</strong></span>
                                                                <label class="radio_group cente">
                                                                        <?php echo $form->radioButton($model, 'unit', array('value' => 2, 'uncheckValue' => null, 'hidden' => 'true', 'class' => 'radio_inch')); ?>
                                                                </label>
                                                                <span class="radio_label pull-left"> <strong>Centimeters</strong></span>
                                                                <?php echo $form->error($model, 'unit'); ?>
                                                                <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                </div>

                                                <div class="row">
                                                        <div class="col-xs-12 col-sm-6">
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered measurement_table custom">
                                                                        <tbody>
                                                                                <tr>
                                                                                        <th class="col_slno"></th>
                                                                                        <th class="col_measure">Measurement</th>
                                                                                        <th class="col_value">Value</th>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td class="col_slno">1</td>
                                                                                        <td class="col_measure">Around Neck:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'around_neck', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'around_neck'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">2</td>
                                                                                        <td class="col_measure">Neck Depth Front/ Back:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'neck_depth', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'neck_depth'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">3</td>
                                                                                        <td class="col_measure">Around Upper Chest:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_upper_chest', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'around_upper_chest'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">4</td>
                                                                                        <td class="col_measure">Around Chest:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_chest', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'around_chest'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">5</td>
                                                                                        <td class="col_measure">Around Lower Bust:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_lower_chest', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'around_lower_chest'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">6</td>
                                                                                        <td class="col_measure">Shoulder to Bustpoint:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'shoulder_to_breastpoint', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'shoulder_to_breastpoint'); ?></td>
                                                                                        </div>

                                                                                <tr>
                                                                                        <td class="col_slno">7</td>
                                                                                        <td class="col_measure">Around Waist:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_waist', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'around_waist'); ?></td>
                                                                                        </div>

                                                                                <tr>
                                                                                        <td class="col_slno">8</td>
                                                                                        <td class="col_measure">shoulder to waist:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'shoulder_to_waist', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'shoulder_to_waist'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">9</td>
                                                                                        <td class="col_measure">Around Armhole:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_armhole', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'around_armhole'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">10</td>
                                                                                        <td class="col_measure">Sleeve Length:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'sleeve_length', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'sleeve_length'); ?></td>
                                                                                        </div>

                                                                                <tr>
                                                                                        <td class="col_slno">11</td>
                                                                                        <td class="col_measure">Arm Length:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'arm_length', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'arm_length'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">12</td>
                                                                                        <td class="col_measure">Around Upper Arm:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_upper_arm', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'around_upper_arm'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">13</td>
                                                                                        <td class="col_measure">Around Elbow:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_elbow', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'around_elbow'); ?></td>
                                                                                        </div>

                                                                                <tr>
                                                                                        <td class="col_slno">14</td>
                                                                                        <td class="col_measure">Around Wrist:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_wrist', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'around_wrist'); ?></td>
                                                                                        </div>

                                                                                <tr>
                                                                                        <td class="col_slno">15</td>
                                                                                        <td class="col_measure">Length Upper Garment:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'length_upper_garment', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'length_upper_garment'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">16</td>
                                                                                        <td class="col_measure">Shoulder Width:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'shoulder_width', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'shoulder_width'); ?></td>
                                                                                </tr>


                                                                                <tr>
                                                                                        <td class="col_slno">17</td>
                                                                                        <td class="col_measure">Around Lower Waist:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_lower_waist', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'around_lower_waist'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">18</td>
                                                                                        <td class="col_measure">Waist To Ankle:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'waist_to_ankle', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'waist_to_ankle'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">19</td>
                                                                                        <td class="col_measure">Inseam To Ankle:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'inseam_to_ankle', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'inseam_to_ankle'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">20</td>
                                                                                        <td class="col_measure">Around Hip:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'around_hip', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'around_hip'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">21</td>
                                                                                        <td class="col_measure">Around Tigh:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'around_tigh', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'around_tigh'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">22</td>
                                                                                        <td class="col_measure">Around Knee:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'around_knee', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'around_knee'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">23</td>
                                                                                        <td class="col_measure">Around Calf:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'around_calf', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'around_calf'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">24</td>
                                                                                        <td class="col_measure">Around Ankle:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'around_ankle', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'around_ankle'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">25</td>
                                                                                        <td class="col_measure">Skirt Length:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'skirt_length', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'skirt_length'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">25</td>
                                                                                        <td class="col_measure">Gown Full Length:</td>
                                                                                        <td class="col_value">  <?php echo $form->textField($model, 'gown_full_length', array('class' => 'form-control centemeter', 'placeholder' => '.Inches')); ?>
                                                                                                <?php echo $form->error($model, 'gown_full_length'); ?></td>
                                                                                </tr>
                                                                        </tbody>
                                                                </table>
                                                                <?php echo $form->labelEx($model, 'comments', array('class' => 'control-label ')); ?>
                                                                <?php echo $form->textarea($model, 'comments', array('class' => 'form-control')); ?>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-6"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/measurement_units.jpg" alt=""/></div>
                                                </div>
                                        </div>
                                        <div class="form_button pull-right">
                                                <?php echo $form->hiddenField($model, 'enq_id', array('class' => 'form-control', 'value' => $enquery->id)); ?>
                                                <?php echo $form->hiddenField($model, 'enq_history_id', array('class' => 'form-control', 'value' => $history->id)); ?>
                                                <?php echo CHtml::submitButton($model->isNewRecord ? 'SAVE AND SUBMIT' : 'Save', array('class' => 'btn btn-primary ')); ?>
                                        </div>

                                        <?php $this->endWidget(); ?>

                                </div><!-- form -->


                        </div>


                </div>
        </div>
</div>

<script>
        $(document).ready(function () {

                //                $('#custm').hide();
                $('.chekbx').click(function () {
                        var std_value = $(".chekbx:checked").val();
                        var code2 = 2;
                        var code1 = 1;
                        if (std_value == code2) {
                                $('#custm').show();
                                $('#std').hide();

                        }
                        if (std_value == code1) {
                                $('#std').show();
                                $('#custm').hide();
                        }
                });

                $(".cente").on('click', function () {
                        $('.custom').find("input[type=text], input[class=centemeter]").each(function (ev)
                        {
                                if (!$(this).val()) {
                                        $(this).attr("placeholder", "Cm");
                                }
                        });
                });
                $(".inches").on('click', function () {
                        $('.custom').find("input[type=text], input[class=centemeter]").each(function (ev)
                        {
                                if (!$(this).val()) {
                                        $(this).attr("placeholder", "Inches");
                                }
                        });
                });


        });

</script>