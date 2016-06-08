<?php
/* @var $this ShippingChargesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Shipping Charges',
);

$this->menu=array(
	array('label'=>'Create ShippingCharges', 'url'=>array('create')),
	array('label'=>'Manage ShippingCharges', 'url'=>array('admin')),
);
?>

<h1>Shipping Charges</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
