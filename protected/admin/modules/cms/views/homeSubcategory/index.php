<?php
/* @var $this HomeSubcategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Home Subcategories',
);

$this->menu=array(
	array('label'=>'Create HomeSubcategory', 'url'=>array('create')),
	array('label'=>'Manage HomeSubcategory', 'url'=>array('admin')),
);
?>

<h1>Home Subcategories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
