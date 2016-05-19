<?php
/* @var $this ProductCategoryPathController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Category Paths',
);

$this->menu=array(
	array('label'=>'Create ProductCategoryPath', 'url'=>array('create')),
	array('label'=>'Manage ProductCategoryPath', 'url'=>array('admin')),
);
?>

<h1>Product Category Paths</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
