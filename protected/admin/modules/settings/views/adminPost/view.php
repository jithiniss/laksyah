<?php
/* @var $this AdminPostController */
/* @var $model AdminPost */

$this->breadcrumbs=array(
	'Admin Posts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AdminPost', 'url'=>array('index')),
	array('label'=>'Create AdminPost', 'url'=>array('create')),
	array('label'=>'Update AdminPost', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AdminPost', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdminPost', 'url'=>array('admin')),
);
?>

<h1>View AdminPost #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'post_name',
		'products',
		'orders',
		'coupons',
		'cms',
		'masters',
		'user_details',
		'reports',
		'CB',
		'UB',
		'DOC',
		'DOU',
	),
)); ?>
