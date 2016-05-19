<?php
/* @var $this WeightClassController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Weight Classes',
);

$this->menu=array(
	array('label'=>'Create WeightClass', 'url'=>array('create')),
	array('label'=>'Manage WeightClass', 'url'=>array('admin')),
);
?>

<h1>Weight Classes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
