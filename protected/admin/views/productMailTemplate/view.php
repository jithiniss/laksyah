<?php
/* @var $this ProductMailTemplateController */
/* @var $model ProductMailTemplate */

$this->breadcrumbs=array(
	'Product Mail Templates'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ProductMailTemplate', 'url'=>array('index')),
	array('label'=>'Create ProductMailTemplate', 'url'=>array('create')),
	array('label'=>'Update ProductMailTemplate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductMailTemplate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductMailTemplate', 'url'=>array('admin')),
);
?>

<h1>View ProductMailTemplate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_id',
		'title',
		'content',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
