<?php
/* @var $this MakePaymentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Make Payments',
);

$this->menu=array(
	array('label'=>'Create MakePayment', 'url'=>array('create')),
	array('label'=>'Manage MakePayment', 'url'=>array('admin')),
);
?>

<h1>Make Payments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
