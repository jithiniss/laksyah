<div class="container main_container inner_pages ">
    <div class="breadcrumbs"> <?php echo CHtml::link('HOME', array('site/index')); ?><span>/</span> <?php echo CHtml::link('My Account', array('Myaccount/index')); ?> <span>/</span> My Profile </div>
    <div class="row">
        <?php echo $this->renderPartial('_menu'); ?>
        <div class="col-sm-9 user_content">
            <h1>My Profile</h1>
            <?php echo CHtml::link(' <span class="account_link pull-right">Change Password</span>', array('Myaccount/ChangePassword')); ?>
            <div class="border-bottom">

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
            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'dimension-class-form',
                'htmlOptions' => array('class' => ''),
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation' => false,
            ));
            ?>

            <div class="registration_form">
                <div class="row">
                    <div class="col-sm-6">
                        <?php echo $form->labelEx($model, 'First Name*', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'first_name', array('size' => 60, 'readOnly' => true, 'maxlength' => 100, 'placeholder' => 'First Name', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'first_name'); ?>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $form->labelEx($model, 'Last Name*', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'last_name', array('size' => 60, 'readOnly' => true, 'maxlength' => 100, 'placeholder' => 'Last Name', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'last_name'); ?>

                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <?php echo $form->labelEx($model, 'Date of Birth *', array('class' => '')); ?>
                        <?php
                        $model->dob = date('d-m-Y', strtotime($model->dob));
                        $from = date('Y') - 80;
                        $to = date('Y') + 20;
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'dob',
                            'value' => 'dob',
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
                                'placeholder' => 'Date Of Birth',
                                'readOnly' => true,
                            ),
                        ));
                        ?>
                        <?php echo $form->error($model, 'Date of Birth'); ?>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $form->labelEx($model, 'gender', array('class' => '')); ?>
                        <?php echo $form->dropDownList($model, 'gender', array('male' => "male", 'female' => "female"), array('class' => 'form-control', 'readOnly' => true)); ?>
                        <?php echo $form->error($model, 'gender'); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <?php echo $form->labelEx($model, 'email', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Email Address', 'class' => 'form-control', 'readOnly' => true)); ?>
                        <?php echo $form->error($model, 'email'); ?>
                    </div>
                    <div class="col-sm-6">
                        <?php echo $form->labelEx($model, 'phone', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'phone_no_1', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'phone', 'class' => 'form-control', 'readOnly' => true)); ?>
                        <?php echo $form->error($model, 'phone_no_1'); ?>
                    </div>
                </div>
                <div class="row">

                    <div class="col-sm-6">
                        <?php echo $form->labelEx($model, 'mobile', array('class' => '')); ?>
                        <?php echo $form->textField($model, 'phone_no_2', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'mobile', 'class' => 'form-control', 'readOnly' => true)); ?>
                        <?php echo $form->error($model, 'phone_no_2'); ?>
                    </div>
                </div>

                <!--                <div class="row">
                                    <div class="col-sm-6">
                <?php echo $form->labelEx($model, 'password', array('class' => '')); ?>
                <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Password', 'class' => 'form-control', 'readOnly' => true)); ?>
                <?php echo $form->error($model, 'password'); ?>
                                    </div>
                                    <div class="col-sm-6">
                <?php echo $form->labelEx($model, 'confirm', array('class' => '')); ?>
                <?php echo $form->passwordField($model, 'confirm', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Confirm Password', 'class' => 'form-control', 'readOnly' => true)); ?>
                <?php echo $form->error($model, 'confirm'); ?>
                                    </div>
                                </div>-->



                <div class="confirm">

                    <div class="custom_check">
                          <!--   <style>
                                    .subscrib {
                                            border: solid 1px #d5d5d7;
                                            padding: 2px;
                                            font-size: 12px;
                                            content: "\f00c";
                                            color: #f47721;
                                    }

                                    /*                    input[type="checkbox"] {
                                                            display:none;
                                                        }
                                                        input[type="checkbox"] + label span {
                                                            display:inline-block;
                                                            width:19px;
                                                            height:19px;
                                                            margin:-1px 4px 0 0;
                                                            vertical-align:middle;
                                                            content: "\f00c";
                                                            color: #f47721;
                                                            cursor:pointer;
                                                            border: 1px solid #d2d2d2;
                                                        }
                                                        input[type="checkbox"]:checked + label span {
                                                            content: "\f00c";
                                                            color: #f47721;
                                                            border: 1px solid #d2d2d2;
                                                        }*/

                            </style>
                        <?php
                        echo $form->checkBox($model, 'newsletter', array('class' => 'subscrib'));
                        ?>
                        <?php echo $form->error($model, 'newsletter'); ?>
                         <label><span></span>Please add me to the Subcriber email list. <a href="#">See Privacy Policy</a></label>-->

                    </div>
                </div>
                <div class="text-center form_button">
                    <!--            <button class="btn-primary">Create an Acocunt</button>-->
                    <!-- <?php echo CHtml::submitButton($model->isNewRecord ? 'Create an Acocunt' : 'Update', array('class' => 'btn btn-success pos text-center form_button btn-primary ',)); ?>-->
                    <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/Profileedit" class="btn btn-success pos text-center form_button btn-primary">Edit Profile</a>

                </div>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>