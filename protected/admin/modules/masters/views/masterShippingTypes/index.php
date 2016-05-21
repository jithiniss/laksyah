<?php
/* @var $this MasterShippingTypesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Shipping Types',
);

$this->menu=array(
	array('label'=>'Create MasterShippingTypes', 'url'=>array('create')),
	array('label'=>'Manage MasterShippingTypes', 'url'=>array('admin')),
);
?>

<h1>Master Shipping Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
