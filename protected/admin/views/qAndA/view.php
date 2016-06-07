<?php
/* @var $this QAndAController */
/* @var $model QAndA */

$this->breadcrumbs=array(
	'Qand As'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List QAndA', 'url'=>array('index')),
	array('label'=>'Create QAndA', 'url'=>array('create')),
	array('label'=>'Update QAndA', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete QAndA', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QAndA', 'url'=>array('admin')),
);
?>

<h1>View QAndA #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'order_q1',
		'order_a1',
		'order_q2',
		'order_a2',
		'payment_q1',
		'payment_a1',
		'payment_q2',
		'payment_a2',
		'sort_order',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
