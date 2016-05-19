<?php
/* @var $this OptionCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Option Categories',
);

$this->menu=array(
	array('label'=>'Create OptionCategory', 'url'=>array('create')),
	array('label'=>'Manage OptionCategory', 'url'=>array('admin')),
);
?>

<h1>Option Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
