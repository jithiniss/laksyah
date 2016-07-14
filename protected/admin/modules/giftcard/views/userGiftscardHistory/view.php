<?php
/* @var $this UserGiftscardHistoryController */
/* @var $model UserGiftscardHistory */

$this->breadcrumbs=array(
	'User Giftscard Histories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserGiftscardHistory', 'url'=>array('index')),
	array('label'=>'Create UserGiftscardHistory', 'url'=>array('create')),
	array('label'=>'Update UserGiftscardHistory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserGiftscardHistory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserGiftscardHistory', 'url'=>array('admin')),
);
?>

<h1>View UserGiftscardHistory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'giftcard_id',
		'user_id',
		'bill_address_id',
		'amount',
		'unique_code',
		'status',
		'date',
	),
)); ?>
