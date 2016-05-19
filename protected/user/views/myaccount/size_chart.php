<style>
        .input_form{
                width: 21% !important;
        }
</style>
<div class="clearfix"></div>
<div class="container security">
        <div class="row">
                <div class="col-md-12 pickle-space" style="padding-top: 100px;">
                        <div class="row">

                                <div class="border-bottom">
                                        <div class="col-xs-12 col-sm-6"> <h1> Your Size Chart Details</h1></div>

                                        <div class="clearfix"></div>
                                        <?php if (Yii::app()->user->hasFlash('success')): ?>
                                                <div class="alert alert-success">
                                                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                <div class="alert alert-danger">
                                                        <strong>Danger!</strong> <?php echo Yii::app()->user->getFlash('error'); ?>
                                                </div>
                                        <?php endif; ?>
                                </div>



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

                                        <p class="note">Fields with <span class="required">*</span> are required.</p>

                                        <?php
                                        echo $form->errorSummary($model);
                                        if ($_GET['type'] == 0) {
                                                $type = in;
                                        } elseif ($_GET['type'] == 1) {
                                                $type = cm;
                                        }
                                        ?>
                                        <br/>




                                        <div class="form">


                                                <?php if ($model->type == 1) { ?>

                                                        <div id="std">

                                                                <p><b>For Standard Fitting</b></p>
                                                                <hr>
                                                                <table>
                                                                        <thead>
                                                                                <tr>
                                                                                        <th></th>
                                                                                        <?php $model->standerd = 2; ?>
                                                                                        <th>small  <?php echo $form->radioButtonList($model, 'standerd', array('1' => ''), array('uncheckValue' => null)); ?>
                                                                                        </th>
                                                                                        <th>medium <?php echo $form->radioButtonList($model, 'standerd', array('2' => ''), array('uncheckValue' => null)); ?></th>
                                                                                        <th>large <?php echo $form->radioButtonList($model, 'standerd', array('3' => ''), array('uncheckValue' => null)); ?></th>
                                                                                </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                                <tr>
                                                                                        <th>Chest </th>
                                                                                        <th>34</th>
                                                                                        <th>36</th>
                                                                                        <th>38</th>
                                                                                </tr>
                                                                                <tr>
                                                                                        <th>Waist </th>
                                                                                        <th>28</th>
                                                                                        <th>30</th>
                                                                                        <th>34</th>
                                                                                </tr>

                                                                                <tr>
                                                                                        <th>Hip </th>
                                                                                        <th>38</th>
                                                                                        <th>40</th>
                                                                                        <th>42</th>
                                                                                </tr>
                                                                                <tr>
                                                                                        <th>Shoulder </th>
                                                                                        <th>15</th>
                                                                                        <th>15</th>
                                                                                        <th>15.5</th>
                                                                                </tr>
                                                                                <tr>
                                                                                        <th>Neck </th>
                                                                                        <th>7</th>
                                                                                        <th>7.5</th>
                                                                                        <th>8</th>
                                                                                </tr>

                                                                                <tr>
                                                                                        <th>Skirt Length</th>
                                                                                        <th>43</th>
                                                                                        <th>43</th>
                                                                                        <th>43</th>
                                                                                </tr>


                                                                        </tbody>



                                                                </table>



                                                        </div>
                                                <?php } else if ($model->type == 2) { ?>
                                                        <div id="custm">
                                                                <div class="form-group">

                                                                        <h4>Unit : <?= $model->unit == 2 ? 'Cm' : 'In'; ?></h4>
                                                                        <?php echo $form->hiddenField($model, 'unit', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'unit'); ?>
                                                                </div>
                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'around_neck'); ?>
                                                                        <?php echo $form->textField($model, 'around_neck', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'around_neck'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'neck_depth'); ?>
                                                                        <?php echo $form->textField($model, 'neck_depth', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'neck_depth'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'around_upper_chest'); ?>
                                                                        <?php echo $form->textField($model, 'around_upper_chest', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'around_upper_chest'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'around_chest'); ?>
                                                                        <?php echo $form->textField($model, 'around_chest', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'around_chest'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'around_lower_chest'); ?>
                                                                        <?php echo $form->textField($model, 'around_lower_chest', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'around_lower_chest'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'shoulder_to_breastpoint'); ?>
                                                                        <?php echo $form->textField($model, 'shoulder_to_breastpoint', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'shoulder_to_breastpoint'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'around_waist'); ?>
                                                                        <?php echo $form->textField($model, 'around_waist', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'around_waist'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'shoulder_to_waist'); ?>
                                                                        <?php echo $form->textField($model, 'shoulder_to_waist', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'shoulder_to_waist'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'around_armhole'); ?>
                                                                        <?php echo $form->textField($model, 'around_armhole', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'around_armhole'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'sleeve_length'); ?>
                                                                        <?php echo $form->textField($model, 'sleeve_length', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'sleeve_length'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'arm_length'); ?>
                                                                        <?php echo $form->textField($model, 'arm_length', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'arm_length'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'around_upper_arm'); ?>
                                                                        <?php echo $form->textField($model, 'around_upper_arm', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'around_upper_arm'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'around_elbow'); ?>
                                                                        <?php echo $form->textField($model, 'around_elbow', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'around_elbow'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'around_wrist'); ?>
                                                                        <?php echo $form->textField($model, 'around_wrist', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'around_wrist'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'length_upper_garment'); ?>
                                                                        <?php echo $form->textField($model, 'length_upper_garment', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'length_upper_garment'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'shoulder_width'); ?>
                                                                        <?php echo $form->textField($model, 'shoulder_width', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'shoulder_width'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'around_lower_waist'); ?>
                                                                        <?php echo $form->textField($model, 'around_lower_waist', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'around_lower_waist'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'waist_to_ankle'); ?>
                                                                        <?php echo $form->textField($model, 'waist_to_ankle', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'waist_to_ankle'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'inseam_to_ankle'); ?>
                                                                        <?php echo $form->textField($model, 'inseam_to_ankle', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'inseam_to_ankle'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'around_hip'); ?>
                                                                        <?php echo $form->textField($model, 'around_hip', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'around_hip'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'around_tigh'); ?>
                                                                        <?php echo $form->textField($model, 'around_tigh', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'around_tigh'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'around_knee'); ?>
                                                                        <?php echo $form->textField($model, 'around_knee', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'around_knee'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'around_calf'); ?>
                                                                        <?php echo $form->textField($model, 'around_calf', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'around_calf'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'around_ankle'); ?>
                                                                        <?php echo $form->textField($model, 'around_ankle', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'around_ankle'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'skirt_length'); ?>
                                                                        <?php echo $form->textField($model, 'skirt_length', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'skirt_length'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                        <?php echo $form->labelEx($model, 'gown_full_length'); ?>
                                                                        <?php echo $form->textField($model, 'gown_full_length', array('class' => 'form-control')); ?>
                                                                        <?php echo $form->error($model, 'gown_full_length'); ?>
                                                                </div>


                                                        </div>
                                                <?php } ?>



                                        </div>

                                        <div class="form-group btns">
                                                <label>&nbsp;</label><br/>
                                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
                                        </div>

                                        <?php $this->endWidget(); ?>

                                </div><!-- form -->
                        </div>
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/border.png" class="img-responsive design"/> </div>
        </div>