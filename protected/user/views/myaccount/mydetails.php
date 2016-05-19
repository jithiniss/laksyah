<div class="clearfix"></div>
<div class="container security">
    <div class="row">
        <ul class="list-inline list-unstyled">
            <li><a class="simple" href="#">Home<i class="fa sim fa-angle-right"></i></a></li>
            <li><a class="simple" href="#">My Dashboard<i class="fa sim fa-angle-right"></i></a></li>

            <li><h4>My Details</h4></li>
        </ul>
        <?php echo $this->renderPartial('_menu', $data, false, true); ?>

        <div class="col-md-9 pickle-space">
            <div class="row">

                <div class="border-bottom">
                    <div class="col-xs-12 col-sm-6"> <h1>Edit Your Account Details</h1></div>

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
                    'htmlOptions' => array('class' => 'form-inline'),
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // There is a call to performAjaxValidation() commented in generated controller code.
                    // See class documentation of CActiveForm for details on this.
                    'enableAjaxValidation' => false,
                ));
                ?>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'first_name', array('class' => '')); ?>
                    <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'First Name', 'class' => 'form-contact-2')); ?>
                    <?php echo $form->error($model, 'first_name'); ?>

                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'last_name', array('class' => '')); ?>
                    <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Last Name', 'class' => 'form-contact-2')); ?>
                    <?php echo $form->error($model, 'last_name'); ?>

                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Date of Birth', array('class' => '')); ?>
                    <?php
                    $from = date('Y') - 80;
                    $to = date('Y') - 16;
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
                            'class' => 'form-contact-2',
                            'placeholder' => 'Date Of Birth',
                        ),
                    ));
                    ?>
                    <?php echo $form->error($model, 'Date of Birth'); ?>

                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'Gender', array('class' => '')); ?>
                    <?php echo $form->dropDownList($model, 'gender', array('male' => "male", 'female' => "fe-male"), array('class' => 'form-contact-2')); ?>
                    <?php echo $form->error($model, 'Gender'); ?>

                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'email', array('class' => '')); ?>
                    <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Email Address', 'class' => 'form-contact-2')); ?>
                    <?php echo $form->error($model, 'email'); ?>

                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'phone_no_1', array('class' => '')); ?>
                    <?php echo $form->textField($model, 'phone_no_1', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Phone Number 1', 'class' => 'form-contact-2')); ?>
                    <?php echo $form->error($model, 'phone_no_1'); ?>

                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'phone_no_2', array('class' => '')); ?>
                    <?php echo $form->textField($model, 'phone_no_2', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Phone Number 2', 'class' => 'form-contact-2')); ?>
                    <?php echo $form->error($model, 'phone_no_2'); ?>

                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'fax', array('class' => '')); ?>
                    <?php echo $form->textField($model, 'fax', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Fax', 'class' => 'form-contact-2')); ?>
                    <?php echo $form->error($model, 'fax'); ?>

                </div>

                <div class="form-group">
                    <?php echo $form->labelEx($model, 'password', array('class' => '')); ?>
                    <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Password', 'class' => 'form-contact-2')); ?>
                    <?php echo $form->error($model, 'password'); ?>

                </div>
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'confirm', array('class' => '')); ?>
                    <?php echo $form->passwordField($model, 'confirm', array('size' => 60, 'maxlength' => 100, 'placeholder' => 'Confirm Password', 'class' => 'form-contact-2')); ?>
                    <?php echo $form->error($model, 'confirm'); ?>

                </div>

                <div class="form-group">

                    <?php echo $form->labelEx($model, 'newsletter', array('class' => '')); ?>
                    <?php echo $form->dropDownList($model, 'newsletter', array('1' => "Yes", '0' => "No"), array('class' => 'form-contact-2')); ?>
                    <?php echo $form->error($model, 'newsletter'); ?>



                </div>




                <div class="box-footer">
                    <ul class="list-inline list-unstyled">
                        <li><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success pos')); ?></li>
                    </ul>
                </div>

                <?php $this->endWidget(); ?>


            </div>
        </div>
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/border.png" class="img-responsive design"/> </div>
</div>