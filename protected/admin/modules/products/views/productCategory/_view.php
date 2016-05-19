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
/* @var $data ProductCategory */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('parent')); ?>:</b>
    <?php echo CHtml::encode($data->parent); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('category_name')); ?>:</b>
    <?php echo CHtml::encode($data->category_name); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
    <?php echo CHtml::encode($data->description); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('image')); ?>:</b>
    <?php echo CHtml::encode($data->image); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
    <?php echo CHtml::encode($data->sort_order); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('meta_title')); ?>:</b>
    <?php echo CHtml::encode($data->meta_title); ?>
    <br />

    <?php /*
      <b><?php echo CHtml::encode($data->getAttributeLabel('meta_description')); ?>:</b>
      <?php echo CHtml::encode($data->meta_description); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('meta_keywords')); ?>:</b>
      <?php echo CHtml::encode($data->meta_keywords); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('header_visibility')); ?>:</b>
      <?php echo CHtml::encode($data->header_visibility); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
      <?php echo CHtml::encode($data->status); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('CB')); ?>:</b>
      <?php echo CHtml::encode($data->CB); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('UB')); ?>:</b>
      <?php echo CHtml::encode($data->UB); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('DOC')); ?>:</b>
      <?php echo CHtml::encode($data->DOC); ?>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('DOU')); ?>:</b>
      <?php echo CHtml::encode($data->DOU); ?>
      <br />

     */ ?>

</div>
close
D:\Ampps\www\picklebowl\protected\admin\modules\products\views\productCategory\_view.php