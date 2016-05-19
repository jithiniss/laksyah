<?php
/* @var $this OrderProductsController */
/* @var $model OrderProducts */

$this->breadcrumbs=array(
	'Order Products'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List OrderProducts', 'url'=>array('index')),
	array('label'=>'Create OrderProducts', 'url'=>array('create')),
	array('label'=>'Update OrderProducts', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete OrderProducts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage OrderProducts', 'url'=>array('admin')),
);
?>

<h1>View OrderProducts #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'order_id',
		'product_id',
		'quantity',
		'amount',
		'DOC',
		'status',
	),
)); ?>
