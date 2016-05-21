<?php
/* @var $this MasterShippingTypesController */
/* @var $model MasterShippingTypes */

$this->breadcrumbs=array(
	'Master Shipping Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterShippingTypes', 'url'=>array('index')),
	array('label'=>'Create MasterShippingTypes', 'url'=>array('create')),
	array('label'=>'Update MasterShippingTypes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterShippingTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterShippingTypes', 'url'=>array('admin')),
);
?>

<h1>View MasterShippingTypes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'shipping_type',
		'shipping_rate',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
