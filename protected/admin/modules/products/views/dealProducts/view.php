<?php
/* @var $this DealProductsController */
/* @var $model DealProducts */

$this->breadcrumbs=array(
	'Deal Products'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DealProducts', 'url'=>array('index')),
	array('label'=>'Create DealProducts', 'url'=>array('create')),
	array('label'=>'Update DealProducts', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DealProducts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DealProducts', 'url'=>array('admin')),
);
?>

<h1>View DealProducts #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'date',
		'deal_products',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
