<?php
/* @var $this HomeCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Home Categories',
);

$this->menu=array(
	array('label'=>'Create HomeCategory', 'url'=>array('create')),
	array('label'=>'Manage HomeCategory', 'url'=>array('admin')),
);
?>

<h1>Home Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
