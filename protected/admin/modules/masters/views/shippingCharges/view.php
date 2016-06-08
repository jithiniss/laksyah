<?php
/* @var $this ShippingChargesController */
/* @var $model ShippingCharges */

$this->breadcrumbs=array(
	'Shipping Charges'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ShippingCharges', 'url'=>array('index')),
	array('label'=>'Create ShippingCharges', 'url'=>array('create')),
	array('label'=>'Update ShippingCharges', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ShippingCharges', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ShippingCharges', 'url'=>array('admin')),
);
?>

<h1>View ShippingCharges #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'country',
		'shipping_rate',
		'doc',
		'dou',
		'cb',
		'ub',
		'status',
		'sort_order',
		'zone',
		'weight',
	),
)); ?>
