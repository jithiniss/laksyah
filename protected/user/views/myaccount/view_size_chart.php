<div class="container main_container inner_pages ">
        <div class="breadcrumbs"> <?php echo CHtml::link('HOME', array('site/index')); ?> <span>/</span> <?php echo CHtml::link('My Account', array('Myaccount/index')); ?> <span>/</span> Measurement </div>
        <div class="row">

                <?php echo $this->renderPartial('_menu'); ?>


                <!-- / Sidebar-->
                <div class="col-sm-9 user_content">
                        <?php echo CHtml::link('View Old Measurements', array('myaccount/SizeChartList'), array('class' => 'account_link pull-right')); ?>
                        <h1>View Measurement</h1>
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
                                    // Please note: When you enable ajax validation, make sure the corresponding
                                    // controller action is handling ajax validation correctly.
                                    // There is a call to performAjaxValidation() commented in generated controller code.
                                    // See class documentation of CActiveForm for details on this.
                                    'enableAjaxValidation' => false,
                                ));
                                ?>


                                <?php echo $form->errorSummary($model); ?>
                                <div class="registration_form two_col_form">
                                        <div class="row">

                                                <div class="col-md-2 col-sm-3"> <label><strong>Product Name</strong></label></div>
                                                <div class="col-sm-7 col-md-6"><?php echo $form->textField($model, 'product_name', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control ')); ?>
                                                        <?php echo $form->error($model, 'product_name'); ?></div>

                                        </div>
                                        <div class="row">
                                                <div class="col-md-2 col-sm-3">
                                                        <label><strong>Product Code</strong></label>
                                                </div>
                                                <div class="col-sm-7 col-md-6">
                                                        <?php echo $form->textField($model, 'product_code', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                                                        <?php echo $form->error($model, 'product_code'); ?></div>
                                        </div>

                                        <div id="custmm" class="custom_measurementm">

                                                <p>
                                                        <?php // echo CHtml::link('Download Measurement Form', array('download' => 'images/thumb_big2.jpg'), array('class' => 'text_link')); ?>
                                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/images/thumb_big2.jpg" download class="text_link">Download Measurement Form</a></p>
                                                <div>
                                                        <label> </label>

                                                        <div class="price_group radio_buttons">
                                                                <?php
                                                                if ($model->unit == 1) {
                                                                        $act = 'active';
                                                                        $act1 = '';
                                                                } else {
                                                                        $act1 = 'active';
                                                                        $act = "";
                                                                }
                                                                ?>
                                                                <p class="pull-left padd-right-25">Measurement Unit :</p>
                                                                <label class="radio_group <?= $act; ?>">
                                                                        <?php echo $form->radioButton($model, 'unit', array('value' => 1, 'uncheckValue' => null, 'hidden' => 'true')); ?>
                                                                </label>
                                                                <span class="radio_label pull-left"><strong>Inches</strong></span>
                                                                <label class="radio_group <?= $act1; ?>">
                                                                        <?php echo $form->radioButton($model, 'unit', array('value' => 2, 'uncheckValue' => null, 'hidden' => 'true')); ?>
                                                                </label>
                                                                <span class="radio_label pull-left"> <strong>Centimeters</strong></span>
                                                                <?php echo $form->error($model, 'unit'); ?>
                                                                <div class="clearfix"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-xs-6">
                                                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table table-bordered measurement_table custm">
                                                                        <tbody>
                                                                                <tr>
                                                                                        <th class="col_slno"></th>
                                                                                        <th class="col_measure">Measurement</th>
                                                                                        <th class="col_value">Value</th>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td class="col_slno">1</td>
                                                                                        <td class="col_measure">Around Neck:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'around_neck', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'around_neck'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">2</td>
                                                                                        <td class="col_measure">Neck Depth Front/ Back:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'neck_depth', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'neck_depth'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">3</td>
                                                                                        <td class="col_measure">Around Upper Chest:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_upper_chest', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'around_upper_chest'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">4</td>
                                                                                        <td class="col_measure">Around Chest:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_chest', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'around_chest'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">5</td>
                                                                                        <td class="col_measure">Around Lower Bust:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_lower_chest', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'around_lower_chest'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">6</td>
                                                                                        <td class="col_measure">Shoulder to Bustpoint:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'shoulder_to_breastpoint', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'shoulder_to_breastpoint'); ?></td>
                                                                                        </div>

                                                                                <tr>
                                                                                        <td class="col_slno">7</td>
                                                                                        <td class="col_measure">Around Waist:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_waist', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'around_waist'); ?></td>
                                                                                        </div>

                                                                                <tr>
                                                                                        <td class="col_slno">8</td>
                                                                                        <td class="col_measure">shoulder to waist:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'shoulder_to_waist', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'shoulder_to_waist'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">9</td>
                                                                                        <td class="col_measure">Around Armhole:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_armhole', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'around_armhole'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">10</td>
                                                                                        <td class="col_measure">Sleeve Length:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'sleeve_length', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'sleeve_length'); ?></td>
                                                                                        </div>

                                                                                <tr>
                                                                                        <td class="col_slno">11</td>
                                                                                        <td class="col_measure">Arm Length:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'arm_length', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'arm_length'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">12</td>
                                                                                        <td class="col_measure">Around Upper Arm:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_upper_arm', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'around_upper_arm'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">13</td>
                                                                                        <td class="col_measure">Around Elbow:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_elbow', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'around_elbow'); ?></td>
                                                                                        </div>

                                                                                <tr>
                                                                                        <td class="col_slno">14</td>
                                                                                        <td class="col_measure">Around Wrist:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_wrist', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'around_wrist'); ?></td>
                                                                                        </div>

                                                                                <tr>
                                                                                        <td class="col_slno">15</td>
                                                                                        <td class="col_measure">Length Upper Garment:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'length_upper_garment', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'length_upper_garment'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">16</td>
                                                                                        <td class="col_measure">Shoulder Width:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'shoulder_width', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'shoulder_width'); ?></td>
                                                                                </tr>


                                                                                <tr>
                                                                                        <td class="col_slno">17</td>
                                                                                        <td class="col_measure">Around Lower Waist:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'around_lower_waist', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'around_lower_waist'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">18</td>
                                                                                        <td class="col_measure">Waist To Ankle:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'waist_to_ankle', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'waist_to_ankle'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">19</td>
                                                                                        <td class="col_measure">Inseam To Ankle:</td>
                                                                                        <td class="col_value"><?php echo $form->textField($model, 'inseam_to_ankle', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'inseam_to_ankle'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">20</td>
                                                                                        <td class="col_measure">Around Hip:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'around_hip', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'around_hip'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">21</td>
                                                                                        <td class="col_measure">Around Tigh:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'around_tigh', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'around_tigh'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">22</td>
                                                                                        <td class="col_measure">Around Knee:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'around_knee', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'around_knee'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">23</td>
                                                                                        <td class="col_measure">Around Calf:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'around_calf', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'around_calf'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">24</td>
                                                                                        <td class="col_measure">Around Ankle:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'around_ankle', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'around_ankle'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">25</td>
                                                                                        <td class="col_measure">Skirt Length:</td>
                                                                                        <td class="col_value"> <?php echo $form->textField($model, 'skirt_length', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'skirt_length'); ?></td>
                                                                                </tr>

                                                                                <tr>
                                                                                        <td class="col_slno">25</td>
                                                                                        <td class="col_measure">Gown Full Length:</td>
                                                                                        <td class="col_value">  <?php echo $form->textField($model, 'gown_full_length', array('class' => 'form-control')); ?>
                                                                                                <?php echo $form->error($model, 'gown_full_length'); ?></td>
                                                                                </tr>
                                                                        </tbody>
                                                                </table>
                                                        </div>
                                                        <div class="col-xs-6"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/measurement_units.jpg" alt=""/></div>
                                                </div>
                                        </div>

                                        <?php $this->endWidget(); ?>

                                </div><!-- form -->


                        </div>


                </div>
        </div>
</div>

<script>
        $(document).ready(function() {

//                $('#custm').hide();
                $('.chekbx').click(function() {
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
//                $("#UserSizechart_type").on('change', function () {
//                        alert("hf");
//                        if ($(".stnd").is(":checked")) {
//                                $('#std').show();
//                                $('#custm').hide();
//
//                        }
//                        else if ($("#UserSizechart_type_1").is(":checked")) {
//                                $('#custm').show();
//                                $('#std').hide();
//
//                        }
//                });
        });

</script>