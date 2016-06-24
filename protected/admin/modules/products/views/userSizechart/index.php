<?php
/* @var $this UserSizechartController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Sizecharts',
);

$this->menu=array(
	array('label'=>'Create UserSizechart', 'url'=>array('create')),
	array('label'=>'Manage UserSizechart', 'url'=>array('admin')),
);
?>

<h1>User Sizecharts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
