<?php
/* @var $this ReturnRequestController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Return Requests',
);

$this->menu=array(
	array('label'=>'Create ReturnRequest', 'url'=>array('create')),
	array('label'=>'Manage ReturnRequest', 'url'=>array('admin')),
);
?>

<h1>Return Requests</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
