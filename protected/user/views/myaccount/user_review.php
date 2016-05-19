<div class="clearfix"></div>

<div class="container security">
    <div class="row">

        <div class="col-md-9 pickle-space">
            <div class="row">
                <h1>Add Review</h1>

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
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'dimension-class-form',
                    'htmlOptions' => array('class' => 'form-inline',
                        'enctype' => 'multipart/form-data',),
                    'enableAjaxValidation' => false,
                ));
                ?>

                <div class="form-group">
                    <?php echo $form->textArea($model, 'review', array('rows' => 6, 'cols' => 57, 'class' => 'textarea_style_rev', 'placeholder' => 'your review...')); ?>

                    <?php echo $form->error($model, 'review'); ?>
                </div>



                <div class="box-footer">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save', array('class' => 'btn btn-success pos')); ?>
                </div>

                <?php $this->endWidget(); ?>



            </div>

        </div>
    </div>



</div>

