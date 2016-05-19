<?php
/* @var $this UserNotifyController */
/* @var $model UserNotify */

$this->breadcrumbs=array(
	'User Notifies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserNotify', 'url'=>array('index')),
	array('label'=>'Create UserNotify', 'url'=>array('create')),
	array('label'=>'Update UserNotify', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserNotify', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserNotify', 'url'=>array('admin')),
);
?>

<h1>View UserNotify #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'prod_id',
		'status',
		'date',
	),
)); ?>
