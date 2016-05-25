<?php
/* @var $this BookAppointmentController */
/* @var $model BookAppointment */
/* @var $form CActiveForm */
?>
<div class="container main_container inner_pages centerd_page">
        <!--<div class="breadcrumbs"> <a href="#">HOME</a> <span>/</span> SHOPPING BAG </div>-->
        <h1>Appointment</h1>



        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'book-appointment-appointment-form',
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // See class documentation of CActiveForm for details on this,
            // you need to use the performAjaxValidation()-method described there.
            'enableAjaxValidation' => false,
        ));
        ?>


        <?php if (Yii::app()->user->hasFlash('success')): ?>
                <div class="alert alert-success normal">
                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                </div>
        <?php endif; ?>
        <?php if (Yii::app()->user->hasFlash('error')): ?>
                <div class="alert alert-danger">
                        <strong>Danger!</strong> <?php echo Yii::app()->user->getFlash('error'); ?>
                </div>
        <?php endif; ?>
        <div class="registration_form">
                <div class="row">
                        <div class="col-sm-6">
                                <?php echo $form->labelEx($model, 'name'); ?>
                                <?php echo $form->textField($model, 'name', array('size' => 60, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'name', array('style' => 'color:red')); ?>
                        </div>

                        <div class="col-sm-6">
                                <?php echo $form->labelEx($model, 'email'); ?>
                                <?php echo $form->textField($model, 'email', array('size' => 60, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'email', array('style' => 'color:red')); ?>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-6">
                                <?php echo $form->labelEx($model, 'phone'); ?>
                                <?php echo $form->textField($model, 'phone', array('size' => 60, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'phone', array('style' => 'color:red')); ?>
                        </div>

                        <div class="col-sm-6">
                                <?php echo $form->labelEx($model, 'country'); ?>
                                <?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'country', array('style' => 'color:red')); ?>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-6">
                                <?php echo $form->labelEx($model, 'city'); ?>
                                <?php echo $form->textField($model, 'city', array('size' => 60, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'city', array('style' => 'color:red')); ?>
                        </div>

                        <div class="col-sm-6">
                                <?php echo $form->labelEx($model, 'address'); ?>
                                <?php echo $form->textArea($model, 'address', array('rows' => 5, 'cols' => 60, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'address', array('style' => 'color:red')); ?>
                        </div>
                </div>
                <div class="row">
                        <div class="col-sm-6">
                                <?php echo $form->labelEx($model, 'notes'); ?>
                                <?php echo $form->textArea($model, 'notes', array('rows' => 5, 'cols' => 60, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'notes', array('style' => 'color:red')); ?>
                        </div>
                        <div class="col-sm-6">

                        </div>
                </div>

                <div class="text-center form_button">
                        <?php echo CHtml::submitButton('Submit', array('class' => 'btn-primary')); ?>
                </div>

                <?php $this->endWidget(); ?>

        </div><!-- form -->
</div>