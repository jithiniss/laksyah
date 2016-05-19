

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'product-category-form',
        'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <div class="row">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'parent', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10">
                <?php
                $datas = ProductCategory::model()->findAll();
                $options = array();
                $_SESSION['category'][0] = '';
                foreach($datas as $data) {
                        unset($_SESSION['category']);
                        $options[$data->id] = Yii::app()->category->selectCategories($data);
                }

                echo CHtml::activeDropDownList($model, 'parent', $options, array('empty' => '--select--', 'class' => 'form-control'));
                ?>
            </div>
            <?php echo $form->error($model, 'parent'); ?>
        </div>
        <div class="form-group">
            <?php echo $form->labelEx($model, 'category_name', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->textField($model, 'category_name', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'category_name'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'description', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php
            $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                'model' => $model,
                'attribute' => 'description',
            ));
            ?>
            </div>
            <?php echo $form->error($model, 'description'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'image', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->fileField($model, 'image', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                <?php
                if($model->image != '') {
                        echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/products/category/' . $model->id . '.' . $model->image . '" />';
                }
                ?>
            </div>
            <?php echo $form->error($model, 'image'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'sort_order', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->textField($model, 'sort_order', array('class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'sort_order'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'meta_title', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->textField($model, 'meta_title', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'meta_title'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'meta_description', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->textArea($model, 'meta_description', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'meta_description'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'meta_keywords', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->textField($model, 'meta_keywords', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'meta_keywords'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'header_visibility', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->dropDownList($model, 'header_visibility', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'header_visibility'); ?>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'search_tag', array('class' => 'col-sm-2 control-label')); ?>
            <?php echo $form->hiddenField($model, 'search_tag'); ?>
            <div class="col-sm-10"><?php
            $this->widget('application.admin.components.TagSelect', array(
                'type' => 'category',
                'field_val' => $model->search_tag,
                'category_tag_id' => 'ProductCategory_search_tag', /* id of hidden field */
                'form_id' => 'product-category-form',
            ));
            ?></div>
        </div>

        <div class="form-group">
            <?php echo $form->labelEx($model, 'status', array('class' => 'col-sm-2 control-label')); ?>
            <div class="col-sm-10"><?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
            </div>
            <?php echo $form->error($model, 'status'); ?>
        </div>


        <div class="box-footer">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos')); ?>
        </div>

        <?php $this->endWidget(); ?>

    </div>