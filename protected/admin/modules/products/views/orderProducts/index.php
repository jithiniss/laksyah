<?php
/* @var $this OrderProductsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Order Products',
);

$this->menu=array(
	array('label'=>'Create OrderProducts', 'url'=>array('create')),
	array('label'=>'Manage OrderProducts', 'url'=>array('admin')),
);
?>

<h1>Order Products</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
