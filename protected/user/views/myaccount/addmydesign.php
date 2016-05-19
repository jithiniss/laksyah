<div class="clearfix"></div>
<div class="container security">
    <div class="row">
        <?php echo $this->renderPartial('_menu', $data, false, true); ?>
        <div class="col-md-9 pickle-space">
            <div class="row">
                <h1>My Design</h1>
                <div class="col-md-9">
                    <div class="row">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'dimension-class-form',
                            'htmlOptions' => array('class' => 'form-inline', 'enctype' => 'multipart/form-data'),
                            // Please note: When you enable ajax validation, make sure the corresponding
                            // controller action is handling ajax validation correctly.
                            // There is a call to performAjaxValidation() commented in generated controller code.
                            // See class documentation of CActiveForm for details on this.
                            'enableAjaxValidation' => false,
                        ));
                        ?>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'name'); ?>
                            <?php echo $form->textField($model, 'name', array('placeholder' => 'Design Title ', 'class' => 'form-contact-2')); ?>
                            <?php echo $form->error($model, 'name'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Design'); ?>
                            <?php echo $form->fileField($model, 'image', array('class' => 'form-contact-2')); ?>
                            <?php echo $form->error($model, 'image'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'description'); ?>
                            <?php echo $form->textArea($model, 'description', array('placeholder' => 'Description ', 'rows' => 30, 'class' => 'form-contact-2 text_width')); ?>
                            <?php echo $form->error($model, 'description'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'Type'); ?>
                            <?php echo $form->dropDownList($model, 'view_type', array('1' => "Public", '0' => "Private"), array('class' => 'form-contact-2')); ?>
                            <?php echo $form->error($model, 'view_type'); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'category'); ?>
                            <?php echo CHtml::activeDropDownList($model, 'category', CHtml::listData(MasterCategory::model()->findAll(), 'id', 'category_name'), array('empty' => '--Select--', 'class' => 'form-contact-2')); ?>
                            <?php echo $form->error($model, 'category'); ?>
                        </div>
                        <div class="box-footer">
                            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success pos')); ?>
                        </div>

                        <?php $this->endWidget(); ?>
                    </div></div>

            </div>
        </div>
    </div>

</div>


