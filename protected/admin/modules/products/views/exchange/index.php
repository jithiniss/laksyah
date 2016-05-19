<?php
/* @var $this ExchangeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Exchanges',
);

$this->menu=array(
	array('label'=>'Create Exchange', 'url'=>array('create')),
	array('label'=>'Manage Exchange', 'url'=>array('admin')),
);
?>

<h1>Exchanges</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
