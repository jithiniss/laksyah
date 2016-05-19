<?php
/* @var $this HomeSubcategoryController */
/* @var $model HomeSubcategory */

$this->breadcrumbs=array(
	'Home Subcategories'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List HomeSubcategory', 'url'=>array('index')),
	array('label'=>'Create HomeSubcategory', 'url'=>array('create')),
	array('label'=>'Update HomeSubcategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete HomeSubcategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage HomeSubcategory', 'url'=>array('admin')),
);
?>

<h1>View HomeSubcategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'title',
		'image',
		'link',
		'CB',
		'UB',
		'DOC',
		'DOU',
	),
)); ?>
