<?php
/* @var $this ExchangeController */
/* @var $model Exchange */

$this->breadcrumbs=array(
	'Exchanges'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Exchange', 'url'=>array('index')),
	array('label'=>'Create Exchange', 'url'=>array('create')),
	array('label'=>'Update Exchange', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Exchange', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Exchange', 'url'=>array('admin')),
);
?>

<h1>View Exchange #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_id',
		'name',
		'email',
		'phone',
		'description',
		'image',
		'date',
		'status',
	),
)); ?>
