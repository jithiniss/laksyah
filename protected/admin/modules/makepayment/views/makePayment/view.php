<?php
/* @var $this MakePaymentController */
/* @var $model MakePayment */

$this->breadcrumbs=array(
	'Make Payments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MakePayment', 'url'=>array('index')),
	array('label'=>'Create MakePayment', 'url'=>array('create')),
	array('label'=>'Update MakePayment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MakePayment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MakePayment', 'url'=>array('admin')),
);
?>

<h1>View MakePayment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'userid',
		'product_name',
		'product_code',
		'message',
		'amount_type',
		'amount',
		'pay_method',
		'date',
	),
)); ?>
