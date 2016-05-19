<?php
/* @var $this DimensionClassController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Dimension Classes',
);

$this->menu=array(
	array('label'=>'Create DimensionClass', 'url'=>array('create')),
	array('label'=>'Manage DimensionClass', 'url'=>array('admin')),
);
?>

<h1>Dimension Classes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
