<?php
/* @var $this ReturnRequestController */
/* @var $model ReturnRequest */

$this->breadcrumbs=array(
	'Return Requests'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ReturnRequest', 'url'=>array('index')),
	array('label'=>'Create ReturnRequest', 'url'=>array('create')),
	array('label'=>'Update ReturnRequest', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ReturnRequest', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReturnRequest', 'url'=>array('admin')),
);
?>

<h1>View ReturnRequest #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'product_id',
		'product_description',
		'DOC',
		'status',
	),
)); ?>
