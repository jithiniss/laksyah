<?php
/* @var $this WalletHistoryController */
/* @var $model WalletHistory */

$this->breadcrumbs=array(
	'Wallet Histories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List WalletHistory', 'url'=>array('index')),
	array('label'=>'Create WalletHistory', 'url'=>array('create')),
	array('label'=>'Update WalletHistory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete WalletHistory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage WalletHistory', 'url'=>array('admin')),
);
?>

<h1>View WalletHistory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'type_id',
		'amount',
		'entry_date',
		'credit_debit',
		'balance_amt',
		'ids',
		'field1',
		'field2',
	),
)); ?>
