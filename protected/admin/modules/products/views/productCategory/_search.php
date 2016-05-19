help | webapp | yii | logout

Generators
Controller Generator
Crud Generator
Form Generator
Model Generator
Module Generator
Crud Generator
This generator generates a controller and views that implement CRUD operations for the specified data model.

Fields with * are required. Click on the highlighted fields to edit them.

Model Class *

ProductCategory
Controller ID *

products/productCategory
Base Controller Class *
Controller
Code Template *
custom (D:\Ampps\www\picklebowl\framework\gii\generators\crud\templates\custom)
Preview  Generate
Code File	Generate
admin\modules\products\controllers\ProductCategoryController.php	(diff)	overwrite
admin\modules\products\views\productCategory\_form.php	(diff)	overwrite
admin\modules\products\views\productCategory\_search.php	(diff)	overwrite
admin\modules\products\views\productCategory\_view.php	(diff)	overwrite
admin\modules\products\views\productCategory\admin.php	(diff)	overwrite
admin\modules\products\views\productCategory\create.php	unchanged
admin\modules\products\views\productCategory\index.php	unchanged
admin\modules\products\views\productCategory\update.php	unchanged
admin\modules\products\views\productCategory\view.php	(diff)	overwrite

Powered by Yii Framework.
A product of Yii Software LLC.
<?php
/* @var $this ProductCategoryController */
/* @var $model ProductCategory */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="row">
<?php echo $form->label($model, 'id'); ?>
<?php echo $form->textField($model, 'id', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'parent'); ?>
<?php echo $form->textField($model, 'parent', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'category_name'); ?>
<?php echo $form->textField($model, 'category_name', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'description'); ?>
<?php echo $form->textArea($model, 'description', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'image'); ?>
<?php echo $form->textField($model, 'image', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'sort_order'); ?>
<?php echo $form->textField($model, 'sort_order', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'meta_title'); ?>
<?php echo $form->textField($model, 'meta_title', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'meta_description'); ?>
<?php echo $form->textArea($model, 'meta_description', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'meta_keywords'); ?>
<?php echo $form->textField($model, 'meta_keywords', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'header_visibility'); ?>
<?php echo $form->textField($model, 'header_visibility', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'status'); ?>
<?php echo $form->textField($model, 'status', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'CB'); ?>
<?php echo $form->textField($model, 'CB', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'UB'); ?>
<?php echo $form->textField($model, 'UB', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'DOC'); ?>
<?php echo $form->textField($model, 'DOC', array('class' => 'form-control')); ?>
    </div>

    <div class="row">
<?php echo $form->label($model, 'DOU'); ?>
<?php echo $form->textField($model, 'DOU', array('class' => 'form-control')); ?>
    </div>

    <div class="row buttons">
    <?php echo CHtml::submitButton('Search'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
close
D:\Ampps\www\picklebowl\protected\admin\modules\products\views\productCategory\_search.php