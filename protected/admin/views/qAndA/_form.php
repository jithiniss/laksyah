<?php
/* @var $this QAndAController */
/* @var $model QAndA */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'qand-a-form',
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




    <div class="form-inline">




        <!--
                <div class="form-group">
        <?php //echo $form->labelEx($model, 'order_q1'); ?>
        <?php //echo $form->textArea($model, 'order_q1', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        <?php //echo $form->error($model, 'order_q1'); ?>
                </div>-->


        <div class="form-group">
            <?php echo $form->labelEx($model, 'order_q1', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php
                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                    'model' => $model,
                    'attribute' => 'order_q1',
                ));
                ?>
            </div>
            <?php echo $form->error($model, 'order_q1'); ?>
        </div>


        <div class="form-group">
            <?php echo $form->labelEx($model, 'order_a1', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php
                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                    'model' => $model,
                    'attribute' => 'order_a1',
                ));
                ?>
            </div>
            <?php echo $form->error($model, 'order_a1'); ?>
        </div>




        <!--        <div class="form-group">
        <?php //echo $form->labelEx($model, 'order_a1'); ?>
        <?php //echo $form->textArea($model, 'order_a1', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        <?php //echo $form->error($model, 'order_a1'); ?>
                </div>-->



        <!--        <div class="form-group">
        <?php //echo $form->labelEx($model, 'order_q2'); ?>
        <?php // echo $form->textArea($model, 'order_q2', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        <?php //echo $form->error($model, 'order_q2'); ?>
                </div>

                <div class="form-group">
        <?php //echo $form->labelEx($model, 'order_a2'); ?>
        <?php //echo $form->textArea($model, 'order_a2', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        <?php //echo $form->error($model, 'order_a2'); ?>
                </div>
        -->



        <div class="form-group">
            <?php echo $form->labelEx($model, 'order_q2', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php
                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                    'model' => $model,
                    'attribute' => 'order_q2',
                ));
                ?>
            </div>
            <?php echo $form->error($model, 'order_q1'); ?>
        </div>


        <div class="form-group">
            <?php echo $form->labelEx($model, 'order_a2', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php
                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                    'model' => $model,
                    'attribute' => 'order_a2',
                ));
                ?>
            </div>
            <?php echo $form->error($model, 'order_a2'); ?>
        </div>





        <div class="form-group">
            <?php echo $form->labelEx($model, 'payment_q1', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php
                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                    'model' => $model,
                    'attribute' => 'payment_q1',
                ));
                ?>
            </div>
            <?php echo $form->error($model, 'payment_q1'); ?>
        </div>


        <div class="form-group">
            <?php echo $form->labelEx($model, 'payment_a1', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php
                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                    'model' => $model,
                    'attribute' => 'payment_a1',
                ));
                ?>
            </div>
            <?php echo $form->error($model, 'payment_a1'); ?>
        </div>




        <!--        <div class="form-group">
        <?php //echo $form->labelEx($model, 'payment_q1'); ?>
        <?php //echo $form->textArea($model, 'payment_q1', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        <?php //echo $form->error($model, 'payment_q1'); ?>
                </div>

                <div class="form-group">
        <?php //echo $form->labelEx($model, 'payment_a1'); ?>
        <?php //echo $form->textArea($model, 'payment_a1', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        <?php //echo $form->error($model, 'payment_a1'); ?>
                </div>-->


        <div class="form-group">
            <?php echo $form->labelEx($model, 'payment_q2', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php
                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                    'model' => $model,
                    'attribute' => 'payment_q2',
                ));
                ?>
            </div>
            <?php echo $form->error($model, 'payment_q2'); ?>
        </div>


        <div class="form-group">
            <?php echo $form->labelEx($model, 'payment_a2', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php
                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                    'model' => $model,
                    'attribute' => 'payment_a2',
                ));
                ?>
            </div>
            <?php echo $form->error($model, 'payment_a2'); ?>
        </div>







        <!--        <div class="form-group">
        <?php //echo $form->labelEx($model, 'payment_q2'); ?>
        <?php //echo $form->textArea($model, 'payment_q2', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        <?php //echo $form->error($model, 'payment_q2'); ?>
                </div>

                <div class="form-group">
        <?php //echo $form->labelEx($model, 'payment_a2'); ?>
        <?php //echo $form->textArea($model, 'payment_a2', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        <?php //echo $form->error($model, 'payment_a2'); ?>
                </div>-->

        <!--        <div class="form-group">
        <?php //echo $form->labelEx($model, 'sort_order'); ?>
        <?php //echo $form->textField($model, 'sort_order', array('class' => 'form-control')); ?>
        <?php // echo $form->error($model, 'sort_order'); ?>
                </div>

                <div class="form-group">
        <?php //echo $form->labelEx($model, 'cb'); ?>
        <?php //echo $form->textField($model, 'cb', array('class' => 'form-control')); ?>
        <?php //echo $form->error($model, 'cb'); ?>
                </div>

                <div class="form-group">
        <?php //echo $form->labelEx($model, 'ub'); ?>
        <?php // echo $form->textField($model, 'ub', array('class' => 'form-control')); ?>
        <?php //echo $form->error($model, 'ub'); ?>
                </div>

                <div class="form-group">
        <?php //echo $form->labelEx($model, 'doc'); ?>
        <?php //echo $form->textField($model, 'doc', array('class' => 'form-control')); ?>
        <?php //echo $form->error($model, 'doc'); ?>
                </div>

                <div class="form-group">
        <?php //echo $form->labelEx($model, 'dou'); ?>
        <?php //echo $form->textField($model, 'dou', array('class' => 'form-control')); ?>
        <?php //echo $form->error($model, 'dou'); ?>
                </div>-->

    </div>
    <!--    <div class="form-group btns">
            <label>&nbsp;</label><br/>
    <?php //echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
        </div>-->


    <div class="box-footer">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
    </div>


    <?php $this->endWidget(); ?>

</div><!-- form -->