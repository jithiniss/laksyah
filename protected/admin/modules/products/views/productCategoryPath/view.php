<?php
/* @var $this ProductCategoryPathController */
/* @var $model ProductCategoryPath */

$this->breadcrumbs=array(
	'Product Category Paths'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductCategoryPath', 'url'=>array('index')),
	array('label'=>'Create ProductCategoryPath', 'url'=>array('create')),
	array('label'=>'Update ProductCategoryPath', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductCategoryPath', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductCategoryPath', 'url'=>array('admin')),
);
?>

<h1>View ProductCategoryPath #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category',
		'parent',
		'level',
	),
)); ?>
