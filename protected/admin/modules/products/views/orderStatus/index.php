<?php
/* @var $this OrderStatusController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Order Statuses',
);

$this->menu=array(
	array('label'=>'Create OrderStatus', 'url'=>array('create')),
	array('label'=>'Manage OrderStatus', 'url'=>array('admin')),
);
?>

<h1>Order Statuses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
