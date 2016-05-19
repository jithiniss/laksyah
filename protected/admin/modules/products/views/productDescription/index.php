<?php
/* @var $this ProductDescriptionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Descriptions',
);

$this->menu=array(
	array('label'=>'Create ProductDescription', 'url'=>array('create')),
	array('label'=>'Manage ProductDescription', 'url'=>array('admin')),
);
?>

<h1>Product Descriptions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
